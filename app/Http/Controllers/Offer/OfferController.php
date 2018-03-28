<?php

namespace App\Http\Controllers\Offer;

use App\Http\Controllers\CustomTraits\OfferTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class OfferController extends Controller
{
use OfferTrait;
    public function __construct()
    {
        $this->middleware('custom.auth');
    }

    public function getManageView(Request $request){
        try{
            return view('offer.manage');
        }catch (\Exception $e){
            $data = [
                'action' => 'Get offer manage view',
                'exception' => $e->getMessage()
            ];
            Log::critical(json_encode($data));
            abort(500);
        }
    }

    public function getOfferListing(Request $request){
        try{

            $records["id"] = 1;
            $records["date"] = 27-3-18;
            $records["seller"] = seller;
            $records["ship to"] = pune;
            $records["price"] = 100;
            $records["amount"] = 200;
            $records["status"] = 'pending';


            return response()->json($records);
        }catch (\Exception $e){
            $data = [
                'action' => 'Offer Create',
                'exception' => $e->getMessage(),
                'params' => $request->all()
            ];
            Log::critical(json_encode($data));
            abort(500);
        }
    }
}
