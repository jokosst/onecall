<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Storage;
use App\Regional;
use App\STO;
use App\Datel;
use App\Agency;
use App\Witel;
use App\Kode_Agency;


class MasterController extends Controller
{
    public function data(){
    		$regional = Regional::all();
        	$witel = Witel::join('regional','regional.regional','=','witel.id_regional')
        	->select('witel.witel','regional.regional','witel.id')->get();
        	$datel = Datel::join('witel','witel.id','=','datel.id_witel')
        	->select('witel.witel','datel.datel','datel.id')->get();
        	$STO = STO::join('datel','datel.id','=','sto.id_datel')
        	->select('datel.datel','sto.id','sto.sto','sto.area')->get();
        	$agency = Agency::join('witel','witel.id','=','agency.id_witel')
            ->select('witel.witel','agency.agency','agency.id')->get();  
        	$kode_agency = Kode_Agency::join('agency','agency.id','=','kode_agency.id_agency')
            ->select('agency.agency','kode_agency.kode_agency','kode_agency.id')->get();         
        	return view('master',['lihat_witel' =>$witel,'lihat_regional' =>$regional, 'lihat_STO' =>$STO, 'lihat_datel' =>$datel, 'lihat_agency' =>$agency,'lihat_kode_agency' =>$kode_agency]);
        }
     public function tambah_regional(Request $request){
     	 $tambah = new Regional;
     	 $tambah->regional = $request->regional;
         $tambah->save();

            return redirect('master');
     } 
     public function tambah_witel(Request $request){
     	 $tambah = new Witel;
     	 $tambah->id_regional = $request->regional;
     	  $tambah->witel= $request->witel;
         $tambah->save();

            return redirect('master');
     } 
     public function tambah_datel(Request $request){
     	 $tambah = new Datel;
     	 $tambah->id_witel = $request->id_witel;
     	 $tambah->datel = $request->datel;
         $tambah->save();

            return redirect('master');
     }   
     public function tambah_sto(Request $request){
     	 $tambah = new STO;
     	 $tambah->id_datel = $request->id_datel;
     	 $tambah->sto = $request->sto;
     	 $tambah->area = $request->area;
         $tambah->save();

            return redirect('master');
     }   
      public function tambah_agency(Request $request){
     	 $tambah = new Agency;
          $tambah->id_witel = $request->id_witel;
     	 $tambah->agency = $request->agency;
         $tambah->save();

            return redirect('master');
     }  
      public function tambah_kode_agency(Request $request){
     	 $tambah = new Kode_Agency;
          $tambah->id_agency = $request->id_agency;
     	 $tambah->kode_agency = $request->kode_agency;
     	  $tambah->save();

            return redirect('master');
     }  
      public function hapus_agency(Request $request, $id){
        Agency::destroy($id);
            return redirect('master');
        } 
        public function hapus_kode_agency(Request $request, $id){
        Kode_Agency::destroy($id);
            return redirect('master');
        } 
         public function hapus_witel(Request $request, $id){
        Witel::destroy($id);
            return redirect('master');
        } 
        public function hapus_sto(Request $request, $id){
        STO::destroy($id);
            return redirect('master');
        } 
        public function hapus_regional(Request $request, $id){
        Regional::destroy($id);
            return redirect('master');
        } 
        public function hapus_datel(Request $request, $id){
        Datel::destroy($id);
            return redirect('master');
        } 
}
