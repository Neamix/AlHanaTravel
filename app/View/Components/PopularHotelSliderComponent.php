<?php

namespace App\View\Components;

use App\Models\Hotel;
use Illuminate\View\Component;

class PopularHotelSliderComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $hotels = Hotel::all();
        return view('components.popular-hotel-slider-component',[
            'hotels' => $hotels
        ]);
    }
}
