<div>
    <div class="card" x-data="parameters()" x-cloak>
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center col-12">
                <div class="row">
                    <h3>Step <span class="text-danger" x-text="step"></span> for <span class="text-danger"
                            x-text="totalStep"></span></h3>
                    <h3>Trains: <span class="text-danger" x-text="trains"></span></h3>

                    <div x-show="step < totalStep">
                        <h4 x-show="step % 2">
                            <span class="d-flex">Pretreatment Train #<span x-text="train"></span></span>
                        </h4>

                        <h4 x-show="step % 2 == 0">
                            <span class="d-flex">Operation Train #<span x-text="train"></span></span>
                        </h4>
                    </div>

                    <h4 x-show="step === totalStep">
                        Product Water
                    </h4>
                </div>

                <div id="chart"></div> <!-- TODO: Add Chart para saber el porcentaje de llenado -->
                <div>Barra de progreso...</div>
            </div>
        </div>
        @if ($errors->any())
            <div class="card bg-light-warning mx-3">
                <div class="card-header">
                    <div>
                        <h2 class="fw-bolder mb-0 me-2">
                            You have some errors in the form
                        </h2>
                        <p class="card-text">
                            Please check your form!
                        </p>
                    </div>
                    <div class="avatar bg-warning p-50 m-0">
                        <div class="avatar-content">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-info-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path
                                    d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <hr>

        <form class="g-3 needs-validation" novalidate wire:submit.prevent="store">
            {{-- Formulario que se repite segun el numero de trenes --}}
            @for ($pre = 1; $pre <= $plant->trains->where('type', 'Train')->count() * 2; $pre++)
                @if ($pre % 2 != 0)
                    {{-- /* Pretreatment Section */ --}}
                    <div class="card-body" x-show.transition.in="step === {{ $pre }}"
                        x-id="['pretreatment']">
                        @if ($plant->well_pump == 'yes' || $plant->feed_pump == 'yes')
                            <label class="h5">AMPERAGE</label>
                            <div class="row">
                                @if ($plant->well_pump == 'yes')
                                    <div class="col-md-6 mb-2">
                                        <label :for="$id('pretreatment', 'wellPump-amp')" class="form-label">Well
                                            pump</label>
                                        <div class="input-group">
                                            <span
                                                class="input-group-text @error("pump.well.$pre") border border-danger @enderror"
                                                id="basic-addon-search1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor"
                                                    class="bi bi-gear-fill @error("pump.well.$pre") text-danger @enderror"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                                </svg>
                                            </span>
                                            <input type="number"
                                                class="form-control @error("pump.well.$pre") border border-danger @enderror"
                                                :id="$id('pretreatment', 'wellPump-amp')"
                                                wire:model.lazy="pump.well.{{ $pre }}" placeholder="0.0 A">
                                        </div>
                                        @error("pump.well.$pre")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endif

                                @if ($plant->feed_pump == 'yes')
                                    <div class="col-md-6 mb-2">
                                        <label :for="$id('pretreatment', 'feedPump-amp')" class="form-label">Feed
                                            pump</label>
                                        <div class="input-group">
                                            <span
                                                class="input-group-text @error("pump.feed.$pre") border border-danger @enderror"
                                                id="basic-addon-search1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor"
                                                    class="bi bi-gear-fill @error("pump.feed.$pre") text-danger @enderror"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                                </svg>
                                            </span>
                                            <input type="number"
                                                class="form-control @error("pump.feed.$pre") border border-danger @enderror"
                                                :id="$id('pretreatment', 'feedPump-amp')"
                                                wire:model.lazy="pump.feed.{{ $pre }}" placeholder="0.0 A">
                                        </div>
                                        @error("pump.feed.$pre")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endif
                            </div>
                        @endif

                        @if ($plant->well_pump == 'yes' || $plant->feed_pump == 'yes')
                            <label class="h5 mt-1">FREQUENCIES</label>
                            <div class="row">
                                @if ($plant->well_pump == 'yes')
                                    <div class="col-md-6 mb-2">
                                        <label :for="$id('pretreatment', 'wellPump-fre')" class="form-label">Well
                                            pump</label>
                                        <div class="input-group">
                                            <span
                                                class="input-group-text @error("pump.wellf.$pre") border border-danger @enderror"
                                                id="basic-addon-search1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor"
                                                    class="bi bi-gear-fill @error("pump.wellf.$pre") text-danger @enderror"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                                </svg>
                                            </span>
                                            <input type="number"
                                                class="form-control @error("pump.wellf.$pre") border border-danger @enderror"
                                                :id="$id('pretreatment', 'wellPump-fre')"
                                                wire:model.lazy="pump.wellf.{{ $pre }}" placeholder="0.0 A">
                                        </div>
                                        @error("pump.wellf.$pre")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endif

                                @if ($plant->feed_pump == 'yes')
                                    <div class="col-md-6 mb-2">
                                        <label :for="$id('pretreatment', 'feedPump-fre')" class="form-label">Feed
                                            pump</label>
                                        <div class="input-group">
                                            <span
                                                class="input-group-text @error("pump.feedf.$pre") border border-danger @enderror"
                                                id="basic-addon-search1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor"
                                                    class="bi bi-gear-fill @error("pump.feedf.$pre") text-danger @enderror"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                                </svg>
                                            </span>
                                            <input type="number"
                                                class="form-control @error("pump.feedf.$pre") border border-danger @enderror"
                                                :id="$id('pretreatment', 'feedPump-fre')"
                                                wire:model.lazy="pump.feedf.{{ $pre }}" placeholder="0.0 A">
                                        </div>
                                        @error("pump.feedf.$pre")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endif
                            </div>
                        @endif

                        <label class="h5 mt-1">MULTIMEDIA FILTERS</label>
                        @for ($i = 1; $i <= $plant->trains->where('type', 'Train')->first()->multimedia_filter_quantity; $i++)
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label :for="$id('pretreatment', 'mm-in-{{ $i }}')"
                                        class="form-label">IN #{{ $i }}</label>
                                    <div class="input-group">
                                        <span
                                            class="input-group-text @error("mm.in.$pre.$i") border border-danger @endif"
                                            id="basic-addon-search1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor"
                                                class="bi bi-gear-fill @error("mm.in.$pre.$i") text-danger @endif"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                            </svg>
                                        </span>
                                        <input type="number"
                                            class="form-control @error("mm.in.$pre.$i") border border-danger @endif"
                                            :id="$id('pretreatment', 'mm-in-{{ $i }}')"
                                            wire:model.lazy="mm.in.{{ $pre }}.{{ $i }}"
                                            placeholder="0.0 psi">
                                    </div>
                                    @error("mm.in.$pre.$i")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label :for="$id('pretreatment', 'mm-out-{{ $i }}')"
                                        class="form-label">OUT #{{ $i }}</label>
                                    <div class="input-group">
                                        <span
                                            class="input-group-text @error("mm.out.$pre.$i") border border-danger @endif"
                                            id="basic-addon-search1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor"
                                                class="bi bi-gear-fill @error("mm.out.$pre.$i") text-danger @endif"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                            </svg>
                                        </span>
                                        <input type="number"
                                            class="form-control @error("mm.out.$pre.$i") border border-danger @endif"
                                            :id="$id('pretreatment', 'mm-out-{{ $i }}')"
                                            wire:model.lazy="mm.out.{{ $pre }}.{{ $i }}"
                                            placeholder="0.0 psi">
                                    </div>
                                    @error("mm.out.$pre.$i")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        @endfor

                        <label :for="$id('pretreatment', 'backwash')" class="form-label">BACKWASH</label>
                        <div class="mb-1">
                            <div class="input-group">
                                <span class="input-group-text @error("backwash.$pre") border border-danger @endif"
                                    id="basic-addon-search1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-gear-fill @error("backwash.$pre") text-danger @endif"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                    </svg>
                                </span>
                                <input type="number"
                                    class="form-control @error("backwash.$pre") border border-danger @endif"
                                    :id="$id('pretreatment', 'backwash')"
                                    wire:model.lazy="backwash.{{ $pre }}" placeholder="0.0 min">
                            </div>
                            @error("backwash.$pre")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <label class="h5 mt-1">POLISH FILTERS</label>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label :for="$id('pretreatment', 'pf-in')" class="form-label">IN</label>
                                <div class="input-group">
                                    <span class="input-group-text @error("pf.in.$pre") border border-danger @endif"
                                        id="basic-addon-search1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor"
                                            class="bi bi-gear-fill @error("pf.in.$pre") text-danger @endif"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                        </svg>
                                    </span>
                                    <input type="number"
                                        class="form-control @error("pf.in.$pre") border border-danger @endif"
                                        :id="$id('pretreatment', 'pf-in')" wire:model.lazy="pf.in.{{ $pre }}"
                                        placeholder="0.0 psi">
                                </div>
                                @error("pf.in.$pre")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-2">
                                <label :for="$id('pretreatment', 'pf-out')" class="form-label">OUT</label>
                                <div class="input-group">
                                    <span class="input-group-text @error("pf.out.$pre") border border-danger @endif"
                                        id="basic-addon-search1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor"
                                            class="bi bi-gear-fill @error("pf.out.$pre") text-danger @endif"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                        </svg>
                                    </span>
                                    <input type="number"
                                        class="form-control @error("pf.out.$pre") border border-danger @endif"
                                        :id="$id('pretreatment', 'pf-out')"
                                        wire:model.lazy="pf.out.{{ $pre }}" placeholder="0.0 psi">
                                </div>
                                @error("pf.out.$pre")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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
                                    @for ($i = 1; $i <= $plant->trains->where('type', 'Train')->first()->polish_filters_quantity; $i++)
                                        <tr>
                                            <td>Filter # {{ $i }}</td>
                                            <td>
                                                <div class="form-check form-switch form-check-success">
                                                    <input type="checkbox" class="form-check-input"
                                                        wire:model.lazy="filtros.{{ $i }}">
                                                    <label class="form-check-label">
                                                        <span class="switch-icon-left">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                height="14" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-check">
                                                                <polyline points="20 6 9 17 4 12"></polyline>
                                                            </svg>
                                                        </span>
                                                        <span class="switch-icon-right"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="14"
                                                                height="14" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-x">
                                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                                            </svg>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            <div class="form-floating mb-0">
                                <textarea data-length="350" class="form-control char-textarea"
                                    :id="$id('pretreatment', 'observations')"
                                    wire:model.lazy="observations.{{ $pre }}" rows="5"
                                    placeholder="Observations" style="height: 100px"></textarea>
                                <label for="observations">Observations</label>
                            </div>
                            <small class="textarea-counter-value float-end"><span class="char-count">0</span> /
                                350
                            </small>
                            @error("observations.$pre")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- /* Pretreatment Section */ --}}
                @else
                    {{-- /* Operation Section */ --}}
                    <div class="card-body" x-show.transition.in="step === {{ $pre }}"
                        x-id="['operation']">
                        <label class="h5">AMPERAGE</label>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label :for="$id('operation', 'hp-amp')" class="form-label">H.P.</label>
                                <div class="input-group">
                                    <span class="input-group-text @error("hp.amp.$pre") border border-danger @endif"
                                        id="basic-addon-search1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor"
                                            class="bi bi-wrench-adjustable @error("hp.amp.$pre") text-danger @endif"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                            <path
                                                d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                        </svg>
                                    </span>
                                    <input type="number"
                                        class="form-control @error("hp.amp.$pre") border border-danger @endif"
                                        :id="$id('operation', 'hp-amp')" wire:model.lazy="hp.amp.{{ $pre }}"
                                        placeholder="0.0 A">
                                </div>
                                @error("hp.amp.$pre")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            @for ($i = 1; $i < $plant->trains->first()->booster_quantity; $i++)
                                <div class="col-md-6 mb-2">
                                    <label :for="$id('operation', 'booster-amp')" class="form-label">Booster
                                        #{{ $i }}</label>
                                    <div class="input-group">
                                        <span
                                            class="input-group-text @error("booster.amp.$pre") border border-danger @endif"
                                            id="basic-addon-search1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor"
                                                class="bi bi-asterisk @error("booster.amp.$pre") text-danger @endif"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z" />
                                            </svg>
                                        </span>
                                        <input type="number"
                                            class="form-control @error("booster.amp.$pre") border border-danger @endif"
                                            wire:model.lazy="booster.amp.{{ $pre }}"
                                            :id="$id('operation', 'booster-amp')"
                                            wire:model.lazy="booster.amp.{{ $pre }}" placeholder="0.0 A">
                                    </div>
                                    @error("booster.amp.$pre")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endfor
                        </div>

                        <label class="h5 mt-1">FREQUENCIES</label>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label :for="$id('operation', 'hp-fre')" class="form-label">H.P.</label>
                                <div class="input-group">
                                    <span class="input-group-text @error("hp.fre.$pre") border border-danger @endif"
                                        id="basic-addon-search1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor"
                                            class="bi bi-wrench-adjustable @error("hp.fre.$pre") text-danger @endif"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                            <path
                                                d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                        </svg>
                                    </span>
                                    <input type="number"
                                        class="form-control @error("hp.fre.$pre") border border-danger @endif"
                                        :id="$id('operation', 'hp-fre')" wire:model.lazy="hp.fre.{{ $pre }}"
                                        placeholder="0.0 Hz">
                                </div>
                                @error("hp.fre.$pre")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            @for ($i = 1; $i < $plant->trains->first()->booster_quantity; $i++)
                                <div class="col-md-6 mb-2">
                                    <label :for="$id('operation', 'booster-fre')" class="form-label">Booster #
                                        {{ $i }}</label>
                                    <div class="input-group">
                                        <span
                                            class="input-group-text @error("booster.fre.$pre") border border-danger @endif"
                                            id="basic-addon-search1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor"
                                                class="bi bi-wrench-adjustable @error("booster.fre.$pre") text-danger @endif"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                                <path
                                                    d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                            </svg>
                                        </span>
                                        <input type="number"
                                            class="form-control @error("booster.fre.$pre") border border-danger @endif"
                                            :id="$id('operation', 'booster-fre')"
                                            wire:model.lazy="booster.fre.{{ $pre }}" placeholder="0.0 Hz">
                                    </div>
                                    @error("booster.fre.$pre")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endfor
                        </div>

                        <label class="h5 mt-1">FEED</label>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label :for="$id('operation', 'ph-ope')" class="form-label">pH</label>
                                <div class="input-group">
                                    <span class="input-group-text @error("ph.ope.$pre") border border-danger @endif"
                                        id="basic-addon-search1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor"
                                            class="bi bi-wrench-adjustable @error("ph.ope.$pre") text-danger @endif"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                            <path
                                                d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                        </svg>
                                    </span>
                                    <input type="number"
                                        class="form-control @error("ph.ope.$pre") border border-danger @endif"
                                        :id="$id('operation', 'ph-ope')" wire:model.lazy="ph.ope.{{ $pre }}"
                                        placeholder="0.0 Hz">
                                </div>
                                @error("ph.ope.$pre")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-2">
                                <label :for="$id('operation', 'temperature')"
                                    class="form-label">Temperature</label>
                                <div class="input-group">
                                    <span
                                        class="input-group-text @error("temperature.$pre") border border-danger @endif"
                                        id="basic-addon-search1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor"
                                            class="bi bi-thermometer-half @error("temperature.$pre") text-danger @endif"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 12.5a1.5 1.5 0 1 1-2-1.415V6.5a.5.5 0 0 1 1 0v4.585a1.5 1.5 0 0 1 1 1.415z" />
                                            <path
                                                d="M5.5 2.5a2.5 2.5 0 0 1 5 0v7.55a3.5 3.5 0 1 1-5 0V2.5zM8 1a1.5 1.5 0 0 0-1.5 1.5v7.987l-.167.15a2.5 2.5 0 1 0 3.333 0l-.166-.15V2.5A1.5 1.5 0 0 0 8 1z" />
                                        </svg>
                                    </span>
                                    <input type="number"
                                        class="form-control @error("temperature.$pre") border border-danger @endif"
                                        :id="$id('operation', 'temperature')"
                                        wire:model.lazy="temperature.{{ $pre }}" placeholder="0.0 ºC">
                                </div>
                                @error("temperature.$pre")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <label class="h5 mt-1">TDS CONCENTRATION</label>
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <label :for="$id('operation', 'feed-ope')" class="form-label">Feed</label>
                                <div class="input-group">
                                    <span class="input-group-text @error("feed.ope.$pre") border border-danger @endif"
                                        id="basic-addon-search1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor"
                                            class="bi bi-wrench-adjustable @error("feed.ope.$pre") text-danger @endif"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                            <path
                                                d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                        </svg>
                                    </span>
                                    <input type="number"
                                        class="form-control @error("feed.ope.$pre") border border-danger @endif"
                                        :id="$id('operation', 'feed-ope')"
                                        wire:model.lazy="feed.ope.{{ $pre }}" placeholder="0.0 u. pH">
                                </div>
                                @error("feed.ope.$pre")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-2">
                                <label :for="$id('operation', 'permeate-ope')" class="form-label">Permeate</label>
                                <div class="input-group">
                                    <span
                                        class="input-group-text @error("permeate.ope.$pre") border border-danger @endif"
                                        id="basic-addon-search1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor"
                                            class="bi bi-wrench-adjustable @error("permeate.ope.$pre") text-danger @endif"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                            <path
                                                d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                        </svg>
                                    </span>
                                    <input type="number"
                                        class="form-control @error("permeate.ope.$pre") border border-danger @endif"
                                        :id="$id('operation', 'permeate-ope')"
                                        wire:model.lazy="permeate.ope.{{ $pre }}" placeholder="0.0 ppm TDS">
                                </div>
                                @error("permeate.ope.$pre")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-2">
                                <label :for="$id('operation', 'rejection')" class="form-label">Rejection</label>
                                <div class="input-group">
                                    <span
                                        class="input-group-text @error("rejection.$pre") border border-danger @endif"
                                        id="basic-addon-search1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor"
                                            class="bi bi-wrench-adjustable @error("rejection.$pre") text-danger @endif"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                            <path
                                                d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                        </svg>
                                    </span>
                                    <input type="number"
                                        class="form-control @error("rejection.$pre") border border-danger @endif"
                                        :id="$id('operation', 'rejection')"
                                        wire:model.lazy="rejection.{{ $pre }}" placeholder="0.0 ppm TDS">
                                </div>
                                @error("rejection.$pre")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <label class="h5 mt-1">FLOW</label>
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <label :for="$id('operation', 'feed-flo')" class="form-label">Feed</label>
                                <div class="input-group">
                                    <span class="input-group-text @error("feed.flo.$pre") border border-danger @endif"
                                        id="basic-addon-search1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor"
                                            class="bi bi-wrench-adjustable @error("feed.flo.$pre") text-danger @endif"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                            <path
                                                d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                        </svg>
                                    </span>
                                    <input type="number"
                                        class="form-control @error("feed.flo.$pre") border border-danger @endif"
                                        :id="$id('operation', 'feed-flo')"
                                        wire:model.lazy="feed.flo.{{ $pre }}" placeholder="0.0 gpm">
                                </div>
                                @error("feed.flo.$pre")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-2">
                                <label :for="$id('operation', 'permeate-flo')" class="form-label">Permeate</label>
                                <div class="input-group">
                                    <span
                                        class="input-group-text @error("permeate.flo.$pre") border border-danger @endif"
                                        id="basic-addon-search1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor"
                                            class="bi bi-wrench-adjustable @error("permeate.flo.$pre") text-danger @endif"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                            <path
                                                d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                        </svg>
                                    </span>
                                    <input type="number"
                                        class="form-control @error("permeate.flo.$pre") border border-danger @endif"
                                        :id="$id('operation', 'permeate-flo')"
                                        wire:model.lazy="permeate.flo.{{ $pre }}" placeholder="0.0 gpm">
                                </div>
                                @error("permeate.flo.$pre")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            @if ($plant->boosterc == 'yes')
                                <div class="col-md-4 mb-2">
                                    <label :for="$id('operation', 'booster-co')" class="form-label">Booster
                                        @for ($i = 0; $i < $plant->trains->first()->booster_quantity; $i++)
                                            {{ $i > 0 ? '+' : '' }} {{ $i + 1 }}
                                        @endfor Out
                                    </label>
                                    <div class="input-group">
                                        <span
                                            class="input-group-text @error("booster.co.$pre") border border-danger @endif"
                                            id="basic-addon-search1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor"
                                                class="bi bi-wrench-adjustable @error("booster.co.$pre") text-danger @endif"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                                <path
                                                    d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                            </svg>
                                        </span>
                                        <input type="number"
                                            class="form-control @error("booster.co.$pre") border border-danger @endif"
                                            :id="$id('operation', 'booster-co')"
                                            wire:model.lazy="booster.co.{{ $pre }}" placeholder="0.0 gpm">
                                    </div>
                                    @error("booster.co.$pre")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endif
                        </div>

                        <label class="h5 mt-1">PRESSURES</label>
                        <div class="row">
                            <div class="col-md mb-2">
                                <label :for="$id('operation', 'hp-in')" class="form-label">H.P. In</label>
                                <div class="input-group">
                                    <span class="input-group-text @error("hp.in.$pre") border border-danger @endif"
                                        id="basic-addon-search1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor"
                                            class="bi bi-wrench-adjustable @error("hp.in.$pre") text-danger @endif"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                            <path
                                                d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                        </svg>
                                    </span>
                                    <input type="number"
                                        class="form-control @error("hp.in.$pre") border border-danger @endif"
                                        :id="$id('operation', 'hp-in')" wire:model.lazy="hp.in.{{ $pre }}"
                                        placeholder="0.0 psi">
                                </div>
                                @error("hp.in.$pre")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md mb-2">
                                <label :for="$id('operation', 'hp-out')" class="form-label">H.P. Out</label>
                                <div class="input-group">
                                    <span class="input-group-text @error("hp.out.$pre") border border-danger @endif"
                                        id="basic-addon-search1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor"
                                            class="bi bi-wrench-adjustable @error("hp.out.$pre") text-danger @endif"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                            <path
                                                d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                        </svg>
                                    </span>
                                    <input type="number"
                                        class="form-control @error("hp.out.$pre") border border-danger @endif"
                                        :id="$id('operation', 'hp-out')" wire:model.lazy="hp.out.{{ $pre }}"
                                        placeholder="0.0 psi">
                                </div>
                                @error("hp.out.$pre")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md mb-2">
                                <label :for="$id('operation', 'reject')" class="form-label">Reject</label>
                                <div class="input-group">
                                    <span class="input-group-text @error("reject.$pre") border border-danger @endif"
                                        id="basic-addon-search1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor"
                                            class="bi bi-wrench-adjustable @error("reject.$pre") text-danger @endif"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                            <path
                                                d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                        </svg>
                                    </span>
                                    <input type="number"
                                        class="form-control @error("reject.$pre") border border-danger @endif"
                                        :id="$id('operation', 'reject')" wire:model.lazy="reject.{{ $pre }}"
                                        placeholder="0.0 psi">
                                </div>
                                @error("reject.$pre")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            @if ($plant->boosterc == 'yes')
                                <div class="col-md mb-2">
                                    <label :for="$id('operation', 'booster-cp')" class="form-label">Booster
                                        @for ($i = 0; $i < $plant->trains->first()->booster_quantity; $i++)
                                            {{ $i > 0 ? '+' : '' }} {{ $i + 1 }}
                                        @endfor Out
                                    </label>
                                    <div class="input-group">
                                        <span
                                            class="input-group-text @error("booster.cp.$pre") border border-danger @endif"
                                            id="basic-addon-search1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor"
                                                class="bi bi-wrench-adjustable @error("booster.cp.$pre") text-danger @endif"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                                <path
                                                    d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                            </svg>
                                        </span>
                                        <input type="number"
                                            class="form-control @error("booster.cp.$pre") border border-danger @endif"
                                            :id="$id('operation', 'booster-cp')"
                                            wire:model.lazy="booster.cp.{{ $pre }}" placeholder="0.0 psi">
                                    </div>
                                    @error("booster.cp.$pre")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endif

                            <div class="col-md">
                                <div class="col">
                                    @for ($i = 1; $i <= $plant->trains->first()->booster_quantity; $i++)
                                        <div class="col-md mb-2">
                                            <label :for="$id('operation', 'px-{{ $i }}')"
                                                class="form-label">px #
                                                {{ $i }} Out</label>
                                            <div class="input-group">
                                                <span
                                                    class="input-group-text @error("px.$pre") border border-danger @endif"
                                                    id="basic-addon-search1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor"
                                                        class="bi bi-wrench-adjustable @error("px.$pre") text-danger @endif"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                                        <path
                                                            d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                                    </svg>
                                                </span>
                                                <input type="number"
                                                    class="form-control @error("px.$pre") border border-danger @endif"
                                                    :id="$id('operation', 'px-{{ $i }}')"
                                                    wire:model.lazy="px.{{ $pre }}.{{ $i }}"
                                                    placeholder="0.0 A">
                                            </div>
                                            @error("px.$pre.$i")
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <div class="mt-2">
                            <div class="form-floating mb-0">
                                <textarea data-length="350" class="form-control char-textarea"
                                    :id="$id('operation', 'observations')"
                                    wire:model.lazy="observations.{{ $pre }}" rows="5"
                                    placeholder="Observations" style="height: 100px"></textarea>
                                <label for="observations">Observations</label>
                            </div>
                            <small class="textarea-counter-value float-end"><span class="char-count">0</span> /
                                350
                            </small>
                            @error("observations.$pre")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- /* Operation Section */ --}}
                @endif
            @endfor
            {{-- Formulario que se repite segun el numero de trenes --}}

            {{-- /* Product Water Section */ --}}
            <div class="card-body" x-show.transition.in="step === totalStep" x-id="['productWater']">
                <label class="h5">FEED LINE TO HOTEL SUPPLY</label>
                <div class="row">
                    <div class="col-md mb-2">
                        <label :for="$id('productWater', 'ph-pro')" class="form-label">pH</label>
                        <div class="input-group">
                            <span class="input-group-text @error('ph.pro') border border-danger @endif"
                                id="basic-addon-search1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-wrench-adjustable @error('ph.pro') text-danger @endif"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                    <path
                                        d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                </svg>
                            </span>
                            <input type="number" class="form-control @error('ph.pro') border border-danger @endif"
                                :id="$id('productWater', 'ph-pro')" wire:model.lazy="ph.pro" placeholder="0.0 u. pH">
                        </div>
                        @error('ph.pro')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md mb-2">
                        <label :for="$id('productWater', 'hardness')" class="form-label">Hardness</label>
                        <div class="input-group">
                            <span class="input-group-text @error('hardness') border border-danger @endif"
                                id="basic-addon-search1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-wrench-adjustable @error('hardness') text-danger @endif"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                    <path
                                        d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                </svg>
                            </span>
                            <input type="number" class="form-control @error('hardness') border border-danger @endif"
                                :id="$id('productWater', 'hardness')" wire:model.lazy="hardness" placeholder="0.0 ppm">
                        </div>
                        @error('hardness')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md mb-2">
                        <label :for="$id('productWater', 'tds')" class="form-label">TDS</label>
                        <div class="input-group">
                            <span class="input-group-text @error('tds') border border-danger @endif"
                                id="basic-addon-search1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-wrench-adjustable @error('tds') text-danger @endif"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                    <path
                                        d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                </svg>
                            </span>
                            <input type="number" class="form-control @error('tds') border border-danger @endif"
                                :id="$id('productWater', 'tds')" wire:model.lazy="tds" placeholder="0.0 ppm">
                        </div>
                        @error('tds')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md mb-2">
                        <label :for="$id('productWater', 'h2s')" class="form-label">H2S</label>
                        <div class="input-group">
                            <span class="input-group-text @error('h2s') border border-danger @endif"
                                id="basic-addon-search1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-wrench-adjustable @error('h2s') text-danger @endif"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                    <path
                                        d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                </svg>
                            </span>
                            <input type="number" class="form-control @error("h2s.$pre") border border-danger @endif"
                                :id="$id('productWater', 'h2s')" wire:model.lazy="h2s" placeholder="0.0 ppm">
                        </div>
                        @error('h2s')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-md-6 mb-2">
                        <label :for="$id('productWater', 'free_chlorine')" class="form-label">Free Chlorine</label>
                        <div class="input-group">
                            <span class="input-group-text @error('free_chlorine') border border-danger @endif"
                                id="basic-addon-search1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-wrench-adjustable @error('free_chlorine') text-danger @endif"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                    <path
                                        d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                </svg>
                            </span>
                            <input type="number"
                                class="form-control @error('free_chlorine') border border-danger @endif"
                                :id="$id('productWater', 'free_chlorine')" wire:model.lazy="free_chlorine"
                                placeholder="0.0 u. pH">
                        </div>
                        @error('free_chlorine')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    @if ($plant->chloride == 'yes')
                        <div class="col-md-6 mb-2">
                            <label :for="$id('productWater', 'chloride')" class="form-label">Chloride</label>
                            <div class="input-group">
                                <span class="input-group-text @error('chloride') border border-danger @endif"
                                    id="basic-addon-search1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-wrench-adjustable @error('chloride') text-danger @endif"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                        <path
                                            d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                    </svg>
                                </span>
                                <input type="number"
                                    class="form-control @error('chloride') border border-danger @endif"
                                    :id="$id('productWater', 'chloride')" wire:model.lazy="chloride"
                                    placeholder="0.0 ppm">
                            </div>
                            @error('chloride')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif
                </div>

                <label class="h5 mt-1">PRODUCTION READINGS</label>
                <div class="row">
                    @for ($i = 1; $i <= $plant->trains->where('type', 'Train')->count(); $i++)
                        <div class="col-md mb-2">
                            <label :for="$id('productWater', 'reading-{{ $i }}')"
                                class="form-label">Train #{{ $i }}</label>
                            <div class="input-group">
                                <span class="input-group-text @error("reading.$i") border border-danger @endif"
                                    id="basic-addon-search1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-water @error("reading.$i") text-danger @endif"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M.036 3.314a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 3.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 6.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 9.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.757-.703a.5.5 0 0 1-.278-.65z" />
                                    </svg>
                                </span>
                                <input type="number"
                                    class="form-control @error("reading.$i") border border-danger @endif"
                                    :id="$id('productWater', 'reading-{{ $i }}')"
                                    wire:model.lazy="reading.{{ $i }}" placeholder="0.0 m3">
                            </div>
                            @error("reading.$i")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endfor
                </div>

                <div class="row">
                    @if ($plant->irrigation == 'yes')
                        <div class="col-md-6 mb-2">
                            <label :for="$id('productWater', 'irrigation')" class="form-label">Irrigation</label>
                            <div class="input-group">
                                <span class="input-group-text @error('irrigation') border border-danger @endif"
                                    id="basic-addon-search1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-water @error('irrigation') text-danger @endif"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M.036 3.314a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 3.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 6.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 9.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.757-.703a.5.5 0 0 1-.278-.65z" />
                                    </svg>
                                </span>
                                <input type="number"
                                    class="form-control @error('irrigation') border border-danger @endif"
                                    :id="$id('productWater', 'irrigation')" wire:model.lazy="irrigation"
                                    placeholder="0.0 m3">
                            </div>
                            @error('irrigation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif

                    <div class="col-md-6 mb-2">
                        <label :for="$id('productWater', 'municipal')" class="form-label">Municipal</label>
                        <div class="input-group">
                            <span class="input-group-text @error('municipal') border border-danger @endif"
                                id="basic-addon-search1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-water @error('municipal') text-danger @endif" viewBox="0 0 16 16">
                                    <path
                                        d="M.036 3.314a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 3.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 6.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 9.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.757-.703a.5.5 0 0 1-.278-.65z" />
                                </svg>
                            </span>
                            <input type="number" class="form-control @error('municipal') border border-danger @endif"
                                :id="$id('productWater', 'municipal')" wire:model.lazy="municipal" placeholder="0.0 m3">
                        </div>
                        @error('municipal')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <label class="h5 mt-1">TANK LEVELS</label>
                <div class="row">
                    @for ($i = 1; $i <= $plant->cisterns_quantity; $i++)
                        <div class="col-md mb-2">
                            <label :for="$id('productWater', 'tank-{{ $i }}')" class="form-label">Tank
                                #{{ $i }}</label>
                            <div class="input-group">
                                <span class="input-group-text @error("tank.$i") border border-danger @endif"
                                    id="basic-addon-search1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-moisture @error("tank.$i") text-danger @endif"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M13.5 0a.5.5 0 0 0 0 1H15v2.75h-.5a.5.5 0 0 0 0 1h.5V7.5h-1.5a.5.5 0 0 0 0 1H15v2.75h-.5a.5.5 0 0 0 0 1h.5V15h-1.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 .5-.5V.5a.5.5 0 0 0-.5-.5h-2zM7 1.5l.364-.343a.5.5 0 0 0-.728 0l-.002.002-.006.007-.022.023-.08.088a28.458 28.458 0 0 0-1.274 1.517c-.769.983-1.714 2.325-2.385 3.727C2.368 7.564 2 8.682 2 9.733 2 12.614 4.212 15 7 15s5-2.386 5-5.267c0-1.05-.368-2.169-.867-3.212-.671-1.402-1.616-2.744-2.385-3.727a28.458 28.458 0 0 0-1.354-1.605l-.022-.023-.006-.007-.002-.001L7 1.5zm0 0-.364-.343L7 1.5zm-.016.766L7 2.247l.016.019c.24.274.572.667.944 1.144.611.781 1.32 1.776 1.901 2.827H4.14c.58-1.051 1.29-2.046 1.9-2.827.373-.477.706-.87.945-1.144zM3 9.733c0-.755.244-1.612.638-2.496h6.724c.395.884.638 1.741.638 2.496C11 12.117 9.182 14 7 14s-4-1.883-4-4.267z" />
                                    </svg>
                                </span>
                                <input type="number"
                                    class="form-control @error("tank.$i") border border-danger @endif"
                                    :id="$id('productWater', 'tank-{{ $i }}')"
                                    wire:model.lazy="tank.{{ $i }}" placeholder="0.0 m3">
                            </div>
                            @error("tank.$i")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endfor
                </div>

                <label class="h5 mt-1">DAILY CHEMICAL SUPPLY</label>
                <div class="row">
                    <div class="col-md mb-2">
                        <label :for="$id('productWater', 'calcium_chloride')" class="form-label">Calcium
                            Chloride</label>
                        <div class="input-group">
                            <span class="input-group-text @error('calcium_chloride') border border-danger @endif"
                                id="basic-addon-search1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-water @error('calcium_chloride') text-danger @endif"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M.036 3.314a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 3.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 6.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 9.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.757-.703a.5.5 0 0 1-.278-.65z" />
                                </svg>
                            </span>
                            <input type="number"
                                class="form-control @error('calcium_chloride') border border-danger @endif"
                                :id="$id('productWater', 'calcium_chloride')" wire:model.lazy="calcium_chloride"
                                placeholder="0.0 Kg">
                        </div>
                        @error('calcium_chloride')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md mb-2">
                        <label :for="$id('productWater', 'sodium_carbonate')" class="form-label">Sodium
                            Carbonate</label>
                        <div class="input-group">
                            <span class="input-group-text @error('sodium_carbonate') border border-danger @endif"
                                id="basic-addon-search1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-water @error('sodium_carbonate') text-danger @endif"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M.036 3.314a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 3.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 6.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 9.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.757-.703a.5.5 0 0 1-.278-.65z" />
                                </svg>
                            </span>
                            <input type="number"
                                class="form-control @error('sodium_carbonate') border border-danger @endif"
                                :id="$id('productWater', 'sodium_carbonate')" wire:model.lazy="sodium_carbonate"
                                placeholder="0.0 Kg">
                        </div>
                        @error('sodium_carbonate')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md mb-2">
                        <label :for="$id('productWater', 'sodium_hypochloride')" class="form-label">Sodium
                            Hypochloride</label>
                        <div class="input-group">
                            <span class="input-group-text @error('sodium_hypochloride') border border-danger @endif"
                                id="basic-addon-search1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-water @error('sodium_hypochloride') text-danger @endif"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M.036 3.314a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 3.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 6.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 9.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.757-.703a.5.5 0 0 1-.278-.65z" />
                                </svg>
                            </span>
                            <input type="number"
                                class="form-control @error('sodium_hypochloride') border border-danger @endif"
                                :id="$id('productWater', 'sodium_hypochloride')" wire:model.lazy="sodium_hypochloride"
                                placeholder="0.0 Kg">
                        </div>
                        @error('sodium_hypochloride')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md mb-2">
                        <label :for="$id('productWater', 'antiscalant')" class="form-label">Antiscalant</label>
                        <div class="input-group">
                            <span class="input-group-text @error('antiscalant') border border-danger @endif"
                                id="basic-addon-search1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-water @error('antiscalant') text-danger @endif" viewBox="0 0 16 16">
                                    <path
                                        d="M.036 3.314a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 3.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 6.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 9.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.757-.703a.5.5 0 0 1-.278-.65z" />
                                </svg>
                            </span>
                            <input type="number"
                                class="form-control @error('antiscalant') border border-danger @endif"
                                :id="$id('productWater', 'antiscalant')" wire:model.lazy="antiscalant"
                                placeholder="0.0 Kg">
                        </div>
                        @error('antiscalant')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md mb-2">
                        <label :for="$id('productWater', 'sodium_hydroxide')" class="form-label">Sodium
                            Hydroxide</label>
                        <div class="input-group">
                            <span class="input-group-text @error('sodium_hydroxide') border border-danger @endif"
                                id="basic-addon-search1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-water @error('sodium_hydroxide') text-danger @endif"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M.036 3.314a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 3.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 6.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 9.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.757-.703a.5.5 0 0 1-.278-.65z" />
                                </svg>
                            </span>
                            <input type="number"
                                class="form-control @error('sodium_hydroxide') border border-danger @endif"
                                :id="$id('productWater', 'sodium_hydroxide')" wire:model.lazy="sodium_hydroxide"
                                placeholder="0.0 Kg">
                        </div>
                        @error('sodium_hydroxide')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md mb-2">
                        <label :for="$id('productWater', 'hydrochloric_acid')" class="form-label">Hydrochloric
                            Acid</label>
                        <div class="input-group">
                            <span class="input-group-text @error('hydrochloric_acid') border border-danger @endif"
                                id="basic-addon-search1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-water @error('hydrochloric_acid') text-danger @endif"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M.036 3.314a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 3.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 6.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 9.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.757-.703a.5.5 0 0 1-.278-.65z" />
                                </svg>
                            </span>
                            <input type="number"
                                class="form-control @error('hydrochloric_acid') border border-danger @endif"
                                :id="$id('productWater', 'hydrochloric_acid')" wire:model.lazy="hydrochloric_acid"
                                placeholder="0.0 Kg">
                        </div>
                        @error('hydrochloric_acid')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md mb-2">
                        <label :for="$id('productWater', 'kl1')" class="form-label">Kl1</label>
                        <div class="input-group">
                            <span class="input-group-text @error('kl1') border border-danger @endif"
                                id="basic-addon-search1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-water @error('kl1') text-danger @endif" viewBox="0 0 16 16">
                                    <path
                                        d="M.036 3.314a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 3.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 6.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 9.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.757-.703a.5.5 0 0 1-.278-.65z" />
                                </svg>
                            </span>
                            <input type="number" class="form-control @error('kl1') border border-danger @endif"
                                :id="$id('productWater', 'kl1')" wire:model.lazy="kl1" placeholder="0.0 Kg">
                        </div>
                        @error('kl1')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md mb-2">
                        <label :for="$id('productWater', 'kl2')" class="form-label">Kl2</label>
                        <div class="input-group">
                            <span class="input-group-text @error('kl2') border border-danger @endif"
                                id="basic-addon-search1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-water @error('kl2') text-danger @endif" viewBox="0 0 16 16">
                                    <path
                                        d="M.036 3.314a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 3.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 6.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 9.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.757-.703a.5.5 0 0 1-.278-.65z" />
                                </svg>
                            </span>
                            <input type="number" class="form-control @error('kl2') border border-danger @endif"
                                :id="$id('productWater', 'kl2')" wire:model.lazy="kl2" placeholder="0.0 Kg">
                        </div>
                        @error('kl2')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mt-2">
                    <div class="form-floating mb-0">
                        <textarea data-length="350" class="form-control char-textarea"
                            :id="$id('productWater', 'observations')"
                            wire:model.lazy="observations.{{ $pre }}" rows="5" placeholder="Observations"
                            style="height: 100px"></textarea>
                        <label for="observations">Observations</label>
                    </div>
                    <small class="textarea-counter-value float-end"><span class="char-count">0</span> /
                        350
                    </small>
                    @error("observations.$pre")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            {{-- /* Product Water Section */ --}}

            <div class="card-footer">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="col me-2" x-show="step > 1" x-transition.delay.150ms>
                        <button @click="removeStep()" type="button"
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
                            <div class="col" x-show="step < totalStep" x-transition>
                                <button @click="addStep()" type="button"
                                    class="btn d-flex col-12 btn-lg btn-info align-items-center justify-content-end">
                                    Next
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                        <path
                                            d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                                    </svg>
                                </button>
                            </div>

                            <div class="col" x-show="step == totalStep" x-transition>
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