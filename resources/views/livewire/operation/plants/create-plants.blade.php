<div>
    <form wire:submit.prevent="store">
        <section class="card">
            <div class="card-header">
                <h4 class="card-title">Plant Data</h4>
            </div>

            <div class="card-body">

                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="plantName" class="form-label">Plant name</label>
                        <div class="input-group">
                            <span class="input-group-text @error('plantName') border border-danger @enderror" id="">
                                <svg xmlns="http://www.w3.org/2000/svg" widplantNameth="14" height="14"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-search @error('plantName') text-danger @enderror">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                            </span>
                            <input type="text" class="form-control @error('plantName') border border-danger @enderror"
                                id="plantName" wire:model="plantName" placeholder="Plant Name..."
                                aria-label="Plant Name..." aria-describedby="plantNameicon">
                        </div>
                        @error('plantName')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="col-md-6">
                        <label for="location" class="form-label">Location</label>
                        <div class="input-group">
                            <span class="input-group-text @error('location') border border-danger @enderror"
                                id="Locationicon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-geo-alt @error('location') text-danger @enderror" viewBox="0 0 16 16">
                                    <path
                                        d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                </svg>
                            </span>
                            <input type="text" class="form-control @error('location') border border-danger @enderror"
                                wire:model="location" id="location" placeholder="Location..." aria-label="Location..."
                                aria-describedby="Locationcon">
                        </div>
                        @error('location')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="row">
                    <div class="col-md mb-2">
                        <label for="plantType" class="form-label">Type</label>
                        <div class="input-group">
                            <span class="input-group-text @error('plantType') border border-danger @enderror"
                                id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-stickies" viewBox="0 0 16 16">
                                    <path
                                        d="M1.5 0A1.5 1.5 0 0 0 0 1.5V13a1 1 0 0 0 1 1V1.5a.5.5 0 0 1 .5-.5H14a1 1 0 0 0-1-1H1.5z" />
                                    <path
                                        d="M3.5 2A1.5 1.5 0 0 0 2 3.5v11A1.5 1.5 0 0 0 3.5 16h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 16 9.586V3.5A1.5 1.5 0 0 0 14.5 2h-11zM3 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V9h-4.5A1.5 1.5 0 0 0 9 10.5V15H3.5a.5.5 0 0 1-.5-.5v-11zm7 11.293V10.5a.5.5 0 0 1 .5-.5h4.293L10 14.793z"
                                        class="@error('plantType') text-danger @enderror" />
                                </svg>
                            </span>
                            <select class="form-select @error('plantType') border border-danger @enderror"
                                wire:model="plantType" id="plantType">
                                <option value="">SELECT TYPE</option>
                                @foreach ($plantTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('plantType')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md mb-2">
                        <label for="plantCountry" class="form-label">Country</label>
                        <div class="input-group">
                            <span class="input-group-text @error("plantCountry") border border-danger @enderror" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-file-text" viewBox="0 0 16 16">
                                    <path
                                        d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z" />
                                    <path
                                        d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" class="@error("plantCountry")text-danger @enderror" />
                                </svg>
                            </span>
                            <select class="form-select @error("plantCountry") border border-danger @enderror" wire:model="plantCountry" id="plantCountry">
                                <option value="">SELECT COUNTRY</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error("plantCountry")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                    </div>

                    <div class="col-md mb-2">
                        <label for="plantCurrency" class="form-label">Currency</label>
                        <div class="input-group">
                            <span class="input-group-text @error("plantCurrency") border border-danger @enderror" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-currency-exchange" viewBox="0 0 16 16">
                                    <path
                                        d="M0 5a5.002 5.002 0 0 0 4.027 4.905 6.46 6.46 0 0 1 .544-2.073C3.695 7.536 3.132 6.864 3 5.91h-.5v-.426h.466V5.05c0-.046 0-.093.004-.135H2.5v-.427h.511C3.236 3.24 4.213 2.5 5.681 2.5c.316 0 .59.031.819.085v.733a3.46 3.46 0 0 0-.815-.082c-.919 0-1.538.466-1.734 1.252h1.917v.427h-1.98c-.003.046-.003.097-.003.147v.422h1.983v.427H3.93c.118.602.468 1.03 1.005 1.229a6.5 6.5 0 0 1 4.97-3.113A5.002 5.002 0 0 0 0 5zm16 5.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0zm-7.75 1.322c.069.835.746 1.485 1.964 1.562V14h.54v-.62c1.259-.086 1.996-.74 1.996-1.69 0-.865-.563-1.31-1.57-1.54l-.426-.1V8.374c.54.06.884.347.966.745h.948c-.07-.804-.779-1.433-1.914-1.502V7h-.54v.629c-1.076.103-1.808.732-1.808 1.622 0 .787.544 1.288 1.45 1.493l.358.085v1.78c-.554-.08-.92-.376-1.003-.787H8.25zm1.96-1.895c-.532-.12-.82-.364-.82-.732 0-.41.311-.719.824-.809v1.54h-.005zm.622 1.044c.645.145.943.38.943.796 0 .474-.37.8-1.02.86v-1.674l.077.018z" class="@error("plantCurrency") text-danger @enderror" />
                                </svg>
                            </span>
                            <select class="form-select @error("plantCurrency") border border-danger @enderror" wire:model="plantCurrency" id="plantCurrency">
                                <option value="">SELECT CORRENCY</option>
                                @foreach ($currencies as $currency)
                                    <option value="{{ $currency->id }}">{{ $currency->name }} -
                                        {{ $currency->abbreviation }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error("plantCurrency")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                    </div>

                </div>
                <div class="row">
                    <div class="col-md mb-2">
                        <label for="company" class="form-label">Company</label>
                        <div class="input-group">
                            <span class="input-group-text @error("company") border border-danger @enderror" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-house-door" viewBox="0 0 16 16">
                                    <path
                                        d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" class="@error("company") text-danger @enderror" />
                                </svg>
                            </span>
                            <select class="form-select @error("company") border border-danger @enderror" wire:model="company" id="@error("plantCountry") border border-danger @enderror">
                                <option value="">SELECT MANAGER</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error("company")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>


                    <div class="col-md mb-2">
                        <label for="plantOperator" class="form-label">Operador</label>
                        <div class="input-group">
                            <span class="input-group-text @error("plantOperator") border border-danger @enderror" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"  class="@error("plantOperator") text-danger @enderror"/>
                                </svg>
                            </span>
                            <select class="form-select @error("plantOperator") border border-danger @enderror" wire:model="plantOperator" id="plantOperator">
                                <option value="">SELECT OPERATOR</option>
                                @foreach ($attendants as $attendant)
                                    <option value="{{ $attendant->id }}">{{ $attendant->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error("plantOperator")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>


                    <div class="col-md mb-2">
                        <label for="plantManager" class="form-label">Manager</label>
                        <div class="input-group">
                            <span class="input-group-text @error("plantManager") border border-danger @enderror" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd"
                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" class="@error("plantManager") text-danger @enderror"/>
                                </svg>
                            </span>
                            <select class="form-select @error("plantManager") border border-danger @enderror" wire:model="plantManager" id="plantManager">
                                <option value="">SELECT MANAGER</option>
                                @foreach ($managers as $manager)
                                    <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error("plantManager")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                    </div>
                </div>
            </div>


        </section>

        <section class="row">
            <div class="col-md-6">
                <div class="card" x-data="cisterns()" x-cloak>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="card-header">
                            <h4 class="card-title">Cisterns</h4>
                        </div>
                        <div class="me-1">
                            Total Cisterns: <span class="text-danger font-bold" x-text="cantidad"></span>
                        </div>
                    </div>

                    <div class="ms-2">
                        <button type="button" @click="add()"
                            class="btn btn-success waves-effect waves-float waves-light">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-plus" viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                            Add Cistern
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="text-danger text-center" x-show="cantidad == 0">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor"
                                    class="bi bi-basket-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717L5.07 1.243zM3.5 10.5a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3z" />
                                </svg>
                            </div>

                            <span class="h5 text-danger">No Cisterns</span>
                        </div>

                        <template x-init="old()" x-show="cantidad > 0" x-for="(list, index) in cisterns" :key="list.id">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="col-md-11">
                                    <label :for="'cisterns[capacity][' + index + ']'" class="form-label">Cisterns
                                        Capacity</label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="plantNameicon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-moisture" viewBox="0 0 16 16">
                                                <path
                                                    d="M13.5 0a.5.5 0 0 0 0 1H15v2.75h-.5a.5.5 0 0 0 0 1h.5V7.5h-1.5a.5.5 0 0 0 0 1H15v2.75h-.5a.5.5 0 0 0 0 1h.5V15h-1.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 .5-.5V.5a.5.5 0 0 0-.5-.5h-2zM7 1.5l.364-.343a.5.5 0 0 0-.728 0l-.002.002-.006.007-.022.023-.08.088a28.458 28.458 0 0 0-1.274 1.517c-.769.983-1.714 2.325-2.385 3.727C2.368 7.564 2 8.682 2 9.733 2 12.614 4.212 15 7 15s5-2.386 5-5.267c0-1.05-.368-2.169-.867-3.212-.671-1.402-1.616-2.744-2.385-3.727a28.458 28.458 0 0 0-1.354-1.605l-.022-.023-.006-.007-.002-.001L7 1.5zm0 0-.364-.343L7 1.5zm-.016.766L7 2.247l.016.019c.24.274.572.667.944 1.144.611.781 1.32 1.776 1.901 2.827H4.14c.58-1.051 1.29-2.046 1.9-2.827.373-.477.706-.87.945-1.144zM3 9.733c0-.755.244-1.612.638-2.496h6.724c.395.884.638 1.741.638 2.496C11 12.117 9.182 14 7 14s-4-1.883-4-4.267z" />
                                            </svg>
                                        </span>
                                        <input :id="'cisterns[capacity][' + index + ']'" wire:model="cisterns.capacity"
                                            type="number" step="0.01" :value="list.value" class="form-control"
                                            placeholder="0.0 lt" aria-label="0.0 lt..."
                                            aria-describedby="plantNameicon">
                                    </div>
                                </div>
                                @error("cisterns.capacity")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                <div class="col ms-1">
                                    <button type="button" class="btn btn-outline-danger" x-on:click="remove(list.id)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                            <path fill-rule="evenodd"
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </template>
                    </div>
                    <div class="card-footer">
                        <p>The fields can be left empty, but it is necesary that they exist to add the
                            number of thaks.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Personalization</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="customSwitch1"
                                        wire:model="irrigation">
                                    <label class="form-check-label" for="customSwitch1">Irrigation</label>
                                </div>

                                <br>

                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="customSwitch1"
                                        wire:model="wellPump">
                                    <label class="form-check-label" for="customSwitch1">Well Pump</label>
                                </div>

                                <br>
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="customSwitch1"
                                        wire:model="chloride">
                                    <label class="form-check-label" for="customSwitch1">Chloride</label>
                                </div>
                                <br>

                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="customSwitch1"
                                        wire:model="feedPump">
                                    <label class="form-check-label" for="customSwitch1">Feed Pump</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="customSwitch1"
                                        wire:model="sdi">
                                    <label class="form-check-label" for="customSwitch1">SDI</label>
                                </div>

                                <br>


                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <p>The fields can be left empty, but it is necesary that they exist to add the
                            number of thaks.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="row">
            <div class="col-md-6">
                <div class="card" x-data="costs()" x-cloak>
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
                                            <input type="radio" @click="action('bot1'), sumarM3(), sumarMonth()"
                                                name="bot" class="form-check-input">
                                            <label class="form-check-label" for="colorRadio1"></label>
                                        </div>
                                    </span>
                                    <input type="number" @keyup="sumarM3()" disabled wire:model="botM3" id="botM3"
                                        class="form-control ps-1" placeholder="0.00"
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
                                            <input type="radio" @click="action('bot2'), sumarM3(), sumarMonth()"
                                                name="bot" class="form-check-input">
                                            <label class="form-check-label" for="colorRadio1"></label>
                                        </div>
                                    </span>
                                    <input type="number" @keyup="sumarMonth()" disabled wire:model="botFixed"
                                        id="botFixed" class="form-control ps-1" placeholder="0.00"
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
                                            <input type="radio" @click="action('o&m1'), sumarM3(), sumarMonth()"
                                                name="o&m" class="form-check-input">
                                            <label class="form-check-label" for="colorRadio1"></label>
                                        </div>
                                    </span>
                                    <input type="number" @keyup="sumarM3()" disabled wire:model="oymM3" id="o&mM3"
                                        class="form-control ps-1" placeholder="0.00"
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
                                            <input type="radio" @click="action('o&m2'), sumarM3(), sumarMonth()"
                                                name="o&m" class="form-check-input">
                                            <label class="form-check-label" for="colorRadio1"></label>
                                        </div>
                                    </span>
                                    <input type="number" @keyup="sumarMonth()" disabled wire:model="oymFixed"
                                        id="o&mFixed" class="form-control ps-1" placeholder="0.00"
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
                                            <input type="checkbox" @click="action('remi'), sumarM3(), sumarMonth()"
                                                id="radioRemi" class="form-check-input">
                                            <label class="form-check-label" for="colorRadio1"></label>
                                        </div>
                                    </span>
                                    <input type="number" @keyup="sumarM3()" disabled wire:model="remineralisationM3"
                                        id="remi" class="form-control ps-1" placeholder="0.00"
                                        aria-label="Amount (to the nearest dollar)">
                                    <span class="input-group-text">USD/M3</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th>Total USD/M3: $<span class="text-danger" x-text="sumM3"></span></th>
                                        <th>Total USD/Month: $<span class="text-danger" x-text="sumMonth"></span>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Contract</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <label for="yearsOfContract" class="form-label">Years of contract</label>
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
                                <select class="form-select" wire:model="yearsOfContract" id="yearsOfContract">
                                    <option value="">SELECT YEARS</option>
                                    @for ($i = 1; $i < 17; $i++)
                                        <option valie="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-6">
                                <label class="form-label" for="from">From</label>
                                <input type="text" id="from" wire:model="from" class="form-control flatpickr-basic"
                                    placeholder="YYYY-MM-DD" />
                            </div>

                            <div class="col-6">
                                <label class="form-label" for="till">Till</label>
                                <input type="text" id="till" wire:model="till" class="form-control flatpickr-basic"
                                    placeholder="YYYY-MM-DD" />
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-6">
                                <label for="billingDay" class="form-label">Billing Day</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon-search1"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                                            <path
                                                d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
                                            <path
                                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                        </svg>
                                    </span>
                                    <select class="form-select" id="billingDay" wire:model="billingDay">
                                        <option value="">SELECT BILLING DAY</option>
                                        @for ($i = 1; $i < 32; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="billingPeriod" class="form-label">Billing period</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon-search1"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
                                            <path
                                                d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
                                            <path
                                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                        </svg>
                                    </span>
                                    <select class="form-select" id="billingPeriod" wire:model="billingPeriod">
                                        <option value="">SELECT BILLING PERIOD</option>
                                        <option value="1">Monthly</option>
                                        <option value="2">Bimonthly</option>
                                        <option value="3">Quarterly</option>}
                                        <option value="4">Biannual</option>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label for="minimumConsumption" class="form-label">Minimum Consumption</label>
                            <div class="input-group input-group-merge mb-2">
                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 16">
                                        <path
                                            d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z" />
                                    </svg></span>
                                <input type="number" class="form-control" placeholder="0.00" id="minimumConsumption"
                                    wire:model="minimumConsumption" aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-text">M3/MONTH</span>
                            </div>
                            <label>*This field can be left empty</label>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Plant image</h4>
                    </div>

                    <div class="card-body">
                        <div action="#" class="dropzone dropzone-area dz-clickable" id="dpz-single-file">
                            <div class="dz-message">Drop files here or click to upload.</div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Handbook</h4>
                    </div>

                    <div class="card-body">
                        <div action="#" class="dropzone dropzone-area" id="dpz-multiple-files">
                            <div class="dz-message">PDF up to 40MB.</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="form-control-repeater">
            <div class="row">
                <!-- Invoice repeater -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Train #1</h4>
                        </div>

                        <div class="card-body">
                            <div action="#" class="invoice-repeater">
                                <div data-repeater-list="invoice">
                                    <div data-repeater-item>
                                        <div class="row d-flex align-items-end">
                                            <div class="row">
                                                <div class="col-md">
                                                    <label for="trainCapacity" class="form-label">Capacity</label>
                                                    <div class="input-group input-group-merge mb-2">
                                                        <span class="input-group-text"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor" class="bi bi-basket"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z" />
                                                            </svg></span>
                                                        <input type="number" class="form-control"
                                                            wire:model="trainCapacity" id="trainCapacity"
                                                            placeholder="0.00"
                                                            aria-label="Amount (to the nearest dollar)">
                                                    </div>
                                                </div>

                                                <div class="col-md">
                                                    <label for="trainTds" class="form-label">TDS</label>
                                                    <div class="input-group input-group-merge mb-2">
                                                        <span class="input-group-text"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor" class="bi bi-wallet"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z" />
                                                            </svg></span>
                                                        <input type="number" wire:model="trainTds"
                                                            class="form-control" id="trainTds" placeholder="0.00"
                                                            aria-label="Amount (to the nearest dollar)">
                                                        <span class="input-group-text">ppm</span>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <label for="trainBooster" class="form-label">Booster
                                                        &
                                                        PX</label>
                                                    <div class="input-group mb-2">
                                                        <span class="input-group-text" id="basic-addon-search1"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-speedometer" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z" />
                                                            </svg>
                                                        </span>
                                                        <select class="form-select" id="trainBooster"
                                                            wire:model="trainBooster">
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
                                                    <label for="meabrane" class="form-label">#Menbrane
                                                        elements</label>
                                                    <div class="input-group input-group-merge mb-2">
                                                        <span class="input-group-text"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor" class="bi bi-boxes"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z" />
                                                            </svg></span>
                                                        <input type="number" class="form-control"
                                                            wire:model="trainsElements" placeholder="0.00"
                                                            aria-label="Amount (to the nearest dollar)" id="meabrane">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="membranesActiveArea" class="form-label">Menbrane
                                                        active area
                                                    </label>
                                                    <div class="input-group mb-2">
                                                        <span class="input-group-text" id="basic-addon-search1"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor" class="bi bi-bullseye"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                                <path
                                                                    d="M8 13A5 5 0 1 1 8 3a5 5 0 0 1 0 10zm0 1A6 6 0 1 0 8 2a6 6 0 0 0 0 12z" />
                                                                <path
                                                                    d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8z" />
                                                                <path d="M9.5 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                                            </svg>
                                                        </span>
                                                        <select class="form-select" id="trains.mArea"
                                                            wire:model="membranesActiveAre">
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
                                                <label for="multimediaFilsters" class="form-label">Multimedia
                                                    Filters</label>
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text" id="basic-addon-search1"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-list-ul"
                                                            viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                                        </svg>
                                                    </span>
                                                    <select class="form-select" id="multimediaFilsters"
                                                        wire:model="multimediaFilsters">
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
                                                <label for="polishFilters" class="form-label">Polish
                                                    Filters
                                                    Type</label>
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text" id="basic-addon-search1"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-list"
                                                            viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                                                        </svg>
                                                    </span>
                                                    <select class="form-select" id="polishFilters"
                                                        wire:model="polishFilters">
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
                                                <label for="polishQuantity" class="form-label">Polish
                                                    Filters
                                                    quantity</label>
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text" id="basic-addon-search1"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-list-ul"
                                                            viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                                        </svg>
                                                    </span>
                                                    <select class="form-select" id="polishQuantity"
                                                        wire:model="polishQuantity">
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
                                        <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                            <i data-feather="plus" class="me-25"></i>
                                            <span>Add Train</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button wire:offline.attr="disabled" type="submit"
                                class="btn btn-success col-12 waves-effect waves-float waves-light">
                                <div class="d-flex justify-content-center align-items-center font-weight-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-plus-lg" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                                    </svg>
                                    <span>CREATE PLANT</span>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Invoice repeater -->
        </section>
    </form>
</div>
