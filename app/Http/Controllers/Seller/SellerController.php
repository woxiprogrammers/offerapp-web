<?php

namespace App\Http\Controllers\Seller;

use App\Floor;
use App\Offer;
use App\Seller;
use App\SellerAddress;
use App\SellerAddressImage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Illuminate\Support\Facades\Redirect;


class SellerController extends Controller
{
    protected $perPage = 3;
    public function __construct()
    {
        $this->middleware('custom.auth');
    }

    public function getSellerProfile(Request $request){
        try{
            $user = Auth::user();
            $seller = Seller::where('user_id', $user->id)->first();
            $seller_address = SellerAddress::where('seller_id', $seller->id)->first();
            $offers = Offer::where('seller_address_id', $seller_address->id)->paginate($this->perPage);
            if ($request->ajax()) {
                return view('seller.seller_offer_load', ['seller_address' => $seller_address, 'offers' => $offers])->render();
            }
            return view('seller.seller_profile', compact('seller_address','offers'));
        }catch (\Exception $e){

        }
    }

    public function getSellerAccount(Request $request){
        try{
            $user = Auth::user();
            $seller = Seller::where('user_id', $user->id)->first();
            $floors = Floor::all();
            $seller_address = SellerAddress::where('seller_id', $seller->id)->first();
            if(count($seller_address)>0){
/*                $request->session()->flash('success','Your Account is Set You Can Update it');*/
                return view('seller.seller_account', compact('seller_address','seller','floors'));
            }else{
/*                $request->session()->flash('error','Please Update your Account');*/
                return view('seller.seller_account', compact('seller','floors'));
            }

        }catch (\Exception $e){
            $data = [
                'action' => 'Get Seller Address View',
                'exception' => $e->getMessage(),
                'params' => $request->all()
            ];
            Log::critical(json_encode($data));
        }
    }

    public function setSellerAccount(Request $request){
        try {

            $search_address = $request['shopName'] . ' ' . $request['address'];
            $detail_address = $this->sellerDetailAddress($search_address);
            if($detail_address['status'] == '200'){
                $seller_id = Seller::where('user_id', Auth::user()->id)->pluck('id')->first();
                $seller_address = SellerAddress::where('seller_id', $seller_id)->first();
                if (!isset($seller_address)) {
                    $seller_address = SellerAddress::create([
                        'seller_id' => $seller_id,
                        'shop_name' => $request['shopName'],
                        'landline' => $request['landline'],
                        'address' => $detail_address['detailAddress']['address'],
                        'floor_id' => Floor::where('slug', $request['floorSlug'])->pluck('id')->first(),
                        'zipcode' => $detail_address['detailAddress']['zipcode'],
                        'city' => $detail_address['detailAddress']['city'],
                        'state' => $detail_address['detailAddress']['state'],
                        'latitude' => $detail_address['detailAddress']['latitude'],
                        'longitude' => $detail_address['detailAddress']['longitude'],
                        'is_active' => true,
                    ]);

                    $request->session()->flash('success','Created Successfully');
                    return Redirect::back();
                } else {
                    $seller_address->shop_name = $request['shopName'];
                    $seller_address->landline = $request['landline'];
                    $seller_address->address = $detail_address['detailAddress']['address'];
                    $seller_address->floor_id = Floor::where('slug', $request['floorSlug'])->pluck('id')->first();
                    $seller_address->zipcode = $detail_address['detailAddress']['zipcode'];
                    $seller_address->city = $detail_address['detailAddress']['city'];
                    $seller_address->state = $detail_address['detailAddress']['state'];
                    $seller_address->latitude = $detail_address['detailAddress']['latitude'];
                    $seller_address->longitude = $detail_address['detailAddress']['longitude'];
                    $seller_address->save();
                    $request->session()->flash('success','Updated Successfully');
                    return redirect('seller/account');
                }
            }else{
                $request->session()->flash('error','Please Enter a Locatable Address');
                return Redirect::back();
            }


        } catch (\Exception $e) {

            $data = [
                'action' => 'Add Seller Address Detail',
                'exception' => $e->getMessage(),
                'params' => $request->all(),
                'sellerAddressAdded' => false,
            ];
            Log::critical(json_encode($data));
        }

    }

    public function sellerDetailAddress($search_address){
        try {
            $message = "Success";
            $status = 200;
            $location = Mapper::location($search_address);
            $address = '';
            $city = '';
            $state = '';
            $google_addresses = explode(',', $location->getAddress());
            $size_of_google_addresses = sizeof($google_addresses);
            foreach ($google_addresses as $key => $google_address) {
                if ($key < $size_of_google_addresses - 3) {
                    $address = $address . ', ' . $google_address;
                } elseif ($key == $size_of_google_addresses - 3) {
                    $city = $google_address;
                } elseif ($key == $size_of_google_addresses - 2) {
                    $state = $google_address;
                }
            }
            $message = "Success";
            $status = 200;
            $data = [
                'detailAddress' => [
                    'address' => $address,
                    'city' => $city,
                    'state' => $state,
                    'zipcode' => $location->getPostalCode(),
                    'latitude' => $location->getLatitude(),
                    'longitude' => $location->getLongitude(),
                ],
                'status' => $status,
                'message' => $message
            ];

        } catch (\Exception $e) {
            $message = "Fail";
            $status = 500;
            $data = [
                'action' => ' Seller Detail Address ',
                'exception' => $e->getMessage(),
                'params' => $search_address,
                'status' => $status,
                'message' => $message
            ];
            Log::critical(json_encode($data));
        }

        return $data;
    }

    public function changePassword(Request $request){
        try{

            $user = Auth::user();
            if(Auth::attempt(['mobile_no' => $user->mobile_no, 'password' => $request['password']])){
                $newPassword = $request['newPassword'];
                $user->update([
                    'password' => Hash::make($newPassword)
                ]);
                $message = 'Password Updated Successfully';
                $status = 200;
                $request->session()->flash('success', $message);
                return Redirect::back();
            }else{
                $newPassword = $request['password'];
                $user->update([
                    'password' => Hash::make($newPassword)
                ]);
                $message = 'Please Enter the Valid Password';
                $request->session()->flash('error', $message);
                return Redirect::back();
            }

        }catch (\Exception $e){
            $status = 500;
            $message = 'fail';
            $data = [
                'action' => 'Change Credential',
                'exception' => $e->getMessage(),
                'params' => $request->all()
            ];
            Log::critical(json_encode($data));
        }
        $response = [
            'data' => $data,
            'message' => $message
        ];
        return response()->json($response, $status);
    }

    public function changeShopImage(Request $request)
    {
        try{
            $user = Auth::user();
            $seller = Seller::where('user_id', $user->id)->first();
            $seller_address = SellerAddress::where('seller_id', $seller->id)->first();
            $sha1SellerAddressId = sha1($seller_address->id);

            $imageUploadFile = env('WEB_PUBLIC_PATH'). env('SELLER_ADDRESS_IMAGE_UPLOAD') . $sha1SellerAddressId ;
            if (!file_exists($imageUploadFile)) {
                File::makeDirectory($imageUploadFile, $mode = 0777, true, true);
            }
            $extension = $request->file('shopImage')->getClientOriginalExtension();
            $filename = mt_rand(1,10000000000).sha1(time()).".{$extension}";
            $request->file('shopImage')->move($imageUploadFile,$filename);
            SellerAddressImage::create(['name' => $filename, 'seller_address_id' => $seller_address->id]);

            $message = 'Shop Image Updated Successfully';
            $request->session()->flash('success', $message);
            return Redirect::back();
        }catch (\Exception $e){
            $data = [
                'action' => 'Set Shop Image',
                'params' => $request->all(),
                'exception' => $e->getMessage()
            ];
            Log::critical(json_encode($data));
            abort(500);
        }
    }
}
