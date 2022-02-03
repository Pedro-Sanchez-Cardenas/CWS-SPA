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
                        <input type="text" class="form-control" name="plantName" placeholder="Plant Name..." aria-label="Plant Name..."
                            aria-describedby="plantNameicon">
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="validationDefault04" class="form-label">Location</label>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="plantNameicon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-geo-alt" viewBox="0 0 16 16">
                                <path
                                    d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg>
                        </span>
                        <input type="text" class="form-control" placeholder="Location..." aria-label="Location..."
                            aria-describedby="plantNameicon">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md">
                    <label for="validationDefault04" class="form-label">Type</label>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-stickies" viewBox="0 0 16 16">
                                <path
                                    d="M1.5 0A1.5 1.5 0 0 0 0 1.5V13a1 1 0 0 0 1 1V1.5a.5.5 0 0 1 .5-.5H14a1 1 0 0 0-1-1H1.5z" />
                                <path
                                    d="M3.5 2A1.5 1.5 0 0 0 2 3.5v11A1.5 1.5 0 0 0 3.5 16h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 16 9.586V3.5A1.5 1.5 0 0 0 14.5 2h-11zM3 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V9h-4.5A1.5 1.5 0 0 0 9 10.5V15H3.5a.5.5 0 0 1-.5-.5v-11zm7 11.293V10.5a.5.5 0 0 1 .5-.5h4.293L10 14.793z" />
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

                <div class="col-md">
                    <label for="validationDefault04" class="form-label">Country</label>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-file-text" viewBox="0 0 16 16">
                                <path
                                    d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z" />
                                <path
                                    d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" />
                            </svg>
                        </span>
                        <select class="form-select" id="basicSelect">
                            <option value="">SELECT COUNTRY</option>
                            @foreach ($plantTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md">
                    <label for="validationDefault04" class="form-label">Currency</label>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-currency-exchange"
                                viewBox="0 0 16 16">
                                <path
                                    d="M0 5a5.002 5.002 0 0 0 4.027 4.905 6.46 6.46 0 0 1 .544-2.073C3.695 7.536 3.132 6.864 3 5.91h-.5v-.426h.466V5.05c0-.046 0-.093.004-.135H2.5v-.427h.511C3.236 3.24 4.213 2.5 5.681 2.5c.316 0 .59.031.819.085v.733a3.46 3.46 0 0 0-.815-.082c-.919 0-1.538.466-1.734 1.252h1.917v.427h-1.98c-.003.046-.003.097-.003.147v.422h1.983v.427H3.93c.118.602.468 1.03 1.005 1.229a6.5 6.5 0 0 1 4.97-3.113A5.002 5.002 0 0 0 0 5zm16 5.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0zm-7.75 1.322c.069.835.746 1.485 1.964 1.562V14h.54v-.62c1.259-.086 1.996-.74 1.996-1.69 0-.865-.563-1.31-1.57-1.54l-.426-.1V8.374c.54.06.884.347.966.745h.948c-.07-.804-.779-1.433-1.914-1.502V7h-.54v.629c-1.076.103-1.808.732-1.808 1.622 0 .787.544 1.288 1.45 1.493l.358.085v1.78c-.554-.08-.92-.376-1.003-.787H8.25zm1.96-1.895c-.532-.12-.82-.364-.82-.732 0-.41.311-.719.824-.809v1.54h-.005zm.622 1.044c.645.145.943.38.943.796 0 .474-.37.8-1.02.86v-1.674l.077.018z" />
                            </svg>
                        </span>
                        <select class="form-select" id="basicSelect">
                            <option value="">SELECT CORRENCY</option>
                            @foreach ($plantTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md">
                    <label for="validationDefault04" class="form-label">Operador</label>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd"
                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                        </span>
                        <select class="form-select" id="basicSelect">
                            <option value="">SELECT OPERATOR</option>
                            @foreach ($plantTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md">
                    <label for="validationDefault04" class="form-label">Manager</label>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd"
                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                        </span>
                        <select class="form-select" id="basicSelect">
                            <option value="">SELECT MANAGER</option>
                            @foreach ($plantTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <h4>Cisterns</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-success waves-effect waves-float waves-light">Add
                                Cistern</button>
                            <div class="d-flex align-items-center">
                                <p class="card-text me-25 mb-0">Total Cisterns:0</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
                                    <div class="d-flex flex-row">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body p-2">
                            <div class="row">
                                <div class="col-md mb-2">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <label>Irrigation: </label>
                                        <div class="form-check form-check-primary form-switch">
                                            <input type="checkbox" checked="" class="form-check-input" id="customSwitch3">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <label>Irrigation: </label>
                                        <div class="form-check form-check-primary form-switch">
                                            <input type="checkbox" checked="" class="form-check-input" id="customSwitch3">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <label>Irrigation: </label>
                                        <div class="form-check form-check-primary form-switch">
                                            <input type="checkbox" checked="" class="form-check-input" id="customSwitch3">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <label>Irrigation: </label>
                                        <div class="form-check form-check-primary form-switch">
                                            <input type="checkbox" checked="" class="form-check-input" id="customSwitch3">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <label>Irrigation: </label>
                                        <div class="form-check form-check-primary form-switch">
                                            <input type="checkbox" checked="" class="form-check-input" id="customSwitch3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
