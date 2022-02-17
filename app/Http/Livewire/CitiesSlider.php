<?php

namespace App\Http\Livewire;

use App\Models\City;
use Livewire\Component;

class CitiesSlider extends Component
{
    public function render()
    {
        return view('livewire.cities-slider',['cities'=>City::all()]);
    }
}
