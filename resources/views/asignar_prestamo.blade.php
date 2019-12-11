@extends('scripts/scripts')
@extends('layouts/appAlcala')
@section('content')
    
    <div class="container  mt-5 pb-5">
        <div class="container-fluid">
            <div class="container-fluid container_asignar_prestamos mt-5 pl-5 pr-5 pb-5">
            @if(Session::has('solicitud_verde'))
                <p class="alert alert-success p" style="text-align:center;"> Cliente encontrado con Éxito! <br>
                    Va al corriente con sus pagos, SIGA ASÍ!
                </p>
            @endif
            @if(Session::has('solicitud_amarillo'))
                <p class="alert alert-success p" style="text-align:center;"> Cliente encontrado con Éxito! <br>
                    Tiene pagos RETRASADOS
                </p>
            @endif
                <form action="{{url('/prestamo_solicitado')}}" method="POST">
                {{ csrf_field() }}
                    <center><h1 class="pt-5">Asignar Préstamos</h1></center>
                    <input type="hidden" value="{{session()->get('verificar_solicitud')['cliente_id']}}" name="num_cliente">
                    <input type="hidden" value="{{session()->get('verificar_solicitud')['cli_nom']}}" name="nom_cliente">
                    <input type="hidden" value="{{session()->get('tipo')}}" name="tipo_tarjeta">
                    <div class="form-group mt-4">
                            <label for="numero_cliente" class="control-label">Número de Cliente:</label>
                            <input type="text" class="form-control" value="{{session()->get('verificar_solicitud')['cliente_id']}}" disabled>
                        </div>
                        <div class="form-group mt-4">
                            <label for="nombre_cliente" class="control-label">Nombre de Cliente:</label>
                            <input type="text" class="form-control" value="{{session()->get('verificar_solicitud')['cli_nom']}} {{session()->get('verificar_solicitud')['cli_ap_paterno']}} {{session()->get('verificar_solicitud')['cli_ap_materno']}}" disabled>
                        </div>
                        <!-- <div class="form-group mt-4">
                            <label for="nombre_cliente" class="control-label">Nombre de Cliente:</label>
                            <input type="date" class="form-control" disabled>
                        </div>

                        <div class="form-group mt-4">
                            <label for="fecha_nacimiento" class="control-label">Fecha de Nacimiento:</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required maxlength="15">
                        </div> -->
                        <div class="form-group mt-4">
                            <label for="monto_solicitado" class="control-label">Monto Solicitado:</label>
                            <input type="text" class="form-control" id="monto_solicitado" name="monto_solicitado" placeholder="Ingrese el monto que desea solicitar" required maxlength="15" int>
                        </div>
                        <div class="form-group mt-4">
                            <label for="plazo_pagar" class="control-label">Plazo de Pagos en Años:</label>
                            <select class="form-control" name="plazo_pagar" id="plazo_pagar">
                                <option value="1">1 año</option>
                                <option value="2">2 años</option>
                                <option value="4">4 años</option>
                                <option value="6">6 años</option>
                                <option value="8">8 años</option>
                                <option value="10">10 años</option>
                            </select>
                            <!-- <input type="number" class="form-control" id="" name="" placeholder="Seleccione el total de años que desea pagar el prestamo" required maxlength="15"> -->
                        </div>
                        <div class="form-group mt-4">
                            <label for="plazo_pagar" class="control-label">Plazo de Pagos en Años:</label>
                            <select class="form-control" name="plazo_pagar" id="tipo_pago">
                                <option value="1">Quincenal</option>
                                <option value="2">Mensual</option>
                            </select>
                            <!-- <input type="number" class="form-control" id="" name="" placeholder="Seleccione el total de años que desea pagar el prestamo" required maxlength="15"> -->
                        </div>
                        <button id="btn_asignar_prestamos" class="btn btn-primary" type="submit">Solicitar</button>
                </form>
            </div>
        </div>
    </div>

@endsection