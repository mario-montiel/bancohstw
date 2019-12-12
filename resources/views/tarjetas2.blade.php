@extends('layouts/app')
@section('content')
<br>
<br>
<center>
	<h1>Datos de la tarjeta</h1>
</center>
<br>
<div class="container border">
	<form class="form-group" action="{{url('/tarjetadebito')}}" method="POST">
		@csrf
		<br>
		<div class="row">
			<div class="col-1"></div>
			<div class="col-2 mt-2">
				<label >id cliente:</label>
			</div>
			<div class="col-8">
				<input type="text" class="form-control" name="cliente" id="cliente" value="{{$cliente}}" readonly>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-1"></div>
			<div class="col-2 mt-2">
				<label>Tipo de tarjeta:</label>
			</div>
			<div class="col-8">
				<select class="form-control" id="tipo" name="tipo">
					@foreach($tiposdetarjetas as $tj)
					<option value="{{$tj->tipo_tarjeta_id}}">{{$tj->tipo_tarjeta_nombre}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-1"></div>
			<div class="col-2 mt-2">
				<label >Tipo:</label>
			</div>
			<div class="col-8">
				<input type="text" class="form-control" name="tipocd" id="tipocd" value="{{$tipo}}" readonly>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-1"></div>
			<div class="col-2 mt-2">
				<label>Numero de tarjeta:</label>
			</div>
			<div class="col-8">
				<input type="text" class="form-control" name="numero" id="numero" required>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-1"></div>
			<div class="col-2 mt-2">
				<label>Fecha de vencimiento:</label>
			</div>
			<div class="col-8">
				<input type="date" class="form-control" name="fecha" id="fecha" required>
			</div>
		</div>
		<div class="row">
			<div class="col-10"></div>
			<div class="col-1">
				<button type="submit" class="btn btn-primary">Aceptar</button>
			</div>
		</div>
	</form>
</div>
@endsection