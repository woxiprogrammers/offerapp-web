<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Offer;
use App\Seller;
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

    public function getSellerListing(Request $request)
    {
        try {

            $sellerData = SellerAddress::get();
            $iTotalRecords = count($sellerData);
            $records = array();
            $records['data'] = array();
            $end = $request->length < 0 ? count($sellerData) : $request->length;
            for ($iterator = 0, $pagination = $request->start; $iterator < $end && $pagination < count($sellerData); $iterator++, $pagination++) {

                $actionDropDown = '<button class="edit btn btn-sm btn-success"> 
                                            <form action="/seller/edit/' . $sellerData[$pagination]->id . '" method="post">
                                                <a href="/seller/edit/' . $sellerData[$pagination]->id . '" onclick="changeStatus(this)" style="color: white">
                                                  <i class="fa fa-edit"></i>   Edit 
                                                </a>
                                                <input type="hidden" name="_token">
                                            </form> 
                                        </button>';

                $records['data'][$iterator] = [
                    $sellerData[$pagination]->seller_id,
                    $sellerData[$pagination]->seller->user->first_name . ' ' . $sellerData[$pagination]->seller->user->last_name,
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
        } catch (\Exception $e) {
            $data = [
                'action' => 'Offer Create',
                'exception' => $e->getMessage(),
                'params' => $request->all()
            ];
            Log::critical(json_encode($data));
            abort(500);
        }
    }

    public function getSellerEdit(Request $request, $seller_id){
            try{
                $sellerAddress = SellerAddress::select('seller_id', 'shop_name')
                                 ->where('seller_id', $seller_id)->first();

                return view('superadmin.seller.edit',compact('sellerAddress', 'seller_id'));
            }catch(\Exception $e){
                $data = [
                    'action' => 'get seller edit view',
                    'exception' => $e->getMessage(),
                    'params' => $request->all()
                ];
                Log::critical(json_encode($data));
                abort(500);
            }
        }

    public function setSellerEdit(Request $request, $seller_id){
            try{

                $user = Seller::where('id', $seller_id)->first()->user;
                $user->first_name = $request['first_name'];
                $user->last_name = $request['last_name'];
                $user->mobile_no = $request['mobile_no'];
                $user->email = $request['email'];
                $user->save();
                $sellerAddress = SellerAddress::where('seller_id', $seller_id)->first();
                $sellerAddress->shop_name = $request['shop_name'];
                $sellerAddress->save();
                return redirect(route('sellerListing'));
            }catch(\Exception $e){
                $data = [
                    'action' => 'set seller edit',
                    'exception' => $e->getMessage(),
                    'params' => $request->all()
                ];
                Log::critical(json_encode($data));
                abort(500);
            }
        }

}
