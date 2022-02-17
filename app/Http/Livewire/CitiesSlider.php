<?php

namespace App\Http\Livewire;

use App\Models\Slider;
use Livewire\Component;

class CitiesSlider extends Component
{
    public function render()
    {
        return view('livewire.city-slider',['sliders'=> Slider::all()]);
    }
}
