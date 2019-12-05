<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>LOGIN</title>
    
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="../bootstrap/js2/jquery.min.js"></script>
  <script src="../bootstrap/js2/jquery.js"></script>
  <script src="../bootstrap/js2/jquery-ui.min.js"></script>    
  <script src="../bootstrap/js2/bootstrap.min.js"></script>

</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">HSTW</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown link
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <br>
  <br>
  <br>

  <?php
  $no_pago = '69420';
  $nom_cli = 'Axel Alberto Serna Roman';
  $tipo_pago = 'mensual';
  $monto_p = '12,000 $';
  $fecha_l = '30/11/2019';
  $tasa_i = '3%';
  $monto_t = '12,360 $';

  ?>
  

  <div align="center">

      <div class="row">  
        <div class="col-md-12">  
           <legend>Ver Prestamos</legend> 
        </div>
      </div>         
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
          
          <tr>
                <th><?php echo $no_pago; ?></th>
                <th><?php echo $nom_cli; ?></th>
                <th><?php echo $tipo_pago; ?></th>
                <th><?php echo $monto_p; ?></th>
                <th><?php echo $fecha_l; ?></th>
                <th><?php echo $tasa_i; ?></th>
                <th><?php echo $monto_t; ?></th>
                <th><a class="btn btn-primary" href="/bancohstw/public/ver_prestamos">PDF</a></th>
          </tr>

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

  <script type="text/javascript">




  </script>
