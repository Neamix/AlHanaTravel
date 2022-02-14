<?php

namespace App\Http\Controllers;

use App\Http\Requests\GallaryRequest;
use App\Http\Requests\HotelRequest;
use App\Models\Hotel;
use App\Traits\validationTrait;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    use validationTrait;
    public function index()
    {
       
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

    public function getHotel(Hotel $hotel) {
        return $hotel;
    }

    public function editGallary(GallaryRequest $request,Hotel $hotel) {
        if($request->gallary) {
            return $hotel->addGallary($request->gallary);
        } else {
            return self::validateResult('success');
        }
    }

    public function deleteGallay(Request $request,Hotel $hotel) {
        if($request->deleted_gallary_ids) {
            return $hotel->removeGallary($request->deleted_gallary_ids);
        } else {
            return self::validateResult('success');
        }
    }
}
