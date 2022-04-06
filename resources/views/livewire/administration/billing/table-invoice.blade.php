<div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">PRODUCTION</h4>
            </div>

            <div class="card-body">
                @for ($t = 0; $t < $plant->trains->where('type', 'Train')->count(); $t++)
                    <h5 for="">TRAIN #{{ $t + 1 }}</h5><BR>
                    <div class="row mb-2">
                        <div class="col-6">
                            <div class="input-group mb-2">
                                <span class="input-group-text">INITIAL READING</span>
                                <input type="text" class="form-control" placeholder="" readonly="true"
                                    aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-text">m³</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <span class="input-group-text">FINAL READING&nbsp;&nbsp;</span>
                                <input type="text" class="form-control" placeholder="" readonly="true"
                                    aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-text">m³</span>
                            </div>
                        </div>


                        <div class="col-6">
                            <div class="input-group mb-2">
                                <span class="input-group-text">PRODUCTION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                <input type="text" class="form-control" placeholder="" readonly="true"
                                    aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-text">m³</span>
                            </div>
                        </div>
                        @if ($plant->trains->where('type', 'Municipal')->count() > 0)
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Mensaje">
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
                                    <textarea class="form-control" aria-label="con área de texto"></textarea>
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
