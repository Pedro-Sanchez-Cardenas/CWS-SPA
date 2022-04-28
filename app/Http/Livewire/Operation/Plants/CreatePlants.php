<?php

namespace App\Http\Livewire\Operation\Plants;

use Livewire\Component;

use App\Models\BillingPeriod;
use App\Models\Company;
use App\Models\Country;
use App\Models\Currency;
use App\Models\MembraneActiveArea;
use App\Models\Plant;
use App\Models\PlantContract;
use App\Models\PlantType;
use App\Models\PolishFilterType;
use App\Models\Train;
use App\Models\User;

use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;

class UploadPhotoWithPreview extends Component
{
    use WithFileUploads;

    public $photo;
}

class CreatePlants extends Component
{
    use WithFileUploads;

    // variables conectadas a Alpinejs
    public $trainIndex = [];

    // Arrays;
    public $plants;
    public $cisterns;
    public $personalitations;
    public $contract;
    public $trains;
    public $photo;
    public $multiplepdf;

    // Costs
    public $botM3;
    public $botFixed;
    public $oymM3;
    public $oymFixed;
    public $remineralisationM3;

    protected function rules()
    {
        return [
            'plants' => 'nullable|min:0|max:1|array:cover,handbook,name,location,type,company,country,currency,operator,manager', // We validate the array
            'plants.cover' => ['image', 'mimes:jpg,jpeg,png'],
            'plants.pdf' => ['mimes:pdf'],
            'plants.name' => ['required', 'string', 'min:1', 'max:100', Rule::unique('plants', 'name')],
            'plants.type' => ['required', 'integer', Rule::exists('plant_types', 'id')],
            'plants.location' => ['required', 'string', 'min:10', 'max:100'],
            'plants.company' => ['required', 'integer', Rule::exists('companies', 'id')],
            'plants.country' => ['required', 'integer', Rule::exists('countries', 'id')],
            'plants.currency' => ['required', 'integer', Rule::exists('currencies', 'id')],
            'plants.operator' => ['required', 'integer', Rule::exists('users', 'id')],
            'plants.manager' => ['required', 'integer', Rule::exists('users', 'id')],

            // 'cisterns' => 'nullable|min:0|max:5|array:capacity', // We validate the array
            'cisterns.capacity.*' => ['nullable', 'numeric', 'min:0'],

            // Personalization
            'personalitations' => ['nullable', 'min:0', 'min:1', 'array:irrigation,sdi,chloride,wellPump,feedPump'], // We validate the array
            'personalitations.irrigation' => ['sometimes'],
            'personalitations.wellPump' => ['sometimes'],
            'personalitations.feedPump' => ['sometimes'],
            'personalitations.chloride' => ['sometimes'],
            'personalitations.sdi' => ['sometimes'],

            /*'personalitations.boosterc' => ['sometimes'],
            'personalitations.feed' => ['sometimes'],
            'personalitations.reject' => ['sometimes'],*/

            // Plant Contract
            'botM3' => ['sometimes', 'numeric', 'min:0'],
            'botFixed' => ['sometimes', 'numeric', 'min:0'],
            'oymM3' => ['sometimes', 'numeric', 'min:0'],
            'oymFixed' => ['sometimes', 'numeric', 'min:0'],
            'remineralisationM3' => ['sometimes', 'numeric', 'min:0'],

            'contract' => ['min:1', 'max:1', 'array:yearsOfContract, from, till, billingDay, billingPeriod, minimumConsumption'], // We validate the array
            'contract.yearsOfContract' => ['required', 'integer', 'between:1,16'],
            'contract.from' => ['required', 'date'],
            'contract.till' => ['required', 'date', 'after:contract.from'],
            'contract.billingDay' => ['required', 'integer', 'between:1,31'],
            'contract.billingPeriod' => ['required', 'integer', 'between:1,4', Rule::exists('billing_periods', 'id')],
            'contract.minimumConsumption' => ['nullable', 'numeric', 'min:0'],

            'trains' => 'min:1|max:5|array:capacity,tds,booster,multimediaFilsters,polishFilters,polishQuantity,mArea,mElements', // We validate the array
            'trains.capacity.*' => ['required', 'integer', 'min:0'],
            'trains.tds.*' => ['required', 'integer', 'min:0'],
            'trains.booster.*' => ['required', 'integer'],
            'trains.multimediaFilsters.*' => ['required', 'integer'],
            'trains.polishFilters.*' => ['required', 'integer'],
            'trains.polishQuantity.*' => ['required', 'integer'],
            'trains.mArea.*' => ['required', 'integer'],
            'trains.mElements.*' => ['required', 'integer'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        dd($this->trainIndex);
        //$this->validate();
    }
    

    public function render()
    {
        return view('livewire.operation.plants.create-plants', [
            'plantTypes' => PlantType::all(),
            'countries' => Country::all(),
            'currencies' => Currency::all(),
            'attendants' => User::role('Operator')->get(),
            'managers' => User::role('Manager')->get(),
            'membranesActiveArea' => MembraneActiveArea::all(),
            'polishFilterTypes' => PolishFilterType::all(),
            'companies' => Company::all()
        ]);
    }
    
}