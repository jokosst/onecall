<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Storage;
use App\UserLog;
use App\Sales;
use App\Witel;

class LogController extends Controller
{
  
        public function data_activity(){
          $d_witel = Witel::all();
$d = Sales::select('tbl_log.id','sales.nama','sales.ID_User','sales.witel')
            ->selectRaw('tbl_log.id_sales,max(tbl_log.id) as id, max(tbl_log.waktu) as waktu')
            ->join('tbl_log','tbl_log.id_sales','=','sales.id')
            ->groupBy('tbl_log.id_sales')
            ->orderBy('tbl_log.id','asc')
            ->get();
           
            // dd($d);

            return view('activity',['lihat' =>$d,'lihat_witel' =>$d_witel]);
        }
    public function data(Request $request, $id){
      $hari = date('d');
      $bulan = date('m');
      $tahun = date('Y');
            $d = UserLog::where('id_sales',$id)
             ->whereDay('waktu', $hari)
             ->whereMonth('waktu', $bulan)
             ->whereYear('waktu', $tahun)
            ->join('sales','sales.id','=','tbl_log.id_sales')
            ->orderBy('waktu', 'DESC')
            ->get();
            $ds = Sales::find($id);
            // dd($d);
            return view('log',['lihat' =>$d,'dsales'=>$ds]);
        }
   public function cari(Request $request, $id)
    {
        $hari = $request->strhari;
        $tahun = $request->strtahun;
        $bulan = $request->strbulan;

        if ($hari=='0')
        {
            $hari='';
        }
     
        if ($bulan=='0')
        {
            $bulan='';
        }

        if ($tahun=='0') {
            $tahun='';
        }
      // $h = UserLog::whereYear('waktu', '=', 2018)
      //        ->whereMonth('waktu', '=', 03)
      //        ->get();

        $h = UserLog::where('id_sales',$id)
                     ->whereDay('waktu', 'LIKE', '%' . $hari . '%')
                     ->whereMonth('waktu', 'LIKE', '%' . $bulan . '%')
                     ->whereYear('waktu', 'LIKE', '%' . $tahun . '%')
                     ->orderBy('waktu', 'DESC')
                     ->get();
                  
    // return view('cari',compact('$h'));
       return response()->json(['hasil'=>$h]);
    }

    public function sortir_witel_activity(Request $request)
    {
        $strwitel    = $request->strwitel;
        if ($strwitel=='0')
        {
            $strwitel='';
        }else {
            $strwitel = $strwitel;
        }
        $h = Sales::where('witel', 'LIKE', '%' . $strwitel . '%')
            ->select('tbl_log.id','sales.nama','sales.ID_User','sales.witel')
            ->selectRaw('tbl_log.id_sales,max(tbl_log.id) as id, max(tbl_log.waktu) as waktu')
            ->join('tbl_log','tbl_log.id_sales','=','sales.id')
            ->groupBy('tbl_log.id_sales')
            ->orderBy('tbl_log.id','asc')
            ->get();
            foreach ($h as $i => $data) {
               $id = $data->id;
               $log = UserLog::where('id',$id)
               ->select('log')
              ->first();
              $h[$i]->log = $log->log ?? '';
            }
          
        return response()->json(['hasil_sortir'=>$h]);
    }
public function export_activity(Request $request){
        $witel    = $request->witel;

        if ($witel=='0') {
            $witel='';
        }else {
            $witel = $witel;
        }
    

        $d = Sales::where('witel', 'LIKE', '%' . $witel . '%')
        ->select('tbl_log.id','sales.nama','sales.ID_User','sales.witel')
            ->selectRaw('tbl_log.id_sales,max(tbl_log.id) as id, max(tbl_log.waktu) as waktu')
            ->join('tbl_log','tbl_log.id_sales','=','sales.id')
            ->groupBy('tbl_log.id_sales')
            ->orderBy('tbl_log.id','asc')
            ->get();
            return view('export_activity',['lihat' =>$d]);

        }
}
