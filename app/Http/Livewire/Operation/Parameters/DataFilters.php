<?php

namespace App\Http\Livewire\Operation\Parameters;

use App\Models\Plant;
use Livewire\Component;

class DataFilters extends Component
{

    public Plant $plant;

    public $date_range;

    protected $queryString = [
        'date_range' => ['except' => ''],
    ];

    public function render()
    {
        return view('livewire.operation.parameters.data-filters', [
            'results' => empty($this->date_range) ? collect() : $this->query(),
        ]);
    }

    public function resetInput()
    {
        $this->reset('date_range');
    }

    private function query()
    {
        $dates = explode(" ", $this->date_range);
        if (count($dates) > 2) {
            $results = Plant::where('id', $this->plant->id)->with(
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
            $this->emit('getResults', $results);
            return $results;
        }
    }
}
