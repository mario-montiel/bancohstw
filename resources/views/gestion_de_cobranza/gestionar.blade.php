{{-- @extends('scripts/scripts') --}}
@extends('layouts/app')
@section('content')
<div class="tablagestion">
    <table class="table table-hover">
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
            <th scope="col">Colonia</th>
            <th scope="col">Calle</th>
            <th scope="col">C.P</th>
            <th scope="col">Num.Exterior</th>
            <th scope="col">Num. Interior</th>
            <th>Entre calles</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach($cli as $c)
          <tr>
          <td id="id">{{$c->cliente_id}}</td>
          <td>{{$c->name}}</td>
          <td>{{$c->cli_nom}}</td>
          <td>{{$c->cli_ap_paterno}}</td>
          <td>{{$c->cli_ap_materno}}</td>
          <td>{{$c->cli_fecha_nac}}</td>
          <td>{{$c->cli_curp}}</td>
          <td>{{$c->cli_rfc}}</td>
          <td>{{$c->cli_status}}</td>
          <td>{{$c->direccion_calle}}<td>
          <td>{{$c->direccion_colonia}}</td>
          <td>{{$c->direccion_codigo_postal}}</td>
          <td>{{$c->direccion_num_ext}}</td>
          <td>{{$c->direccion_num_int}}</td>
          <td>{{$c->direccion_entre_calles}}</td>
          </tr>
          @endforeach     
        </tbody>
      </table>
    {{-- {{ $cli->links() }}

    <ul class="pagination pagination-sm">
      <li class="page-item active" aria-current="page">
        <span class="page-link">
          1
          <span class="sr-only">(current)</span>
        </span>
      </li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
    </ul> --}}
</div>

@endsection