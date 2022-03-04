<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use App\Models\Booking;
use App\Models\Hotel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'auth'],function(){
    Route::get('/verify',[FrontController::class,'verify'])->name('verify.account');
    Route::post('/resend',[FrontController::class,'resendVerify'])->name('verify.email');
});


Route::get('/',[FrontController::class,'index']);
Route::get('/search',[FrontController::class,'search'])->name('search');

Route::get('/socialite/{drive}',[UserController::class,'socialite'])->name('socialite');
Route::get('/socialite/{drive}/redirect',[UserController::class,'socialRedirect'])->name('socialite.redirect');

Route::group(['prefix' => 'hotel'],function(){
    Route::post('/filter',[HotelController::class,'filter'])->name('hotel.filter');
    Route::get('/{hotel}',[HotelController::class,'index'])->name('hotel.show');
    Route::post('/reserved',[HotelController::class,'reserved'])->name('hotel.reserved');
});

Route::group(['prefix' => 'city'],function(){
    Route::post('/filter',[CityController::class,'filter'])->name('city.filter');
    Route::get('/{city}',[CityController::class,'getCityHotel'])->name('city.hotel');
});

Route::group(['prefix' => 'slider'],function(){
    Route::post('/filter',[SliderController::class,'filter'])->name('slider.filter');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'user','middleware' => 'auth'],function(){
    Route::get('likes',[UserController::class,'travels'])->name('travels');
    Route::post('likesfilter',[UserController::class,'likesFilter'])->name('likes.filter');
    Route::get('profile',[UserController::class,'profile'])->name('profile');
    Route::post('/like/{hotel}',[UserController::class,'likeHotel'])->name('like.hotel');
    Route::post('profile/edit',[UserController::class,'updatePersonalInfo'])->name('update.personal.info');
});

Route::group(['prefix' => 'booking','middleware' => 'auth'],function(){
    Route::post('/filter',[BookingController::class,'filter'])->name('booking.filter');
});
