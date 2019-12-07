@extends('scripts/scripts')
@extends('layouts/app')
@section('content')
    
    <div class="container  mt-5 pb-5">
        <div class="container-fluid">
            <div class="container-fluid container_asignar_prestamos mt-5 pl-5 pr-5 pb-5">
            @if(Session::has('prestamo'))
                <p class="alert alert-success"> Prestamo asignado con Éxito! </p>
            @endif
                <form action="{{url('/x')}}" method="POST">
                {{ csrf_field() }}
                    <center><h1 class="pt-5">Asignar Préstamos</h1></center>
                        <select id="seleccion_opcion" class="form-control mt-5" name="hey" onchange="verificacion();">
                            <option id="asig_option" selected="true" disabled>Seleccione la forma de verificación del cliente</option>
                            <option value="asig_nombre">Nombre</option>
                            <option value="asig_curp">CURP</option>
                            <option value="asig_rfc">RFC</option>
                        </select>
                        <div class="form-group mt-4">
                            <label for="numero_cliente" class="control-label">Número del Cliente:</label>
                            <input type="text" class="form-control" id="numero_cliente" name="numero_cliente" required maxlength="2">
                        </div>
                        <div id="form_asignar_nombre" class="form-group mt-4">
                            <div class="row">
                                <div class="col">
                                    <label for="nom_client" class="control-label">Nombre del Cliente:</label>
                                    <input name="nombre_cliente" type="search" class="form-control" placeholder="Ingrese el nombre del cliente">
                                </div>
                            </div>
                        </div>
                        <div id="form_asignar_curp" class="mt-4">
                            <div class="row">
                                <div class="col">
                                    <label id="l_verif_curp" for="verif_curp" class="control-label">CURP:</label>
                                    <input id="verif_curp" name="verif_curp" type="search" class="form-control" placeholder="Ingrese el CURP del cliente">
                                </div>
                            </div>         
                        </div>

                        <div id="form_asignar_rfc" class="mt-4">
                            <div class="row">
                                <div class="col">
                                    <label id="l_verif_rfc" for="verif_rfc" class="control-label">RFC:</label>
                                    <input id="verif_rfc" name="verif_rfc" type="search" class="form-control" placeholder="Ingrese el RFC del cliente">
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