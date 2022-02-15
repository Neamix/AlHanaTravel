<?php

namespace App\Http\Controllers;

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
        $hotels = Hotel::filter($request)->orderBy('id','DESC')->paginate($request['limit'] ?? 2);

        if($request->ajax()) {
            return $hotels;
        }

        return view('admin.Pages.hotel')->with([
            'hotels' => $hotels
        ]);
    }

    public function city() 
    {
        return view('admin.Pages.city')->with([
            'cities' => City::all()
        ]);
    }

    public function book()
    {
        return view('admin.Pages.book');
    }
}
