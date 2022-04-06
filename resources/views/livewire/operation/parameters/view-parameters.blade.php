<div>
    <div wire:poll.10000ms class="row match-height">
        {{-- Product Reading --}}
        <div class="col-md-4">
            <h4 class="mb-1">PRODUCTO READINGS</h4>
            <div class="card card-company-table">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="text-center text-nowrap">
                                    <th>PRODUCTION</th>
                                    <th>DATE/TIME</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($plants->first()->product_waters as $product_water)
                                    <tr>
                                        <td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr class="text-center text-nowrap">
                                                            <th>Type</th>
                                                            <th>Reading</th>
                                                            <th>Production</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($product_water->production_readings as $reading)
                                                            <tr class="text-center">
                                                                <td class="text-nowrap">
                                                                    @if ($reading->train->type == 'Train')
                                                                        {{ $reading->train->type }}
                                                                        #{{ $loop->iteration }}
                                                                    @elseif ($reading->train->type == 'Irrigation')
                                                                        Irrigation
                                                                    @else
                                                                        Municipal
                                                                    @endif
                                                                </td>
                                                                <td class="text-nowrap">
                                                                    {{ $reading->reading }}
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    @if (!$loop->parent->last)
                                                                        {{ $reading->reading -$plants->first()->product_waters[$loop->parent->index + 1]->production_readings[$loop->index]->reading }}
                                                                    @else
                                                                        {{ $reading->reading }}
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex align-items-center text-nowrap">
                                                {{-- <div class="avatar bg-light-primary me-1">
                                                    <div class="avatar-content">
                                                        <i data-feather="monitor" class="font-medium-3"></i>
                                                    </div>
                                                </div> --}}
                                                <span>{{ $product_water->created_at }}</span>
                                            </div>
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
        {{-- Production Reading end --}}

        {{-- Product Water --}}
        <div class="col-md-8">
            <h4 class="mb-1">PRODUCT WATER</h4>
            <div class="card card-company-table">
                <div class="card-body p-0">
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
                                            <div>
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
                                                                    <span>{{ $product_water->ph }}</span>
                                                                </div>
                                                            </td>

                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $product_water->hardness }} </span>
                                                                </div>
                                                            </td>

                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $product_water->tds }}</span>
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $product_water->h2s }}</span>
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $product_water->free_chlorine }}</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
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
                                                                        Kg</span>
                                                                </div>
                                                            </td>

                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $product_water->chemical->sodium_carbonate }}
                                                                        Kg</span>
                                                                </div>
                                                            </td>

                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $product_water->chemical->sodium_hypochlorite }}
                                                                        Kg</span>
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $product_water->chemical->antiscalant }}
                                                                        Kg</span>
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $product_water->chemical->sodium_hydroxide }}
                                                                        Kg</span>
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $product_water->chemical->hydrochloric_acid }}
                                                                        Kg</span>
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $product_water->chemical->kl1 }}
                                                                        Kg</span>
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $product_water->chemical->kl2 }}
                                                                        Kg</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
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
                                                                        <span>{{ $product_water->cisterns[$c]->capacity }}%</span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>
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
                                    @isset($plant->well_pump)
                                        @if ($plant->personalitation_plants->well_pump != 'no' || $plant->personalitation_plants->feed_pump != 'no')
                                            <th class="text-center" @if ($plant->personalitation_plants->well_pump != 'no' && $plant->personalitation_plants->feed_pump != 'no') colspan="2" @endif>
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

                            <tbody>
                                @foreach ($plant->pretreatments as $pretreatment)
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
                                                                            <span>{{ $pretreatment[$t]->well_pump }}</span>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="d-flex flex-column">
                                                                            <span>{{ $pretreatment[$t]->frecuencies_well_pump }}</span>
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
                                                                            <span>{{ $pretreatment[$t]->feed_pump }}</span>

                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="d-flex flex-column">
                                                                            <span>{{ $pretreatment[$t]->frecuencies_feed_pump }}</span>
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
                                                            @foreach ($pretreatment->multimedias as $mm)
                                                                <tr class="text-nowrap">
                                                                    <td>
                                                                        <div class="d-flex flex-column">
                                                                            <span>{{ $mm->in }}</span>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="d-flex flex-column">
                                                                            <span>{{ $mm->out }}</span>
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
                                                                        <span>{{ $pretreatment->backwash }}</span>
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
                                                                        <span>{{ $pretreatment->polish->first()->in }}</span>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $pretreatment->polish->first()->out }}</span>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    @foreach ($pretreatment->polish as $polish)
                                                                        @if ($polish->filter_change != null)
                                                                            <div class="d-flex flex-column">
                                                                                <span>yes</span>
                                                                            </div>
                                                                        @else
                                                                            <div class="d-flex flex-column">
                                                                                <span>no</span>
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                </td>
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>

                                        <td class="text-nowrap">
                                            {{ $pretreatment->userCreated->name }}
                                        </td>

                                        <td>

                                        </td>

                                        <td class="text-nowrap">
                                            {{ $pretreatment->created_at }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    Total: {{ $plant->pretreatments->count() }}
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
                            <tbody>
                                @foreach ($plant->operations as $operation)
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
                                                                        <span>{{ $operation->hp }}</span>
                                                                    </div>
                                                                </td>

                                                                @if ($plant->personalitation_plant->boosterc == 'yes')
                                                                    <td class="text-nowrap">
                                                                        <div class="d-flex flex-column">
                                                                            <div class="table-responsive">
                                                                                <table class="table">
                                                                                    <thead>
                                                                                        <tr class="text-center">
                                                                                            <th>#</th>
                                                                                            <th>booster</th>
                                                                                            <th>PX</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @for ($b = 0; $b < $operation->boosters->count(); $b++)
                                                                                            <tr class="text-center">
                                                                                                <td
                                                                                                    class="text-nowrap">
                                                                                                    <div
                                                                                                        class="d-flex flex-column">
                                                                                                        <span>{{ $t + 1 }}</span>
                                                                                                    </div>
                                                                                                </td>

                                                                                                <td
                                                                                                    class="text-nowrap">
                                                                                                    <div
                                                                                                        class="d-flex flex-column">
                                                                                                        <span>{{ $operation->boosters[$b]->amperage }}</span>
                                                                                                    </div>
                                                                                                </td>

                                                                                                <td
                                                                                                    class="text-nowrap">
                                                                                                    <div
                                                                                                        class="d-flex flex-column">
                                                                                                        {{ $operation->boosters[$b]->frequency }}
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
                                                            @if ($plant->boosterc == 'yes')
                                                                <th>Boosters</th>
                                                            @endif
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                            <tr class="text-center">
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $operation->hpF }}</span>
                                                                    </div>
                                                                </td>

                                                                @if ($plant->boosterc == 'yes')
                                                                    <td class="text-nowrap">
                                                                        <div class="d-flex flex-column">
                                                                            <div class="table-responsive">
                                                                                <table class="table">
                                                                                    <thead>
                                                                                        <tr class="text-center">
                                                                                            <th>#</th>
                                                                                            <th>booster</th>
                                                                                            <th>PX</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @for ($b = 0; $b < $operation->boosters->count(); $b++)
                                                                                            <tr>
                                                                                                <td
                                                                                                    class="text-nowrap">
                                                                                                    <div
                                                                                                        class="d-flex flex-column">
                                                                                                        <span>{{ $t + 1 }}</span>
                                                                                                    </div>
                                                                                                </td>

                                                                                                <td
                                                                                                    class="text-nowrap">
                                                                                                    <div
                                                                                                        class="d-flex flex-column">
                                                                                                        <span>{{ $operation->boosters[$b]->frequency }}</span>
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
                                                                        <span>{{ $operation->ph }}</span>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $operation->temperature }}</span>
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
                                                                        <span>{{ $operation->feed }}</span>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $operation->permeated }}</span>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $operation->rejection }}</span>
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
                                                                        <span>{{ $operation->reject_flow }}</span>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $operation->permeate_flow }}</span>
                                                                    </div>
                                                                </td>

                                                                @if ($plant->personalitation_plant->boosterc == 'yes')
                                                                    <td class="text-nowrap">
                                                                        <div class="d-flex flex-column">
                                                                            <span>{{ $operation->boosters[$t] }}</span>
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
                                                            <th>H.P. IN</th>
                                                            <th>H.P. OUT</th>
                                                            <th>REJET</th>
                                                            @if ($plant->boosterc == 'yes')
                                                                <th>B1+2</th>
                                                                <th>PX#1</th>
                                                                <th>PX#2</th>
                                                            @endif
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                            <tr class="text-center">
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $operation->hp_in }}</span>
                                                                    </div>
                                                                </td>
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $operation->hp_out }}</span>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $operation->reject }}</span>

                                                                    </div>
                                                                </td>

                                                                @if ($plant->boosterc == 'yes')
                                                                    <td class="text-nowrap">
                                                                        <div class="d-flex flex-column">
                                                                            <span>{{ $operation->boosters }}</span>
                                                                        </div>
                                                                    </td>

                                                                    <td class="text-nowrap">
                                                                        <div class="d-flex flex-column">
                                                                            <span>{{ $operation->boosters }}</span>
                                                                        </div>
                                                                    </td>

                                                                    <td class="text-nowrap">
                                                                        <div class="d-flex flex-column">
                                                                            <span>{{ $operation->boosters }}</span>
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
                                            {{ $operation->assignedBy->name }}
                                        </td>

                                        <td>

                                        </td>

                                        <td>
                                            {{ $operation->created_at }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    Total: {{ $plant->operations->count() }}
                </div>
            </div>
        </div>
        {{-- Operation end --}}
    </div>
</div>
