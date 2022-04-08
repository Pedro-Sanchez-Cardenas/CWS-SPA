<?php

namespace App\Http\Livewire\Administration\Billing;

use App\Models\Plant;
use Livewire\Component;


class TableInvoice extends Component
{
    public Plant $plant;


    public function render()
    {
        return view('livewire.administration.billing.table-invoice');
    }
}