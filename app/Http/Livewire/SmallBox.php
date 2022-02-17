<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SmallBox extends Component
{
    public $city;

    public function mount($city)
    {
        $this->city = $city;
    }

    public function render()
    {
        return view('livewire.small-box',[
            'city' => $this->city
        ]);
    }
}
