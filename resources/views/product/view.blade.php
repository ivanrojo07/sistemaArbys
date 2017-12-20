@extends('layouts.blank')
@section('content')
	<div class="container">
		<div class="panel panel-group">
			<div class="panel-default">
				<div class="panel-heading"><h4>Datos del producto</h4></div>
				<div class="panel-body">
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label">Clave:</label>
						<dd>{{$producto->clave}}</dd>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label">Marca:</label>
						<dd>{{$producto->marca}}</dd>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label">Descripción:</label>
						<dd>{{$producto->descripcion}}</dd>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label">Precio de Lista:</label>
						<dd>${{number_format($producto->precio_lista,2)}}</dd>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label">Mensualidad para personas fisicas:</label>
						<dd>${{number_format($producto->mensualidad_p_fisica,2)}}</dd>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label">Mensualidad para personas morales:</label>
						<dd>${{number_format($producto->mensualidad_p_moral,2)}}</dd>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label">Pago de Apertura:</label>
						<dd>${{number_format($producto->apertura,2)}}</dd>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label">Pago inicial:</label>
						<dd>${{number_format($producto->inicial,2)}}</dd>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection