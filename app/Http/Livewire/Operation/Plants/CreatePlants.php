<?php

namespace App\Http\Livewire\Operation\Plants;

use Livewire\Component;
use App\Models\Company;
use App\Models\Country;
use App\Models\Currency;
use App\Models\PersonalitationPlant;
use App\Models\Plant;
use App\Models\PlantContract;
use App\Models\PlantType;
use App\Models\User;

use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;



class UploadPhotoWithPreview extends Component
{
    use WithFileUploads;

    public $plants_cover;
}

class CreatePlants extends Component
{
    use WithFileUploads;

    protected $listeners = ['addPlant' => 'store'];

    // variables conectadas a Alpinejs
    public $trainIndex = [];

    // Arrays;
    public $plants;
    public $cisterns;
    public $personalitations;
    public $contract;
    public $trains;
    public $multiplepdf;
    public $plants_cover;
    public $years;



    // Costs
    public $botM3;
    public $botFixed;
    public $oymM3;
    public $oymFixed;
    public $remineralisationM3;
    public $chloride;
    public $cover_path;

    protected function rules()
    {
        return [
            'plants' => 'nullable|min:0|max:1|array:plants_cover,multiplepdf,handbook,name,location,type,company,country,currency,operator,manager', // We validate the array
            'plants.plants_cover' => ['image', 'mimes:jpg,jpeg,png'],
            //'plants.multiplepdf' => ['mimes:pdf'],
            'plants.name' => ['required', 'string', 'min:1', 'max:100', Rule::unique('plants', 'name')],
            'plants.type' => ['required', 'integer', Rule::exists('plant_types', 'id')],
            'plants.location' => ['required', 'string', 'min:10', 'max:100'],
            'plants.company' => ['required', 'integer', Rule::exists('companies', 'id')],
            'plants.country' => ['required', 'integer', Rule::exists('countries', 'id')],
            'plants.currency' => ['required', 'integer', Rule::exists('currencies', 'id')],
            'plants.operator' => ['required', 'integer', Rule::exists('users', 'id')],
            'plants.manager' => ['required', 'integer', Rule::exists('users', 'id')],

            'cisterns' => 'nullable|min:0|max:5|array:capacity', // We validate the array
            'cisterns.capacity' => ['nullable', 'numeric', 'min:0'],

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

            'contract' => ['min:1', 'max:1', 'array:years, from, till, billingDay, payment_types_id, minimumConsumption'], // We validate the array
            'contract.years' => ['required', 'integer', 'between:1,16'],
            'contract.from' => ['required', 'date'],
            //'contract.till' => ['required', 'after:contract.till'],
            'contract.billingDay' => ['required', 'integer', 'between:1,31'],
            'contract.payment_types_id' => ['required', 'integer', 'between:1,4', Rule::exists('payment_types', 'id')],
            'contract.minimumConsumption' => ['nullable', 'numeric', 'min:0'],

            'trains' => ['nullable', 'min:1|max:5|array:capacity,tds,booster,multimediaFilsters,polishFilters,polishQuantity,mArea,mElements'], // We validate the array
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


        /*try {*/
        //DB::transaction(function () {
        PersonalitationPlant::create([
            'irrigation' => $this->personalitations['irrigation'],
            'sdi' => $this->personalitations['sdi'],
            'chloride' => $this->personalitations['chloride'],
            'well_pump' => $this->personalitations['wellPump'],
            'feed_pump' => $this->personalitations['feedPump'],
            'boosterc' => 'no',
            'feed_flow' => 'no',
            'permeate_flow' => 'no',
            'reject_flow'  => 'no'
        ]);

        $idPersonalitationPlant = PersonalitationPlant::latest('id')->first();

        Plant::create([
            'name' => $this->plants['name'],
            'location' => $this->plants['location'],
            //'multiplepdf' => $this->plants['plants.multiplepdf'],
            'cover_path' => $this->plants['plants_cover'], // nullable
            'installed_capacity' => 0,
            'design_limit' => 0,
            //'capacity' => $this->cisterns['cisterns.capacity'],
            'polish_filter_types_id' => 1,
            'polish_filters_quantity' => 2,
            'multimedia_filters_quantity' => 2,
            'cisterns_quantity' => 2,
            'cisterns' => 2,
            'companies_id' => $this->plants['company'],
            'clients_id' => 1,
            'personalitation_plants_id' => $idPersonalitationPlant->id,
            'countries_id' => $this->plants['country'],
            'plant_types_id' => $this->plants['type'],
            'operator' => $this->plants['operator'], //nullable
            'manager' => $this->plants['manager'], // nullable
            'user_created_at',
        ]);
        //$plantId = Cistern::latest('id')->first();
        // Cistern::create([
        // 'plant_id' => $plantId->id = null,
        // 'capacity' => $this->cisterns['cisterns.capacity'],
        //  ]); --}


        $plantId = Plant::latest('id')->first();

        PlantContract::create([
            'plants_id' => $plantId->id,
            'bot_m3' => $this->botM3,
            'bot_fixed' => $this->botFixed,
            'oym_m3' => $this->oymM3,
            'oym_fixed' => $this->oymFixed,
            'remineralitation' => $this->remineralisationM3,
            'total_m3 ' => 0,
            'total_month'  => 0,
            'years' => $this->contract['years'],
            'from' => $this->contract['from'],
            //'till' => $this->contract['till'], //nullable
            'minimun_consumption' => $this->contract['minimumConsumption'],
            'billing_day' => $this->contract['billingDay'], // nullable
            'payment_types_id' => $this->contract['payment_types_id'], // nullable
            'user_created_at',
        ]);


        $idPlant = Plant::latest('id')->first();
        $this->emit('addTrains', $idPlant->id);

        //});
        //});
        /*} catch (\Exception $e) {
            dd('ERROR TRY CATCH');
        }*/
    }


    public function render()
    {
        return view('livewire.operation.plants.create-plants', [
            'plantTypes' => PlantType::all(),
            'countries' => Country::all(),
            'currencies' => Currency::all(),
            'attendants' => User::role('Operator')->get(),
            'managers' => User::role('Manager')->get(),
            'companies' => Company::all()
        ]);
    }
}