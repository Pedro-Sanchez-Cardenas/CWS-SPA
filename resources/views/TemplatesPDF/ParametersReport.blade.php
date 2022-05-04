<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>{{ $parameters->first()->name }} Report ({{ $date_range != null ? $date_range : 'All' }})</title>

    <style>
        /**
            Establezca los márgenes de la página en 0, por lo que el pie de página y el encabezado
            puede ser de altura y anchura completas.
         **/
        @page {
            margin: 0cm 0cm;
        }

        /** Definir las reglas del encabezado **/
        header {
            position: fixed;
            top: 0.5cm;
            left: 0.5cm;
            right: 0.5cm;
            height: 1cm;
        }

        /** Defina ahora los márgenes reales de cada página en el PDF **/
        body {
            margin-top: 5.8cm;
            margin-left: 0.5cm;
            margin-right: 0.5cm;
            margin-bottom: 2cm;
        }

        /** Definir las reglas del pie de página **/
        footer {
            position: fixed;
            text-align: justify;
            bottom: 0cm;
            left: 0.5cm;
            right: 0.5cm;
            height: 1.3cm;
        }

        .firma {
            position: absolute;
            margin: 0cm;
            padding: 0cm;
            color: black;
            text-align: center;
            bottom: 0cm;
            left: 20cm;
            right: 0cm;
            height: 1.7cm;
            font-size: 13px;
        }

        hr {
            background-color: black;
        }

        .observations {
            border-radius: 1%;
            width: 10.2cm;
            height: 6.5cm;
            top: 5.8cm;
            left: 17cm;
            right: 0.5cm;
            position: absolute;
            background: gainsboro;
            padding-top: 0.3cm;
            padding-left: 0.3cm;
        }

    </style>
</head>

<body>
    <header>
        <table class="table table-bordered">
            <tbody>
                <td>
                    <p><small>{{ $parameters->first()->company->business_name }}</small><br>
                        <small class="">{{ $parameters->first()->company->location }},
                            {{ $parameters->first()->company->suburb }},
                            {{ $parameters->first()->country->name }},
                            <strong>C.P.#</strong>{{ $parameters->first()->company->zip }} <br>
                            <strong>TRN
                                NUMBER/RFC:
                            </strong>{{ $parameters->first()->company->trn_number != null? $parameters->first()->company->trn_number: $parameters->first()->company->rfc }}
                        </small>
                    </p>
                    <h5>Operation Report ({{ $date_range != null ? $date_range : 'All' }})</h5>
                    <h6>{{ $parameters->first()->name }}</h6>
                    <span
                        class="badge badge-primary">{{ $parameters->first()->trains->where('type', 'Train')->count() }}
                        Train</span>
                    @if ($parameters->first()->trains->where('type', 'Irrigation')->count() > 0)
                        <span class="badge badge-success">Irrigation</span>
                    @endif
                </td>

                <td class="td-img text-center">
                    @if ($parameters->first()->company->name == 'CWS-MEX')
                        <img class="mt-3" style="width: 130px; height: 140px;"
                            src="{{ asset('logo-cws.png') }}" alt="">
                    @else
                        <img class="mt-3" style="width: 90px; height: 140px;"
                            src="{{ asset('logo-cws-ku3.png') }}" alt="">
                    @endif
                </td>
            </tbody>
        </table>
    </header>

    @php
        $parame = $parameters->first()->operations;
        $banderaTrains = 0;

        $pretreatment = $parameters->first()->pretreatments;
        $banderaPretreatments = 0;
    @endphp

    <main>
        @foreach ($parameters->first()->product_waters as $product_water)
            <strong class="text-primary">{{ $product_water->created_at->toDatestring() }}</strong>
            <h6 style="font-size: 11px">PRODUCTION READINGS</h6>
            <table class="w-25 table-bordered">
                <thead style="font-size: 10px">
                    <tr class="text-center" role="row">
                        <th>TYPE</th>
                        <th>
                            READING <br>
                            <small class="text-danger">m³</small>
                        </th>
                        <th>
                            PRODUCTION <br>
                            <small class="text-danger">m³</small>
                        </th>
                    </tr>
                </thead>

                <tbody style="font-size: 10px">
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
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="observations">
                <span>Observations:</span>
            </div>


            <h6 style="font-size: 11px"
                class="{{ $parameters->first()->trains->where('type', 'Train')->count() == 2? 'mt-2': 'mt-4' }}">
                PRODUCT WATER</h6>
            <table class="table-bordered" style="width: 60%">
                <thead style="font-size: 10px">
                    <tr class="text-center" role="row">
                        <th colspan="@if ($parameters->first()->personalitation_plant->chloride == 'yes') 6 @else 5 @endif">FEED LINE TO HOTEL
                            SUPPLY</th>
                        <th colspan="{{ $parameters->first()->cisterns_quantity }}">CISTERNS LEVEL</th>
                    </tr>

                    <tr class="text-center" role="row">
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

                        @if ($parameters->first()->personalitation_plant->chloride == 'yes')
                            <th>
                                CHLORIDES <br>
                                <small class="text-danger">ppm</small>
                            </th>
                        @endif
                        {{-- End Feed line to hotel supply --}}

                        {{-- Init Cisterns --}}
                        @for ($i = 0; $i < $parameters->first()->cisterns_quantity; $i++)
                            <th>
                                #{{ $i + 1 }} <br>
                                <small class="text-danger">%</small>
                            </th>
                        @endfor
                        {{-- End Cisterns --}}
                    </tr>
                </thead>

                <tbody style="font-size: 10px">
                    <tr class="text-center">
                        {{-- Init Feed line to hotel supply --}}
                        <td>
                            <span>{{ $product_water->ph }}</span>
                        </td>

                        <td>
                            <span>{{ $product_water->hardness }}</span>
                        </td>

                        <td>
                            <span>{{ $product_water->tds }}</span>
                        </td>
                        <td>
                            <span>{{ $product_water->h2s }}</span>
                        </td>
                        <td>
                            <span>{{ $product_water->free_chlorine }}</span>
                        </td>

                        @if ($parameters->first()->personalitation_plant->chloride == 'yes')
                            <td>
                                <span>{{ $product_water->chloride }}</span>
                            </td>
                        @endif
                        {{-- End Feed line to hotel supply --}}

                        {{-- Init Cisterns --}}
                        @for ($c = 0; $c < $parameters->first()->cisterns_quantity; $c++)
                            <td>
                                <span>{{ $product_water->cisterns[$c]->capacity }}</span>
                            </td>
                        @endfor
                        {{-- End Cisterns --}}
                    </tr>
                </tbody>
            </table>


            <h6 style="font-size: 11px"
                class="{{ $parameters->first()->trains->where('type', 'Train')->count() == 2? 'mt-2': 'mt-4' }}">
                PRETREATMENT</h6>
            <table class="w-100 table-bordered">
                <thead class="text-center" style="font-size: 10px">
                    <tr role="row">
                        <th class="m-0 p-0" colspan="1" rowspan="2">
                            TRAIN
                        </th>

                        @isset($parameters->first()->personalitation_plant->well_pump)
                            @if ($parameters->first()->personalitation_plant->well_pump != 'no' || $parameters->first()->personalitation_plant->feed_pump != 'no')
                                <th class="text-center" colspan="2">
                                    WATER PUMPS
                                </th>
                            @endif
                        @endisset

                        <th class="m-0 p-0" colspan="@php echo ($parameters->first()->multimedia_filters_quantity * 2); @endphp">
                            MULTIMEDIA FILTERS
                        </th>

                        <th class="m-0 p-0" colspan="1" rowspan="3">
                            BACKWASH<br>
                            <small class="text-danger">Min</small>
                        </th>

                        <th class="m-0 p-0" colspan="3" rowspan="2">
                            POLISH FILTERS
                        </th>
                    </tr>

                    <tr class="text-center text-nowrap" role="row">
                        @if ($parameters->first()->personalitation_plant->well_pump != 'no')
                            <th class="m-0 p-0" colspan="2">WELL PUMP</th>
                        @endif

                        @if ($parameters->first()->personalitation_plant->feed_pump != 'no')
                            <th class="m-0 p-0" colspan="2">FEED PUMP</th>
                        @endif

                        @for ($i = 0; $i < $parameters->first()->multimedia_filters_quantity; $i++)
                            <th class="m-0 p-0" colspan="2">#{{ $i + 1 }}</th>
                        @endfor
                    </tr>

                    <tr class="text-center text-nowrap" role="row">
                        <th class="m-0 p-0" class="pt-2">#</th>

                        @if ($parameters->first()->personalitation_plant->well_pump != 'no')
                            <th class="m-0 p-0">
                                AMPERAGE<br>
                                <small class="text-danger">A</small>
                            </th>

                            <th class="m-0 p-0">
                                FREQUENCY<br>
                                <small class="text-danger">Hz</small>
                            </th>
                        @endif

                        @if ($parameters->first()->personalitation_plant->feed_pump != 'no')
                            <th class="m-0 p-0">
                                AMPERAGE<br>
                                <small class="text-danger">A</small>
                            </th>

                            <th class="m-0 p-0">
                                FREQUENCY<br>
                                <small class="text-danger">Hz</small>
                            </th>
                        @endif

                        @for ($i = 0; $i < $parameters->first()->multimedia_filters_quantity; $i++)
                            <th class="m-0 p-0">
                                IN<br>
                                <small class="text-danger">psi</small>
                            </th>

                            <th class="m-0 p-0">
                                OUT<br>
                                <small class="text-danger">psi</small>
                            </th>
                        @endfor

                        <th class="m-0 p-0">
                            IN<br>
                            <small class="text-danger">psi</small>
                        </th>

                        <th class="m-0 p-0">
                            OUT<br>
                            <small class="text-danger">psi</small>
                        </th>

                        <th class="m-0 p-0">
                            CHANGE
                        </th>
                    </tr>
                </thead>

                <tbody style="font-size: 10px">
                    @for ($train = 0;
                    $train <
                    $parameters->first()->trains->where('type', 'Train')->count();
                    $train++)
                        <tr class="text-center">
                            <td class="m-0 p-0">
                                {{ $train + 1 }}
                            </td>

                            @if ($parameters->first()->personalitation_plant->well_pump == 'yes')
                                <td class="m-0 p-0">
                                    {{ $pretreatment[$banderaPretreatments]->well_pump }}
                                </td>

                                <td class="m-0 p-0">
                                    {{ $pretreatment[$banderaPretreatments]->frecuencies_well_pump }}
                                </td>
                            @endif

                            @if ($parameters->first()->personalitation_plant->feed_pump == 'yes')
                                <td class="m-0 p-0">
                                    {{ $pretreatment[$banderaPretreatments]->feed_pump }}
                                </td>

                                <td class="m-0 p-0">
                                    {{ $pretreatment[$banderaPretreatments]->frecuencies_feed_pump }}
                                </td>
                            @endif

                            @foreach ($pretreatment[$banderaPretreatments]->multimedias as $mm)
                                <td class="m-0 p-0"> {{ $mm->in }}</td>
                                <td class="m-0 p-0"> {{ $mm->out }}</td>
                            @endforeach

                            <td class="m-0 p-0">
                                {{ $pretreatment[$banderaPretreatments]->backwash }}
                            </td>

                            <td class="m-0 p-0">
                                {{ $pretreatment[$banderaPretreatments]->polish->first()->in }}
                            </td>

                            <td class="m-0 p-0">
                                {{ $pretreatment[$banderaPretreatments]->polish->first()->out }}
                            </td>

                            <td class="m-0 p-0">
                                @foreach ($pretreatment[$banderaPretreatments]->polish as $polish)
                                    @if ($polish->filter_change != null)
                                        {{ $loop->iteration }},
                                    @else
                                        --
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        @php
                            $banderaPretreatments++;
                        @endphp
                    @endfor
                </tbody>
            </table>


            <h6 style="font-size: 11px"
                class="{{ $parameters->first()->trains->where('type', 'Train')->count() == 2? 'mt-3': 'mt-4' }}">
                OPERATION</h6>
            <table class="w-100 table-bordered">
                <thead style="font-size: 10px">
                    <tr class="text-center" role="row">
                        <th>TRAIN</th>
                        <th
                            colspan="@if ($parameters->first()->personalitation_plant->boosterc == 'yes') @php echo ($parameters->first()->trains->first()->boosters_quantity + 1); @endphp @else 1 @endif">
                            AMPERAGE</th>
                        <th
                            colspan="@if ($parameters->first()->personalitation_plant->boosterc == 'yes') @php echo ($parameters->first()->trains->first()->boosters_quantity + 1); @endphp @else 1 @endif">
                            FREQUENCIES</th>
                        <th colspan="2">FEED</th>
                        <th colspan="3">TDS CONCENTRATION</th>
                        <th colspan="@if ($parameters->first()->personalitation_plant->boosterc == 'yes') 4 @else 3 @endif">FLOW</th>
                        <th colspan="@php echo ($parameters->first()->trains->first()->boosters_quantity + ($parameters->first()->personalitation_plant->boosterc == 'yes' ? 1 : 0) + 3); @endphp">PRESSURES</th>
                    </tr>

                    <tr class="text-center" role="row">
                        <th class="pt-2">#</th>

                        {{-- Init Amperage --}}
                        <th>
                            H.P. <br>
                            <small class="text-danger">A</small>
                        </th>

                        @if ($parameters->first()->personalitation_plant->boosterc == 'yes')
                            @for ($i = 0; $i < $parameters->first()->trains->first()->boosters_quantity; $i++)
                                <th class="text-nowrap">
                                    BOOSTER #{{ $i + 1 }} <br>
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

                        @if ($parameters->first()->personalitation_plant->boosterc == 'yes')
                            @for ($i = 0; $i < $parameters->first()->trains->first()->boosters_quantity; $i++)
                                <th class="text-nowrap">
                                    BOOSTER #{{ $i + 1 }} <br>
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
                            TEMP <br>
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
                        @if ($parameters->first()->personalitation_plant->boosterc == 'yes')
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
                            REJECT <br>
                            <small class="text-danger">gpm</small>
                        </th>
                        {{-- End Flow --}}

                        {{-- Init Pressures --}}
                        @if ($parameters->first()->personalitation_plant->boosterc == 'yes')
                            <th class="text-nowrap">
                                B1+2 Out <br>
                                <small class="text-danger">psi</small>
                            </th>
                            @for ($i = 0; $i < $parameters->first()->trains->first()->boosters_quantity; $i++)
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

                <tbody style="font-size: 10px">
                    @for ($train = 0;
                        $train <
                        $parameters->first()->trains->where('type', 'Train')->count();
                        $train++)
                        <tr class="text-center">
                            <td>
                                {{ $train + 1 }}
                            </td>

                            <td>
                                {{ $parame[$banderaTrains]->hp }}
                            </td>

                            @if ($parameters->first()->personalitation_plant->boosterc == 'yes')
                                @for ($b = 0; $b < $parame[$banderaTrains]->boosters->count(); $b++)
                                    <td>
                                        {{ $parame[$banderaTrains]->boosters[$b]->amperage }}
                                    </td>
                                @endfor
                            @endif

                            <td>
                                {{ $parame[$banderaTrains]->hpF }}
                            </td>

                            @if ($parameters->first()->personalitation_plant->boosterc == 'yes')
                                @for ($b = 0; $b < $parame[$banderaTrains]->boosters->count(); $b++)
                                    <td>
                                        {{ $parame[$banderaTrains]->boosters[$b]->frequency }}
                                    </td>
                                @endfor
                            @endif

                            <td>
                                {{ $parame[$banderaTrains]->ph }}
                            </td>

                            <td>
                                {{ $parame[$banderaTrains]->temperature }}
                            </td>

                            <td>
                                {{ $parame[$banderaTrains]->feed }}
                            </td>

                            <td>
                                {{ $parame[$banderaTrains]->permeate }}
                            </td>

                            <td>
                                {{ $parame[$banderaTrains]->reject }}
                            </td>

                            @if ($parameters->first()->personalitation_plant->boosterc == 'yes')
                                <td>
                                    {{ $parame[$banderaTrains]->boosters->first()->booster_flow }}
                                </td>
                            @endif

                            <td>
                                {{ $parame[$banderaTrains]->feed_flow }}
                            </td>

                            <td>
                                {{ $parame[$banderaTrains]->permeate_flow }}
                            </td>

                            <td>
                                {{ $parame[$banderaTrains]->reject_flow }}
                            </td>

                            @if ($parameters->first()->personalitation_plant->boosterc == 'yes')
                                <td>
                                    {{ $parame[$banderaTrains]->boosters->first()->booster_pressures_total }}
                                </td>
                            @endif

                            <td>
                                {{ $parame[$banderaTrains]->hp_in }}
                            </td>

                            <td>
                                {{ $parame[$banderaTrains]->hp_out }}
                            </td>

                            <td>
                                {{ $parame[$banderaTrains]->reject_pressure }}
                            </td>

                            @if ($parameters->first()->personalitation_plant->boosterc == 'yes')
                                @for ($b = 0; $b < $parameters->first()->trains->first()->boosters_quantity; $b++)
                                    <td>
                                        {{ $parame[$banderaTrains]->boosters[$b]->booster_pressures }}
                                    </td>
                                @endfor
                            @endif
                        </tr>
                        @php
                            $banderaTrains++;
                        @endphp
                    @endfor
                </tbody>
            </table>

            <footer>
                <small class="text-muted">PDF auto-generated by:<a>https://platform.cwsmexico.mx</a> Copyright
                    &copy;
                    <?php echo date('Y'); ?></small>

                <div class="firma">
                    <hr>
                    <span>Verified</span>
                </div>
            </footer>
        @endforeach
    </main>
</body>

</html>
