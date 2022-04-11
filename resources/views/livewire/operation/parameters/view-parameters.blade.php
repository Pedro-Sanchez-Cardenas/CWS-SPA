<div>
    <div wire:poll.5000ms class="row match-height">
        {{-- Product Reading --}}
        <div class="col-md-4">
            <h4 class="mb-1">PRODUCTION READINGS</h4>
            <div class="card">
                <div class="card-body m-0 p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center text-nowrap" role="row">
                                    <th colspan="3">PRODUCTION</th>
                                    <th colspan="1" rowspan="2">DATE/TIME</th>
                                </tr>

                                <tr class="text-center text-nowrap" role="row">
                                    <th rowspan="2">Type</th>
                                    <th>
                                        Reading <br>
                                        <small class="text-danger">m³</small>
                                    </th>
                                    <th>
                                        Production <br>
                                        <small class="text-danger">m³</small>
                                    </th>
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
                                                {{ $reading->reading }}
                                            </td>

                                            <td class="text-nowrap">
                                                @if (!$loop->parent->last)
                                                    {{ $reading->reading -$plants->first()->product_waters[$loop->parent->index + 1]->production_readings[$loop->index]->reading }}
                                                @else
                                                    {{ $reading->reading }}
                                                @endif
                                            </td>

                                            <td colspan="{{ $plant->trains->where('type', 'Train')->count() }}"
                                                class="text-nowrap">
                                                @if (!$loop->first && !$loop->last)
                                                    <span>{{ $product_water->created_at }}</span>
                                                @endif
                                            </td>
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
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center text-nowrap" role="row">
                                    <th colspan="@if($plant->personalitation_plant->chloride == 'yes') 6 @else 5 @endif">FEED LINE TO HOTEL SUPPLY</th>
                                    <th colspan="8">DAYLI CHEMICAL SUPPLY</th>
                                    <th colspan="{{ $plant->cisterns_quantity }}">Cisterns</th>
                                    <th rowspan="2">ASSIGNED BY</th>
                                    <th rowspan="2">OBSERVATION</th>
                                    <th rowspan="2">DATE/TIME</th>
                                </tr>

                                <tr class="text-center text-nowrap" role="row">
                                    {{-- Init Feed line to hotel supply --}}
                                    <th>
                                        PH <br>
                                        <small class="text-danger">u.
                                            pH</small>
                                    </th>
                                    <th>
                                        HARDNESS <br>
                                        <small class="text-danger">ppm</small>
                                    </th>
                                    <th>
                                        TDS <br>
                                        <small class="text-danger">ppm</small>
                                    </th>
                                    <th>
                                        H2S <br>
                                        <small class="text-danger">ppm</small>
                                    </th>
                                    <th>
                                        FREE CHLORINE <br>
                                        <small class="text-danger">ppm</small>
                                    </th>

                                    @if ($plant->personalitation_plant->chloride == 'yes')
                                        <th>
                                            CHLORIDES <br>
                                            <small class="text-danger">ppm</small>
                                        </th>
                                    @endif
                                    {{-- End Feed line to hotel supply --}}

                                    {{-- Init Dayli chemical supply --}}
                                    <th>
                                        CACL2 <br>
                                        <small class="text-danger">Kg</small>
                                    </th>
                                    <th>
                                        NACO3 <br>
                                        <small class="text-danger">Kg</small>
                                    </th>
                                    <th>
                                        NACLO <br>
                                        <small class="text-danger">Kg</small>
                                    </th>
                                    <th>
                                        ANTIS <br>
                                        <small class="text-danger">Kg</small>
                                    </th>
                                    <th>
                                        NAOH <br>
                                        <small class="text-danger">Kg</small>
                                    </th>
                                    <th>
                                        HCL <br>
                                        <small class="text-danger">Kg</small>
                                    </th>
                                    <th>
                                        KL1 <br>
                                        <small class="text-danger">Kg</small>
                                    </th>
                                    <th>
                                        KL2 <br>
                                        <small class="text-danger">Kg</small>
                                    </th>

                                    @for ($i = 0; $i < $plant->cisterns_quantity; $i++)
                                        <th>
                                            Cistern Level #{{ $i + 1 }} <br>
                                            <small class="text-danger">%</small>
                                        </th>
                                    @endfor
                                    {{-- Init Dayli chemical supply --}}
                                </tr>
                            </thead>

                            @foreach ($plant->product_waters as $product_water)
                                <tbody>
                                    <tr class="text-center">
                                        {{-- Init Feed line to hotel supply --}}
                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span>{{ $product_water->ph }}</span>
                                            </div>
                                        </td>

                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span>{{ $product_water->hardness }}</span>
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

                                        @if ($plant->personalitation_plant->chloride == 'yes')
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span>{{ $product_water->chloride }}</span>
                                                </div>
                                            </td>
                                        @endif
                                        {{-- End Feed line to hotel supply --}}

                                        {{-- Init Dayli chemical supply --}}
                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span>{{ $product_water->chemical->calcium_chloride }}</span>
                                            </div>
                                        </td>

                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span>{{ $product_water->chemical->sodium_carbonate }}</span>
                                            </div>
                                        </td>

                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span>{{ $product_water->chemical->sodium_hypochlorite }}</span>
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span>{{ $product_water->chemical->antiscalant }}</span>
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span>{{ $product_water->chemical->sodium_hydroxide }}</span>
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span>{{ $product_water->chemical->hydrochloric_acid }}</span>
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span>{{ $product_water->chemical->kl1 }}</span>
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span>{{ $product_water->chemical->kl2 }}</span>
                                            </div>
                                        </td>
                                        {{-- End Dayli chemical supply --}}

                                        {{-- Init Cisterns --}}
                                        @for ($c = 0; $c < $plant->cisterns_quantity; $c++)
                                            <td>
                                                <span>{{ $product_water->cisterns[$c]->capacity }}</span>
                                            </td>
                                        @endfor
                                        {{-- End Cisterns --}}


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
        {{-- Product Water end --}}
    </div>

    <div class="row match-height">
        {{-- Pretreatment --}}
        <div class="col-12">
            <h4 class="mb-1">PRETREATMENT</h4>
            <div class="card">
                <div class="card-body m-0 p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center text-nowrap" role="row">
                                    <th colspan="1" rowspan="2">
                                        TRAIN
                                    </th>

                                    @isset($plant->personalitation_plant->well_pump)
                                        @if ($plant->personalitation_plant->well_pump != 'no' || $plant->personalitation_plant->feed_pump != 'no')
                                            <th class="text-center" colspan="2">
                                                Water Pumps
                                            </th>
                                        @endif
                                    @endisset

                                    <th colspan="@php echo ($plant->multimedia_filters_quantity * 2); @endphp">
                                        Multimedia Filters
                                    </th>

                                    <th colspan="1" rowspan="3">
                                        BACKWASH <br>
                                        <small class="text-danger">Min</small>
                                    </th>

                                    <th colspan="3" rowspan="2">
                                        POLISH FILTERS
                                    </th>

                                    <th rowspan="3">
                                        ASSIGNED</th>
                                    <th rowspan="3">
                                        OBSERVATION</th>
                                    <th rowspan="3">
                                        DATE/TIME</th>
                                </tr>

                                <tr class="text-center text-nowrap" role="row">
                                    @if ($plant->personalitation_plant->well_pump != 'no')
                                        <th colspan="2">Well Pump</th>
                                    @endif

                                    @if ($plant->personalitation_plant->feed_pump != 'no')
                                        <th colspan="2">Feed Pump</th>
                                    @endif

                                    @for ($i = 0; $i < $plant->multimedia_filters_quantity; $i++)
                                        <th colspan="2">Multimedia Filter #{{ $i + 1 }}</th>
                                    @endfor
                                </tr>

                                <tr class="text-center text-nowrap" role="row">
                                    <th>#</th>

                                    @if ($plant->personalitation_plant->well_pump != 'no')
                                        <th>
                                            Amperage <br>
                                            <small class="text-danger">A</small>
                                        </th>
                                        <th>
                                            Frequency <br>
                                            <small class="text-danger">Hz</small>
                                        </th>
                                    @endif

                                    @if ($plant->personalitation_plant->feed_pump != 'no')
                                        <th>
                                            Amperage <br>
                                            <small class="text-danger">A</small>
                                        </th>
                                        <th>
                                            Frequency <br>
                                            <small class="text-danger">Hz</small>
                                        </th>
                                    @endif

                                    @for ($i = 0; $i < $plant->multimedia_filters_quantity; $i++)
                                        <th>
                                            In <br>
                                            <small class="text-danger">psi</small>
                                        </th>
                                        <th>
                                            Out <br>
                                            <small class="text-danger">psi</small>
                                        </th>
                                    @endfor

                                    <th>
                                        In <br>
                                        <small class="text-danger">psi</small>
                                    </th>
                                    <th>
                                        Out <br>
                                        <small class="text-danger">psi</small>
                                    </th>
                                    <th>
                                        Change
                                    </th>
                                </tr>
                            </thead>

                            @foreach ($plant->pretreatments->groupBy('group_by') as $pretreatment)
                                <tbody>
                                    <tr class="text-center">
                                        <td>
                                            <table class="table">
                                                @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                    <tbody>
                                                        <tr class="text-nowrap">
                                                            <td>
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $t + 1 }}</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                @endfor
                                            </table>
                                        </td>

                                        @if ($plant->personalitation_plant->well_pump == 'yes')
                                            <td colspan="2">
                                                <table class="table">
                                                    @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                        <tbody>
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
                                                        </tbody>
                                                    @endfor
                                                </table>
                                            </td>
                                        @endif

                                        @if ($plant->personalitation_plant->feed_pump == 'yes')
                                            <td>
                                                <table class="table">
                                                    @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                        <tbody>
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
                                                        </tbody>
                                                    @endfor
                                                </table>
                                            </td>
                                        @endif

                                        <td colspan="@php echo ($plant->multimedia_filters_quantity * 2); @endphp">
                                            <table class="table">
                                                @for ($i = 0; $i < $plant->trains->where('type', 'Train')->count(); $i++)
                                                    <tbody>
                                                        <tr>
                                                            @foreach ($plant->pretreatments[$i]->multimedias as $mm)
                                                                <td> {{ $mm->in }}</td>
                                                                <td> {{ $mm->out }}</td>
                                                            @endforeach
                                                        </tr>
                                                    </tbody>
                                                @endfor
                                            </table>
                                        </td>

                                        <td>
                                            <table class="table">
                                                @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $pretreatment[$t]->backwash }}</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                @endfor
                                            </table>
                                        </td>

                                        <td colspan="3">
                                            <table class="table">
                                                @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                    <tbody>
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
                                                                        {{ $loop->iteration }},
                                                                    @else
                                                                        --
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                @endfor
                                            </table>
                                        </td>

                                        <td class="text-nowrap">
                                            {{ $pretreatment->last()->userCreated->name }}
                                        </td>

                                        <td>
                                            <table class="table">
                                                @foreach ($pretreatment as $pretre)
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $loop->iteration }}).
                                                                {{ $pretre->observations }}</td>
                                                        </tr>
                                                    </tbody>
                                                @endforeach
                                            </table>
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
            <div class="card">
                <div class="card-body p-0 m-0">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center" role="row">
                                    <th>TRAIN</th>
                                    <th
                                        colspan="@if ($plant->personalitation_plant->boosterc == 'yes') @php echo ($plant->trains->first()->boosters_quantity + 1); @endphp @else 1 @endif">
                                        AMPERAGE</th>
                                    <th
                                        colspan="@if ($plant->personalitation_plant->boosterc == 'yes') @php echo ($plant->trains->first()->boosters_quantity + 1); @endphp @else 1 @endif">
                                        FRECUENCIES</th>
                                    <th colspan="2">FEED</th>
                                    <th colspan="3">TDS CONCENTRATION</th>
                                    <th colspan="3">FLOW</th>
                                    <th colspan="@php echo ($plant->trains->first()->boosters_quantity + 3); @endphp">PRESSURES</th>
                                    <th rowspan="2">ASSIGNED BY</th>
                                    <th rowspan="2">OBSERVATION</th>
                                    <th rowspan="2">DATE/TIME</th>
                                </tr>

                                <tr class="text-center" role="row">
                                    <th>#</th>

                                    {{-- Init Amperage --}}
                                    <th>
                                        H.P. <br>
                                        <small class="text-danger">A</small>
                                    </th>

                                    @if ($plant->personalitation_plant->boosterc == 'yes')
                                        @for ($i = 0; $i < $plant->trains->first()->boosters_quantity; $i++)
                                            <th class="text-nowrap">
                                                Booster #{{ $i + 1 }} <br>
                                                <small class="text-danger">A</small>
                                            </th>
                                        @endfor
                                    @endif
                                    {{-- End Amperage --}}

                                    {{-- Init Frequency --}}
                                    <th>
                                        H.P <br>
                                        <small class="text-danger">Hz</small>
                                    </th>

                                    @if ($plant->personalitation_plant->boosterc == 'yes')
                                        @for ($i = 0; $i < $plant->trains->first()->boosters_quantity; $i++)
                                            <th class="text-nowrap">
                                                Booster #{{ $i + 1 }} <br>
                                                <small class="text-danger">A</small>
                                            </th>
                                        @endfor
                                    @endif
                                    {{-- End Frequency --}}

                                    {{-- Init Feed --}}
                                    <th class="text-nowrap">
                                        PH <br>
                                        <small class="text-danger">U. ph</small>
                                    </th>
                                    <th>
                                        TEMPERATURE <br>
                                        <small class="text-danger">°C</small>
                                    </th>
                                    {{-- End Feed --}}

                                    {{-- Init TDS Concentration --}}
                                    <th class="text-nowrap">
                                        FEED <br>
                                        <small class="text-danger">ppm TDS</small>
                                    </th>
                                    <th class="text-nowrap">
                                        PERMEATE <br>
                                        <small class="text-danger">ppm TDS</small>
                                    </th>
                                    <th class="text-nowrap">
                                        REJECTION <br>
                                        <small class="text-danger">ppm TDS</small>
                                    </th>
                                    {{-- End TDS Concentration --}}

                                    {{-- Init Flow --}}
                                    <th>
                                        FEED <br>
                                        <small class="text-danger">gpm</small>
                                    </th>
                                    <th>
                                        PERMEATE <br>
                                        <small class="text-danger">gpm</small>
                                    </th>
                                    <th>
                                        REJET <br>
                                        <small class="text-danger">gpm</small>
                                    </th>
                                    {{-- End Flow --}}

                                    {{-- Init Pressures --}}
                                    <th class="text-nowrap">
                                        <!-- TODO: Agregar boosters -->
                                        H.P. IN <br>
                                        <small class="text-danger">psi</small>
                                    </th>
                                    <th class="text-nowrap">
                                        H.P. OUT <br>
                                        <small class="text-danger">psi</small>
                                    </th>

                                    @if ($plant->personalitation_plant->boosterc == 'yes')
                                        <th class="text-nowrap">
                                            B1+2 Out <br>
                                            <small class="text-danger">psi</small>
                                        </th>
                                        @for ($i = 0; $i < $plant->trains->first()->boosters_quantity; $i++)
                                            <th class="text-nowrap">
                                                PX #{{ $i + 1 }} <br>
                                                <small class="text-danger">psi</small>
                                            </th>
                                        @endfor
                                    @endif
                                    {{-- End Pressures --}}
                                </tr>
                            </thead>

                            @foreach ($plant->operations->groupBy('group_by') as $operation)
                                <tbody>
                                    <tr class="text-center">
                                        <td>
                                            <table class="table">
                                                @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $t + 1 }}</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                @endfor
                                            </table>
                                        </td>

                                        <td>
                                            <table class="table">
                                                @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $operation[$t]->hp }}</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                @endfor
                                            </table>
                                        </td>

                                        @if ($plant->personalitation_plant->boosterc == 'yes')
                                            @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                <td colspan="{{ $plant->trains->first()->boosters_quantity }}">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                @for ($b = 0; $b < $operation[$t]->boosters->count(); $b++)
                                                                    <td class="text-nowrap">
                                                                        <span>{{ $operation[$t]->boosters[$b]->frequency }}</span>
                                                                    </td>
                                                                @endfor
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            @endfor
                                        @endif

                                        <td>
                                            <table class="table">
                                                @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $operation[$t]->hpF }}</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                @endfor
                                            </table>
                                        </td>

                                        @if ($plant->personalitation_plant->boosterc == 'yes')
                                            @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                <td colspan="2">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr class="text-center">
                                                                @for ($b = 0; $b < $operation[$t]->boosters->count(); $b++)
                                                                    <td class="text-nowrap">
                                                                        <span>{{ $operation[$t]->boosters[$b]->frequency }}</span>
                                                                    </td>
                                                                @endfor
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            @endfor
                                        @endif

                                        <td colspan="2">
                                            <table class="table">
                                                @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                    <tbody>
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
                                                    </tbody>
                                                @endfor
                                            </table>
                                        </td>

                                        <td colspan="3">
                                            <table class="table">
                                                @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                    <tbody>
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
                                                    </tbody>
                                                @endfor
                                            </table>
                                        </td>

                                        <td colspan="3">
                                            <table class="table">
                                                <tbody>
                                                    @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                        <tr class="text-center">
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $operation[$t]->feed_flow }}</span>
                                                                </div>
                                                            </td>

                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $operation[$t]->permeate_flow }}</span>
                                                                </div>
                                                            </td>

                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $operation[$t]->reject_flow }}</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </td>

                                        <td colspan="3">
                                            <table class="table">
                                                <tbody>
                                                    @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                        <tr class="text-center">
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $operation[$t]->hp_in }}</span>
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $operation[$t]->hp_out }}</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </td>

                                        @if ($plant->personalitation_plant->boosterc == 'yes')
                                            <td colspan="2">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            @for ($i = 0; $i < $plant->trains->first()->boosters_quantity; $i++)
                                                                <td>
                                                                    value*
                                                                </td>
                                                            @endfor
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        @endif

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
