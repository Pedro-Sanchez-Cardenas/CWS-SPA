<?php

namespace App\Http\Livewire\Administration\Billing;

use Livewire\Component;

class Total extends Component
{
    public $plant;

    public function render()
    {
        return view('livewire.administration.billing.total');
    }
}