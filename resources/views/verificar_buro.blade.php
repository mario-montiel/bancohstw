@extends('scripts/scripts')
@extends('layouts/app')
@section('content')

<div class="container mt-5 pb-5">
    <div class="form">
    {{ csrf_field() }}
        <div class="container-fluid container-verificar_buro">
            <div class="container-fluid mt-5">
                <center><h1 class="pt-5">BURÓ DE CREDITO</h1></center>
                <select id="selector_cliente" class="form-control mt-4" name="" onchange="verificar_buro_cliente();">
                    <option id="option" selected="true" disabled>Seleccione la forma de verificación del cliente</option>
                    <option value="f_n_f">Nombre y Fecha</option>
                    <option value="curp">CURP</option>
                    <option value="rfc">RFC</option>
                </select>
            </div>

            <div id="form_nom_fecha" class="container-fluid mt-5">
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


            <div id="form_cliente_curp" class="container-fluid mt-5">
                <div class="row">
                    <div class="col">
                        <label for="buscador_verif_curp" class="control-label">Ingrese el CURP:</label>
                        <input id="buscador_verif_curp" name="curp_cliente" type="search" class="form-control" placeholder="Ingrese el CURP del cliente">
                    </div>
                </div>         
            </div>

            <div id="form_cliente_rfc" class="container-fluid mt-5">
                <div class="row">
                    <div class="col">
                        <label for="buscador_verif_rfc" class="control-label">Ingrese el RFC:</label>
                        <input id="buscador_verif_rfc" name="rfc_cliente" type="search" class="form-control" placeholder="Ingrese el RFC del cliente">
                    </div>
                </div>        
            </div>
            

            <div class="container mt-5 pb-5">
                <div class="row">
                    <div class="col">
                        <table class="table table-bordered table_verif_cli pt-5">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Fecha de Nacimiento</th>
                                    <th>CURP</th>
                                    <th>RFC</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($usuarios as $usu)
                                <tr>
                                    <td>{{$usu->cliente_id}}</td>
                                    <td>{{$usu->cli_nom}}</td>
                                    <td>{{$usu->cli_ap_paterno}}</td>
                                    <td>{{$usu->cli_ap_materno}}</td>
                                    <td>{{$usu->cli_fecha_nac}}</td>
                                    <td>{{$usu->cli_curp}}</td>
                                    <td>{{$usu->cli_rfc}}</td>

                                    <td>
                                    @if ( $usu->cli_status == "verde")
                                        <center><img src="/img/verde.png" alt="" srcset="" style="height:30px;"></center>
                                    @endif
                                    @if ( $usu->cli_status == "amarillo")
                                        <center><img src="/img/amarillo.png" alt="" srcset="" style="height:30px;"></center>
                                    @endif
                                    @if ( $usu->cli_status == "rojo")
                                        <center><img src="/img/rojo.png" alt="" srcset="" style="height:30px;"></center>
                                    @endif
                                    </td>
                               
                                </tr>
                                
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                

                <div id="domicilios" class="modal bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                </div>


            </div>
        </div>     
    </div>
</div>

@endsection