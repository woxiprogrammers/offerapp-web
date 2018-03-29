<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth']], function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/logout', ['uses' => 'Auth\LoginController@logout'])->name('logout');
});

Route::group(['middleware' => ['guest']], function (){
    Route::get('login',['uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login',['uses' => 'Auth\LoginController@login'])->name('login');
    Route::post('register',['uses' => 'Auth\RegisterController@register'])->name('register');
});


Route::group(['prefix' => 'register'], function(){
    Route::get('mobile_no','Auth\OtpVerification@getMobileNo')->name('get-mobile_no');
    Route::post('getotp', 'Auth\OtpVerification@getOtp')->name('get-otp');
    Route::post('verifiyotp', 'Auth\OtpVerification@verifyOtp')->name('verifiy-otp');
});

Route::group(['prefix' => 'offer'], function(){

    Route::post('listing',array('uses' => 'Offer\OfferController@getlisting'));
    Route::get('manage','Offer\OfferController@getManageView')->name('offerListing');

    Route::get('create','Offer\OfferController@getCreateView');
    Route::post('create','Offer\OfferController@createOffer');
    Route::post('image-upload',array('uses'=>'Offer\OfferController@uploadTempOfferImages'));
    Route::post('display-images',array('uses'=>'Offer\OfferController@displayOfferImages'));
    Route::post('delete-temp-product-image',array('uses'=>'Offer\OfferController@removeTempImage'));
});

Route::group(['prefix' => 'seller'], function(){
    Route::get('manage','SuperAdmin\SellerController@getManageView')->name('sellerListing');
    Route::post('listing','SuperAdmin\SellerController@getSellerListing');

});

Route::group(['prefix' => 'customer'], function(){
    Route::get('manage','SuperAdmin\CustomerController@getManageView')->name('customerListing');
    Route::post('listing','SuperAdmin\CustomerController@getCustomerListing');

});

