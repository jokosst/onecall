<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Storage;
use App\User;
use App\Witel;

class UserController extends Controller
{
    public function tambah(Request $request){
        $gambar = 'admin.png';
        $level = 'admin';
        $tambah = new User; //tambah data dengan eloquent
        $tambah->level = $level;
        $tambah->username = $request->username;
        $tambah->password = bcrypt($request->password);
        $tambah->foto_profil = $gambar;
        $tambah->witel = $request->witel;
        $tambah->save();

            return redirect('admin');

    }
    public function data(){
        $level = 'admin';
         $d_witel = Witel::all();
        	$d = User::where('level',$level)->get();
            // dd($d);
        	return view('admin',['lihat' =>$d,'lihat_witel' =>$d_witel]);
        }
        public function profil(){
            $id = \Auth::user()->id;
            $d_witel = Witel::all();
            $d = User::find($id);
            // dd($d);
            return view('profil',['lihat' =>$d,'lihat_witel' =>$d_witel]);
        }

        public function hapus(Request $request, $id){
        User::destroy($id);
            return redirect('admin');
        }
        
    public function ubah_password(Request $request, $id){
        $tambah = User::find($id);
        $tambah->username = $request->username;
         $tambah->password = bcrypt($request->password);
        $tambah->save();

     return redirect('admin')->with('sukses_ubah_admin', 'Admin Berhasil diubah');

    }
    public function update_profil(Request $request, $id){
    if($request->hasFile('foto_profil')){
      $file = $request->file('foto_profil');
       $extension = $file->getClientOriginalExtension();
        $filename   = md5(time().rand()).".".$file->getClientOriginalExtension();
         Storage::disk('local')->put($filename,  File::get($file));

        $tambah = User::find($id);
        $tambah->username = $request->username;
         $tambah->foto_profil = $filename;
         $tambah->witel = $request->witel;
        $tambah->save();
         return redirect('profil')->with('sukses_ubah_profil', 'Akun berhasil di rubah dengan gambar');
    }else{
        $tambah = User::find($id);
        $tambah->username = $request->username;
        $tambah->witel = $request->witel;
        $tambah->save();
        return redirect('profil')->with('sukses_ubah_profil1', 'Berhasil di rubah');
        }

    }
    public function ubah_password_profil(Request $request, $id){
        $tambah = User::find($id);
         $tambah->password = bcrypt($request->password);
        $tambah->save();

     return redirect('profil')->with('sukses_ubah_pass', 'password Berhasil diubah');

    }
}
