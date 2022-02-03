<!--
    /******************************************************************\
    * Author: Pedro Adrian Sanchez Cardenas.
    * Start Date: 02 de Enero del 2022
    * Finish Date: ------

    * Update Author: --------
    * Update Start Date: -------
    * Update Finish Date: -------

    * Description: --------
    /******************************************************************\
 -->

@extends('layouts/contentLayoutMaster')

@section('title', 'Add Parameters')

@section('vendor-style')
    <!-- vendor css files -->

    <!-- vendor css files -->
@endsection

@section('page-style')
    <!-- Page css files -->

    <!-- Page css files -->
@endsection

@section('content')
    <!-- View parameters Create -->
    <section id="header">
        <div class="row">
            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="avatar bg-light-success p-50 mb-1">
                            <div class="avatar-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-award font-medium-5">
                                    <circle cx="12" cy="8" r="7"></circle>
                                    <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                                </svg>
                            </div>
                        </div>
                        <h2 class="fw-bolder">
                            {{ $plant->name }}
                        </h2>
                        <p class="card-text">
                            {{ $plant->location }}, {{ $plant->country->name }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="avatar bg-light-success p-50 mb-1">
                            <div class="avatar-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-award font-medium-5">
                                    <circle cx="12" cy="8" r="7"></circle>
                                    <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                                </svg>
                            </div>
                        </div>
                        <h2 class="fw-bolder">
                            {{ $plant->attendantUser->name }}
                        </h2>
                        <p class="card-text">
                            {{ $plant->attendantUser->phone }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="body">
        <livewire:operation.parameters.create />
    </section>

    <section class="position-relative">
        <button class="btn btn-danger p-10">test</button>
    </section>
    <!-- View parameters Create -->
@endsection

@section('vendor-script')
    <!-- vendor files -->

    <!-- vendor files -->
@endsection

@section('page-script')
    <!-- Page js files -->

    <!-- Page js files -->
@endsection
