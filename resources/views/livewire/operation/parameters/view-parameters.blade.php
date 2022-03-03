<div>
    {{-- Product Reading --}}
    <!-- Company Table Card -->
    <div class="row match-height">
        <div class="col-md-4">
            <h4 class="mb-1">PRODUCTO READINGS</h4>
            <div class="card card-company-table">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>PRODUCTION</th>
                                    <th>DATE/TIME</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($productionReadings as $productionReading)
                                    <tr>
                                        <td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>IN</th>
                                                            <th>IN</th>
                                                            <th>IN</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="avatar rounded">
                                                                            <div class="avatar-content">

                                                                                <img src="{{ asset('images/icons/toolbox.svg') }}"
                                                                                    alt="Toolbar svg" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span class="fw-bolder mb-25">23.4k</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span class="fw-bolder mb-25">23.4k</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar bg-light-primary me-1">
                                                    <div class="avatar-content">
                                                        <i data-feather="monitor" class="font-medium-3"></i>
                                                    </div>
                                                </div>
                                                <span>{{ $productionReading->created_at }}</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Company Table Card -->


        <!--/  TABLE PRODUCTO WATER-->
        <div class="col-md-8">
            <h4 class="mb-1">PRODUCT WATER</h4>
            <div class="card card-company-table">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>FEED LINE TO HOTEL SUPPLY</th>
                                    <th>DAYLI CHEMICAL SUPPLY</th>
                                    <th>ASSIGNED BY</th>
                                    <th>OBSERVATION</th>
                                    <th>DATE/TIME</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pretreatments as $pretreatment)
                                    <tr>
                                        <td>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>PH</th>
                                                        <th>HARDNESS</th>
                                                        <th>TDS</th>
                                                        <th>H25</th>
                                                        <th>FREE CHLORIDE</th>
                                                        <th>CHLORIDE</th>
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
                                                                        <span
                                                                            class="text-black">{{ $pretreatment->trains[$loop->index] }}</span>
                                                                    </div>
                                                                </div>

                                                                <div>
                                                                    <div class="font-small-2 text-muted">
                                                                        {{-- $pretreatment --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        {{-- <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <span>{{ $productWater->created_at }}</span>
                                                                        </div>
                                                                    </td> --}}

                                                        <td class="text-nowrap">
                                                            <div class="d-flex flex-column">
                                                                <span class="fw-bolder mb-25">23.4k</span>
                                                                <span class="font-small-2 text-muted">in 24
                                                                    hours</span>
                                                            </div>
                                                        </td>

                                                        <td>$891.2</td>

                                                        <td>$891.2</td>

                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="fw-bolder me-1">68%</span>
                                                                <i data-feather="trending-down"
                                                                    class="text-danger font-medium-1"></i>
                                                            </div>
                                                        </td>

                                                        <td>$891.2</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div>
                                                <div>
                                                    @if ($pretreatment->created_at == 'Train')
                                                        <div class="row">
                                                            <img src="{{ asset('images/icons/toolbox.svg') }}"
                                                                alt="Toolbar svg" />
                                                            <span
                                                                class="text-black">{{ $pretreatment->created_at }}</span>
                                                        </div>
                                                    @else
                                                    @endif
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar rounded">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>CACL2</th>
                                                                <th>NACO3</th>
                                                                <th>NACLO</th>
                                                                <th>ANTIS</th>
                                                                <th>NAOH</th>
                                                                <th>HCL</th>
                                                                <th>KL1</th>
                                                                <th>KL2</th>

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
                                                                                <span
                                                                                    class="text-black">{{ $pretreatment->trains[$loop->index] }}</span>
                                                                            </div>
                                                                        </div>

                                                                        <div>
                                                                            <div class="font-small-2 text-muted">
                                                                                {{-- $pretreatment --}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                {{-- <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <span>{{ $productWater->created_at }}</span>
                                                                        </div>
                                                                    </td> --}}

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span class="fw-bolder mb-25">23.4k</span>
                                                                        <span class="font-small-2 text-muted">in 24
                                                                            hours</span>
                                                                    </div>
                                                                </td>

                                                                <td>$891.2</td>

                                                                <td>$891.2</td>

                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="fw-bolder me-1">68%</span>
                                                                        <i data-feather="trending-down"
                                                                            class="text-danger font-medium-1"></i>
                                                                    </div>
                                                                </td>
                                                                <td>$891.2</td>
                                                                <td>$891.2</td>
                                                                <td>$891.2</td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                    <div>
                                                        <div>
                                                            @if ($pretreatment->created_at == 'Train')
                                                                <div class="row">
                                                                    <img src="{{ asset('images/icons/toolbox.svg') }}"
                                                                        alt="Toolbar svg" />
                                                                    <span
                                                                        class="text-black">{{ $pretreatment->created_at }}</span>
                                                                </div>
                                                            @else
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-nowrap">
                                            {{ $pretreatment->assignedBy->name }}
                                        </td>

                                        <td>
                                            {{ $pretreatment->observations }}
                                        </td>

                                        <td>
                                            {{ $pretreatment->created_at }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/  TABLE PPODUCTION WATER -->
    </div>

    <!-- Table Product Waters -->
    <div class="row match-height">
        <!-- Company Table Card -->
        <div class="col-12">
            <h4 class="mb-1">PRETREATMENT</h4>
            <div class="card card-company-table">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>TRAIN</th>
                                    @isset($plant->pretreatments->first()->well_pump)
                                        @if ($plant->pretreatments->first()->well_pump != '')
                                            <th>M.M # 1</th>
                                        @endif
                                    @endisset
                                    <th>M.M # 2</th>
                                    <th>M.M # 3</th>
                                    <th>BACKWASH</th>
                                    <th>POLISH FILTERS</th>
                                    <th>ASSIGNED BY</th>
                                    <th>OBSERVATION</th>
                                    <th>DATE/TIME</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($pretreatments as $pretreatment)
                                    <tr>
                                        <td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>TRAIN</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for ($i = 0; $i < $pretreatment->plants->trains->where('type', 'Train')->count(); $i++)
                                                            <tr>
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span class="fw-bolder mb-25">23.4k</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>IN </th>
                                                            <th>OUT</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for ($i = 0; $i < $pretreatment->plants->trains->where('type', 'Train')->count(); $i++)
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="avatar rounded">
                                                                            <div class="avatar-content">

                                                                                <img src="{{ asset('images/icons/toolbox.svg') }}"
                                                                                    alt="Toolbar svg" />
                                                                                <span
                                                                                    class="text-black">{{ $pretreatment->trains[$loop->index] }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span class="fw-bolder mb-25">23.4k</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>IN </th>
                                                            <th>OUT</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for ($i = 0; $i < $pretreatment->plants->trains->where('type', 'Train')->count(); $i++)
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="avatar rounded">
                                                                            <div class="avatar-content">

                                                                                <img src="{{ asset('images/icons/toolbox.svg') }}"
                                                                                    alt="Toolbar svg" />
                                                                                <span
                                                                                    class="text-black">{{ $pretreatment->trains[$loop->index] }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span class="fw-bolder mb-25">23.4k</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>IN </th>
                                                            <th>OUT</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for ($i = 0; $i < $pretreatment->plants->trains->where('type', 'Train')->count(); $i++)
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="avatar rounded">
                                                                            <div class="avatar-content">

                                                                                <img src="{{ asset('images/icons/toolbox.svg') }}"
                                                                                    alt="Toolbar svg" />
                                                                                <span
                                                                                    class="text-black">{{ $pretreatment->trains[$loop->index] }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span class="fw-bolder mb-25">23.4k</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>IN</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for ($i = 0; $i < $pretreatment->plants->trains->where('type', 'Train')->count(); $i++)
                                                            <tr>
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span class="fw-bolder mb-25">23.4k</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>IN</th>
                                                            <th>IN</th>
                                                            <th>IN</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for ($i = 0; $i < $pretreatment->plants->trains->where('type', 'Train')->count(); $i++)
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="avatar rounded">
                                                                            <div class="avatar-content">

                                                                                <img src="{{ asset('images/icons/toolbox.svg') }}"
                                                                                    alt="Toolbar svg" />
                                                                                <span
                                                                                    class="text-black">{{ $pretreatment->trains[$loop->index] }}</span>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span class="fw-bolder mb-25">23.4k</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span class="fw-bolder mb-25">23.4k</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>

                                        <td>
                                            {{ $pretreatment->assignedBy->name }}
                                        </td>

                                        <td>
                                            {{ $pretreatment->observations }}
                                        </td>

                                        <td>
                                            {{ $pretreatment->created_at }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/ TABLE PRODUCT WATER -->


        <!-- TABLE OPERATION-->
        <div class="col-md-12">
            <h4 class="mb-1">OPERATION</h4>
            <div class="card card-company-table">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>AMPERAGE</th>
                                    <th>FRECUENCIES</th>
                                    <th>FEED</th>
                                    <th>TDS CONCENTRATION</th>
                                    <th>FLOW</th>
                                    <th>PRESSURES</th>
                                    <th>ASSIGNED BY</th>
                                    <th>OBSERVATION</th>
                                    <th>DATE/TIME</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pretreatments as $pretreatment)
                                    <tr>
                                        <td>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>H.P</th>
                                                        <th>B1</th>
                                                        <th>B2</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @for ($i = 0; $i < $pretreatment->plants->trains->where('type', 'Train')->count(); $i++)
                                                        <tr>

                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar rounded">
                                                                        <div class="avatar-content">
                                                                            <img src="{{ asset('images/icons/toolbox.svg') }}"
                                                                                alt="Toolbar svg" />
                                                                            <span
                                                                                class="text-black">{{ $pretreatment->trains[$loop->index] }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div>
                                                                        <div class="font-small-2 text-muted">
                                                                            {{-- $pretreatment --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span class="fw-bolder mb-25">23.4k</span>
                                                                    <span class="font-small-2 text-muted">in
                                                                        24
                                                                        hours</span>
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span class="fw-bolder mb-25">23.4k</span>
                                                                    <span class="font-small-2 text-muted">in
                                                                        24
                                                                        hours</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </td>

                                        <td>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>H.P</th>
                                                        <th>B1</th>
                                                        <th>B2</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @for ($i = 0; $i < $pretreatment->plants->trains->where('type', 'Train')->count(); $i++)
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar rounded">
                                                                        <div class="avatar-content">
                                                                            <img src="{{ asset('images/icons/toolbox.svg') }}"
                                                                                alt="Toolbar svg" />
                                                                            <span
                                                                                class="text-black">{{ $pretreatment->trains[$loop->index] }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div>
                                                                        <div class="font-small-2 text-muted">
                                                                            {{-- $pretreatment --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span class="fw-bolder mb-25">23.4k</span>
                                                                    <span class="font-small-2 text-muted">in
                                                                        24
                                                                        hours</span>
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span class="fw-bolder mb-25">23.4k</span>
                                                                    <span class="font-small-2 text-muted">in
                                                                        24
                                                                        hours</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </td>

                                        <td>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>P.H</th>
                                                        <th>TEMPERATURE</th>
                                                        <th>FEED</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @for ($i = 0; $i < $pretreatment->plants->trains->where('type', 'Train')->count(); $i++)
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar rounded">
                                                                        <div class="avatar-content">
                                                                            <img src="{{ asset('images/icons/toolbox.svg') }}"
                                                                                alt="Toolbar svg" />
                                                                            <span
                                                                                class="text-black">{{ $pretreatment->trains[$loop->index] }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div>
                                                                        <div class="font-small-2 text-muted">
                                                                            {{-- $pretreatment --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span class="fw-bolder mb-25">23.4k</span>
                                                                    <span class="font-small-2 text-muted">in
                                                                        24
                                                                        hours</span>
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span class="fw-bolder mb-25">23.4k</span>
                                                                    <span class="font-small-2 text-muted">in
                                                                        24
                                                                        hours</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </td>

                                        <td>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>PERMEATE</th>
                                                        <th>REJECTION</th>
                                                        <th>REJET</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @for ($i = 0; $i < $pretreatment->plants->trains->where('type', 'Train')->count(); $i++)
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar rounded">
                                                                        <div class="avatar-content">
                                                                            <img src="{{ asset('images/icons/toolbox.svg') }}"
                                                                                alt="Toolbar svg" />
                                                                            <span
                                                                                class="text-black">{{ $pretreatment->trains[$loop->index] }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div>
                                                                        <div class="font-small-2 text-muted">
                                                                            {{-- $pretreatment --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span class="fw-bolder mb-25">23.4k</span>
                                                                    <span class="font-small-2 text-muted">in
                                                                        24
                                                                        hours</span>
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span class="fw-bolder mb-25">23.4k</span>
                                                                    <span class="font-small-2 text-muted">in
                                                                        24
                                                                        hours</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </td>


                                        <td>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>REJET</th>
                                                        <th>PERMEATE</th>
                                                        <th>B1+2</th>
                                                        <th>H.P.IN</th>
                                                        <th>H.P.OUT</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @for ($i = 0; $i < $pretreatment->plants->trains->where('type', 'Train')->count(); $i++)
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar rounded">
                                                                        <div class="avatar-content">
                                                                            <img src="{{ asset('images/icons/toolbox.svg') }}"
                                                                                alt="Toolbar svg" />
                                                                            <span
                                                                                class="text-black">{{ $pretreatment->trains[$loop->index] }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div>
                                                                        <div class="font-small-2 text-muted">
                                                                            {{-- $pretreatment --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span class="fw-bolder mb-25">23.4k</span>
                                                                    <span class="font-small-2 text-muted">in
                                                                        24
                                                                        hours</span>
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span class="fw-bolder mb-25">23.4k</span>
                                                                    <span class="font-small-2 text-muted">in
                                                                        24
                                                                        hours</span>
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span class="fw-bolder mb-25">23.4k</span>
                                                                    <span class="font-small-2 text-muted">in
                                                                        24
                                                                        hours</span>
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span class="fw-bolder mb-25">23.4k</span>
                                                                    <span class="font-small-2 text-muted">in
                                                                        24
                                                                        hours</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </td>
                                        <td>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>REJET</th>
                                                        <th>B1+2</th>
                                                        <th>PX#1</th>
                                                        <th>PX#2</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @for ($i = 0; $i < $pretreatment->plants->trains->where('type', 'Train')->count(); $i++)
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar rounded">
                                                                        <div class="avatar-content">
                                                                            <img src="{{ asset('images/icons/toolbox.svg') }}"
                                                                                alt="Toolbar svg" />
                                                                            <span
                                                                                class="text-black">{{ $pretreatment->trains[$loop->index] }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div>
                                                                        <div class="font-small-2 text-muted">
                                                                            {{-- $pretreatment --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span class="fw-bolder mb-25">23.4k</span>
                                                                    <span class="font-small-2 text-muted">in
                                                                        24
                                                                        hours</span>
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span class="fw-bolder mb-25">23.4k</span>
                                                                    <span class="font-small-2 text-muted">in
                                                                        24
                                                                        hours</span>
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span class="fw-bolder mb-25">23.4k</span>
                                                                    <span class="font-small-2 text-muted">in
                                                                        24
                                                                        hours</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </td>

                                        <td class="text-nowrap">
                                            {{ $pretreatment->assignedBy->name }}
                                        </td>

                                        <td>
                                            {{ $pretreatment->observations }}
                                        </td>

                                        <td>
                                            {{ $pretreatment->created_at }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ ´TABLE OPERATION-->
</div>
