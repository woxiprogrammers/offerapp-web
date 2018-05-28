<?php

namespace App\Http\Controllers\Offer;

use App\Http\Controllers\CustomTraits\OfferTrait;
use App\Offer;
use App\OfferStatus;
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

    public function getListing(Request $request){
        try{
            $offerData = Offer::get();
            $iTotalRecords = count($offerData);
            $records = array();
            $records['data'] = array();
            $end = $request->length < 0 ? count($offerData) : $request->length;
            for($iterator = 0,$pagination = $request->start; $iterator < $end && $pagination < count($offerData); $iterator++,$pagination++ ){
                if($offerData[$pagination]->offerStatus->slug == 'pending'){
                    $actionDropDown = '<button class="btn btn-xs blue"> 
                                        <a href="/offer/change-status/approved/'.$offerData[$pagination]->id.'" style="color: white">
                                             Approve 
                                        </a>
                                    </button>
                                    <button class="btn btn-xs default "> 
                                        <a href="/offer/change-status/disapproved/'.$offerData[$pagination]->id.'" style="color: grey">
                                            Disapprove 
                                        </a>
                                    </button>
                                    <button class="btn btn-xs default "> 
                                        <a href="/offer/change-status/disapproved/'.$offerData[$pagination]->id.'" style="color: grey">
                                            View 
                                        </a>
                                    </button>';
                }else{
                    $actionDropDown = '';
                }

                $records['data'][$iterator] = [
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

    public function changeOfferStatus(Request $request, $status_slug, $offer_id){
        try{
            $offer = Offer::where('id', $offer_id)->first();
            $offer->offer_status_id = OfferStatus::where('slug', $status_slug)->pluck('id')->first();
            $offer->save();
            return redirect(route('offerListing'));
        }catch (\Exception $e){
            $data = [
                'action' => 'Change Offer Status',
                'exception' => $e->getMessage(),
                'params' => [
                    'status_slug' => $status_slug,
                    'offer_id' => $offer_id,
            ]
            ];
            Log::critical(json_encode($data));
            abort(500);
        }
    }
}
