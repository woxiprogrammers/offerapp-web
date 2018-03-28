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

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::post('/login',array('uses' => 'Auth\LoginController@login'));
Route::get('/register/step1', function () {
    return view('auth.RegisterStep1');
})->name('register-step-1');

Route::get('/register/step2', function () {
    return view('auth.RegisterStep2');
})->name('register-step-2');

Route::get('/register/step3', function () {
    return view('auth.RegisterStep3');
})->name('register-step-3');

Route::group(['prefix' => 'offer'], function(){
    Route::post('listing',array('uses' => 'Offer\OfferController@getlisting'));
    Route::get('manage','Offer\OfferController@getManageView');
    Route::get('create','Offer\OfferController@getCreateView');
    Route::post('create','Offer\OfferController@createOffer');
    Route::post('image-upload',array('uses'=>'Offer\OfferController@uploadTempOfferImages'));
    Route::post('display-images',array('uses'=>'Offer\OfferController@displayOfferImages'));
    Route::post('delete-temp-product-image',array('uses'=>'Offer\OfferController@removeTempImage'));
});