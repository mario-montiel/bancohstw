@extends('scripts/scripts')
@extends('layouts/appAlcala')
@section('content')

    <div class="container  mt-5 pb-5">
        <div class="container-fluid">
            <div class="container-fluid container_asignar_prestamos mt-5 pl-5 pr-5 pb-5">
            @if(Session::has('prestamo'))
                <p class="alert alert-success p" style="text-align:center;"> Prestamo realizado con Éxito! </p>
            @endif
            @if(Session::has('usuario_fail'))
                <p class="alert alert-success p" style="text-align:center;"> Usuario no encontrado! </p>
            @endif
            @if(Session::has('negado'))
                <p class="alert alert-success p" style="text-align:center;"> Solicitud de Préstamo NEGADO! <br>
                    Estado de buro en ROJO
                </p>
            @endif
                <form action="{{url('/verif_sol_prestamo')}}" method="POST">
                {{ csrf_field() }}
                    <center><h1 class="pt-5">Verificar Cliente</h1></center>
                        <select id="seleccion_opcion" class="form-control mt-4" onchange="verificacion();">
                            <option id="asig_option" selected="true" disabled>Seleccione la forma de verificación del cliente</option>
                            <option value="asig_num_cliente">Número del Cliente</option>
                            <option value="asig_nombre">Nombre</option>
                            <option value="asig_curp">CURP</option>
                            <option value="asig_rfc">RFC</option>
                        </select>
                        <div id="asig_num_cli" class="form-group mt-4">
                            <label for="numero_cliente" class="control-label">Número del Cliente:</label>
                            <input type="text" class="form-control" id="asig_numero_cliente" name="numero_cliente" maxlength="2">
                        </div>
                        <div id="form_asignar_nombre" class="container-fluid mt-5">
                            <div class="row">
                                <div class="col-12">
                                    <label for="nombre_cliente" class="control-label">Nombre Completo:</label>
                                    <input id="asig_nombre_cliente" name="nombre_cliente" type="search" class="form-control" placeholder="Ingrese el nombre completo del cliente">
                                </div>
                                <div class="container mt-4">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="ap_paterno" class="control-label">Apellido Paterno:</label>
                                            <input id="asig_ap_paterno" name="ap_paterno" type="search" class="form-control" placeholder="Ingrese el nombre paterno del cliente">
                                        </div>
                                        <div class="col-6">
                                            <label for="ap_materno" class="control-label">Apellido Materno:</label>
                                            <input id="asig_ap_materno" name="ap_materno" type="search" class="form-control" placeholder="Ingrese el nombre materno del cliente">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <label for="veri_fecha_cli" class="control-label">Fecha de Nacimiento:</label>
                                    <input id="asig_fecha_cli" type="date" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div id="form_asignar_curp" class="mt-4">
                            <div class="row">
                                <div class="col">
                                    <label id="l_verif_curp" for="verif_curp" class="control-label">CURP:</label>
                                    <input id="asig_curp" name="verif_curp" type="search" class="form-control" placeholder="Ingrese el CURP del cliente">
                                </div>
                            </div>         
                        </div>

                        <div id="form_asignar_rfc" class="mt-4">
                            <div class="row">
                                <div class="col">
                                    <label id="l_verif_rfc" for="verif_rfc" class="control-label">RFC:</label>
                                    <input id="asig_rfc" name="verif_rfc" type="search" class="form-control" placeholder="Ingrese el RFC del cliente">
                                </div>
                            </div>        
                        </div>
                        <div class="mt-4" id="tipo_tarjeta">
                        <label for="numero_cliente" class="control-label">Tarjeta:</label>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 form-check mt-2">
                                    <input class="form-check-input" type="radio" name="tipo_tarjeta" id="credito" value="credito" checked>
                                    <label class="form-check-label" for="credito">
                                        Crédito
                                    </label>
                                </div>
                                <div class="col-sm-12 col-md-6 form-check mt-2">
                                    <input class="form-check-input" type="radio" name="tipo_tarjeta" id="debito" value="debito">
                                    <label class="form-check-label" for="debito">
                                        Débito
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button id="btn_asignar_prestamos" class="btn btn-primary mt-4" type="submit">Solicitar</button>
                </form>
            </div>
        </div>
    </div>

@endsection