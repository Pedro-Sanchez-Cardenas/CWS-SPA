<?php

namespace App\Http\Livewire\Administration\Billing;

use App\Models\InvoiceStatus;
use Livewire\Component;

class Data extends Component
{
    public function render()
    {
        return view('livewire.administration.billing.data', [
            'InvoiceStatus' => InvoiceStatus::all()
        ]);
    }
}