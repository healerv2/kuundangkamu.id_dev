<?php

namespace App\Http\Controllers\Logins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function index()
    {
        return view('page/home/login');
    }

    public function action_login(Request $request)
    {
        request()->validate([
        'username' => 'required',
        'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->level == 'superadmin') {
                return redirect()->intended('superadmin');
            } if ($user->level == 'accounting') {
                return redirect()->intended('accounting');
            } elseif ($user->level == 'visitor') {
                return redirect()->intended('visitor');
            }
            return redirect('/');
        }
        return redirect('login')->withSuccess('Opps! Silahkan cek username & password');
    }

    public function action_logout(Request $request) {
        $request->session()->flush();
        Auth::logout();
        return Redirect('login');
    }
}
