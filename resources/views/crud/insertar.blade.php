@extends('base.base')
      <!-- Modal -->
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
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nombre">
                        </div>
                    <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroup-sizing-default">Usuario</span>
                          </div>
                              <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="usuario">
                    </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Apellido paterno</span>
                                </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="appaterno">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Apellido materno</span>
                                </div>
                                      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="apmaterno">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Fecha de nacimiento</span>
                                </div>
                                    <input type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="fnac">
                                </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroup-sizing-default">CURP</span>
                                </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="curp">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">RFC</span>
                                </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="rfc">
                            </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
            </form>
          </div>
      </div>
      </div>
      {{-- TABLA VER CLIENTES --}}
      <div class="tablaclientes">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido paterno</th>
                    <th scope="col">Apellido materno</th>
                    <th scope="col">Fecha de nacimiento</th>
                    <th scope="col">CURP</th>
                    <th scope="col">RFC</th>
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
                  <td><a href="{{url('/eliminar', $c->cliente_id)}}" onclick="return confirm('¿Seguro que quiere eliminar este registro?')" class="btn btn-danger">Eliminar</a></td>
                  <td><button class="btn btn-warning editar" id="editar"  data-toggle="modal" data-target="#editar_cliente" href="" >Editar</button></td> 
                  </tr>
                  @endforeach     
                </tbody>
              </table>
        </div>
       
        {{-- MODAL EDITAR CLIENTE --}}    
                <div class="modal fade" id="editar_cliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Editar Clientes</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                            </div>
                      <form action="/editar" method="POST">
                              {{csrf_field()}}
                          <div class="modal-body">
                                  
                              <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroup-sizing-default">Nombre</span>
                                  </div>
                                      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nombre">
                                  </div>
                              <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Usuario</span>
                                    </div>
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="usuario">
                              </div>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default">Apellido paterno</span>
                                          </div>
                                              <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="appaterno">
                                      </div>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default">Apellido materno</span>
                                          </div>
                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="apmaterno">
                                      </div>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default">Fecha de nacimiento</span>
                                          </div>
                                              <input type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="fnac">
                                          </div>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default">CURP</span>
                                          </div>
                                              <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="curp">
                                      </div>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default">RFC</span>
                                          </div>
                                              <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="rfc">
                                      </div>
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                      
                                      <button type="submit" class="btn btn-primary">Guardar</button>
                                  </div>
                      </form>
                    </div>
                </div>
                </div>
        {{-- <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul> --}}
