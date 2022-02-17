<?php

namespace App\Http\Livewire;

use App\Models\Slider;
use Livewire\Component;

class SliderPreview extends Component
{
    public $title;
    public $text;
    
    public function render()
    {
        return view('livewire.sliders',['sliders'=> Slider::all()]);
    }
}
