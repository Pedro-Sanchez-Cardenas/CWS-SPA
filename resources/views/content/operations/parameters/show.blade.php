<!--
    ******************************************************************
    * Author: Eduardo Gabriel Cardenas tzec.
    * Start Date: 09 de febrero del 2022
    * Finish Date: -------

    * Update Author: --------
    * Update Start Date: -------
    * Update Finish Date: 8 de febrero del 2021

    * Description: --------
    ******************************************************************
 -->
@extends('layouts/contentLayoutMaster')

@section('title', 'View Parameters - RO')

@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/dashboard-ecommerce.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}">
@endsection

@section('content')
    <section id="indexcreate">
        <div class="row match-height">
            <!-- Medal Card -->
            <div class="col-xl-4 col-md-6 col-12">
                <div class="card card-congratulation-medal">
                    <div class="card-body">
                        <h5>Congratulations 🎉 John!</h5>
                        <p class="card-text font-small-3">You have won gold medal</p>
                        <h3 class="mb-75 mt-2 pt-50">
                            <a href="#">$48.9k</a>
                        </h3>
                        <button type="button" class="btn btn-primary">View Sales</button>
                        <img src="{{ asset('images/illustration/badge.svg') }}" class="congratulation-medal"
                            alt="Medal Pic" />
                    </div>
                </div>
            </div>

            <!--/ Medal Card -->

            <!-- Statistics Card -->
            <div class="col-xl-8 col-md-6 col-12">
                <div class="card card-statistics">
                    <div class="card-header">
                        <h4 class="card-title">Statistics</h4>
                        <button class="dt-button buttons-collection btn btn-outline-secondary dropdown-toggle me-2"
                            tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="true"
                            aria-expanded="false"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-share font-small-4 me-50">
                                    <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path>
                                    <polyline points="16 6 12 2 8 6"></polyline>
                                    <line x1="12" y1="2" x2="12" y2="15"></line>
                                </svg>Export</span></button>
                    </div>
                    <div class="card-body statistics-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label" for="fp-range">DATE/TIME</label>
                                <input type="text" id="fp-range" class="form-control flatpickr-range"
                                    placeholder="YYYY-MM-DD to YYYY-MM-DD" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="fp-range">Search:</label>
                                <input type="search" class="form-control" placeholder=""
                                    aria-controls="DataTables_Table_0" />
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Statistics Card -->
            </div>

            <div class="row match-height">
                <div class="col-4">
                    <!-- Company Table Card -->
                    <h4 class="mb-1">PRODUCTION READING</h4>
                    <div class="card card-company-table">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Company</th>
                                            <th>Category</th>
                                            <th>Views</th>
                                            <th>Revenue</th>
                                            <th>Sales</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar rounded">
                                                        <div class="avatar-content">
                                                            <img src="{{ asset('images/icons/toolbox.svg') }}"
                                                                alt="Toolbar svg" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bolder">Dixons</div>
                                                        <div class="font-small-2 text-muted">meguc@ruj.io</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-light-primary me-1">
                                                        <div class="avatar-content">
                                                            <i data-feather="monitor" class="font-medium-3"></i>
                                                        </div>
                                                    </div>
                                                    <span>Technology</span>
                                                </div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bolder mb-25">23.4k</span>
                                                    <span class="font-small-2 text-muted">in 24 hours</span>
                                                </div>
                                            </td>
                                            <td>$891.2</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bolder me-1">68%</span>
                                                    <i data-feather="trending-down" class="text-danger font-medium-1"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar rounded">
                                                        <div class="avatar-content">
                                                            <img src="{{ asset('images/icons/parachute.svg') }}"
                                                                alt="Parachute svg" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bolder">Motels</div>
                                                        <div class="font-small-2 text-muted">vecav@hodzi.co.uk</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-light-success me-1">
                                                        <div class="avatar-content">
                                                            <i data-feather="coffee" class="font-medium-3"></i>
                                                        </div>
                                                    </div>
                                                    <span>Grocery</span>
                                                </div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bolder mb-25">78k</span>
                                                    <span class="font-small-2 text-muted">in 2 days</span>
                                                </div>
                                            </td>
                                            <td>$668.51</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bolder me-1">97%</span>
                                                    <i data-feather="trending-up" class="text-success font-medium-1"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar rounded">
                                                        <div class="avatar-content">
                                                            <img src="{{ asset('images/icons/brush.svg') }}"
                                                                alt="Brush svg" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bolder">Zipcar</div>
                                                        <div class="font-small-2 text-muted">davcilse@is.gov</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-light-warning me-1">
                                                        <div class="avatar-content">
                                                            <i data-feather="watch" class="font-medium-3"></i>
                                                        </div>
                                                    </div>
                                                    <span>Fashion</span>
                                                </div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bolder mb-25">162</span>
                                                    <span class="font-small-2 text-muted">in 5 days</span>
                                                </div>
                                            </td>
                                            <td>$522.29</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bolder me-1">62%</span>
                                                    <i data-feather="trending-up" class="text-success font-medium-1"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar rounded">
                                                        <div class="avatar-content">
                                                            <img src="{{ asset('images/icons/star.svg') }}"
                                                                alt="Star svg" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bolder">Owning</div>
                                                        <div class="font-small-2 text-muted">us@cuhil.gov</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-light-primary me-1">
                                                        <div class="avatar-content">
                                                            <i data-feather="monitor" class="font-medium-3"></i>
                                                        </div>
                                                    </div>
                                                    <span>Technology</span>
                                                </div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bolder mb-25">214</span>
                                                    <span class="font-small-2 text-muted">in 24 hours</span>
                                                </div>
                                            </td>
                                            <td>$291.01</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bolder me-1">88%</span>
                                                    <i data-feather="trending-up" class="text-success font-medium-1"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar rounded">
                                                        <div class="avatar-content">
                                                            <img src="{{ asset('images/icons/book.svg') }}"
                                                                alt="Book svg" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bolder">Cafés</div>
                                                        <div class="font-small-2 text-muted">pudais@jife.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-light-success me-1">
                                                        <div class="avatar-content">
                                                            <i data-feather="coffee" class="font-medium-3"></i>
                                                        </div>
                                                    </div>
                                                    <span>Grocery</span>
                                                </div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bolder mb-25">208</span>
                                                    <span class="font-small-2 text-muted">in 1 week</span>
                                                </div>
                                            </td>
                                            <td>$783.93</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bolder me-1">16%</span>
                                                    <i data-feather="trending-down" class="text-danger font-medium-1"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar rounded">
                                                        <div class="avatar-content">
                                                            <img src="{{ asset('images/icons/rocket.svg') }}"
                                                                alt="Rocket svg" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bolder">Kmart</div>
                                                        <div class="font-small-2 text-muted">bipri@cawiw.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-light-warning me-1">
                                                        <div class="avatar-content">
                                                            <i data-feather="watch" class="font-medium-3"></i>
                                                        </div>
                                                    </div>
                                                    <span>Fashion</span>
                                                </div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bolder mb-25">990</span>
                                                    <span class="font-small-2 text-muted">in 1 month</span>
                                                </div>
                                            </td>
                                            <td>$780.05</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bolder me-1">78%</span>
                                                    <i data-feather="trending-up" class="text-success font-medium-1"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar rounded">
                                                        <div class="avatar-content">
                                                            <img src="{{ asset('images/icons/speaker.svg') }}"
                                                                alt="Speaker svg" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bolder">Payers</div>
                                                        <div class="font-small-2 text-muted">luk@izug.io</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-light-warning me-1">
                                                        <div class="avatar-content">
                                                            <i data-feather="watch" class="font-medium-3"></i>
                                                        </div>
                                                    </div>
                                                    <span>Fashion</span>
                                                </div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bolder mb-25">12.9k</span>
                                                    <span class="font-small-2 text-muted">in 12 hours</span>
                                                </div>
                                            </td>
                                            <td>$531.49</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bolder me-1">42%</span>
                                                    <i data-feather="trending-up" class="text-success font-medium-1"></i>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/ Company Table Card -->
                </div>

                <!-- Company Table Card -->
                <div class="col">
                    <h4 class="mb-1">PRETREATMENT</h4>
                    <div class="card card-company-table">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>TRAIN</th>
                                            <th>M.M # 1</th>
                                            <th>M.M # 2</th>
                                            <th>M.M # 3</th>
                                            <th>BACKWASH</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar rounded">
                                                        <div class="avatar-content">
                                                            <img src="{{ asset('images/icons/toolbox.svg') }}"
                                                                alt="Toolbar svg" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bolder">Dixons</div>
                                                        <div class="font-small-2 text-muted">meguc@ruj.io</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-light-primary me-1">
                                                        <div class="avatar-content">
                                                            <i data-feather="monitor" class="font-medium-3"></i>
                                                        </div>
                                                    </div>
                                                    <span>Technology</span>
                                                </div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bolder mb-25">23.4k</span>
                                                    <span class="font-small-2 text-muted">in 24 hours</span>
                                                </div>
                                            </td>
                                            <td>$891.2</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bolder me-1">68%</span>
                                                    <i data-feather="trending-down" class="text-danger font-medium-1"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar rounded">
                                                        <div class="avatar-content">
                                                            <img src="{{ asset('images/icons/parachute.svg') }}"
                                                                alt="Parachute svg" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bolder">Motels</div>
                                                        <div class="font-small-2 text-muted">vecav@hodzi.co.uk</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-light-success me-1">
                                                        <div class="avatar-content">
                                                            <i data-feather="coffee" class="font-medium-3"></i>
                                                        </div>
                                                    </div>
                                                    <span>Grocery</span>
                                                </div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bolder mb-25">78k</span>
                                                    <span class="font-small-2 text-muted">in 2 days</span>
                                                </div>
                                            </td>
                                            <td>$668.51</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bolder me-1">97%</span>
                                                    <i data-feather="trending-up" class="text-success font-medium-1"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar rounded">
                                                        <div class="avatar-content">
                                                            <img src="{{ asset('images/icons/brush.svg') }}"
                                                                alt="Brush svg" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bolder">Zipcar</div>
                                                        <div class="font-small-2 text-muted">davcilse@is.gov</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-light-warning me-1">
                                                        <div class="avatar-content">
                                                            <i data-feather="watch" class="font-medium-3"></i>
                                                        </div>
                                                    </div>
                                                    <span>Fashion</span>
                                                </div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bolder mb-25">162</span>
                                                    <span class="font-small-2 text-muted">in 5 days</span>
                                                </div>
                                            </td>
                                            <td>$522.29</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bolder me-1">62%</span>
                                                    <i data-feather="trending-up" class="text-success font-medium-1"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar rounded">
                                                        <div class="avatar-content">
                                                            <img src="{{ asset('images/icons/star.svg') }}"
                                                                alt="Star svg" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bolder">Owning</div>
                                                        <div class="font-small-2 text-muted">us@cuhil.gov</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-light-primary me-1">
                                                        <div class="avatar-content">
                                                            <i data-feather="monitor" class="font-medium-3"></i>
                                                        </div>
                                                    </div>
                                                    <span>Technology</span>
                                                </div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bolder mb-25">214</span>
                                                    <span class="font-small-2 text-muted">in 24 hours</span>
                                                </div>
                                            </td>
                                            <td>$291.01</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bolder me-1">88%</span>
                                                    <i data-feather="trending-up" class="text-success font-medium-1"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar rounded">
                                                        <div class="avatar-content">
                                                            <img src="{{ asset('images/icons/book.svg') }}"
                                                                alt="Book svg" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bolder">Cafés</div>
                                                        <div class="font-small-2 text-muted">pudais@jife.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-light-success me-1">
                                                        <div class="avatar-content">
                                                            <i data-feather="coffee" class="font-medium-3"></i>
                                                        </div>
                                                    </div>
                                                    <span>Grocery</span>
                                                </div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bolder mb-25">208</span>
                                                    <span class="font-small-2 text-muted">in 1 week</span>
                                                </div>
                                            </td>
                                            <td>$783.93</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bolder me-1">16%</span>
                                                    <i data-feather="trending-down" class="text-danger font-medium-1"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar rounded">
                                                        <div class="avatar-content">
                                                            <img src="{{ asset('images/icons/rocket.svg') }}"
                                                                alt="Rocket svg" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bolder">Kmart</div>
                                                        <div class="font-small-2 text-muted">bipri@cawiw.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-light-warning me-1">
                                                        <div class="avatar-content">
                                                            <i data-feather="watch" class="font-medium-3"></i>
                                                        </div>
                                                    </div>
                                                    <span>Fashion</span>
                                                </div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bolder mb-25">990</span>
                                                    <span class="font-small-2 text-muted">in 1 month</span>
                                                </div>
                                            </td>
                                            <td>$780.05</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bolder me-1">78%</span>
                                                    <i data-feather="trending-up" class="text-success font-medium-1"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar rounded">
                                                        <div class="avatar-content">
                                                            <img src="{{ asset('images/icons/speaker.svg') }}"
                                                                alt="Speaker svg" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bolder">Payers</div>
                                                        <div class="font-small-2 text-muted">luk@izug.io</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-light-warning me-1">
                                                        <div class="avatar-content">
                                                            <i data-feather="watch" class="font-medium-3"></i>
                                                        </div>
                                                    </div>
                                                    <span>Fashion</span>
                                                </div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bolder mb-25">12.9k</span>
                                                    <span class="font-small-2 text-muted">in 12 hours</span>
                                                </div>
                                            </td>
                                            <td>$531.49</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bolder me-1">42%</span>
                                                    <i data-feather="trending-up" class="text-success font-medium-1"></i>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Company Table Card -->
            </div>

            <div class="row match-height">
                <!-- Company Table Card -->
                <h4 class="mb-1">PRODUCT WATER</h4>
                <div class="col-12">
                    <div class="card card-company-table">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>FEED LINE TO HOTEL SUPPLY</th>
                                            <th>DAYLI CHEMICAL SUPPLY</th>
                                            <th>ASSIGNED BY</th>
                                            <th>OBSERVATION</th>
                                            <th>DATE/TIME</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar rounded">
                                                        <div class="avatar-content">
                                                            <img src="{{ asset('images/icons/toolbox.svg') }}"
                                                                alt="Toolbar svg" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bolder">Dixons</div>
                                                        <div class="font-small-2 text-muted">meguc@ruj.io</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-light-primary me-1">
                                                        <div class="avatar-content">
                                                            <i data-feather="monitor" class="font-medium-3"></i>
                                                        </div>
                                                    </div>
                                                    <span>Technology</span>
                                                </div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bolder mb-25">23.4k</span>
                                                    <span class="font-small-2 text-muted">in 24 hours</span>
                                                </div>
                                            </td>
                                            <td>$891.2</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bolder me-1">68%</span>
                                                    <i data-feather="trending-down" class="text-danger font-medium-1"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar rounded">
                                                        <div class="avatar-content">
                                                            <img src="{{ asset('images/icons/parachute.svg') }}"
                                                                alt="Parachute svg" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bolder">Motels</div>
                                                        <div class="font-small-2 text-muted">vecav@hodzi.co.uk</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-light-success me-1">
                                                        <div class="avatar-content">
                                                            <i data-feather="coffee" class="font-medium-3"></i>
                                                        </div>
                                                    </div>
                                                    <span>Grocery</span>
                                                </div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bolder mb-25">78k</span>
                                                    <span class="font-small-2 text-muted">in 2 days</span>
                                                </div>
                                            </td>
                                            <td>$668.51</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bolder me-1">97%</span>
                                                    <i data-feather="trending-up" class="text-success font-medium-1"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar rounded">
                                                        <div class="avatar-content">
                                                            <img src="{{ asset('images/icons/brush.svg') }}"
                                                                alt="Brush svg" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bolder">Zipcar</div>
                                                        <div class="font-small-2 text-muted">davcilse@is.gov</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-light-warning me-1">
                                                        <div class="avatar-content">
                                                            <i data-feather="watch" class="font-medium-3"></i>
                                                        </div>
                                                    </div>
                                                    <span>Fashion</span>
                                                </div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bolder mb-25">162</span>
                                                    <span class="font-small-2 text-muted">in 5 days</span>
                                                </div>
                                            </td>
                                            <td>$522.29</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bolder me-1">62%</span>
                                                    <i data-feather="trending-up" class="text-success font-medium-1"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar rounded">
                                                        <div class="avatar-content">
                                                            <img src="{{ asset('images/icons/star.svg') }}"
                                                                alt="Star svg" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bolder">Owning</div>
                                                        <div class="font-small-2 text-muted">us@cuhil.gov</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-light-primary me-1">
                                                        <div class="avatar-content">
                                                            <i data-feather="monitor" class="font-medium-3"></i>
                                                        </div>
                                                    </div>
                                                    <span>Technology</span>
                                                </div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bolder mb-25">214</span>
                                                    <span class="font-small-2 text-muted">in 24 hours</span>
                                                </div>
                                            </td>
                                            <td>$291.01</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bolder me-1">88%</span>
                                                    <i data-feather="trending-up" class="text-success font-medium-1"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar rounded">
                                                        <div class="avatar-content">
                                                            <img src="{{ asset('images/icons/book.svg') }}"
                                                                alt="Book svg" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bolder">Cafés</div>
                                                        <div class="font-small-2 text-muted">pudais@jife.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-light-success me-1">
                                                        <div class="avatar-content">
                                                            <i data-feather="coffee" class="font-medium-3"></i>
                                                        </div>
                                                    </div>
                                                    <span>Grocery</span>
                                                </div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bolder mb-25">208</span>
                                                    <span class="font-small-2 text-muted">in 1 week</span>
                                                </div>
                                            </td>
                                            <td>$783.93</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bolder me-1">16%</span>
                                                    <i data-feather="trending-down" class="text-danger font-medium-1"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar rounded">
                                                        <div class="avatar-content">
                                                            <img src="{{ asset('images/icons/rocket.svg') }}"
                                                                alt="Rocket svg" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bolder">Kmart</div>
                                                        <div class="font-small-2 text-muted">bipri@cawiw.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-light-warning me-1">
                                                        <div class="avatar-content">
                                                            <i data-feather="watch" class="font-medium-3"></i>
                                                        </div>
                                                    </div>
                                                    <span>Fashion</span>
                                                </div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bolder mb-25">990</span>
                                                    <span class="font-small-2 text-muted">in 1 month</span>
                                                </div>
                                            </td>
                                            <td>$780.05</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bolder me-1">78%</span>
                                                    <i data-feather="trending-up" class="text-success font-medium-1"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar rounded">
                                                        <div class="avatar-content">
                                                            <img src="{{ asset('images/icons/speaker.svg') }}"
                                                                alt="Speaker svg" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bolder">Payers</div>
                                                        <div class="font-small-2 text-muted">luk@izug.io</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-light-warning me-1">
                                                        <div class="avatar-content">
                                                            <i data-feather="watch" class="font-medium-3"></i>
                                                        </div>
                                                    </div>
                                                    <span>Fashion</span>
                                                </div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bolder mb-25">12.9k</span>
                                                    <span class="font-small-2 text-muted">in 12 hours</span>
                                                </div>
                                            </td>
                                            <td>$531.49</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bolder me-1">42%</span>
                                                    <i data-feather="trending-up" class="text-success font-medium-1"></i>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Company Table Card -->
                <!-- Company Table Card -->
                <h4 class="mb-1">OPERATION</h4>
                <div class="col-12">
                    <div class="card card-company-table">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Amperage</th>
                                            <th>FRECUENCIES</th>
                                            <th>FEED</th>
                                            <th>TDS CONCENTRATION</th>
                                            <th>FLOW</th>
                                            <th>PRESSURES</th>
                                            <th>ASSIGNED BY</th>
                                            <th>OBSERVATIONS</th>
                                            <th>DATE/TIME</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar rounded">
                                                        <div class="avatar-content">
                                                            <img src="{{ asset('images/icons/toolbox.svg') }}"
                                                                alt="Toolbar svg" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bolder">Dixons</div>
                                                        <div class="font-small-2 text-muted">meguc@ruj.io</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-light-primary me-1">
                                                        <div class="avatar-content">
                                                            <i data-feather="monitor" class="font-medium-3"></i>
                                                        </div>
                                                    </div>
                                                    <span>Technology</span>
                                                </div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bolder mb-25">23.4k</span>
                                                    <span class="font-small-2 text-muted">in 24 hours</span>
                                                </div>
                                            </td>
                                            <td>$891.2</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bolder me-1">68%</span>
                                                    <i data-feather="trending-down" class="text-danger font-medium-1"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar rounded">
                                                        <div class="avatar-content">
                                                            <img src="{{ asset('images/icons/parachute.svg') }}"
                                                                alt="Parachute svg" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bolder">Motels</div>
                                                        <div class="font-small-2 text-muted">vecav@hodzi.co.uk</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-light-success me-1">
                                                        <div class="avatar-content">
                                                            <i data-feather="coffee" class="font-medium-3"></i>
                                                        </div>
                                                    </div>
                                                    <span>Grocery</span>
                                                </div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bolder mb-25">78k</span>
                                                    <span class="font-small-2 text-muted">in 2 days</span>
                                                </div>
                                            </td>
                                            <td>$668.51</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bolder me-1">97%</span>
                                                    <i data-feather="trending-up" class="text-success font-medium-1"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar rounded">
                                                        <div class="avatar-content">
                                                            <img src="{{ asset('images/icons/brush.svg') }}"
                                                                alt="Brush svg" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bolder">Zipcar</div>
                                                        <div class="font-small-2 text-muted">davcilse@is.gov</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-light-warning me-1">
                                                        <div class="avatar-content">
                                                            <i data-feather="watch" class="font-medium-3"></i>
                                                        </div>
                                                    </div>
                                                    <span>Fashion</span>
                                                </div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bolder mb-25">162</span>
                                                    <span class="font-small-2 text-muted">in 5 days</span>
                                                </div>
                                            </td>
                                            <td>$522.29</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bolder me-1">62%</span>
                                                    <i data-feather="trending-up" class="text-success font-medium-1"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar rounded">
                                                        <div class="avatar-content">
                                                            <img src="{{ asset('images/icons/star.svg') }}"
                                                                alt="Star svg" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bolder">Owning</div>
                                                        <div class="font-small-2 text-muted">us@cuhil.gov</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-light-primary me-1">
                                                        <div class="avatar-content">
                                                            <i data-feather="monitor" class="font-medium-3"></i>
                                                        </div>
                                                    </div>
                                                    <span>Technology</span>
                                                </div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bolder mb-25">214</span>
                                                    <span class="font-small-2 text-muted">in 24 hours</span>
                                                </div>
                                            </td>
                                            <td>$291.01</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bolder me-1">88%</span>
                                                    <i data-feather="trending-up" class="text-success font-medium-1"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar rounded">
                                                        <div class="avatar-content">
                                                            <img src="{{ asset('images/icons/book.svg') }}"
                                                                alt="Book svg" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bolder">Cafés</div>
                                                        <div class="font-small-2 text-muted">pudais@jife.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-light-success me-1">
                                                        <div class="avatar-content">
                                                            <i data-feather="coffee" class="font-medium-3"></i>
                                                        </div>
                                                    </div>
                                                    <span>Grocery</span>
                                                </div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bolder mb-25">208</span>
                                                    <span class="font-small-2 text-muted">in 1 week</span>
                                                </div>
                                            </td>
                                            <td>$783.93</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bolder me-1">16%</span>
                                                    <i data-feather="trending-down" class="text-danger font-medium-1"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar rounded">
                                                        <div class="avatar-content">
                                                            <img src="{{ asset('images/icons/rocket.svg') }}"
                                                                alt="Rocket svg" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bolder">Kmart</div>
                                                        <div class="font-small-2 text-muted">bipri@cawiw.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-light-warning me-1">
                                                        <div class="avatar-content">
                                                            <i data-feather="watch" class="font-medium-3"></i>
                                                        </div>
                                                    </div>
                                                    <span>Fashion</span>
                                                </div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bolder mb-25">990</span>
                                                    <span class="font-small-2 text-muted">in 1 month</span>
                                                </div>
                                            </td>
                                            <td>$780.05</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bolder me-1">78%</span>
                                                    <i data-feather="trending-up" class="text-success font-medium-1"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar rounded">
                                                        <div class="avatar-content">
                                                            <img src="{{ asset('images/icons/speaker.svg') }}"
                                                                alt="Speaker svg" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bolder">Payers</div>
                                                        <div class="font-small-2 text-muted">luk@izug.io</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-light-warning me-1">
                                                        <div class="avatar-content">
                                                            <i data-feather="watch" class="font-medium-3"></i>
                                                        </div>
                                                    </div>
                                                    <span>Fashion</span>
                                                </div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bolder mb-25">12.9k</span>
                                                    <span class="font-small-2 text-muted">in 12 hours</span>
                                                </div>
                                            </td>
                                            <td>$531.49</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="fw-bolder me-1">42%</span>
                                                    <i data-feather="trending-up" class="text-success font-medium-1"></i>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Company Table Card -->
            </div>
    </section>
@endsection

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/pages/dashboard-ecommerce.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
@endsection
