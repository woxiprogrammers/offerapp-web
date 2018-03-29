<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Offer;
use App\SellerAddress;
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

            $sellerData = SellerAddress::get();
            $iTotalRecords = count($sellerData);
            $records = array();
            $records['data'] = array();
            $end = $request->length < 0 ? count($sellerData) : $request->length;
            for($iterator = 0,$pagination = $request->start; $iterator < $end && $pagination < count($sellerData); $iterator++,$pagination++ ){

                $actionDropDown =  '<button class="edit btn btn-sm btn-success"> 
                                            <form action="/offer/change-status/approved/'.$sellerData[$pagination]->id.'" method="post">
                                                <a href="javascript:void(0);" onclick="changeStatus(this)" style="color: white">
                                                  <i class="fa fa-edit"></i>   Edit 
                                                </a>
                                                <input type="hidden" name="_token">
                                            </form> 
                                        </button>';

                $records['data'][$iterator] = [
                    $sellerData[$pagination]->seller_id,
                    $sellerData[$pagination]->seller->user->first_name,
                    ucwords($sellerData[$pagination]->shop_name),
                    $sellerData[$pagination]->seller->user->email,
                    $actionDropDown
                ];
            }
            $records["draw"] = intval($request->draw);
            $records["recordsTotal"] = $iTotalRecords;
            $records["recordsFiltered"] = $iTotalRecords;
            $status = 200;

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
