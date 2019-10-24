<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Storage;
use App\Follow;
use App\teknisi;
use App\oc_fcc;
use App\oc_ms2;
use App\oc_starclick;
use App\Witel;
use App\Http\Controllers\ApiController;

class FollowController extends Controller
{
    public function progress(Request $request){
     $d_witel = Witel::all();
    $perPage = 100;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $bulan = isset($_GET['bulan']) ? $_GET['bulan'] : '';
    $tahun = isset($_GET['tahun']) ? $_GET['tahun'] : '';
    $witel = isset($_GET['witel']) ? $_GET['witel'] : '';
    $save = isset($_GET['save']) ? $_GET['save'] : '';

    $track_ids = Follow::all()->pluck('track_id')->toArray();
    $old_track_ids = $track_ids;
    if($request->filled("status")){
      switch($request->status){
        case 1:
          $track_ids = oc_fcc::whereIn('identity',$track_ids)
            ->where(function($query){
              $query->where('reason','NOT LIKE','AGREE%')
              ->where('reason','NOT LIKE','DECLINE%');
            })
            ->get()->pluck("identity")->toArray();
          break;
          break;
        case 2:
          $track_ids = oc_fcc::whereIn('identity',$track_ids)
            ->where('reason','like','DECLINE%')
            ->get()->pluck("identity")->toArray();
          break;
        case 3:
         $track_ids = oc_fcc::whereIn('identity',$track_ids)
            ->where('reason','like','AGREE%')
            ->get()->pluck("identity")->toArray();
          break;
          break;
        case 4:
         $track_ids = oc_starclick::whereIn('TRACK_ID',$track_ids)
            ->where(function($query){
              $query->where('STATUS_RESUME','NOT LIKE','REVOKE%')
              ->where('STATUS_RESUME','NOT LIKE','COMPLETED (PS)')
              ->where('STATUS_RESUME','NOT LIKE','CANCEL%')
              ->where('STATUS_RESUME','NOT LIKE','UN-SCC%');
            })
            ->get()->pluck("TRACK_ID")->toArray();
          break;
        case 5:
          $track_ids = oc_starclick::whereIn('TRACK_ID',$track_ids)
            ->where('STATUS_RESUME','like','COMPLETED (PS)')
            ->get()->pluck("TRACK_ID")->toArray();
          break;
        case 6:
          $track_ids = oc_starclick::whereIn('TRACK_ID',$track_ids)
            ->where(function($query){
              $query->where('STATUS_RESUME','like','REVOKE%')
              ->orWhere('STATUS_RESUME','like','CANCEL%')
              ->orWhere('STATUS_RESUME','like','UN-SCC%');
            })
            ->get()->pluck("TRACK_ID")->toArray();
          break;
      }
        if((int)$request->status <= 3){
          $st = oc_starclick::whereIn('TRACK_ID',$old_track_ids)->get()->pluck("TRACK_ID")->toArray();
          $track_ids = array_diff($track_ids, $st);
        }
    }


    $additionalParams = "";
    if(strlen($search) > 0){
      $additionalParams .= "&search=$search";
      $row = Follow::whereIn('track_id',$track_ids)->where("nama","LIKE","%$search%")->count();
    }
    else{
      $row = Follow::whereIn('track_id',$track_ids)->count();
    }

    if($request->filled("status")){
      $additionalParams .= "&status=$request->status&witel=$witel&bulan=$bulan&tahun=$tahun&save=$save";
    }
    $totalPage = ceil($row / $perPage);
    if($page < 1){$page = 1;}
    $links = 5;
    $list_class = "pagination";
    $last = $totalPage;
    $start      = ( ( $page - $links ) > 0 ) ? $page - $links : 1;
    $end        = ( ( $page + $links ) < $last ) ? $page + $links : $last;
    
    
    $html       = '<div class="pagination_wrap">';
    $html       .= '<ul class="' . $list_class . '">';
    $class      = ( $page == 1 ) ? "disabled" : "paginate_button page-item ";
    $linkClass = "page-link";
    $html       .= '<li class="' . $class . '"><a class="'.$linkClass.'" href="'.url('progress').'?page=' . ( $page - 1 ) . '">&laquo;</a></li>';
    if ( $start > 1 ) {
        $html   .= '<li class="' . $class . '"><a class="'.$linkClass.'" href="'.url('progress').'?page=1'.$additionalParams.'">1</a></li>';
        $html   .= '<li class="disabled"><a class="'.$linkClass.'">...</a></li>';
    }
    for ( $i = $start ; $i <= $end; $i++ ) {
        $active  = ( ((int)$page) == $i ) ? " active" : "";
        $html   .= '<li class="' . $class . $active . '"><a class="'.$linkClass.'" href="'.url('progress').'?page=' . $i . $additionalParams . '">' . $i . '</a></li>';
    }
    if ( $end < $last ) {
        $html   .= '<li class="disabled"><a class="'.$linkClass.'">...</a></li>';
        $html   .= '<li><a class="'.$linkClass.'" href="'.url('progress').'?page=' . $last . $additionalParams . '">' . $last . '</a></li>';
    }
    $class      = ( $page == $last ) ? "disabled" : "";
    $html       .= '<li class="' . $class . '"><a class="'.$linkClass.'" href="'.url('progress').'?page=' . ( $page + 1 ) . '">&raquo;</a></li>';
    $html       .= '</ul>';
    $html       .= '</div>';
$page --;

      
      $follow = Follow::where("nama","LIKE","%$search%")
                    ->where('witel',"LIKE","%$witel%")
                    ->whereMonth('timestamp',"LIKE","%$bulan%")
                     ->whereYear('timestamp',"LIKE","%$tahun%")
                     ->whereIn('track_id',$track_ids);
      $follow = $follow->limit($perPage)->offset($page * $perPage);
      $follow = $follow->orderBy("appointment","desc")->get();
      $track_id = $follow->pluck('track_id')->toArray();

      $sales_id = $follow->pluck('sales_id')->toArray();
      $teknisi = teknisi::find($sales_id); 

      $oc_fcc = oc_fcc::whereIn('identity',$track_id)->get();
      $oc_starclick = oc_starclick::whereIn("TRACK_ID",$track_id)->get();

      foreach ($follow as $i=>$data) {
       $fcc = $oc_fcc->where('identity',$data->track_id)->first();
          $starclick = $oc_starclick->where('TRACK_ID',$data->track_id)->sortByDesc('ORDER_ID')->first();
             $datateknisi = $teknisi->where('id',$data->sales_id)->first();    

                  $follow[$i]->WITEL = $starclick->WITEL ?? '';
                  $follow[$i]->reason = $fcc->reason ?? '';
                  $follow[$i]->LOC_ID = $starclick->LOC_ID ?? '';
                    $follow[$i]->STATUS_RESUME = $starclick->STATUS_RESUME ?? '';
                    $follow[$i]->ORDER_ID = $starclick->ORDER_ID ?? '';
                     $follow[$i]->nama_teknisi = $datateknisi->nama ?? '';

                  if($starclick !== null){
                    if(in_array(strtoupper(substr($starclick->STATUS_RESUME,0,6)),['REVOKE','CANCEL','UN-SCC'])){
                      $follow[$i]->statusNum = 6;
                    }
                    elseif(strtoupper(substr($starclick->STATUS_RESUME,0,14)) == 'COMPLETED (PS)'){
                      $follow[$i]->statusNum = 5;
                    }
                    else{
                      $follow[$i]->statusNum = 4;
                    }
                  }
                  else{
                    if(strtoupper(substr($data->reason,0,5)) != 'AGREE' and
                      strtoupper(substr($data->reason,0,7)) != 'DECLINE' ){
                      $follow[$i]->statusNum = 1;
                    }
                    elseif(strtoupper(substr($data->reason,0,7)) == 'DECLINE' ){
                      $follow[$i]->statusNum = 2;
                    }
                    else{
                      $follow[$i]->statusNum = 3;
                    }
                  }
              }

            if($request->filled("status")){
              $follow_akhir = [];
              foreach ($follow as $k => $f) {
                if($f->statusNum == $request->status){
                  $follow_akhir[] = $f;
                }
              }
              $follow = $follow_akhir;
            }
  if($save == 'search'){         
      return view('progress',['lihat_follow' =>$follow,'lihat_witel' =>$d_witel,'paginationLinks'=>$html,'page'=>$page + 1]);
  }elseif($save == 'download'){
      $follow = Follow::where("nama","LIKE","%$search%")
                    ->where('witel',"LIKE","%$witel%")
                    ->whereMonth('timestamp',"LIKE","%$bulan%")
                     ->whereYear('timestamp',"LIKE","%$tahun%")
                     ->whereIn('track_id',$track_ids);
      
      $follow = $follow->orderBy("appointment","desc")->get();
      $track_id = $follow->pluck('track_id')->toArray();

      $sales_id = $follow->pluck('sales_id')->toArray();
      $teknisi = teknisi::find($sales_id); 

      $oc_fcc = oc_fcc::whereIn('identity',$track_id)->get();
      $oc_starclick = oc_starclick::whereIn("TRACK_ID",$track_id)->get();

      foreach ($follow as $i=>$data) {
       $fcc = $oc_fcc->where('identity',$data->track_id)->first();
          $starclick = $oc_starclick->where('TRACK_ID',$data->track_id)->sortByDesc('ORDER_ID')->first();
             $datateknisi = $teknisi->where('id',$data->sales_id)->first();    

                  $follow[$i]->WITEL = $starclick->WITEL ?? '';
                  $follow[$i]->reason = $fcc->reason ?? '';
                  $follow[$i]->LOC_ID = $starclick->LOC_ID ?? '';
                    $follow[$i]->STATUS_RESUME = $starclick->STATUS_RESUME ?? '';
                    $follow[$i]->ORDER_ID = $starclick->ORDER_ID ?? '';
                     $follow[$i]->nama_teknisi = $datateknisi->nama ?? '';

                  if($starclick !== null){
                    if(in_array(strtoupper(substr($starclick->STATUS_RESUME,0,6)),['REVOKE','CANCEL','UN-SCC'])){
                      $follow[$i]->statusNum = 6;
                    }
                    elseif(strtoupper(substr($starclick->STATUS_RESUME,0,14)) == 'COMPLETED (PS)'){
                      $follow[$i]->statusNum = 5;
                    }
                    else{
                      $follow[$i]->statusNum = 4;
                    }
                  }
                  else{
                    if(strtoupper(substr($data->reason,0,5)) != 'AGREE' and
                      strtoupper(substr($data->reason,0,7)) != 'DECLINE' ){
                      $follow[$i]->statusNum = 1;
                    }
                    elseif(strtoupper(substr($data->reason,0,7)) == 'DECLINE' ){
                      $follow[$i]->statusNum = 2;
                    }
                    else{
                      $follow[$i]->statusNum = 3;
                    }
                  }
              }

            if($request->filled("status")){
              $follow_akhir = [];
              foreach ($follow as $k => $f) {
                if($f->statusNum == $request->status){
                  $follow_akhir[] = $f;
                }
              }
              $follow = $follow_akhir;
            }
    return view('export_progress',['lihat' =>$follow]);

  } else{
    return view('progress',['lihat_follow' =>$follow,'lihat_witel' =>$d_witel,'paginationLinks'=>$html,'page'=>$page + 1]);
  }   
     }
     public function progress_witel(Request $request){
      $witel =\Auth::user()->witel;

    $perPage = 100;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $bulan = isset($_GET['bulan']) ? $_GET['bulan'] : '';
    $tahun = isset($_GET['tahun']) ? $_GET['tahun'] : '';
    $save = isset($_GET['save']) ? $_GET['save'] : '';

    $track_ids = Follow::all()->pluck('track_id')->toArray();
    $old_track_ids = $track_ids;
    if($request->filled("status")){
      switch($request->status){
        case 1:
          $track_ids = oc_fcc::whereIn('identity',$track_ids)
            ->where(function($query){
              $query->where('reason','NOT LIKE','AGREE%')
              ->where('reason','NOT LIKE','DECLINE%');
            })
            ->get()->pluck("identity")->toArray();
          break;
          break;
        case 2:
          $track_ids = oc_fcc::whereIn('identity',$track_ids)
            ->where('reason','like','DECLINE%')
            ->get()->pluck("identity")->toArray();
          break;
        case 3:
         $track_ids = oc_fcc::whereIn('identity',$track_ids)
            ->where('reason','like','AGREE%')
            ->get()->pluck("identity")->toArray();
          break;
          break;
        case 4:
         $track_ids = oc_starclick::whereIn('TRACK_ID',$track_ids)
            ->where(function($query){
              $query->where('STATUS_RESUME','NOT LIKE','REVOKE%')
              ->where('STATUS_RESUME','NOT LIKE','COMPLETED (PS)')
              ->where('STATUS_RESUME','NOT LIKE','CANCEL%')
              ->where('STATUS_RESUME','NOT LIKE','UN-SCC%');
            })
            ->get()->pluck("TRACK_ID")->toArray();
          break;
        case 5:
          $track_ids = oc_starclick::whereIn('TRACK_ID',$track_ids)
            ->where('STATUS_RESUME','like','COMPLETED (PS)')
            ->get()->pluck("TRACK_ID")->toArray();
          break;
        case 6:
          $track_ids = oc_starclick::whereIn('TRACK_ID',$track_ids)
            ->where(function($query){
              $query->where('STATUS_RESUME','like','REVOKE%')
              ->orWhere('STATUS_RESUME','like','CANCEL%')
              ->orWhere('STATUS_RESUME','like','UN-SCC%');
            })
            ->get()->pluck("TRACK_ID")->toArray();
          break;
      }
        if((int)$request->status <= 3){
          $st = oc_starclick::whereIn('TRACK_ID',$old_track_ids)->get()->pluck("TRACK_ID")->toArray();
          $track_ids = array_diff($track_ids, $st);
        }
    }


    $additionalParams = "";
    if(strlen($search) > 0){
      $additionalParams .= "&search=$search";
      $row = Follow::whereIn('track_id',$track_ids)->where("nama","LIKE","%$search%")->count();
    }
    else{
      $row = Follow::whereIn('track_id',$track_ids)->count();
    }

    if($request->filled("status")){
      $additionalParams .= "&status=$request->status&witel=$witel&bulan=$bulan&tahun=$tahun&save=$save";
    }
    $totalPage = ceil($row / $perPage);
    if($page < 1){$page = 1;}
    $links = 5;
    $list_class = "pagination";
    $last = $totalPage;
    $start      = ( ( $page - $links ) > 0 ) ? $page - $links : 1;
    $end        = ( ( $page + $links ) < $last ) ? $page + $links : $last;
    
    
    $html       = '<div class="pagination_wrap">';
    $html       .= '<ul class="' . $list_class . '">';
    $class      = ( $page == 1 ) ? "disabled" : "paginate_button page-item ";
    $linkClass = "page-link";
    $html       .= '<li class="' . $class . '"><a class="'.$linkClass.'" href="'.url('progress_witel').'?page=' . ( $page - 1 ) . '">&laquo;</a></li>';
    if ( $start > 1 ) {
        $html   .= '<li class="' . $class . '"><a class="'.$linkClass.'" href="'.url('progress_witel').'?page=1'.$additionalParams.'">1</a></li>';
        $html   .= '<li class="disabled"><a class="'.$linkClass.'">...</a></li>';
    }
    for ( $i = $start ; $i <= $end; $i++ ) {
        $active  = ( ((int)$page) == $i ) ? " active" : "";
        $html   .= '<li class="' . $class . $active . '"><a class="'.$linkClass.'" href="'.url('progress_witel').'?page=' . $i . $additionalParams . '">' . $i . '</a></li>';
    }
    if ( $end < $last ) {
        $html   .= '<li class="disabled"><a class="'.$linkClass.'">...</a></li>';
        $html   .= '<li><a class="'.$linkClass.'" href="'.url('progress_witel').'?page=' . $last . $additionalParams . '">' . $last . '</a></li>';
    }
    $class      = ( $page == $last ) ? "disabled" : "";
    $html       .= '<li class="' . $class . '"><a class="'.$linkClass.'" href="'.url('progress_witel').'?page=' . ( $page + 1 ) . '">&raquo;</a></li>';
    $html       .= '</ul>';
    $html       .= '</div>';
$page --;

      
      $follow = Follow::where("nama","LIKE","%$search%")
                    ->where('witel',"LIKE","%$witel%")
                    ->whereMonth('timestamp',"LIKE","%$bulan%")
                     ->whereYear('timestamp',"LIKE","%$tahun%")
                     ->whereIn('track_id',$track_ids);
      $follow = $follow->limit($perPage)->offset($page * $perPage);
      $follow = $follow->orderBy("appointment","desc")->get();
      $track_id = $follow->pluck('track_id')->toArray();

      $sales_id = $follow->pluck('sales_id')->toArray();
      $teknisi = teknisi::find($sales_id); 

      $oc_fcc = oc_fcc::whereIn('identity',$track_id)->get();
      $oc_starclick = oc_starclick::whereIn("TRACK_ID",$track_id)->get();

      foreach ($follow as $i=>$data) {
       $fcc = $oc_fcc->where('identity',$data->track_id)->first();
          $starclick = $oc_starclick->where('TRACK_ID',$data->track_id)->sortByDesc('ORDER_ID')->first();
             $datateknisi = $teknisi->where('id',$data->sales_id)->first();    

                  $follow[$i]->WITEL = $starclick->WITEL ?? '';
                  $follow[$i]->reason = $fcc->reason ?? '';
                  $follow[$i]->LOC_ID = $starclick->LOC_ID ?? '';
                    $follow[$i]->STATUS_RESUME = $starclick->STATUS_RESUME ?? '';
                    $follow[$i]->ORDER_ID = $starclick->ORDER_ID ?? '';
                     $follow[$i]->nama_teknisi = $datateknisi->nama ?? '';

                  if($starclick !== null){
                    if(in_array(strtoupper(substr($starclick->STATUS_RESUME,0,6)),['REVOKE','CANCEL','UN-SCC'])){
                      $follow[$i]->statusNum = 6;
                    }
                    elseif(strtoupper(substr($starclick->STATUS_RESUME,0,14)) == 'COMPLETED (PS)'){
                      $follow[$i]->statusNum = 5;
                    }
                    else{
                      $follow[$i]->statusNum = 4;
                    }
                  }
                  else{
                    if(strtoupper(substr($data->reason,0,5)) != 'AGREE' and
                      strtoupper(substr($data->reason,0,7)) != 'DECLINE' ){
                      $follow[$i]->statusNum = 1;
                    }
                    elseif(strtoupper(substr($data->reason,0,7)) == 'DECLINE' ){
                      $follow[$i]->statusNum = 2;
                    }
                    else{
                      $follow[$i]->statusNum = 3;
                    }
                  }
              }

            if($request->filled("status")){
              $follow_akhir = [];
              foreach ($follow as $k => $f) {
                if($f->statusNum == $request->status){
                  $follow_akhir[] = $f;
                }
              }
              $follow = $follow_akhir;
            }
  if($save == 'search'){         
      return view('progress_witel',['lihat_follow' =>$follow,'paginationLinks'=>$html,'page'=>$page + 1]);
  }elseif($save == 'download'){
      $follow = Follow::where("nama","LIKE","%$search%")
                    ->where('witel',"LIKE","%$witel%")
                    ->whereMonth('timestamp',"LIKE","%$bulan%")
                     ->whereYear('timestamp',"LIKE","%$tahun%")
                     ->whereIn('track_id',$track_ids);
      
      $follow = $follow->orderBy("appointment","desc")->get();
      $track_id = $follow->pluck('track_id')->toArray();

      $sales_id = $follow->pluck('sales_id')->toArray();
      $teknisi = teknisi::find($sales_id); 

      $oc_fcc = oc_fcc::whereIn('identity',$track_id)->get();
      $oc_starclick = oc_starclick::whereIn("TRACK_ID",$track_id)->get();

      foreach ($follow as $i=>$data) {
       $fcc = $oc_fcc->where('identity',$data->track_id)->first();
          $starclick = $oc_starclick->where('TRACK_ID',$data->track_id)->sortByDesc('ORDER_ID')->first();
             $datateknisi = $teknisi->where('id',$data->sales_id)->first();    

                  $follow[$i]->WITEL = $starclick->WITEL ?? '';
                  $follow[$i]->reason = $fcc->reason ?? '';
                  $follow[$i]->LOC_ID = $starclick->LOC_ID ?? '';
                    $follow[$i]->STATUS_RESUME = $starclick->STATUS_RESUME ?? '';
                    $follow[$i]->ORDER_ID = $starclick->ORDER_ID ?? '';
                     $follow[$i]->nama_teknisi = $datateknisi->nama ?? '';

                  if($starclick !== null){
                    if(in_array(strtoupper(substr($starclick->STATUS_RESUME,0,6)),['REVOKE','CANCEL','UN-SCC'])){
                      $follow[$i]->statusNum = 6;
                    }
                    elseif(strtoupper(substr($starclick->STATUS_RESUME,0,14)) == 'COMPLETED (PS)'){
                      $follow[$i]->statusNum = 5;
                    }
                    else{
                      $follow[$i]->statusNum = 4;
                    }
                  }
                  else{
                    if(strtoupper(substr($data->reason,0,5)) != 'AGREE' and
                      strtoupper(substr($data->reason,0,7)) != 'DECLINE' ){
                      $follow[$i]->statusNum = 1;
                    }
                    elseif(strtoupper(substr($data->reason,0,7)) == 'DECLINE' ){
                      $follow[$i]->statusNum = 2;
                    }
                    else{
                      $follow[$i]->statusNum = 3;
                    }
                  }
              }

            if($request->filled("status")){
              $follow_akhir = [];
              foreach ($follow as $k => $f) {
                if($f->statusNum == $request->status){
                  $follow_akhir[] = $f;
                }
              }
              $follow = $follow_akhir;
            }
    return view('export_progress',['lihat' =>$follow]);

  } else{
    return view('progress_witel',['lihat_follow' =>$follow,'paginationLinks'=>$html,'page'=>$page + 1]);
  }
     }
     public function hapus(Request $request, $id){
        Follow::destroy($id);
            return redirect('progress');
        }
  public function sortir_progress(Request $request)
    {
      $save = $request->save;
       $strwitel    = $request->witel;
        $strbulan    = $request->bulan;
        $strtahun    = $request->tahun;

         if ($strbulan=='0') {
            $strbulan='';
        }else{
          $strbulan = $strbulan;
        }

         if ($strtahun=='0') {
            $strtahun='';
        }else{
            $strtahun = $strtahun;
        }
        
        if ($strwitel=='0')
        {
            $strwitel='';
        }else {
            $strwitel = $strwitel;
        }


if($save == 'search'){

 $d_witel = Witel::all();
  $follow = Follow::where('witel', 'LIKE', '%' . $strwitel . '%')
                    ->whereMonth('timestamp', 'LIKE', '%' . $strbulan . '%')
                     ->whereYear('timestamp', 'LIKE', '%' . $strtahun . '%')
                     ->get();
                     
    $track_id = $follow->pluck('track_id')->toArray();

      $sales_id = $follow->pluck('sales_id')->toArray();
      $teknisi = teknisi::find($sales_id); 

      $oc_fcc = oc_fcc::where('identity',$track_id)->get();
      $oc_starclick = oc_starclick::whereIn('TRACK_ID',$track_id)
                    ->get();

              foreach ($follow as $i=>$data) {
       $fcc = $oc_fcc->where('identity',$data->track_id)->first();
          $starclick = $oc_starclick->where('TRACK_ID',$data->track_id)->sortByDesc('ORDER_ID')->first();
             $datateknisi = $teknisi->where('id',$data->sales_id)->first();    

                  $follow[$i]->WITEL = $starclick->WITEL ?? '';
                  $follow[$i]->reason = $fcc->reason ?? '';
                  $follow[$i]->LOC_ID = $starclick->LOC_ID ?? '';
                    $follow[$i]->STATUS_RESUME = $starclick->STATUS_RESUME ?? '';
                    $follow[$i]->ORDER_ID = $starclick->ORDER_ID ?? '';
                     $follow[$i]->nama_teknisi = $datateknisi->nama ?? '';

                 if($starclick !== null){
                    if(in_array(strtoupper(substr($starclick->STATUS_RESUME,0,6)),['REVOKE','CANCEL','UN-SCC'])){
                      $follow[$i]->statusNum = 6;
                    }
                    elseif(strtoupper(substr($starclick->STATUS_RESUME,0,14)) == 'COMPLETED (PS)'){
                      $follow[$i]->statusNum = 5;
                    }
                    else{
                      $follow[$i]->statusNum = 4;
                    }
                  }
                  else{
                    if(strtoupper(substr($data->reason,0,5)) != 'AGREE' and
                      strtoupper(substr($data->reason,0,7)) != 'DECLINE' ){
                      $follow[$i]->statusNum = 1;
                    }
                    elseif(strtoupper(substr($data->reason,0,7)) == 'DECLINE' ){
                      $follow[$i]->statusNum = 2;
                    }
                    else{
                      $follow[$i]->statusNum = 3;
                    }
                  }
              }
return view('sortir_progress',['lihat_follow' =>$follow,'lihat_witel' =>$d_witel]);

}elseif($save == 'download'){
  $follow = Follow::where("witel","LIKE","%$strwitel%")
                     ->whereMonth("timestamp","LIKE","%$strbulan%")
                     ->whereYear("timestamp","LIKE","%$strtahun%")
                     ->get();
      $track_id = $follow->pluck('track_id')->toArray();

      $sales_id = $follow->pluck('sales_id')->toArray();
      $teknisi = teknisi::find($sales_id); 

      $oc_fcc = oc_fcc::where('identity',$track_id)->get();
      $oc_starclick = oc_starclick::whereIn("TRACK_ID",$track_id)->get();

              foreach ($follow as $i=>$data) {
       $fcc = $oc_fcc->where('identity',$data->track_id)->first();
          $starclick = $oc_starclick->where('TRACK_ID',$data->track_id)->sortByDesc('ORDER_ID')->first();
             $datateknisi = $teknisi->where('id',$data->sales_id)->first();    

                  $follow[$i]->WITEL = $starclick->WITEL ?? '';
                  $follow[$i]->reason = $fcc->reason ?? '';
                  $follow[$i]->LOC_ID = $starclick->LOC_ID ?? '';
                    $follow[$i]->STATUS_RESUME = $starclick->STATUS_RESUME ?? '';
                    $follow[$i]->ORDER_ID = $starclick->ORDER_ID ?? '';
                     $follow[$i]->nama_teknisi = $datateknisi->nama ?? '';

                  if($starclick !== null){
                    if(in_array(strtoupper(substr($starclick->STATUS_RESUME,0,6)),['REVOKE','CANCEL','UN-SCC'])){
                      $follow[$i]->statusNum = 6;
                    }
                    elseif(strtoupper(substr($starclick->STATUS_RESUME,0,14)) == 'COMPLETED (PS)'){
                      $follow[$i]->statusNum = 5;
                    }
                    else{
                      $follow[$i]->statusNum = 4;
                    }
                  }
                  else{
                    if(strtoupper(substr($data->reason,0,5)) != 'AGREE' and
                      strtoupper(substr($data->reason,0,7)) != 'DECLINE' ){
                      $follow[$i]->statusNum = 1;
                    }
                    elseif(strtoupper(substr($data->reason,0,7)) == 'DECLINE' ){
                      $follow[$i]->statusNum = 2;
                    }
                    else{
                      $follow[$i]->statusNum = 3;
                    }
                  }
              }

            return view('export_progress',['lihat' =>$follow]);
}

}


//tutupcontroller
}
