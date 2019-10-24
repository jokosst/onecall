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
use App\Http\Controllers\ApiController;


class PelangganController extends Controller
{
	public function home(){
            $data_oc_fcc = oc_fcc::all();
            $data_oc_ms2 = oc_ms2::all();
            $data_oc_starclick = oc_starclick::all();
            return view('welcome',['lihat_oc_fcc' =>$data_oc_fcc,'lihat_oc_ms2' =>$data_oc_ms2,'lihat_oc_starclick' =>$data_oc_starclick]);
        }
        public function pelanggan(){
             
             //pagination

            $perPage = 50;
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $search = isset($_GET['search']) ? $_GET['search'] : '';

    $additionalParams = "";
    if(strlen($search) > 0){
      $additionalParams .= "&search=$search";
            $row = oc_fcc::where("identity","LIKE","%$search%")->count();
    }
    else{
            $row = oc_fcc::count();
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
    $html       .= '<li class="' . $class . '"><a class="'.$linkClass.'" href="'.url('order').'?page=' . ( $page - 1 ) . '">&laquo;</a></li>';
    if ( $start > 1 ) {
        $html   .= '<li class="' . $class . '"><a class="'.$linkClass.'" href="'.url('order').'?page=1'.$additionalParams.'">1</a></li>';
        $html   .= '<li class="disabled"><a class="'.$linkClass.'">...</a></li>';
    }
    for ( $i = $start ; $i <= $end; $i++ ) {
        $active  = ( ((int)$page) == $i ) ? " active" : "";
        $html   .= '<li class="' . $class . $active . '"><a class="'.$linkClass.'" href="'.url('order').'?page=' . $i . $additionalParams . '">' . $i . '</a></li>';
    }
    if ( $end < $last ) {
        $html   .= '<li class="disabled"><a class="'.$linkClass.'">...</a></li>';
        $html   .= '<li><a class="'.$linkClass.'" href="'.url('order').'?page=' . $last . $additionalParams . '">' . $last . '</a></li>';
    }
    $class      = ( $page == $last ) ? "disabled" : "";
    $html       .= '<li class="' . $class . '"><a class="'.$linkClass.'" href="'.url('order').'?page=' . ( $page + 1 ) . '">&raquo;</a></li>';
    $html       .= '</ul>';
    $html       .= '</div>';
$page --;

             $data_oc_fcc = oc_fcc::select('*',DB::raw("STR_TO_DATE(`order_dtm`,'%d-%b-%y') as order_dtm"))
             ->where("identity","LIKE","%$search%")
              ->limit($perPage)->offset($page * $perPage)
              ->orderBy("order_dtm","desc")->get();

              //improve performance
              $identities = $data_oc_fcc->pluck('identity')->toArray();
              $starclicks = oc_starclick::whereIn("TRACK_ID",$identities)->get();
              $oc_ms2s = oc_ms2::select("fee","myir")->whereIn("myir",$identities)->get();

              foreach ($data_oc_fcc as $i=>$data) {
                  $starclick = $starclicks->where('TRACK_ID',$data->identity)->sortByDesc('ORDER_ID')->first();
                  $oc_ms2 = $oc_ms2s->where('myir',$data->identity)->first();
                  $data_oc_fcc[$i] = ApiController::generateOrder($data,$oc_ms2,$starclick);
              }
           
            return view('pelanggan',[
              'lihat_pelanggan' =>$data_oc_fcc,
              'paginationLinks'=>$html,
              'page'=>$page + 1
            ]);

        }
        public function oc_fcc(){
            $nama = 'Zumrotun';
            $data_oc_fcc = oc_fcc::where('nama_ktp',$nama)->get();
            return view('oc_fcc',['lihat_oc_fcc' =>$data_oc_fcc]);

        }
        public function oc_ms2(){
             $status = 'PS';
             $nama= 'Zumrotun';
            $data_oc_ms2 = oc_ms2::where('nama',$nama)
            ->where('status',$status)->get();
            return view('oc_ms2',['lihat_oc_ms2' =>$data_oc_ms2]);

        }
        public function oc_starclick(){

             $ORDER_ID = '8557715';
             $customer_name= 'Zumrotun';
            $data_oc_starclick = oc_starclick::where('CUSTOMER_NAME',$customer_name)
            ->orderBy('ORDER_ID', 'DESC')
            ->limit(1)
            ->get();
            return view('starclick',['lihat_oc_starclick' =>$data_oc_starclick]);

        }
}
