@extends('scripts/scripts')
@extends('layouts/app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-6">
            {{ csrf_field() }}
            <form action="" method="get" class="pb-5">
                <div class="container-fluid container-verificar_buro">
                    <div class="container-fluid mt-4">
                        <center><h3 class="pt-4">BURÓ DE CREDITO</h3></center>
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
                    @if(Session::has('usuario_encontrado'))
                        <p class="alert alert-success" style="text-align:center;"> Cliente encontrado! </p>
                    @endif
                    @if(Session::has('usuario_no_encontrado'))
                        <p class="alert alert-danger" style="text-align:center;"> El cliente no se encuentra en la Base de Datos! </p>
                    @endif
                    <center><h5 id="titulo_cliente" class="card-header">Cliente</h5></center>
                    <div class="card-body">
                        
                        <center>
                            <h5 class="card-title">Datos del Cliente</h5>
                            <img class="mt-4" src="img/user.png" alt="" style="height: 120px;">
                            <div class="container">
                                
                            </div>
                            <p class="mt-4">
                                <strong>El cliente está atrasado en unos pagos</strong>
                            </p>
                            <button class="btn btn-outline-primary btn-sm buscar_datos_domicilio mt-3" type="button">Ver Domicilio(s)</button>
                            <button class="btn btn-outline-primary btn-sm buscar_datos_bancarios mt-3">Ver Cuentas Bancarias</button>
                            <button class="btn btn-outline-primary btn-sm buscar_datos_no_bancarios mt-3">Ver Cuentas No Bancarias</button>
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

                <!-- <div id="domicilios" class="modal bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle"> <center>Domicilios</center> </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                    <div class="form-group">
                        <label for="codigo" class="control-label">Cliente:</label>
                        <input disabled type="text" class="form-control" id="cliente" name="cliente" required maxlength="2">
                    </div>
                    <div class="form-group">
                        <label for="nombre" class="control-label">Calle:</label>
                        <input disabled type="text" class="form-control" id="calle" name="calle" required maxlength="45">
                    </div>
                    <div class="form-group">
                        <label for="moneda" class="control-label">Numero Exterior:</label>
                        <input disabled type="text" class="form-control" id="numero_ext" name="numero_ext" required maxlength="3">
                    </div>
                    <div class="form-group">
                        <label for="capital" class="control-label">Colonia:</label>
                        <input disabled type="text" class="form-control" id="colonia" name="colonia" required maxlength="30"> 
                    </div>
                    <div class="form-group">
                        <label for="continente" class="control-label">Ciudad:</label>
                        <input disabled type="text" class="form-control" id="ciudad" name="ciudad" required maxlength="15">
                    </div>
                    <div class="form-group">
                        <label for="continente" class="control-label">Estado:</label>
                        <input disabled type="text" class="form-control" id="estado" name="estado" required maxlength="15">
                    </div>
                    <div class="form-group">
                        <label for="continente" class="control-label">Codigo Postal:</label>
                        <input disabled type="text" class="form-control" id="codigo_postal" name="codigo_postal" required maxlength="15">
                    </div>

                    </div>
                    <div class="modal-footer">
                        <button id="botonPrueba" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                    </div>
                </div>
                </div>




                <div id="creditos_bancarios" class="modal bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle"> <center>Créditos Bancarios</center> </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                    <div class="form-group">
                        <label for="codigo" class="control-label">Nombre de la Institución:</label>
                        <input disabled type="text" class="form-control" id="nombre_institucion" name="nombre_institucion" required maxlength="2">
                    </div>
                    <div class="form-group">
                        <label for="nombre" class="control-label">Código Identificador:</label>
                        <input disabled type="text" class="form-control" id="codigo" name="codigo" required maxlength="45">
                    </div>
                    <div class="form-group">
                        <label for="moneda" class="control-label">Descripción:</label>
                        <input disabled type="text" class="form-control" id="descripcion" name="descripcion" required maxlength="3">
                    </div>
                    <div class="form-group">
                        <label for="capital" class="control-label">Estado:</label>
                        <input disabled type="text" class="form-control" id="estado" name="estado" required maxlength="30"> 
                    </div>
                    <div class="form-group">
                        <label for="continente" class="control-label">Comportamiento:</label>
                        <input disabled type="text" class="form-control" id="comportamiento" name="comportamiento" required maxlength="15">
                    </div>

                    </div>
                    <div class="modal-footer">
                        <button id="botonPrueba" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                    </div>
                </div>
                </div>



                <div id="creditos_no_bancarios" class="modal bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle"> <center>Créditos No Bancarios</center> </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                    <div class="form-group">
                        <label for="codigo" class="control-label">Nombre de la Institución:</label>
                        <input disabled type="text" class="form-control" id="nombre_institucion0" name="nombre_institucion0" required maxlength="2">
                    </div>
                    <div class="form-group">
                        <label for="nombre" class="control-label">Código Identificador:</label>
                        <input disabled type="text" class="form-control" id="codigo0" name="codigo0" required maxlength="45">
                    </div>
                    <div class="form-group">
                        <label for="moneda" class="control-label">Descripción:</label>
                        <input disabled type="text" class="form-control" id="descripcion0" name="descripcion0" required maxlength="3">
                    </div>
                    <div class="form-group">
                        <label for="capital" class="control-label">Estado:</label>
                        <input disabled type="text" class="form-control" id="estado0" name="estado0" required maxlength="30"> 
                    </div>
                    <div class="form-group">
                        <label for="continente" class="control-label">Comportamiento:</label>
                        <input disabled type="text" class="form-control" id="comportamiento0" name="comportamiento0" required maxlength="15">
                    </div>

                    </div>
                    <div class="modal-footer">
                        <button id="botonPrueba" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                    </div>
                </div>
                </div> -->


            
        </div>     
    </div>
</div>

@endsection