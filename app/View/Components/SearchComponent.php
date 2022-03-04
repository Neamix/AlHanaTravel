<?php

namespace App\View\Components;

use App\Models\City;
use App\Models\Hotel;
use Illuminate\View\Component;

class SearchComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $city;
    public function __construct($city = null)
    {
        $this->city = $city;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $cities = ($this->city) ? [$this->city] : City::all();
        $hotels = ($this->city) ? Hotel::where('city_id',$this->city->id)->get() : Hotel::paginate(9);
        return view('components.search-component',[
            'hotels' => $hotels,
            'cities' => $cities,
        ]);
    }
}
