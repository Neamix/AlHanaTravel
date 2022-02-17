<?php

namespace App\Http\Livewire;

use App\Models\City;
use Livewire\Component;

class CitySlider extends Component
{
    public $title;

    public function mount($title) {
        $this->title = $title;
    }

    public function render()
    {
        return view('livewire.city-slider',[
            'cities' => City::all(),
            'title'  => $this->title
        ]);
    }
}
