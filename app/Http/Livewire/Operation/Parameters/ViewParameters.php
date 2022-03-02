<?php

namespace App\Http\Livewire\Operation\Parameters;

use App\Models\Operation;
use App\Models\Pretreatment;
use App\Models\ProductionReading;
use App\Models\ProductWater;
use Livewire\Component;

class ViewParameters extends Component
{

    public $plant;

    public function render()
    {
        return view('livewire.operation.parameters.view-parameters', [
            'productionReadings' => ProductionReading::all(),
            'pretreatments' => Pretreatment::all(),
            'productWaters' => ProductWater::all(),
            'operations' => Operation::all(),



        ]);
    }
}
