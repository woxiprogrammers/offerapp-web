<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\CustomTraits\OfferTrait;
use App\Offer;
use App\OfferStatus;
use App\Seller;
use App\SellerAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SellerController extends Controller
{
    protected $perPage = 3;
    public function __construct()
    {
        $this->middleware('custom.auth');
    }

    public function getSellerProfile(Request $request){
        try{
            $user = Auth::user();
            $seller = Seller::where('user_id', $user->id)->first();
            $seller_address = SellerAddress::where('seller_id', $seller->id)->first();
            $offers = Offer::where('seller_address_id', $seller_address->id)->paginate($this->perPage);
            if ($request->ajax()) {
                return view('seller.seller_offer_load', ['seller_address' => $seller_address, 'offers' => $offers])->render();
            }
            return view('seller.seller_profile', compact('seller_address','offers'));
        }catch (\Exception $e){

        }
    }}
