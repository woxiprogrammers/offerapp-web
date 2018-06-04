<?php

namespace App\Http\Controllers\Auth;

use App\Role;
use App\Seller;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function register(Request $request)
    {
        try{
            //Validates data
            //return $this->validator($request->all())->validate();
             $this->validator($request->all(),[
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'string|email|max:255',
                'password' => 'required|string|min:6',
                 'rpassword' => 'required|min:6|same:password',
                'mobile_no' => 'required|required|min:10|max:10|regex:/[0-9]/|unique:users',
            ]);
            //Create user
            $user = $this->createUser($request->all());
            //Authenticates user
            /*$credentials = $request->except('mobile_no', 'password');
            Auth::attempt($credentials);*/
            //Redirects user
            return redirect($this->redirectTo);
        }catch (\Exception $e){
            $data = [
                'action' => 'register user',
                'exception' => $e->getMessage(),
                'params' => $request->all()
            ];
            Log::critical(json_encode($data));
        }

    }

    protected function validator(array $data)
    {
        try{

            return  Validator::make($data, [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'string|email|max:255',
                'password' => 'required|string|min:6',
                'mobile_no' => 'required',
            ]);

        }catch(\Exception $e){
            $input = [
                'action' => 'validate user',
                'exception' => $e->getMessage(),
                'params' => $data->all()
            ];
            Log::critical(json_encode($input));
        }

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function createUser(array $data)
    {
        try{
            $sellerRoleId = Role::where('slug','seller')->pluck('id')->first();

            $user =  User::create([
                'role_id' => $sellerRoleId,
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'mobile_no' => $data['mobile_no'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);
            $seller = Seller::create([
                'user_id' => $user->id,
            ]);
            return $user;
        }catch(\Exception $e){
            $input = [
                'action' => 'create user',
                'exception' => $e->getMessage(),
                'params' => $data->all()
            ];
            Log::critical(json_encode($input));
        }

    }


}
