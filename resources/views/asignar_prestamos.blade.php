@extends('scripts/scripts')
@extends('layouts/app')
@section('content')
<!-- @include('globals/navbar') -->
<!-- @section('navbar')
@endsection -->
    <div class="container  mt-5">
        <div class="container-fluid pt-5">
            <div class="container-fluid container_asignar_prestamos mt-5 pl-5 pr-5 pb-5">
                <form action="" method="post">
                {{ csrf_field() }}
                    <center><h1 class="pt-5">Asignar Préstamos</h1></center>
                        <select id="selector_cliente" class="form-control mt-5" name="" onchange="verificar_buro_cliente();">
                            <option id="option" selected="true" disabled>Seleccione la forma de verificación del cliente</option>
                            <option value="f_n_f">Nombre</option>
                            <option value="curp">CURP</option>
                            <option value="rfc">RFC</option>
                        </select>
                        <div class="form-group mt-4">
                            <label for="numero_cliente" class="control-label">Número del Cliente:</label>
                            <input type="text" class="form-control" id="numero_cliente" name="numero_cliente" required maxlength="2">
                        </div>
                        <div id="form_nom_fecha" class="form-group mt-4">
                            <div class="row">
                                <div class="col">
                                    <label for="nom_client" class="control-label">Nombre del Cliente:</label>
                                    <input id="nom_client" name="nombre_cliente" type="search" class="form-control" required placeholder="Ingrese el nombre del cliente">
                                </div>
                            </div>
                        </div>
                        <div id="form_cliente_curp" class="mt-4">
                            <div class="row">
                                <div class="col">
                                    <label for="verif_curp" class="control-label">CURP:</label>
                                    <input id="verif_curp" name="verif_curp" type="search" class="form-control" required placeholder="Ingrese el CURP del cliente">
                                </div>
                            </div>         
                        </div>

                        <div id="form_cliente_rfc" class="mt-4">
                            <div class="row">
                                <div class="col">
                                    <label for="verif_rfc" class="control-label">RFC:</label>
                                    <input id="verif_rfc" name="verif_rfc" type="search" class="form-control" required placeholder="Ingrese el RFC del cliente">
                                </div>
                            </div>        
                        </div>
                        <div class="form-group mt-4">
                            <label for="fecha_nacimiento" class="control-label">Fecha de Nacimiento:</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required maxlength="15">
                        </div>
                        <div class="form-group mt-4">
                            <label for="monto_solicitado" class="control-label">Monto Solicitado:</label>
                            <input type="text" class="form-control" id="monto_solicitado" name="monto_solicitado" required maxlength="15" int>
                        </div>
                        <div class="form-group mt-4">
                            <label for="monto_solicitado" class="control-label">Plazo de Pagos en Años:</label>
                            <input type="text" class="form-control" id="monto_solicitado" name="monto_solicitado" required maxlength="15">
                        </div>
                        <button id="btn_asignar_prestamos" class="btn btn-primary" type="submit">Solicitar</button>
                </form>
            </div>
        </div>
    </div>

@endsection