<!--
    ******************************************************************
    * Author: Eduardo Gabriel Cardenas tzec.
    * Start Date: 31 de Enero del 2022
    * Finish Date: -------

    * Update Author: --------
    * Update Start Date: -------
    * Update Finish Date: 8 de febrero del 2021

    * Description: --------
    ******************************************************************
 -->
@extends('layouts/contentLayoutMaster')

@section('title', 'Create Plant - RO')

@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/file-uploaders/dropzone.min.css')) }}">
@endsection

@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-file-uploader.css')) }}">

@endsection

@section('content')
    <form>
        <section id="createPlant">
            <!-- single file upload starts -->
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
                        <input type="text" class="form-control" name="plantName" placeholder="Plant Name..."
                            aria-label="Plant Name..." aria-describedby="plantNameicon">
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="validationDefault04" class="form-label">Location</label>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="Locationicon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-geo-alt" viewBox="0 0 16 16">
                                <path
                                    d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg>
                        </span>
                        <input type="text" class="form-control" name="location" placeholder="Location..."
                            aria-label="Location..." aria-describedby="Locationcon">
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
                        <select class="form-select" name="plantType" id="basicSelect">
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
                        <select class="form-select" name="plantCountry" id="basicSelect">
                            <option value="">SELECT COUNTRY</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
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
                        <select class="form-select" name="plantCorrency" id="basicSelect">
                            <option value="">SELECT CORRENCY</option>
                            @foreach ($currencies as $currency)
                                <option value="{{ $currency->id }}">{{ $currency->name }} -
                                    {{ $currency->abbreviation }}</option>
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
                        <select class="form-select" name="plantOperator" id="basicSelect">
                            <option value="">SELECT OPERATOR</option>
                            @foreach ($attendants as $attendant)
                                <option value="{{ $attendant->id }}">{{ $attendant->name }}</option>
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
                        <select class="form-select" name="plantManager" id="basicSelect">
                            <option value="">SELECT MANAGER</option>
                            @foreach ($managers as $manager)
                                <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <h4>Cisterns</h4>
            <div class="row">
                <div class="col-md-6" x-data="cisterns()">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" @click="add()"
                                class="btn btn-success waves-effect waves-float waves-light">Add
                                Cistern</button>
                            <div class="d-flex align-items-center">
                                <p class="card-text me-25 mb-0">Total Cisterns: <span x-text="cantidad"></span></p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-danger" x-show="cantidad == 0">
                                <div class="flex justify-center items-center">
                                    <svg class="fill-current" viewBox="0 0 511.997 511.997"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="m482.04 271.796c-.49-5.754-4.193-10.479-9.664-12.332l-44.39-15.032 43.215-49.58c2.869-3.291 4.069-7.643 3.294-11.939-.776-4.296-3.423-7.953-7.262-10.033l-55.753-30.207c-3.643-1.973-8.193-.621-10.168 3.021-1.973 3.642-.62 8.194 3.021 10.167l54.987 29.792-46.053 52.835-145.461-78.813 26.991-30.965c3.106 1.14 6.46 1.762 9.956 1.762 10.855 0 20.33-6.003 25.293-14.86l41.679 22.582c1.136.615 2.359.907 3.566.907 2.664 0 5.243-1.422 6.602-3.929 1.973-3.642.62-8.194-3.022-10.167l-45.164-24.469c-.509-15.535-13.296-28.018-28.953-28.018-15.978 0-28.977 12.999-28.977 28.977 0 7.035 2.522 13.49 6.706 18.515l-26.484 30.384-46.921-53.829c-4.43-5.083-11.663-6.39-17.594-3.178l-18.341 9.937c-2.149-16.995-16.686-30.185-34.255-30.185-19.044 0-34.538 15.494-34.538 34.539 0 10.53 4.743 19.969 12.198 26.309l-71.784 38.893c-3.838 2.08-6.484 5.736-7.261 10.033-.775 4.296.425 8.648 3.294 11.938l43.214 49.58-44.389 15.031c-5.471 1.853-9.174 6.578-9.664 12.332s2.36 11.038 7.438 13.789l52.127 28.242v28.309c0 4.142 3.357 7.5 7.5 7.5s7.5-3.358 7.5-7.5v-20.182l72.928 39.512c3.111 1.686 6.582 2.543 10.066 2.543 2.278 0 4.563-.367 6.755-1.109l54.228-18.361v149.222l-140.781-76.278c-1.971-1.068-3.195-3.124-3.195-5.366v-32.956c0-4.142-3.357-7.5-7.5-7.5s-7.5 3.358-7.5 7.5v32.956c0 7.752 4.233 14.861 11.049 18.554l145.374 78.767c3.148 1.706 6.601 2.558 10.054 2.558s6.906-.853 10.054-2.558l145.374-78.767c6.815-3.693 11.049-10.802 11.049-18.554v-98.291l52.126-28.242c5.075-2.748 7.926-8.031 7.436-13.786zm-209.461-58.022c26.254 7.38 44.59 31.59 44.59 58.875 0 7.598-1.365 14.972-4.063 21.959l-57.107 30.941-57.107-30.941c-2.697-6.987-4.063-14.361-4.063-21.959 0-27.369 18.406-51.6 44.762-58.925 3.99-1.109 6.326-5.244 5.217-9.234-1.108-3.991-5.245-6.326-9.234-5.218-32.821 9.123-55.744 39.296-55.744 73.377 0 4.11.333 8.167.973 12.159l-68.036-36.863 143.234-77.606 143.233 77.607-68.036 36.863c.64-3.992.973-8.049.973-12.159 0-33.977-22.835-64.125-55.531-73.316-3.988-1.122-8.129 1.204-9.249 5.19-1.124 3.988 1.199 8.129 5.188 9.25zm32.174-126.254c7.707 0 13.978 6.27 13.978 13.977s-6.271 13.978-13.978 13.978-13.977-6.271-13.977-13.978 6.27-13.977 13.977-13.977zm-165.865.621c10.773 0 19.539 8.765 19.539 19.539 0 10.773-8.766 19.539-19.539 19.539s-19.538-8.765-19.538-19.539 8.765-19.539 19.538-19.539zm-5.292 53.672c1.726.267 3.493.406 5.292.406 13.978 0 26.033-8.351 31.464-20.321l27.786-15.054 46.052 52.833-145.461 78.813-46.053-52.835zm55.864 206.88c-1.604.544-3.378.391-4.864-.415l-83.967-45.493c-.022-.012-.045-.024-.067-.036l-54.614-29.59 50.378-17.059 140.99 76.39zm218.015 63.425c0 2.242-1.225 4.298-3.195 5.366l-140.781 76.278v-149.222l54.228 18.361c2.192.742 4.477 1.109 6.756 1.109 3.482 0 6.954-.858 10.065-2.543l72.928-39.512v90.163zm-80.074-63.84c-1.486.806-3.26.959-4.864.415l-47.855-16.203 140.99-76.39 50.378 17.059zm140.164-74.606c-.001 0-.002-.001-.004-.001z" />
                                            <path
                                                d="m312.088 424.684-17.205 9.322c-3.642 1.973-4.994 6.525-3.021 10.167 1.358 2.506 3.938 3.929 6.602 3.929 1.206 0 2.431-.292 3.566-.907l17.205-9.322c3.642-1.973 4.994-6.525 3.021-10.167s-6.523-4.996-10.168-3.022z" />
                                            <path
                                                d="m167.694 63.16c1.465 1.464 3.385 2.197 5.304 2.197s3.839-.732 5.304-2.197l6.187-6.187 6.187 6.187c1.465 1.464 3.385 2.197 5.304 2.197s3.839-.732 5.304-2.197c2.929-2.929 2.929-7.678 0-10.606l-6.188-6.188 6.188-6.188c2.929-2.929 2.929-7.678 0-10.606-2.93-2.929-7.678-2.929-10.607 0l-6.187 6.187-6.187-6.187c-2.93-2.929-7.678-2.929-10.607 0s-2.929 7.678 0 10.606l6.188 6.188-6.188 6.188c-2.931 2.928-2.931 7.677-.002 10.606z" />
                                            <path
                                                d="m389.734 112.29c1.465 1.464 3.385 2.197 5.304 2.197s3.839-.732 5.304-2.197l6.187-6.187 6.187 6.187c1.465 1.464 3.385 2.197 5.304 2.197s3.839-.732 5.304-2.197c2.929-2.929 2.929-7.678 0-10.606l-6.188-6.188 6.188-6.188c2.929-2.929 2.929-7.678 0-10.606-2.93-2.929-7.678-2.929-10.607 0l-6.187 6.187-6.187-6.187c-2.93-2.929-7.678-2.929-10.607 0s-2.929 7.678 0 10.606l6.188 6.188-6.188 6.188c-2.931 2.928-2.931 7.677-.002 10.606z" />
                                            <path
                                                d="m348.328 65.351c18.018 0 32.676-14.658 32.676-32.675-.001-18.018-14.659-32.676-32.676-32.676s-32.676 14.658-32.676 32.676c0 18.017 14.658 32.675 32.676 32.675zm0-50.351c9.746 0 17.676 7.929 17.676 17.676 0 9.746-7.93 17.675-17.676 17.675s-17.676-7.929-17.676-17.675c0-9.747 7.93-17.676 17.676-17.676z" />
                                            <path
                                                d="m255.152 280.515c-7.226 0-14.046 2.396-19.214 6.754-3.166 2.67-3.569 7.402-.898 10.568 2.669 3.167 7.401 3.569 10.568.899 2.43-2.049 5.906-3.222 9.545-3.222h.05c3.657.011 7.146 1.206 9.575 3.279 1.413 1.206 3.144 1.795 4.865 1.795 2.119 0 4.225-.893 5.708-2.631 2.689-3.15 2.315-7.885-.835-10.574-5.164-4.408-12.008-6.848-19.27-6.87-.031.002-.063.002-.094.002z" />
                                            <path
                                                d="m223.421 258.304h-.07c-4.146-.061-7.487 3.307-7.517 7.448-.028 4.142 3.341 7.523 7.483 7.552h.053c4.117 0 7.47-3.324 7.499-7.448.029-4.142-3.305-7.523-7.448-7.552z" />
                                            <path
                                                d="m287.179 273.15c.026.005.053.008.079.013.216.042.435.077.657.1.072.007.145.007.217.012.167.012.334.028.505.029h.053c.258 0 .513-.013.765-.039 3.787-.379 6.743-3.575 6.743-7.462 0-3.836-2.881-6.993-6.596-7.44-.034-.004-.067-.012-.101-.015-.171-.018-.346-.023-.521-.03-.08-.003-.158-.013-.239-.014h-.039c-.001 0-.003 0-.004 0h-.027-.044c-.003 0-.006 0-.009 0-4.117 0-7.435 3.324-7.464 7.448-.025 3.643 2.579 6.695 6.025 7.398z" />
                                        </g>
                                    </svg>
                                </div>
                                <div class="flex justify-center items-center">
                                    <span class="font-bold uppercase text-xl py-2">No Cisterns</span>
                                </div>
                            </div>

                            <template x-init="old()" x-show="cantidad > 0" x-for="(list, index) in cisterns" :key="list.id">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="col-md-11">
                                        <label :for="'cisterns[capacity][' + index + ']'" class="form-label">Cisterns
                                            Capacity</label>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text" id="plantNameicon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-search">
                                                    <circle cx="11" cy="11" r="8"></circle>
                                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                                </svg>
                                            </span>
                                            <input :id="'cisterns[capacity][' + index + ']'" name="cisterns[capacity][]"
                                                type="number" step="0.01" :value="list.value" class="form-control"
                                                placeholder="0.0 lt" aria-label="0.0 lt..."
                                                aria-describedby="plantNameicon">
                                        </div>
                                    </div>
                                    <div class="col ms-1">
                                        <button type="button" class="btn btn-outline-danger" x-on:click="remove(list.id)">
                                            <svg viewBox="0 0 329.26933 329"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="m194.800781 164.769531 128.210938-128.214843c8.34375-8.339844 8.34375-21.824219 0-30.164063-8.339844-8.339844-21.824219-8.339844-30.164063 0l-128.214844 128.214844-128.210937-128.214844c-8.34375-8.339844-21.824219-8.339844-30.164063 0-8.34375 8.339844-8.34375 21.824219 0 30.164063l128.210938 128.214843-128.210938 128.214844c-8.34375 8.339844-8.34375 21.824219 0 30.164063 4.15625 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921875-2.089844 15.082031-6.25l128.210937-128.214844 128.214844 128.214844c4.160156 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921874-2.089844 15.082031-6.25 8.34375-8.339844 8.34375-21.824219 0-30.164063zm0 0" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </template>

                            <div class="row">
                                <div class="col-md-12 col-sm-6 col-12 mb-2 mb-md-0">
                                    <div class="d-flex flex-row">
                                        <p>The fields can be left empty, but it is necesary that they exist to add the
                                            number of thaks.</p>
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
                                            <input type="checkbox" name="irrigation" class="form-check-input"
                                                id="customSwitch3">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <label>Well pump: </label>
                                        <div class="form-check form-check-primary form-switch">
                                            <input type="checkbox" name="wellPump" class="form-check-input"
                                                id="customSwitch3">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <label>Feed pump: </label>
                                        <div class="form-check form-check-primary form-switch">
                                            <input type="checkbox" name="feedPump" class="form-check-input"
                                                id="customSwitch3">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <label>SDI: </label>
                                        <div class="form-check form-check-primary form-switch">
                                            <input type="checkbox" name="sdi" class="form-check-input" id="customSwitch3">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <label>Chloride: </label>
                                        <div class="form-check form-check-primary form-switch">
                                            <input type="checkbox" name="chloride" class="form-check-input"
                                                id="customSwitch3">
                                        </div>
                                    </div>
                                </div>

                                <br><br>
                                <p>Remember that in this section, you will be able to customise the way in awhich the
                                    operator of this new piant will display the form to add parameters .</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Costs</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-1 row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">BOT (M3)</label>
                                <div class="col-md">
                                    <!-- Custom checkbox -->
                                    <div class="input-group input-group-merge mb-2">
                                        <span class="input-group-text">
                                            <div class="form-check">
                                                <input type="checkbox" name="botM3" class="form-check-input" id="colorRadio1">
                                                <label class="form-check-label" for="colorRadio1"></label>
                                            </div>
                                        </span>
                                        <input type="number" name="" class="form-control" placeholder="0.00"
                                            aria-label="Amount (to the nearest dollar)">
                                        <span class="input-group-text">USD/M3</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">BOT (Fixed)</label>
                                <div class="col-md">
                                    <!-- Custom checkbox -->
                                    <div class="input-group input-group-merge mb-2">
                                        <span class="input-group-text">
                                            <div class="form-check">
                                                <input type="radio" name="botFixed" class="form-check-input"
                                                    id="colorRadio1">
                                                <label class="form-check-label" for="colorRadio1"></label>
                                            </div>
                                        </span>
                                        <input type="text" name="" class="form-control" placeholder="0.00"
                                            aria-label="Amount (to the nearest dollar)">
                                        <span class="input-group-text">USD/Month</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">O&M (m3)</label>
                                <div class="col-md">
                                    <!-- Custom checkbox -->
                                    <div class="input-group input-group-merge mb-2">
                                        <span class="input-group-text">
                                            <div class="form-check">
                                                <input type="radio" name="o&mM3" class="form-check-input" id="colorRadio1">
                                                <label class="form-check-label" for="colorRadio1"></label>
                                            </div>
                                        </span>
                                        <input type="text" name="" class="form-control" placeholder="0.00"
                                            aria-label="Amount (to the nearest dollar)">
                                        <span class="input-group-text">USD/M3</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">O&M (Fixed)</label>
                                <div class="col-md">
                                    <!-- Custom checkbox -->
                                    <div class="input-group input-group-merge mb-2">
                                        <span class="input-group-text">
                                            <div class="form-check">
                                                <input type="radio" name="o&mFixed" class="form-check-input"
                                                    id="colorRadio1">
                                                <label class="form-check-label" for="colorRadio1"></label>
                                            </div>
                                        </span>
                                        <input type="text" name="" class="form-control" placeholder="0.00"
                                            aria-label="Amount (to the nearest dollar)">
                                        <span class="input-group-text">USD/Month</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Remineralisation (m3)</label>
                                <div class="col-md">
                                    <!-- Custom checkbox -->
                                    <div class="input-group input-group-merge mb-2">
                                        <span class="input-group-text">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" name="remineralisationM3"
                                                    id="colorRadio1">
                                                <label class="form-check-label" for="colorRadio1"></label>
                                            </div>
                                        </span>
                                        <input type="text" name="" class="form-control" placeholder="0.00"
                                            aria-label="Amount (to the nearest dollar)">
                                        <span class="input-group-text">USD/M3</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card col-md-6">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <div class="mb-1 row">

                            <div class="col-md-12">
                                <label for="validationDefault04" class="form-label">Years of contract</label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text" id="basic-addon-search1"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-calendar-check" viewBox="0 0 16 16">
                                            <path
                                                d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                            <path
                                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                        </svg>
                                    </span>
                                    <select class="form-select" name="yearsOfContract" id="basicSelect">
                                        <option value="">SELECT YEARS</option>
                                        @for ($i = 1; $i < 17; $i++)
                                            <option valie="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="fp-default">From</label>
                                    <input type="text" id="fp-default" name="from" class="form-control flatpickr-basic"
                                        placeholder="YYYY-MM-DD" />
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="fp-default">Till</label>
                                    <input type="text" id="fp-default" name="till" class="form-control flatpickr-basic"
                                        placeholder="YYYY-MM-DD" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="validationDefault04" class="form-label">Billing Day</label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addon-search1"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                                                <path
                                                    d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
                                                <path
                                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                            </svg>
                                        </span>
                                        <select class="form-select" id="basicSelect" name="billingDay">
                                            <option value="">SELECT BILLING DAY</option>
                                            @for ($i = 1; $i < 32; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationDefault04" class="form-label">Billing period</label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addon-search1"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
                                                <path
                                                    d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
                                                <path
                                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                            </svg>
                                        </span>
                                        <select class="form-select" id="basicSelect" name="billingPeriod">
                                            <option value="">SELECT BILLING PERIOD</option>
                                            <option value="1">Monthly</option>
                                            <option value="2">Bimonthly</option>
                                            <option value="3">Quarterly</option>}
                                            <option value="4">Biannual</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationDefault04" class="form-label">Minimum Consumption</label>
                                    <div class="input-group input-group-merge mb-2">
                                        <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 16">
                                                <path
                                                    d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z" />
                                            </svg></span>
                                        <input type="text" class="form-control" placeholder="0.00"
                                            name="minimumConsumption" aria-label="Amount (to the nearest dollar)">
                                        <span class="input-group-text">M3/MONTH</span>
                                    </div>
                                    <label>*This field can be left empty</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="#" class="dropzone dropzone-area" id="dpz-single-file">
                    <div class="dz-message"></div>
                </form>
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Plant image</h4>
                            </div>
                            <div class="card-body">
                                <form action="#" class="dropzone dropzone-area" id="dpz-single-file">
                                    <div class="dz-message">Select image</div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Handbook</h4>
                            </div>
                            <div class="card-body">
                                <form action="#" class="dropzone dropzone-area" id="dpz-multiple-files">
                                    <div class="dz-message">PDF up to 40MB.</div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="form-control-repeater">
                    <div class="row">
                        <!-- Invoice repeater -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Train #1</h4>
                                </div>
                                <div class="card-body">
                                    <form action="#" class="invoice-repeater">
                                        <div data-repeater-list="invoice">
                                            <div data-repeater-item>
                                                <div class="row d-flex align-items-end">
                                                    <div class="row">
                                                        <div class="col-md">
                                                            <label for="validationDefault04"
                                                                class="form-label">Capacity</label>
                                                            <div class="input-group input-group-merge mb-2">
                                                                <span class="input-group-text"><svg
                                                                        xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="currentColor"
                                                                        class="bi bi-basket" viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z" />
                                                                    </svg></span>
                                                                <input type="text" class="form-control"
                                                                    name="trainCapacity" placeholder="0.00"
                                                                    aria-label="Amount (to the nearest dollar)">
                                                            </div>
                                                        </div>

                                                        <div class="col-md">
                                                            <label for="validationDefault04"
                                                                class="form-label">TDS</label>
                                                            <div class="input-group input-group-merge mb-2">
                                                                <span class="input-group-text"><svg
                                                                        xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="currentColor"
                                                                        class="bi bi-wallet" viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z" />
                                                                    </svg></span>
                                                                <input type="text" name="trainTds" class="form-control"
                                                                    placeholder="0.00"
                                                                    aria-label="Amount (to the nearest dollar)">
                                                                <span class="input-group-text">ppm</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md">
                                                            <label for="validationDefault04" class="form-label">Booster
                                                                &
                                                                PX</label>
                                                            <div class="input-group mb-2">
                                                                <span class="input-group-text"
                                                                    id="basic-addon-search1"><svg
                                                                        xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="currentColor"
                                                                        class="bi bi-speedometer" viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z" />
                                                                        <path fill-rule="evenodd"
                                                                            d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z" />
                                                                    </svg>
                                                                </span>
                                                                <select class="form-select" id="basicSelect"
                                                                    name="trainBooster">
                                                                    <option value="">0</option>
                                                                    @for ($i = 1; $i < 7; $i++)
                                                                        <option value="{{ $i }}">
                                                                            {{ $i }}
                                                                        </option>
                                                                    @endfor
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="validationDefault04"
                                                                class="form-label">#Menbrane elements</label>
                                                            <div class="input-group input-group-merge mb-2">
                                                                <span class="input-group-text"><svg
                                                                        xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="currentColor"
                                                                        class="bi bi-boxes" viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z" />
                                                                    </svg></span>
                                                                <input type="text" class="form-control" name="meabrane"
                                                                    placeholder="0.00"
                                                                    aria-label="Amount (to the nearest dollar)">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="validationDefault04"
                                                                class="form-label">Menbrane active area
                                                            </label>
                                                            <div class="input-group mb-2">
                                                                <span class="input-group-text"
                                                                    id="basic-addon-search1"><svg
                                                                        xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="currentColor"
                                                                        class="bi bi-bullseye" viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                                        <path
                                                                            d="M8 13A5 5 0 1 1 8 3a5 5 0 0 1 0 10zm0 1A6 6 0 1 0 8 2a6 6 0 0 0 0 12z" />
                                                                        <path
                                                                            d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8z" />
                                                                        <path
                                                                            d="M9.5 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                                                    </svg>
                                                                </span>
                                                                <select class="form-select" id="basicSelect"
                                                                    name="membranesActiveArea">
                                                                    <option value="">SELECT TYPE</option>
                                                                    @foreach ($membranesActiveArea as $ActiveArea)
                                                                        <option value="{{ $ActiveArea->id }}">
                                                                            {{ $ActiveArea->ft2 }} Ft2
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md">
                                                        <label for="validationDefault04" class="form-label">Multimedia
                                                            Filters</label>
                                                        <div class="input-group mb-2">
                                                            <span class="input-group-text" id="basic-addon-search1"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor" class="bi bi-list-ul"
                                                                    viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd"
                                                                        d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                                                </svg>
                                                            </span>
                                                            <select class="form-select" id="basicSelect"
                                                                name="multimediaFilsters">
                                                                <option value="">SELECT</option>
                                                                @for ($i = 1; $i < 7; $i++)
                                                                    <option value="{{ $i }}">
                                                                        {{ $i }}
                                                                    </option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <label for="validationDefault04" class="form-label">Polish
                                                            Filters
                                                            Type</label>
                                                        <div class="input-group mb-2">
                                                            <span class="input-group-text" id="basic-addon-search1"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor" class="bi bi-list"
                                                                    viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd"
                                                                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                                                                </svg>
                                                            </span>
                                                            <select class="form-select" id="basicSelect"
                                                                name="polishFilters">
                                                                <option value="">SELECT TYPE</option>
                                                                @foreach ($polishFilterTypes as $PolishFilterType)
                                                                    <option value="{{ $PolishFilterType->id }}">
                                                                        {{ $PolishFilterType->microns }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <label for="validationDefault04" class="form-label">Polish
                                                            Filters
                                                            quantity</label>
                                                        <div class="input-group mb-2">
                                                            <span class="input-group-text" id="basic-addon-search1"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor" class="bi bi-list-ul"
                                                                    viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd"
                                                                        d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                                                </svg>
                                                            </span>
                                                            <select class="form-select" id="basicSelect"
                                                                name="polishQuantity">
                                                                <option value="">SELECT QUANTITY</option>
                                                                @for ($i = 1; $i < 7; $i++)
                                                                    <option value="{{ $i }}">
                                                                        {{ $i }}
                                                                    </option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2 col-12 mb-50">
                                                        <div class="mb-1">
                                                            <button class="btn btn-outline-danger text-nowrap px-1"
                                                                data-repeater-delete type="button">
                                                                <i data-feather="x" class="me-25"></i>
                                                                <span>Delete</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <button class="btn btn-icon btn-primary" type="button"
                                                    data-repeater-create>
                                                    <i data-feather="plus" class="me-25"></i>
                                                    <span>Add Train</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success col-12 waves-effect waves-float waves-light">
                                CREATE PLANT
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-bar-down" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 3.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5zM8 6a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 .708-.708L7.5 12.293V6.5A.5.5 0 0 1 8 6z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <!-- /Invoice repeater -->
                </section>
    </form>
@endsection

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/repeater/jquery.repeater.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/file-uploaders/dropzone.min.js')) }}"></script>
@endsection

@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-repeater.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-file-uploader.js')) }}"></script>
    <script>
        function cisterns() {
            return {
                cantidad: 0,
                cisterns: [],
                old() {
                    // Obtenemos los old values de cada campo y tambien los errores de cada campo.
                    var old = @json(old());
                    var errors = @json($errors->get('cisterns.capacity.*'));
                    if (old != 0) {
                        // Creamos los inputs con los errores de validación.
                        for (var i = 0; i < old.cisterns.capacity.length; i++) {
                            //Agregamos los form inputs, value.old y text de validación
                            this.cisterns.push({
                                id: this.cantidad++,
                                value: old.cisterns['capacity'][i],
                                validation: errors['cisterns.capacity.' + i] != undefined ? errors[
                                    'cisterns.capacity.' + i] : null
                            });
                        }
                    }
                },
                add() {
                    //Agregar nuevo form input
                    this.cisterns.push({
                        id: this.cantidad++,
                        value: null,
                        validation: null
                    });
                },
                remove(eliminarRegistro) {
                    if (this.cantidad > 0) {
                        this.cisterns = this.cisterns.filter(list => list.id != eliminarRegistro)
                        this.cantidad--;
                    }
                }
            }
        }
    </script>
@endsection
