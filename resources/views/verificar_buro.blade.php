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
        </div>  


                <!-- Botón en HTML (lanza el modal en Bootstrap) -->
            <button id="botones" href="#victorModal" role="button" class="btn btn-large btn-primary" data-toggle="modal">Abrir ventana modal</button>
            
            <!-- Modal / Ventana / Overlay en HTML -->
            <div id="victorModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">¿Estás seguro?</h4>
                        </div>
                        <div class="modal-body">
                            <p>¿Seguro que quieres borrar este elemento?</p>
                            <p class="text-warning"><small>Si lo borras, nunca podrás recuperarlo.</small></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-danger">Eliminar</button>
                        </div>
                    </div>
                </div>
            </div> 



    </div>
</div>