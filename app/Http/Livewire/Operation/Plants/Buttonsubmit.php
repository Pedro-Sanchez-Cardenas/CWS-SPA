<?php

namespace App\Http\Livewire\Operation\Plants;

use Livewire\Component;

class Buttonsubmit extends Component
{
    public function render()
    {
        return view('livewire.operation.plants.buttonsubmit');
    }

    public function Submit()
    {
        $this->emit('addPlant');
    }
}