<?php

namespace App\Http\Livewire\Operation\Parameters;

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
use Throwable;

class CreateParameters extends Component
{
    public Plant $plant;

    protected $listeners = ['confirmParameters', 'successAlert', 'redirec', 'errorAlert'];

    public $back;

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
    public $reject;
    public $px;

    // Product Water
    public $hardness;
    public $tds;
    public $h2s;
    public $free_chlorine;
    public $chloride;
    public $reading, $irrigation, $municipal;
    public $tanks;
    public $calcium_chloride, $sodium_carbonate, $sodium_hypochloride, $antiscalant, $sodium_hydroxide, $hydrochloric_acid, $kl1, $kl2;

    public $observations;

    public function mount()
    {
        $this->back = url()->previous();
    }

    protected function rules()
    {
        return [
            'pump' => 'nullable|min:0|array:well,feed,wellf,feedf', // We validate the array
            // Amperage
            'pump.well.*' => ['sometimes', 'required', 'string'],
            'pump.feed.*' => ['sometimes', 'required', 'string'],

            // Frecuencies
            'pump.wellf.*' => ['sometimes', 'required', 'string'],
            'pump.feedf.*' => ['sometimes', 'required', 'string'],
            // Fin Array pump

            'mm' => 'required|min:1|array:in,out', // We validate the array
            'mm.in.*.*' => ['required', 'string'],
            'mm.out.*.*' => ['required', 'string'],
            // Fin mm array

            'backwash' => 'required|min:1|array', // We validate the array
            'backwash.*' => ['required', 'integer', 'min:0', 'max:10000'],
            // Fin de Backwash array

            'pf' => 'required|min:2|array:in,out', // We validate the array
            'pf.in.*' => ['required', 'string'],
            'pf.out.*' => ['required', 'string'],

            'filters' => 'nullable|min:0|array',
            'filters.*.*' => ['nullable'],
            // Fin de Polish Filters

            //'filtros' => 'required|min:1|array',

            // Operacion
            'hp' => 'required|min:4|array:amp,fre,in,out', // We validate the array
            'hp.amp.*' => ['required', 'string'],
            'hp.fre.*' => ['required', 'string'],
            'hp.in.*' => ['required', 'string'],
            'hp.out.*' => ['required', 'string'],

            'sdi' => 'nullable|min:0|array', // We validate the array
            'sdi.*' => [
                'sometimes',
                'required',
                'string'
            ],

            'booster' => 'nullable|min:0|array', // We validate the array
            'booster.amp.*.*' => ['sometimes', 'required', 'string'],
            'booster.fre.*.*' => ['sometimes', 'required', 'string'],
            'booster.co.*.*' => ['sometimes', 'required', 'string'],
            'booster.cp.*.*' => ['sometimes', 'required', 'string'],
            'booster.pre.*.*' => ['sometimes', 'required', 'string'],

            'px' => 'nullable|min:0|array',
            'px.*.*' => ['sometimes', 'string'],

            'ph' => 'required|min:2|array:ope,pro', // We validate the array
            'ph.ope.*' => ['required', 'string'],
            'ph.pro.*' => ['required', 'string'],

            'temperature' => 'required|min:1|array', // We validate the array
            'temperature.*' => ['required', 'string'],

            'feed' => 'required|min:1|array:ope,flo', // We validate the array
            'feed.ope.*' => ['required', 'string'],
            'feed.flo.*' => ['nullable', 'string'],

            'permeate' => 'required|min:1|array:ope,flo', // We validate the array
            'permeate.ope.*' => ['required', 'string'],
            'permeate.flo.*' => ['nullable', 'string'],

            'reject' => 'required|min:1|array:ope,pre,flo', // We validate the array
            'reject.ope.*' => ['required', 'string'],
            'reject.pre.*' => ['required', 'string'],
            'reject.flo.*' => ['nullable', 'string'],

            // Agua Producto
            'hardness' => ['required', 'string'],

            'tds' => ['required', 'string'],

            'h2s' => ['required', 'string'],

            'free_chlorine' => 'nullable|string|min:0',

            'chloride' => 'nullable|string|min:0',

            'observations' => 'nullable|array:pre,ope,prw', // We validate the array
            'observations.pre.*' => ['nullable', 'string', 'min:5', 'max:350'],
            'observations.ope.*' => ['nullable', 'string', 'min:5', 'max:350'],
            'observations.prw' => ['nullable', 'string', 'min:5', 'max:350'],

            'reading' => 'required|min:1|array', // We validate the array
            'reading.*' => ['required', 'string'],

            'irrigation' => ['nullable', 'string'],

            'municipal' => ['required', 'string'],

            'tanks' => 'required|min:0|array',
            'tanks.*' => ['required', 'integer', 'min:0', 'max:100'],

            'calcium_chloride' => ['required', 'string'],

            'sodium_carbonate' => ['required', 'string'],

            'sodium_hypochloride' => ['required', 'string'],

            'antiscalant' => ['required', 'string'],

            'sodium_hydroxide' => ['required', 'string'],

            'hydrochloric_acid' => ['required', 'string'],

            'kl1' => ['required', 'string'],

            'kl2' => ['required', 'string'],

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
       /* try {
            DB::transaction(function () {*/
                $trains = Train::where('plants_id', $this->plant->id)
                    ->where('type', 'Train')
                    ->get();

                // Contador de trains sirve solo para acceder y almacenar el train.
                $contTrains = 0;

                // Consultamos el ultimo id para que este mismo nos sirva para agrupar los registros
                $registerPre = Pretreatment::latest('id')->first();
                $registerOpe = Operation::latest('id')->first();
                for ($t = 1; $t <= (count($trains) * 2); $t++) {
                    // Pretreatment
                    if ($t % 2 != 0) {
                        Pretreatment::create([
                            'plants_id' => $this->plant->id,
                            'trains_id' => $trains[$contTrains]->id,
                            'group_by' => $registerPre != null ? $registerPre->id + 1 : 1,
                            'well_pump' => isset($this->pump['well'][$t]) ? $this->pump['well'][$t] : null,
                            'feed_pump' => isset($this->pump['feed'][$t]) ? $this->pump['feed'][$t] : null,
                            'frecuencies_well_pump' => isset($this->pump['wellf'][$t]) ? $this->pump['wellf'][$t] : null,
                            'frecuencies_feed_pump' => isset($this->pump['feedf'][$t]) ? $this->pump['feedf'][$t] : null,
                            'backwash' => isset($this->backwash[$t]) ? $this->backwash[$t] : null,
                            'observations' => isset($this->observations['pre'][$t]) ? $this->observations['pre'][$t] : null,
                            'user_created_at' => Auth::id(),
                            //'user_updated_at' => Auth::id(),
                        ]);

                        $pretreatment = Pretreatment::latest('id')->first();

                        // Multimedia Filters
                        for ($m = 1; $m <= $this->plant->multimedia_filters_quantity; $m++) {
                            MultimediaFilter::create([
                                'pretreatments_id' => $pretreatment->id,
                                'trains_id' => $trains[$contTrains]->id,
                                'in' => $this->mm != '' ? $this->mm['in'][$t][$m] : 0,
                                'out' => $this->mm != '' ? $this->mm['out'][$t][$m] : 0,
                            ]);
                        }
                        // Multimedia Filters end

                        // Polish Filters
                        for ($p = 1; $p <= $this->plant->polish_filters_quantity; $p++) {
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
                            'group_by' => $registerOpe != null ? $registerOpe->id + 1 : 1,

                            'hp' => $this->hp['amp'][$t],
                            'hpF' => $this->hp['fre'][$t],

                            'sdi' => $this->sdi != '' ? $this->sdi[$t] : null,
                            'ph' => $this->ph['ope'][$t],
                            'temperature' => $this->temperature[$t],

                            'feed' => $this->feed['ope'][$t],
                            'permeate' => $this->permeate['ope'][$t],
                            'reject' => $this->reject['ope'][$t],

                            'feed_flow' => isset($this->feed['flo']) ? $this->feed['flo'][$t] : ($this->permeate['flo'][$t] + $this->reject['flo'][$t]),
                            'permeate_flow' => $this->permeate['flo'][$t],
                            'reject_flow' => isset($this->reject['flo']) ? $this->reject['flo'][$t] : ($this->feed['flo'][$t] - $this->permeate['flo'][$t]),

                            'hp_in' => $this->hp['in'][$t],
                            'hp_out' => $this->hp['out'][$t],
                            'reject_pressure' => $this->reject['pre'][$t],

                            'observations' => isset($this->observations['ope'][$t]) ? $this->observations['ope'][$t] : null,
                            'user_created_at' => Auth::id(),
                            //'user_updated_at' => Auth::id()
                        ]);

                        $operation = Operation::latest('id')->first();

                        for ($b = 1; $b <= $trains[$contTrains]->boosters_quantity; $b++) {
                            if (isset($this->booster['amp'][$t][$b])) {
                                Booster::create([
                                    'operations_id' => $operation->id,
                                    'trains_id' => $trains[$contTrains]->id,
                                    'amperage' => $this->booster['amp'][$t][$b],
                                    'frequency' => $this->booster['fre'][$t][$b],
                                    'px' => 0, //$this->px[$t][$b],
                                    'booster_flow' => $this->booster['co'][$t],
                                    'booster_pressures' => $this->booster['pre'][$t][$b],
                                    'booster_pressures_total' => $this->booster['cp'][$t]
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

                    'free_chlorine' => $this->free_chlorine != '' ? $this->free_chlorine : null,
                    'chloride' => $this->chloride != '' ? $this->chloride : null,

                    'observations' => isset($this->observations['prw']) ? $this->observations['prw'] : null,
                    'user_created_at' => Auth::id(),
                    //'user_updated_at' => Auth::id()
                ]);

                $productWater = ProductWater::latest('id')->first();

                // Production Readings
                for ($pro = 1; $pro <= count($trains); $pro++) {
                    ProductionReading::create([
                        'product_waters_id' => $productWater->id,
                        'trains_id' => $trains[$pro - 1]->id,
                        'reading' => $this->reading[$pro],
                        'type' => 'Train'
                    ]);
                }

                if ($this->irrigation != '') {
                    $irrigationId = Train::where('plants_id', $this->plant->id)->where('type', 'Irrigation')->get()->first();
                    ProductionReading::create([
                        'product_waters_id' => $productWater->id,
                        'trains_id' => $irrigationId->id,
                        'reading' => $this->irrigation,
                        'type' => 'Irrigation'
                    ]);
                }

                if ($this->municipal != '') {
                    $municipalId = Train::where('plants_id', $this->plant->id)->where('type', 'Municipal')->get()->first();
                    ProductionReading::create([
                        'product_waters_id' => $productWater->id,
                        'trains_id' => $municipalId->id,
                        'reading' => $this->municipal,
                        'type' => 'Municipal'
                    ]);
                }
                // Production Readings end

                // Cisterns
                for ($ci = 1; $ci <= $this->plant->cisterns_quantity; $ci++) {
                    Cistern::create([
                        'product_waters_id' => $productWater->id,
                        'capacity' => $this->tanks[$ci],
                        'status' => 'Enabled'
                    ]);
                }
                // Cisterns end

                // Chemicals
                Chemical::create([
                    'product_waters_id' => $productWater->id,
                    'calcium_chloride' => $this->calcium_chloride,
                    'sodium_carbonate' => $this->sodium_carbonate,
                    'sodium_hypochlorite' => $this->sodium_hypochloride,
                    'antiscalant' => $this->antiscalant,
                    'sodium_hydroxide' => $this->sodium_hydroxide,
                    'hydrochloric_acid' => $this->hydrochloric_acid,
                    'kl1' => $this->kl1,
                    'kl2' => $this->kl2
                ]);
                // Chemicals end
                // Product Water end
            /*});

            // Show sweetAlert Success
            $this->dispatchBrowserEvent('successAlert');
        } catch (Throwable $e) {
            $this->dispatchBrowserEvent('errorAlert', ['error' => $e]);
        }*/
    }

    public function redirec(){
        sleep(0.5);
        $uri = explode('/', $this->back);

        return redirect()->route('plants.index', end($uri));
    }

    public function render()
    {
        return view('livewire.operation.parameters.create-parameters');
    }
}
