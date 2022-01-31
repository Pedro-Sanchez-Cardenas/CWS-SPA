@extends('layouts/contentLayoutMaster')

@section('title', 'Water Treatment - RO')

@section('vendor-style')
  <!-- vendor css files -->
@endsection

@section('page-style')
  <!-- Page css files -->
@endsection

@section('content')
    <!-- Dashboard Analytics Start -->
    <section id="plants">
        <div class="row">
            @foreach ($plants as $plant)
                <div class="col-sm-1 col-md-6 col-lg-4">
                    <div class="card">
                        <img src="https://www.f-w-s.com/assets/img/sistemas/planta_tratamiento_osmosis_inversa/planta-tratamiento-osmosis-inversa.jpg" class="card-img-top" alt="error img plant">
                        <div class="card-body">
                            <h5 class="card-title">{{ $plant->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $plant->location }}, {{ $plant->country->name }} ({{ $plant->company->name }})</h6>
                            <div class="row">
                                <div class="col text-center">
                                    <h2>{{ $plant->trains->where('type', 'Train')->count() }} T <i data-feather='layers'></i></h2>
                                </div>
                                <div class="col text-center">
                                    <h2>{{ $plant->cisterns_quantity }} T <i data-feather='layers'></i></h2>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col text-center">
                                    <h2>{{ $plant->trains->first()->multimedia_filter_quantity }} MF <i data-feather='layers'></i></h2>
                                </div>
                                <div class="col text-center">
                                    <h2>{{ $plant->trains->first()->polish_filters_quantity }} PF <i data-feather='layers'></i></h2>
                                </div>
                            </div>

                            <div class="d-flex flex-row justify-content-center">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $plant->attendantUser->name }}</h4>
                                    <p class="card-text">{{ $plant->attendantUser->phone }}</p>
                                </div>

                                <div class="card-body">
                                    <h4 class="card-title">{{ $plant->attendantUser->name }}</h4>
                                    <p class="card-text">{{ $plant->attendantUser->phone }}</p>
                                </div>
                            </div>

                            <div class="d-flex flex-row justify-content-center">
                                <button class="btn btn-icon btn-success mx-2">Add Parameters</button>
                                <button class="btn btn-info mx-2">View Parameters</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- Dashboard Analytics end -->
@endsection

@section('vendor-script')
  <!-- vendor files -->

@endsection
@section('page-script')
  <!-- Page js files -->

@endsection
