@extends('scripts/scripts')
@extends('navbar')
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
						<br>
					</div>
					<div class="col-1"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-1"></div>
</div>