<!--
    ******************************************************************
    * Author: Eduardo Gabriel Cardenas tzec.
    * Start Date: 31 de Enero del 2022
    * Finish Date: -------

    * Update Author: --------
    * Update Start Date: -------
    * Update Finish Date: -------

    * Description: --------
    ******************************************************************
 -->
@extends('layouts/contentLayoutMaster')

@section('title', 'Create Plant - RO')

@section('vendor-style')
    <!-- vendor css files -->
@endsection

@section('page-style')
    <!-- Page css files -->
@endsection

@section('content')
    <!-- Dashboard Analytics Start -->
    <section id="createPlant">
        <!-- Example of a form that Dropzone can take over -->

        <!-- Example of a form that Dropzone can take over -->

        <form class="row g-3">
            <div class="col-md-6">
                <label for="validationDefault01" class="form-label">Plant name</label>
                <input type="text" class="form-control" id="validationDefault01" value="Mark" required>
            </div>


            <div class="col-md-6">
                <label for="validationDefault04" class="form-label">Type</label>
                <select class="form-select" id="validationDefault04" required>
                    <option selected disabled value="">Choose...</option>
                    @foreach ($plantTypes as $pt)
                        <option value="{{ $pt->id }}">{{ $pt->name }}</option>
                    @endforeach
                </select>
            </div>
        </form>
    </section>


    <!-- Dashboard Analytics end -->
@endsection

@section('vendor-script')
    <!-- vendor files -->

@endsection

@section('page-script')
    <!-- Page js files -->

@endsection
