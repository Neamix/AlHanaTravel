<?php

namespace App\Http\Livewire;

use App\Models\Hotel;
use Livewire\Component;
use Livewire\WithPagination;

class HotelLoad extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingName()
    {
        $this->resetPage();
    }

    public function render()
    { 
        return view('livewire.hotel-load',[
            'hotels' => Hotel::filter($this)->orderBy('id','DESC')->paginate(1)
        ]);
    }
}