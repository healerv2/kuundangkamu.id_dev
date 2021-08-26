<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeLoginController extends Controller
{
    //
     public function index()
     {
        return view('login/login');
     }

     public function action_login(Request $request)
     {
        $remember = $request->remember ? true : false;

        request()->validate([
        'username' => 'required',
        'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();
            if ($user->level == 'superadmin') {
                return redirect()->intended('superadmin/dashboard');
            } 
            if ($user->level == 'accounting') {
                return redirect()->intended('accounting/dashboard');
            } 
            elseif ($user->level == 'visitor') {
                return redirect()->intended('visitor/public');
            }
            return redirect('/');
        }
        return redirect('login')->with('alert', 'Username atau password salah');
    }
    public function action_logout(Request $request) 
    {
        $request->session()->flush();
        Auth::logout();
        return Redirect('login')->with('alert-success', 'Berhasil Logout');;
    }
}
