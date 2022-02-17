<?php

namespace App\Http\Livewire\Operation\Plants;

use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;

class CreatePlants extends Component
{
    use WithFileUploads;

    public $plantTypes, $countries, $currencies, $attendants, $managers, $membranesActiveArea, $polishFilterTypes,$companies;

    public $plantName;
    public $location;
    public $plantType;
    public $plantCountry;
    public $plantCorrency;
    public $plantOperator;
    public $plantManager;

    public $cisterns;
    public $capacity;


    public $cover;
    public $company;

    public $irrigation;
    public $wellPump;
    public $chloride;
    public $feedPump;
    public $sdi;
    public $boosterc;
    public $feed;
    public $reject;
    public $botM3;
    public $botFixed;
    public $oymM3;
    public $oymFixed;
    public $remineralisationM3;
    public $yearsOfContract;
    public $from;
    public $till;
    public $billingDay;
    public $billingPeriod;
    public $minimumConsumption;
    public $trainCapacity;
    public $trainTds;
    public $trainBooster;

    public $trains;
    public $mElements;

    public $membranesActiveAre;
    public $multimediaFilsters;
    public $polishFilters;
    public $polishQuantity;



    protected function rules()
    {
        return [
            'cover' => [
                'image',
                'mimes:jpg,jpeg,png'
            ],
            'plantName' => [
                'required',
                'string',
                'min:1',
                'max:300',
                Rule::unique('plants', 'name')
            ],
            'plantType' => [
                'required',
                'integer',
                Rule::exists('plant_types', 'id')
            ],
            'location' => [
                'required',
                'string',
                'min:1',
                'max:100'
            ],
            'company' => [
                'required',
                'integer',
                Rule::exists('companies', 'id')
            ],
            'plantCountry' => [
                'required',
                'integer',
                Rule::exists('countries', 'id')
            ],
            'plantCorrency' => [
                'required',
                'integer',
                Rule::exists('currencies', 'id')
            ],
            'plantOperator' => [
                'required',
                'integer',
                Rule::exists('users', 'id')
            ],
            'plantManager' => [
                'required',
                'integer',
                Rule::exists('users', 'id')
            ],


            'cisterns' => 'nullable|min:0|max:30|array:capacity', // We validate the array

            'cisterns.capacity.*' => [
                'nullable',
                'numeric'
            ],

            // Personalization
            'irrigation' => 'sometimes',
            'sdi' => 'sometimes',
            'chloride' => 'sometimes',
            'wellPump' => 'sometimes',
            'feedPump' => 'sometimes',
            'boosterc' => 'sometimes',
            'feed' => 'sometimes',
            'reject' => 'sometimes',



            'pdf' => [
                'mimes:pdf'
            ],

            // Plant Contract
            'botM3' => [
                'nullable',
                'numeric'
            ],
            'botFixed' => [
                'nullable',
                'numeric'
            ],
            'oymM3' => [
                'nullable',
                'numeric'
            ],
            'oymFixed' => [
                'nullable',
                'numeric'
            ],
            'remineralisationM3' => [
                'nullable',
                'numeric'
            ],

            'yearsOfContract' => [
                'required',
                'integer',
                'between:1,16'
            ],
            'from' => [
                'date'
            ],
            'till' => [
                'date',
                'after_or_equal:from'
            ],
            'billingDay' => [
                'integer',
                'between:1,30'
            ],
            'billingPeriod' => [
                'required',
                'integer',
                Rule::exists('billing_periods', 'id')
            ],
            'minimumConsumption' => [
                'nullable',
                'numeric'
            ],


            'trains' => 'required|min:1|array:capacity,tds,booster,mf,pft,pfq,mArea,mElements', // We validate the array

            'trainCapacity' => [
                'required',
                'integer'
            ],
            'trainTds' => [
                'required',
                'integer'
            ],
            'trainBooster' => [
                'required',
                'integer'
            ],
            'multimediaFilsters' => [
                'required',
                'integer'
            ],
            'polishFilters' => [
                'required',
                'integer'
            ],
            'polishQuantity' => [
                'required',
                'integer'
            ],
            'trains.mArea.*' => [
                'required',
                'integer'
            ],
            'trains.mElements.*' => [
                'required',
                'integer'
            ]
        ];
    }

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
