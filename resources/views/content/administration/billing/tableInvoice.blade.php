<!--
    ******************************************************************
    * Author: Eduardo Gabriel Cardenas tzec.
    * Start Date: 09 de febrero del 2022
    * Finish Date: -------

    * Update Author: --------
    * Update Start Date: -------
    * Update Finish Date: ---------

    * Description: --------
    ******************************************************************
 -->
@extends('layouts/contentLayoutMaster')

@section('title', 'View Parameters - RO')

@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/dashboard-ecommerce.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}">
@endsection

@section('content')
    <section id="alerts">
        <livewire:wifi-alerts />
    </section>
    <section id="indexcreate">
        <div class="row match-height">
            <!-- Medal Card -->
            <div class="col-xl-4 col-md-6 col-12">
                <div class="card card-congratulation-medal">
                    <div class="card-body">
                        <h5>{{ $plant->name }}</h5>
                        <p class="card-text font-small-3">{{ $plant->location }}</p>
                        <h3 class="mb-75 mt-2 pt-50">
                            @if ($plant->cover_path != '')
                                <img src="{{ $plant->cover_path }}" alt="">
                            @else
                                <img src="https://www.f-w-s.com/assets/img/sistemas/planta_tratamiento_osmosis_inversa/planta-tratamiento-osmosis-inversa.jpg"
                                    class="card-img-top" alt="error img plant">
                            @endif
                        </h3>
                    </div>
                </div>
            </div>

            <!-- Statistics Card -->
            <livewire:operation.parameters.data-filters />

            <!--/ Statistics Card -->
        </div>

        <div class="row match-height">
            {{-- Product Reading --}}
            <div class="col-xl-4 col-md-6 col-12">
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
                                    {{-- @foreach ($parameters->productWaters as $productWater)
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
                                            
                                                        <span>{{ $productWater->created_at }}</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach --}}
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="card-footer">
                        {{-- $productionReadings->links() --}}
                    </div>
                </div>
            </div>

            <div class="col-md">
                <livewire:administration.billing.table-invoice :plant="$plant" />

                <livewire:administration.billing.discount />

                <livewire:administration.billing.total />

               
            </div>
    </section>
@endsection

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/pages/dashboard-ecommerce.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
@endsection
