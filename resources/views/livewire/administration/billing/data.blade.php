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
                                content: 'Select file';
                            }

                        </style>

                    </div>

                    <div class="col-md mb-2">
                        <label for="plants.operator" class="form-label">Status</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon-search1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-receipt-cutoff" viewBox="0 0 16 16">
                                    <path
                                        d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zM11.5 4a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                                    <path
                                        d="M2.354.646a.5.5 0 0 0-.801.13l-.5 1A.5.5 0 0 0 1 2v13H.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H15V2a.5.5 0 0 0-.053-.224l-.5-1a.5.5 0 0 0-.8-.13L13 1.293l-.646-.647a.5.5 0 0 0-.708 0L11 1.293l-.646-.647a.5.5 0 0 0-.708 0L9 1.293 8.354.646a.5.5 0 0 0-.708 0L7 1.293 6.354.646a.5.5 0 0 0-.708 0L5 1.293 4.354.646a.5.5 0 0 0-.708 0L3 1.293 2.354.646zm-.217 1.198.51.51a.5.5 0 0 0 .707 0L4 1.707l.646.647a.5.5 0 0 0 .708 0L6 1.707l.646.647a.5.5 0 0 0 .708 0L8 1.707l.646.647a.5.5 0 0 0 .708 0L10 1.707l.646.647a.5.5 0 0 0 .708 0L12 1.707l.646.647a.5.5 0 0 0 .708 0l.509-.51.137.274V15H2V2.118l.137-.274z" />
                                </svg>
                            </span>
                            <select class="form-select " wire:model="file" id="file">
                                <option value="">Select invoice</option>
                                @foreach ($InvoiceStatus as $InvoiceStatu)
                                    <option value="{{ $InvoiceStatu->id }}">{{ $InvoiceStatu->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div><br><br><br><br><br><br><br><br><br>
                    <div class="upload">
                        <button wire:offline.attr="disabled" type="submit"
                            class="btn btn-success col-12 waves-effect waves-float waves-light">
                            <div class="d-flex justify-content-center align-items-center font-weight-bold center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="10" fill="currentColor"
                                    class="bi bi-plus-lg" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                                </svg>
                                <span>UPLOAD INVOICE</span>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
