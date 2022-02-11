<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index() 
    {
        return view('admin.Pages.city')->with([
            'cities' => City::all()
        ]);
    }

    public function upsert(CityRequest $request) 
    {
        return City::upsertInstance($request);
    }

    public function getCity(City $city) 
    {
        return $city;
    }
}
