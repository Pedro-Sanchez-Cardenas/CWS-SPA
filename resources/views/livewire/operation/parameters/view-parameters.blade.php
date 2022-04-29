<div wire:poll.30000ms>
    {{-- Data Filters --}}
    <div class="card">
        <div class="card-body statistics-body">
            <div class="d-flex justify-content-between">
                <h4 class="card-title">DATA FILTERS</h4>

                @hasrole('Super-Admin|Operations-Manager')
                    <div>
                        <strong class="form-label text-primary">Export to:</strong>

                        <div class="d-flex gap-1">
                            <a class="btn btn-danger"
                                href="{{ route('parameters.pdf', ['id' => $plant, 'date_range' => $date_range]) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z" />
                                </svg>
                                <strong>PDF</strong>
                            </a>

                            <a class="btn btn-success" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-file-earmark-spreadsheet" viewBox="0 0 16 16">
                                    <path
                                        d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h3v2H6zm4 0v-2h3v1a1 1 0 0 1-1 1h-2zm3-3h-3v-2h3v2zm-7 0v-2h3v2H6z" />
                                </svg>
                                <strong>EXCEL</strong>
                            </a>
                        </div>
                    </div>
                @endhasrole
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-1">
                        <label class="form-label" for="first-name-icon">
                            DATE/TIME
                        </label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">
                                <svg fill="#B6B6B6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="20px"
                                    height="20px">
                                    <path
                                        d="M 21 3 C 11.621094 3 4 10.621094 4 20 C 4 29.378906 11.621094 37 21 37 C 24.710938 37 28.140625 35.804688 30.9375 33.78125 L 44.09375 46.90625 L 46.90625 44.09375 L 33.90625 31.0625 C 36.460938 28.085938 38 24.222656 38 20 C 38 10.621094 30.378906 3 21 3 Z M 21 5 C 29.296875 5 36 11.703125 36 20 C 36 28.296875 29.296875 35 21 35 C 12.703125 35 6 28.296875 6 20 C 6 11.703125 12.703125 5 21 5 Z" />
                                </svg>
                            </span>
                            <input type="search" id="date-range" wire:model='date_range' autocomplete="off"
                                class="form-control flatpickr-range ps-1" placeholder="YYYY-MM-DD to YYYY-MM-DD" />
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="bills">BILLS</label>
                    <select data-placeholder="Select a type..." class="select2-icons form-select" id="bills">
                        <optgroup label="Bills">
                            <!-- TODO: agregar facturas generadas por el sistema (Daniel). -->
                        </optgroup>
                    </select>
                </div>
            </div>
        </div>
    </div>
    {{-- Data Filters end --}}

    <div class="row match-height">
        {{-- Production Reading --}}
        <div class="col-md-4">
            <h4 class="mb-1">PRODUCTION READINGS</h4>
            <div wire:loading>
                <div class="card d-flex justify-content-center align-items-center" style="height: 530px;">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    <br>
                    <span>Loading...</span>
                </div>
            </div>

            <div wire:loading.remove class="card">
                <div class="card-body m-0 p-0">
                    <div class="rounded overflow-auto" style="height: 350pt;">
                        <table class="table table-bordered table-hover">
                            <thead class="sticky-top">
                                <tr class="text-center text-nowrap" role="row">
                                    <th colspan="3">PRODUCTION</th>
                                    <th colspan="1" rowspan="2" class="pt-3">DATE/TIME</th>
                                </tr>

                                <tr class="text-center text-nowrap" role="row">
                                    <th class="pt-2">Type</th>
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

                            @forelse ($parameters->first()->product_waters as $product_water)
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
                                                    {{ $reading->reading -$parameters->first()->product_waters[$loop->parent->index + 1]->production_readings[$loop->index]->reading }}
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
                            @empty
                                <h5 class="text-danger">*There is no information</h5>
                            @endforelse
                        </table>
                    </div>
                </div>

                <div class="card-footer">
                    Total: {{ $parameters->first()->product_waters->count() }}
                </div>
            </div>
        </div>
        {{-- Production Reading end --}}

        {{-- Product Water --}}
        <div class="col-md-8">
            <h4 class="mb-1">PRODUCT WATER</h4>
            <div wire:loading>
                <div class="card d-flex justify-content-center align-items-center" style="height: 530px;">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    <br>
                    <span>Loading...</span>
                </div>
            </div>

            <div wire:loading.remove class="card">
                <div class="card-body m-0 p-0">
                    <div class="rounded overflow-auto" style="height: 350pt;">
                        <table class="table table-bordered table-hover">
                            <thead class="sticky-top">
                                <tr class="text-center text-nowrap" role="row">
                                    <th colspan="@if ($plant->personalitation_plant->chloride == 'yes') 6 @else 5 @endif">FEED LINE TO
                                        HOTEL
                                        SUPPLY</th>
                                    <th colspan="8">DAYLI CHEMICAL SUPPLY</th>
                                    <th colspan="{{ $plant->cisterns_quantity }}">Cisterns</th>
                                    <th rowspan="2" class="pt-3">ASSIGNED BY</th>
                                    <th rowspan="2" class="pt-3">OBSERVATION</th>
                                    <th rowspan="2" class="pt-3">DATE/TIME</th>
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

                            @forelse ($parameters->first()->product_waters as $product_water)
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
                            @empty
                                <h5 class="text-danger">*There is no information</h5>
                            @endforelse
                        </table>
                    </div>
                </div>

                <div class="card-footer">
                    Total: {{ $parameters->first()->product_waters->count() }}
                </div>
            </div>
        </div>
        {{-- Product Water end --}}
    </div>

    {{-- Pretreatment --}}
    <h4 class="mb-1">PRETREATMENT</h4>
    <div wire:loading class="col-12">
        <div class="card d-flex justify-content-center align-items-center col-12" style="height: 530px;">
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            <br>
            <span>Loading...</span>
        </div>
    </div>

    <div wire:loading.remove class="card">
        <div class="card-body m-0 p-0">
            <div class="rounded overflow-auto" style="height: 350pt;">
                <table class="table table-bordered table-hover">
                    <thead class="sticky-top">
                        <tr class="text-center text-nowrap" role="row">
                            <th colspan="1" rowspan="2" class="pt-3">
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

                            <th colspan="1" rowspan="3" class="pt-5">
                                BACKWASH <br>
                                <small class="text-danger">Min</small>
                            </th>

                            <th colspan="3" rowspan="2" class="pt-3">
                                POLISH FILTERS
                            </th>

                            <th rowspan="3" class="pt-5">
                                ASSIGNED</th>
                            <th rowspan="3" class="pt-5">
                                OBSERVATIONS</th>
                            <th rowspan="3" class="pt-5">
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
                            <th class="pt-2">#</th>

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

                    @forelse ($parameters->first()->pretreatments->groupBy('group_by') as $pretreatment)
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
                                                                    <small class="text-danger">psi</small></span>

                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div class="d-flex flex-column">
                                                                <span>{{ $pretreatment[$t]->frecuencies_feed_pump }}
                                                                    <small class="text-danger">Hz</small></span>
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
                    @empty
                        <h5 class="text-danger">*There is no information</h5>
                    @endforelse
                </table>
            </div>
        </div>
        <div class="card-footer">
            Total: {{ $parameters->first()->pretreatments->groupBy('group_by')->count() }}
        </div>
    </div>
    {{-- Pretreatment end --}}

    {{-- Operation --}}
    <h4 class="mb-1">OPERATION</h4>
    <div wire:loading class="col-12">
        <div class="card d-flex justify-content-center align-items-center" style="height: 530px;">
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            <br>
            <span>Loading...</span>
        </div>
    </div>

    <div wire:loading.remove class="card">
        <div class="card-body p-0 m-0">
            <div class="rounded overflow-auto" style="height: 350pt;">
                <table class="table table-bordered table-hover">
                    <thead class="sticky-top">
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
                            <th colspan="@if ($plant->personalitation_plant->boosterc == 'yes') 4 @else 3 @endif">FLOW</th>
                            <th colspan="@php echo ($plant->trains->first()->boosters_quantity + 4); @endphp">PRESSURES</th>
                            <th rowspan="2" class="pt-3">ASSIGNED BY</th>
                            <th rowspan="2" class="pt-3">OBSERVATIONS</th>
                            <th rowspan="2" class="pt-3">DATE/TIME</th>
                        </tr>

                        <tr class="text-center" role="row">
                            <th class="pt-2">#</th>

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
                                REJECT <br>
                                <small class="text-danger">ppm TDS</small>
                            </th>
                            {{-- End TDS Concentration --}}

                            {{-- Init Flow --}}
                            @if ($plant->personalitation_plant->boosterc == 'yes')
                                <th class="text-nowrap">
                                    B1+2 Out <br>
                                    <small class="text-danger">gpm</small>
                                </th>
                            @endif
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

                            <th class="text-nowrap">
                                H.P. IN <br>
                                <small class="text-danger">psi</small>
                            </th>
                            <th class="text-nowrap">
                                H.P. OUT <br>
                                <small class="text-danger">psi</small>
                            </th>
                            <th class="text-nowrap">
                                REJECT <br>
                                <small class="text-danger">psi</small>
                            </th>
                            {{-- End Pressures --}}
                        </tr>
                    </thead>

                    @forelse ($parameters->first()->operations->groupBy('group_by') as $operation)
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
                                                            <span>{{ $operation[$t]->permeate }}</span>
                                                        </div>
                                                    </td>

                                                    <td class="text-nowrap">
                                                        <div class="d-flex flex-column">
                                                            <span>{{ $operation[$t]->reject }}</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        @endfor
                                    </table>
                                </td>

                                <td colspan="@if ($plant->personalitation_plant->boosterc == 'yes') 4 @else 3 @endif">
                                    <table class="table">
                                        <tbody>
                                            @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                <tr class="text-center">
                                                    @if ($plant->personalitation_plant->boosterc == 'yes')
                                                        <td class="text-nowrap">
                                                            <div class="d-flex flex-column">
                                                                <span>{{ $operation[$t]->boosters->first()->booster_flow }}</span>
                                                            </div>
                                                        </td>
                                                    @endif

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

                                <td colspan="4">
                                    <table class="table">
                                        <tbody>
                                            @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                <tr class="text-center">
                                                    @if ($plant->personalitation_plant->boosterc == 'yes')
                                                        <td class="text-nowrap">
                                                            <div class="d-flex flex-column">
                                                                <span>{{ $operation[$t]->boosters->first()->booster_pressures_total }}</span>
                                                            </div>
                                                        </td>
                                                    @endif

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

                                                    <td class="text-nowrap">
                                                        <div class="d-flex flex-column">
                                                            <span>{{ $operation[$t]->reject_pressure }}</span>
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
                                                @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                                                    <tr>
                                                        @for ($b = 0; $b < $plant->trains->first()->boosters_quantity; $b++)
                                                            <td>
                                                                <span>{{ $operation[$t]->boosters[$b]->px }}</span>
                                                            </td>
                                                        @endfor
                                                    </tr>
                                                @endfor
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
                    @empty
                        <h5 class="text-danger">*There is no information</h5>
                    @endforelse
                </table>
            </div>
        </div>
        <div class="card-footer">
            Total: {{ $parameters->first()->operations->groupBy('group_by')->count() }}
        </div>
    </div>
    {{-- Operation end --}}
</div>
