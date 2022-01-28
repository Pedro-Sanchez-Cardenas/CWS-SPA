<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssistanceRequest;
use App\Models\Plant;
use App\Models\ProductionReading;
use App\Models\User;
use App\Models\UserAssistance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole(['Super-Admin', 'Director'])){

            $users = User::role(['Operator', 'Manager'])->count();
            $plants = Plant::all()->count();

            return view('dashboards.direction', compact('users', 'plants'));

        } else if(Auth::user()->hasRole(['Operations-Manager'])){

            return view('dashboards.operations_manager');

        } else if (Auth::user()->hasRole(['Manager'])) {

            return view('dashboards.manager');

        } else if (Auth::user()->hasRole(['Administrative-Manager'])) {

            return view('dashboards.administrative_manager');

        } else if((Auth::user()->hasRole(['Manager'])) ){

            return view('dashboards.manager');

        } else if (Auth::user()->hasRole(['Operator'])) {
            $asistencia = UserAssistance::where('user_id', Auth::id())->whereDate('created_at', Carbon::now()->toDateString())->get();

            if ($asistencia->count() > 0) {
                $asis = true;
            } else {
                $asis = false;
            }

            $plant = Plant::where('attendant', Auth::id())->get()->first();

            return view('dashboards.operator', compact('plant', 'asis'));

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssistanceRequest $request)
    {
        // Guardamos las asistencias
        try {
            DB::transaction(function () use ($request) {
                UserAssistance::create([
                    'user_id' => Auth::id(),
                    'location' => 'test'
                ]);
                $plant = Plant::where('attendant', Auth::id())->get()->first();

                for ($ite = 0; $ite < $plant->trains->where('type', 'Train')->count(); $ite++) {
                    // Guardamos lecturas de Produccion
                    ProductionReading::create([
                        'trains_id' => $plant->trains[$ite]->id,
                        'reading' => $request->reading[$ite],
                        'production' => $plant->trains[$ite]->productRea->first() != null ? ($request->reading[$ite] - $plant->trains[$ite]->productRea->first()->reading) : $request->reading[$ite],
                        'type' => 'Train #' . ($ite+1)
                    ]);
                }

                //Guardamos lectuas de riego, si la planta tiene riego
                if ($plant->irrigation == 'yes') {
                    ProductionReading::create([
                        'trains_id' => $plant->trains->last()->id,
                        'reading' => $request->irrigation,
                        'production' => $plant->trains->where('type', 'Irrigation')->last()->productRea->first() != null ? ($request->irrigation - $plant->trains->where('type', 'Irrigation')->last()->productRea->last()->reading) : $request->irrigation,
                        'type' => 'Irrigation'
                    ]);
                }

                //Guardamos lecturas Municipal
                ProductionReading::create([
                    'trains_id' => $plant->trains->last()->id,
                    'reading' => $request->municipal,
                    'production' => $plant->trains->where('type', 'Municipal')->last()->productRea->first() != null ? ($request->municipal - $plant->trains->where('type', 'Municipal')->last()->productRea->last()->reading) : $request->municipal,
                    'type' => 'Municipal'
                ]);
            });
        } catch (\Exeption $e) {
            return redirect()->route('index')->with('error', 'An error occurred!');
        }
        return redirect()->route('index')->with('success', 'Saved attendance!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
