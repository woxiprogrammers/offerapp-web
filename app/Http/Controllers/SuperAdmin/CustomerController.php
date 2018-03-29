<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Seller;
use App\SellerAddress;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getManageView(Request $request){
        try{
            return view('superadmin.customer.manage');
        }catch (\Exception $e){
            $data = [
                'action' => 'Get seller manage view',
                'exception' => $e->getMessage()
            ];
            Log::critical(json_encode($data));
            abort(500);
        }
    }

    public function getCustomerListing(Request $request){
        try{

            $customerData = Customer::get();
            $iTotalRecords = count($customerData);
            $records = array();
            $records['data'] = array();
            $end = $request->length < 0 ? count($customerData) : $request->length;
            for($iterator = 0,$pagination = $request->start; $iterator < $end && $pagination < count($customerData); $iterator++,$pagination++ ){

                $actionDropDown =  '<button class="edit btn btn-sm btn-success"> 
                                            <form action="/offer/change-status/approved/'.$customerData[$pagination]->id.'" method="post">
                                                <a href="javascript:void(0);" onclick="changeStatus(this)" style="color: white">
                                                  <i class="fa fa-edit"></i>   Edit 
                                                </a>
                                                <input type="hidden" name="_token">
                                            </form> 
                                        </button>';

                $records['data'][$iterator] = [
                    $customerData[$pagination]->id,
                    $customerData[$pagination]->user->first_name.' '.$customerData[$pagination]->user->last_name,
                    $customerData[$pagination]->user->email,
                    '+91-'.$customerData[$pagination]->user->mobile_no,
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
