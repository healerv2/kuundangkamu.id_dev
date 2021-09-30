<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthApiController extends Controller
{
    //
    public function login(Request $request)
    {
        try {

            if (!$request->username || !$request->password) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid parameter Login'
                ]);
            }
            if (!Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                return response()->json([
                    'success' => false,
                    'message' => 'username atau password salah!!!'
                ]);
            }

            $accessToken = Auth::user()->createToken('authTokenApi')->accessToken;
            return response()->json([
                'success' => true,
                'data' => [
                    'user' => Auth::user(),
                    'access_token' => $accessToken
                ]
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!!'
            ]);
        }
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
  
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'level' => 'visitor',
            'password' => bcrypt($request->password)
        ]);
  
        $token = $user->createToken('authTokenApi')->accessToken;

        if ($user->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Register berhasil'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Internal server error!!'
        ]);
  
    }
}
