<div class="col-xl-8 col-md-6 col-12">
    <div class="card card-statistics">
        <div class="card-header">
            <h4 class="card-title">INVOICE</h4>
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
                        <label class="form-label" for="fp-range">select an invoice</label>
                        <br>
                        <div class="file-select" id="src-file2">
                            <input type="file" name="src-file2" aria-label="Archivo">
                        </div>

                        <style type="text/css">
                            .file-select {
                                position: relative;
                                display: inline-block;
                            }

                            .file-select::before {
                                background-color: rgba(0, 0, 0, 0);
                                ";
                                color: white;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                border-radius: 4px;
                                content: 'Seleccionar';
                                /* testo por defecto */
                                position: absolute;
                                left: 0;
                                right: 0;
                                top: 0;
                                bottom: 0;
                                border: white 0.5px solid;
                            }

                            .file-select input[type="file"] {
                                opacity: 0;
                                width: 250px;
                                height: 38px;
                                display: inline-block;
                            }

                            #src-file2::before {
                                content: 'Seleccionar Archivo';
                            }

                        </style>

                    </div>

                    <div class="col-md mb-2">
                        <label for="plants.operator" class="form-label">Invoice</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon-search1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                </svg>
                            </span>
                            <select class="form-select " wire:model="plants.operator" id="plants.operator">
                                <option value="">Select invoice</option>
                            </select>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>
</div>
<!--/ Statistics Card -->
</div>
