@extends('scripts/scripts')
@extends('navbar')
@section('navbar')
@endsection
    <div class="container mt-5">
        <center><h1 class="pt-5">Asignar Préstamos</h1></center>
        <form action="">
            <div class="form-group">
                <label for="numero_cliente" class="control-label">Número del Cliente:</label>
                    <input type="text" class="form-control" id="numero_cliente" name="numero_cliente" required maxlength="2">
            </div>
            <select id="selector_cliente" class="form-control mt-5" name="" onchange="verificar_buro_cliente();">
                <option id="option" selected="true" disabled>Seleccione la forma de verificación del cliente</option>
                <option value="f_n_f">Nombre y Fecha</option>
                <option value="curp">CURP</option>
                <option value="rfc">RFC</option>
            </select>
            <div id="form_nom_fecha" class="form-group mt-5">
                <div class="row">
                    <div class="col">
                        <input id="verificar_nom_client" name="nombre_cliente" type="search" class="form-control" placeholder="Ingrese el nombre del cliente">
                    </div>
                </div>
            </div>
            <div id="form_cliente_curp" class="mt-5">
                <div class="row">
                    <div class="col">
                        <input id="buscador_verif_curp" name="curp_cliente" type="search" class="form-control" placeholder="Ingrese el CURP del cliente">
                    </div>
                </div>         
            </div>

            <div id="form_cliente_rfc" class="mt-5">
                <div class="row">
                    <div class="col">
                        <input id="buscador_verif_rfc" name="rfc_cliente" type="search" class="form-control" placeholder="Ingrese el RFC del cliente">
                    </div>
                </div>        
            </div>
            <div class="form-group mt-5">
                <label for="fecha_nacimiento" class="control-label">Fecha de Nacimiento:</label>
                <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required maxlength="15">
            </div>
        </form>
    </div>