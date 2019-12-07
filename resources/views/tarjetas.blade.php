@extends('scripts/scripts')
@extends('globals/navbar')
@section('navbar')
@endsection
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
<div id="div_credito" class="row mt-5">
	<div class="col-1"></div>
	<div class="col-10">
		<div class="container border">
			<br>
			<br>
			<form class="form-group" id="formesito" action="{{url('/tarjetas_clientes')}}" method="POST">
				@csrf
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
								<div class="col-7 mt-3">
									<input name="fecha" id="fecha" class="form-control" type="date" name="">
								</div>
							</div>
							<br>
						</div>
						<div class="col-1"></div>
					</div>
					<br>
					<div class="row">
						<div class="col-10"></div>
						<div class="col-1">
							<button type="submit" id="aceptar" class="btn btn-primary">Aceptar</button>
						</div>
					</div>
			</form>
			<form class="form-group" id="formsito2" action="{{url('/pifi')}}" method="POST">
					@csrf
					<div class="row">
						<div class="col-1"></div>
						<div class="col-2 mt-3">
							<label>Número de cliente</label>
						</div>
						<div class="col-8">
							<input type="text" name="ncliente2" id="ncliente2" placeholder="#" class="form-control">
						</div>
						<div class="col-1"></div>
					</div>
					<div class="row mt-5">
						<div class="col-1"></div>
						<div class="col-2 mt-3">
							<label>RFC</label>
						</div>
						<div class="col-8">
							<input type="text" name="rfc2" id="rfc2" placeholder="RFC" class="form-control">
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
									<input type="text" name="curp2" id="curp2" placeholder="CURP" class="form-control">
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
									<input type="text" name="nombre2" id="nombre2" placeholder="Juan Paco Pancho Pedro de la Mar" class="form-control">
								</div>
								<div class="col-1"></div>
							</div>
							<div class="row">
								<div class="col-1"></div>
								<div class="col-3 mt-3">
									<label>Fecha de nacimiento</label>
								</div>
								<div class="col-7 mt-3">
									<input name="fecha2" id="fecha2" class="form-control" type="date" name="">
								</div>
							</div>
							<br>
						</div>
						<div class="col-1"></div>
					</div>
					<br>
					<div class="row">
						<div class="col-10"></div>
						<div class="col-1">
							<button id="buro_boton" onclick="buro()" class="btn btn-primary">Buro?</button>
						</div>
					</div>
			</form>
		</div>
	</div>
	<div class="col-1"></div>
</div>
<br>
<br>
<br>
<br>

<script src="js/bancohstw/tarjetas.js"></script>