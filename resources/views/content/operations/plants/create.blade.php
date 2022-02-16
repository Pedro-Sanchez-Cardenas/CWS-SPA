<!--
    ******************************************************************
    * Author: Eduardo Gabriel Cardenas tzec.
    * Start Date: 31 de Enero del 2022
    * Finish Date: -------

    * Update Author: -------
    * Update Start Date: -------
    * Update Finish Date: -------

    * Description: -------
    ******************************************************************
 -->
@extends('layouts/contentLayoutMaster')

@section('title', 'Create Plant - RO')

@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/file-uploaders/dropzone.min.css')) }}">
@endsection

@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-file-uploader.css')) }}">

@endsection

@section('content')
    <section id="body">
        <livewire:operation.plants.create-plants :plantTypes="$plantTypes" :countries="$countries" :currencies="$currencies" :attendants="$attendants" :managers="$managers" :membranesActiveArea="$membranesActiveArea" :polishFilterTypes="$polishFilterTypes"/>
    </section>
@endsection

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/repeater/jquery.repeater.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/file-uploaders/dropzone.min.js')) }}"></script>
@endsection

@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-repeater.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-file-uploader.js')) }}"></script>
    <script>
        function cisterns() {
            return {
                cantidad: 0,
                cisterns: [],
                old() {
                    // Obtenemos los old values de cada campo y tambien los errores de cada campo.
                    var old = @json(old());
                    var errors = @json($errors->get('cisterns.capacity.*'));
                    if (old != 0) {
                        // Creamos los inputs con los errores de validación.
                        for (var i = 0; i < old.cisterns.capacity.length; i++) {
                            //Agregamos los form inputs, value.old y text de validación
                            this.cisterns.push({
                                id: this.cantidad++,
                                value: old.cisterns['capacity'][i],
                                validation: errors['cisterns.capacity.' + i] != undefined ? errors[
                                    'cisterns.capacity.' + i] : null
                            });
                        }
                    }
                },
                add() {
                    if (this.cantidad < 10) {
                        //Agregar nuevo form input
                        this.cisterns.push({
                            id: this.cantidad++,
                            value: null,
                            validation: null
                        });
                    } else {
                        alert("No se puede agregar mas cisternas");
                    }
                },
                remove(eliminarRegistro) {
                    if (this.cantidad > 0) {
                        this.cisterns = this.cisterns.filter(list => list.id != eliminarRegistro)
                        this.cantidad--;
                    }
                }
            }
        }

        function costs() {
            return {
                sumM3: 0,
                sumMonth: 0,
                action($type) {
                    switch ($type) {
                        case 'bot1':
                            // Deshabilitamos los campos
                            document.getElementById("botM3").disabled = false;
                            document.getElementById("botFixed").disabled = true;

                            // Cambiamos el valor de los campos
                            document.getElementById("botM3").value = document.getElementById("botFixed").value;
                            document.getElementById("botFixed").value = "";
                            break;

                        case 'bot2':
                            // Deshabilitamos los campos
                            document.getElementById("botM3").disabled = true;
                            document.getElementById("botFixed").disabled = false;

                            // Cambiamos el valor de los campos
                            document.getElementById("botFixed").value = document.getElementById("botM3").value;
                            document.getElementById("botM3").value = "";
                            break;

                        case 'o&m1':
                            // Deshabilitamos los campos
                            document.getElementById("o&mM3").disabled = false;
                            document.getElementById("o&mFixed").disabled = true;

                            // Cambiamos el valor de los campos
                            document.getElementById("o&mM3").value = document.getElementById("o&mFixed").value;
                            document.getElementById("o&mFixed").value = "";
                            break;

                        case 'o&m2':
                            // Deshabilitamos los campos
                            document.getElementById("o&mM3").disabled = true;
                            document.getElementById("o&mFixed").disabled = false;

                            // Cambiamos el valor de los campos
                            document.getElementById("o&mFixed").value = document.getElementById("o&mM3").value;
                            document.getElementById("o&mM3").value = "";
                            break;

                        case 'remi':
                            // Desabilitamos el campo
                            if (document.getElementById("radioRemi").checked) {
                                document.getElementById("remi").disabled = false;
                            } else {
                                document.getElementById("remi").value = "";
                                document.getElementById("remi").disabled = true;
                            }
                            break;
                        default:
                            console.log("default");
                            break;
                    }
                },
                sumarM3() {
                    var v1 = document.getElementById('botM3').value != "" ? document.getElementById('botM3').value : 0;
                    var v2 = document.getElementById('o&mM3').value != "" ? document.getElementById('o&mM3').value : 0;
                    var v3 = document.getElementById('remi').value != "" ? document.getElementById('remi').value : 0;

                    this.sumM3 = parseFloat(v1) + parseFloat(v2) + parseFloat(v3);
                },
                sumarMonth() {
                    var v1 = document.getElementById('botFixed').value != "" ? document.getElementById('botFixed').value :
                        0;
                    var v2 = document.getElementById('o&mFixed').value != "" ? document.getElementById('o&mFixed').value :
                        0;

                    this.sumMonth = parseFloat(v1) + parseFloat(v2);
                }
            }
        }
    </script>
@endsection
