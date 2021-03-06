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
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/file-uploaders/dropzone.min.css')) }}">
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
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-file-uploader.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}">
@endsection
<form wire:submit.prevent="store">
    @section('content')
        <section id="alerts">
            <livewire:wifi-alerts />
        </section>
        <section id="indexcreate">
            <div class="row match-height">
                <!-- image plant -->
                <div class="col-xl-4 col-md-6 col-6">
                    <div class="card card-congratulation-medal">
                        <div class="card-body">
                            <h5>{{ $plant->name }}</h5>
                            <p class="card-text font-small-3">{{ $plant->location }}</p>
                            <h3 class="mb-75 mt-1 pt-50">
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
                <livewire:administration.billing.data />

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
                    <div class="col-md">
                        <div class="row">
                            <livewire:administration.billing.button-extra :plant="$plant" />
                            <div class="col-md-6">
                                <livewire:administration.billing.button-discount />
                            </div>
                        </div>
                    </div>
                    <livewire:administration.billing.total :plant="$plant" />
                </div>
        </section>

        <div class="Create">
            <button wire:offline.attr="disabled" type="submit"
                class="btn btn-success col-12 waves-effect waves-float waves-light">
                <div class="d-flex justify-content-center align-items-center font-weight-bold center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18   " fill="currentColor"
                        class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>
                    <span>CREATE INVOICE</span>
                </div>
            </button>
        </div>
    </form>





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
    <script src="{{ asset(mix('vendors/js/file-uploaders/dropzone.min.js')) }}"></script>

@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/pages/dashboard-ecommerce.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-file-uploader.js')) }}"></script>

@endsection
