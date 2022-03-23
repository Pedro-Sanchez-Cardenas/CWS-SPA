<?php

namespace App\Http\Livewire\Operation\Parameters;

use App\Models\Plant;
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
            'parameters' => Plant::where('id', $this->plant->id)->with('productWaters', 'pretreatments', 'operations')->get()->first(),
        ]);
    }
}
