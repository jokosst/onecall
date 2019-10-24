<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Storage;
use App\Regional;
use App\Datel;
use App\STO;
use App\Witel;
use App\teknisi;

class TeknisiController extends Controller
{
    public function data(){
        	$d = teknisi::all();
            $d_regional = Regional::all();
             $d_witel = Witel::all();
              $d_datel = Datel::all();
              $d_sto = STO::all();
            // dd($d);
        	return view('tecnician',['lihat' =>$d,'lihat_regional' =>$d_regional,'lihat_witel' =>$d_witel,'lihat_datel' =>$d_datel,'lihat_sto' =>$d_sto]);
        }
        public function data_witel(){
            $witel_id =\Auth::user()->witel;
            $d = teknisi::where('witel',$witel_id)->get();
            $d_regional = Regional::all();
             $d_witel = Witel::all();
              $d_datel = Datel::all();
              $d_sto = STO::all();
            // dd($d);
            return view('tecnician_witel',['lihat' =>$d,'lihat_regional' =>$d_regional,'lihat_witel' =>$d_witel,'lihat_datel' =>$d_datel,'lihat_sto' =>$d_sto]);
        }
        public function tambah(Request $request){
    $id_witel = $request->witel;
    $d_witel = Witel::find($id_witel);
    $witel = $d_witel->witel;

    $id_datel = $request->datel;
    $d_datel = Datel::find($id_datel);
    $datel = $d_datel->datel;

     $stos = $request->input('sto');
     $stos = implode(',', $stos);
              
       $tambah = new teknisi; //tambah data dengan eloquent
        $tambah->nama = $request->nama;
        $tambah->email = $request->email;
        $tambah->no_telegram = $request->no_telegram;
        $tambah->regional = $request->regional;
        $tambah->witel = $witel;
        $tambah->datel = $datel;
        $tambah->sto = $stos;
        $tambah->role = $request->role;
		$tambah->created_at = date('Y-m-d H:i:s');
		$tambah->updated_at = date('Y-m-d H:i:s');
        
        
        $tambah->save();

            return redirect('technician');

    }
    public function ubah_data(Request $request, $id){
    $stos = $request->input('sto');
     $stos = implode(',', $stos);

        $tambah = teknisi::find($id); //tambah data dengan eloquent
        $tambah->nama = $request->nama;
        $tambah->email = $request->email;
        $tambah->no_telegram = $request->no_telegram;
        $tambah->regional = $request->regional;
        $tambah->witel = $request->witel;
        $tambah->datel = $request->datel;
        $tambah->sto = $stos;
        $tambah->role = $request->role;
		$tambah->updated_at = date('Y-m-d H:i:s');
        
        
        $tambah->save();

            return redirect('technician')->with('error','Data terupdate');

    }
    public function hapus(Request $request, $id){
        teknisi::destroy($id);
            return redirect('technician');
        }
         public function cari_regional(Request $request)
    {
        $strregional    = $request->strregional;
        if ($strregional=='0')
        {
            $strregional='';
        }else {
            $strregional = $strregional;
        }
        $h = Witel::where('id_regional', $strregional)->get();
        return response()->json(['hasil'=>$h]);
    }
    public function cari_witel(Request $request)
    {
        $strwitel    = $request->strwitel;
        if ($strwitel=='0')
        {
            $strwitel='';
        }else {
            $strwitel = $strwitel;
        }
        $h = Datel::where('id_witel', $strwitel)->get();
        return response()->json(['hasil_witel'=>$h]);
    }
    public function cari_datel(Request $request)
    {
        $strdatel    = $request->strdatel;
        if ($strdatel=='0')
        {
            $strdatel='';
        }else {
            $strdatel = $strdatel;
        }
        $h = STO::where('id_datel', $strdatel)->get();
        return response()->json(['hasil_datel'=>$h]);
    }
    public function sortir_witel_technician(Request $request)
    {
        $strwitel    = $request->srtwitel;
        if ($strwitel=='0')
        {
            $strwitel='';
        }else {
            $strwitel = $strwitel;
        }
        $h = teknisi::where('witel', 'LIKE', '%' . $strwitel . '%')->get();
        return response()->json(['hasil_sortir'=>$h]);
    }
    public function export_technician(Request $request){
        $witel    = $request->witel;

        if ($witel=='0') {
            $witel='';
        }else {
            $witel = $witel;
        }
    

        $d = teknisi::where('witel', 'LIKE', '%' . $witel . '%')->get();
            return view('export_technician',['lihat' =>$d]);

        }
}
