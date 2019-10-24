<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Storage;
use App\oc_fcc;
use App\oc_ms2;
use App\oc_starclick;
use App\Sales;
use App\teknisi;
use App\Follow;
use App\Witel;
use App\UserLog;

class HomeController extends Controller
{
     public function home(){
      $witel_id =\Auth::user()->witel;

      $completed_ps = 'COMPLETED (PS)';
      $now_tahun = date('Y');
      $now_bulan = date('m');
     $witel = Witel::all();
     	$sales = Sales::all();
      $teknisi = teknisi::all();
    $progress = Follow::selectRaw('DATE_FORMAT(timestamp, "%Y-%m-%d") as waktu, count(timestamp) as total')
    ->where('witel','LIKE','%'.$witel_id.'%')
    ->whereMonth('timestamp',$now_bulan)
    ->whereYear('timestamp', $now_tahun)
      ->groupBy(DB::raw("DATE_FORMAT(timestamp, '%Y-%m-%d')"))
      ->get();
      $actv_sales = Sales::join('tbl_log','tbl_log.id_sales','=','sales.id')
            ->groupBy('tbl_log.id_sales')
            ->orderBy('tbl_log.id','asc')
            ->get();

     $follow = Follow::all();
      $track_id = $follow->pluck('track_id')->toArray();
      $oc_starclick = oc_starclick::whereIn("TRACK_ID",$track_id)
      ->where('STATUS_RESUME','like',$completed_ps)
      ->count();

      
      // dd($oc_starclick);
return view('welcome',['lihat_sales' =>$sales,'lihat_teknisi' =>$teknisi,'lihat_progress'=>$progress,'lihat_witel'=>$witel,'lihat_follow' =>$follow,'lihat_actv_sales' =>$actv_sales,'lihat_ps' =>$oc_starclick]);
     }

     public function cari_grafik(Request $request)
    {
        $witel = $request->strwitel;
        $tahun = $request->strtahun;
        $bulan = $request->strbulan;

         if ($bulan=='0')
         {
           $bulan=''; 
         }

        if ($tahun=='0') 
        { 
          $tahun=''; 
        }

        if ($witel=='0')
        { 
      
  $h = Follow::selectRaw('DATE_FORMAT(timestamp, "%Y-%m-%d") as waktu, count(timestamp) as total')
                     ->whereMonth('timestamp', 'LIKE', '%' . $bulan . '%')
                     ->whereYear('timestamp', 'LIKE', '%' . $tahun . '%')
                      ->groupBy(DB::raw("DATE_FORMAT(timestamp, '%Y-%m-%d')"))
                     ->get();

        }else
        {
          $witel = $witel;
          $h = Follow::selectRaw('DATE_FORMAT(timestamp, "%Y-%m-%d") as waktu, count(timestamp) as total')
                    ->where('witel', 'LIKE', '%' . $witel . '%')
                     ->whereMonth('timestamp', 'LIKE', '%' . $bulan . '%')
                     ->whereYear('timestamp', 'LIKE', '%' . $tahun . '%')
                      ->groupBy(DB::raw("DATE_FORMAT(timestamp, '%Y-%m-%d')"))
                     ->get();


        }
     
                  
    // return view('welcome',['lihat_progress'=>$h]);
        return response()->json(['hasil'=>$h]);
    }

     public function notif(){
       $witel = Witel::all();
       return view('notif',['lihat_witel'=>$witel]);
     }
}
