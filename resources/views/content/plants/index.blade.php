<!--
    ******************************************************************
    * Author: Pedro Adrian Sanchez Cardenas.
    * Start Date: 31 de Enero del 2022
    * Finish Date: 01 de Enero del 2022

    * Update Author: --------
    * Update Start Date: -------
    * Update Finish Date: -------

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
                        <div class="d-flex btn-group justify-content-end plant-acctions">
                            <button class="btn btn-icon btn-flat-info"><i class="fas fa-eye"></i></button>

                            <button class="btn btn-icon btn-flat-warning"><i class="fas fa-pen"></i></button>

                            <button class="btn btn-icon btn-flat-danger"><i class="fas fa-trash-alt"></i></button>
                        </div>
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

                            <div class="row">
                                <div class="col text-center">
                                    <h2>{{ $plant->installed_capacity }} IC <i class="fas fa-tint"></i></h2>
                                </div>
                            </div>

                            <hr>

                            <div class="btn-group col-12" role="group">
                                <button class="btn btn-success"><i class="fas fa-plus"></i> Parameters</button>
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
                                        <td><i class="fas fa-hard-hat"></i> {{ $plant->attendantUser->name }} <br>
                                            <i class="fas fa-phone-square-alt"></i> {{ $plant->attendantUser->phone }}
                                        </td>

                                        <td>
                                            @if ($plant->Manager)
                                                <i class="fas fa-user-circle"></i> {{ $plant->Manager->name }} <br>
                                                <i class="fas fa-phone-square-alt"></i> {{ $plant->Manager->phone }}
                                            @else
                                                <span class="text-danger">N/A</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <p class="card-subtitle mb-2 text-muted text-capitalize">Last update of parameters: @if($plant->trains->first()->productionRea)<span>{{ $plant->trains->first()->productRea->created_at }}</span>@else <span class="text-danger">N/A</span> @endif</p>
                        </div>
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
