<div>
    <div class="row match-height">
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
                                @foreach ($parameters->productWaters as $productWater)
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
                                                        @for ($r = 0; $r < $plant->trains->count(); $r++)
                                                            <tr class="text-center">
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        @if ($productWater->productionReadings[$r]->type == 'Train')
                                                                            <span>{{ $productWater->productionReadings[$r]->type }}
                                                                                # {{ $r + 1 }}</span>
                                                                        @else
                                                                            {{ $productWater->productionReadings[$r]->type }}
                                                                        @endif
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productWater->productionReadings[$r]->reading }}</span>
                                                                        <span class="font-small-2 text-muted">m3</span>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productWater->productionReadings[$r]->production }}</span>
                                                                        <span class="font-small-2 text-muted">m3</span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endfor
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
                                                <span>{{ $productWater->created_at }}</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="card-footer">
                    {{-- $productionReadings->links() --}}
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
                                @foreach ($parameters->productWaters as $productWater)
                                    <tr class="text-center">
                                        <td>
                                            <div class="table-responsive">
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
                                                                    <span>{{ $productWater->ph }}</span>
                                                                </div>
                                                            </td>

                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $productWater->hardness }} </span>
                                                                </div>
                                                            </td>

                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $productWater->tds }}</span>
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $productWater->h2s }}</span>
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $productWater->freeChlorine }}</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="table-responsive">
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
                                                                    <span>{{ $productWater->chemical->calciumChloride }}
                                                                        Kg</span>
                                                                </div>
                                                            </td>

                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $productWater->chemical->sodiumCarbonate }}
                                                                        Kg</span>
                                                                </div>
                                                            </td>

                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $productWater->chemical->sodiumHypochlorite }}
                                                                        Kg</span>
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $productWater->chemical->antiscalant }}
                                                                        Kg</span>
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $productWater->chemical->sodiumHydroxide }}
                                                                        Kg</span>
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $productWater->chemical->hydrochloricAcid }}
                                                                        Kg</span>
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $productWater->chemical->kl1 }}
                                                                        Kg</span>
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $productWater->chemical->kl2 }}
                                                                        Kg</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="table-responsive">
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
                                                                        <span>{{ $productWater->cisterns[$c]->capacity }}/0
                                                                            L</span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>

                                        <td class="text-nowrap">
                                            {{ $productWater->assignedBy->name }}
                                        </td>

                                        <td>
                                            {{ $productWater->observations }}
                                        </td>

                                        <td class="text-nowrap">
                                            {{ $productWater->created_at }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
                                        @if ($plant->well_pump != 'no' || $plant->feed_pump != 'no')
                                            <th class="text-center" @if ($plant->well_pump != 'no' && $plant->feed_pump != 'no') colspan="2" @endif>
                                                Water pumps</th>
                                        @endif
                                    @endisset
                                    <th colspan="{{ $plant->trains->where('type', 'Train')->count() }}">M. Filters
                                    </th>
                                    <th>BACKWASH</th>
                                    <th>POLISH FILTERS</th>
                                    <th>ASSIGNED</th>
                                    <th>OBSERVATION</th>
                                    <th>DATE/TIME</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($parameters->pretreatments->groupBy('register') as $pretreatment)
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

                                        @if ($plant->well_pump == 'yes')
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

                                        @if ($plant->feed_pump == 'yes')
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
                                                            @foreach ($pretreatment[$t]->multimedias as $mm)
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
                                                                        <span>{{ $pretreatment[$t]->backwash }}</span>
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
                                                                        <span>{{ $pretreatment[$t]->polish->first()->in }}</span>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $pretreatment[$t]->polish->first()->out }}</span>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    @foreach ($pretreatment[$t]->polish as $polish)
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
                                            {{ $pretreatment->first()->userCreated->name }}
                                        </td>

                                        <td>
                                            @foreach ($pretreatment as $ite)
                                                <li>
                                                    {{ $ite->observations }}
                                                </li>
                                            @endforeach
                                        </td>

                                        <td class="text-nowrap">
                                            {{ $pretreatment->last()->created_at }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
                                @foreach ($parameters->operations->groupBy('register') as $operation)
                                    <tr>
                                        <td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>Train</th>
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
                                                                        <span>{{ $t + 1 }}</span>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $operation[$t]->hp }}</span>
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
                                                                                        @for ($b = 0; $b < $operation[$t]->boosters->count(); $b++)
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
                                                                                                        <span>{{ $operation[$t]->boosters[$b]->amperage }}</span>
                                                                                                    </div>
                                                                                                </td>

                                                                                                <td
                                                                                                    class="text-nowrap">
                                                                                                    <div
                                                                                                        class="d-flex flex-column">
                                                                                                        {{ $operation[$t]->boosters[$b]->frequency }}
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
                                                                        <span>{{ $operation[$t]->hpF }}</span>
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
                                                                                        @for ($b = 0; $b < $operation[$t]->boosters->count(); $b++)
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
                                                                                                        <span>{{ $operation[$t]->boosters[$b]->frequency }}</span>
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
                                                                        <span>{{ $operation[$t]->ph }}</span>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $operation[$t]->temperature }}</span>
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
                                                                        <span>{{ $operation[$t]->feed }}</span>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $operation[$t]->permeated }}</span>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $operation[$t]->rejection }}</span>
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
                                                            @if ($plant->boosterc == 'yes')
                                                                <th>B1+2</th>
                                                            @endif
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                            <tr class="text-center">
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $operation[$t]->rejectFlow }}</span>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $operation[$t]->permeateFlow }}</span>
                                                                    </div>
                                                                </td>

                                                                @if ($plant->boosterc == 'yes')
                                                                    <td class="text-nowrap">
                                                                        <div class="d-flex flex-column">
                                                                            <span>{{ $operation[$t]->boosters[$t] }}</span>
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
                                                                        <span>{{ $operation[$t]->hpIn }}</span>
                                                                    </div>
                                                                </td>
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $operation[$t]->hpOut }}</span>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $operation[$t]->reject }}</span>

                                                                    </div>
                                                                </td>

                                                                @if ($plant->boosterc == 'yes')
                                                                    <td class="text-nowrap">
                                                                        <div class="d-flex flex-column">
                                                                            <span>{{ $operation[$t]->boosters }}</span>
                                                                        </div>
                                                                    </td>

                                                                    <td class="text-nowrap">
                                                                        <div class="d-flex flex-column">
                                                                            <span>{{ $productionReading->production }}</span>
                                                                        </div>
                                                                    </td>

                                                                    <td class="text-nowrap">
                                                                        <div class="d-flex flex-column">
                                                                            <span>{{ $productionReading->production }}</span>
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
                                            @foreach ($operation as $ite)
                                                <li>
                                                    {{ $ite->observations }}
                                                </li>
                                            @endforeach
                                        </td>

                                        <td>
                                            {{ $operation->last()->created_at }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- Operation end --}}
    </div>
</div>
