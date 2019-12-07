@extends('scripts/scripts')
@extends('layouts/app')
@section('content')
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
				<button type="submit" class="btn btn-primary">#Cliente</button>
			</div>
			<div class="col-1"></div>
			<div class="col-1">
				<button type="submit" class="btn btn-primary">Nombre</button>
			</div>
		</div>
		<br>
		<br>
		<form class="form-group" id="formrfc">
			<div class="container border">
				<br>
				<div class="row">
					<div class="col-3 mt-2">
						<center>
							<label>RFC:</label>
						</center>
					</div>
					<div class="col-8">
						<input type="text" class="form-control" placeholder="RFC" id="rfc">
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
		<form class="form-group" id="formcurp">
			<div class="container border">
				<br>
				<div class="row">
					<div class="col-3 mt-2">
						<center>
							<label>CURP:</label>
						</center>
					</div>
					<div class="col-8">
						<input type="text" class="form-control" placeholder="curp" id="rfc">
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
</div>
<br>
<br>
<br>
<br>

@endsection