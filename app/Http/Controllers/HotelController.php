<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelRequest;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all()->reverse();
        return view('admin.Pages.hotel')->with([
            'hotels' => $hotels
        ]);
    }

    public function upsert(HotelRequest $request)
    {
        return Hotel::upsertInstance($request);
    }

    public function filter(Request $request)
    {
        return Hotel::filter($request->all())->paginate($request['limit'] ?? 15);

    }

    public function delete(Hotel $hotel)
    {
        return $hotel->deleteInstance();
    }
}
