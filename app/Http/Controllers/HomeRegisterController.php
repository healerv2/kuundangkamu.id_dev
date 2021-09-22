<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\Zuwinda;
use App\Services\ZuwindaRequestBuilder;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Redis;

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
        try {
            if (!$request->phone) {
                return json_encode([
                    'success' => false,
                    'message' => 'Nomor ponsel wajib dimasukkan'
                ]);
            }
            $phone = $request->phone;
            $otp = rand(1000, 9999);

            $redis = Redis::get($phone);
            $redis_expire = Redis::get($phone . '_expire');
            if ($redis == null && $redis_expire == null) {

                $zuwinda = new ZuwindaRequestBuilder();
                $zuwinda->buildSendWhatsapp($phone, 'Kode otp untuk pendaftaran kuundangkamu.id adalah ' . $otp)->send();

                return json_encode([
                    'success' => true,
                    'message' => 'Kode OTP Berhasil dikirim'
                ]);
            }
            return json_encode([
                'success' => false,
                'message' => 'Kode OTP sudah dikirim, silakan dicoba kembali dalam ' . Carbon::createFromFormat('Y-m-d H:i:s', $redis_expire)->diffForHumans(),
            ]);
        } catch (\Throwable $th) {
            error_log($th);
            return json_encode([
                'success' => false,
                'message' => 'Permintaan gagal, silakan coba beberapa saat lagi.'
            ]);
        }
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
