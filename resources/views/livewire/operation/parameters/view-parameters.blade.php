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
                                <tr class="text">
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
                                                            <th>type</th>
                                                            <th>reading</th>
                                                            <th>Production</th>
                                                        </tr>
                                                    </thead>    
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>
                                                       
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>
                                                                        
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                                      
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
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
                                @foreach ($productWaters as $productWater)
                                    <tr>
                                        <td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>type</th>
                                                            <th>reading</th>
                                                            <th>Production</th>
                                                        </tr>
                                                    </thead>    
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>
                                                       
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>
                                                                        
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                                      
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
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
                                                            <th>type</th>
                                                            <th>reading</th>
                                                            <th>Production</th>
                                                        </tr>
                                                    </thead>    
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>
                                                       
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>
                                                                        
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                                      
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
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

                                        <td class="text-nowrap">

                                            
                                            {{ $productWater->assignedBy->name }}
                                        </td>

                                        <td>
                                            {{ $productWater->observations }}
                                        </td>

                                        <td>
                                            {{ $productWater->created_at }}
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
                                    <th>ASSIGNED</th>
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
                                                            <th>type</th>
                                                            <th>reading</th>
                                                            <th>Production</th>
                                                        </tr>
                                                    </thead>    
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>
                                                       
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>
                                                                        
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                                      
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
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
                                                            <th>type</th>
                                                            <th>reading</th>
                                                            <th>Production</th>
                                                        </tr>
                                                    </thead>    
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>
                                                       
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>
                                                                        
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                                      
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
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
                                        </td>  <td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>type</th>
                                                            <th>reading</th>
                                                            <th>Production</th>
                                                        </tr>
                                                    </thead>    
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>
                                                       
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>
                                                                        
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                                      
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
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
                                                            <th>type</th>
                                                            <th>reading</th>
                                                            <th>Production</th>
                                                        </tr>
                                                    </thead>    
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>
                                                       
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>
                                                                        
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                                      
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
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
                                        </td>  <td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>type</th>
                                                            <th>reading</th>
                                                            <th>Production</th>
                                                        </tr>
                                                    </thead>    
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>
                                                       
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>
                                                                        
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                                      
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
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
                                                            <th>type</th>
                                                            <th>reading</th>
                                                            <th>Production</th>
                                                        </tr>
                                                    </thead>    
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>
                                                       
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>
                                                                        
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                                      
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
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
                                        </td>  <td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>type</th>
                                                            <th>reading</th>
                                                            <th>Production</th>
                                                        </tr>
                                                    </thead>    
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>
                                                       
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>
                                                                        
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                                      
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
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
                                                            <th>type</th>
                                                            <th>reading</th>
                                                            <th>Production</th>
                                                        </tr>
                                                    </thead>    
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>
                                                       
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>
                                                                        
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                                      
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
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
                                        </td>  <td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>type</th>
                                                            <th>reading</th>
                                                            <th>Production</th>
                                                        </tr>
                                                    </thead>    
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>
                                                       
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>
                                                                        
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                                      
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
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
                                                            <th>type</th>
                                                            <th>reading</th>
                                                            <th>Production</th>
                                                        </tr>
                                                    </thead>    
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>
                                                       
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>
                                                                        
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                                      
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
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
                                        </td>  <td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>type</th>
                                                            <th>reading</th>
                                                            <th>Production</th>
                                                        </tr>
                                                    </thead>    
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>
                                                       
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>
                                                                        
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                                      
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
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
                                                            <th>type</th>
                                                            <th>reading</th>
                                                            <th>Production</th>
                                                        </tr>
                                                    </thead>    
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>
                                                       
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>
                                                                        
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                                      
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
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
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>type</th>
                                                            <th>reading</th>
                                                            <th>Production</th>
                                                        </tr>
                                                    </thead>    
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>
                                                       
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>
                                                                        
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                                      
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
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
                                                            <th>type</th>
                                                            <th>reading</th>
                                                            <th>Production</th>
                                                        </tr>
                                                    </thead>    
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>
                                                       
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>
                                                                        
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                                      
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
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
                                        </td>  <td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>type</th>
                                                            <th>reading</th>
                                                            <th>Production</th>
                                                        </tr>
                                                    </thead>    
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>
                                                       
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>
                                                                        
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                                      
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
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
                                                            <th>type</th>
                                                            <th>reading</th>
                                                            <th>Production</th>
                                                        </tr>
                                                    </thead>    
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>
                                                       
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>
                                                                        
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                                      
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
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
                                        </td>  <td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>type</th>
                                                            <th>reading</th>
                                                            <th>Production</th>
                                                        </tr>
                                                    </thead>    
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>
                                                       
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>
                                                                        
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                                      
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
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
                                                            <th>type</th>
                                                            <th>reading</th>
                                                            <th>Production</th>
                                                        </tr>
                                                    </thead>    
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>
                                                       
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>
                                                                        
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                                      
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
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
                                        </td>  <td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>type</th>
                                                            <th>reading</th>
                                                            <th>Production</th>
                                                        </tr>
                                                    </thead>    
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>
                                                       
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>
                                                                        
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                                      
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
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
                                                            <th>type</th>
                                                            <th>reading</th>
                                                            <th>Production</th>
                                                        </tr>
                                                    </thead>    
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>
                                                       
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>
                                                                        
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                                      
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
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
                                        </td>  <td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>type</th>
                                                            <th>reading</th>
                                                            <th>Production</th>
                                                        </tr>
                                                    </thead>    
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>
                                                       
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>
                                                                        
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                                      
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
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
                                                            <th>type</th>
                                                            <th>reading</th>
                                                            <th>Production</th>
                                                        </tr>
                                                    </thead>    
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>
                                                       
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>
                                                                        
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                                      
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
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
                                        </td>  <td>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>type</th>
                                                            <th>reading</th>
                                                            <th>Production</th>
                                                        </tr>
                                                    </thead>    
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>
                                                       
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>
                                                                        
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                                      
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
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
                                                            <th>type</th>
                                                            <th>reading</th>
                                                            <th>Production</th>
                                                        </tr>
                                                    </thead>    
                                                    <tbody>
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>
                                                       
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->type }}</span>
                                                                        
                                                                    </div>
                                                                </td>

                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->reading }}</span>
                                                                        <span class="font-small-2 text-muted">in
                                                                            24
                                                                            hours</span>
                                                                    </div>
                                                                </td>
                                                                      
                                                                <td class="text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <span>{{ $productionReading->production }}</span>
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
