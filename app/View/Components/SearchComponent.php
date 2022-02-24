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

    public function __construct()
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.search-component',[
            'hotels' => Hotel::paginate(9),
            'cities' => City::all()
        ]);
    }
}
