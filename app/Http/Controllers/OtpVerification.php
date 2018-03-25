<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class OtpVerification extends Controller
{
    static protected $OTPCODE;
    public function getOtp(Request $request){
        $this->generateOtp();
        /*$apiKey = urlencode(env('SMS_KEY'));

        // Message details
        $numbers = array($request['mobile_no']);
        $sender = urlencode('TXTLCL');
        self::$OTPCODE = $this->generateOtp();
        $message = rawurlencode('Your OTP is '.self::$OTPCODE);

        $numbers = implode(',', $numbers);

        // Prepare data for POST request
        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

        // Send the POST request with cURL
        $ch = curl_init('https://api.textlocal.in/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);*/

        // Process your response here
        if(true){
            return view('auth.RegisterStep2');
        }else{
            $error = 'Please check your internet connection';
            return view('auth.RegisterStep1', compact('error'));
        }


    }

    public function verifyOtp(Request $request){
        $otp = config('app.otp');
        if($otp == $request['otp']) {
            return view('auth.RegisterStep3');
        }
        else{
                $error = 'Please Enter a Valid OTP';
                return view('auth.RegisterStep2', compact('error'));
            }
    }

    public function generateOtp(){
        $OTPCODE = str_random(4);
//        session()->push('OTP',$OTPCODE);
        config(['app.otp' => $OTPCODE]);
        return $OTPCODE;
    }

}
