<!--
    ******************************************************************
    * Author Init: Pedro Adrian Sanchez Cardenas.
    * Date init: 31 de Enero del 2022
    * Date Finish: -------
    * Date Update: -------
    * Author Update: --------
    * Description: --------
    ******************************************************************
 -->

@extends('layouts/contentLayoutMaster')

@section('title', 'Water Treatment - RO')

@section('vendor-style')
  <!-- vendor css files -->

  <!-- vendor css files -->
@endsection

@section('page-style')
  <!-- Page css files -->

  <!-- Page css files -->
@endsection

@section('content')
    <!-- View Plant Index -->
    <section id="plants">
        <div class="row">
            @foreach ($plants as $plant)
                <div class="col-sm-1 col-md-6 col-lg-4">
                    <div class="card">
                        <img src="https://www.f-w-s.com/assets/img/sistemas/planta_tratamiento_osmosis_inversa/planta-tratamiento-osmosis-inversa.jpg" class="card-img-top" alt="error img plant">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase">{{ $plant->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted text-capitalize">{{ $plant->location }}, {{ $plant->country->name }} ({{ $plant->company->name }})</h6>

                            <hr>

                            <div class="row">
                                <div class="col text-center">
                                    <h2>{{ $plant->trains->where('type', 'Train')->count() }} T <i class="fas fa-layer-group"></i></h2>
                                </div>
                                <div class="col text-center">
                                    <h2>{{ $plant->cisterns_quantity }} C <i class="fas fa-prescription-bottle"></i></h2>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col text-center">
                                    <h2>{{ $plant->trains->first()->multimedia_filter_quantity }} MF <i class="fas fa-filter"></i></h2>
                                </div>
                                <div class="col text-center">
                                    <h2>{{ $plant->trains->first()->polish_filters_quantity }} PF <i class="fas fa-filter"></i></h2>
                                </div>
                            </div>

                            <p>Latest production readings</p>
                            <table class="table table-bordered mt-2">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">Trains</th>
                                        <th scope="col">Reading</th>
                                        <th scope="col">Production</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center">

                                    </tr>
                                </tbody>
                            </table>

                            <hr>

                            <div class="btn-group col-12" role="group">
                                <button class="btn btn-icon btn-success"><i class="fas fa-plus"></i> Parameters</button>
                                <button class="btn btn-info"><i class="far fa-eye"></i> Parameters</button>
                            </div>

                            <table class="table table-bordered mt-2">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">Operator</th>
                                        <th scope="col">Manager</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center">
                                        <td>{{ $plant->attendantUser->name }}</td>
                                        <td>
                                            @if ($plant->Manager)
                                                {{ $plant->Manager->name }}
                                            @else
                                                <span class="text-danger">N/A</span>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr class="text-center">
                                        <td>{{ $plant->attendantUser->phone }}</td>
                                        <td>
                                            @if ($plant->Manager)
                                                {{ $plant->Manager->phone }}
                                            @else
                                                <span class="text-danger">N/A</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- View Plant Index -->
@endsection

@section('vendor-script')
  <!-- vendor files -->

  <!-- vendor files -->
@endsection
@section('page-script')
  <!-- Page js files -->

  <!-- Page js files -->
@endsection
