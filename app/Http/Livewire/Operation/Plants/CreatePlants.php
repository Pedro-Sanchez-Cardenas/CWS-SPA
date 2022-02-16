<?php

namespace App\Http\Livewire\Operation\Plants;

use Livewire\Component;

class CreatePlants extends Component
{

    public $plantTypes, $countries, $currencies, $attendants, $managers, $membranesActiveArea, $polishFilterTypes;

    public $plantName;

    protected $rules = [
        'cover' => 'image|mimes:jpg,jpeg,png',
        'plantName' => 'required|string|min:1|max:300|unique:plants,name',

        'plantType' => 'required|integer|exists:plant_types',

        'location' => 'required|string|min:1|max:100',
        'company' => 'required|integer|exists:companies',

        'plantCountry' => 'required|integer|exists:countries',

        'plantCorrency' => 'required|integer|exists:currencies',

        'plantOperator' => 'required|integer|users',

        'plantManager' => 'required|integer|users',

        'cisterns' => 'nullable|min:0|max:30|array:capacity',

        'cisterns.capacity.*' => 'nullable|numeric',

        // Personalization
        'Irrigation' => 'sometimes',
        'sdi' => 'sometimes',
        'chloride' => 'sometimes',
        'wellPump' => 'sometimes',
        'feedPump' => 'sometimes',
        'boosterc' => 'sometimes',
        'feed' => 'sometimes',
        'reject' => 'sometimes',

        'pdf' => 'mimes:pdf',

        // Plant Contract
        'botM3' => 'nullable|numeric',
        'botFixed' => 'nullable|numeric',
        'o&mM3' => 'nullable|numeric',
        'o&mFixed' => 'nullable|numeric',
        'remineralisationM3' => 'nullable|numeric',

        'yearsOfContract' => 'required|integer|between:1,16',
        'from' => 'date',
        'till' => 'date|after_or_equal:from',
        'billingDay' => 'integer|between:1,30',
        'billingPeriod' => 'required|integer|exists:billing_periods',
        'minimumConsumption' => 'nullable|numeric',


        'trains' => 'required|min:1|array:capacity,tds,booster,mf,pft,pfq,mArea,mElements', // We validate the array

        'trainCapacity' => 'required|integer',
        'trainTds' => 'required|integer',
        'trainBooster' => 'required|integer',
        'multimediaFilsters' => 'required|integer',
        'polishFilters' =>  'required|integer',
        'polishQuantity' => 'required|integer',
        'trains.mArea.*' => 'required|integer',


        'trains.mElements.*' => 'required|integer'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.operation.plants.create-plants');
    }
}
