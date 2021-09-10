<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\Zuwinda;
use DB;

class HomeRegisterController extends Controller
{
    //
    public function index()
     {
        return view('login/register');
     }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
      
            $user = Socialite::driver('google')->user();
       
            $finduser = User::where('google_id', $user->id)->first();
       
            if($finduser){
       
                Auth::login($finduser);
      
                return redirect()->intended('visitor/public');
       
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'username' => $user->email,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'level' => 'visitor',
                    'password' => encrypt('123456')
                ]);
      
                Auth::login($newUser);
      
                return redirect()->intended('visitor/public');
            }
      
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function RegisterUsers(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password'=> 'required'
        ]);


        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'level' => 'visitor'
        ]);
        //$this->sendWhatsappOtp($otp, $register->phone);
       return redirect('login')->with('alert-success', 'Register berhasil silahkan login !');
    }

    public function sendWhatsappOtp(Request $request, Zuwinda $zuwinda)
    {
        $users = User::where('phone',$request->phone)->first();
        if ($users == null) {
            return response()->json(['success' => false, 'message' => 'No Handphone tidak ditemukan']);
        }
        
        $otp = rand(10000, 99999);

        $register->create([
        'otp' => $otp
    ]);
        $message_wa = "Your registration otp code is $otp";
        $zuwinda->sendMessage($users->phone, $message_wa);
    return response()->json(['success' => true, 'message' => 'Status berhasil dikirim!!!!']);

    }

    public function CheckOtp(Request $request)
    {
       if($request->get('otp'))
       {
          $otp = $request->get('otp');
          $data = DB::table("users")
          ->where('otp', $otp)
          ->count();
          if($data > 0)
          {
             echo 'not_unique';
         }
         else
         {
             echo 'unique';
         }
        }
    }
}
