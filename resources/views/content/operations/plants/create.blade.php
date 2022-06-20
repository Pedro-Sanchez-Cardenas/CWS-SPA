<!--
    ******************************************************************
    * Author: Eduardo Gabriel Cardenas tzec.
    * Start Date: 31 de Enero del 2022
    * Finish Date: -------

    * Update Author: -------
    * Update Start Date: -------
    * Update Finish Date: -------

    * Description: -------
    ******************************************************************
 -->
@extends('layouts/contentLayoutMaster')

@section('title', 'Create Plant - RO')

@section('vendor-style')s
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-file-uploader.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

@endsection

@section('content')
    <livewire:wifi-alerts />
    </section>

    <section id="body">
        <livewire:operation.plants.create-plants /> <!-- Paso de parametros por el render del componente -->
        <livewire:operation.plants.trains-plants />
        <livewire:operation.plants.buttonsubmit />
        <livewire:operation.plants.grafics />
    </section>



@endsection


@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection

@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
    <script>
        let dates = [

        ];

        var options = {
            series: [{

                    name: "Session Duration",
                    data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
                },
                {
                    name: "Page Views",
                    data: [35, 41, 62, 42, 13, 18, 29, 37, 36, 51, 32, 35]
                },
                {
                    name: 'Total Visits',
                    data: [87, 57, 74, 99, 75, 38, 62, 47, 82, 56, 45, 47]
                }
            ],
            chart: {
                height: 350,
                type: 'bar',
                zoom: {
                    enabled: true
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: [5, 7, 5],
                curve: 'straight',
                dashArray: [0, 8, 5]
            },
            title: {
                text: 'Page Statistics',
                align: 'left'
            },
            legend: {
                tooltipHoverFormatter: function(val, opts) {
                    return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
                }
            },
            markers: {
                size: 0,
                hover: {
                    sizeOffset: 6
                }
            },
            xaxis: {
                categories: dates,
            },
            tooltip: {
                y: [{
                        title: {
                            formatter: function(val) {
                                return val + " (psi)"
                            }
                        }
                    },
                    {
                        title: {
                            formatter: function(val) {
                                return val + " per session"
                            }
                        }
                    },
                    {
                        title: {
                            formatter: function(val) {
                                return val;
                            }
                        }
                    }
                ]
            },
            grid: {
                borderColor: '#f1f1f1',
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
    @stack('jsLivewire')
@endsection
