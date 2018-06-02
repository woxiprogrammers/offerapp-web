<?php

namespace App\Http\Controllers\Auth;

use App\Otp;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OtpVerification extends Controller
{

    public function getMobileNO(){
        try{
            return view('auth.RegisterStep1');
        }catch (\Exception $e){
            $data = [
                'action' => 'get mobile no',
                'exception' => $e->getMessage(),
            ];

            Log::critical(json_encode($data));
        }
    }

    public function getOtp(Request $request){
        try{
            $mobile_no = $request['mobile_no'];
            if($mobile_no == null){
                $error = "Please Enter a Valid Mobile No.";
                return view('auth.RegisterStep1', compact('error'));
            }else{

                $otp = $this->generateOtp();

                $apiKey = urlencode(env('SMS_KEY'));

                // Message details
                $numbers = array($request['mobile_no']);
                $sender = urlencode('TXTLCL');

                $message = rawurlencode('Your OTP is '.$otp);

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
                $otpGen = new Otp();
                $otpGen->mobile_no = $mobile_no;
                $otpGen->otp = $otp;
                $otpGen->save();
            }
            return view('auth.RegisterStep2',compact('mobile_no'));
        }catch (\Exception $e){
            $data = [
                'action' => 'get otp',
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
            $userotp = $request['otp'];
            if($otp == $userotp) {
                return view('auth.RegisterStep3');
            }
            else{
                $error = 'Please Enter a Valid OTP';
                return view('auth.RegisterStep1', compact('error', 'mobile_no'));
            }

        }catch(\Exception $e){
            $data = [
                'action' => 'verify otp',
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
