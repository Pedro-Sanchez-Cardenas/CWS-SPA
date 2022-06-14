<?php

namespace App\Http\Livewire\Operation\Plants;

use App\Models\MembraneActiveArea;
use App\Models\PolishFilterType;
use App\Models\Train;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TrainsPlants extends Component
{
    protected $listeners = ['addTrains' => 'store'];

    public $trainIndex = [];
    // Arrays;
    public $trains;

    protected function rules()
    {
        return [
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

    public function store($idPlant)
    {

        for ($t = 0; $t < count($this->trainIndex); $t++) {
            Train::create([
                'plants_id' => $idPlant,
                'capacity' => $this->trains['capacity'][$t],
                'boosters_quantity' => $this->trains['booster'][$t],
                'tds' => $this->trains['tds'][$t],
                'membrane_active_areas_id' => $this->trains['mArea'][$t],
                'membrane_elements' => $this->trains['mElements'][$t],
                'status' => 'Enable',
                'type' => 'Train',
                'user_created_at' => Auth::id(),
            ]);
        }
        //});
        /*} catch (\Exception $e) {
            dd('ERROR TRY CATCH');
        }*/
    }
    public function render()
    {
        return view('livewire.operation.plants.trains-plants', [
            'membranesActiveArea' => MembraneActiveArea::all(),
            'polishFilterTypes' => PolishFilterType::all(),
        ]);
    }
}