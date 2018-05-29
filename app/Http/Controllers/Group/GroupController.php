<?php
/**
 * Created by PhpStorm.
 * User: arvind
 * Date: 25/5/18
 * Time: 9:18 PM
 */

namespace App\Http\Controllers\Group;

use App\Customer;
use App\Group;
use App\GroupCustomer;
use App\GroupMessage;
use App\Offer;
use App\Seller;
use App\SellerAddress;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class GroupController extends Controller
{
    protected $perPage = 2;
    public function __construct()
    {
        $this->middleware('custom.auth');
    }

    public function getManageView(Request $request){
        try{
            $user = Auth::user();
            $user_id = $user->id;
            $seller_id = Seller::where('user_id',$user_id)->pluck('id')->first();
            $groups = Group::where('seller_id', $seller_id)->paginate($this->perPage);
            if ($request->ajax()) {
                return view('group.group_load', ['groups' => $groups])->render();
            }
            return view('group.group_manage', compact('groups'));
        }catch (\Exception $e){
            $data = [
                'action' => 'Get group manage view',
                'exception' => $e->getMessage()
            ];
            Log::critical(json_encode($data));
            abort(500);
        }
    }

    public function createGroup(Request $request){
        try{
            $user = Auth::user();
            $user_id = $user->id;
            $seller_id = Seller::where('user_id',$user_id)->pluck('id')->first();
            $groups = Group::create([
                'name' => $request['name'],
                'description' => $request['description'],
                'seller_id' => $seller_id
            ]);
            return redirect()->back();
        }catch (\Exception $e){
            $data = [
                'action' => 'Create group',
                'exception' => $e->getMessage()
            ];
            Log::critical(json_encode($data));
            abort(500);
        }
    }

    public function getGroupDetail(Request $request, $group_id){
        try {
            $customerIds = GroupCustomer::where('group_id', $group_id)->pluck('customer_id');
            $memberList = Customer::whereIn('id', $customerIds)->paginate($this->perPage);
            $members = array();
            foreach ($memberList as $key => $member){
                $members[$key] = $member->user;
            }
            if ($request->ajax()) {
                return view('group.customer_load', ['members' => $members, 'memberList' => $memberList, 'group_id' => $group_id])->render();
            }
            return view('group.customer_manage', compact('members', 'memberList', 'group_id'));
        } catch (\Exception $e) {
            $data = [
                'action' => 'Groups Customer Listing',
                'exception' => $e->getMessage(),
                'params' => $request->all()
            ];
            Log::critical(json_encode($data));
        }
    }

    public function groupOfferListing(Request $request, $group_id){
        try{
            $offerIds = GroupMessage::where('group_id', $group_id)->pluck('offer_id');
            $offers = array();
            $offerList = Offer::whereIn('id', $offerIds)->paginate($this->perPage);
            foreach ($offerList as $key => $offer) {
                $offers[$key]['offer_id'] = $offer['id'];
                $offers[$key]['offer_type_name'] = $offer->offerType->name;
                $offers[$key]['offer_status_name'] = $offer->offerStatus->name;
                $offers[$key]['offer_description'] = $offer->description;
                $valid_from = $offer->valid_from;
                $valid_to = $offer->valid_to;
                $offers[$key]['start_date'] = date('d F, Y', strtotime($valid_from));
                $offers[$key]['end_date'] = date('d F, Y', strtotime($valid_to));
                $offers[$key]['offerImage'] = $offer->offerImages->first();
            }
            if ($request->ajax()) {
                return view('group.offer_load', ['offers' => $offers, 'offerList' => $offerList, 'group_id' => $group_id])->render();
            }
            return view('group.offer_manage', compact('offers', 'offerList','group_id'));

        } catch (\Exception $e) {

            $data = [
                'action' => 'Group-Offer-Listing',
                'exception' => $e->getMessage(),
                'params' => $request->all()
            ];
            Log::critical(json_encode($data));
        }

    }

    public function addMemberToGroup(Request $request, $group_id){
        try{
            $mobile_no = $request ['mobile_no'];
            $user_id = User::where('mobile_no',$mobile_no)->pluck('id')->first();
            $customer_id = Customer::where('user_id',$user_id)->pluck('id')->first();
            $check_customer_group_count = GroupCustomer::where('customer_id', $customer_id)->where('group_id',$group_id)->pluck('id');
            if(count($check_customer_group_count) > 0) {
                Session::flash('error','Please enter a valid mobile no');
                return redirect()->back()->with('error', 'Please enter a valid mobile no');

            }elseif(count($user_id) > 0 && count($customer_id) > 0){
                 GroupCustomer::create([
                    'group_id' => $group_id,
                    'customer_id' => $customer_id
                ]);
            }
            return redirect()->back();

        } catch (\Exception $e) {

            $data = [
                'action' => 'Add To Group',
                'exception' => $e->getMessage(),
                'params' => $request->all()

            ];
            Log::critical(json_encode($data));
        }

    }

    public function removeMemberFromGroup(Request $request, $group_id, $user_id){
        try{
            $customer_id = Customer::where('user_id',$user_id)->pluck('id')->first();
            $customer_group = GroupCustomer::where('customer_id', $customer_id)->where('group_id',$group_id)->first();
            if(count($customer_group) > 0) {
                $customer_group->delete();
                return redirect()->back();
            }else{
                $error = "No Such Member for this Group Exists";
                return redirect()->back()->with('error', $error);
            }

        } catch (\Exception $e) {
            $message = "Fail";
            $status = 500;
            $data = [
                'action' => 'Remove Member From Group',
                'exception' => $e->getMessage(),
                'params' => $request->all()

            ];
            Log::critical(json_encode($data));
        }

    }

    public function removeOfferFromGroup(Request $request, $group_id, $offer_id){
        try{
            $group_offer = GroupMessage::where('group_id',$group_id)->where('offer_id', $offer_id)->first();
            if(count($group_offer) > 0) {
                $group_offer->delete();
                return redirect()->back();
            }else{
                $error = "No Such Offer for this Group Exists";
                return redirect()->back()->with('error', $error);
            }
        } catch (\Exception $e) {

            $data = [
                'action' => 'Remove Offer From Group',
                'exception' => $e->getMessage(),
                'params' => $request->all()

            ];
            Log::critical(json_encode($data));
        }

    }

    public function getPromoteView(Request $request){
        try{
            $user = Auth::user();
            $seller = Seller::where('user_id', $user->id)->first();
            $sellerAddressIds = SellerAddress::where('seller_id', $seller->id)->pluck('id');
            $groups = Group::where('seller_id',$seller->id)->get();
            $offers = Offer::whereIn('seller_address_id', $sellerAddressIds)->get();
            return view('group.promote', compact('groups', 'offers'));
        }catch (\Exception $e) {
            $data = [
                'action' => 'Promote Offer View',
                'exception' => $e->getMessage(),
                'params' => $request->all()

            ];
            dd($data);
            Log::critical(json_encode($data));
        }
    }

    public function promoteOffer(Request $request){
        try{
            $user = Auth::user();
            $offer_id = $request['offer_id'];
            $group_ids = $request['group_id'];
            $role_id = User::where('id',$user->id)->pluck('role_id')->first();
            foreach($group_ids as $key => $group_id){
                GroupMessage::create([
                    'group_id' => $group_id,
                    'role_id' => $role_id,
                    'offer_id' => $offer_id,
                    'reference_member_id' => $user->id
                ]);
            }
            $message = 'Offer Promoted Successfully';
            Session::flash('success',$message);
            return redirect()->back()->with('success', $message);

        }catch (\Exception $e) {
            $data = [
                'action' => 'Promote Offer',
                'exception' => $e->getMessage(),
                'params' => $request->all()

            ];
            Log::critical(json_encode($data));
        }

    }

}