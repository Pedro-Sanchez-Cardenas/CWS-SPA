<div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">PRODUCTION</h4>
                <div class="botton2">
                    <button type="button" class="btn btn-outline-danger" id="btnhabilitar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" mb=2;
                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>Edit
                    </button>

                </div>
            </div>
            <div class="card-body">
                @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                    <h5 for="">TRAIN #{{ $t + 1 }}</h5><BR>
                    <div class="row mb-2">
                        <div class="col-6">
                            <div class="input-group mb-2">
                                <span class="input-group-text">INITIAL READING</span>
                                <input type="text" class="form-control" placeholder="" id="interesadoPositivo"
                                    aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-text">m³</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <span class="input-group-text">FINAL READING&nbsp;&nbsp;</span>
                                <input type="text" class="form-control" placeholder="" id="interesadoPositivo"
                                    aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-text">m³</span>
                            </div>
                        </div>


                        <div class="col-6">
                            <div class="input-group mb-2">
                                <span class="input-group-text">PRODUCTION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                <input type="text" class="form-control" placeholder="" id="nombre"
                                    aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-text">m³</span>
                            </div>
                        </div>
                        @if ($plant->trains->where('type', 'Municipal')->count() > 0)
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Mensaje" id="btnhabilitar">
                                    <div class="input-group-text">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="inputCheckbox">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        Motivo
                                    </span>
                                    <textarea class="form-control" aria-label="con área de texto" id="btnhabilitar"></textarea>
                                </div>
                            </div>
                        @endif
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>
<!--/ Statistics Card -->
