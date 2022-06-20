<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        View grafics
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Grafics</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="height: 50em">
                    <section class="card">
                        <div class="card-header">
                            <h4 class="card-title">Plant Data</h4>
                        </div>
                        <div class="card-body" style="height: 3em;">
                            <div class="row">
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="select2-multiple">Multiple</label>
                                    <select class="select2 form-select" id="select2-multiple" multiple>
                                        <optgroup label="PRODUCTION READINGS    ">
                                            <option value="1">Readings</option>
                                            <option value="2">Production</option>
                                        </optgroup>
                                        <optgroup label="PRODUCT WATER">
                                            <option value="3">Ph</option>
                                            <option value="4">Hardness</option>
                                            <option value="5">Tds</option>
                                            <option value="6">H25</option>
                                            <option value="7">Free Chlorine</option>
                                            <option value="8">Cacl2</option>
                                            <option value="9">Naco3</option>
                                            <option value="10">Naclo</option>
                                            <option value="11">Antis</option>
                                            <option value="12">Naoh</option>
                                            <option value="13">Hcl</option>
                                            <option value="14">Kl1</option>
                                            <option value="15">Kl2</option>
                                        </optgroup>
                                        <optgroup label="PRETREATMENT">
                                            <option value="16">Multimedia Filter</option>
                                            <option value="17">Backwash</option>
                                        </optgroup>
                                        <optgroup label="OPERATION">
                                            <option value="18">H.p</option>
                                            <option value="19">Booster amperage</option>
                                            <option value="20">Booster freciencies</option>
                                            <option value="21">Ph</option>
                                            <option value="22">Temperature</option>
                                            <option value="23">Feed</option>
                                            <option value="24">Permeate</option>
                                            <option value="25">Rejet</option>
                                            <option value="26">B1+2 out</option>
                                            <option value="27">Px #1</option>
                                            <option value="28">Px #2</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="fp-range">Range</label>
                                    <input type="text" id="fp-range"
                                        class="form-control flatpickr-range flatpickr-input"
                                        placeholder="YYYY-MM-DD to YYYY-MM-DD" readonly="readonly">
                                </div>
                            </div>
                    </section>
                    <section id="apexchart">
                        <div class="row">
                            <div class="col-12">
                                <div
                                    class="
                                          card-header
                                          d-flex
                                          flex-sm-row flex-column
                                          justify-content-md-between
                                          align-items-start
                                          justify-content-start
                                        ">
                                    <div>
                                        <h4 class="card-title mb-25"></h4>
                                        <span class="card-subtitle text-muted"></span>
                                    </div>
                                </div>
                                <div id="chart"></div>
                            </div>
                        </div>
                    </section>
                    <label>Fecha de inicio</label>
                    <input type="date" id="timeStart" class="form-control" oninput="calculardiasDiscount()">
                    <label>Fecha fin</label>
                    <input type="date" id="timeEnd" class="form-control" oninput="calculardiasDiscount()">
                    <label>Días</label>
                    <input class="form-control" id="daysDiscount">
                    <script>
                        function calculardiasDiscount() {
                            var timeStart = new Date(document.getElementById("timeStart").value);
                            var timeEnd = new Date(document.getElementById("timeEnd").value);
                            var actualDate = new Date();
                            if (timeEnd > timeStart) {
                                var diff = timeEnd.getTime() - timeStart.getTime();
                                document.getElementById("daysDiscount").value = Math.round(diff / (1000 * 60 * 60 * 24));
                            } else if (timeEnd != null && timeEnd < timeStart) {
                                alert("La fecha debe ser mayor a la incial");
                                document.getElementById("daysDiscount").value = 0;
                            }
                        }
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
