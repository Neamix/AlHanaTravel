<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LargeBox extends Component
{
    public $hotel;

    public function mount($hotel) 
    {
        $this->hotel = $hotel;
    }

    public function render()
    {
        return view('livewire.large-box',[
            'hotel' => $this->hotel,
        ]);
    }
}
