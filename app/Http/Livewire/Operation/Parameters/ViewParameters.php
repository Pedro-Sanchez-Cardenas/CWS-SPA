<?php

namespace App\Http\Livewire\Operation\Parameters;

use App\Models\Operation;
use App\Models\Plant;
use App\Models\Pretreatment;
use App\Models\ProductionReading;
use App\Models\ProductWater;
use Livewire\Component;
use Livewire\WithPagination;

class ViewParameters extends Component
{

    public Plant $plant;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.operation.parameters.view-parameters', [
            'data' => $this->getParameters()
        ]);
    }

    public function getParameters()
    {
        for ($t = 0; $t < $this->plant->trains->count(); $t++) {
            echo $this->plant->trains[$t]->productRea . $t;
        }
    }
}
