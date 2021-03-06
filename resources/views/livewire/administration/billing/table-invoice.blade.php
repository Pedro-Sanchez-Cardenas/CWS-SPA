<div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">PRODUCTION</h4>
                <div id="numero">1</div>
                <div class="botton2">
                    <button type="button" class="btn btn-outline-Primary" id="idNombre" value="boton">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
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
                                <input type="text" class="form-control" placeholder="" id="idNombre"
                                    aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-text">m³</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <span class="input-group-text">FINAL READING&nbsp;&nbsp;</span>
                                <input type="text" class="form-control" placeholder="" id="idNombre"
                                    aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-text">m³</span>
                            </div>
                        </div>


                        <div class="col-6">
                            <div class="input-group mb-2">
                                <span class="input-group-text">PRODUCTION</span>
                                <input type="text" class="form-control" placeholder="" id="idNombre"
                                    aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-text">m³</span>
                            </div>
                        </div>
                        @if ($plant->trains->where('type', 'Municipal')->count() > 0)
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Mensaje" id="idNombre">
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

<script>
    var elDiv = document.getElementById('numero');
    var elButton = document.getElementById('boton');
    var mResult = elDiv.innerHTML;

    function editar() {
        elDiv.innerHTML = ++mResult;
    }

    function guardar() {
        elDiv.innerHTML = --mResult;
    }
    var clickCount = 0;
    elButton.addEventListener('click', function() {
        clickCount++;
        if (clickCount === 1) {
            singleClickTimer = setTimeout(function() {
                clickCount = 0;
                editar();
            }, 400);
        } else if (clickCount === 2) {
            clearTimeout(singleClickTimer);
            clickCount = 0;
            guardar();
        }
    }, false);
    (function() {
        let boton = document.getElementById("boton");
        boton.addEventListener("click", myf1);
        let contador = 0;

        function myf1() {
            if (contador % 2 == 0) {

                boton.textContent = "Save"
                boton.style.color = "#28c76f"
            } else {
                boton.textContent = "Edit"
                boton.style.color = "#danger"

            }
            contador += 1;
        }
    })();
</script>
<script>
    function ponerReadOnly(id) {
        // Ponemos el atributo de solo lectura
        $("#" + id).attr("readonly", "readonly");
        // Ponemos una clase para cambiar el color del texto y mostrar que
        // esta deshabilitado
        $("#" + id).addClass("readOnly");
    }

    function quitarReadOnly(id) {
        // Eliminamos el atributo de solo lectura
        $("#" + id).removeAttr("readonly");
        // Eliminamos la clase que hace que cambie el color
        $("#" + id).removeClass("readOnly");
    }

    /**
     * Mostramos en un alert si esta el atributo de solo lectura activado
     */
    function estado(id) {
        if ($("#" + id).attr("readonly")) {
            alert("Tiene el atributo de solo lectura");
        } else {
            alert("NO Tiene el atributo de solo lectura");
        }
    }
</script>
<style>
    .readOnly {
        color: #808080;
    }

    input {
        width: 200px;
    }

</style>
</head>

<body>

    <form>
        <input type="text" name="nombre" value="cualquier texto" id="idNombre">
        <br><input type="button" value="poner atributo ReadOnly" onclick="ponerReadOnly('idNombre')">
        <br><input type="button" value="quitar atributo ReadOnly" onclick="quitarReadOnly('idNombre')">
        <br><input type="button" value="Estado" onclick="estado('idNombre')">
    </form>
