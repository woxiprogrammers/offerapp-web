<?php

namespace App\Http\Middleware;

use App\Seller;
use App\SellerAddress;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        try{
            if (Auth::guard($guard)->check()) {
                $user = Auth::user();
                $seller = Seller::where('user_id', $user->id)->first();
                $seller_address = SellerAddress::where('seller_id', $seller->id)->first();
                if(isset($seller_address) || $request->route()->getName() == 'get-seller-account' || $request->route()->getName() == 'set-seller-account' ){
                    return $next($request);
                }else{
                    return redirect('/');
                }
            }else{
                return redirect('/');
            }
        }catch(\Exception $e){
            $data = [
                'action' => 'Authenticate middleware',
                'exception' => $e->getMessage()
            ];
            Log::critical(json_encode($data));
            abort(500);
        }
    }
}
