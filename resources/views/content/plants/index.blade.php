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
                            <h6 class="card-subtitle mb-2 text-muted">{{ $plant->location }}</h6>
                            {{ $plant->trains->where('type', 'Train')->count() }}
                        </div>
                        <ul class="list-group list-group-flush">

                        </ul>
                        <div class="card-body">

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
