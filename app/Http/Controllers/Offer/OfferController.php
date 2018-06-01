<?php

namespace App\Http\Controllers\Offer;

use App\Http\Controllers\CustomTraits\OfferTrait;
use App\Offer;
use App\OfferStatus;
use App\Seller;
use App\SellerAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OfferController extends Controller
{
use OfferTrait;

    protected $perPage = 3;
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

    public function getOfferView(Request $request){
        try{
            $user = Auth::user();
            $seller = Seller::where('user_id', $user->id)->first();
            $seller_address = SellerAddress::where('seller_id', $seller->id)->first();
            $offers = Offer::where('seller_address_id', $seller_address->id)->paginate($this->perPage);
            $offer_statuses = OfferStatus::where('type',Auth::user()->role->slug)->get();
            return view('offer.view', compact('offers','offer_statuses'));
        }catch (\Exception $e){
            $data = [
                'action' => 'Get offer Gallery view',
                'exception' => $e->getMessage()
            ];
            Log::critical(json_encode($data));
            abort(500);
        }
    }

    public function getListing(Request $request){
        try{
            $user = Auth::user();
            $offerData = Offer::get();
            $iTotalRecords = count($offerData);
            $records = array();
            $records['data'] = array();
            $end = $request->length < 0 ? count($offerData) : $request->length;
            for($iterator = 0,$pagination = $request->start; $iterator < $end && $pagination < count($offerData); $iterator++,$pagination++ ) {
                if ($user->role->slug == 'super-admin' && $offerData[$pagination]->offerStatus->slug == 'pending') {
                    $actionDropDown = '<a href="/offer/change-status/approved/' . $offerData[$pagination]->id . '" class="btn btn-outline blue btn-sm" onclick="changeStatus(this)" >
                                                   <i class="fa fa-check-square-o"></i>  Approve 
                                                </a>
                                                <a href="/offer/change-status/disapproved/' . $offerData[$pagination]->id . '" onclick="changeStatus(this)" class="btn btn-outline dark btn-sm"  >
                                                   <i class="fa fa-times"></i> Disapprove 
                                                </a>
                                                <a href="#offer_view" class="btn btn-outline red-flamingo btn-sm" onclick="changeStatus(this)" >
                                                   <i class="fa fa-check-square-o"></i>  View 
                                                </a>';
                } else {
                    $actionDropDown = '<a href="/offer/edit/' . $offerData[$pagination]->id . '" onclick="changeStatus(this)" class="btn btn-outline red btn-sm" >
                                                   <i class="fa fa-edit"></i>  Edit 
                                                </a>';
                }
                    $records['data'][$iterator] = [
                        $offerData[$pagination]->offerType->name,
                        date('d F Y', strtotime($offerData[$pagination]->valid_from)),
                        date('d F Y', strtotime($offerData[$pagination]->valid_to)),
                        ucwords($offerData[$pagination]->sellerAddress->shop_name),
                        $offerData[$pagination]->offerStatus->name,
                        $actionDropDown
                    ];
                }
                $records["draw"] = intval($request->draw);
                $records["recordsTotal"] = $iTotalRecords;
                $records["recordsFiltered"] = $iTotalRecords;
                $status = 200;
            }
        catch(\Exception $e){
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
