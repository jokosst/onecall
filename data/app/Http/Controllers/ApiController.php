<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use DB;
use Response;
use App\oc_bsn;
use App\oc_fcc;
use App\oc_ms2;
use App\oc_payment;
use App\oc_starclick;
use App\Sales;
use App\Follow;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use danog\MadelineProto\API;
use App\teknisi;
use Carbon\Carbon;
use App\UserLog;
use App\Points;
use App\Notifications;

use App\Regional;
use App\Witel;
use App\Datel;
use App\Agency;
use App\STO;
use App\Kode_Agency;


class ApiController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
    }

    public function login(Request $req)
    {
        $a = Sales::where("username", $req->username)->first();
        if($a == null){
            return response()->json(['message' => 'Username atau password salah', "status" => false]);
        }
        $b = password_verify($req->password, $a->password);
        if ($b)
        {
            if($a->ID_User == null){
                return response()->json(['message' => 'Sales belum aktif, silahkan menghubungi admin. ', "status" => false]);
            }
            Auth::guard("api")->setUser($a);
            $data = [];
            $user = Auth::guard("api")->user();

            if ($user->api_token == null){
                $user->api_token = sha1($user->username . str_random(40));
            }

            $device_id = Input::get("device_id");
            if(strlen($device_id) > 0){
                $user->device_id = $device_id;
            }
            $user->save();
            $data['user'] = $user;
            $data['api_token'] = Auth::guard("api")->user()->api_token;
            $data['status'] = true;
            $this->salesLog("login ke aplikasi. ");
            return response()->json($data);
        }
        return response()->json([$b, 'message' => 'username atau password salah', "status" => false]);
    }

    public function changePassword(Request $req)
    {
        $a = Auth::guard("api")->user();
        $b = password_verify($req->current, $a->password);
        if($b){
            $a->password = bcrypt($req->new);

            $this->salesLog("mengganti password. ");
            $a->save();
            return response()->json(['message'=>"success","code"=>1],200);
        }
        else{
            $this->salesLog("mencoba mengganti password tapi gagal. ");
            return response()->json(['message'=>"Access Denied","code",0],401);
        }
    }

    public function changeProfile(Request $req)
    {
        $user = Auth::guard("api")->user();

        $file = str_random("10")."-".time().".jpg";
        $path = base_path()."/storage/profil/".$file;

        file_put_contents($path, base64_decode($req->image));

        $user->foto_profil = $file;
        $user->save();
        $this->salesLog("mengganti foto profil. ");
        return response()->json(['message'=>"success"],200);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::guard("api")->user();
        if($request->filled('nama'))
            $user->nama = $request->nama;
        if($request->filled('hp'))
            $user->no_hp = $request->hp;
        if($request->filled('no_ktp'))
            $user->no_ktp = $request->no_ktp;
        if($request->filled('tempat_lahir'))
            $user->tmp_lahir = $request->tempat_lahir;
        if($request->filled('tanggal_lahir'))
            $user->tgl_lahir = $request->tanggal_lahir;
        if($request->filled('alamat'))
            $user->alamat = $request->alamat;
        if($request->filled('no_rekening'))
            $user->no_rek = $request->no_rekening;
        if($request->filled('bank'))
            $user->bank = $request->bank;
        if($request->filled('pemilik_bank'))
            $user->nama_pemilik_bank = $request->pemilik_bank;
        if($request->filled('bank_cabang'))
            $user->cabang_bank = $request->bank_cabang;
        if($request->filled('regional'))
            $user->regional = $request->regional;
        if($request->filled('witel'))
            $user->witel = $request->witel;
        if($request->filled('datel'))
            $user->datel = $request->datel;
        if($request->filled('sto'))
            $user->sto = $request->sto;
        if($request->filled('agency'))
            $user->agency = $request->agency;
        if($request->filled('kode_agency'))
            $user->kode_agency = $request->kode_agency;
        $user->save();
        return response()->json(['status'=>true]);
    }

    public function order()
    {
        $type = (int)Input::get("type") ?? 2;
        $month = (int)Input::get("month") ?? 0;
        $status = Input::get("status") ?? [];
        $search = Input::get("search") ?? '';

        $lat = Input::get("current_lat");
        $lng = Input::get("current_lng");

        if(Input::get('page') <= 1 && $type == 1){
            if($month == 0 && count($status) == 0 && $search == ''){
                $this->salesLog("membuka halaman order. ",$lat,$lng);
            }
            elseif($month == 0 && count($status) == 0 && strlen($search) > 0){
                $this->salesLog("mencari $search di halaman order. ",$lat,$lng);
            }
            elseif(count($status) > 0){
                $statusLabel = [];
                foreach ($status as $s) {
                    $statusLabel[] = $this->generateStatus($s);
                }
                $statusLabel = implode(", ",$statusLabel);
                if($month == 0 && $search == ''){
                    $this->salesLog("memfilter status: $statusLabel pada order. ",$lat,$lng);
                }
                elseif($month == 0){
                    $this->salesLog("memfilter status: $statusLabel pada order dan mencari $search di halaman order. ",$lat,$lng);
                }
                elseif($search == ''){
                    $bulan = $this->generateMonth($month);
                    $this->salesLog("memfilter status: $statusLabel dan memfilter bulan $bulan pada order. ",$lat,$lng);
                }
                else{
                    $bulan = $this->generateMonth($month);
                    $this->salesLog("memfilter status: $statusLabel, memfilter bulan $bulan pada order dan mencari $search di halaman order.  ",$lat,$lng);
                }
            }
        }

        $data = $this->getOrder($type,$month,$status,$search);
        $data_oc_fcc = $data['data_oc_fcc'];
        return Response::json($data_oc_fcc,$data['code']);
    }

    public function home()
    {
        $user = Auth::guard("api")->user();
        $this->salesLog("membuka halaman beranda. ",Input::get("current_lat"),Input::get("current_lng"));
        $data = [];
        $data['foto_profil'] = asset('data/storage/profil/'.$user->foto_profil);
        $data['nama'] = $user->nama;
        $data['ID_User'] = $user->ID_User;

        $data_oc_fcc = oc_fcc::select('oc_fcc.identity', 'oc_fcc.nama_ktp', 'oc_fcc.email', 'oc_fcc.hp', 'oc_fcc.appointment', 'oc_fcc.reason', 'oc_fcc.partner_id', 'oc_fcc.order_dtm', 'oc_fcc.witel', 'oc_fcc.regional')->where('oc_fcc.partner_id','LIKE', $user->ID_User."%")->get();

        $data['total_order'] = 0;
        $totalToday = 0;

        $identities = $data_oc_fcc->pluck('identity')->toArray();

        $starclicks = oc_starclick::whereIn("TRACK_ID", $identities)->get();
        $oc_ms2s = oc_ms2::select("fee", "myir")->whereIn("myir", $identities)->get();
        $total_fee = 0;
        foreach ($data_oc_fcc as $i => $data_fcc) {
          $starclick = $starclicks->where('TRACK_ID', $data_fcc->identity)
                ->sortByDesc('ORDER_ID')
                ->where("STATUS_RESUME",'Completed (PS)')
                ->first();
          $oc_ms2 = $oc_ms2s->where('myir', $data_fcc->identity)
                ->where('myir', $data_fcc->identity)
                ->sortByDesc('fee')
                ->first();

            if($oc_ms2 == null){
                $oc_ms2 = collect();
                $oc_ms2->fee = 0;
            }
            $time = strtotime($data_fcc->order_dtm);
            $tahun = date("Y",$time);
            $bulan = date("m",$time);
            $hari = date("d",$time);
            $tahunN = date("Y");
            $bulanN = date("m");
            $hariN = date("d");
            if($tahun == $tahunN && $bulan == $bulanN){
              $data['total_order']++;
              if($hari == $hariN){
                $totalToday++;
              }
            }

          if($starclick == null){
            unset($data_oc_fcc[$i]);
          }
          else{
            $time = strtotime($starclick->ORDER_DATE_PS);
            $tahun = date("Y",$time);
            $bulan = date("m",$time);
            $tahunN = date("Y");
            $bulanN = date("m");
            if($tahun == $tahunN && $bulan == $bulanN){
              $total_fee += $oc_ms2->fee;
            }
            else{
              unset($data_oc_fcc[$i]);
            }
          }
        }

        $oc_bsn_data = oc_bsn::where("id_bsn",'like',$user->ID_User."_".ucfirst(Carbon::now()->format('M Y')))->first();
        $total_fee = $oc_bsn_data->thp_total ?? 0;
        $data['total_order_ps'] = $oc_bsn_data->ps_total ?? 0;

        $data['total_fee'] = "Rp.".number_format($total_fee,0,",",".");
        $data['bulan'] = $this->generateMonth(date("m"));
        

        //get total followed up
        $data['total_followed_up'] = follow::where("id_user",Auth::guard("api")->user()->ID_User)->whereMonth('timestamp',date("m"))->count();

        if($totalToday == 0){
            $greet = "masih 0, ayoo semangat lagi jualannya :)";
        }
        elseif($totalToday >= 1 and $totalToday <= 4){
            $greet = "$totalToday, semangat tambah lagi inputannya";
        }
        elseif($totalToday >= 5 and $totalToday <= 10){
            $greet = "$totalToday, keren banget gas terussss";
        }
        elseif($totalToday > 10){
            $greet = "$totalToday, luar biasa keren pertahankan";
        }

        $points = $user->points()->orderBy('date','desc')->get();

		$point = 0;
		if(isset($points[0]) and Carbon::parse($points[0]->date)->format('Y m') == Carbon::now()->format("Y m")){
			$point = $points[0]->point;
		}

        foreach ($points as $k => $p) {
           $aa = new \stdClass;
           $aa->point = $p->point." Points";
           if($p->point <= 90){
                $aa->label = "Newbie";
                $aa->image = "img/crown.svg";
            }
            elseif($p->point > 90 and $p->point <= 180){
                $aa->label = "Commoner";
                $aa->image = "img/crown2.svg";
            }
            elseif($p->point > 180 and $p->point <= 270){
                $aa->label = "Master";
                $aa->image = "img/crown3.svg";
            }
            else{
                $aa->label = "Grand Master";
                $aa->image = "img/crown4.svg";
            }
            $aa->month = $this->generateMonth(Carbon::parse($p->date)->format('m'))." ".Carbon::parse($p->date)->format('Y');
            $points[$k] = $aa;
        }

        $level = new \stdClass;

        if($point <= 90){
            $level->label = "Newbie";
            $level->image = "img/crown.svg";
        }
        elseif($point > 90 and $point <= 180){
            $level->label = "Commoner";
            $level->image = "img/crown2.svg";
        }
        elseif($point > 180 and $point <= 270){
            $level->label = "Master";
            $level->image = "img/crown3.svg";
        }
        else{
            $level->label = "Grand Master";
            $level->image = "img/crown4.svg";
        }

        $data['point'] = $point;
        $data['points'] = $points;
        $data['level'] = $level;
        $data['greet'] = "Inputan hari ini ".$greet;

        $notif = Notifications::where("sales_id",$user->id)->orderBy("timestamp","desc")->limit(10)->get();

        if($notif == null){
            $notif = [];
        }

        foreach ($notif as $nk => $nt) {
            if($nt->type == 'order'){
                $dataOrder = json_decode($nt->data);
                $follow = follow::where('track_id',$dataOrder->myir)->first();
                if($follow == null){
                    $nt->openable = true;
                }
                else{
                    $nt->openable = false;
                }
            }
            $notif[$nk] = $nt;
        }

        $data['notif'] = $notif;
        $data['notif_new'] = false;

        if(count($notif) > 0){
            if($notif != null and isset($notif[0]) and $notif[0]->read == null){
                $data['notif_new'] = true;
            }
        }

        return response()->json($data);
    }

    public function notifOpened()
    {
        $user = Auth::guard('api')->user();
        Notifications::where("sales_id",$user->id)->whereNull('read')->update(['read' => 1]);
        return response()->json(['status'=>'success']);
    }

    public function created_follow()
    {
        $img = Input::get("img") ?? [];
        $uploaded = [];
        foreach ($img as $i) {
            $file = str_random("10")."-".time().".jpg";
            $path = base_path()."/storage/uploads/".$file;
            file_put_contents($path, base64_decode($i));
            $uploaded[] = "/data/storage/uploads/$file";
        }
        $tambah = new Follow;
        $tambah->id_user = Auth::guard("api")->user()->ID_User;
        $tambah->track_id = Input::get('track_id');
        $tambah->nama = Input::get('nama');
        $tambah->no_hp = Input::get('no_hp');
        $tambah->no_hp_alt = Input::get('no_hp_alt') ?? "0";
        $tambah->appointment = date("Y-m-d",strtotime(Input::get('appointment')));
        $tambah->appointment_waktu = Input::get('appointment-waktu');
        $tambah->lat = Input::get('lat');
        $tambah->lng = Input::get('lng');
        $tambah->alamat = Input::get('address');
        $tambah->odp_terdekat = Input::get('odp_terdekat');
        $tambah->catatan = Input::get('catatan');
        $tambah->foto = json_encode($uploaded);

        $lengkap = true;
        // or $tambah->odp_terdekat == ''
        if($tambah->no_hp_alt == '' or $tambah->catatan = '' or count($uploaded) == 0){
            $lengkap = false;
        }
        $o = $this->getSingleOrder($tambah->track_id);

        $tambah->email = $o->email;
        $tambah->witel = $o->witel;
        $tambah->odp = $o->ODP;
        $tambah->nd_telp = $o->ND_TELP;

        $now = Carbon::parse($o->order_dtm);
        $end = Carbon::now();
        $jarak = $end->diffInDays($now);

        $point = 1;
        if($jarak == 0){
            if($lengkap) $point = 4;
            else $point = 3;
        }
        elseif($jarak > 0 and $jarak <= 2){
            if($lengkap) $point = 3;
            else $point = 3;
        }
        else{
            if($lengkap) $point = 2;
            else $point = 1;
        }


        $user = Auth::guard("api")->user();
        $point += $user->points()->where('date',Carbon::now()->format('Y-m')."-1")->first()->point ?? 0;

        Points::updateOrCreate([
            'sales_id'=>Auth::guard("api")->user()->id,
            'date'=>Carbon::now()->format('Y-m')."-1"
        ],['point'=>$point]);


        if($o->statusNum == 4){
            if($this->sendTelegramOrder($tambah,$o)){
                $tambah->done = 1;
            }
        }
        if($o->statusNum == 5){
            $tambah->done = 1;
        }
        $tambah->save();

        $this->salesLog("menambah followed up atas nama $tambah->nama. ");

        return Response::json(["status"=>"success"]);
     }

    public function lab2(){
$final = [];
        $mybsn = oc_bsn::where('id_bsn','like',"SPWRA96".Carbon::now()->format('_M Y'))->first();
        if($mybsn != null){
            $data = new \stdClass;
            $data->user_id = $mybsn->partner_id;
            $data->ps_total = $mybsn->ps_total;
            $data->ps_group = $mybsn->ps_grup1;
            $final[] = $data;
        }
        else{
            $data = new \stdClass;
            $data->user_id = "SPWRA96";
            $data->ps_total = "Failed";
            $final[] = $data;
        }
        $bsn = oc_bsn::where('upline_id',"SPWRA96")->where('id_bsn','like','%'.Carbon::now()->format('M Y'))->orderBy('nomor')->get();
        $bsnc = collect($bsn);
        $bsnid = $bsn->pluck('partner_id')->toArray();
        $sales = Sales::whereNull("ID_User")->where('upline_id',2)->get();
        $j = 0;
        for ($i=1; $i <= 9; $i++) {
            $temp = new \stdClass;
            $bsn_downline = $bsnc->where("nomor",$i)->first();
            if($bsn_downline == null and isset($sales[$j])){
                $temp->user_id = $sales[$j]->nama;
                $temp->ps_total = null;
                $temp->text = "Pending";
                $j++;
            }
            elseif($bsn_downline != null){
                $temp->user_id = $bsn_downline->partner_id;
                $temp->ps_total = $bsn_downline->ps_total;
                $temp->ps_group = $bsn_downline->ps_grup1;
            }
            else{
                $temp = null;
            }
            $final[] = $temp;
        }
        dd($final);
    }
        
    public function lab1()
    {
    }

    public function followOne()
    {
        $track_id = Input::get("track_id");
        $follow = follow::where("track_id",$track_id)->first();
        $foto = json_decode($follow->foto);
        foreach ($foto as $i => $f) {
            $foto[$i] = asset($f);

        }
        $follow->foto = $foto;
        return response()->json($follow);
    }


    /*
    Parameters:
    type =
        1:all
        2:inbox (order except followed up)
        3:follow (order that followed up)
    month = filter untuk bulan
    status = filter untuk status(Array);
    */
    function getOrder($type = 1,$month = 0, $status = [],$search = "")
    {
        $perPage = 10;
        $user = Auth::guard("api")->user();
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        if ($page < 1){$page = 1;}

        $data_oc_fcc = oc_fcc::select('*',DB::raw("STR_TO_DATE(`order_dtm`,'%d-%b-%y') as order_dtm"))->where('oc_fcc.partner_id','LIKE', $user->ID_User."%");

        if(strlen($search) > 0){
            $data_oc_fcc = $data_oc_fcc->where('oc_fcc.nama_ktp','LIKE', "%".$search."%");
        }

        if($type == 2){
            $followedOrder = follow::select('track_id')->where("id_user",$user->ID_User)->get();
            $followedOrder = $followedOrder->pluck('track_id')->toArray();
            $data_oc_fcc = $data_oc_fcc->whereNotIn('oc_fcc.identity', $followedOrder);
        }
        elseif($type == 3){
            $followedOrder = follow::select('track_id')->where("id_user",$user->ID_User)->get();
            $followedOrder = $followedOrder->pluck('track_id')->toArray();
            $data_oc_fcc = $data_oc_fcc->whereIn('oc_fcc.identity', $followedOrder);
        }
        if($month > 0){
            // $month = strtoupper($this->generateMonth($month));
            // $data_oc_fcc = $data_oc_fcc->where('oc_fcc.order_dtm', 'LIKE', "%".$month."%");
            $data_oc_fcc = $data_oc_fcc->whereMonth('order_dtm', $month);
        }

        // get count
        $row = $data_oc_fcc->select('identity')->count();

        // get all
        $data_oc_fcc_all = $data_oc_fcc->select('identity')->get();
        $allIdentities = $data_oc_fcc_all->pluck('identity')->toArray();

        // pagination
        $offset = ($page-1) * $perPage;
        $data_oc_fcc = $data_oc_fcc->select('*',DB::raw("STR_TO_DATE(`order_dtm`,'%d-%b-%y') as order_dtm"))->orderBy("order_dtm","desc")->limit($perPage)->offset($offset)->get();


        $identities = $data_oc_fcc->pluck('identity')->toArray();
        $starclicks = oc_starclick::whereIn("TRACK_ID", $identities)->get();
        $oc_ms2s = oc_ms2::select("fee", "myir")->whereIn("myir", $identities)->get();

        $data_oc_fcc_count = count($identities);
        foreach ($data_oc_fcc as $i => $data)
        {
            $starclick = $starclicks->where('TRACK_ID', $data->identity)
                ->sortByDesc('ORDER_ID')
                ->first();
                
            $oc_ms2 = $oc_ms2s->where('myir', $data->identity)
                ->where('myir', $data->identity)
                ->sortByDesc('fee')
                ->first();

            $data_oc_fcc[$i] = $this->generateOrder($data,$oc_ms2,$starclick);

            if(count($status) > 0){
                if(!in_array($data_oc_fcc[$i]->statusNum,$status)){
                    unset($data_oc_fcc[$i]);
                }
            }
        }

        //check if this last page
        if(($row - ($offset + $perPage)) >= 0){
            goto skip_fcc;
        }

        //get order that doesn't exists in fcc;
        $data_oc_startclick = oc_starclick::where('KCONTACT','LIKE', "%".$user->ID_User."%")->whereNotIn("TRACK_ID", $allIdentities);

        if(strlen($search) > 0){
            $data_oc_startclick = $data_oc_startclick->where('CUSTOMER_NAME','LIKE', "%".$search."%");
        }

        if($type == 2){
            $followedOrder = follow::select('track_id')->where("id_user",$user->ID_User)->get();
            $followedOrder = $followedOrder->pluck('track_id')->toArray();
            $data_oc_startclick = $data_oc_startclick->whereNotIn('TRACK_ID', $followedOrder);
        }
        elseif($type == 3){
            $followedOrder = follow::select('track_id')->where("id_user",$user->ID_User)->get();
            $followedOrder = $followedOrder->pluck('track_id')->toArray();
            $data_oc_startclick = $data_oc_startclick->whereIn('TRACK_ID', $followedOrder);
        }
        if($month > 0){
            $data_oc_startclick = $data_oc_startclick->whereMonth('ORDER_DATE', '=', $month);
        }


        $a = 0 - $row % $perPage;
        $offset = $a + $perPage * ($page - floor($row/$perPage) - 1);
        $limit = $perPage;
        if($offset < 0){
            $limit = $perPage + $offset;
            $offset = 0;
        }

        $data_oc_startclick = $data_oc_startclick->orderBy("ORDER_DATE","desc")->offset($offset)->limit($limit)->get();
        $data_oc_startclick = collect($data_oc_startclick);
        $data_oc_startclick = $data_oc_startclick->groupBy('TRACK_ID');
        $new_data_oc_startclick = [];

        foreach ($data_oc_startclick as $i => $data) {
            $data = $data->sortByDesc("ORDER_ID")->first();

            $oc_ms2 = $oc_ms2s->where('myir', $data->TRACK_ID)
                ->where('myir', $data->TRACK_ID)
                ->sortByDesc('fee')
                ->first();

            $newData = $this->generateOrder(null,$oc_ms2,$data,'starclick');

            if(count($status) == 0 || in_array($newData->statusNum,$status)){
                array_push($new_data_oc_startclick, $newData);
            }
        }

        $data_oc_fcc = collect($data_oc_fcc);
        $data_oc_startclick = collect($new_data_oc_startclick);

        $data_oc_fcc = $data_oc_fcc->merge($data_oc_startclick);

        skip_fcc:
        $totalPage = ceil($row / $perPage);
        $data = [];
        $data['row'] = $row;
        $data['totalPage'] = $totalPage;
        $data['data_oc_fcc'] = $data_oc_fcc;
        $data['code'] = 200;
        if($page >= $totalPage && count($data_oc_fcc) == 0){
            $data['code'] = 404;
        }
        return ($data);
    }

    public function loginTelegram()
    {
        $madelineProto = new API([
            'authorization' => [
                'rsa_keys' => [
'-----BEGIN RSA PUBLIC KEY-----
MIIBCgKCAQEAwVACPi9w23mF3tBkdZz+zwrzKOaaQdr01vAbU4E1pvkfj4sqDsm6
lyDONS789sVoD/xCS9Y0hkkC3gtL1tSfTlgCMOOul9lcixlEKzwKENj1Yz/s7daS
an9tqw3bfUV/nqgbhGX81v/+7RFAEd+RwFnK7a+XYl9sluzHRyVVaTTveB2GazTw
Efzk2DWgkBluml8OREmvfraX3bkHZJTKX4EQSjBbbdJ2ZXIsRrYOXfaA+xayEGB+
8hdlLmAjbCVfaigxX0CDqWeR1yFL9kwd9P0NsZRPsmoqVwMbMu7mStFai6aIhc3n
Slv8kg9qv1m6XHVQY3PnEw+QQtqSIXklHwIDAQAB
-----END RSA PUBLIC KEY-----',
'-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAruw2yP/BCcsJliRoW5eB
VBVle9dtjJw+OYED160Wybum9SXtBBLXriwt4rROd9csv0t0OHCaTmRqBcQ0J8fx
hN6/cpR1GWgOZRUAiQxoMnlt0R93LCX/j1dnVa/gVbCjdSxpbrfY2g2L4frzjJvd
l84Kd9ORYjDEAyFnEA7dD556OptgLQQ2e2iVNq8NZLYTzLp5YpOdO1doK+ttrltg
gTCy5SrKeLoCPPbOgGsdxJxyz5KKcZnSLj16yE5HvJQn0CNpRdENvRUXe6tBP78O
39oJ8BTHp9oIjd6XWXAsp2CvK45Ol8wFXGF710w9lwCGNbmNxNYhtIkdqfsEcwR5
JwIDAQAB
-----END PUBLIC KEY-----',
'-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAvfLHfYH2r9R70w8prHbl
Wt/nDkh+XkgpflqQVcnAfSuTtO05lNPspQmL8Y2XjVT4t8cT6xAkdgfmmvnvRPOO
KPi0OfJXoRVylFzAQG/j83u5K3kRLbae7fLccVhKZhY46lvsueI1hQdLgNV9n1cQ
3TDS2pQOCtovG4eDl9wacrXOJTG2990VjgnIKNA0UMoP+KF03qzryqIt3oTvZq03
DyWdGK+AZjgBLaDKSnC6qD2cFY81UryRWOab8zKkWAnhw2kFpcqhI0jdV5QaSCEx
vnsjVaX0Y1N0870931/5Jb9ICe4nweZ9kSDF/gip3kWLG0o8XQpChDfyvsqB9OLV
/wIDAQAB
-----END PUBLIC KEY-----',
'-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAs/ditzm+mPND6xkhzwFI
z6J/968CtkcSE/7Z2qAJiXbmZ3UDJPGrzqTDHkO30R8VeRM/Kz2f4nR05GIFiITl
4bEjvpy7xqRDspJcCFIOcyXm8abVDhF+th6knSU0yLtNKuQVP6voMrnt9MV1X92L
GZQLgdHZbPQz0Z5qIpaKhdyA8DEvWWvSUwwc+yi1/gGaybwlzZwqXYoPOhwMebzK
Uk0xW14htcJrRrq+PXXQbRzTMynseCoPIoke0dtCodbA3qQxQovE16q9zz4Otv2k
4j63cz53J+mhkVWAeWxVGI0lltJmWtEYK6er8VqqWot3nqmWMXogrgRLggv/Nbbo
oQIDAQAB
-----END PUBLIC KEY-----',
'-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAvmpxVY7ld/8DAjz6F6q0
5shjg8/4p6047bn6/m8yPy1RBsvIyvuDuGnP/RzPEhzXQ9UJ5Ynmh2XJZgHoE9xb
nfxL5BXHplJhMtADXKM9bWB11PU1Eioc3+AXBB8QiNFBn2XI5UkO5hPhbb9mJpjA
9Uhw8EdfqJP8QetVsI/xrCEbwEXe0xvifRLJbY08/Gp66KpQvy7g8w7VB8wlgePe
xW3pT13Ap6vuC+mQuJPyiHvSxjEKHgqePji9NP3tJUFQjcECqcm0yV7/2d0t/pbC
m+ZH1sadZspQCEPPrtbkQBlvHb4OLiIWPGHKSMeRFvp3IWcmdJqXahxLCUS1Eh6M
AQIDAQAB
-----END PUBLIC KEY-----'
                ]
            ],
            'app_info' => [
                'api_id' => '120192',
                'api_hash' => 'cba8aafdf51001281733788b9d648f2c'
            ]
        ]);
        $madelineProto->session = storage_path('session.onecall');

        $number = '+6281256066004';
        $madelineProto->phone_login($number);
        $madelineProto->serialize();
        return "true";
    }

    public function loginCode($c)
    {
        $madelineProto = new API(storage_path('session.onecall'));
        $code = $c;
        $auth = $madelineProto->complete_phone_login($code);
        $a = $madelineProto->serialize();
        return "true";
    }

    public function sendTelegramOrder($order,$orderGajah = null)
    {
        $aaa = Storage::get("log.txt");
        $aaa = Storage::put("log.txt",$aaa."\nrequest - ".Carbon::now());
        if($orderGajah == null){
            $orderGajah = $this->getSingleOrder($order->track_id);
        }
        $sto = $orderGajah->XS2;
        $teknisi = teknisi::where("sto",'LIKE',"%$sto%")->orderBy("last_message","asc")->first();
        if($teknisi == null){
            return false;
        }
        $madelineProto = new API(storage_path('session.onecall'));
        $contacts = $madelineProto->contacts->importContacts([
            'contacts' => [
                [
                    '_' => 'inputPhoneContact',
                    'client_id' => 120192,
                    'phone' => $teknisi->no_telegram,
                    'first_name' => '',
                    'last_name' => ''
                ]

            ],
        ]);
        if(!isset($contacts['imported'][0]['user_id'])){
            return false;
        }
        $madelineProto->messages->sendMessage([
            "peer"=>'user#' . $contacts['imported'][0]['user_id'],
            "message"=>"No. SC: $orderGajah->ORDER_ID\n$orderGajah->nama_ktp\n$order->alamat\n$order->catatan\n$orderGajah->SPEEDY\n$orderGajah->ND_TELP\n$orderGajah->ODP\n$orderGajah->KCONTACT\n$order->no_hp_alt\n".date("d F Y",strtotime($order->appointment))." $order->appointment_waktu\n$order->email\nTerdekat : $order->odp_terdekat\nGoogle Maps Link: https://www.google.com/maps/?q=$order->lat,$order->lng"
        ]);
        $images = json_decode($order->foto,true);
        foreach($images as $i){
            $madelineProto->messages->sendMedia([
                'media'=>[
                    '_' => 'inputMediaUploadedPhoto', 
                    'file' => substr($i, 1)
                ],
                "message"=>"No. SC: $orderGajah->ORDER_ID",
                "peer"=>'user#' . $contacts['imported'][0]['user_id']
            ]);
        }
        $teknisi->last_message = Carbon::now();
        $teknisi->save();

        $order->teknisi_id = $teknisi->id;
        $order->save();

        $defaultGroupName = "New Onecall Develop";
        $groupWitel = strtoupper($orderGajah->witel);
        if($groupWitel == "KALBAR" or $groupWitel == "PONTIANAK"){
            $groupName = "Onecall Implementation Kalbar";
        }
        elseif($groupWitel == "KALTARA" or $groupWitel == "TARAKAN"){
            $groupName = "Early Adopter ONECALL Tarakan";
        }
        elseif($groupWitel == "KALSEL" or $groupWitel == "BANJARMASIN"){
            $groupName = "Implementasi ONECALL Kalsel";
        }
        elseif($groupWitel == "KALTENG" or $groupWitel == "PALANGKARAYA"){
            $groupName = "Onecall Implementation Witel Kalteng";
        }
        elseif($groupWitel == "KALTIM" or $groupWitel == "BALIKPAPAN"){
            $groupName = "Inputter";
        }
        else{
            $groupName = $defaultGroupName;
        }

        $dialogs = $madelineProto->get_dialogs();
        $dialogs = collect($dialogs);
        $info = [];
        foreach ($dialogs as $dialog) {
            $info[] = $madelineProto->get_info($dialog);
        }
        foreach ($info as $i=>$v) {
            $info[$i] = $v['Chat'] ?? null;
        }
        $info = collect($info);
        $target = $info->where('title',$groupName)->first();
        if($target == null){
            $target = $info->where('title',$defaultGroupName)->first();
        }
        $madelineProto->messages->sendMessage([
            "peer"=>$target['_'].'#'.$target['id'],
            "message"=>"Teknisi : $teknisi->nama\nNo. SC: $orderGajah->ORDER_ID\n$orderGajah->nama_ktp\n$order->alamat\n$order->catatan\n$orderGajah->SPEEDY\n$orderGajah->ND_TELP\n$orderGajah->ODP\n$orderGajah->KCONTACT\n$order->no_hp_alt\n".date("d F Y",strtotime($order->appointment))." $order->appointment_waktu\n$order->email\nTerdekat : $order->odp_terdekat\nGoogle Maps Link: https://www.google.com/maps/?q=$order->lat,$order->lng"
        ]);
        foreach($images as $i){
            $madelineProto->messages->sendMedia([
                'media'=>[
                    '_' => 'inputMediaUploadedPhoto', 
                    'file' => substr($i, 1)
                ],
                "message"=>"No. SC: $orderGajah->ORDER_ID",
                "peer"=>'chat#'.$target['id'],
            ]);
        }
        return true;
    }

    public function getSingleOrder($myir)
    {
        $fcc = oc_fcc::where('oc_fcc.identity',$myir)->first();
        $starclick = oc_starclick::where("TRACK_ID", $myir)->orderBy("ORDER_ID","desc")->first();
        $oc_ms2 = oc_ms2::select("fee", "myir")->where("myir", $myir)->orderBy("fee","desc")->first();
        
        if($fcc == null){
            $d = $this->generateOrder($fcc,$oc_ms2,$starclick,"starclick");
        }
        else{
            $d = $this->generateOrder($fcc,$oc_ms2,$starclick);
        }
        
        return $d;
    }

    public function cron($id){
        if($id !== "16960dd437cc96bdb457b80c26d4cb87b707ec14"){
            return response("Access Denied","401");
        }
        $follows = follow::whereNull('done')->get();
        $followedOrder = $follows->pluck('track_id')->toArray();

        $data_oc_fcc = oc_fcc::select('oc_fcc.identity', 'oc_fcc.nama_ktp', 'oc_fcc.email', 'oc_fcc.hp', 'oc_fcc.appointment', 'oc_fcc.reason', 'oc_fcc.partner_id', 'oc_fcc.order_dtm', 'oc_fcc.witel', 'oc_fcc.regional')->whereIn('oc_fcc.identity', $followedOrder)->get();
        
        $identities = $data_oc_fcc->pluck('identity')->toArray();
        $starclicks = oc_starclick::whereIn("TRACK_ID", $identities)->get();
        $oc_ms2s = oc_ms2::select("fee", "myir")->whereIn("myir", $identities)->get();

        foreach ($data_oc_fcc as $i => $fcc)
        {
            $starclick = $starclicks->where('TRACK_ID', $fcc->identity)
                ->sortByDesc('ORDER_ID')
                ->first();
                
            $oc_ms2 = $oc_ms2s->where('myir', $fcc->identity)
                ->where('myir', $fcc->identity)
                ->sortByDesc('fee')
                ->first();

            $data_oc_fcc[$i] = $this->generateOrder($fcc,$oc_ms2,$starclick);

            if(in_array($fcc->statusNum,[4,5])){
                $followedup = $follows->where("track_id",$fcc->identity)->first();
                if($fcc->statusNum == 4){
                    if($this->sendTelegramOrder($followedup,$fcc)){
                        $followedup->done = 1;
                        $followedup->save();
                    }
                }
            }
        }

        //check every 30 minutes; for push notification

        if(date('i') == 0 or date('i') == 30){
            $sales = Sales::whereNotNull("device_id")->get();
            foreach ($sales as $user) {
                if($user->last_order_id == null){
                    $last_order = oc_fcc::where('oc_fcc.partner_id','LIKE', $user->ID_User."%")->orderBy("order_id",'desc')->first();
                    $user->last_order_id = $last_order->order_id;
                    $user->save();
                }
                else{
                    $newOrders = oc_fcc::where('oc_fcc.partner_id','LIKE', $user->ID_User."%")
                    ->where('order_id',">",$user->last_order_id)
                    ->orderBy("order_id",'desc')->get();
                    foreach ($newOrders as $newOrder) {
                        $data = new \stdClass;
                        $data->myir = $newOrder->identity;
                        $data->name = $newOrder->nama_ktp;
                        $data->hp = $newOrder->hp;
                        $data->alamat = $newOrder->appointment;
                        Notifications::sendNotification("Order $newOrder->identity $newOrder->nama_ktp sudah masuk inbox, ayoo segera lengkapi datanya","Order Baru Masuk Inbox",$data,"order",$user->device_id);
                    }
                    $user->last_order_id = $newOrder->order_id;
                    $user->save();
                }
            }
        }

        // Billper notifications
        if(Carbon::now()->format('d') == 15 and Carbon::now()->format('H') == 8 and Carbon::now()->format('i') == 0){
            $sales = Sales::whereNotNull("device_id")->get();
            foreach ($sales as $user) {
                $oc_ms2s = oc_ms2::select('myir','nama')->distinct()->where("kcontact","LIKE","%$user->ID_User%")->get();
                if($oc_ms2s == null)
                    continue;
                $myirs = $oc_ms2s->pluck('myir')->toArray();
                $oc_payments = oc_payment::select('belum_bayar','periode','mata_uang','status_pembayaran','myir')->whereIn("myir",$myirs)->where('status_pembayaran','Belum Lunas')->get();
                if($oc_payments == null)
                    continue;
                Notifications::sendNotification("Ayoo ingatkan pelanggan untuk bayar, cek di billing perdana yah :)","Billing Pedana",['url'=>'billper.html'],"redirect",$user->device_id);
            }
        }
        return "true";
    }

    public function salesLog($text,$lat=null,$lng=null){
        $user = Auth::guard('api')->user();
        $log = new UserLog;
        $log->lat = $lat;
        $log->lng = $lng;
        $log->id_sales = $user->id;
        $log->log = $user->nama." ".$text;
        $log->waktu = Carbon::now();
        $log->save();
        return true;
    }

    public static function generateMonth($month,$short = false)
    {
        if($short == "to_en"){
			switch ($month) {
	            case "jan" : $month="Jan"; break;
	            case "feb" : $month="Feb"; break;
	            case "mar" : $month="Mar"; break;
	            case "apr" : $month="Apr"; break;
	            case "mei" : $month="May"; break;
	            case "jun" : $month="Jun"; break;
	            case "jul" : $month="Jul"; break;
	            case "agu" : $month="Aug"; break;
	            case "sep" : $month="Sep"; break;
	            case "okt" : $month="Okt"; break;
	            case "nov" : $month="Nov"; break;
	            case "des" : $month="Des"; break;
	        }
	        return $month;
        }
        $month = (int)$month;
        switch ($month) {
            case 1:$month = $short ? "Jan" : "Januari";break;
            case 2:$month = $short ? "Feb" : "Februari";break;
            case 3:$month = $short ? "Mar" : "Maret";break;
            case 4:$month = $short ? "Apr" : "April";break;
            case 5:$month = $short ? "Mei" : "Mei";break;
            case 6:$month = $short ? "Jun" : "Juni";break;
            case 7:$month = $short ? "Jul" : "Juli";break;
            case 8:$month = $short ? "Agu" : "Agustus";break;
            case 9:$month = $short ? "Sep" : "September";break;
            case 10:$month = $short ? "Okt" : "Oktober";break;
            case 11:$month = $short ? "Nov" : "November";break;
            case 12:$month = $short ? "Des" : "Desember";break;
        }
        return $month;
    }

    public static function generateStatus($sn)
    {
        switch ($sn) {
            case 1:$sn = "WAITING FOR FCC";break;
            case 2:$sn = "DECLINE";break;
            case 3:$sn = "WAITING FOR BACKEND";break;
            case 4:$sn = "ON PROGRESS";break;
            case 5:$sn = "COMPLETED PS";break;
            case 6:$sn = "PROBLEM";break;
        }
        return $sn;
    }

    public function about()
    {
        $lat = Input::get('current_lat');
        $lng = Input::get('current_lng');
        $data = Storage::get('about.html');
        $this->salesLog("membuka halaman about us. ",$lat,$lng);
        return $data;
    }

    public function user()
    {
        $lat = Input::get('current_lat');
        $lng = Input::get('current_lng');
        $device_id = Input::get('device_id');
        $user = Auth::guard("api")->user();
        if(strlen($device_id) > 0){
            $user->device_id = $device_id;
            $user->save();
        }
        $user->foto_profil = asset("/data/storage/profil/".$user->foto_profil);
        $this->salesLog("membuka halaman profile. ",$lat,$lng);
        return $user;
    }

    public function aboutUsForm()
    {
        $content = Storage::get('about.html');
        return view("about-us-editor",['content'=>$content]);
    }

    public function aboutUsSave(Request $req)
    {
        Storage::put('about.html',$req->content);
        return redirect("about-us");
    }

    public static function generateOrder($fcc,$oc_ms2,$starclick,$from = 'fcc')
    {
        if($from == 'fcc'){
            // $base = $fcc;
            $base = new \stdClass();
            //wajib
            $base->nama_ktp = $fcc->nama_ktp ?? '';
            $base->identity = $fcc->identity ?? '';

            $base->regional = $fcc->regional ?? '';
            $base->witel = $fcc->witel ?? '';
            $base->partner_id = $fcc->partner_id ?? '';
            $base->email = $fcc->email ?? '';
            $base->reason = $fcc->reason ?? '';

            $base->appointment = $fcc->appointment ?? '';
            $base->ORDER_ID = $starclick->ORDER_ID ?? '-'; // NO SC
            $base->SPEEDY = isset($starclick->SPEEDY) ? substr($starclick->SPEEDY, 10, 12) : '-'; // No Inet
            $base->ND_INET = $base->SPEEDY;
            $base->no_telp = (!isset($starclick->POTS) or $starclick->POTS == null) ? "-" : ((strlen($starclick->POTS) == 11 ? $starclick->POTS : substr($starclick->POTS,10,12)) ?? ''); // No telp
            $base->hp = $fcc->hp ?? '';
            $base->ODP = $starclick->LOC_ID ?? '';
            $base->ND_TELP = $base->no_telp;
            $base->fee = $oc_ms2->fee ?? '';
            $base->KCONTACT = $starclick->KCONTACT ?? '';
            $base->XS2 = $starclick->XS2 ?? '';

            //optional
            $base->ORDER_DATE_PS = isset($starclick->ORDER_DATE_PS) ? Carbon::parse($starclick->ORDER_DATE_PS)->format("d F Y") : '-';
            $base->POTS = $starclick->POTS ?? '';
            $base->STATUS_RESUME = $starclick->STATUS_RESUME ?? '';
            $base->order_dtm = date('Y-m-d',strtotime($fcc->order_dtm));
        }
        else{
            // $base = $starclick;
            $base = new \stdClass();
            // wajib

            $base->regional = $fcc->regional ?? '';
            $base->partner_id = $fcc->partner_id ?? '';
            $base->witel = $starclick->WITEL ?? '';
            $base->email = $starclick->EMAIL ?? '';

            $base->nama_ktp = $starclick->CUSTOMER_NAME ?? '';
            $base->identity = $starclick->TRACK_ID ?? '';
            $base->appointment = $starclick->INS_ADDRESS ?? '';
            $base->ORDER_ID = $starclick->ORDER_ID ?? '-'; // No SC
            $base->SPEEDY = isset($starclick->SPEEDY) ? substr($starclick->SPEEDY, 10, 12) : '-'; //No Inet
            $base->ND_INET = $base->SPEEDY;
            $base->no_telp = $starclick->POTS == null ? "" : (strlen($starclick->POTS) == 11 ? $starclick->POTS : substr($starclick->POTS,10,12)) ?? ''; // No telp
            $b = explode(";",$starclick->KCONTACT);
            $matches  = preg_grep ("/^['08']{2}/", $b);
            $matches = array_values($matches);
            $base->hp = $matches[0] ?? '';
            $base->ODP = $starclick->LOC_ID ?? '';
            $base->ND_TELP = $base->no_telp;
            $base->fee = $oc_ms2->fee ?? '';
            $base->KCONTACT = $starclick->KCONTACT;
            $base->XS2 = $starclick->XS2 ?? '';
            // optional
            $base->ORDER_DATE_PS = $starclick->ORDER_DATE_PS ?? '';
            $base->POTS = $starclick->POTS ?? '';
            $base->STATUS_RESUME = $starclick->STATUS_RESUME ?? '';
            $base->order_dtm = date('Y-m-d',strtotime($starclick->ORDER_DATE));
        }

        if($starclick !== null){
            if(in_array(strtoupper(substr($starclick->STATUS_RESUME,0,6)),['REVOKE','CANCEL','UN-SCC'])){
                $base->statusNum = 6;
                $base->status = "PROBLEM ".$starclick->STATUS_RESUME;
                $base->statusCol = "red";
            }
            elseif(strtoupper(substr($starclick->STATUS_RESUME,0,14)) == 'COMPLETED (PS)'){
                $base->statusNum = 5;
                $base->status = "COMPLETED PS";
                $base->statusCol = "green";
            }
            else{
                $base->statusNum = 4;
                $base->status = "ON PROGRESS ".$starclick->STATUS_RESUME;
                $base->statusCol = "orange";
            }
        }
        else{
            if(strtoupper(substr($fcc->reason,0,5)) != 'AGREE' and
            strtoupper(substr($fcc->reason,0,7)) != 'DECLINE' ){
                $base->statusNum = 1;
                $base->status = "WAITING FOR FCC";
                $base->statusCol = "grey";
            }
            elseif(strtoupper(substr($fcc->reason,0,7)) == 'DECLINE' ){
                $base->statusNum = 2;
                $base->status = "DECLINE";
                $base->statusCol = "grey";
            }
            else{
                $base->statusNum = 3;
                $base->status = "WAITING FOR BACKEND";
                $base->statusCol = "grey";
            }
        }

        return $base;
    }
     public function billper(){
        // filter by oc_ms2 -> tgl_status
        $user = Auth::guard("api")->user();
        $partner_id = $user->ID_User;
        $perPage = 10;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page-1) * $perPage;
        $oc_ms2s = oc_ms2::select('myir','nama',DB::raw("STR_TO_DATE(`tgl_status`,'%d-%b-%Y %H:%i:%s') as tgl_status"))->distinct()->where("kcontact","LIKE","%$partner_id%")->orderBy("tgl_status","desc");
        if(Input::get("search")){
            $search = Input::get("search");
            $oc_ms2s = $oc_ms2s->where("nama",'LIKE',"%$search%");
        }
        if(Input::get("month")){
            $month = Input::get("month");
            $oc_ms2s = $oc_ms2->whereMonth("tgl_status",$month);
        }
        $oc_ms2s = $oc_ms2s->get();
        $myirs = $oc_ms2s->pluck('myir')->toArray();
        $oc_payments = oc_payment::select('belum_bayar','periode','mata_uang','status_pembayaran','myir')->whereIn("myir",$myirs);
        if(Input::get("status")){
            $status = Input::get("status");
            if($status != "All")
                $oc_payments = $oc_payments->where("status_pembayaran","$status");
        }
        else{
            $oc_payments = $oc_payments->where("status_pembayaran","Belum Lunas");
        }
        $oc_payments = $oc_payments->limit($perPage)->offset($offset)->get();
        $oc_starclicks = oc_starclick::whereIn("TRACK_ID",$myirs)->get();
        $oc_ms2s = collect($oc_ms2s);
        $oc_starclicks = collect($oc_starclicks);
        $totalPage = ceil(count($oc_payments) / $perPage);

        $allData = [];
        foreach ($oc_payments as $payment) {
            $starclick = $oc_starclicks->where('TRACK_ID', $payment->myir)
                            ->sortByDesc('ORDER_ID')
                            ->first();
            $oc_ms2 = $oc_ms2s->where("myir",$payment->myir)->first();

            $order = $this->generateOrder(null,$oc_ms2,$starclick,'starclick');
            $data = new \stdClass();
            $data->tanggal_ps = $starclick->ORDER_DATE_PS == null ? "Belum PS" : date('d M Y',strtotime($starclick->ORDER_DATE_PS));
            $data->track_id = $oc_ms2->myir;
            $data->nama_pelanggan = $oc_ms2->nama;
            $data->alamat_pelanggan = $starclick->INS_ADDRESS;
            $data->no_hp = $starclick->NO_HP;
            $data->no_sc = $order->ORDER_ID;
            $data->no_inet = $order->SPEEDY;
            $data->no_telp = $order->no_telp;
            $data->status = $payment->status_pembayaran;
            $data->periode = $payment->periode;
            if(strtolower(trim($data->status)) == "lunas"){
                $data->statusCol = "green";
                $data->tagihan = "";
            }
            else{
                $data->statusCol = "red";
                $data->tagihan = $payment->mata_uang.' '.number_format($payment->belum_bayar,0,',','.');
            }
            $allData[] = $data;
        }

        if(count($allData) > 0){
            $responseCode = 200;
        }
        else{
            $responseCode = 404;
        }
       return response()->json($allData,$responseCode);
    }

    public function sendMessageApi()
    {
        $data = new \stdClass;
        $data->myir = "asdasdsa";
        $data->type = "order";

        return Notifications::sendNotification('Tap to follow up. ','New Order from Ahmad. ',$data,Sales::where('username','test')->first()->device_id);
    }

    public function sendError()
    {
        $a = Input::get('message');
        $data = Storage::get('error_log');
        Storage::put('error_log',$data."\n\n".$a);
    }

    public function feeCheckReport()
    {
    	$sales = Auth::guard("api")->user();
    	$data = oc_bsn::where('partner_id',$sales->ID_User);
    	if(Input::get("month") != ''){
    		$data = $data->where('id_bsn','like',"%".$this->generateMonth(Input::get("month"),"to_en")."%");
    	}
    	$data = $data->get();
    	foreach ($data as $k => $v) {
	    	$dataNew = new \stdClass;
	    	$dataNew->ps = $v->ps_total;
	    	$dataNew->fee_index = $this->format_harga($v->fee_sales_mi + $v->fee_sales_non_mi);
	    	$dataNew->fee_transport = $this->format_harga($v->transport);
	    	$dataNew->fee_insentif = $this->format_harga($v->insentif_target);
	    	$dataNew->fee_iqn = $this->format_harga($v->iqn);
	    	$dataNew->fee_quota_network = $this->format_harga($v->fee_ps_quota_network);
            $dataNew->fee_point_network = $this->format_harga($v->point_network);
	    	$dataNew->punishment = $this->format_harga($v->punishment);
	    	$dataNew->fee_total = $this->format_harga($v->thp_total);
	    	$dataNew->bulanInt = Carbon::parse(explode("_",$v->id_bsn)[1])->format("m");
	    	$dataNew->bulan = $this->generateMonth($dataNew->bulanInt).' '.Carbon::parse(explode("_",$v->id_bsn)[1])->format("Y");
	    	$data[$k] = $dataNew;
    	}
    	$data = $data->sortByDesc('bulanInt');
    	return response()->json($data);
    }

    public function feeCheckDetails()
    {
    	$perPage = 10;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page-1) * $perPage;
    	$sales = Auth::guard("api")->user();
    	$data = oc_ms2::select('*',DB::raw("STR_TO_DATE(`tgl_status`,'%d-%b-%Y %H:%i:%s') as tgl_status_parsed"))->where('kcontact','like',"%".$sales->ID_User.'%')->where('fee','>',0);
    	if(Input::get("month") != ''){
    		$data = $data->where('tgl_status','like',"%".$this->generateMonth(Input::get("month"),"to_en")."%");
    	}
    	$data = $data->orderBy('tgl_status_parsed','desc')->limit($perPage)->offset($offset)->get();
    	foreach ($data as $k => $v) {
            if(strlen($v->kota) == 0){
                $kota = $v->kandatel;
            }
            else{
                $kota = $v->kota;
            }
            if(strlen($v->distrik) > 0){
                if(strlen($v->distrik) > 0){
                    $kota = $v->distrik.', '.$kota;
                }
            }
            $jalan = '';
            if(strlen($v->jalan) > 0){
                $jalan = $v->jalan.$v->no_jalan.", ";
            }
            $alamat = $jalan.$kota." ".$v->wilayah;
	    	$dataNew = new \stdClass;
	    	$dataNew->tgl_ps = Carbon::parse($v->tgl_status)->format("d-m-Y H:i");
	    	$dataNew->track_id = $v->myir;
	    	$dataNew->nama_pelanggan = $v->nama;
	    	$dataNew->alamat_pelanggan = $alamat;
	    	$dataNew->no_sc = $v->no_sc;
	    	$dataNew->no_inet = $v->nd_internet;
            $dataNew->no_telp = $v->nd;
            $dataNew->desc = $v->desc;
	    	$dataNew->citem = $v->citem;
	    	$dataNew->fee = $this->format_harga($v->fee);
	    	$data[$k] = $dataNew;
    	}
    	return response()->json($data,count($data) > 0 ? 200 : 404);
    }

    public function format_harga($t)
    {
        return "Rp.".number_format($t,0,',','.');
    }

    public function getRegional()
    {
        $d = [];
        $a = Regional::all();
        foreach ($a as $b => $c) {
            $d[$c->id] = $c->regional;
        }
        return response()->json($d);
    }

    public function getWitel($id)
    {
        $d = [];
        $a = Witel::where("id_regional",$id)->get();
        foreach ($a as $b => $c) {
            $d[$c->id] = $c->witel;
        }
        return response()->json($d);
    }
    
    public function getDatel($id)
    {
        $d = [];
        $id = Witel::where("witel",$id)->first()->id;
        $a = Datel::where("id_witel",$id)->get();
        foreach ($a as $b => $c) {
            $d[$c->id] = $c->datel;
        }
        return response()->json($d);
    }

    public function getAgency($id)
    {
        $d = [];
        $id = Witel::where("witel",$id)->first()->id;
        $a = Agency::where("id_witel",$id)->get();
        foreach ($a as $b => $c) {
            $d[$c->id] = $c->agency;
        }
        return response()->json($d);
    }
    public function getSto($id)
    {
        $d = [];
        $id = Datel::where("datel",$id)->first()->id;
        $a = STO::where("id_datel",$id)->get();
        foreach ($a as $b => $c) {
            $d[$c->id] = $c->sto;
        }
        return response()->json($d);
    }

    public function getKodeAgency($id)
    {
        $d = [];
        $id = Agency::where("agency",$id)->first()->id;
        $a = Kode_Agency::where("id_agency",$id)->get();
        foreach ($a as $b => $c) {
            $d[$c->id] = $c->kode_agency;
        }
        return response()->json($d);
    }

    public function bsn3()
    {
        $final = [];
        $user = Auth::guard('api')->user();
        $mybsn = oc_bsn::where('id_bsn','like',$user->ID_User.Carbon::now()->format('_M Y'))->first();
        if($mybsn != null){
            $data = new \stdClass;
            $data->user_id = $mybsn->partner_id;
            $data->ps_total = $mybsn->ps_total;
            $data->ps_group = $mybsn->ps_grup1;
            $final[] = $data;
        }
        else{
            $data = new \stdClass;
            $data->user_id = $user->ID_User;
            $data->ps_total = "Failed";
            $final[] = $data;
        }
        $bsn = oc_bsn::where('upline_id',$user->ID_User)->where('id_bsn','like','%'.Carbon::now()->format('M Y'))->orderBy('nomor')->get();
        $bsnc = collect($bsn);
        $bsnid = $bsn->pluck('partner_id')->toArray();
        $sales = Sales::whereNull("ID_User")->where('upline_id',$user->id)->get();
        $j = 0;
        for ($i=1; $i <= 9; $i++) {
            $temp = new \stdClass;
            $bsn_downline = $bsnc->where("nomor",$i)->first();
            if($bsn_downline == null and isset($sales[$j])){
                $temp->user_id = $sales[$j]->nama;
                $temp->ps_total = null;
                $temp->text = "Pending";
                $j++;
            }
            elseif($bsn_downline != null){
                $temp->user_id = $bsn_downline->partner_id;
                $temp->ps_total = $bsn_downline->ps_total;
                $temp->ps_group = $bsn_downline->ps_grup1;
            }
            else{
                $temp = null;
            }
            $final[] = $temp;
        }
        return response()->json($final);
    }

    public function bsn3_daftar(Request $req)
    {
        $user = Auth::guard('api')->user();
        $req->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
            'no_ktp' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'no_rekening' => 'required',
            'bank' => 'required',
            'pemilik_bank' => 'required',
            'bank_cabang' => 'required',
            'regional' => 'required',
            'witel' => 'required',
            'datel' => 'required',
            'sto' => 'required',
            'agency' => 'required',
            'kode_agency' => 'required',
        ]);
        $sales = new Sales;
        $sales->nama = $req->nama;
        $sales->username = $req->email;
        $sales->password = bcrypt($req->password);
        $sales->ID_User = null;
        $sales->foto_profil = 'default.png';
        $sales->no_hp = $req->no_hp;
        $sales->regional = $req->regional;
        $sales->witel = $req->witel;
        $sales->datel = $req->datel;
        $sales->sto = $req->sto;
        $sales->agency = $req->agency;
        $sales->kode_agency = $req->kode_agency;
        $sales->no_ktp = $req->no_ktp;
        $sales->tmp_lahir = $req->tempat_lahir;
        $sales->tgl_lahir = Carbon::parse($req->tanggal_lahir);
        $sales->alamat = $req->alamat;
        $sales->no_rek = $req->no_rekening;
        $sales->bank = $req->bank;
        $sales->nama_pemilik_bank = $req->pemilik_bank;
        $sales->cabang_bank = $req->bank_cabang;
        $sales->upline_id = $user->id;
        $sales->save();

        return response()->json(['status'=>true]);
    }
}


