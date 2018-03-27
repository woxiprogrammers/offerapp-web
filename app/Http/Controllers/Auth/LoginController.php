<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void.
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'mobile_no' => 'required|regex:/[0-9]/',
            'password' => 'required',

        ]);
        if(Auth::attempt(['mobile_no' => $request->input('mobile_no'), 'password' => $request->input('password')])){
            $user = Auth::user();
            return redirect('/');
        }else{
            return redirect('/login');
        }
    }


    /*public function login(Request $request){
        try{
            $credentials = $request->except('_token');
            if(Auth::attempt($credentials)){
                return redirect('/home');
            }else{
                $request->session()->flash('error','Invalid Credentials');
                return redirect('/');
            }
        }catch (\Exception $e){
            $data = [
                'action' => 'Login',
                'exception' => $e->getMessage(),
                'params' => $request->all()
            ];
            Log::critical(json_encode($data));
        }
    }*/
}
