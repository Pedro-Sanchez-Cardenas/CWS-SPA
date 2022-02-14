<?php

namespace App\Http\Livewire\Operation\Parameters;

use Livewire\Component;
use App\Models\Plant;

class Create extends Component
{

    public Plant $plant;

    public $step = 1;
    public $totalStep = 0;

    public $trains = 0;
    public $train = 1;

    public $name;

    /*protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
    ];*/

    /*public function submit()
    {
        $this->validate();

        // Execution doesn't reach here if validation fails.

        /*Pretreatment::create([
            'name' => $this->name,
            'email' => $this->email,
        ]);*
    }*/

    public function addStep()
    {
        if ($this->step < $this->totalStep) {
            $this->step++;

            if (($this->step % 2) && ($this->step < $this->totalStep)) {
                $this->train++;
            }
        }
    }

    public function removeStep()
    {
        if (($this->step > 1)) {
            $this->step--;

            if (!($this->step % 2) && ($this->step < ($this->totalStep - 1))) {
                $this->train--;
            }
        }
    }

    public function render()
    {
        return view('livewire.operation.parameters.create');
    }
}
