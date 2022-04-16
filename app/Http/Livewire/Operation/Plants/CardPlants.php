<?php

namespace App\Http\Livewire\Operation\Plants;

use App\Models\Plant;
use Livewire\Component;

class CardPlants extends Component
{
    public $plants;

    public function render()
    {
        return view('livewire.operation.plants.card-plants');
    }
}
