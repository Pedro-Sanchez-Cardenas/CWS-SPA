<div>
    <div class="card bg-light-danger col-12" wire:offline>
        <div class="card-header">
            <div>
                <h2 class="fw-bolder mb-0">
                    NO TIENES CONEXIÓN A INTERNET
                </h2>
                <p class="card-text">
                    Por favor verifica tu conexión!
                </p>
            </div>
            <div class="avatar bg-danger p-50 m-0">
                <div class="avatar-content">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-wifi-off" viewBox="0 0 16 16">
                        <path
                            d="M10.706 3.294A12.545 12.545 0 0 0 8 3C5.259 3 2.723 3.882.663 5.379a.485.485 0 0 0-.048.736.518.518 0 0 0 .668.05A11.448 11.448 0 0 1 8 4c.63 0 1.249.05 1.852.148l.854-.854zM8 6c-1.905 0-3.68.56-5.166 1.526a.48.48 0 0 0-.063.745.525.525 0 0 0 .652.065 8.448 8.448 0 0 1 3.51-1.27L8 6zm2.596 1.404.785-.785c.63.24 1.227.545 1.785.907a.482.482 0 0 1 .063.745.525.525 0 0 1-.652.065 8.462 8.462 0 0 0-1.98-.932zM8 10l.933-.933a6.455 6.455 0 0 1 2.013.637c.285.145.326.524.1.75l-.015.015a.532.532 0 0 1-.611.09A5.478 5.478 0 0 0 8 10zm4.905-4.905.747-.747c.59.3 1.153.645 1.685 1.03a.485.485 0 0 1 .047.737.518.518 0 0 1-.668.05 11.493 11.493 0 0 0-1.811-1.07zM9.02 11.78c.238.14.236.464.04.66l-.707.706a.5.5 0 0 1-.707 0l-.707-.707c-.195-.195-.197-.518.04-.66A1.99 1.99 0 0 1 8 11.5c.374 0 .723.102 1.021.28zm4.355-9.905a.53.53 0 0 1 .75.75l-10.75 10.75a.53.53 0 0 1-.75-.75l10.75-10.75z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="card" x-data="{ plant: {{ $plant->trains->where('type', 'Train') }} }"
        x-init="$wire.totalStep = {{ $plant->trains->where('type', 'Train')->count() * 2 + 1 }}, $wire.trains = {{ $plant->trains->where('type', 'Train')->count() }}"
        x-cloak>
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center col-12">
                <div class="row">
                    <h3 class="font-bold" x-text="`Step ${$wire.step} for ${$wire.totalStep}`"> </h3>
                    <div x-show="$wire.step < $wire.totalStep">
                        <h4 x-show="$wire.step % 2">
                            <span class="d-flex">Pretreatment Train #<span x-text="$wire.train"></span></span>
                        </h4>

                        <h4 x-show="$wire.step % 2 == 0">
                            <span class="d-flex">Operation Train #<span x-text="$wire.train"></span></span>
                        </h4>
                    </div>

                    <h4 x-show="$wire.step === $wire.totalStep">
                        Product Water
                    </h4>
                </div>

                <div id="chart"></div> <!-- TODO: Add Chart para saber el porcentaje de llenado -->
                <div>Processing...</div>
            </div>
        </div>

        <hr>

        <form wire:submit.prevent="submit">
            {{-- /* Pretreatment Section */ --}}
            <div class="card-body" x-show="($wire.step % 2) && ($wire.step < $wire.totalStep)">
                @if ($plant->well_pump == 'yes' || $plant->feed_pump == 'yes')
                    <label class="h5">AMPERAGE</label>
                    <div class="row">
                        @if ($plant->well_pump == 'yes')
                            <div class="col-md-6">
                                <label class="form-label">Well pump</label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text" id="basic-addon-search1"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-search">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                        </svg></span>
                                    <input type="number" class="form-control" wire:model="wellPump"
                                        placeholder="0.0 A">
                                </div>
                            </div>
                        @endif

                        @if ($plant->feed_pump == 'yes')
                            <div class="col-md-6">
                                <label class="form-label">Feed pump</label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text" id="basic-addon-search1"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-search">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                        </svg></span>
                                    <input type="number" class="form-control" wire:model="feedPump"
                                        placeholder="0.0 A">
                                </div>
                            </div>
                        @endif
                    </div>
                @endif

                @if ($plant->well_pump == 'yes' || $plant->feed_pump == 'yes')
                    <label class="h5 mt-1">FREQUENCIES</label>
                    <div class="row">
                        @if ($plant->well_pump == 'yes')
                            <div class="col-md-6">
                                <label class="form-label">Well pump</label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text" id="basic-addon-search1"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-search">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                        </svg></span>
                                    <input type="number" class="form-control" wire:model="wellPump"
                                        placeholder="0.0 Hz">
                                </div>
                            </div>
                        @endif

                        @if ($plant->feed_pump == 'yes')
                            <div class="col-md-6">
                                <label class="form-label">Feed pump</label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text" id="basic-addon-search1"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-search">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                        </svg></span>
                                    <input type="number" class="form-control" wire:model="feedPump"
                                        placeholder="0.0 Hz">
                                </div>
                            </div>
                        @endif
                    </div>
                @endif

                <label class="h5 mt-1">MULTIMEDIA FILTERS</label>
                <template
                    x-for="(i in {{ $plant->trains->where('type', 'Train')->first()->multimedia_filter_quantity }}">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">IN #<span x-text="i"></span></label>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon-search1"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg></span>
                                <input type="number" class="form-control" wire:model="wellPump" placeholder="0.0 psi">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">OUT #<span x-text="i"></span></label>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon-search1"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg></span>
                                <input type="number" class="form-control" wire:model="wellPump" placeholder="0.0 psi">
                            </div>
                        </div>
                    </div>
                </template>

                <label class="form-label">BACKWASH</label>
                <div class="input-group mb-1">
                    <span class="input-group-text" id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg"
                            width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-search">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg></span>
                    <input type="number" class="form-control" wire:model="backwash" placeholder="0.0 min">
                </div>

                <label class="h5 mt-1">POLISH FILTERS</label>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">IN</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg></span>
                            <input type="number" class="form-control" wire:model="wellPump" placeholder="0.0 psi">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">OUT</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg></span>
                            <input type="number" class="form-control" wire:model="wellPump" placeholder="0.0 psi">
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th># Filter</th>
                                <th>Change?</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <template
                                x-for="(i in {{ $plant->trains->where('type', 'Train')->first()->polish_filters_quantity }}">
                                <tr>
                                    <td>Filter #<span x-text="i"></span></td>
                                    <td>
                                        <div class="form-check form-switch form-check-success">
                                            <input type="checkbox" class="form-check-input" :id="i">
                                            <label class="form-check-label" :for="i">
                                                <span class="switch-icon-left"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-check">
                                                        <polyline points="20 6 9 17 4 12"></polyline>
                                                    </svg>
                                                </span>
                                                <span class="switch-icon-right"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-x">
                                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                                    </svg>
                                                </span>
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>

                <div class="mt-2">
                    <div class="form-floating mb-0">
                        <textarea data-length="350" class="form-control char-textarea" id="observations" rows="5"
                            placeholder="Observations" style="height: 100px"></textarea>
                        <label for="observations">Observations</label>
                    </div>
                    <small class="textarea-counter-value float-end"><span class="char-count">0</span> / 350
                    </small>
                </div>
            </div>
            {{-- /* Pretreatment Section */ --}}

            {{-- /* Operation Section */ --}}
            <div class="card-body" x-show="($wire.step % 2 == 0) && ($wire.step < $wire.totalStep)">
                <label class="h5">AMPERAGE</label>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">H.P.</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg></span>
                            <input type="number" class="form-control" wire:model="hp" placeholder="0.0 A">
                        </div>
                    </div>

                    <template x-for="i in {{ $plant->trains->first()->booster_quantity }}">
                        <div class="col-md-6">
                            <label class="form-label">Booster #<span x-text="i"></span></label>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon-search1"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg></span>
                                <input type="number" class="form-control" wire:model="hp" placeholder="0.0 A">
                            </div>
                        </div>
                    </template>
                </div>

                <label class="h5 mt-1">FREQUENCIES</label>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">H.P.</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg></span>
                            <input type="number" class="form-control" wire:model="hp" placeholder="0.0 Hz">
                        </div>
                    </div>

                    <template x-for="i in {{ $plant->trains->first()->booster_quantity }}">
                        <div class="col-md-6">
                            <label class="form-label">Booster #<span x-text="i"></span></label>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon-search1"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg></span>
                                <input type="number" class="form-control" wire:model="hp" placeholder="0.0 Hz">
                            </div>
                        </div>
                    </template>
                </div>

                <label class="h5 mt-1">FEED</label>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">pH</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg></span>
                            <input type="number" class="form-control" wire:model="hp" placeholder="0.0 u. pH">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Temperature</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg></span>
                            <input type="number" class="form-control" wire:model="hp" placeholder="0.0 ºC">
                        </div>
                    </div>
                </div>

                <label class="h5 mt-1">TDS CONCENTRATION</label>
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label">Feed</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg></span>
                            <input type="number" class="form-control" wire:model="hp" placeholder="0.0 u. pH">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Permeate</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg></span>
                            <input type="number" class="form-control" wire:model="hp" placeholder="0.0 ppm TDS">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Rejection</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg></span>
                            <input type="number" class="form-control" wire:model="hp" placeholder="0.0 ppm TDS">
                        </div>
                    </div>
                </div>

                <label class="h5 mt-1">FLOW</label>
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label">Feed</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg></span>
                            <input type="number" class="form-control" wire:model="hp" placeholder="0.0 gpm">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Permeate</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg></span>
                            <input type="number" class="form-control" wire:model="hp" placeholder="0.0 gpm">
                        </div>
                    </div>

                    @if ($plant->boosterc == 'yes')
                        <div class="col-md-4">
                            <label class="form-label">Booster @for ($i = 0; $i < $plant->trains->first()->booster_quantity; $i++) {{ $i > 0 ? '+' : '' }} {{ $i + 1 }}@endfor Out</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon-search1"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg></span>
                                <input type="number" class="form-control" wire:model="hp" placeholder="0.0 gpm">
                            </div>
                        </div>
                    @endif
                </div>

                <label class="h5 mt-1">PRESSURES</label>
                <div class="row">
                    <div class="col-md">
                        <label class="form-label">H.P. in</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg></span>
                            <input type="number" class="form-control" wire:model="hp" placeholder="0.0 psi">
                        </div>
                    </div>

                    <div class="col-md">
                        <label class="form-label">H.P. out</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg></span>
                            <input type="number" class="form-control" wire:model="hp" placeholder="0.0 psi">
                        </div>
                    </div>

                    <div class="col-md">
                        <label class="form-label">Rejec</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg></span>
                            <input type="number" class="form-control" wire:model="hp" placeholder="0.0 psi">
                        </div>
                    </div>

                    @if ($plant->boosterc == 'yes')
                        <div class="col-md">
                            <label class="form-label">Booster @for ($i = 0; $i < $plant->trains->first()->booster_quantity; $i++) {{ $i > 0 ? '+' : '' }} {{ $i + 1 }}@endfor Out</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon-search1"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg></span>
                                <input type="number" class="form-control" wire:model="hp" placeholder="0.0 psi">
                            </div>
                        </div>
                    @endif

                    <div class="col-md">
                        <div class="row">
                            <template x-for="i in {{ $plant->trains->first()->booster_quantity }}">
                                <div>
                                    <label class="form-label">px #<span x-text="i"></span> Out</label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addon-search1"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-search">
                                                <circle cx="11" cy="11" r="8"></circle>
                                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                            </svg></span>
                                        <input type="number" class="form-control" wire:model="hp"
                                            placeholder="0.0 A">
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>

                <div class="mt-2">
                    <div class="form-floating mb-0">
                        <textarea data-length="350" class="form-control char-textarea" id="observations" rows="5"
                            placeholder="Observations" style="height: 100px"></textarea>
                        <label for="observations">Observations</label>
                    </div>
                    <small class="textarea-counter-value float-end"><span class="char-count">0</span> / 350
                    </small>
                </div>
            </div>
            {{-- /* Operation Section */ --}}

            {{-- /* Product Water Section */ --}}
            <div class="card-body" x-show="$wire.step === $wire.totalStep">
                <label class="h5">FEED LINE TO HOTEL SUPPLY</label>
                <div class="row">
                    <div class="col-md">
                        <label class="form-label">pH</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg></span>
                            <input type="number" class="form-control" wire:model="hp" placeholder="0.0 u. pH">
                        </div>
                    </div>

                    <div class="col-md">
                        <label class="form-label">Hardness</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg></span>
                            <input type="number" class="form-control" wire:model="hp" placeholder="0.0 ppm">
                        </div>
                    </div>

                    <div class="col-md">
                        <label class="form-label">TDS</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg></span>
                            <input type="number" class="form-control" wire:model="hp" placeholder="0.0 ppm">
                        </div>
                    </div>

                    <div class="col-md">
                        <label class="form-label">H2S</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg></span>
                            <input type="number" class="form-control" wire:model="hp" placeholder="0.0 ppm">
                        </div>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-6">
                        <label class="form-label">Free Chlorine</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg></span>
                            <input type="number" class="form-control" wire:model="hp" placeholder="0.0 u. pH">
                        </div>
                    </div>

                    @if ($plant->chloride == 'yes')
                        <div class="col-md-6">
                            <label class="form-label">Chloride</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon-search1"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg></span>
                                <input type="number" class="form-control" wire:model="hp" placeholder="0.0 ppm">
                            </div>
                        </div>
                    @endif
                </div>

                <label class="h5 mt-1">PRODUCTION READINGS</label>
                <div class="row">
                    <template x-for="i in {{ $plant->trains->where('type', 'Train')->count() }}">
                        <div class="col-md">
                            <label class="form-label">Train #<span x-text="i"></span></label>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon-search1"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg></span>
                                <input type="number" class="form-control" wire:model="hp" placeholder="0.0 m3">
                            </div>
                        </div>
                    </template>
                </div>
                <div class="row">
                    @if ($plant->irrigation == 'yes')
                        <div class="col-md-6">
                            <label class="form-label">Irrigation</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon-search1"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg></span>
                                <input type="number" class="form-control" wire:model="hp" placeholder="0.0 m3">
                            </div>
                        </div>
                    @endif

                    <div class="col-md-6">
                        <label class="form-label">Municipal</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg></span>
                            <input type="number" class="form-control" wire:model="hp" placeholder="0.0 m3">
                        </div>
                    </div>
                </div>

                <label class="h5 mt-1">TANK LEVELS</label>
                <div class="row">
                    <template x-for="i in {{ $plant->cisterns_quantity }}">
                        <div class="col-md">
                            <label class="form-label">Tank #<span x-text="i"></span></label>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon-search1"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg></span>
                                <input type="number" class="form-control" wire:model="hp" placeholder="0.0 m3">
                            </div>
                        </div>
                    </template>
                </div>

                <label class="h5 mt-1">DAILY CHEMICAL SUPPLY</label>
                <div class="row">
                    <div class="col-md">
                        <label class="form-label">Calcium chloride</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg></span>
                            <input type="number" class="form-control" wire:model="hp" placeholder="0.0 u. Kg">
                        </div>
                    </div>

                    <div class="col-md">
                        <label class="form-label">Sodium carbonate</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg></span>
                            <input type="number" class="form-control" wire:model="hp" placeholder="0.0 Kg">
                        </div>
                    </div>

                    <div class="col-md">
                        <label class="form-label">Sodium hypochloride</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg></span>
                            <input type="number" class="form-control" wire:model="hp" placeholder="0.0 Kg">
                        </div>
                    </div>

                    <div class="col-md">
                        <label class="form-label">Antiscalant</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg></span>
                            <input type="number" class="form-control" wire:model="hp" placeholder="0.0 Kg">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <label class="form-label">Sodium hydroxide</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg></span>
                            <input type="number" class="form-control" wire:model="hp" placeholder="0.0 u. Kg">
                        </div>
                    </div>

                    <div class="col-md">
                        <label class="form-label">Hydrochloric acid</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg></span>
                            <input type="number" class="form-control" wire:model="hp" placeholder="0.0 Kg">
                        </div>
                    </div>

                    <div class="col-md">
                        <label class="form-label">KL-1</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg></span>
                            <input type="number" class="form-control" wire:model="hp" placeholder="0.0 Kg">
                        </div>
                    </div>

                    <div class="col-md">
                        <label class="form-label">KL-2</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon-search1"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg></span>
                            <input type="number" class="form-control" wire:model="hp" placeholder="0.0 Kg">
                        </div>
                    </div>
                </div>

                <div class="mt-2">
                    <div class="form-floating mb-0">
                        <textarea data-length="350" class="form-control char-textarea" id="observations" rows="5"
                            placeholder="Observations" style="height: 100px"></textarea>
                        <label for="observations">Observations</label>
                    </div>
                    <small class="textarea-counter-value float-end"><span class="char-count">0</span> / 350
                    </small>
                </div>
            </div>
            {{-- /* Product Water Section */ --}}

            <div class="card-footer">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="col me-2" x-show="$wire.step > 1" x-transition.delay.150ms>
                        <button wire:click="removeStep()" type="button"
                            class="btn d-flex col-12 btn-lg btn-danger me-2 align-items-center justify-content-start">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                                <path
                                    d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
                            </svg>
                            Back
                        </button>
                    </div>

                    <div class="col">
                        <div class="row">
                            <div class="col" x-show="$wire.step < $wire.totalStep" x-transition>
                                <button wire:offline.attr="disabled" wire:click="addStep()" type="button"
                                    class="btn d-flex col-12 btn-lg btn-info align-items-center justify-content-end">
                                    Next
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                        <path
                                            d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                                    </svg>
                                </button>
                            </div>

                            <div class="col" x-show="$wire.step == $wire.totalStep" x-transition>
                                <button wire:offline.attr="disabled" type="submit"
                                    class="btn d-flex col-12 btn-lg btn-success align-items-center justify-content-end">
                                    Upload Parameters
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-file-earmark-arrow-up ms-1" viewBox="0 0 16 16">
                                        <path
                                            d="M8.5 11.5a.5.5 0 0 1-1 0V7.707L6.354 8.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 7.707V11.5z" />
                                        <path
                                            d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
