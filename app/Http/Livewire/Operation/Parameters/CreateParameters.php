<?php

namespace App\Http\Livewire\Operation\Parameters;

use Illuminate\Validation\Rule;
use App\Models\Booster;
use App\Models\Chemical;
use App\Models\Cistern;
use App\Models\PolishFilter;
use App\Models\MultimediaFilter;
use App\Models\Operation;
use App\Models\Plant;
use App\Models\Pretreatment;
use App\Models\ProductionReading;
use App\Models\ProductWater;
use App\Models\Train;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateParameters extends Component
{
    public Plant $plant;

    protected $listeners = ['confirmParameters'];

    // Inputs
    // Pretreatment
    public $pump;
    public $mm;
    public $backwash;
    public $pf;
    public $filters;

    // Operation
    public $hp;
    public $sdi;
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

            'filters' => 'nullable|min:0|array',
            'filters.*.*' => ['nullable'],
            // Fin de Polish Filters

            //'filtros' => 'required|min:1|array',

            // Operacion
            'hp' => 'required|min:4|array:amp,fre,in,out', // We validate the array
            'hp.amp.*' => ['required', 'numeric', 'min:0'],
            'hp.fre.*' => ['required', 'numeric', 'min:0'],
            'hp.in.*' => ['required', 'numeric', 'min:0'],
            'hp.out.*' => ['required', 'numeric', 'min:0'],

            'sdi' => 'nullable|min:0|array', // We validate the array
            'sdi.*' => [
                'sometimes',
                'required',
                'numeric'
            ],

            'booster' => 'nullable|min:0|array', // We validate the array
            'booster.amp.*.*' => ['sometimes', 'required', 'numeric', 'min:0'],
            'booster.fre.*.*' => ['sometimes', 'required', 'numeric', 'min:0'],
            'booster.co.*.*' => ['sometimes', 'required', 'numeric', 'min:0'],
            'booster.cp.*.*' => ['sometimes', 'required', 'numeric', 'min:0'],

            'px' => 'nullable|min:0|array',
            'px.*.*' => ['sometimes', 'numeric', 'min:0'],

            'ph' => 'required|min:2|array:ope,pro', // We validate the array
            'ph.ope.*' => ['required', 'numeric', 'min:0'],
            'ph.pro.*' => ['required', 'numeric', 'min:0'],

            'temperature' => 'required|min:1|array', // We validate the array
            'temperature.*' => ['required', 'numeric', 'min:0'],

            'feed' => 'required|min:1|array:ope,flo', // We validate the array
            'feed.ope.*' => ['required', 'numeric', 'min:0'],
            'feed.flo.*' => ['required', 'numeric', 'min:0'],

            'permeate' => 'required|min:2|array:ope,flo', // We validate the array
            'permeate.ope.*' => ['required', 'numeric', 'min:0'],
            'permeate.flo.*' => ['required', 'numeric', 'min:0'],

            'rejection' => 'required|min:1|array', // We validate the array
            'rejection.*' => ['required', 'numeric', 'min:0'],

            //'reject' => 'sometimes|min:1|array:flow', // We validate the array
            'reject.*' => ['nullable', 'numeric', 'min:0'],

            // Agua Producto
            'hardness' => ['required', 'numeric', 'min:0'],

            'tds' => ['required', 'numeric', 'min:0'],

            'h2s' => ['required', 'numeric', 'min:0'],

            'free_chlorine' => ['sometimes', 'required', 'numeric', 'min:0'],

            'chloride' => ['nullable', 'numeric', 'min:0'],

            'observations' => 'nullable|array:pre,ope,prw', // We validate the array
            'observations.pre.*' => ['nullable', 'string', 'min:30', 'max:350'],
            'observations.ope.*' => ['nullable', 'string', 'min:30', 'max:350'],
            'observations.prw' => ['nullable', 'string', 'min:30', 'max:350'],

            'reading' => 'required|min:1|array', // We validate the array
            'reading.*' => ['required', 'numeric', 'min:0'],

            'irrigation' => ['nullable', 'numeric', 'min:0'],

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

    public function confirmParameters()
    {
        $this->validate();

        $this->dispatchBrowserEvent('confirmParameters');
    }

    public function store()
    {
        try {
            DB::transaction(function () {
                $trains = Train::where('plants_id', $this->plant->id)
                    ->where('type', 'Train')
                    ->get();

                // Contador de trains sirve solo para acceder y almacenar el train.
                $contTrains = 0;
                for ($t = 1; $t <= (count($trains) * 2); $t++) {
                    // Pretreatment
                    if ($t % 2 != 0) {
                        Pretreatment::create([
                            'plants_id' => $this->plant->id,
                            'trains_id' => $trains[$contTrains]->id,
                            'well_pump' => isset($this->pump['well'][$t]) ? $this->pump['well'][$t] : null,
                            'feed_pump' => isset($this->pump['feed'][$t]) ? $this->pump['feed'][$t] : null,
                            'frecuencies_well_pump' => isset($this->pump['wellf'][$t]) ? $this->pump['wellf'][$t] : null,
                            'frecuencies_feed_pump' => isset($this->pump['feedf'][$t]) ? $this->pump['feedf'][$t] : null,
                            'backwash' => isset($this->backwash[$t]) ? $this->backwash[$t] : null,
                            'observations' => isset($this->observations['pre'][$t]) ? $this->observations['pre'][$t] : null,
                            'user_created_at' => Auth::id(),
                            'user_updated_at' => Auth::id(),
                        ]);

                        $pretreatment = Pretreatment::latest('id')->first();

                        // Multimedia Filters
                        for ($m = 1; $m <= $trains[$contTrains]->multimedia_filter_quantity; $m++) {
                            MultimediaFilter::create([
                                'pretreatments_id' => $pretreatment->id,
                                'trains_id' => $trains[$contTrains]->id,
                                'in' => $this->mm != '' ? $this->mm['in'][$t][$m] : 0,
                                'out' => $this->mm != '' ? $this->mm['out'][$t][$m] : 0,
                            ]);
                        }
                        // Multimedia Filters end

                        // Polish Filters
                        for ($p = 1; $p <= $trains[$contTrains]->polish_filters_quantity; $p++) {
                            PolishFilter::create([
                                'pretreatments_id' => $pretreatment->id,
                                'trains_id' => $trains[$contTrains]->id,
                                'in' => $this->pf != '' ? $this->pf['in'][$t] : null,
                                'out' => $this->pf != '' ? $this->pf['out'][$t] : null,
                                'filter_change' => isset($this->filters[$t][$p]) ? $this->filters[$t][$p] == 'yes' ? Carbon::now() : null : null
                            ]);
                        }
                        // Polish Filters end
                    } else {

                        //Pretreatment end

                        // Operation
                        Operation::create([
                            'plants_id' => $this->plant->id,
                            'trains_id' => $trains[$contTrains]->id,

                            'hp' => $this->hp['amp'][$t],
                            'hpF' => $this->hp['fre'][$t],

                            'sdi' => $this->sdi != '' ? $this->sdi[$t] : null,
                            'ph' => $this->ph['ope'][$t],
                            'temperature' => $this->temperature[$t],

                            'feed' => $this->feed['ope'][$t],
                            'permeated' => $this->permeate['ope'][$t],
                            'rejection' => $this->rejection[$t],

                            'feedFlow' => $this->feed['flo'][$t],
                            'rejectFlow' => $this->reject[$t],
                            'permeateFlow' => $this->permeate['flo'][$t],

                            'hpIn' => $this->hp['in'][$t],
                            'hpOut' => $this->hp['out'][$t],
                            'reject' => $this->reject[$t],

                            'observations' => isset($this->observations['ope']) ? $this->observations['ope'][$t] : null,
                            'user_created_at' => Auth::id(),
                            'user_updated_at' => Auth::id()
                        ]);

                        $operation = Operation::latest('id')->first();

                        for ($b = 1; $b <= $trains[$contTrains]->booster_quantity; $b++) {
                            if (isset($this->booster['amp'][$t][$b])) {
                                Booster::create([
                                    'operations_id' => $operation->id,
                                    'trains_id' => $trains[$contTrains]->id,
                                    'amperage' => $this->booster['amp'][$t][$b],
                                    'frequency' => $this->booster['fre'][$t][$b],
                                    'px' => 1,
                                    'boosterFlow' => $this->booster['co'][$t],
                                    'boosterPressures' => $this->booster['cp'][$t]
                                ]);
                            }
                        }
                        // Operation end

                        $contTrains++; // Aumentamos el contador de trains
                    }
                }

                // Product Water
                ProductWater::create([
                    'plants_id' => $this->plant->id,

                    'ph' => $this->ph['pro'],
                    'hardness' => $this->hardness,
                    'tds' => $this->tds,
                    'h2s' => $this->h2s,

                    'freeChlorine' => $this->free_chlorine != '' ? $this->free_chlorine : null,
                    'chloride' => $this->chloride != '' ? $this->chloride : null,

                    'observations' => isset($this->observations['prw']) ? $this->observations['prw'] : null,
                    'user_created_at' => Auth::id(),
                    'user_updated_at' => Auth::id()
                ]);

                $productWater = ProductWater::latest('id')->first();

                // Production Readings
                for ($pro = 1; $pro <= count($trains); $pro++) {
                    ProductionReading::create([
                        'product_waters_id' => $productWater->id,
                        'trains_id' => $trains[$pro - 1]->id,
                        'reading' => $this->reading[$pro],
                        'production' => 0,
                        'type' => 'Train'
                    ]);
                }

                if ($this->irrigation != '') {
                    ProductionReading::create([
                        'product_waters_id' => $productWater->id,
                        //'trains_id' => ,
                        'reading' => $this->irrigation,
                        'production' => 0,
                        'type' => 'Irrigation'
                    ]);
                }

                if ($this->municipal != '') {
                    ProductionReading::create([
                        'product_waters_id' => $productWater->id,
                        //'trains_id' => ,
                        'reading' => $this->municipal,
                        'production' => 0,
                        'type' => 'Municipal'
                    ]);
                }
                // Production Readings end

                // Cisterns
                for ($ci = 1; $ci <= $this->plant->cisterns_quantity; $ci++) {
                    Cistern::create([
                        'product_waters_id' => $productWater->id,
                        'plants_id' => $this->plant->id,
                        'capacity' => $this->tank[$ci],
                        'status' => 'Enabled'
                    ]);
                }
                // Cisterns end

                // Chemicals
                Chemical::create([
                    'product_waters_id' => $productWater->id,
                    'calciumChloride' => $this->calcium_chloride,
                    'sodiumCarbonate' => $this->sodium_carbonate,
                    'sodiumHypochlorite' => $this->sodium_hypochloride,
                    'antiscalant' => $this->antiscalant,
                    'sodiumHydroxide' => $this->sodium_hydroxide,
                    'hydrochloricAcid' => $this->hydrochloric_acid,
                    'kl1' => $this->kl1,
                    'kl2' => $this->kl2
                ]);
                // Chemicals end
                // Product Water end
            });

            // Success Save
            return redirect()->back();

        } catch (\Exception $e) {
            dd('ERROR TRY CATCH');
        }
    }

    public function render()
    {
        return view('livewire.operation.parameters.create-parameters');
    }
}
