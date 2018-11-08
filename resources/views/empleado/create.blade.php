@extends('layouts.blank')
@section('content')

<div class="container">
	<div role="application" class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Datos del Empleado:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a href="{{ route('empleados.index') }}" class="btn btn-primary">
							<strong>Ver Empleados</strong>
						</a>
					</div>
				</div>
			</div>
		</div>
		@if($edit)
		<form role="form" method="POST" action="{{ route('empleados.update', ['empleado' => $empleado]) }}">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PUT">
		@else
		<form role="form" id="form-empleado" method="POST" action="{{ route('empleados.store') }}" name="form">
			{{ csrf_field() }}
		@endif
			<div class="panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="appaterno">✱Apellido Paterno:</label>
							<input type="text" class="form-control" id="appaterno" name="appaterno" required="required" value="{{ $empleado->appaterno }}">
						</div>
						<div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="apmaterno">✱Apellido Materno:</label>
							<input type="text" id="apmaterno" class="form-control" name="apmaterno" required="required" value="{{ $empleado->apmaterno }}">
						</div>
						<div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="nombre">✱Nombre(s):</label>
							<input type="text" class="form-control" id="nombre" name="nombre" required="required" value="{{ $empleado->nombre }}">
						</div>
						<div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="rfc">✱RFC:</label>
							<input type="text" class="form-control" id="rfc" name="rfc" value="{{ $empleado->rfc }}" required="">
						</div>
					</div>
				</div>
			</div>
			@if($edit)
				<ul class="nav nav-tabs nav-justified">
					<li class="active"><a href="{{ route('empleados.show', ['empleado' => $empleado]) }}">Generales:</a></li>
					<li class=""><a href="{{ route('empleados.datoslaborales.index', ['empleado' => $empleado]) }}">Laborales:</a></li>
					<li class=""><a href="{{ route('empleados.estudios.index', ['empleado' => $empleado]) }}">Estudios:</a></li>
					<li class=""><a href="{{ route('empleados.emergencias.index', ['empleado' => $empleado]) }}">Emergencias:</a></li>
					<li class=""><a href="{{ route('empleados.vacaciones.index', ['empleado' => $empleado]) }}">Vacaciones:</a></li>
					<li class=""><a href="{{ route('empleados.faltas.index', ['empleado' => $empleado]) }}">Administrativo:</a></li>
				</ul>
			@endif
			<div class="panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="telefono">Teléfono:</label>
							<input type="text" class="form-control" name="telefono" id="telefono" value="{{ $empleado->telefono }}">
						</div>
						<div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="movil">Celular:</label>
							<input type="text" class="form-control" name="movil" id="movil" value="{{ $empleado->movil }}">
						</div>
						<div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="email">✱Correo electrónico:</label>
							<input type="text" class="form-control" name="email" id="email" value="{{ $empleado->email }}" required="">
						</div><div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="nss">NSS (IMSS):</label>
							<input type="text" class="form-control" name="nss" id="nss" value="{{ $empleado->nss }}">
						</div>
						<div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="curp">CURP:</label>
							<input type="text" class="form-control" name="curp" id="curp" value="{{ $empleado->curp }}">
						</div>
						<div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="infonavit">INFONAVIT:</label>
							<input type="text" class="form-control" name="infonavit" id="infonavit" value="{{ $empleado->infonavit }}">
						</div>
						<div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="fnac">Fecha de nacimiento:</label>
							<input type="date" class="form-control" name="fnac" id="fnac" value="{{ $empleado->fnac }}">
						</div>
						<div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="cp">Código Postal:</label>
							<input type="text" class="form-control" name="cp" id="cp" value="{{ $empleado->cp }}">
						</div>
						<div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="calle">Calle:</label>
							<input type="text" class="form-control" name="calle" id="calle" value="{{ $empleado->calle }}">
						</div>
						<div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="numext">Número Exterior:</label>
							<input type="text" class="form-control" name="numext" id="numext" value="{{ $empleado->numext }}">
						</div>
						<div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="numint">Número Interior:</label>
							<input type="text" class="form-control" name="numint" id="numint" value="{{ $empleado->numint }}">
						</div><div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="colonia">Colonia:</label>
							<input type="text" class="form-control" name="colonia" id="colonia" value="{{ $empleado->colonia }}">
						</div>
						<div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="municipio">Municipio:</label>
							<input type="text" class="form-control" name="municipio" id="municipio" value="{{ $empleado->municipio }}">
						</div>
						<div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="estado">Estado:</label>
							<input type="text" class="form-control" name="estado" id="estado" value="{{ $empleado->estado }}">
						</div>
						<div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="referencia">Referencia:</label>
							<input type="text" class="form-control" name="referencia" id="referencia" value="{{ $empleado->referencia }}">
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-sm-4 col-sm-offset-4 text-center form-group">
							<button type="submit" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Guardar</button>
						</div>
						<div class="col-sm-4 text-right text-danger">
							<h5>✱Campos Requeridos</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

@endsection