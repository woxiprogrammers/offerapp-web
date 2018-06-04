<?php
    /**
     * Created by PhpStorm.
     * User: harsha
     * Date: 26/3/18
     * Time: 11:41 AM
     */


namespace App\Http\Controllers\CustomTraits;

use App\Offer;
use App\OfferImage;
use App\OfferStatus;
use App\OfferType;
use App\SellerAddress;
use App\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

trait OfferTrait{

    public function getCreateView(Request $request){
        try{
            $offerTypes = OfferType::select('id','name')->get()->toArray();
            $subCategories = Category::whereNotNull('category_id')->select('id','name','category_id')->get()->toArray();
            $mainCategoriesWithOutSubCategory = Category::whereIn('slug',['gym','sports'])->select('id','name','category_id')->get()->toArray();
            $subCategories = array_merge($subCategories,$mainCategoriesWithOutSubCategory);
            $iterator = 0;
            foreach ($subCategories as $key => $subCategory) {
                if($subCategory['category_id'] != null){
                    $mainCategoryName = Category::where('id',$subCategory['category_id'])->pluck('name')->first();
                    $categories[$iterator]['id'] = $subCategory['id'];
                    $categories[$iterator]['name'] = $mainCategoryName.' - '.$subCategory['name'];
                }else{
                    $categories[$iterator]['id'] = $subCategory['id'];
                    $categories[$iterator]['name'] = $subCategory['name'];
                }
                $iterator++;
            }
            $sellerAddresses = SellerAddress::where('is_active', true)->get();
            return view('offer.create')->with(compact('offerTypes','categories','sellerAddresses'));
        }catch (\Exception $e){
            $data = [
                'action' => 'Get Offer Create View',
                'exception' => $e->getMessage()
            ];
            Log::critical(json_encode($data));
            abort(500);
        }
    }

    public function createOffer(Request $request){
        try{
            $offerData = $request->except('_token','offer_images');
            $user = Auth::user();
            if($user->role->slug == 'seller'){
                $offerData['offer_status_id'] = OfferStatus::where('slug','pending')->pluck('id')->first();
            }else{
                $offerData['offer_status_id'] = OfferStatus::where('slug','approved')->pluck('id')->first();
            }
            $offer = Offer::create($offerData);
            if($request->has('offer_images')){
                $offerDirectoryName = sha1($offer->id);
                $userDirectoryName = sha1($user->id);
                $tempImageUploadPath = public_path().env('OFFER_TEMP_IMAGE_UPLOAD').DIRECTORY_SEPARATOR.$userDirectoryName;
                $imageUploadPath = public_path().env('OFFER_IMAGE_UPLOAD').DIRECTORY_SEPARATOR.$offerDirectoryName;
                $offerImageData = ['offer_id' => $offer->id];
                foreach($request->offer_images as $image){
                    $imageName = basename($image['image_name']);
                    $newTempImageUploadPath = $tempImageUploadPath.'/'.$imageName;
                    $offerImageData['name'] = $imageName;
                    OfferImage::create($offerImageData);
                    if (!file_exists($imageUploadPath)) {
                        File::makeDirectory($imageUploadPath, $mode = 0777, true, true);
                    }
                    if(File::exists($newTempImageUploadPath)){

                        $imageUploadNewPath = $imageUploadPath.DIRECTORY_SEPARATOR.$imageName;
                        File::move($newTempImageUploadPath,$imageUploadNewPath);
                    }
                }
                if(count(scandir($tempImageUploadPath)) <= 2){
                    rmdir($tempImageUploadPath);
                }
            }
            $request->session()->flash('success','Offer Created successfully.');
            return redirect('/offer/manage');
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

    public function uploadTempOfferImages(Request $request){
        try{
            $userId = Auth::user()->id;
            $userDirectoryName = sha1($userId);
            $tempUploadPath = public_path().env('OFFER_TEMP_IMAGE_UPLOAD');
            $tempImageUploadPath = $tempUploadPath.DIRECTORY_SEPARATOR.$userDirectoryName;
            /* Create Upload Directory If Not Exists */
            Log::info($tempImageUploadPath);
            if (!file_exists($tempImageUploadPath)) {
                File::makeDirectory($tempImageUploadPath, $mode = 0777, true, true);
            }
            $extension = $request->file('file')->getClientOriginalExtension();
            $filename = mt_rand(1,10000000000).sha1(time()).".{$extension}";
            $request->file('file')->move($tempImageUploadPath,$filename);
            $path = env('OFFER_TEMP_IMAGE_UPLOAD').DIRECTORY_SEPARATOR.$userDirectoryName.DIRECTORY_SEPARATOR.$filename;
            $response = [
                'jsonrpc' => '2.0',
                'result' => 'OK',
                'path' => $path
            ];
        }catch (\Exception $e){
            $response = [
                'jsonrpc' => '2.0',
                'error' => [
                    'code' => 101,
                    'message' => 'Failed to open input stream.',
                ],
                'id' => 'id'
            ];
        }
        return response()->json($response);
    }

    public function displayOfferImages(Request $request){
        try{
            $path = $request->path;
            $count = $request->count;
            $random = mt_rand(1,10000000000);
        }catch (\Exception $e){
            $path = null;
            $count = null;
        }
        return view('offer.partials.upload-image')->with(compact('path','count','random'));
    }

    public function removeTempImage(Request $request){
        try{
            $sellerUploadPath = public_path().$request->path;
            File::delete($sellerUploadPath);
            return response(200);
        }catch(\Exception $e){
            return response(500);
        }
    }

}