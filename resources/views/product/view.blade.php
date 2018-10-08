@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Datos del Producto:</h4>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label">Clave:</label>
						<dd>{{ $producto->clave }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">Marca:</label>
						<dd>{{ $producto->marca }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">Descripción:</label>
						<dd>{{ $producto->descripcion }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">Precio de Lista:</label>
						<dd>${{ number_format($producto->precio_lista, 2) }}</dd>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-2 col-sm-offset-1">
						<label class="control-label">60 Meses:</label>
						<dd>${{ number_format($producto['m60'], 2) }}</dd>
					</div>
					<div class="form-group col-sm-2">
						<label class="control-label">48 Meses:</label>
						<dd>${{ number_format($producto['m48'], 2) }}</dd>
					</div>
					<div class="form-group col-sm-2">
						<label class="control-label">36 Meses:</label>
						<dd>${{ number_format($producto['m36'], 2) }}</dd>
					</div>
					<div class="form-group col-sm-2">
						<label class="control-label">24 Meses:</label>
						<dd>${{ number_format($producto['m24'], 2) }}</dd>
					</div>
					<div class="form-group col-sm-2">
						<label class="control-label">12 Meses:</label>
						<dd>${{ number_format($producto['m12'], 2) }}</dd>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-4">
						<label class="control-label">Apertura:</label>
						<dd>${{ number_format($producto->apertura, 2) }}</dd>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection