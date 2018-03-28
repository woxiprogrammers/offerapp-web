<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class SellerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getManageView(Request $request){
        try{
            return view('superadmin.seller.manage');
        }catch (\Exception $e){
            $data = [
                'action' => 'Get seller manage view',
                'exception' => $e->getMessage()
            ];
            Log::critical(json_encode($data));
            abort(500);
        }
    }

    public function getSellerListing(Request $request){
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
