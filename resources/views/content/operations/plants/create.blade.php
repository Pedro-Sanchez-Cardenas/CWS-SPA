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

        <form>
            <div class="row">
                <div class="col-md-6">
                    <label for="plantName" class="form-label">Plant name</label>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="plantNameicon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-search">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </span>
                        <input type="text" class="form-control" placeholder="Plant Name..." aria-label="Plant Name..."
                            aria-describedby="plantNameicon">
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="validationDefault04" class="form-label">Location</label>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="plantNameicon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-search">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </span>
                        <input type="text" class="form-control" placeholder="Location..." aria-label="Location..."
                            aria-describedby="plantNameicon">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg">
                    <label for="validationDefault04" class="form-label">Type</label>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg"
                                width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-search">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </span>
                        <select class="form-select" id="basicSelect">
                            <option value="">SELECT TYPE</option>
                            @foreach ($plantTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg">
                    <label for="validationDefault04" class="form-label">Country</label>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg"
                                width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-search">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </span>
                        <select class="form-select" id="basicSelect">
                            <option value="">SELECT TYPE</option>
                            @foreach ($plantTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg">
                    <label for="validationDefault04" class="form-label">Currency</label>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg"
                                width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-search">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </span>
                        <select class="form-select" id="basicSelect">
                            <option value="">SELECT TYPE</option>
                            @foreach ($plantTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg">
                    <label for="validationDefault04" class="form-label">Country</label>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg"
                                width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-search">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </span>
                        <select class="form-select" id="basicSelect">
                            <option value="">SELECT TYPE</option>
                            @foreach ($plantTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg">
                    <label for="validationDefault04" class="form-label">Currency</label>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg"
                                width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-search">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </span>
                        <select class="form-select" id="basicSelect">
                            <option value="">SELECT TYPE</option>
                            @foreach ($plantTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
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
