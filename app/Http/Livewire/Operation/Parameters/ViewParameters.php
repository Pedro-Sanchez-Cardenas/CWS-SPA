<?php

namespace App\Http\Livewire\Operation\Parameters;

use App\Models\Pretreatment;
use App\Models\ProductionReading;
use Livewire\Component;

class ViewParameters extends Component
{

    public $plant;

    public function render()
    {
        return view('livewire.operation.parameters.view-parameters', [
            'productionReadings' => ProductionReading::all(),
            'pretreatments' => Pretreatment::all(),
        ]);
    }
}
