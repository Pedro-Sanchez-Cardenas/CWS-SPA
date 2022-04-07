<div>
    <div wire:poll.5000ms class="row match-height">
        {{-- Product Reading --}}
        <div class="col-md-4">
            <h4 class="mb-1">PRODUCT READINGS</h4>
            <div class="card">
                <div class="card-body m-0 p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="text-center text-nowrap" role="row">
                                    <th colspan="3">PRODUCTION</th>
                                    <th colspan="1" rowspan="2">DATE/TIME</th>
                                </tr>

                                <tr class="text-center text-nowrap" role="row">
                                    <th colspan="1" rowspan="1">Type</th>
                                    <th colspan="1" rowspan="1">Reading</th>
                                    <th colspan="1" rowspan="1">Production</th>
                                </tr>
                            </thead>

                            @foreach ($plants->first()->product_waters as $product_water)
                                <tbody>
                                    @foreach ($product_water->production_readings as $reading)
                                        <tr class="text-center">
                                            <td>
                                                @if ($reading->type == 'Train')
                                                    {{ $reading->type }} #{{ $loop->iteration }}
                                                @else
                                                    {{ $reading->type }}
                                                @endif
                                            </td>

                                            <td class="text-nowrap">
                                                {{ $reading->reading }} <small class="text-danger">m³</small>
                                            </td>

                                            <td class="text-nowrap">
                                                @if (!$loop->parent->last)
                                                    {{ $reading->reading -$plants->first()->product_waters[$loop->parent->index + 1]->production_readings[$loop->index]->reading }}
                                                    <small class="text-danger">m³</small>
                                                @else
                                                    {{ $reading->reading }} <small class="text-danger">m³</small>
                                                @endif
                                            </td>

                                            @if (!$loop->first && !$loop->last)
                                                <td class="text-nowrap border-none">
                                                    <span>{{ $product_water->created_at }}</span>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>

                <div class="card-footer">
                    Total: {{ $plant->product_waters->count() }}
                </div>
            </div>
        </div>
        {{-- Production Reading end --}}

        {{-- Product Water --}}
        <div class="col-md-8">
            <h4 class="mb-1">PRODUCT WATER</h4>
            <div class="card">
                <div class="card-body m-0 p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="text-center text-nowrap">
                                    <th>FEED LINE TO HOTEL SUPPLY</th>
                                    <th>DAYLI CHEMICAL SUPPLY</th>
                                    <th>Cisterns</th>
                                    <th>ASSIGNED BY</th>
                                    <th>OBSERVATION</th>
                                    <th>DATE/TIME</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($plant->product_waters as $product_water)
                                    <tr>
                                        <td>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>PH</th>
                                                        <th>HARDNESS</th>
                                                        <th>TDS</th>
                                                        <th>H2S</th>
                                                        <th>CHLORINE</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="text-center">
                                                        <td class="text-nowrap">
                                                            <div class="d-flex flex-column">
                                                                <span>{{ $product_water->ph }} <small
                                                                        class="text-danger">u. pH</small></span>
                                                            </div>
                                                        </td>

                                                        <td class="text-nowrap">
                                                            <div class="d-flex flex-column">
                                                                <span>{{ $product_water->hardness }} <small
                                                                        class="text-danger">ppm</small></span>
                                                            </div>
                                                        </td>

                                                        <td class="text-nowrap">
                                                            <div class="d-flex flex-column">
                                                                <span>{{ $product_water->tds }} <small
                                                                        class="text-danger">ppm</small></span>
                                                            </div>
                                                        </td>
                                                        <td class="text-nowrap">
                                                            <div class="d-flex flex-column">
                                                                <span>{{ $product_water->h2s }} <small
                                                                        class="text-danger">ppm</small></span>
                                                            </div>
                                                        </td>
                                                        <td class="text-nowrap">
                                                            <div class="d-flex flex-column">
                                                                <span>{{ $product_water->free_chlorine }} <small
                                                                        class="text-danger">ppm</small></span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>

                                        <td>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>CACL2</th>
                                                        <th>NACO3</th>
                                                        <th>NACLO</th>
                                                        <th>ANTIS</th>
                                                        <th>NAOH</th>
                                                        <th>HCL</th>
                                                        <th>KL1</th>
                                                        <th>KL2</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="text-center">
                                                        <td class="text-nowrap">
                                                            <div class="d-flex flex-column">
                                                                <span>{{ $product_water->chemical->calcium_chloride }}
                                                                    <small class="text-danger">Kg</small></span>
                                                            </div>
                                                        </td>

                                                        <td class="text-nowrap">
                                                            <div class="d-flex flex-column">
                                                                <span>{{ $product_water->chemical->sodium_carbonate }}
                                                                    <small class="text-danger">Kg</small></span>
                                                            </div>
                                                        </td>

                                                        <td class="text-nowrap">
                                                            <div class="d-flex flex-column">
                                                                <span>{{ $product_water->chemical->sodium_hypochlorite }}
                                                                    <small class="text-danger">Kg</small></span>
                                                            </div>
                                                        </td>
                                                        <td class="text-nowrap">
                                                            <div class="d-flex flex-column">
                                                                <span>{{ $product_water->chemical->antiscalant }}
                                                                    <small class="text-danger">Kg</small></span>
                                                            </div>
                                                        </td>
                                                        <td class="text-nowrap">
                                                            <div class="d-flex flex-column">
                                                                <span>{{ $product_water->chemical->sodium_hydroxide }}
                                                                    <small class="text-danger">Kg</small></span>
                                                            </div>
                                                        </td>
                                                        <td class="text-nowrap">
                                                            <div class="d-flex flex-column">
                                                                <span>{{ $product_water->chemical->hydrochloric_acid }}
                                                                    <small class="text-danger">Kg</small></span>
                                                            </div>
                                                        </td>
                                                        <td class="text-nowrap">
                                                            <div class="d-flex flex-column">
                                                                <span>{{ $product_water->chemical->kl1 }} <small
                                                                        class="text-danger">Kg</small></span>
                                                            </div>
                                                        </td>
                                                        <td class="text-nowrap">
                                                            <div class="d-flex flex-column">
                                                                <span>{{ $product_water->chemical->kl2 }} <small
                                                                        class="text-danger">Kg</small></span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>

                                        <td>
                                            <table class="table">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>Capacity</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @for ($c = 0; $c < $plant->cisterns_quantity; $c++)
                                                        <tr class="text-center">
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $product_water->cisterns[$c]->capacity }}
                                                                        <small class="text-danger">%</small></span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </td>

                                        <td class="text-nowrap">
                                            {{ $product_water->assignedBy->name }}
                                        </td>

                                        <td>
                                            {{ $product_water->observations }}
                                        </td>

                                        <td class="text-nowrap">
                                            {{ $product_water->created_at }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer">
                    Total: {{ $plant->product_waters->count() }}
                </div>
            </div>
        </div>
        {{-- Product Water end --}}
    </div>

    <div class="row match-height">
        {{-- Pretreatment --}}
        <div class="col-12">
            <h4 class="mb-1">PRETREATMENT</h4>
            <div class="card card-company-table">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="text-center text-nowrap">
                                    <th>TRAIN</th>
                                    @isset($plant->personalitation_plant->well_pump)
                                        @if ($plant->personalitation_plant->well_pump != 'no' || $plant->personalitation_plant->feed_pump != 'no')
                                            <th class="text-center" @if ($plant->personalitation_plant->well_pump != 'no' && $plant->personalitation_plant->feed_pump != 'no') colspan="2" @endif>
                                                Water pumps</th>
                                        @endif
                                    @endisset
                                    <th colspan="{{ $plant->trains->where('type', 'Train')->count() }}">M.
                                        Filters
                                    </th>
                                    <th>BACKWASH</th>
                                    <th>POLISH FILTERS</th>
                                    <th>ASSIGNED</th>
                                    <th>OBSERVATION</th>
                                    <th>DATE/TIME</th>
                                </tr>
                            </thead>

                            @foreach ($plant->pretreatments->groupBy('group_by') as $pretreatment)
                                <tbody>
                                    <tr class="text-center">
                                        <td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr class="text-center text-nowrap">
                                                            <th>#</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                            <tr class="text-nowrap">
                                                                <td>
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $t + 1 }}</span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>

                                        @if ($plant->personalitation_plant->well_pump == 'yes')
                                            <td>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr class="text-center text-nowrap">
                                                                <th>Well Pump</th>
                                                                <th>Well Pump Fre.</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                                <tr class="text-nowrap">
                                                                    <td>
                                                                        <div class="d-flex flex-column">
                                                                            <span>{{ $pretreatment[$t]->well_pump }}
                                                                                <small
                                                                                    class="text-danger">psi</small></span>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="d-flex flex-column">
                                                                            <span>{{ $pretreatment[$t]->frecuencies_well_pump }}
                                                                                <small
                                                                                    class="text-danger">Hz</small></span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endfor
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                        @endif

                                        @if ($plant->personalitation_plant->feed_pump == 'yes')
                                            <td>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr class="text-center text-nowrap">
                                                                <th>Feed Pump</th>
                                                                <th>Feed Pump Fre.</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                                <tr class="text-nowrap">
                                                                    <td>
                                                                        <div class="d-flex flex-column">
                                                                            <span>{{ $pretreatment[$t]->feed_pump }}
                                                                                <small
                                                                                    class="text-danger">psi</small></span>

                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="d-flex flex-column">
                                                                            <span>{{ $pretreatment[$t]->frecuencies_feed_pump }}
                                                                                <small
                                                                                    class="text-danger">Hz</small></span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endfor
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                        @endif

                                        @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                            <td>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr class="text-center text-nowrap">
                                                                <th>In</th>
                                                                <th>Out</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($pretreatment[$t]->multimedias as $mm)
                                                                <tr class="text-nowrap">
                                                                    <td>
                                                                        <div class="d-flex flex-column">
                                                                            <span>{{ $mm->in }} <small
                                                                                    class="text-danger">psi</small></span>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="d-flex flex-column">
                                                                            <span>{{ $mm->out }} <small
                                                                                    class="text-danger">psi</small></span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                        @endfor

                                        <td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr class="text-center text-nowrap">
                                                            <th>min</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                            <tr class="text-center">
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $pretreatment[$t]->backwash }}
                                                                            <small
                                                                                class="text-danger">min</small></span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr class="text-center text-nowrap">
                                                            <th>In</th>
                                                            <th>Out</th>
                                                            <th>Change</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                            <tr class="text-center">
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $pretreatment[$t]->polish->first()->in }}
                                                                            <small
                                                                                class="text-danger">psi</small></span>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $pretreatment[$t]->polish->first()->out }}
                                                                            <small
                                                                                class="text-danger">psi</small></span>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    @foreach ($pretreatment[$t]->polish as $polish)
                                                                        <div class="d-flex flex-column">
                                                                            @if ($polish->filter_change != null)
                                                                                {{ $loop->iteration }}).
                                                                                - YES
                                                                            @else
                                                                                {{ $loop->iteration }}).
                                                                                - NO
                                                                            @endif
                                                                        </div>
                                                                    @endforeach
                                                                </td>
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>

                                        <td class="text-nowrap">
                                            {{ $pretreatment->last()->userCreated->name }}
                                        </td>

                                        <td>
                                            @foreach ($pretreatment as $pretre)
                                                {{ $loop->iteration }}). {{ $pretre->observations }}<br>
                                            @endforeach
                                        </td>

                                        <td class="text-nowrap">
                                            {{ $pretreatment->last()->created_at }}
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    Total: {{ $plant->pretreatments->groupBy('group_by')->count() }}
                </div>
            </div>
        </div>
        {{-- Pretreatment end --}}


        {{-- Operation --}}
        <div class="col-md-12">
            <h4 class="mb-1">OPERATION</h4>
            <div class="card card-company-table">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>AMPERAGE</th>
                                    <th>FRECUENCIES</th>
                                    <th>FEED</th>
                                    <th>TDS CONCENTRATION</th>
                                    <th>FLOW</th>
                                    <th>PRESSURES</th>
                                    <th>ASSIGNED BY</th>
                                    <th>OBSERVATION</th>
                                    <th>DATE/TIME</th>
                                </tr>
                            </thead>

                            @foreach ($plant->operations->groupBy('group_by') as $operation)
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>Train</th>
                                                            <th>H.P</th>
                                                            @if ($plant->personalitation_plant->boosterc == 'yes')
                                                                <th>Boosters</th>
                                                            @endif
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                            <tr class="text-center">
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $t + 1 }}</span>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $operation[$t]->hp }} <small
                                                                                class="text-danger">A</small></span>
                                                                    </div>
                                                                </td>

                                                                @if ($plant->personalitation_plant->boosterc == 'yes')
                                                                    <td class="text-nowrap">
                                                                        <div class="d-flex flex-column">
                                                                            <div class="table-responsive">
                                                                                <table class="table">
                                                                                    <tbody>
                                                                                        @for ($b = 0; $b < $operation[$t]->boosters->count(); $b++)
                                                                                            <tr class="text-center">
                                                                                                <td
                                                                                                    class="text-nowrap">
                                                                                                    <div
                                                                                                        class="d-flex flex-column">
                                                                                                        <span>{{ $b + 1 }}</span>
                                                                                                    </div>
                                                                                                </td>

                                                                                                <td
                                                                                                    class="text-nowrap">
                                                                                                    <div
                                                                                                        class="d-flex flex-column">
                                                                                                        <span>{{ $operation[$t]->boosters[$b]->amperage }}
                                                                                                            <small
                                                                                                                class="text-danger">A</small></span>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endfor
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                @endif
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>H.P</th>
                                                            @if ($plant->personalitation_plant->boosterc == 'yes')
                                                                <th>Boosters</th>
                                                            @endif
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                            <tr class="text-center">
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $operation[$t]->hpF }} <small
                                                                                class="text-danger">Hz</small></span>
                                                                    </div>
                                                                </td>

                                                                @if ($plant->personalitation_plant->boosterc == 'yes')
                                                                    <td class="text-nowrap">
                                                                        <div class="d-flex flex-column">
                                                                            <div class="table-responsive">
                                                                                <table class="table">
                                                                                    <tbody>
                                                                                        @for ($b = 0; $b < $operation[$t]->boosters->count(); $b++)
                                                                                            <tr>
                                                                                                <td
                                                                                                    class="text-nowrap">
                                                                                                    <div
                                                                                                        class="d-flex flex-column">
                                                                                                        <span>{{ $b + 1 }}</span>
                                                                                                    </div>
                                                                                                </td>

                                                                                                <td
                                                                                                    class="text-nowrap">
                                                                                                    <div
                                                                                                        class="d-flex flex-column">
                                                                                                        <span>{{ $operation[$t]->boosters[$b]->frequency }}
                                                                                                            <small
                                                                                                                class="text-danger">Hz</small></span>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endfor
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                @endif
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>PH</th>
                                                            <th>TEMPERATURE</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                            <tr class="text-center">
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $operation[$t]->ph }} <small
                                                                                class="text-danger">u.
                                                                                pH</small></span>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $operation[$t]->temperature }} <span
                                                                                class="text-danger">°</span></span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>FEED</th>
                                                            <th>PERMEATE</th>
                                                            <th>REJECTION</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                            <tr class="text-center">
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $operation[$t]->feed }} <small
                                                                                class="text-danger">ppm
                                                                                TDS</small></span>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $operation[$t]->permeated }} <small
                                                                                class="text-danger">ppm
                                                                                TDS</small></span>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $operation[$t]->rejection }} <small
                                                                                class="text-danger">ppm
                                                                                TDS</small></span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>REJET</th>
                                                            <th>PERMEATE</th>
                                                            @if ($plant->personalitation_plant->boosterc == 'yes')
                                                                <th>B1+2</th>
                                                            @endif
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                            <tr class="text-center">
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $operation[$t]->reject_flow }}
                                                                            <small
                                                                                class="text-danger">gpm</small></span>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $operation[$t]->permeate_flow }}
                                                                            <small
                                                                                class="text-danger">gpm</small></span>
                                                                    </div>
                                                                </td>

                                                                @if ($plant->personalitation_plant->boosterc == 'yes')
                                                                    <td class="text-nowrap">
                                                                        <div class="d-flex flex-column">
                                                                            <span>{{ $operation[$t]->boosters[$t]->booster_flow }}
                                                                                <small
                                                                                    class="text-danger">gpm</small></span>
                                                                        </div>
                                                                    </td>
                                                                @endif
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th class="text-nowrap">H.P. IN</th>
                                                            <th class="text-nowrap">H.P. OUT</th>
                                                            <th>REJET</th>
                                                            @if ($plant->personalitation_plant->boosterc == 'yes')
                                                                <th>B1+2</th>
                                                                <th>PX</th>
                                                            @endif
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                            <tr class="text-center">
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $operation[$t]->hp_in }} <small
                                                                                class="text-danger">psi</small></span>
                                                                    </div>
                                                                </td>
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $operation[$t]->hp_out }} <small
                                                                                class="text-danger">psi</small></span>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $operation[$t]->reject }} <small
                                                                                class="text-danger">psi</small></span>

                                                                    </div>
                                                                </td>

                                                                @if ($plant->personalitation_plant->boosterc == 'yes')
                                                                    <td>
                                                                        <div class="table-responsive">
                                                                            <table class="table">
                                                                                <tbody>
                                                                                    @for ($b = 0; $b < $operation[$t]->boosters->count(); $b++)
                                                                                        <tr>
                                                                                            <td class="text-nowrap">
                                                                                                <div
                                                                                                    class="d-flex flex-column">
                                                                                                    <span>{{ $b + 1 }}</span>
                                                                                                </div>
                                                                                            </td>

                                                                                            <td class="text-nowrap">
                                                                                                <div
                                                                                                    class="d-flex flex-column">
                                                                                                    <span>{{ $operation[$t]->boosters[$b]->frequency }}
                                                                                                        <small
                                                                                                            class="text-danger">psi</small></span>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endfor
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="table-responsive">
                                                                            <table class="table">
                                                                                <tbody>
                                                                                    @for ($b = 0; $b < $operation[$t]->boosters->count(); $b++)
                                                                                        <tr>
                                                                                            <td class="text-nowrap">
                                                                                                <div
                                                                                                    class="d-flex flex-column">
                                                                                                    <span>{{ $b + 1 }}</span>
                                                                                                </div>
                                                                                            </td>

                                                                                            <td class="text-nowrap">
                                                                                                <div
                                                                                                    class="d-flex flex-column">
                                                                                                    <span>{{ $operation[$t]->boosters[$b]->px }}
                                                                                                        <small
                                                                                                            class="text-danger">psi</small></span>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endfor
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </td>
                                                                @endif
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>

                                        <td class="text-nowrap">
                                            {{ $operation->last()->assignedBy->name }}
                                        </td>

                                        <td>
                                            @foreach ($operation as $ope)
                                                {{ $loop->iteration }}). {{ $ope->observations }}<br>
                                            @endforeach
                                        </td>

                                        <td class="text-nowrap">
                                            {{ $operation->last()->created_at }}
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    Total: {{ $plant->operations->groupBy('group_by')->count() }}
                </div>
            </div>
        </div>
        {{-- Operation end --}}
    </div>
</div>
