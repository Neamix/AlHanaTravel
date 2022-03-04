<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LikeBoxComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $hotel;
    public function __construct($hotel)
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
        return view('components.like-box-component',[
            'hotel' => $this->hotel
        ]);
    }
}
