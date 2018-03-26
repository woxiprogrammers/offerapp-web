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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register/step1', function () {
    return view('auth.RegisterStep1');
})->name('register-step-1');

Route::get('/register/step2', function () {
    return view('auth.RegisterStep2');
})->name('register-step-2');

Route::get('/register/step3', function () {
    return view('auth.RegisterStep3');
})->name('register-step-3');

Route::get('/sellerListing', 'SuperAdmin\SellerController@sellerListing')->name('sellerListing');
