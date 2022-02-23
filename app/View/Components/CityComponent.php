<?php

namespace App\View\Components;

use App\Models\City;
use Illuminate\View\Component;

class CityComponent extends Component
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
        $cities = City::all();
        return view('components.city-component',[
            'cities' => $cities
        ]);
    }
}
