<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BoxSmallDetails extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $city;
    public function __construct($city)
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
        return view('components.box-small-details',[
            'city' => $this->city
        ]);
    }
}
