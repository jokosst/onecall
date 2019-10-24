<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\oc_fcc;
use App\oc_ms2;
use App\oc_starclick;
use App\Points;
use App\Http\Controllers\ApiController;

use Carbon\Carbon;

class Sales extends Authenticatable
{
	use Notifiable;
	protected $connection = 'second';
	protected $table = 'sales';
	protected $guarded = [''];
	protected $dates = ['tgl_lahir'];
	public $timestamps = false;

	protected $hidden = [
        'password', 'remember_token','api_token'
    ];

    public function points()
	{
		return $this->hasMany("App\Points",'sales_id');
	}

	public function getBadge($month = null)
	{
		if($month == null){
			$month = date('m');
		}
		$point = Points::where('sales_id',$this->id)->whereMonth("date",$month)->first()->point ?? 0;
		if($point <= 90){
			$badge = "Newbie";
		}
		elseif($point <= 180){
			$badge = "Commoner";
		}
		elseif($point <= 270){
			$badge = "Master";
		}
		if($point > 271){
			$badge = "Grand Master";
		}
		return $badge;
	}
	public function LevelBadge($point){
       if($point <= 90){
			$badge = "Newbie";
		}
		elseif($point <= 180){
			$badge = "Commoner";
		}
		elseif($point <= 270){
			$badge = "Master";
		}
		if($point > 271){
			$badge = "Grand Master";
		}
		return $badge;
	}

	public function getPoint($month = null)
	{
		if($month == null){
			$month = date('m');
		}
		return Points::where('sales_id',$this->id)->whereMonth("date",$month)->first()->point ?? 0;
	}

	public function follows()
	{
		return $this->hasMany("App\Follow",'id_user','ID_User');
	}

	public function getStatusAttribute()
	{
		return $this->ID_User != null;
	}

	public static function getMultipleOrder($sales_instance,$month = null,$year = null,$witel = null){
		if($month == null){
			$month = Carbon::now()->format('m');
		}
		$monthS = strtoupper(ApiController::generateMonth(strtolower(ApiController::generateMonth($month,true)),'to_en'));
		if($year == null){
			$year = Carbon::now()->format('Y');
		}
		$yearS = $year;
		
		$start = microtime(true);
		$sales_user_id = $sales_instance->pluck('ID_User')->toArray();
		$sales_orders = [];

		$master_oc_fcc = oc_fcc::where('order_dtm','like',"%".$monthS.'-'.$yearS)->where(function ($query) use($sales_user_id) {
             for ($i = 0; $i < count($sales_user_id); $i++){
             	if($sales_user_id[$i] !== null)
                	$query->orwhere('partner_id', 'like',  '%' . $sales_user_id[$i] .'%');
             }      
        })->get();
        // dd($month.'-'.$yearS);
        // dd(count($master_oc_fcc));
        $master_oc_starclick = oc_starclick::whereMonth('ORDER_DATE',$month)->whereYear('ORDER_DATE',$year)->where(function ($query) use($sales_user_id) {
             for ($i = 0; $i < count($sales_user_id); $i++){
             	if($sales_user_id[$i] !== null)
                	$query->orwhere('KCONTACT', 'like',  '%' . $sales_user_id[$i] .'%');
             }      
        })->get();

        foreach ($sales_instance as $sales_k => $sales) {
        	$tmp = $sales;
        	$orders = [];
			// $oc_fcc = $master_oc_fcc->where('partner_id','LIKE', $sales->ID_User."%");
			$oc_fcc = $master_oc_fcc->reject(function($element) use ($sales) {
			    return mb_strpos($element->partner_id, $sales->ID_User) === false;
			});
			$allStarclicks = $master_oc_starclick->reject(function($element) use ($sales) {
			    return mb_strpos($element->KCONTACT, $sales->ID_User) === false;
			});
			$identities = $oc_fcc->pluck('identity')->toArray();
			$starclicks = $allStarclicks->whereIn('TRACK_ID',$identities);
			$oc_ms2s = oc_ms2::select("fee", "myir")->whereIn("myir", $identities)->get();
			// $oc_ms2s = collect();
			foreach ($oc_fcc as $k => $v) {
				$starclick = $starclicks->where('TRACK_ID', $v->identity)
	                ->sortByDesc('ORDER_ID')
	                ->first();
	            $oc_ms2 = $oc_ms2s->where('myir', $v->identity)
	                ->where('myir', $v->identity)
	                ->sortByDesc('fee')
	                ->first();
	            $data = ApiController::generateOrder($v,$oc_ms2,$starclick);
				array_push($orders, $data);
			}

			$oc_startclick = $allStarclicks->whereNotIn("TRACK_ID", $identities);


			$oc_startclick = $oc_startclick->sortByDesc("ORDER_DATE");
			$oc_startclick = $oc_startclick->groupBy('TRACK_ID');
			foreach ($oc_startclick as $i => $data) {
	            $data = $data->sortByDesc("ORDER_ID")->first();
	            $oc_ms2 = $oc_ms2s->where('myir', $data->TRACK_ID)
	                ->where('myir', $data->TRACK_ID)
	                ->sortByDesc('fee')
	                ->first();

	            $newData = ApiController::generateOrder(null,$oc_ms2,$data,'starclick');
				array_push($orders, $newData);
	        }

	       	$tmp->orders = collect($orders);
        	$sales_instance[$sales_k] = $tmp;
        }
       return collect($sales_instance);
	}
}
