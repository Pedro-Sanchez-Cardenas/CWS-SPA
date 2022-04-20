<?php

namespace App\Http\Livewire\Operation\Parameters;

use App\Models\Plant;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

class ViewParameters extends Component
{

    public Plant $plant;
    public $date_range;

    protected $queryString = [
        'date_range' => ['except' => ''],
    ];

    public function render()
    {
        $dates = explode(" ", $this->date_range);
        return view('livewire.operation.parameters.view-parameters', [
            'plants' => empty($this->date_range) ? (Plant::where('id', $this->plant->id)->with('product_waters', 'pretreatments', 'operations')->get()) : ((count($dates) > 2) ? $this->query() : Plant::where('id', $this->plant->id)->with('product_waters', 'pretreatments', 'operations')->get()),
        ]);
    }

    private function query()
    {
        $dates = explode(" ", $this->date_range);
        if (count($dates) > 2) {
            $plants = Plant::where('id', $this->plant->id)->with(
                [
                    'product_waters' => function ($query) {
                        $dates = explode(" ", $this->date_range);
                        $query->whereBetween('created_at', [$dates[0], $dates[2]]);
                    },
                    'pretreatments' => function ($query) {
                        $dates = explode(" ", $this->date_range);
                        $query->whereBetween('created_at', [$dates[0], $dates[2]]);
                    },
                    'operations' => function ($query) {
                        $dates = explode(" ", $this->date_range);
                        $query->whereBetween('created_at', [$dates[0], $dates[2]]);
                    }
                ]
            )->get();
            return $plants;
        }
    }

    public function createPDF()
    {
        $pdf = PDF::loadView('PdfTemplates/pdf');
        return $pdf->download('invoice.pdf');
    }
}
