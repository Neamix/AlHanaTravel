<?php

namespace App\View\Components;

use App\Models\Hotel;
use Illuminate\View\Component;

class hotelFullImageComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct(Hotel $hotel)
    {
        $this->hotel = $hotel;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.hotel-full-image-component',['hotel' => $this->hotel]);
    }
}
