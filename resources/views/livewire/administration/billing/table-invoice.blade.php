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
                        <div class="col-12">
                            <div class="input-group mb-2">
                                <span class="input-group-text">LECTURA INICIAL</span>
                                <input type="text" class="form-control" placeholder=""
                                    aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-text">m³</span>
                            </div>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text">LECTURA FINAL&nbsp;&nbsp;</span>
                            <input type="text" class="form-control" placeholder=""
                                aria-label="Amount (to the nearest dollar)">
                            <span class="input-group-text">m³</span>
                        </div>


                        <div class="col-12">
                            <div class="input-group mb-2">
                                <span class="input-group-text">PRODUCCION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                <input type="text" class="form-control" placeholder=""
                                    aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-text">m³</span>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>
<!--/ Statistics Card -->
