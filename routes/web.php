<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\TravelController;
use Illuminate\Support\Facades\DB;
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

Route::group(['prefix' => 'admin'],function(){
    Route::get('/',[AdminController::class,'index']);
    Route::group(['prefix' => 'hotel'],function(){
        Route::get('/',[HotelController::class,'index'])->name('hotel.index');
        Route::get('/{hotel}',[HotelController::class,'getHotel'])->name('hotel.get');
        Route::post('/{hotel}/gallary',[HotelController::class,'editGallary'])->name('hotel.get');
        Route::post('/{hotel}/gallary/delete',[HotelController::class,'deleteGallay'])->name('hotel.get');
        Route::post('/upsert',[HotelController::class,'upsert'])->name('hotel.upsert');
        Route::post('/delete/{hotel}',[HotelController::class,'delete'])->name('hotel.delete');
    });

    Route::group(['prefix' => 'city'],function(){
        Route::get('/',[CityController::class,'index'])->name('city.index');
        Route::get('/{city}',[CityController::class,'getCity'])->name('hotel.get');
        Route::post('/upsert',[CityController::class,'upsert'])->name('city.upsert');
        Route::post('/delete/{city}',[CityController::class,'delete'])->name('city.delete');
    });
});


Route::get('/test',function(){
    DB::table('hotels')->with(['previewImage'])->get();
});
