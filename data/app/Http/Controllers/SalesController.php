<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Storage;
use App\Sales;
use App\Regional;
use App\Datel;
use App\STO;
use App\Witel;
use App\Agency;
use App\Kode_Agency;
use App\oc_fcc;
use App\oc_starclick;
use App\Points;
use App\Follow;
use App\Http\Controllers\ApiController;

class SalesController extends Controller
{
    public function data(Request $request){
        $perPage = 100;
        $page = $request->page ?? 1;
        $search = $request->search;
        $ID_User = $request->ID_User;
        $username = $request->username;
        $status    = $request->status;
        $strwitel    = $request->witel;
        if ($strwitel=='0')
           $strwitel='';
        else
            $strwitel = $strwitel;


        $additionalParams = "";
        $row = Sales::orderBy("nama");
        if(strlen($search) > 0){
            $additionalParams .= "&search=$search";
            $row = $row->where("nama","LIKE","%$search%");
        }
        if(strlen($ID_User) > 0){
            $additionalParams .= "&ID_User=$ID_User";
            $row = $row->where("ID_User","LIKE","%$ID_User%");
        }
        if(strlen($username) > 0){
            $additionalParams .= "&username=$username";
            $row = $row->where("username","LIKE","%$username%");
        }
        if($status > 0){
            $additionalParams .= "&status=$status";
            if($status == 1)
                $row = $row->whereNotNull("ID_User");
            elseif($status == 2)
                $row = $row->whereNull("ID_User");
        }
        if(strlen($strwitel) > 0){
            $additionalParams .= "&witel=$strwitel";
            $row = $row->where("witel","LIKE","%$strwitel%");
        }
        $row = $row->count();
        
        $totalPage = ceil($row / $perPage);
        if($page < 1){$page = 1;}
        $links = 5;
        $list_class = "pagination";
        $last = $totalPage;
        $start      = ( ( $page - $links ) > 0 ) ? $page - $links : 1;
        $end        = ( ( $page + $links ) < $last ) ? $page + $links : $last;
        
        $html       = '<div class="pagination_wrap"><ul class="' . $list_class . '">';
        $class      = ( $page == 1 ) ? "disabled" : "paginate_button page-item ";
        $linkClass = "page-link";
        $html       .= '<li class="' . $class . '"><a class="'.$linkClass.'" href="'.url('sales').'?page=' . ( $page - 1 ) . '">&laquo;</a></li>';
        if ( $start > 1 ) {
            $html   .= '<li class="' . $class . '"><a class="'.$linkClass.'" href="'.url('sales').'?page=1'.$additionalParams.'">1</a></li>';
            $html   .= '<li class="disabled"><a class="'.$linkClass.'">...</a></li>';
        }
        for ( $i = $start ; $i <= $end; $i++ ) {
            $active  = ( ((int)$page) == $i ) ? " active" : "";
            $html   .= '<li class="' . $class . $active . '"><a class="'.$linkClass.'" href="'.url('sales').'?page=' . $i . $additionalParams . '">' . $i . '</a></li>';
        }
        if ( $end < $last ) {
            $html   .= '<li class="disabled"><a class="'.$linkClass.'">...</a></li>';
            $html   .= '<li><a class="'.$linkClass.'" href="'.url('sales').'?page=' . $last . $additionalParams . '">' . $last . '</a></li>';
        }
        $class      = ( $page == $last ) ? "disabled" : "";
        $html       .= '<li class="' . $class . '"><a class="'.$linkClass.'" href="'.url('sales').'?page=' . ( $page + 1 ) . '">&raquo;</a></li>';
        $html       .= '</ul>';
        $html       .= '</div>';
        $page --;

        $orderby = isset($_GET['orderby']) ? $_GET['orderby'] : "nama";

            $d = Sales::orderBy($orderby);
            if(strlen($search) > 0){
                $d = $d->where("nama",'like',"%$search%");
            }
            if(strlen($ID_User) > 0){
                $d = $d->where("ID_User",'like',"%$ID_User%");
            }
            if(strlen($username) > 0){
                $d = $d->where("username",'like',"%$username%");
            }
            if($status > 0){
                $additionalParams .= "&status=$status";
                if($status == 1)
                    $d = $d->whereNotNull("ID_User");
                elseif($status == 2)
                    $d = $d->whereNull("ID_User");
            }
            if(strlen($strwitel) > 0){
                $additionalParams .= "&witel=$strwitel";
                $d = $d->where("witel","LIKE","%$strwitel%");
            }

            $d = $d->limit($perPage)
            ->offset($page * $perPage)
            ->get();
            $d_regional = Regional::all();
             $d_witel = Witel::all();
             $d_datel = Datel::all();
             $d_sto = STO::all();
            $d_agency = Agency::all();
            $d_kode_agency = Kode_Agency::all();
            // dd($d);
            return view('sales',['lihat' =>$d,'lihat_witel' =>$d_witel,'lihat_datel' =>$d_datel,'lihat_sto' =>$d_sto,'lihat_regional' =>$d_regional,'lihat_agency' =>$d_agency, 'lihat_kode_agency' =>$d_kode_agency,'pagination'=>$html]);
        }
        public function data_witel(Request $request){
         $witel_id =\Auth::user()->witel;
         // dd($witel_id);   
        $perPage = 100;
        $page = $request->page ?? 1;
        $search = $request->search;
        $ID_User = $request->ID_User;
        $username = $request->username;
        $status    = $request->status;
        


        $additionalParams = "";
        $row = Sales::orderBy("nama");
        if(strlen($search) > 0){
            $additionalParams .= "&search=$search";
            $row = $row->where("nama","LIKE","%$search%");
        }
        if(strlen($ID_User) > 0){
            $additionalParams .= "&ID_User=$ID_User";
            $row = $row->where("ID_User","LIKE","%$ID_User%");
        }
        if(strlen($username) > 0){
            $additionalParams .= "&username=$username";
            $row = $row->where("username","LIKE","%$username%");
        }
        if($status > 0){
            $additionalParams .= "&status=$status";
            if($status == 1)
                $row = $row->whereNotNull("ID_User");
            elseif($status == 2)
                $row = $row->whereNull("ID_User");
        }
        if(strlen($witel_id) > 0){
            $additionalParams .= "&witel=$witel_id";
            $row = $row->where("witel","LIKE","%$witel_id%");
        }
        $row = $row->count();
        
        $totalPage = ceil($row / $perPage);
        if($page < 1){$page = 1;}
        $links = 5;
        $list_class = "pagination";
        $last = $totalPage;
        $start      = ( ( $page - $links ) > 0 ) ? $page - $links : 1;
        $end        = ( ( $page + $links ) < $last ) ? $page + $links : $last;
        
        $html       = '<div class="pagination_wrap"><ul class="' . $list_class . '">';
        $class      = ( $page == 1 ) ? "disabled" : "paginate_button page-item ";
        $linkClass = "page-link";
        $html       .= '<li class="' . $class . '"><a class="'.$linkClass.'" href="'.url('sales_witel').'?page=' . ( $page - 1 ) . '">&laquo;</a></li>';
        if ( $start > 1 ) {
            $html   .= '<li class="' . $class . '"><a class="'.$linkClass.'" href="'.url('sales_witel').'?page=1'.$additionalParams.'">1</a></li>';
            $html   .= '<li class="disabled"><a class="'.$linkClass.'">...</a></li>';
        }
        for ( $i = $start ; $i <= $end; $i++ ) {
            $active  = ( ((int)$page) == $i ) ? " active" : "";
            $html   .= '<li class="' . $class . $active . '"><a class="'.$linkClass.'" href="'.url('sales_witel').'?page=' . $i . $additionalParams . '">' . $i . '</a></li>';
        }
        if ( $end < $last ) {
            $html   .= '<li class="disabled"><a class="'.$linkClass.'">...</a></li>';
            $html   .= '<li><a class="'.$linkClass.'" href="'.url('sales_witel').'?page=' . $last . $additionalParams . '">' . $last . '</a></li>';
        }
        $class      = ( $page == $last ) ? "disabled" : "";
        $html       .= '<li class="' . $class . '"><a class="'.$linkClass.'" href="'.url('sales_witel').'?page=' . ( $page + 1 ) . '">&raquo;</a></li>';
        $html       .= '</ul>';
        $html       .= '</div>';
        $page --;

        $orderby = isset($_GET['orderby']) ? $_GET['orderby'] : "nama";

            $d = Sales::orderBy($orderby);
            if(strlen($search) > 0){
                $d = $d->where("nama",'like',"%$search%");
            }
            if(strlen($ID_User) > 0){
                $d = $d->where("ID_User",'like',"%$ID_User%");
            }
            if(strlen($username) > 0){
                $d = $d->where("username",'like',"%$username%");
            }
            if($status > 0){
                $additionalParams .= "&status=$status";
                if($status == 1)
                    $d = $d->whereNotNull("ID_User");
                elseif($status == 2)
                    $d = $d->whereNull("ID_User");
            }
            if(strlen($witel_id) > 0){
                $additionalParams .= "&witel=$witel_id";
                $d = $d->where("witel","LIKE","%$witel_id%");
            }

            $d = $d->limit($perPage)
            ->offset($page * $perPage)
            ->get();
            $d_regional = Regional::all();
             $d_witel = Witel::all();
             $d_datel = Datel::all();
             $d_sto = STO::all();
            $d_agency = Agency::all();
            $d_kode_agency = Kode_Agency::all();
            // dd($d);
            return view('sales_witel',['lihat' =>$d,'lihat_witel' =>$d_witel,'lihat_datel' =>$d_datel,'lihat_sto' =>$d_sto,'lihat_regional' =>$d_regional,'lihat_agency' =>$d_agency, 'lihat_kode_agency' =>$d_kode_agency,'pagination'=>$html]);
        }
public function tambah(Request $request){
    $username = $request->username;
    $h = Sales::where('username','=',$username)->first();
    if (!empty($h->username)) {
    return redirect('sales')->with('error','Data Gagal Upload Karna Username sudah ada');
    
    }else{

       $id_witel = $request->witel;
    $d_witel = Witel::find($id_witel);
    $witel = $d_witel->witel;

    $id_datel = $request->datel;
    $d_datel = Datel::find($id_datel);
    $datel = $d_datel->datel;

    $id_agency = $request->agency;
    $d_agency = Agency::find($id_agency);
    $agency = $d_agency->agency;

    if($request->hasFile('foto_profil')){
      $file = $request->file('foto_profil');
       $extension = $file->getClientOriginalExtension();
        $filename   = md5(time().rand()).".".$file->getClientOriginalExtension();
         Storage::disk('local')->put($filename,  File::get($file));

        $tambah = new Sales; //tambah data dengan eloquent
        $tambah->nama = $request->nama;
        $tambah->username = $request->username;
        $tambah->password = bcrypt($request->password);
        $tambah->ID_User = $request->ID_User;
        $tambah->no_hp = $request->no_hp;
        $tambah->created_at = date('Y-m-d H:i:s');
        $tambah->updated_at = date('Y-m-d H:i:s');
        $tambah->regional = $request->regional;
        $tambah->witel = $witel;
        $tambah->datel = $datel;
        $tambah->sto = $request->sto;
        $tambah->agency = $agency;
        $tambah->kode_agency = $request->kode_agency;
        $tambah->foto_profil = $filename;
        $tambah->role = $request->role;
        $tambah->no_ktp = $request->no_ktp;
        $tambah->tmp_lahir = $request->tmp_lahir;
        $tambah->tgl_lahir = $request->tgl_lahir;
        $tambah->alamat = $request->alamat;
        $tambah->no_rek = $request->no_rek;
        $tambah->bank = $request->bank;
        $tambah->nama_pemilik_bank = $request->nama_pemilik_bank;
        $tambah->cabang_bank = $request->cabang_bank;
        $tambah->save();

            return redirect('sales');
            }else {  
        $default = 'default.png';              
        $tambah = new Sales; //tambah data dengan eloquent
        $tambah->nama = $request->nama;
        $tambah->username = $request->username;
        $tambah->password = bcrypt($request->password);
        $tambah->ID_User = $request->ID_User;
        $tambah->no_hp = $request->no_hp;
        $tambah->created_at = date('Y-m-d H:i:s');
        $tambah->updated_at = date('Y-m-d H:i:s');
        $tambah->regional = $request->regional;
        $tambah->witel = $witel;
        $tambah->datel = $datel;
        $tambah->sto = $request->sto;
        $tambah->agency = $agency;
        $tambah->kode_agency = $request->kode_agency;
        $tambah->foto_profil = $default;
        $tambah->role = $request->role;
        $tambah->no_ktp = $request->no_ktp;
        $tambah->tmp_lahir = $request->tmp_lahir;
        $tambah->tgl_lahir = $request->tgl_lahir;
        $tambah->alamat = $request->alamat;
        $tambah->no_rek = $request->no_rek;
        $tambah->bank = $request->bank;
        $tambah->nama_pemilik_bank = $request->nama_pemilik_bank;
        $tambah->cabang_bank = $request->cabang_bank;
        $tambah->save();
            return redirect('sales')->with('error','gambar tidak terupload');
          } 
    }

    

    }
    public function ubah_data(Request $request, $id){
    if($request->hasFile('foto_profil')){
      $file = $request->file('foto_profil');
       $extension = $file->getClientOriginalExtension();
        $filename   = md5(time().rand()).".".$file->getClientOriginalExtension();
         Storage::disk('local')->put($filename,  File::get($file));

        $tambah = Sales::find($id);
        $tambah->nama = $request->nama;
        $tambah->username = $request->username;
        $tambah->password = bcrypt($request->password);
        $tambah->ID_User = $request->ID_User;
        $tambah->no_hp = $request->no_hp;
        $tambah->updated_at = date('Y-m-d H:i:s');
        $tambah->regional = $request->regional;
        $tambah->witel = $request->witel;
        $tambah->datel = $request->datel;
        $tambah->sto = $request->sto;
        $tambah->agency = $request->agency;
        $tambah->kode_agency = $request->kode_agency;
        $tambah->foto_profil = $filename;
        $tambah->role = $request->role;
        $tambah->no_ktp = $request->no_ktp;
        $tambah->tmp_lahir = $request->tmp_lahir;
        $tambah->tgl_lahir = $request->tgl_lahir;
        $tambah->alamat = $request->alamat;
        $tambah->no_rek = $request->no_rek;
        $tambah->bank = $request->bank;
        $tambah->nama_pemilik_bank = $request->nama_pemilik_bank;
        $tambah->cabang_bank = $request->cabang_bank;
        $tambah->save();

            return redirect('sales')->with('error','Data terupdate dengan gambar');
            }else {               
        $tambah = Sales::find($id);
        $tambah->nama = $request->nama;
        $tambah->username = $request->username;
        $tambah->password = bcrypt($request->password);
        $tambah->ID_User = $request->ID_User;
        $tambah->no_hp = $request->no_hp;
        $tambah->updated_at = date('Y-m-d H:i:s');
        $tambah->regional = $request->regional;
        $tambah->witel = $request->witel;
        $tambah->datel = $request->datel;
        $tambah->sto = $request->sto;
        $tambah->agency = $request->agency;
        $tambah->kode_agency = $request->kode_agency;
        $tambah->role = $request->role;
        $tambah->no_ktp = $request->no_ktp;
        $tambah->tmp_lahir = $request->tmp_lahir;
        $tambah->tgl_lahir = $request->tgl_lahir;
        $tambah->alamat = $request->alamat;
        $tambah->no_rek = $request->no_rek;
        $tambah->bank = $request->bank;
        $tambah->nama_pemilik_bank = $request->nama_pemilik_bank;
        $tambah->cabang_bank = $request->cabang_bank;
        $tambah->save();
            return redirect('sales')->with('error','Data terupdate tidak dengan gambar');
          }

    }
        public function hapus(Request $request, $id){
        Sales::destroy($id);
            return redirect('sales');
        }
        
    public function ubah_password_sales(Request $request, $id){
        $tambah = Sales::find($id);
        $tambah->username = $request->username;
         $tambah->password = bcrypt($request->password);
         $tambah->updated_at = date('Y-m-d H:i:s');
        $tambah->save();

     return redirect('sales')->with('sukses_ubah_pass', 'Password Berhasil diubah');

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
        $ag = Agency::where('id_witel', $strwitel)->get();
        return response()->json(['hasil_witel'=>$h,'hasil_witel_agency'=>$ag]);
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
    public function cari_agency(Request $request)
    {
        $stragency    = $request->stragency;
        if ($stragency=='0')
        {
            $stragency='';
        }else {
            $stragency = $stragency;
        }
        $h = Kode_Agency::where('id_agency', $stragency)->get();
        return response()->json(['hasil_agency'=>$h]);
    }
    public function report(Request $request)
    {

         $d_witel = Witel::all();
        // Pagination

        $perPage = 10;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $witel = isset($_GET['witel']) ? $_GET['witel'] : '';
        $save = isset($_GET['save']) ? $_GET['save'] : '';

        $additionalParams = "";
        if(strlen($search) > 0){
            $additionalParams .= "&search=$search";
            $row = Sales::whereNotNull('ID_User')
            ->where("nama","LIKE","%$search%")->where("witel","LIKE","%$witel%")->count();
        }
        else{
            $row = Sales::whereNotNull('ID_User')->where("witel","LIKE","%$witel%")->count();
        }

        if($request->filled('month') and $request->filled('year'))
            $additionalParams .= "&month=$request->month&year=$request->year&witel=$witel&save=$save";

        $totalPage = ceil($row / $perPage);
        if($page < 1){$page = 1;}
        $links = 5;
        $list_class = "pagination";
        $last = $totalPage;
        $start      = ( ( $page - $links ) > 0 ) ? $page - $links : 1;
        $end        = ( ( $page + $links ) < $last ) ? $page + $links : $last;
        
        $html       = '<div class="pagination_wrap"><ul class="' . $list_class . '">';
        $class      = ( $page == 1 ) ? "disabled" : "paginate_button page-item ";
        $linkClass = "page-link";
        $html       .= '<li class="' . $class . '"><a class="'.$linkClass.'" href="'.url('report').'?page=' . ( $page - 1 ) . '">&laquo;</a></li>';
        if ( $start > 1 ) {
            $html   .= '<li class="' . $class . '"><a class="'.$linkClass.'" href="'.url('report').'?page=1'.$additionalParams.'">1</a></li>';
            $html   .= '<li class="disabled"><a class="'.$linkClass.'">...</a></li>';
        }
        for ( $i = $start ; $i <= $end; $i++ ) {
            $active  = ( ((int)$page) == $i ) ? " active" : "";
            $html   .= '<li class="' . $class . $active . '"><a class="'.$linkClass.'" href="'.url('report').'?page=' . $i . $additionalParams . '">' . $i . '</a></li>';
        }
        if ( $end < $last ) {
            $html   .= '<li class="disabled"><a class="'.$linkClass.'">...</a></li>';
            $html   .= '<li><a class="'.$linkClass.'" href="'.url('report').'?page=' . $last . $additionalParams . '">' . $last . '</a></li>';
        }
        $class      = ( $page == $last ) ? "disabled" : "";
        $html       .= '<li class="' . $class . '"><a class="'.$linkClass.'" href="'.url('report').'?page=' . ( $page + 1 ) . '">&raquo;</a></li>';
        $html       .= '</ul>';
        $html       .= '</div>';
        $page --;

        $d = Sales::getMultipleOrder(Sales::whereNotNull('ID_User')->where('witel','LIKE','%'.$witel.'%')->limit($perPage)->offset($page * $perPage)->get(),$request->month,$request->year);
        $sales = [];
        foreach ($d as $k => $a) {
            $fu = $a->follows;
            $track_id_follows = $fu->pluck("track_id")->toArray();
            $data = $a->orders;
            $totalFUOrder = 0;
            $allOrder = count($data);

            $dataForSales = [];
            $dataDetailForSales = [];
            for($i = 1; $i <= 6; $i++){
                $tmp =  new \stdClass;
                $tmp->FU =  $data->where("statusNum",$i)->whereIn("identity",$track_id_follows)->count();
                $tmp->NFU =  $data->where("statusNum",$i)->count() - $tmp->FU;
                $dataForSales[$i] = $tmp;
                $totalFUOrder += $tmp->FU;
                $tmp =  new \stdClass;
                $tmp->FU =  $data->where("statusNum",$i)->whereIn("identity",$track_id_follows);
                $tmp->NFU =  $data->where("statusNum",$i)->whereNotIn("identity",$track_id_follows);
                $dataDetailForSales[$i] = $tmp;
            }
            $d[$k]->report = $dataForSales;
            $d[$k]->report_detail = $dataDetailForSales;
            $d[$k]->totalOrder = $allOrder;
            $d[$k]->totalNFUOrder = $allOrder - $totalFUOrder;
            $d[$k]->totalFUOrder = $totalFUOrder;
        }
if($save == 'search'){     

       return view('report',['sales' =>$d,'pagination'=>$html,'lihat_witel' =>$d_witel,'page'=>$page + 1]);
}elseif($save == 'download'){
   $d = Sales::getMultipleOrder(Sales::whereNotNull('ID_User')->where('witel','LIKE','%'.$witel.'%')->get(),$request->month,$request->year);
        $sales = [];
        foreach ($d as $k => $a) {
            $fu = $a->follows;
            $track_id_follows = $fu->pluck("track_id")->toArray();
            $data = $a->orders;
            $totalFUOrder = 0;
            $allOrder = count($data);

            $dataForSales = [];
            $dataDetailForSales = [];
            for($i = 1; $i <= 6; $i++){
                $tmp =  new \stdClass;
                $tmp->FU =  $data->where("statusNum",$i)->whereIn("identity",$track_id_follows)->count();
                $tmp->NFU =  $data->where("statusNum",$i)->count() - $tmp->FU;
                $dataForSales[$i] = $tmp;
                $totalFUOrder += $tmp->FU;
                $tmp =  new \stdClass;
                $tmp->FU =  $data->where("statusNum",$i)->whereIn("identity",$track_id_follows);
                $tmp->NFU =  $data->where("statusNum",$i)->whereNotIn("identity",$track_id_follows);
                $dataDetailForSales[$i] = $tmp;
            }
            $d[$k]->report = $dataForSales;
            $d[$k]->report_detail = $dataDetailForSales;
            $d[$k]->totalOrder = $allOrder;
            $d[$k]->totalNFUOrder = $allOrder - $totalFUOrder;
            $d[$k]->totalFUOrder = $totalFUOrder;
        }
        return view('export_report',['sales' =>$d]);
      }else{
        return view('report',['sales' =>$d,'pagination'=>$html,'lihat_witel' =>$d_witel,'page'=>$page + 1]);
      }  
      
    }
//report admin
public function report_admin(Request $request)
    {

        $witel_id =\Auth::user()->witel;
        // Pagination

        $perPage = 10;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $save = isset($_GET['save']) ? $_GET['save'] : '';

        $additionalParams = "";
        if(strlen($search) > 0){
            $additionalParams .= "&search=$search";
            $row = Sales::whereNotNull('ID_User')
            ->where("nama","LIKE","%$search%")->where("witel","LIKE","%$witel_id%")->count();
        }
        else{
            $row = Sales::whereNotNull('ID_User')->where("witel","LIKE","%$witel_id%")->count();
        }

        if($request->filled('month') and $request->filled('year'))
            $additionalParams .= "&month=$request->month&year=$request->year&witel=$witel_id&save=$save";

        $totalPage = ceil($row / $perPage);
        if($page < 1){$page = 1;}
        $links = 5;
        $list_class = "pagination";
        $last = $totalPage;
        $start      = ( ( $page - $links ) > 0 ) ? $page - $links : 1;
        $end        = ( ( $page + $links ) < $last ) ? $page + $links : $last;
        
        $html       = '<div class="pagination_wrap"><ul class="' . $list_class . '">';
        $class      = ( $page == 1 ) ? "disabled" : "paginate_button page-item ";
        $linkClass = "page-link";
        $html       .= '<li class="' . $class . '"><a class="'.$linkClass.'" href="'.url('report_admin').'?page=' . ( $page - 1 ) . '">&laquo;</a></li>';
        if ( $start > 1 ) {
            $html   .= '<li class="' . $class . '"><a class="'.$linkClass.'" href="'.url('report_admin').'?page=1'.$additionalParams.'">1</a></li>';
            $html   .= '<li class="disabled"><a class="'.$linkClass.'">...</a></li>';
        }
        for ( $i = $start ; $i <= $end; $i++ ) {
            $active  = ( ((int)$page) == $i ) ? " active" : "";
            $html   .= '<li class="' . $class . $active . '"><a class="'.$linkClass.'" href="'.url('report_admin').'?page=' . $i . $additionalParams . '">' . $i . '</a></li>';
        }
        if ( $end < $last ) {
            $html   .= '<li class="disabled"><a class="'.$linkClass.'">...</a></li>';
            $html   .= '<li><a class="'.$linkClass.'" href="'.url('report_admin').'?page=' . $last . $additionalParams . '">' . $last . '</a></li>';
        }
        $class      = ( $page == $last ) ? "disabled" : "";
        $html       .= '<li class="' . $class . '"><a class="'.$linkClass.'" href="'.url('report_admin').'?page=' . ( $page + 1 ) . '">&raquo;</a></li>';
        $html       .= '</ul>';
        $html       .= '</div>';
        $page --;

        $d = Sales::getMultipleOrder(Sales::whereNotNull('ID_User')->where('witel','LIKE','%'.$witel_id.'%')->limit($perPage)->offset($page * $perPage)->get(),$request->month,$request->year);
        $sales = [];
        foreach ($d as $k => $a) {
            $fu = $a->follows;
            $track_id_follows = $fu->pluck("track_id")->toArray();
            $data = $a->orders;
            $totalFUOrder = 0;
            $allOrder = count($data);

            $dataForSales = [];
            $dataDetailForSales = [];
            for($i = 1; $i <= 6; $i++){
                $tmp =  new \stdClass;
                $tmp->FU =  $data->where("statusNum",$i)->whereIn("identity",$track_id_follows)->count();
                $tmp->NFU =  $data->where("statusNum",$i)->count() - $tmp->FU;
                $dataForSales[$i] = $tmp;
                $totalFUOrder += $tmp->FU;
                $tmp =  new \stdClass;
                $tmp->FU =  $data->where("statusNum",$i)->whereIn("identity",$track_id_follows);
                $tmp->NFU =  $data->where("statusNum",$i)->whereNotIn("identity",$track_id_follows);
                $dataDetailForSales[$i] = $tmp;
            }
            $d[$k]->report = $dataForSales;
            $d[$k]->report_detail = $dataDetailForSales;
            $d[$k]->totalOrder = $allOrder;
            $d[$k]->totalNFUOrder = $allOrder - $totalFUOrder;
            $d[$k]->totalFUOrder = $totalFUOrder;
        }
if($save == 'search'){     

       return view('report_admin',['sales' =>$d,'pagination'=>$html,'page'=>$page + 1]);
}elseif($save == 'download'){
   $d = Sales::getMultipleOrder(Sales::whereNotNull('ID_User')->where('witel','LIKE','%'.$witel.'%')->get(),$request->month,$request->year);
        $sales = [];
        foreach ($d as $k => $a) {
            $fu = $a->follows;
            $track_id_follows = $fu->pluck("track_id")->toArray();
            $data = $a->orders;
            $totalFUOrder = 0;
            $allOrder = count($data);

            $dataForSales = [];
            $dataDetailForSales = [];
            for($i = 1; $i <= 6; $i++){
                $tmp =  new \stdClass;
                $tmp->FU =  $data->where("statusNum",$i)->whereIn("identity",$track_id_follows)->count();
                $tmp->NFU =  $data->where("statusNum",$i)->count() - $tmp->FU;
                $dataForSales[$i] = $tmp;
                $totalFUOrder += $tmp->FU;
                $tmp =  new \stdClass;
                $tmp->FU =  $data->where("statusNum",$i)->whereIn("identity",$track_id_follows);
                $tmp->NFU =  $data->where("statusNum",$i)->whereNotIn("identity",$track_id_follows);
                $dataDetailForSales[$i] = $tmp;
            }
            $d[$k]->report = $dataForSales;
            $d[$k]->report_detail = $dataDetailForSales;
            $d[$k]->totalOrder = $allOrder;
            $d[$k]->totalNFUOrder = $allOrder - $totalFUOrder;
            $d[$k]->totalFUOrder = $totalFUOrder;
        }
        return view('export_report',['sales' =>$d]);
      }else{
        return view('report_admin',['sales' =>$d,'pagination'=>$html,'page'=>$page + 1]);
      }  
      
    }    

//report witel
    public function report_witel()
    {
 $witel = Witel::all();
         foreach ($witel as $k => $w) {
            $follow = Follow::select('track_id','witel','id_user')->where('witel',$w->witel)->get();
            $FUPluck = $follow->pluck('track_id')->toArray();
            $parner_id = $follow->pluck("id_user")->toArray();
            $NFU = oc_fcc::whereNotIn('identity',$FUPluck)->where("witel",strtoupper($w->witel))->where(function ($query) use($parner_id) {
             for ($i = 0; $i < count($parner_id); $i++){
                $query->orwhere('partner_id', 'like',  $parner_id[$i] .'%');
             }      
        })->count();
            $FU = count($follow);
            $witel[$k]->FU = $FU;
            $witel[$k]->NFU = $NFU;
            $witel[$k]->performance = round(($w->FU / ($w->FU + $w->NFU)) * 100,2)."%";
         }
         return view('report_witel',['lihat'=>$witel]);
    }
    //report Point Badge
    public function report_point()
    {
$d_witel = Witel::all();
 $sales = Sales::whereNotNull('ID_User')->get();

 return view('point_badge',['lihat'=>$sales,'lihat_witel' =>$d_witel]);
    }
public function report_point_admin(Request $request)
    {
$witel =\Auth::user()->witel;
$bulan_now = date('m');
$tahun_now = date('Y');
        $save = isset($_GET['save']) ? $_GET['save'] : '';    
        $bulan = isset($_GET['bulan']) ? $_GET['bulan'] : '';
        $tahun = isset($_GET['tahun']) ? $_GET['tahun'] : '';

        
if($save == 'search'){
   $sales = Sales::join('points','sales.id','points.sales_id')
                    ->select('sales.nama','sales.ID_User','sales.witel','points.point','points.date')
                    ->whereNotNull('sales.ID_User')
                    ->whereMonth('points.date','LIKE','%'.$bulan.'%')
                    ->whereYear('points.date','LIKE','%'.$tahun.'%')
                    ->where('sales.witel','LIKE','%'.$witel.'%')
                    ->get();
    
return view('report_point_admin',['lihat'=>$sales]);

}elseif($save == 'download'){
   $sales = Sales::join('points','sales.id','points.sales_id')
                    ->select('sales.nama','sales.ID_User','sales.witel','points.point','points.date')
                    ->whereNotNull('sales.ID_User')
                    ->whereMonth('points.date','LIKE','%'.$bulan.'%')
                    ->whereYear('points.date','LIKE','%'.$tahun.'%')
                    ->where('sales.witel','LIKE','%'.$witel.'%')
                    ->get();
return view('download_point_badge',['lihat'=>$sales]);  
}else{
     $sales = Sales::whereNotNull('ID_User')
            ->where('sales.witel','LIKE','%'.$witel.'%')->get();
    
return view('point_admin',['lihat'=>$sales]);


}
}
    public function sortir_report_point(Request $request)
    {   
        $d_witel = Witel::all();
        $save = $request->save;    
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $witel = $request->witel;
        if ($witel=='0')
        {
            $witel='';
        }else{
            $witel=$witel;
        }

        if ($bulan=='0')
        {
            $bulan='';
        }else{
            $bulan=$bulan;
        }

        if ($tahun=='0')
        {
            $tahun='';
        }else{
            $tahun=$tahun;
        }

        
if($save == 'search'){
   $sales = Sales::join('points','sales.id','points.sales_id')
                    ->select('sales.nama','sales.ID_User','sales.witel','points.point','points.date')
                    ->whereNotNull('sales.ID_User')
                    ->whereMonth('points.date','LIKE','%'.$bulan.'%')
                    ->whereYear('points.date','LIKE','%'.$tahun.'%')
                    ->where('sales.witel','LIKE','%'.$witel.'%')
                    ->get();
    
return view('sortir_point_badge',['lihat'=>$sales,'lihat_witel' =>$d_witel]);

}elseif($save == 'download'){
   $sales = Sales::join('points','sales.id','points.sales_id')
                    ->select('sales.nama','sales.ID_User','sales.witel','points.point','points.date')
                    ->whereNotNull('sales.ID_User')
                    ->whereMonth('points.date','LIKE','%'.$bulan.'%')
                    ->whereYear('points.date','LIKE','%'.$tahun.'%')
                    ->where('sales.witel','LIKE','%'.$witel.'%')
                    ->get();
return view('download_point_badge',['lihat'=>$sales]);  
}
    }

    
public function sortir_witel_sales(Request $request)
    {
       
        $status    = $request->status;
        $strwitel    = $request->srtwitel;
        if ($strwitel=='0')
        {
            $strwitel='';
        }else {
            $strwitel = $strwitel;
        }

        if ($status == '2') {
            $h = Sales::where('witel',$strwitel)
                       ->whereNull('ID_User')
                        ->get();
        }else if($status == '1'){
            $h = Sales::where('witel',$strwitel)
                         ->whereNotNull('ID_User')
                        ->get();
        }else{
             $h = Sales::where('witel', 'LIKE', '%' . $strwitel . '%')
                        ->get();
        }
         
        return response()->json(['hasil_sortir'=>$h]);
        
    }
public function export_sales(Request $request){
       $status    = $request->status;
        $witel    = $request->witel;
        if ($witel=='0')
        {
            $witel='';
        }else {
            $witel = $witel;
        }

         if ($status == '2') {
            $h = Sales::where('witel',$witel)
                       ->whereNull('ID_User')
                        ->get();
        }else if($status == '1'){
            $h = Sales::where('witel',$witel)
                         ->whereNotNull('ID_User')
                        ->get();
        }else{
             $h = Sales::where('witel', 'LIKE', '%' . $witel . '%')
                        ->get();
        }
            return view('export_sales',['lihat' =>$h]);

        }
        public function cari_sales(Request $request)
    {
       
        $status    = $request->status;
        $strwitel    = $request->witel;
        if ($strwitel=='0')
        {
            $strwitel='';
        }else {
            $strwitel = $strwitel;
        }

        if ($status == '2') {
            $h = Sales::where('witel',$strwitel)
                       ->whereNull('ID_User')
                        ->get();
        }else if($status == '1'){
            $h = Sales::where('witel',$strwitel)
                         ->whereNotNull('ID_User')
                        ->get();
        }else{
             $h = Sales::where('witel', 'LIKE', '%' . $strwitel . '%')
                        ->get();
        }

         
        $d_regional = Regional::all();
             $d_witel = Witel::all();
             $d_datel = Datel::all();
             $d_sto = STO::all();
            $d_agency = Agency::all();
            $d_kode_agency = Kode_Agency::all();
            // dd($d);
            return view('sales',['lihat' =>$h,'lihat_witel' =>$d_witel,'lihat_datel' =>$d_datel,'lihat_sto' =>$d_sto,'lihat_regional' =>$d_regional,'lihat_agency' =>$d_agency, 'lihat_kode_agency' =>$d_kode_agency]);
        
    }

    public function cari_username(Request $request)
    {
        $username = $request->username;
       $h = Sales::where('username','=',$username)->get();
     return response()->json(['hasil_username'=>$h]);
    }

    

}




