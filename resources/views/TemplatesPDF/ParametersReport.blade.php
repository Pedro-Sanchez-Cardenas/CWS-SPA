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
</head>

<body>
    <table class="table">
        <tbody>
            <tr>
                <td>
                    {{ $parameters->first()->company->business_name }} <br>
                    {{ $parameters->first()->company->location }}, {{ $parameters->first()->company->suburb }},
                    {{ $parameters->first()->country->name }}
                    <br> <br>
                    <h3>Report ({{ $date_range != null ? $date_range : 'All' }})</h3>
                    <h6>{{ $parameters->first()->name }}</h6>
                </td>

                <td class="text-center">
                    <img width="90" height="125" src="{{ asset('storage/logo_v1.png') }}" alt="">
                </td>
            </tr>
        </tbody>
    </table>

    <hr>

    <h4 class="mb-1">PRODUCTION READINGS</h4>
    <div class="card mb-5">
        <div class="card-body m-0 p-0">
            <div class="rounded">
                <table class="table table-bordered">
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

                                    <td colspan="{{ $parameters->first()->trains->where('type', 'Train')->count() }}"
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
    {{-- End production readings --}}

    <hr>

    <h4 class="mb-1">PRODUCT WATER</h4>
    <div class="card mb-5">
        <div class="card-body m-0 p-0">
            <div class="rounded">
                <table class="table table-bordered">
                    <thead class="sticky-top">
                        <tr class="text-center text-nowrap" role="row">
                            <th colspan="@if ($parameters->first()->personalitation_plant->chloride == 'yes') 6 @else 5 @endif">FEED LINE TO HOTEL
                                SUPPLY</th>
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

                            @if ($parameters->first()->personalitation_plant->chloride == 'yes')
                                <th>
                                    CHLORIDES <br>
                                    <small class="text-danger">ppm</small>
                                </th>
                            @endif
                            {{-- End Feed line to hotel supply --}}
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

                                @if ($parameters->first()->personalitation_plant->chloride == 'yes')
                                    <td class="text-nowrap">
                                        <div class="d-flex flex-column">
                                            <span>{{ $product_water->chloride }}</span>
                                        </div>
                                    </td>
                                @endif
                                {{-- End Feed line to hotel supply --}}

                                {{-- Init Dayli chemical supply --}}

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
    {{-- End product water --}}

    <hr>

    <h4 class="mb-1">PRETREATMENT</h4>
    <div class="card mb-5">
        <div class="card-body m-0 p-0">
            <div class="rounded">
                <table class="table table-bordered">
                    <thead class="sticky-top">
                        <tr class="text-center text-nowrap" role="row">
                            <th colspan="1" rowspan="2" class="pt-3">
                                TRAIN
                            </th>

                            @isset($parameters->first()->personalitation_plant->well_pump)
                                @if ($parameters->first()->personalitation_plant->well_pump != 'no' || $parameters->first()->personalitation_plant->feed_pump != 'no')
                                    <th class="text-center" colspan="2">
                                        WATER PUMPS
                                    </th>
                                @endif
                            @endisset

                            <th colspan="@php echo ($parameters->first()->multimedia_filters_quantity * 2); @endphp">
                                MULTIMEDIA FILTERS
                            </th>

                            <th colspan="1" rowspan="3" class="pt-5">
                                BACKWASH <br>
                                <small class="text-danger">Min</small>
                            </th>

                            <th colspan="3" rowspan="2" class="pt-3">
                                POLISH FILTERS
                            </th>

                            <th rowspan="3" class="pt-5">
                                DATE/TIME</th>
                        </tr>

                        <tr class="text-center text-nowrap" role="row">
                            @if ($parameters->first()->personalitation_plant->well_pump != 'no')
                                <th colspan="2">Well Pump</th>
                            @endif

                            @if ($parameters->first()->personalitation_plant->feed_pump != 'no')
                                <th colspan="2">Feed Pump</th>
                            @endif

                            @for ($i = 0; $i < $parameters->first()->multimedia_filters_quantity; $i++)
                                <th colspan="2">M.F. #{{ $i + 1 }}</th>
                            @endfor
                        </tr>

                        <tr class="text-center text-nowrap" role="row">
                            <th class="pt-2">#</th>

                            @if ($parameters->first()->personalitation_plant->well_pump != 'no')
                                <th>
                                    Amperage <br>
                                    <small class="text-danger">A</small>
                                </th>
                                <th>
                                    Frequency <br>
                                    <small class="text-danger">Hz</small>
                                </th>
                            @endif

                            @if ($parameters->first()->personalitation_plant->feed_pump != 'no')
                                <th>
                                    Amperage <br>
                                    <small class="text-danger">A</small>
                                </th>
                                <th>
                                    Frequency <br>
                                    <small class="text-danger">Hz</small>
                                </th>
                            @endif

                            @for ($i = 0; $i < $parameters->first()->multimedia_filters_quantity; $i++)
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
                                        @for ($t = 0;
    $t <
    $parameters->first()->trains->where('type', 'Train')->count();
    $t++)
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

                                @if ($parameters->first()->personalitation_plant->well_pump == 'yes')
                                    <td colspan="2">
                                        <table class="table">
                                            @for ($t = 0;
    $t <
    $parameters->first()->trains->where('type', 'Train')->count();
    $t++)
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

                                @if ($parameters->first()->personalitation_plant->feed_pump == 'yes')
                                    <td>
                                        <table class="table">
                                            @for ($t = 0;
    $t <
    $parameters->first()->trains->where('type', 'Train')->count();
    $t++)
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

                                <td colspan="@php echo ($parameters->first()->multimedia_filters_quantity * 2); @endphp">
                                    <table class="table">
                                        @for ($i = 0;
    $i <
    $parameters->first()->trains->where('type', 'Train')->count();
    $i++)
                                            <tbody>
                                                <tr>
                                                    @foreach ($parameters->first()->pretreatments[$i]->multimedias as $mm)
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
                                        @for ($t = 0;
    $t <
    $parameters->first()->trains->where('type', 'Train')->count();
    $t++)
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
                                        @for ($t = 0;
    $t <
    $parameters->first()->trains->where('type', 'Train')->count();
    $t++)
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
    {{-- End pretreatment --}}

    <hr>

    <h4 class="mb-1">OPERATION</h4>
    <div class="card">
        <div class="card-body p-0 m-0">
            <div class="rounded">
                <table class="table table-bordered">
                    <thead class="sticky-top">
                        <tr class="text-center" role="row">
                            <th>TRAIN</th>
                            <th
                                colspan="@if ($parameters->first()->personalitation_plant->boosterc == 'yes') @php echo ($parameters->first()->trains->first()->boosters_quantity + 1); @endphp @else 1 @endif">
                                AMPERAGE</th>
                            <th
                                colspan="@if ($parameters->first()->personalitation_plant->boosterc == 'yes') @php echo ($parameters->first()->trains->first()->boosters_quantity + 1); @endphp @else 1 @endif">
                                FRECUENCIES</th>
                            <th colspan="2">FEED</th>
                            <th colspan="3">TDS CONCENTRATION</th>
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
                                        B #{{ $i + 1 }} <br>
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
                                        B #{{ $i + 1 }} <br>
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
                                TEM <br>
                                <small class="text-danger">°C</small>
                            </th>
                            {{-- End Feed --}}

                            {{-- Init TDS Concentration --}}
                            <th class="text-nowrap">
                                FEED <br>
                                <small class="text-danger">ppm TDS</small>
                            </th>
                            <th class="text-nowrap">
                                PERM <br>
                                <small class="text-danger">ppm TDS</small>
                            </th>
                            <th class="text-nowrap">
                                REJE <br>
                                <small class="text-danger">ppm TDS</small>
                            </th>
                            {{-- End TDS Concentration --}}
                        </tr>
                    </thead>

                    @forelse ($parameters->first()->operations->groupBy('group_by') as $operation)
                        <tbody>
                            <tr class="text-center">
                                <td>
                                    <table class="table">
                                        @for ($t = 0;
    $t <
    $parameters->first()->trains->where('type', 'Train')->count();
    $t++)
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
                                        @for ($t = 0;
    $t <
    $parameters->first()->trains->where('type', 'Train')->count();
    $t++)
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

                                @if ($parameters->first()->personalitation_plant->boosterc == 'yes')
                                    @for ($t = 0;
    $t <
    $parameters->first()->trains->where('type', 'Train')->count();
    $t++)
                                        <td colspan="{{ $parameters->first()->trains->first()->boosters_quantity }}">
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
                                        @for ($t = 0;
    $t <
    $parameters->first()->trains->where('type', 'Train')->count();
    $t++)
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

                                @if ($parameters->first()->personalitation_plant->boosterc == 'yes')
                                    @for ($t = 0;
    $t <
    $parameters->first()->trains->where('type', 'Train')->count();
    $t++)
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
                                        @for ($t = 0;
    $t <
    $parameters->first()->trains->where('type', 'Train')->count();
    $t++)
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
                                        @for ($t = 0;
    $t <
    $parameters->first()->trains->where('type', 'Train')->count();
    $t++)
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
    {{-- End operation --}}


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
