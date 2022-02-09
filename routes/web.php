<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TravelController;
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

Route::get('/travel/upsert',[TravelController::class,'upsert']);

Route::group(['prefix' => 'admin'],function(){
    Route::get('/',[AdminController::class,'index']);
});
