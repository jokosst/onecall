<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class LoginController extends Controller
{
  //login
     public function login(Request $Request){

   	  if (\Auth::attempt(['username' => $Request->username, 'password' => $Request->password])) {
            // Authentication passed...
            return redirect()->intended('/');
        } else {
        	return back()->with('error', 'Cek Lagi username atau password anda');
        }
  		
   }

   //logout
   public function logout(Request $request)
    {
    	\Auth::logout();

    	return redirect('/login');
    }

    //cek data masuk apa gak di database
     public function data(){
          $d = User::all();
          dd($d);
          return view('coba',['lihat' =>$d]);
        }
}
