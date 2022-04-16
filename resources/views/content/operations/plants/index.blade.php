<!--
    /******************************************************************\
    * Author: Pedro Adrian Sanchez Cardenas.
    * Start Date: 31 de Enero del 2022
    * Finish Date: 01 de Enero del 2022

    * Update Author: Pedro Adrian Sanchez Cardenas.
    * Update Start Date: 01 de Abril del 2022
    * Update Finish Date: 01 de Abril del 2022

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
        <livewire:operation.plants.card-plants :plants="$plants">
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
