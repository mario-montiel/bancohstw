@extends('scripts.scripts')
@extends('layouts/app')
@section('content')

<script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

     <div class="iovanna">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Crear cliente
      </button>
    </div>

      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >

          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar Clientes</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
            <form action="/guardar" method="POST">
                    {{csrf_field()}}
                <div class="modal-body">

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Nombre</span>
                        </div>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nombre" required>
                        </div>
                    {{-- <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroup-sizing-default">Usuario</span>
                          </div>
                              <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="usuario" >
                    </div> --}}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Apellido paterno</span>
                                </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="appaterno" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Apellido materno</span>
                                </div>
                                      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="apmaterno" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Fecha de nacimiento</span>
                                </div>
                                    <input type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="fnac" required>
                                </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroup-sizing-default">CURP</span>
                                </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="curp" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">RFC</span>
                                </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="rfc" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Calle</span>
                                </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="calle" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Colonia</span>
                                </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="colonia" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">C.P</span>
                                </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="cp" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Num. interior</span>
                                </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="ni" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Num. Exterior</span>
                                </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="ne" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Entre calles</span>
                                </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="entrecalles" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <label class="input-group-text" for="inputGroupSelect01">País</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01">

                                  <option value="1">Mexico</option>
                                </select>
                              </div>
                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <label class="input-group-text" for="inputGroupSelect01">Estados</label>
                                </div>
                                <select class="custom-select" id="estados" onchange="gestionar();">
                                   @foreach ($query as $q)
                                <option value="{{$q->estado_id}}">{{$q->estado_nom}}</option>
                                   @endforeach

                                </select>
                              </div>
                              <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <label class="input-group-text" for="inputGroupSelect01">Ciudad</label>
                                    </div>
                                    <select class="custom-select" id="ciudades">
                                    </select>
                                  </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
            </form>
          </div>
      </div>
      </div>
      {{-- TABLA VER CLIENTES --}}
     <div class="table-responsive" >
            <table class="table table-hover ">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido paterno</th>
                    <th scope="col">Apellido materno</th>
                    <th scope="col">Fecha de nacimiento</th>
                    <th scope="col">CURP</th>
                    <th scope="col">RFC</th>
                    <th scope="col">Colonia</th>
                    <th scope="col">Calle</th>
                    <th scope="col" style="min-width:100px;">Código Postal <s/th>
                    <th scope="col">Num.Exterior</th>
                    <th scope="col">Num. Interior</th>
                    <th scope="col">Entre calles</th>
                    <th scope="col">Eliminar</th>
                    <th scope="col">Editar</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($cli as $c)
                  <tr>
                  <td id="id">{{$c->cliente_id}}</td>
                  <td>{{$c->cli_nom}}</td>
                  <td>{{$c->cli_ap_paterno}}</td>
                  <td>{{$c->cli_ap_materno}}</td>
                  <td>{{$c->cli_fecha_nac}}</td>
                  <td>{{$c->cli_curp}}</td>
                  <td>{{$c->cli_rfc}}</td>
                  <td>{{$c->direccion_colonia}}</td>
                  <td>{{$c->direccion_calle}}<td>
                  <td>{{$c->direccion_codigo_postal}}</td>
                  <td>{{$c->direccion_num_ext}}</td>
                  <td>{{$c->direccion_num_int}}</td>
                  <td>{{$c->direccion_entre_calles}}</td>
                  <td><a href="eliminar/{{$c->cliente_id}}" class="btn btn-danger eliminar" onclick="return confirm('Estás seguro?')" >Eliminar</a></td>
                  <td><button class="btn btn-warning editar" id="editar" data-toggle="modal" data-target="#editar_cliente{{$c->cliente_id}}" href="" >Editar</button>
                  <div class="modal fade" id="editar_cliente{{$c->cliente_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Editar Clientes</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                            </div>
                        <form action="{{url('/editar',$c->cliente_id)}}" method="POST">
                              {{csrf_field()}}
                          <div class="modal-body">

                                <input type="hidden" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="id" value="{{$c->cliente_id}}">
                              <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroup-sizing-default">Nombre</span>
                                  </div>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nombre" value="{{$c->cli_nom}}" >
                                  </div>
                              {{-- <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Usuario</span>
                                    </div>
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="usuario" value="{{$c->name}}" disabled >
                              </div> --}}
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default">Apellido paterno</span>
                                          </div>
                                              <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="appaterno" value="{{$c->cli_ap_paterno}}">
                                      </div>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default">Apellido materno</span>
                                          </div>
                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="apmaterno" value="{{$c->cli_ap_materno}}">
                                      </div>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default">Fecha de nacimiento</span>
                                          </div>
                                              <input type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="fnac" value="{{$c->cli_fecha_nac}}">
                                          </div>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default">CURP</span>
                                          </div>
                                              <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="curp" value="{{$c->cli_curp}}">
                                      </div>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default">RFC</span>
                                          </div>
                                              <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="rfc" value="{{$c->cli_rfc}}">
                                      </div>
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Calle</span>
                                        </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="calle" value="{{$c->direccion_colonia}}" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Colonia</span>
                                        </div>
                                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="colonia" value="{{$c->direccion_calle}}" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">C.P</span>
                                        </div>
                                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="cp" value="{{$c->direccion_codigo_postal}}" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Num. interior</span>
                                        </div>
                                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$c->direccion_num_int}}" name="ni" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Num. Exterior</span>
                                        </div>
                                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$c->direccion_num_ext}}" name="ne" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Entre calles</span>
                                        </div>
                                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$c->direccion_entre_calles}}" name="entrecalles" required>
                                    </div>
                                    <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <label class="input-group-text" for="inputGroupSelect01">País</label>
                                            </div>
                                            <select class="custom-select" id="inputGroupSelect01">

                                              <option value="1">Mexico</option>
                                            </select>
                                          </div>
                                          <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <label class="input-group-text" for="inputGroupSelect01">Estados</label>
                                            </div>
                                            <select class="custom-select" id="estados" onchange="gestionar();">
                                               @foreach ($query as $q)
                                            <option value="{{$q->estado_id}}">{{$q->estado_nom}}</option>
                                               @endforeach
            
                                            </select>
                                          </div>
                                          <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <label class="input-group-text" for="inputGroupSelect01">Ciudad</label>
                                                </div>
                                                <select class="custom-select" id="ciudades">
                                                </select>
                                            </div>
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                                      <button type="submit" class="btn btn-primary">Guardar</button>
                                  </div>
                      </form>
                    </div>
                </div>
                </div>


                </td>
                  </tr>
                  @endforeach
                </tbody>

            </table>
        </div>

        @endsection
        <script src="js/bancohstw/gestionar_clientes.js"></script>
{{-- <script type="text/javascript">

$("#estados").change(function(event){
    $.get("ciudades/"+event.target.value+"",function(res,estados){
        console.log(response);
    });
});

</script> --}}
