<div>
    <section id="trains">
        <div class="card" x-data="trains()" x-cloak>
            <div class="card-header">
                <h3 class="card-title">Trains</h3>
            </div>

            <div x-text="$wire.trainIndex"></div>

            <div class="card-body">
                <template x-for="(list, index) in trains">
                    <div class="row p-1 m-1 border rounded" wire:key="trainIndex">
                        <div class="row">
                            <div>
                                <h5>Train #<span x-text="index+1"></span></h5>
                            </div>

                            <div class="col-md mb-2">
                                <label :for="list.id" class="form-label">Capacity</label>
                                <div class="input-group input-group-merge">
                                    <span
                                        class="input-group-text @error('trains.capacity') border border-danger @enderror">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor"
                                            class="bi bi-basket @error('trains.capacity') text-danger @enderror"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M5.757 1.071a.5.5 0 0 1 .172.686L3.38 3 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z" />
                                        </svg>
                                    </span>
                                    <input type="number"
                                        class="form-control @error('trains.capacity') border border-danger @enderror"
                                        wire:model="trains.capacity" placeholder="0.00 m3">
                                </div>
                                @error('trains.capacity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md mb-2">
                                <label :for="'trains.tds-' + index" class="form-label">TDS</label>
                                <div class="input-group input-group-merge">
                                    <span
                                        class="input-group-text @error('trainTds') border border-danger @enderror"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 16">
                                            <path
                                                d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z"
                                                class="@error('trainTds') text-danger @enderror" />
                                        </svg></span>
                                    <input type="number" wire:model="trainTds"
                                        class="form-control @error('trainTds') border border-danger @enderror"
                                        :for="'trains.tds-' + index" placeholder="0.00"
                                        aria-label="Amount (to the nearest dollar)">
                                    <span class="input-group-text">ppm</span>
                                </div>
                                @error('trainTds')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md mb-2">
                                <label for="trainBooster" class="form-label">Booster
                                    &
                                    PX</label>
                                <div class="input-group">
                                    <span class="input-group-text @error('trainBooster') border border-danger @enderror"
                                        id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor"
                                            class="bi bi-speedometer @error('trainBooster') text-danger @enderror"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z" />
                                            <path fill-rule="evenodd"
                                                d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z" />
                                        </svg>
                                    </span>
                                    <select class="form-select @error('trainBooster') border border-danger @enderror"
                                        id="trainBooster" wire:model="trainBooster">
                                        <option value="">0</option>
                                        @for ($i = 1; $i < 7; $i++)
                                            <option value="{{ $i }}">
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                @error('trainBooster')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="meabrane" class="form-label">#Membrane
                                    elements</label>
                                <div class="input-group input-group-merge mb-2">
                                    <span
                                        class="input-group-text  @error('trainsElements') border border-danger @enderror"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-boxes" viewBox="0 0 16 16">
                                            <path
                                                d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z"
                                                class="@error('trainsElements') text-danger @enderror" />
                                        </svg></span>
                                    <input type="number"
                                        class="form-control @error('trainsElements') border border-danger @enderror"
                                        wire:model.lazy="trainsElements" placeholder="0.00"
                                        aria-label="Amount (to the nearest dollar)" id="meabrane">
                                </div>
                                @error('trainsElements')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="membranesActiveArea" class="form-label">Membrane
                                    active area
                                </label>
                                <div class="input-group mb-2">
                                    <span
                                        class="input-group-text @error('membranesActiveAre') border border-danger @enderror"
                                        id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-bullseye" viewBox="0 0 16 16">
                                            <path
                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path
                                                d="M8 13A5 5 0 1 1 8 3a5 5 0 0 1 0 10zm0 1A6 6 0 1 0 8 2a6 6 0 0 0 0 12z" />
                                            <path
                                                d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"
                                                class="@error('membranesActiveAre') text-danger @enderror" />
                                            <path d="M9.5 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                        </svg>
                                    </span>
                                    <select
                                        class="form-select @error('membranesActiveAre') border border-danger @enderror"
                                        id="trains.mArea" wire:model.lazy="membranesActiveAre">
                                        <option value="">SELECT TYPE</option>
                                        @foreach ($membranesActiveArea as $ActiveArea)
                                            <option value="{{ $ActiveArea->id }}">
                                                {{ $ActiveArea->ft2 }} Ft2
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('membranesActiveAre')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md mb-2">
                                <label for="multimediaFilsters" class="form-label">Multimedia
                                    Filters</label>
                                <div class="input-group ">
                                    <span
                                        class="input-group-text @error('multimediaFilsters') border border-danger @enderror"
                                        id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"
                                                class=" @error('multimediaFilsters') text-danger @enderror" />
                                        </svg>
                                    </span>
                                    <select
                                        class="form-select @error('multimediaFilsters') border border-danger @enderror"
                                        id="multimediaFilsters" wire:model.lazy="multimediaFilsters">
                                        <option value="">SELECT</option>
                                        @for ($i = 1; $i < 7; $i++)
                                            <option value="{{ $i }}">
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                @error('multimediaFilsters')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md mb-2">
                                <label for="polishFilters" class="form-label">Polish
                                    Filters
                                    Type</label>
                                <div class="input-group">
                                    <span
                                        class="input-group-text  @error('polishFilters') border border-danger @enderror"
                                        id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"
                                                class="@error('polishFilters') text-danger @enderror" />
                                        </svg>
                                    </span>
                                    <select class="form-select @error('polishFilters') border border-danger @enderror"
                                        id="polishFilters" wire:model.lazy="polishFilters">
                                        <option value="">SELECT TYPE</option>
                                        @foreach ($polishFilterTypes as $PolishFilterType)
                                            <option value="{{ $PolishFilterType->id }}">
                                                {{ $PolishFilterType->microns }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('polishFilters')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md mb-2">
                                <label for="polishQuantity" class="form-label">Polish
                                    Filters
                                    quantity</label>
                                <div class="input-group">
                                    <span
                                        class="input-group-text  @error('polishQuantity') border border-danger @enderror"
                                        id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"
                                                class="@error('polishQuantity') text-danger @enderror" />
                                        </svg>
                                    </span>
                                    <select class="form-select @error('polishQuantity') border border-danger @enderror"
                                        id="polishQuantity" wire:model.lazy="polishQuantity">
                                        <option value="">SELECT QUANTITY</option>
                                        @for ($i = 1; $i < 7; $i++)
                                            <option value="{{ $i }}">
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                @error('polishQuantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-2 my-2">
                                <button class="btn col-12 btn-outline-danger text-nowrap px-1" @click="remove()"
                                    type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd"
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </template>

                <hr>

                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-icon btn-primary" type="button" @click="add()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                            </svg>
                            <span>Add Train</span>
                        </button>
                    </div>
                </div>
            </div>
            {{ $errors }}
        </div>
    </section>
</div>
