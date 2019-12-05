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
    <a class="navbar-brand" href="#">Navbar</a>
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
  

  <div align="center">

    <div class="card" style="width: 20%; text-align: left;">
      <h5 class="card-header">Inicio de sesión </h5>
      <div class="card-body">


        <p class="card-text">Usuario</p>
        <input class="form-control" type="text" name="usu_nom" id="id_textbox_usuario">
        <br>
        <p class="card-text">Contraseña</p>
        <input class="form-control" type="text" name="usu_pass" id="id_textbox_password">
        <br>
        <div style="text-align: right;">
          <button class="btn btn-primary"  id="btn_iniciar"> Iniciar </button>  
        </div>        

        
        
      


      </div>
    </div>
    
  </div>

  <script type="text/javascript">


    $("#btn_iniciar").click(function(){
      usu_nom = $("#id_textbox_usuario").val();
      usu_pass = $("#id_textbox_password").val();

      alert(usu_nom + " " +usu_pass);

      $.ajax({

           type:'POST',

           url:'home_axel',

           data:{usu_nom:usu_nom, usu_pass:usu_pass},

           success:function(data){

              alert(data.success);

           }

        });

    });
    

  </script>

  

</body>
</html>





