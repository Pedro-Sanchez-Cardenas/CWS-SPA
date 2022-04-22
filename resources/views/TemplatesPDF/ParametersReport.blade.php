<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $parameters->first()->name }} Report {{ $date_range != null ? $date_range : 'All' }}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="card">
            data of CWS/KU3
        </div>
    </div>
    {{-- <h3 class="mb-1">{{ $parameters->first()->name }} Report</h3>
    <span class="text-danger">{{ $date_range != null ? $date_range : 'All' }}</span>

    <div class="container mt-4">
        <h5 class="mb-1">PRODUCTION READINGS</h5>
        <div class="card">
            <div class="card-body m-0 p-0">
                <div class="rounded overflow-auto" style="height: 350pt;">
                    <table class="table table-bordered table-hover">
                        <thead class="sticky-top">
                            <tr class="text-center text-nowrap" role="row">
                                <th colspan="3">PRODUCTION</th>
                                <th colspan="1" rowspan="2">DATE/TIME</th>
                            </tr>

                            <tr class="text-center text-nowrap" role="row">
                                <th>Type</th>
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
                                                {{ $reading->reading - $plants->first()->product_waters[$loop->parent->index + 1]->production_readings[$loop->index]->reading }}
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
                Total: {{ $plant->first()->product_waters->count() }}
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script> --}}
</body>

</html>
