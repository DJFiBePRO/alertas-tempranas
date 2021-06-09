
<script>
    function soloLetras(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toString();
        letras = "ABECDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚabcdefghijklmnñopqrstuvwxyzáéíóú0123456789";

        especiales = [8, 13];
        tecla_especial = false;
        for (var i in especiales) {
            if (key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }
        if (letras.indexOf(tecla) == -1 && !tecla_especial) {
            alert("Ingresar datos correspondientes");
            return false;
        }
    }

    function soloNombre(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toString();
        letras = "ABECDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚabcdefghijklmnñopqrstuvwxyzáéíóú";

        especiales = [8, 32];
        tecla_especial = false;
        for (var i in especiales) {
            if (key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }
        if (letras.indexOf(tecla) == -1 && !tecla_especial) {
            alert("Ingresar solo letras");
            return false;
        }
    }

    function soloNum(ev) {
        if (window.event) {
            keynum = ev.keyCode;
        } else {
            keynum = ev.which;
        }
        if ((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13) {
            return true;
        } else {
            alert("Ingresar solo números");
            return false;
        }
    }

</script>

<div class="form-group">
    <div class="form-group">
        <label>Seleccione Finca:</label>
        <select id="idMonitoreo" class="form-control" name="idMonitoreo" required>
        @foreach ($fincas as $finca)
            <option value="{{ isset($finca->id) ? $finca->id : '' }}"@foreach ($estudios as $estudio) @if ($finca->id == $estudio->idFinca) selected @endif @endforeach>{{ $finca->nombreFinca }}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Seleccione Variedad:</label>
        <select id="idVariedad" class="form-control" name="idVariedad" required>
        <option value=""> Seleccione Variedad</option>
        </select>
    </div>
    <div class="form-group">
        <label>Código de Estudio:</label>
        <input type="text" maxlength="6" onkeypress="return soloLetras(event);" class="form-control" id="codigo"
            name="codigo" placeholder="Ingrese el código Ej (EST001)"
            value="{{ isset($estudio->codigo) ? $estudio->codigo : '' }}" required>
        <div class="valid-feedback">
            ¡Bien!
        </div>
        <div class="invalid-feedback">
            ¡Rellene este campo!
        </div>
    </div>
    <div class="form-group">
        <label>Nombre de Estudio:</label>
        <input type="text" onkeypress="return soloNombre(event);" class="form-control" name="nombreEstudio"
            placeholder="Ingrese el nombre de estudio"
            value="{{ isset($estudio->nombreEstudio) ? $estudio->nombreEstudio : '' }}" required>
        <div class="valid-feedback">
            ¡Bien!
        </div>
        <div class="invalid-feedback">
            ¡Rellene este campo!
        </div>
    </div>
</div>
<br>
<div class="form-group">
    <label for="fenologia">Fenologia:</label>
    <input type="text" onkeypress="return soloNum(event);" minlength="1" maxlength="3" class="form-control"
        id="fenologia" name="fenologia" placeholder="Ingrese la fenologia"
        value="{{ isset($estudio->fenologia) ? $estudio->fenologia : '' }}" required>
    <div class="valid-feedback">
        ¡Bien!
    </div>
    <div class="invalid-feedback">
        ¡Rellene este campo!
    </div>
</div>
<br>
<div class="form-group">
    <label for="densidad">Densidad:</label>
    <input type="text" class="form-control" id="densidad" name="densidad" placeholder="Ingrese la densidad"
        value="{{ isset($estudio->densidad) ? $estudio->densidad : '' }}" required>
    <div class="valid-feedback">
        ¡Bien!
    </div>
    <div class="invalid-feedback">
        ¡Rellene este campo!
    </div>
</div>
<br>
<div class="form-group">
    <label>Ingrese fecha inicio:</label>
    <input type="date" class="sm-form-control" id="fechaInicio" name="fechaInicio"
        value="{{ isset($estudio->fechaInicio) ? $estudio->fechaInicio : '' }}" required>
    <div class="valid-feedback">
        ¡Bien!
    </div>
    <div class="invalid-feedback">
        ¡Rellene este campo!
    </div>
</div>
<br>
<div class="form-group">
    <label>Ingrese fecha fin:</label>
    <input type="date" class="sm-form-control" id="fechaFin" name="fechaFin"
        value="{{ isset($estudio->fechaFin) ? $estudio->fechaFin : '' }}" required>
    <div class="valid-feedback">
        ¡Bien!
    </div>
    <div class="invalid-feedback">
        ¡Rellene este campo!
    </div>
</div>
<br>
<div class="form-group">
    <label>Activo:</label>
    <input type="text" class="form-control" id="activo" name="activo" placeholder="Ingrese activo"
        value="{{ isset($estudio->activo) ? $estudio->activo : '' }}" required>
    <div class="valid-feedback">
        ¡Bien!
    </div>
    <div class="invalid-feedback">
        ¡Rellene este campo!
    </div>
</div>
<br>
<!-- Validacion errores-->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<br>
<div class="row">
    <div class="col-md-6">
        <a href="/estudios" class="btn btn-danger btn-block">Regresar</a>
    </div>
    <div class="col-md-6">
        <button class="btn btn-primary btn-block">Guardar</button>
    </div>
</div>
@section('js')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"
        crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"
        crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('/js/datatable-modal.js') }}"></script>
@endsection
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

</script>
