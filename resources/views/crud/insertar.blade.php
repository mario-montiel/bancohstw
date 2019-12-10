@extends('scripts/scripts')
@extends('layouts/app')
@section('content')
    
    <div class="iovanna">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Crear cliente
      </button>        
    </div>    

      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        
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
                    <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroup-sizing-default">Usuario</span>
                          </div>
                              <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="usuario" >
                    </div>
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
            </form>
          </div>
      </div>
      </div>
      {{-- TABLA VER CLIENTES --}}
      <div class="tablaclientes table-hover">
            <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido paterno</th>
                    <th scope="col">Apellido materno</th>
                    <th scope="col">Fecha de nacimiento</th>
                    <th scope="col">CURP</th>
                    <th scope="col">RFC</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($cli as $c)
                  <tr>
                  <td id="id"></td>
                  <td>{{$c->user_id}}</td>
                  <td>{{$c->cli_nom}}</td>
                  <td>{{$c->cli_ap_paterno}}</td>
                  <td>{{$c->cli_ap_materno}}</td>
                  <td>{{$c->cli_fecha_nac}}</td>
                  <td>{{$c->cli_curp}}</td>
                  <td>{{$c->cli_rfc}}</td>
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
                              <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Usuario</span>
                                    </div>
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="usuario" value="{{$c->usu_id}}" >
                              </div>
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
{{-- <script>

// $(document).on('click', '.eliminar', function (e) {
//     e.preventDefault();
//     var id = $(this).data('id');
//     swal({
//             title: "¿Estás seguro de eliminar este registro?!",
//             type: "Warning",
//             confirmButtonClass: "btn-danger",
//             confirmButtonText: "Si!",
//             showCancelButton: true,
//         },
//         function() {
//             $.ajax({
//                 type: "get",
//                 url: "/eliminar",
//                 data: {id:id},
//                 success: function (data) {
//                               //
//                     }         
//             });
//     });
// });
// </script> --}}