<?php

namespace App\Http\Livewire\Operation\Plants;

use App\Models\Plant;
use Livewire\Component;

class CardPlant extends Component
{
    public Plant $plant;

    public function render()
    {
        return view('livewire.operation.plants.card-plant');
    }
}
