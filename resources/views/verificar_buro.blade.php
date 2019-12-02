@extends('scripts/scripts')
@extends('navbar')
@section('navbar')
@endsection

<div class="container mt-5">
    <div class="form pt-5">

        <div class="container-fluid mt-5">
            <center><h1>BURÓ DE CREDITO</h1></center>
            <select id="selector_cliente" class="form-control mt-4" name="" onchange="verificar_buro_cliente();">
                <option id="option" selected="true" disabled>Seleccione la forma de verificación del cliente</option>
                <option value="f_n_f">Nombre y Fecha</option>
                <option value="curp">CURP</option>
                <option value="rfc">RFC</option>
            </select>
        </div>

        <div id="form_nom_fecha" class="container-fluid mt-5">
            <div class="row">
                <div class="col">
                    <!-- <select class="selectpicker select_clientes" data-show-subtext="true" data-live-search="true">
                        <option data-subtext="Rep California">Tom Foolery</option>
                        <option data-subtext="Sen California">Bill Gordon</option>
                        <option data-subtext="Sen Massacusetts">Elizabeth Warren</option>
                        <option data-subtext="Rep Alabama">Mario Flores</option>
                        <option data-subtext="Rep Alaska">Don Young</option>
                        <option data-subtext="Rep California" disabled="disabled">Marvin Martinez</option>
                    </select> -->
                    <input id="verificar_nom_client" name="nombre_cliente" type="search" class="form-control" placeholder="Ingrese el nombre del cliente">
                </div>
                    
                <div class="col">
                    <input id="veri_fecha_cli" type="date" class="form-control">
                </div>
            </div>
        </div>


        <div id="form_cliente_curp" class="container-fluid mt-5">
            <div class="row">
                <div class="col">
                <input name="curp_cliente" type="search" class="form-control buscador_verif_curp" placeholder="Ingrese el CURP del cliente">
                </div>
            </div>         
        </div>

        <div id="form_cliente_rfc" class="container-fluid mt-5">
            <div class="row">
                <div class="col">
                    <input name="rfc_cliente" type="search" class="form-control buscador_verif_rfc" placeholder="Ingrese el RFC del cliente">
                </div>
            </div>        
        </div>

        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <table class="table table-bordered table_verif_cli">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Fecha de Nacimiento</th>
                                <th>CURP</th>
                                <th>RFC</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($usuarios as $usu)
                            <tr>
                                <td>{{$usu->cliente_id}}</td>
                                <td>{{$usu->cli_nom}}</td>
                                <td>{{$usu->ali_fecha_nac}}</td>
                                <td>{{$usu->cli_curp}}</td>
                                <td>{{$usu->cli_rfc}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
            <button id="botones" type="button" class="btn btn-primary" data-toggle="modal" data-target="#domicilios">Large modal</button>

            <div id="domicilios" class="modal fade bd-example-modal-lg domicilios" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle"> <center>Domicilios</center> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
                </div>
            </div>
            </div>


        </div>
                 
    </div>
</div>