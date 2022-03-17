<div>
    {{$pretreatments}}
    <div class="row match-height">
        {{-- Product Reading --}}
        <div class="col-md-4">
            <h4 class="mb-1">PRODUCTO READINGS</h4>
            <div class="card card-company-table">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>PRODUCTION</th>
                                    <th>DATE/TIME</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($productWaters as $productWater)
                                    <tr>
                                        <td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>Type</th>
                                                            <th>Reading</th>
                                                            <th>Production</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for ($r = 0; $r < $plant->trains->count(); $r++)
                                                            <tr>
                                                                <td class="text-nowrap text-center">
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
                                            <div class="d-flex align-items-center">
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
                                <tr class="text-center">
                                    <th>FEED LINE TO HOTEL SUPPLY</th>
                                    <th>DAYLI CHEMICAL SUPPLY</th>
                                    <th>Cisterns</th>
                                    <th>ASSIGNED BY</th>
                                    <th>OBSERVATION</th>
                                    <th>DATE/TIME</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productWaters as $productWater)
                                    <tr>
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
                                                            <tr>
                                                                <td class="text-nowrap text-center">
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

                                        <td>
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
                                <tr class="text-center">
                                    <th>TRAIN</th>
                                    @isset($plant->well_pump)
                                        @if ($plant->well_pump != 'no' || $plant->feed_pump != 'no')
                                            <th class="text-center" @if ($plant->well_pump != 'no' && $plant->feed_pump != 'no') colspan="2" @endif>
                                                Water pumps</th>
                                        @endif
                                    @endisset
                                    <th>M. Filters</th>
                                    <th>BACKWASH</th>
                                    <th>POLISH FILTERS</th>
                                    <th>ASSIGNED</th>
                                    <th>OBSERVATION</th>
                                    <th>DATE/TIME</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($pretreatments as $pretreatment)
                                    <tr class="text-center">
                                       {{--<td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <div class="text-center">
                                                                <th>#</th>
                                                            </div>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                            <tr>
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $t + 1 }}</span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>--}}
                                        {{-- water pumps --}}
                                        {{--@if ($plant->well_pump != 'no')
                                            <td>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <div class="text-center">
                                                                    <th>well pump</th>
                                                                    <th>Well Pump Fre.</th>
                                                                </div>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                                <tr>
                                                                    <td class="text-nowrap">
                                                                        <div class="d-flex flex-column">
                                                                            <span>{{ $pretreatment->well_pump }}</span>
                                                                        </div>
                                                                    </td>

                                                                    <td class="text-nowrap">
                                                                        <div class="d-flex flex-column">
                                                                            <span>{{ $pretreatment->frecuencies_well_pump }}</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endfor
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                        @endif

                                        @if ($plant->feed_pump != 'no')
                                            <td>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Feed Pump</th>
                                                                <th>Feed Pump Fre.</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                                <tr>
                                                                    <td class="text-nowrap">
                                                                        <div class="d-flex flex-column">
                                                                            <span>{{ $pretreatment->feed_pump }}</span>

                                                                        </div>
                                                                    </td>

                                                                    <td class="text-nowrap">
                                                                        <div class="d-flex flex-column">
                                                                            <span>{{ $pretreatment->frecuencies_feed_pump }}</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endfor
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                        @endif--}}
                                        {{-- end water pumps --}}

                                        {{--<td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>#</th>
                                                            <th>In</th>
                                                            <th>Out</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                            @isset($plant->pretreatments[$t]->multimedias)
                                                                @for ($m = 0; $m < $plant->pretreatments->first()->multimedias->count(); $m++)
                                                                    <tr class="text-center">
                                                                        <td>M.M #{{ $m + 1 }}</td>
                                                                        <td>{{ $pretreatment->multimedias[$m]->in }}</td>
                                                                        <td>{{ $pretreatment->multimedias[$m]->out }}</td>
                                                                    </tr>
                                                                @endfor
                                                            @endisset
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>--}}
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
        {{-- <div class="col-md-12">
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
                                @foreach ($pretreatments as $pretreatment)
                                    <tr>
                                        <td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>H.P</th>
                                                            <th>B1</th>
                                                            <th>B2</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>

                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
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
                                                            <th>H.P</th>
                                                            <th>B1</th>
                                                            <th>B2</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>

                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
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
                                                            <th>H.P</th>
                                                            <th>TEMPERATURE</th>
                                                            <th>FEED</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>

                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
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
                                                            <th>PERMEATE</th>
                                                            <th>REJECTION</th>
                                                            <th>REJET</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>

                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
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
                                                            <th>B1+2</th>
                                                            <th>H.P.IN</th>
                                                            <th>H.P.OUT</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>

                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
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
                                                            <th>B1+2</th>
                                                            <th>PX#1</th>
                                                            <th>PX#2</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>

                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>

                                        <td class="text-nowrap">
                                            {{ $pretreatment->assignedBy->name }}
                                        </td>

                                        <td>
                                            {{ $pretreatment->observations }}
                                        </td>

                                        <td>
                                            {{ $pretreatment->created_at }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- Operation end --}}
    </div>
</div>
