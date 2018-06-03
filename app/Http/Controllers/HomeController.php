<?php

namespace App\Http\Controllers;

use App\Seller;
use App\SellerAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
            $user = Auth::user();
            $seller = Seller::where('user_id', $user->id)->first();
            $seller_address = SellerAddress::where('seller_id', $seller->id)->first();
            if(isset($seller_address)){
                return view('home');

            }else{
                $request->session()->flash('error','Please Update your Account');
                return view('home');
            }

        }catch (\Exception $e){
            $data = [
                'action' => 'home View',
                'exception' => $e->getMessage(),
            ];
            Log::critical(json_encode($data));
        }
    }
}
