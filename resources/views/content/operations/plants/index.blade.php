<!--
    /******************************************************************\
    * Author: Pedro Adrian Sanchez Cardenas.
    * Start Date: 31 de Enero del 2022
    * Finish Date: 01 de Enero del 2022

    * Update Author: --------
    * Update Start Date: -------
    * Update Finish Date: -------

    * Description: --------
    /******************************************************************\
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
                        @hasanyrole('Super-Admin|Operations-Manager|Administrative-Manager')
                            <div class="d-flex btn-group justify-content-end plant-acctions">
                                <button class="btn btn-icon btn-flat-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                        <path
                                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                    </svg>
                                </button>

                                <button class="btn btn-icon btn-flat-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                    </svg>
                                </button>

                                <button class="btn btn-icon btn-flat-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M6 1.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v1H6v-1Zm5 0v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5ZM4.5 5.029a.5.5 0 1 1 .998-.06l.5 8.5a.5.5 0 0 1-.998.06l-.5-8.5Zm6.53-.528a.5.5 0 0 1 .47.528l-.5 8.5a.5.5 0 1 1-.998-.058l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                    </svg>
                                </button>
                            </div>
                        @endhasanyrole
                        <img src="https://www.f-w-s.com/assets/img/sistemas/planta_tratamiento_osmosis_inversa/planta-tratamiento-osmosis-inversa.jpg"
                            class="card-img-top" alt="error img plant">

                        <div class="card-body">
                            <h5 class="card-title text-uppercase">{{ $plant->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted text-capitalize">{{ $plant->location }},
                                {{ $plant->country->name }} ({{ $plant->company->name }})</h6>

                            <hr>

                            <div class="row">
                                <div class="col text-center">
                                    <h2>{{ $plant->trains->where('type', 'Train')->count() }} Train
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-subtract" viewBox="0 0 16 16">
                                            <path
                                                d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2z" />
                                        </svg>
                                    </h2>
                                </div>
                                <div class="col text-center">
                                    <h2>{{ $plant->cisterns_quantity }} Cisterns <i
                                            class="fas fa-prescription-bottle"></i></h2>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col text-center">
                                    <h2>{{ $plant->trains->first()->multimedia_filter_quantity }} MF
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-funnel-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z" />
                                        </svg>
                                    </h2>
                                </div>
                                <div class="col text-center">
                                    <h2>{{ $plant->trains->first()->polish_filters_quantity }} PF
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-funnel-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z" />
                                        </svg>
                                    </h2>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col text-center">
                                    @if ($plant->installed_capacity)
                                        <h2>{{ $plant->installed_capacity }} IC <i class="fas fa-tint"></i></h2>
                                    @else
                                        <h2 class="text-muted">N/A <i class="fas fa-tint"></i></h2>
                                    @endif
                                </div>

                                <div class="col text-center">
                                    @if ($plant->design_limit)
                                        <h2>{{ $plant->design_limit }} DL <i class="fas fa-tint"></i></h2>
                                    @else
                                        <h2 class="text-muted">N/A <i class="fas fa-tint"></i></h2>
                                    @endif
                                </div>
                            </div>

                            <hr>

                            <div class="btn-group col-12" role="group">
                                <a href="{{ route('parameters.create', $plant->id) }}" class="btn btn-success"><i
                                        class="fas fa-plus"></i> Parameters</a>
                                <a class="btn btn-info"><i class="far fa-eye"></i> Parameters</a>
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
                                        <td><i class="fas fa-hard-hat"></i>{{ $plant->attendantUser->name }} <br>
                                            <i class="fas fa-phone-square-alt"></i>{{ $plant->attendantUser->phone }}
                                        </td>

                                        <td>
                                            @if ($plant->Manager)
                                                <i class="fas fa-user-circle"></i>{{ $plant->Manager->name }} <br>
                                                <i class="fas fa-phone-square-alt"></i>{{ $plant->Manager->phone }}
                                            @else
                                                <span class="text-muted">N/A</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <p class="card-subtitle mb-2 text-muted text-capitalize">Last update of parameters:
                                @if ($plant->trains->first()->productionRea)<span>{{ $plant->trains->first()->productRea->created_at }}</span>@else <span class="text-danger">N/A</span> @endif</p>
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