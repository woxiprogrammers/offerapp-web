<?php

namespace App\Http\Controllers;

use App\Otp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class OtpVerification extends Controller
{

    public function getOtp(Request $request){
        try{
            $mobile_no = $request['mobile_no'];
            if($mobile_no == null){
                $error = "Please Enter a Valid Mobile No.";
                return view('auth.RegisterStep1', compact('error'));
            }
            else{

                $otp = $this->generateOtp();
                $otpGen = new Otp();
                $otpGen->mobile_no = $mobile_no;
                $otpGen->otp = $otp;
                $otpGen->save();

                $apiKey = urlencode(env('SMS_KEY'));

                // Message details
                $numbers = array($request['mobile_no']);
                $sender = urlencode('TXTLCL');

                $message = rawurlencode('Your OTP is '.$otpGen->otp);

                $numbers = implode(',', $numbers);

                // Prepare data for POST request
                $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

                // Send the POST request with cURL

                $ch = curl_init('https://api.textlocal.in/send/');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);
            }

            // Process your response here
            if(true){
                return view('auth.RegisterStep2',compact('mobile_no'));
            }else{
                $error = 'Please check your internet connection or Enter a Passsword';
                return view('auth.RegisterStep1', compact('error'));
            }

        }catch (\Exception $e){
            $data = [
                'action' => 'getOtp',
                'exception' => $e->getMessage(),
                'params' => $request->all()
            ];

            Log::critical(json_encode($data));
        }



    }

    public function verifyOtp(Request $request){
        try{

            $mobile_no = $request['mobile_no'];
            $otp = Otp::where('mobile_no',$request['mobile_no'])->pluck('otp')->last();
            if($otp == $request['otp']) {
                return view('auth.RegisterStep3');
            }
            else{
                $error = 'Please Enter a Valid OTP';
                return view('auth.RegisterStep1', compact('error', 'mobile_no'));
            }

        }catch(\Exception $e){
            $data = [
                'action' => 'verifyOtp',
                'exception' => $e->getMessage(),
                'params' => $request->all()
            ];

            Log::critical(json_encode($data));
        }

    }

    public function generateOtp(){
        try{

            $OTPCODE = str_random(4);
            return $OTPCODE;

        }catch(\Exception $e){
            $data = [
                'action' => 'generateOtp',
                'exception' => $e->getMessage(),

            ];

            Log::critical(json_encode($data));
        }

    }

}
