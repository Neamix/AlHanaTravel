<?php

namespace App\Http\Livewire;

use App\Models\Hotel;
use Livewire\Component;

class HotelSlider extends Component
{
    public $title;

    public function mount($title)
    {
        $this->title  = $title;
    }

    public function render()
    {
        return view('livewire.hotel-slider',[
            'hotels' => Hotel::orderBy('id','DESC')->paginate(10),
            'title'  => $this->title
        ]);
    }
}
