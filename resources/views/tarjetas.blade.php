<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>practicas eddy</title>
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
		<script src="../bootstrap/js2/jquery.min.js"></script>
	</head>
	<body>
		<br>
		<br>
		<br>
		<br>
		<br>
		<center><h1>Solicitud de tarjetas</h1></center>
		<div class="row">
			<div class="col-1"></div>
			<div class="col-10">
				<center class="mt-5">
					<div class="container">
						<div class="form-check col-md-6">
		  					<input class="form-check-input" type="radio" name="exampleRadios" id="credito" value="option1">
		  					<label class="form-check-label ml-5" for="exampleRadios1">credito</label>
						</div>
						<div class="form-check col-md-6">
		  					<input class="form-check-input" type="radio" name="exampleRadios" id="debito" value="option2">
		  					<label class="form-check-label ml-5" for="exampleRadios2">debito</label>
						</div>
					</div>
				</center>
			</div>
		</div>
		<div id="div_credito" class="row mt-5">
			<div class="col-1"></div>
			<div class="col-10">
				<div class="container border">
					<br>
					<br>
					<div class="form-group">
						<div class="row">
							<div class="col-1"></div>
							<div class="col-2 mt-3">
								<label>Número de cliente</label>
							</div>
							<div class="col-8">
								<input type="text" name="ncliente" id="ncliente" placeholder="#" class="form-control">
							</div>
							<div class="col-1"></div>
						</div>
						<div class="row mt-5">
							<div class="col-1"></div>
							<div class="col-2 mt-3">
								<label>RFC</label>
							</div>
							<div class="col-8">
								<input type="text" name="rfc" id="rfc" placeholder="RFC" class="form-control">
							</div>
							<div class="col-1"></div>
						</div>
						<div class="row mt-5">
							<div class="col-1"></div>
							<div class="container border col-10">
								<br>
								<p>En dado caso de no contar con la CURP, favor de registrar los datos restantes (Si se completa el campo de la CURP no es necesario el ingreso de información dentro de los demás campos de este contenedor de información).</p>
								<br>
								<div class="row">
									<div class="col-1"></div>
									<div class="col-2 mt-3">
										<label>CURP</label>
									</div>
									<div class="col-8">
										<input type="text" name="curp" id="curp" placeholder="CURP" class="form-control">
									</div>
									<div class="col-1"></div>
								</div>
								<hr>
								<div class="row">
									<div class="col-1"></div>
									<div class="col-2 mt-3">
										<label>Nombre Completo</label>
									</div>
									<div class="col-8">
										<input type="text" name="nombre" id="nombre" placeholder="Juan Paco Pancho Pedro de la Mar" class="form-control">
									</div>
									<div class="col-1"></div>
								</div>
								<div class="row">
									<div class="col-1"></div>
									<div class="col-3 mt-3">
										<label>Fecha de nacimiento</label>
									</div>
									<div class="col-8 mt-3">
										<input class="form-control" type="date" name="">
									</div>
								</div>
								<br>
							</div>
							<div class="col-1"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-1"></div>
		</div>
	</body>
	<script type="text/javascript">
		$(document).ready(function() {
		alert("popo");
		$("#debito").hide();
		});
	</script>
</html>