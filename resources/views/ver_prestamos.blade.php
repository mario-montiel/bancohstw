@extends('scripts/scripts')
@extends('layouts/app')
@section('content')

  
  <br>
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  @csrf
  <center>


      <div>  
        <center>  
           <legend>Tus Prestamos</legend> 
        </center>
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
                <th><button class="btn btn-primary btn_pdf" value="{{ $campo->prest_id }}">PDF</button></th>     
          </tr>

          @endforeach

    <!--  style="display: none;"
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
    
  </center>

  <br><br><br><br><br><br><br><br>

  <div id="capa"></div>

  <script type="text/javascript">

  $( ".btn_pdf" ).click(function() {
    prest_id = $(this).val();
    
    //alert(prest_id);
    
    $.ajax({
          type : 'POST',
          url  : 'ver_prestamos',
          dataType : 'html',

          data: {
           "_token": "{{ csrf_token() }}",
            prest_id : prest_id            
          },
          success : function(html){
            //alert("si jalo");
            window.location.href = "ver_prestamos_g/"+prest_id;

            
          },  
          error : function(XMLHttpRequest, textStatus, errorThrown) {
            alert("Ocurrio un error");
          }
      }); //$.ajax 
        
  });



  </script>


@endsection