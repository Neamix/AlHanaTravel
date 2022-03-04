<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\City;
use App\Models\Hotel;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() 
    {
        return view('admin.index');
    }

    public function hotel(Request $request)
    {
        $hotels = Hotel::filter($request)->orderBy('id','DESC')->paginate($request['limit'] ?? 9);
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
        $cities = City::filter($request)->orderBy('id','DESC')->paginate($request['limit'] ?? 9);
        return view('admin.Pages.city')->with([
            'cities' => $cities
        ]);
    }

    public function slider(Request $request) 
    {
        $sliders = Slider::filter($request)->orderBy('id','DESC')->paginate($request['limit'] ?? 9);
        return view('admin.Pages.slider')->with([
            'sliders' => $sliders
        ]);
    }

    public function user(Request $request) 
    {
        $users = User::filter($request)->orderBy('id','DESC')->paginate($request['limit'] ?? 9);
        return view('admin.Pages.users')->with([
            'users' => $users
        ]);
    }

    public function book(Request $request)
    {
        $booking = Booking::filter($request)->orderBy('id','DESC')->paginate($request['limit'] ?? 9);
        return view('admin.Pages.book',[
            'bookings' => $booking
        ]);
    }
}
