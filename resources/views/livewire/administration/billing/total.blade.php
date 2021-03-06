<div class="col-12">
    <div class="card card-statistics">
        <div class="card-body statistics-body">
            <h4 class="card-title">TOTAL</h4>
            <div class="row mb-2">
                <div class="col-6">
                    <div class="input-group mb-2">
                        <span class="input-group-text">SUBTOTAL OSMOSIS&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input type="text" class="form-control" placeholder="" readonly="true"
                            aria-label="Amount (to the nearest dollar)">
                        <span class="input-group-text">00</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group mb-2">
                        <span
                            class="input-group-text">DISCOUNT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input type="text" class="form-control" placeholder="" readonly="true"
                            aria-label="Amount (to the nearest dollar)">
                        <span class="input-group-text">00</span>
                    </div>
                </div>
                @if ($plant->personalitation_plant->irrigation == 'yes')
                    <div class="col-6">
                        <div class="input-group mb-2">
                            <span class="input-group-text">SUBTOTAL IRRIGATION</span>
                            <input type="text" class="form-control" placeholder="" readonly="true"
                                aria-label="Amount (to the nearest dollar)">
                            <span class="input-group-text">00</span>
                        </div>
                    </div>
                @endif
                <div class="col-md-6">
                    <div class="input-group mb-2">
                        <span
                            class="input-group-text">SUBTOTAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input type="text" class="form-control" placeholder="" readonly="true"
                            aria-label="Amount (to the nearest dollar)">
                        <span class="input-group-text">00</span>
                    </div>
                </div>


                <div class="col-6">
                    <div class="input-group mb-2">
                        <span class="input-group-text">SUBTOTAL REAL&nbsp;&nbsp;</span>
                        <input type="text" class="form-control" placeholder="" readonly="true"
                            aria-label="Amount (to the nearest dollar)">
                        <span class="input-group-text">00</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group mb-2">
                        <span
                            class="input-group-text">VAT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input type="text" class="form-control" placeholder="" readonly="true"
                            aria-label="Amount (to the nearest dollar)">
                        <span class="input-group-text">00</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-2">
                        <span
                            class="input-group-text">TOTAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input type="text" class="form-control" placeholder="" readonly="true"
                            aria-label="Amount (to the nearest dollar)">
                        <span class="input-group-text">00</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Statistics Card -->
</div>
