<?php

namespace App\Http\Controllers\Offer;

use App\Http\Controllers\CustomTraits\OfferTrait;
use App\Offer;
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

    public function getlisting(Request $request){
        try{
            $offerData = Offer::get();
            $iTotalRecords = count($offerData);
            $records = array();
            $records['data'] = array();
            $end = $request->length < 0 ? count($offerData) : $request->length;
            for($iterator = 0,$pagination = $request->start; $iterator < $end && $pagination < count($offerData); $iterator++,$pagination++ ){

                    $actionDropDown =  '<div class="margin-bottom-5">
                                        <button class="btn btn-sm blue"> 
                                            <form action="/offer/change-status/approved/'.$offerData[$pagination]->id.'" method="post">
                                                <a href="javascript:void(0);" onclick="changeStatus(this)" style="color: white">
                                                   <i class="fa fa-check-square-o"></i>  Approve 
                                                </a>
                                                <input type="hidden" name="_token">
                                            </form> 
                                        </button>
                                        </div>
                                        <div>
                                        <button class="btn btn-sm default "> 
                                            <form action="/offer/change-status/disapproved/'.$offerData[$pagination]->id.'" method="post">
                                                <a href="javascript:void(0);" onclick="changeStatus(this)" style="color: grey">
                                                   <i class="fa fa-times"></i> Disapprove 
                                                </a>
                                                <input type="hidden" name="_token">
                                            </form>
                                        </button>
                                        </div>';

                $records['data'][$iterator] = [
                    $offerData[$pagination]->id,
                    $offerData[$pagination]->offerType->name,
                    date('d F Y',strtotime($offerData[$pagination]->valid_from)),
                    date('d F Y',strtotime($offerData[$pagination]->valid_to)),
                    ucwords($offerData[$pagination]->sellerAddress->shop_name),
                    $offerData[$pagination]->offerStatus->name,
                    $actionDropDown
                ];
            }
            $records["draw"] = intval($request->draw);
            $records["recordsTotal"] = $iTotalRecords;
            $records["recordsFiltered"] = $iTotalRecords;
            $status = 200;
        }catch(\Exception $e){
            $data = [
                'action' => 'Get offer manage view',
                'exception' => $e->getMessage()
            ];
            Log::critical(json_encode($data));
            $status = 500;
            $response = array();
        }
        return response()->json($records,$status);
    }
}
