<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Seller;
use App\SellerAddress;
use App\User;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
                                            <form action="/customer/edit/'.$customerData[$pagination]->id.'" method="post">
                                                <a href="/customer/edit/'.$customerData[$pagination]->id.'"  onclick="changeStatus(this)"  style="color: white">
                                                  <i class="fa fa-edit"></i>   Edit Detail 
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

    public function getCustomerEdit(Request $request, $customer_id){
        try{
            $user = Customer::where('id', $customer_id)->first()->user;

            return view('superadmin.customer.edit',compact('user', 'customer_id'));
        }catch(\Exception $e){
            $data = [
                'action' => 'get edit customer view',
                'exception' => $e->getMessage(),
                'params' => $request->all()
            ];
            Log::critical(json_encode($data));
            abort(500);
        }
    }

    public function setCustomerEdit(Request $request, $customer_id){
        try{
            $user = Customer::where('id', $customer_id)->first()->user;
            $user->first_name = $request['first_name'];
            $user->last_name = $request['last_name'];
            $user->mobile_no = $request['mobile_no'];
            $user->email = $request['email'];
            $user->save();
            return redirect(route('customerListing'));
        }catch(\Exception $e){
            $data = [
                'action' => 'sett customer edit',
                'exception' => $e->getMessage(),
                'params' => $request->all()
            ];
            Log::critical(json_encode($data));
            abort(500);
        }
    }
}
