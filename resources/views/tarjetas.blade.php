@extends('layouts/app')
@section('content')
<br>
<br>
<br>
<br>
@if($errors->any())
<center>
	<div class="alert alert-info" role="alert">
	  {{$errors->first()}}
	</div>
</center>
@endif
<br>
<center><h1>Solicitud de tarjetas</h1></center>
<div class="row">
	<div class="col-1"></div>
	<div class="col-10">
		<center class="mt-5">
			<div class="container">
				<div class="form-check col-md-2">
  					<input class="form-check-input" type="radio" name="exampleRadios" id="credito" onchange="credito()" value="option1">
  					<label class="form-check-label" for="exampleRadios1">credito</label>
				</div>
				<div class="form-check col-md-2">
  					<input class="form-check-input" type="radio" name="exampleRadios" id="debito" onchange="debito()" value="option2">
  					<label class="form-check-label" for="exampleRadios2">debito</label>
				</div>
			</div>
		</center>
	</div>
</div>
<br>
<br>
<br>
<div id="botones_credito">
	<div class="container border">
		<br>
		<center>
			<p>Para registrar la tarjeta se requieren de los datos del cliente. Elija la opción con la que cuenta información:</p>
		</center>
		<div class="row">
			<div class="col-2"></div>
			<div class="col-1">
				<button type="submit" class="btn btn-primary" onclick="botonderfc()">RFC</button>
			</div>
			<div class="col-1"></div>
			<div class="col-1">
				<button type="submit" class="btn btn-primary" onclick="botoncurp()">CURP</button>
			</div>
			<div class="col-1"></div>
			<div class="col-1">
				<button type="submit" class="btn btn-primary" onclick="botonnum()">#Cliente</button>
			</div>
			<div class="col-1"></div>
			<div class="col-1">
				<button type="submit" class="btn btn-primary" onclick="botonnombre()">Nombre</button>
			</div>
		</div>
		<br>
		<br>
		<form class="form-group" id="formrfc" action="{{url('/RFC1')}}" method="POST">
			@csrf
			<div class="container border">
				<br>
				<div class="row">
					<div class="col-3 mt-2">
						<center>
							<label>RFC:</label>
						</center>
					</div>
					<div class="col-8">
						<input type="text" class="form-control" placeholder="RFC" id="rfc" name="rfc" required>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-10"></div>
					<div class="col-1">
						<button type="submit" class="btn btn-primary">Aceptar</button>
					</div>
				</div>
				<br>
			</div>
		</form>
		<form class="form-group" id="formcurp" action="{{url('/curp1')}}" method="POST">
			@csrf
			<div class="container border">
				<br>
				<div class="row">
					<div class="col-3 mt-2">
						<center>
							<label>CURP:</label>
						</center>
					</div>
					<div class="col-8">
						<input type="text" class="form-control" placeholder="curp" id="curp" name="curp" required>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-10"></div>
					<div class="col-1">
						<button type="submit" class="btn btn-primary">Aceptar</button>
					</div>
				</div>
				<br>
			</div>
		</form>
		<form class="form-group" id="formnumero" action="{{url('/numero1')}}" method="POST">
			@csrf
			<div class="container border">
				<br>
				<div class="row">
					<div class="col-3 mt-2">
						<center>
							<label>Número de cliente:</label>
						</center>
					</div>
					<div class="col-8">
						<input type="text" class="form-control" placeholder="#" id="numero" name="numero" required>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-10"></div>
					<div class="col-1">
						<button type="submit" class="btn btn-primary">Aceptar</button>
					</div>
				</div>
				<br>
			</div>
		</form>
		<form class="form-group" id="formnombre" action="{{url('/nombre1')}}" method="POST">
			@csrf
			<div class="container border">
				<br>
				<div class="row">
					<div class="col-3 mt-2">
						<center>
							<label>Nombre:</label>
						</center>
					</div>
					<div class="col-8">
						<input type="text" class="form-control" placeholder="Juan" id="nombre" name="nombre" required>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-3 mt-2">
						<center>
							<label>Apellido paterno:</label>
						</center>
					</div>
					<div class="col-8">
						<input type="text" class="form-control" placeholder="Rodriguez" id="AP" name="AP" required>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-3 mt-2">
						<center>
							<label>Apellido materno:</label>
						</center>
					</div>
					<div class="col-8">
						<input type="text" class="form-control" placeholder="Gonzalez" id="AM" name="AM" required>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-3 mt-2">
						<center>
							<label>Fecha de nacimiento:</label>
						</center>
					</div>
					<div class="col-8">
						<input type="date" class="form-control" name="fecha" id="fecha" required>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-10"></div>
					<div class="col-1">
						<button type="submit" class="btn btn-primary">Aceptar</button>
					</div>
				</div>
				<br>
			</div>
		</form>
		<br>
	</div>
</div>
<div id="botones_debito">
	<div class="container border">
		<br>
		<center>
			<p>Para registrar la tarjeta se requieren de los datos del cliente. Elija la opción con la que cuenta información:</p>
		</center>
		<div class="row">
			<div class="col-2"></div>
			<div class="col-1">
				<button type="submit" class="btn btn-primary" onclick="botonderfc2()">RFC</button>
			</div>
			<div class="col-1"></div>
			<div class="col-1">
				<button type="submit" class="btn btn-primary" onclick="botoncurp2()">CURP</button>
			</div>
			<div class="col-1"></div>
			<div class="col-1">
				<button type="submit" class="btn btn-primary" onclick="botonnum2()">#Cliente</button>
			</div>
			<div class="col-1"></div>
			<div class="col-1">
				<button type="submit" class="btn btn-primary" onclick="botonnombre2()">Nombre</button>
			</div>
		</div>
		<br>
		<br>
		<form class="form-group" id="formrfc2" action="{{url('/rfc2')}}" method="POST">
			@csrf
			<div class="container border">
				<br>
				<div class="row">
					<div class="col-3 mt-2">
						<center>
							<label>RFC:</label>
						</center>
					</div>
					<div class="col-8">
						<input type="text" class="form-control" placeholder="RFC" id="rfc2" name="rfc2" required>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-10"></div>
					<div class="col-1">
						<button type="submit" class="btn btn-primary">Aceptar</button>
					</div>
				</div>
				<br>
			</div>
		</form>
		<form class="form-group" id="formcurp2" action="{{url('/curp2')}}" method="POST">
			@csrf
			<div class="container border">
				<br>
				<div class="row">
					<div class="col-3 mt-2">
						<center>
							<label>CURP:</label>
						</center>
					</div>
					<div class="col-8">
						<input type="text" class="form-control" placeholder="curp" id="curp2" name="curp2" required>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-10"></div>
					<div class="col-1">
						<button type="submit" class="btn btn-primary">Aceptar</button>
					</div>
				</div>
				<br>
			</div>
		</form>
		<form class="form-group" id="formnumero2" action="{{url('/numero2')}}" method="POST">
			@csrf
			<div class="container border">
				<br>
				<div class="row">
					<div class="col-3 mt-2">
						<center>
							<label>Número de cliente:</label>
						</center>
					</div>
					<div class="col-8">
						<input type="text" class="form-control" placeholder="#" id="numero2" name="numero2" required>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-10"></div>
					<div class="col-1">
						<button type="submit" class="btn btn-primary">Aceptar</button>
					</div>
				</div>
				<br>
			</div>
		</form>
		<form class="form-group" id="formnombre2" action="{{url('/nombre2')}}" method="POST">
			@csrf
			<div class="container border">
				<br>
				<div class="row">
					<div class="col-3 mt-2">
						<center>
							<label>Nombre:</label>
						</center>
					</div>
					<div class="col-8">
						<input type="text" class="form-control" placeholder="Juan" id="nombre2" name="nombre2" required>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-3 mt-2">
						<center>
							<label>Apellido paterno:</label>
						</center>
					</div>
					<div class="col-8">
						<input type="text" class="form-control" placeholder="Rodriguez" id="AP2" name="AP2" required>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-3 mt-2">
						<center>
							<label>Apellido materno:</label>
						</center>
					</div>
					<div class="col-8">
						<input type="text" class="form-control" placeholder="Gonzalez" id="AM2" name="AM2" required>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-3 mt-2">
						<center>
							<label>Fecha de nacimiento:</label>
						</center>
					</div>
					<div class="col-8">
						<input type="date" class="form-control" name="fecha2" id="fecha2" required>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-10"></div>
					<div class="col-1">
						<button type="submit" class="btn btn-primary">Aceptar</button>
					</div>
				</div>
				<br>
			</div>
		</form>
		<br>
	</div>
</div>
<br>
<br>
<br>
<br>

@endsection