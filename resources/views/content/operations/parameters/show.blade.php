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
                                <img src="{{ $plant->cover_path }}" class="img-thumbnail" alt="">
                            @else
                                <img src="https://www.f-w-s.com/assets/img/sistemas/planta_tratamiento_osmosis_inversa/planta-tratamiento-osmosis-inversa.jpg"
                                    class="img-thumbnail" alt="error img plant">
                            @endif
                        </h3>
                    </div>
                    <div class="card-footer">
                        <p class="card-subtitle mb-2 text-muted text-capitalize">Last Parameters:
                            @if ($plant->product_waters->first())
                                <span class="text-primary">{{ $plant->product_waters->first()->created_at }}</span>
                                <span
                                    class="text-danger">{{ \Carbon\Carbon::create($plant->product_waters->first()->created_at)->diffForHumans() }}</span>
                            @else
                                <span class="text-danger">N/A</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <!-- Statistics Card -->
            <div class="col-xl-8 col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">DATA FILTERS</h4>
                        <button class="dt-button buttons-collection btn btn-outline-secondary dropdown-toggle me-2"
                            tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="true"
                            aria-expanded="false"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-share font-small-4 me-50">
                                    <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path>
                                    <polyline points="16 6 12 2 8 6"></polyline>
                                    <line x1="12" y1="2" x2="12" y2="15"></line>
                                </svg>Export</span></button>
                    </div>

                    <div class="card-body statistics-body">
                        <div class="card-body statistics-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label" for="fp-range">DATE/TIME</label>
                                    <input type="text" id="fp-range" class="form-control flatpickr-range"
                                        placeholder="YYYY-MM-DD to YYYY-MM-DD" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="fp-range">Search:</label>
                                    <input type="search" class="form-control" placeholder=""
                                        aria-controls="DataTables_Table_0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Statistics Card -->
            </div>
        </div>


        <div class="row match-height">
            <section id="body">
                <livewire:operation.parameters.view-parameters :plant="$plant" />
            </section>
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
