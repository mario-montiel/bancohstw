@extends('scripts/scripts')
@extends('layouts/app')
@section('content')
<div class="container">
                <div class="row">
                    <div class="col">
                    @if(Session::has('usuario_encontrado'))
                        <p class="alert alert-success p" style="text-align:center;"> Cliente encontrado! </p>
                    @endif
                    @if(Session::has('usuario_no_encontrado'))
                        <p class="alert alert-danger p" style="text-align:center;"> El cliente no se encuentra en la Base de Datos! </p>
                    @endif
                    <center><h1 class="mt-3 mb-5">Cliente</h1></center>
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

@endsection