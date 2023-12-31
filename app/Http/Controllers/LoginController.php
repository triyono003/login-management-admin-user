<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
   public function login()
   {
     if($user = Auth::user()) {
       if($user->level == 'admin'){
         return redirect()->intended('admin');
       }elseif ($user->level == 'editor') {
         return redirect()->intended('editor');
       }
     }
     return view('login');
   }
   
   public function proses_login(Request $request)
   {
     request()->validate(
       [
         'username' => 'required',
         'password' => 'required',
       ]);
       $kredensial = $request->only('username','password');
       
       if(Auth::attempt($kredensial)) {
         $user = Auth::user();
         if($user->level == 'admin'){
           return redirect()->intended('admin');
         }elseif ($user->level == 'editor') {
           return redirect()->intended('editor'); 
         }
         return redirect()->intended('/');
       }
         return redirect('login')
         ->withInput()
         ->withErrors([
         'login_gagal' => 'login gagal bre.'
         ]);
   }
   
   public function logout(Request $request)
   {
     $request->session()->flush();
     Auth::logout();
     return redirect('login');
   }
   
}
