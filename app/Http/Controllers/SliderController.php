<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function upsert(SliderRequest $request) 
    {
        return Slider::upsertInstance($request);
    }

    public function delete(Slider $slider)
    {
        return $slider->deleteInstance();
    }

    public function filter(Request $request) {
        return Slider::filter($request)->orderBy('id','DESC')->paginate($request['limit'] ?? 1);
    }

    public function getSlider(Slider $slider) 
    {
        return $slider;
    }
}
