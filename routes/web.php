<?php

use App\Http\Controllers\admin\CityController;
use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\HotelController;
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

Route::get('/',[FrontController::class,'index']);

Route::group(['prefix' => 'hotel'],function(){
    Route::post('/filter',[HotelController::class,'filter'])->name('hotel.filter');
});

Route::group(['prefix' => 'city'],function(){
    Route::post('/filter',[CityController::class,'filter'])->name('city.filter');
});
