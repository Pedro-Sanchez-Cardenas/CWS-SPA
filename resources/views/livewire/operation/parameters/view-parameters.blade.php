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
                                            <div class="d-flex align-items-center">
                                                <div class="avatar rounded">
                                                    <div class="avatar-content">
                                                        @if ($productionReading->type == 'Train')
                                                            <div class="row">
                                                                <img src="{{ asset('images/icons/toolbox.svg') }}"
                                                                    alt="Toolbar svg" />
                                                                <span
                                                                    class="text-black">{{ $productionReading->type }}</span>
                                                            </div>
                                                        @else
                                                        @endif
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="fw-bolder">
                                                        {{ $productionReading->reading }}
                                                    </div>
                                                    <div class="font-small-2 text-muted">Production:
                                                        {{ $productionReading->production }}
                                                    </div>
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


        <!--/  TABLE PRETREATMENT -->
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
                                            <div class="d-flex align-items-center">
                                                <div class="avatar rounded">
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
                                            <div>
                                                <div class="fw-bolder">
                                                    {{ $pretreatment->well_pump }}
                                                </div>
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
                    </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/  TABLE PRETREATMENT -->



    <!-- Table Product Waters -->
    <div class="row match-height">
        <!-- Company Table Card -->
        <h4 class="mb-1">PRETREATMENT</h4>
        <div class="col-12">
            <div class="card card-company-table">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <thead>
                                    <tr>
                                        <th>TRAIN</th>
                                        @isset($plant->pretreatments->first()->well_pump)
                                            @if ($plant->pretreatments->first()->well_pump != '')
                                                <th>WATER PUMPS</th>
                                            @endif
                                        @endisset
                                        <th>M.M # 1</th>
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
                                                            <th>WELL PUMP</th>
                                                            <th>WELL PUMP FRECUENCY</th>
                                                            <th>IN</th>
                                                            <th>OUT</th>
                                                            <th>IN</th>
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

                                                                        <div>
                                                                            <div class="font-small-2 text-muted">
                                                                                {{-- $pretreatment --}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                {{--<td>
                                                                    <div class="d-flex align-items-center">
                                                                        <span>{{ $productWater->created_at }}</span>
                                                                    </div>
                                                                </td>--}}

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
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>

                                        <td>

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
        <h4 class="mb-1">OPERATION</h4>
        <div class="col-12">
            <div class="card card-company-table">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>AMPEREGE</th>
                                    <th>FRECIENCIES</th>
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
                                <tr>
                                    @foreach ($operations as $operation)
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar rounded">
                                                    <div class="avatar-content">

                                                    </div>
                                                    <div>
                                                        <div class="fw-bolder">Dixons
                                                            {{ $operation->reading }}
                                                        </div>

                                                        <div class="font-small-2 text-muted">meguc@ruj.io
                                                            {{ $operation->reading }}
                                                        </div>
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
                                                <span>{{ $operations->created_at }}</span>
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
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ ´TABLE OPERATION-->
