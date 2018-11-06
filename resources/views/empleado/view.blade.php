@extends('layouts.blank')
@section('content')

<div class="container">
	<div role="application" class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4 form-group">
						<h4>Datos del Empleado:</h4>
					</div>
					<div class="col-sm-4 text-center form-group">
						<a class="btn btn-success" href="{{ route('empleados.create') }}">
							<i class="fa fa-plus"></i><strong> Agregar Empleado</strong>
						</a>
					</div>
					<div class="col-sm-4 text-center form-group">
						<a class="btn btn-primary" href="{{ route('empleados.index') }}">
							<i class="fa fa-bars"></i><strong> Lista de Empleados</strong>
						</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="form-group col-md-3 col-sm-4 col-xs-12">
						<label class="control-label" for="appaterno">Apellido Paterno:</label>
						<dd>{{ $empleado->appaterno }}</dd>
					</div>
					<div class="form-group col-md-3 col-sm-4 col-xs-12">
						<label class="control-label" for="apmaterno">Apellido Materno:</label>
						<dd>{{ $empleado->apmaterno }}</dd>
					</div>
					<div class="form-group col-md-3 col-sm-4 col-xs-12">
						<label class="control-label" for="nombre">Nombre(s):</label>
						<dd>{{ $empleado->nombre }}</dd>
					</div>
					<div class="form-group col-md-3 col-sm-4 col-xs-12">
						<label class="control-label" for="rfc">RFC:</label>
						<dd>{{ $empleado->rfc }}</dd>
					</div>
				</div>
			</div>
			<ul class="nav nav-tabs nav-justified">
				<li class="active"><a href="{{ route('empleados.show', ['empleado' => $empleado]) }}">Generales:</a></li>
				<li class=""><a href="{{ route('empleados.datoslaborales.index', ['empleado' => $empleado]) }}">Laborales:</a></li>
				<li class=""><a href="{{ route('empleados.estudios.index', ['empleado' => $empleado]) }}">Estudios:</a></li>
				<li class=""><a href="{{ route('empleados.emergencias.index', ['empleado' => $empleado]) }}">Emergencias:</a></li>
				<li class=""><a href="{{ route('empleados.vacaciones.index', ['empleado' => $empleado]) }}">Vacaciones:</a></li>
				<li class=""><a href="{{ route('empleados.faltas.index', ['empleado' => $empleado]) }}">Administrativo:</a></li>
			</ul>
			<div class="panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="telefono">Teléfono:</label>
							<dd>{{ $empleado->telefono ? $empleado->telefono : 'N/A' }}</dd>
						</div>
						<div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="movil">Celular:</label>
							<dd>{{ $empleado->movil ? $empleado->movil : 'N/A' }}</dd>
						</div>
						<div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="email">Correo electrónico:</label>
							<dd>{{ $empleado->email ? $empleado->email : 'N/A' }}</dd>
						</div>
						<div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="nss">NSS (IMSS):</label>
							<dd>{{ $empleado->nss ? $empleado->nss : 'N/A' }}</dd>
						</div>
						<div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="curp">CURP:</label>
							<dd>{{ $empleado->curp ? $empleado->curp : 'N/A' }}</dd>
						</div>
						<div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="infonavit">INFONAVIT:</label>
							<dd>{{ $empleado->infonavit ? $empleado->infonavit : 'N/A' }}</dd>
						</div>
						<div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="fnac">Fecha de nacimiento:</label>
							<dd>{{ $empleado->fnac ? $empleado->fnac : 'N/A' }}</dd>
						</div>
						<div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="cp">Código Postal:</label>
							<dd>{{ $empleado->cp ? $empleado->cp : 'N/A' }}</dd>
						</div>
						<div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="calle">Calle:</label>
							<dd>{{ $empleado->calle ? $empleado->calle : 'N/A' }}</dd>
						</div>
						<div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="numext">Número Exterior:</label>
							<dd>{{ $empleado->numext ? $empleado->numext : 'N/A' }}</dd>
						</div>
						<div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="numint">Número Interior:</label>
							<dd>{{ $empleado->numint ? $empleado->numint : 'N/A' }}</dd>
						</div>
						<div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="colonia">Colonia:</label>
							<dd>{{ $empleado->colonia ? $empleado->colonia : 'N/A' }}</dd>
						</div>
						<div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="municipio">Municipio:</label>
							<dd>{{ $empleado->municipio ? $empleado->municipio : 'N/A' }}</dd>
						</div>
						<div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="estado">Estado:</label>
							<dd>{{ $empleado->estado ? $empleado->estado : 'N/A' }}</dd>
						</div>
						<div class="form-group col-md-3 col-sm-4 col-xs-12">
							<label class="control-label" for="referencia">Referencia:</label>
							<dd>{{ $empleado->referencia ? $empleado->referencia : 'N/A' }}</dd>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-sm-12 text-center">
							<a class="btn btn-warning" href="{{ route('empleados.edit', ['empleado' => $empleado]) }}">
								<i class="fa fa-pencil"></i><strong> Editar</strong>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection