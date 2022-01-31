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
    <section id="plants" class="container">
        <div class="row">
            @foreach ($plants as $plant)
                <div class="col-3">
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $plant->name }}</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        </ul>
                        <div class="card-body">
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
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
