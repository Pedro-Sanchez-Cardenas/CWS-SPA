<?php

namespace App\Http\Livewire\Operation\Parameters;

use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Models\Plant;
use App\Models\Pretreatment;

class CreateParameters extends Component
{
    public Plant $plant;

    // Inputs
    // Pretreatment
    public $pump;
    public $mm;
    public $backwash;
    public $pf;
    public $filtros;

    // Operation
    public $hp;
    public $ph;
    public $temperature;
    public $booster;
    public $feed;
    public $permeate;
    public $rejection;
    public $reject;
    public $px;

    // Product Water
    public $hardness;
    public $tds;
    public $h2s;
    public $free_chlorine;
    public $chloride;
    public $reading, $irrigation, $municipal;
    public $tank;
    public $calcium_chloride, $sodium_carbonate, $sodium_hypochloride, $antiscalant, $sodium_hydroxide, $hydrochloric_acid, $kl1, $kl2;

    // Product Water
    public $observations;

    protected function rules()
    {
        return [
            'pump' => 'nullable|min:0|array:well,feed,wellf,feedf', // We validate the array
            // Amperage
            'pump.well.*' => ['sometimes', 'required', 'numeric', 'min:0'],
            'pump.feed.*' => ['sometimes', 'required', 'numeric', 'min:0'],

            // Frecuencies
            'pump.wellf.*' => ['sometimes', 'required', 'numeric', 'min:0'],
            'pump.feedf.*' => ['sometimes', 'required', 'numeric', 'min:0'],
            // Fin Array pump

            'mm' => 'required|min:1|array:in,out', // We validate the array
            'mm.in.*.*' => ['required', 'numeric', 'min:0'],
            'mm.out.*.*' => ['required', 'numeric', 'min:0'],
            // Fin mm array

            'backwash' => 'required|min:1|array', // We validate the array
            'backwash.*' => ['required', 'integer', 'min:0'],
            // Fin de Backwash array

            'pf' => 'required|min:2|array:in,out', // We validate the array
            'pf.in.*' => ['required', 'numeric', 'min:0'],
            'pf.out.*' => ['required', 'numeric', 'min:0'],
            // Fin de Polish Filters

            //'filtros' => 'required|min:1|array',

            // Operacion
            'hp' => 'required|min:4|array:amp,fre,in,out', // We validate the array
            'hp.amp.*' => ['required', 'numeric', 'min:0'],
            'hp.fre.*' => ['required', 'numeric', 'min:0'],
            'hp.in.*' => ['required', 'numeric', 'min:0'],
            'hp.out.*' => ['required', 'numeric', 'min:0'],

            'booster' => 'nullable|min:0|array', // We validate the array
            'booster.amp.*' => ['sometimes', 'required', 'numeric', 'min:0'],
            'booster.fre.*' => ['sometimes', 'required', 'numeric', 'min:0'],

            'booster.co.*' => ['sometimes', 'required', 'numeric', 'min:0'],
            'booster.cp.*' => ['sometimes', 'required', 'numeric', 'min:0'],

            'ph' => 'required|min:2|array:op,pro', // We validate the array
            'ph.ope.*' => ['required', 'numeric', 'min:0'],
            'ph.pro' => ['required', 'numeric', 'min:0'],

            'temperature' => 'required|min:1|array', // We validate the array
            'temperature.*' => ['required', 'numeric', 'min:0'],

            'feed' => 'required|min:2|array:ope,flow', // We validate the array
            'feed.ope.*' => ['required', 'numeric', 'min:0'],
            'feed.flo.*' => ['required', 'numeric', 'min:0'],

            'permeate' => 'required|min:2|array:ope,flow', // We validate the array
            'permeate.ope.*' => ['required', 'numeric', 'min:0'],
            'permeate.flo.*' => ['required', 'numeric', 'min:0'],

            'rejection' => 'required|min:1|array', // We validate the array
            'rejection.*' => ['required', 'numeric', 'min:0'],

            'reject' => 'required|min:1|array:flow', // We validate the array
            'reject.flow.*' => ['required', 'numeric', 'min:0'],

            'px' => 'nullable|min:0|array',
            'px.*.*' => ['sometimes', 'numeric', 'min:0'],

            // Agua Producto
            'hardness' => ['required', 'numeric', 'min:0'],

            'tds' => ['required', 'numeric', 'min:0'],

            'h2s' => ['required', 'numeric', 'min:0'],

            'free_chlorine' => ['sometimes', 'required', 'numeric', 'min:0'],

            'chloride' => ['sometimes', 'required', 'numeric', 'min:0'],

            'observations' => 'required|min:3', // We validate the array
            'observations.*' => ['nullable', 'string', 'min:30', 'max:350'],

            'reading' => 'required|min:1|array', // We validate the array
            'reading.*' => ['required', 'numeric', 'min:0'],

            'irrigation' => ['sometimes', 'required', 'numeric', 'min:0'],

            'municipal' => ['required', 'numeric', 'min:0'],

            'tank' => 'nullable|min:0|array',
            'tank.*' => ['required', 'integer', 'min:0', 'max:100'],

            'calcium_chloride' => ['required', 'numeric', 'min:0'],

            'sodium_carbonate' => ['required', 'numeric', 'min:0'],

            'sodium_hypochloride' => ['required', 'numeric', 'min:0'],

            'antiscalant' => ['required', 'numeric', 'min:0'],

            'sodium_hydroxide' => ['required', 'numeric', 'min:0'],

            'hydrochloric_acid' => ['required', 'numeric', 'min:0'],

            'kl1' => ['required', 'numeric', 'min:0'],

            'kl2' => ['required', 'numeric', 'min:0'],

            /*
            'sdi' => 'nullable|min:0|array', // We validate the array
            'sdi.*' => [
                'nullable',
                'numeric'
            ],

            'typeUser' => [
                'required',
                Rule::in(['Super-Admin', 'Operations-Manager', 'Manager', 'Operator']),
            ],*/
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->validate();

        Pretreatment::create([
            'test' => 'test',
        ]);
    }

    public function render()
    {
        return view('livewire.operation.parameters.create-parameters');
    }
}
