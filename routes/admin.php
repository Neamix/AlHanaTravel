<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TravelController;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/',[AdminController::class,'index']);

Route::group(['prefix' => 'hotel'],function(){
    Route::get('/',[AdminController::class,'hotel'])->name('hotel.index');
    Route::get('/{hotel}',[HotelController::class,'getHotel'])->name('hotel.get');
    Route::post('/{hotel}/gallary',[HotelController::class,'editGallary'])->name('hotel.edit.gallary');
    Route::post('/{hotel}/gallary/delete',[HotelController::class,'deleteGallay'])->name('hotel.delete.gallary');
    Route::post('/upsert',[HotelController::class,'upsert'])->name('hotel.upsert');
    Route::post('/delete/{hotel}',[HotelController::class,'delete'])->name('hotel.delete');
});

Route::group(['prefix' => 'city'],function(){
    Route::get('/',[AdminController::class,'city'])->name('city.index');
    Route::get('/{city}',[CityController::class,'getCity'])->name('city.get');
    Route::post('/upsert',[CityController::class,'upsert'])->name('city.upsert');
    Route::post('/delete/{city}',[CityController::class,'delete'])->name('city.delete');
});

Route::group(['prefix' => 'slider'],function(){
    Route::get('/',[AdminController::class,'slider'])->name('slider.index');
    Route::get('/{slider}',[SliderController::class,'getSlider'])->name('slider.get');
    Route::post('/upsert',[SliderController::class,'upsert'])->name('slider.upsert');
    Route::post('/delete/{slider}',[SliderController::class,'delete'])->name('slider.delete');
});


Route::get('/test',function(Request $request){
   dd( Hotel::filter($request)->get());
});