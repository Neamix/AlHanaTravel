<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Hotel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() 
    {
        return view('admin.index');
    }

    public function hotel(Request $request)
    {
        $hotels = Hotel::filter($request)->orderBy('id','DESC')->paginate($request['limit'] ?? 10);
        if($request->ajax()) {
            return $hotels;
        }

        return view('admin.Pages.hotel')->with([
            'hotels' => $hotels,
            'cities' => City::all()
        ]);
    }

    public function city(Request $request) 
    {
        $cities = City::filter($request)->orderBy('id','DESC')->paginate($request['limit'] ?? 1);
        return view('admin.Pages.city')->with([
            'cities' => $cities
        ]);
    }

    public function book()
    {
        return view('admin.Pages.book');
    }
}