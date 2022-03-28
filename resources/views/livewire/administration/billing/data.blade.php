<div class="col-xl-8 col-md-6 col-12">
    <div class="card card-statistics">
        <div class="card-header">
            <h4 class="card-title">Statistics</h4>
            <button class="dt-button buttons-collection btn btn-outline-secondary dropdown-toggle me-2" tabindex="0"
                aria-controls="DataTables_Table_0" type="button" aria-haspopup="true" aria-expanded="false"><span><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-share font-small-4 me-50">
                        <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path>
                        <polyline points="16 6 12 2 8 6"></polyline>
                        <line x1="12" y1="2" x2="12" y2="15"></line>
                    </svg>Export</span></button>
        </div>

        <div>
            <div class="card-body statistics-body">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label" for="fp-range">DATE/TIME</label>
                        <input type="file" name="" id="">
                    </div>

                    <div class="col-md mb-2">
                        <label for="plants.operator" class="form-label">Operador</label>
                        <div class="input-group">
                            <span class="input-group-text @error('plants.operator') border border-danger @enderror"
                                id="basic-addon-search1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person-fill @error('plants.operator') text-danger @enderror"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                </svg>
                            </span>
                            <select class="form-select @error('plants.operator') border border-danger @enderror"
                                wire:model="plants.operator" id="plants.operator">
                                <option value="">SELECT OPERATOR</option>
                            </select>
                        </div>
                        @error('plants.operator')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                </div>
            </div>
        </div>

    </div>
</div>
<!--/ Statistics Card -->
</div>
