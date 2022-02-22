<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
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
Route::get('/search',[FrontController::class,'search']);

Route::get('/socialite/{drive}',[UserController::class,'socialite'])->name('socialite');
Route::get('/socialite/{drive}/redirect',[UserController::class,'socialRedirect'])->name('socialite.redirect');

Route::group(['prefix' => 'hotel'],function(){
    Route::post('/filter',[HotelController::class,'filter'])->name('hotel.filter');
});

Route::group(['prefix' => 'city'],function(){
    Route::post('/filter',[CityController::class,'filter'])->name('city.filter');
});

Route::group(['prefix' => 'slider'],function(){
    Route::post('/filter',[SliderController::class,'filter'])->name('slider.filter');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'user','middleware' => 'auth'],function(){
    Route::get('profile',[UserController::class,'profile']);
    Route::post('profile/edit',[UserController::class,'updatePersonalInfo'])->name('update.personal.info');
});

Route::get('/test',function(){
    $send['desc']  = "مرحبا بك في الهنا ترافيل لاستكمال بينات حسابك برجاء الضغط علي الزر الذي بالاسفل";
    $send['token'] = '12312312';
    $send['view']  = 'emails.user.verify';
    return new App\Mail\DefaultEmail($send);
});
