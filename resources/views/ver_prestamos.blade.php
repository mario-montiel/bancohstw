@extends('scripts/scripts')
@extends('globals/navbar')
@section('navbar')
@endsection
  <br>
  <br>
  <br>
  <br>
  <br>


  <div style="padding-left: 170px;" align="center">

      <div style="padding-left: 530px;" class="row">  
        <div>  
           <legend>Ver Prestamos</legend> 
        </div>
      </div>         

      <br>
      <br>
        <table class="table table-responsive table-hover">
        <thead>
            <tr>
                <th>Numero de prestamo</th>
                <th>Nombre Cliente</th>
                <th>Tipo de pago</th>
                <th>Monto del prestamo</th>
                <th>Fecha limite</th>
                <th>Tasa interes</th>
                <th>Monto total</th>
                <th>PDF</th>
            </tr>
        </thead>
        <tbody>     

          @foreach($prest as $campo)

          <tr>
                <th>{{ $campo->prest_id }}</th>
                <th>Axel Alberto Serna Roman</th>
                <th>{{ $campo->tipos_pagos_tipo_pago_id}}</th>
                <th>{{ $campo->prest_monto_sol }} $</th>
                <th>30/01/2020</th>
                <th>{{ $campo->prest_tasa }}%</th>
                <th>{{ $campo->prest_monto_total }} $</th>      
                <th><a class="btn btn-primary" id="boton_pdf"  href="ver_prestamos">PDF</a></th>
                <th><input type="text" name="prestamo_id" value="{{ $campo->prest_id }}" style="display: none;"></th>
          </tr>

          @endforeach

    <!--
    <?php// if(is_array($solicitudes)): ?>
    <?php// foreach($solicitudes as $row):?>  
    <tr>
            <td> <button class="btn btn-success" href="ver_prestamos_view"> PDF </button> <?php// echo $row['usu_rpe'];?></td>
            <td><?php// echo $row['usu_nombre'];?></td>
            <td><?php// echo $row['dep_nombre'];?></td>
            <td><a href="http://10.146.1.51/<?php// echo $row['sol_ruta']; ?>" target="_blank" class="btn btn-primary">ver</a>
            <td> <button type='submit' class='btn btn-danger'  name='rechazar' value='<?php// echo $row['sol_id']?>'>Rechazar</button></td>
            <td> <button type="submit" class="btn btn-success" name="autorizar" value='<?php// echo $row['sol_id']?>'>Autorizar</button></td>
       </tr> 
    <?php// endforeach;?>  
    <?php// endif; ?>
    -->

           <!--<input style="display: none" name="thisid" id="thisid" type="text" class="form-control" placeholder=""> -->
     
                         
          
        </tbody>
    </table>
    
  </div>

  <script src="js/bancohstw/prestamos_view">
  
  $("#boton_pdf").click(function(){
    alert("si jala");
  });


  </script>
