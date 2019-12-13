@extends('scripts/scripts')
@extends('layouts/app')
@section('content')

<div class="container">
    <a href="{{url('/')}}" class="btn btn-success"><i class="fas fa-arrow-left"></i></a>
    <div class="row">
        <div class="col-sm-12 col-md-6">
            {{ csrf_field() }}
            <form action="" method="get" class="pb-5">
                <div class="container-fluid container-verificar_buro">
                    <div class="container-fluid mt-4">
                        <center><h4 class="pt-4">Consultar Cliente</h4></center>
                        <select id="selector_cliente" class="form-control mt-4" name="" onchange="verificar_buro_cliente();">
                            <option id="option" selected="true" disabled>Seleccione la forma de verificación del cliente</option>
                            <option value="f_n_f">Nombre y Fecha</option>
                            <option value="curp">CURP</option>
                            <option value="rfc">RFC</option>
                        </select>
                    </div>

                    <div id="form_nom_fecha" class="container-fluid mt-4">
                        <div class="row">
                            <div class="col-12">
                                <label for="verificar_nom_client" class="control-label">Nombre Completo:</label>
                                <input id="verificar_nom_client" name="nombre_cliente" type="search" class="form-control" placeholder="Ingrese el nombre completo del cliente">
                            </div>
                            <div class="container mt-4">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="ap_paterno" class="control-label">Apellido Paterno:</label>
                                        <input id="verificar_ap_paterno" name="ap_paterno" type="search" class="form-control" placeholder="Ingrese el nombre paterno del cliente">
                                    </div>
                                    <div class="col-6">
                                        <label for="ap_materno" class="control-label">Apellido Materno:</label>
                                        <input id="verificar_ap_materno" name="ap_materno" type="search" class="form-control" placeholder="Ingrese el nombre materno del cliente">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <label for="veri_fecha_cli" class="control-label">Fecha de Nacimiento:</label>
                                <input id="veri_fecha_cli" type="date" class="form-control">
                            </div>
                        </div>
                    </div>


                    <div id="form_cliente_curp" class="container-fluid mt-4">
                        <div class="row">
                            <div class="col">
                                <label for="buscador_verif_curp" class="control-label">Ingrese el CURP:</label>
                                <input id="buscador_verif_curp" name="curp_cliente" type="search" class="form-control" placeholder="Ingrese el CURP del cliente">
                            </div>
                        </div>         
                    </div>

                    <div id="form_cliente_rfc" class="container-fluid mt-4">
                        <div class="row">
                            <div class="col">
                                <label for="buscador_verif_rfc" class="control-label">Ingrese el RFC:</label>
                                <input id="buscador_verif_rfc" name="rfc_cliente" type="search" class="form-control" placeholder="Ingrese el RFC del cliente">
                            </div>
                        </div>        
                    </div>
                    <button id="btn_buro_credito" class="btn btn-primary mt-5 mb-5" type="button">Buscar</button>
            </form>
        </div>
    </div>

    <!-- CARD DEL USUARIO -->
    <!-- MUESTRA EL ESTADO DEL CLIENTE EN EL BURO DE CRÉDITO -->

        <div class="col-sm-6 col-md-6 mt-4">
            <div class="container">
                <div class="card">
                    <center><h5 id="titulo_cliente" class="card-header">Cliente</h5></center>
                    <div class="card-body">
                        
                        <center>
                            <h5 class="card-title">Buró de Crédito</h5>
                            <img class="mt-4" src="img/user.png" alt="" style="height: 120px;">
                            <div class="container">
                                
                            </div>
                            <p class="mt-4">
                                <p id="mensaje_buro"><strong id="mensaje"></strong></p>
                            </p>
                            <button id="buscar_datos_domicilio" name="anchor" data-scroll href="#tabla_verif_domicilios" class="btn btn-outline-primary btn-sm buscar_datos_domicilio ir-domicilios mt-3">Ver Domicilio(s)</button>
                            <button id="buscar_datos_bancarios" data-scroll href="#tabla_verif_cuentas" class="btn btn-outline-primary btn-sm buscar_datos_bancarios mt-3 ir-bancarias">Ver Cuentas Bancarias</button>
                            <button id="buscar_datos_no_bancarios" data-scroll href="#tabla_verif_no_cuentas" class="btn btn-outline-primary btn-sm buscar_datos_no_bancarios mt-3 ir-no-bancarias">Ver Cuentas No Bancarias</button>
                        </center>
                
                    </div>
                </div>
            </div>
        </div>

        <!-- TABLA DONDE SE MUESTRAN LOS DATOS DEL CLIENTE -->

        <div id="tabla_verif_cliente" class="col-12">
            <div class="container mt-5">
                <table class="table table-bordered table_verif_cli pt-5" style="text-align:center;">
                </table>
            </div>
        </div>

    <div id="tabla_verif_domicilios" class="col-12"">
            <div class="container mt-5">
                <table class="table table-bordered table_verif_domicilio pt-5" style="text-align:center;">
                   
                </table>
            </div>
        </div>

    <div id="tabla_verif_cuentas" class="col-12">
            <div class="container mt-5">
                <table class="table table-bordered table_verif_cuentas pt-5" style="text-align:center;">
                </table>
            </div>
        </div>

    <div id="tabla_verif_no_cuentas" class="col-12">
            <div class="container mt-5">
                <table class="table table-bordered table_verif_no_cuentas pt-5" style="text-align:center;">
                </table>
            </div>
        </div>
    </div>

    <center><button style="width: 20%" class="btn btn-success ir-arriba"><i class="fa fa-arrow-up" aria-hidden="true"></i></button></center>
        </div>     
    </div>
</div>

@endsection