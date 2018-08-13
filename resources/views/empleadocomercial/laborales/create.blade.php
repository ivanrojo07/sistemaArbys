@extends('layouts.blank')
@section('content')

<div class="container">
	<div role="application" class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<label class="control-label">
							<h4>Datos del Empleado: <small><i class="fa fa-asterisk" aria-hidden="true"></i> Campos Requeridos</small></h4>
						</label>
					</div>
					<div class="col-sm-4 text-center">
						<a href="{{ route('empleadoc.index') }}"><button class="btn btn-primary">Ver Empleados</button></a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label" for="identificador">ID de empleado:</label>
						<input class="form-control" id="identificador" type="text" name="identificador" value="{{ $empleado->identificador }}" readonly="">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label" for="appaterno">Apellido Paterno:</label>
						<input type="text" class="form-control" id="appaterno" name="appaterno" value="{{ $empleado->appaterno }}" readonly="">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="apmaterno"> Apellido Materno:</label>
						<input type="text" id="apmaterno" class="form-control" name="apmaterno" value="{{ $empleado->apmaterno }}" readonly="">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="nombre"> Nombre(s):</label>
						<input type="text" class="form-control" id="nombre" name="nombre" value="{{ $empleado->nombre }}" readonly="">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="rfc">RFC:</label>
						<input type="text" class="form-control" id="rfc" name="rfc" value="{{ $empleado->rfc }}" readonly="">
					</div>
				</div>
			</div>
			<div>
				<ul class="nav nav-pills nav-justified">
					<li><a href="{{ route('empleadoc.show', ['id' => $empleado->id]) }}" class="ui-tabs-anchor">Generales:</a></li>
					<li class="active"><a href="#" class="ui-tabs-anchor">Laborales:</a></li>
					<li role="presentation"><a class="ui-tabs-anchor">Estudios:</a></li>
					<li role="presentation"><a class="ui-tabs-anchor">Emergencias:</a></li>
					<li role="presentation"><a class="ui-tabs-anchor">Vacaciones:</a></li>
					<li role="presentation"><a class="ui-tabs-anchor">Administrativo:</a></li>
				</ul>
			</div>
			<div class="panel-default">
				<form role="form" id="form-empleado" method="POST" action="{{ route('empleadoc.store') }}" name="form">
				{{ csrf_field()}}
					<div class="panel-heading">
						<div class="row">
							<div class="col-sm-4">
								<label class="control-label">
									<h5>Datos Laborales: <small><i class="fa fa-asterisk" aria-hidden="true"></i> Campos Requeridos</small></h5>
								</label>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="form-group col-sm-4">
								<label class="control-label" for="f">Fecha de Contratación:</label>
								<input type="text" class="form-control" id="appaterno" name="appaterno" value="">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection