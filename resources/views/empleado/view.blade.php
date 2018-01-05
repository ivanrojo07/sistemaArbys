@extends('layouts.blank')
@section('content')
<div class="container">
	<div role="application" class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading"><h4>Datos del Empleado:</h4>
				<a class="btn btn-info" href="{{ route('empleados.create') }}"><strong>Nuevo Empleado</strong></a>
			</div>
			<div class="panel-body">
				<div class="col-xs-12 offset-md-2 mt-3">
					<div class="form-group col-xs-3">
						<label class="control-label" for="identificador">ID de empleado:</label>
						<dd>{{$empleado->identificador}}</dd>
					</div>
				</div>
				<div class="col-xs-12 offset-md-2 mt-3">
					<div class="form-group col-xs-3">
						<label class="control-label" for="appaterno">Apellido Paterno:</label>
						<dd>{{$empleado->appaterno}}</dd>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="apmaterno">Apellido Materno:</label>
						<dd>{{$empleado->apmaterno}}</dd>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="nombre">Nombre(s):</label>
						<dd>{{$empleado->nombre}}</dd>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="rfc">RFC:</label>
						<dd>{{$empleado->rfc}}</dd>
					</div>
				</div>
			</div>
		</div>
		<div>
			<ul class="nav nav-pills nav-justified">
				<li role="presentation" class="active"><a href="{{ route('empleados.show',['empleado'=>$empleado]) }}"  class="ui-tabs-anchor">Generales:</a></li>

				<li role="presentation" class=""><a href="{{ route('empleados.datoslaborales.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Laborales:</a></li>

				<li role="presentation" class=""><a href="{{ route('empleados.estudios.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Estudios:</a></li>

				<li role="presentation" class=""><a href="{{ route('empleados.emergencias.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Emergencias:</a></li>

				<li role="presentation" class=""><a href="{{ route('empleados.vacaciones.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Vacaciones:</a></li>

				<li role="presentation" class=""><a href="{{ route('empleados.faltas.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Administrativo:</a></li>
			</ul>
		</div>
			<div class="panel-default">
				<div class="panel-heading"><h5>Datos Generales:</h5></div>
				<div class="panel-body">
					<div class="col-md-12 offset-md-2 mt-3">
						<div class="form-group col-xs-3">
							<label class="control-label" for="telefono">Teléfono:</label>
							<dd>{{$empleado->telefono}}</dd>
						</div>
						<div class="form-group col-xs-3">
							<label class="control-label" for="movil">Celular:</label>
							<dd>{{$empleado->movil}}</dd>
						</div>
						<div class="form-group col-xs-3">
							<label class="control-label" for="email">Correo electrónico:</label>
							<dd>{{$empleado->email}}</dd>
						</div>
						<div class="form-group col-xs-3">
							<label class="control-label" for="nss">Número de Seguro Social (IMSS):</label>
							<dd>{{$empleado->nss}}</dd>
						</div>
					</div>
					<div class="col-md-12 offset-md-2 mt-3">
						<div class="form-group col-xs-3">
							<label class="control-label" for="curp">C.U.R.P.:</label>
							<dd>{{$empleado->curp}}</dd>
						</div>
						<div class="form-group col-xs-3">
							<label class="control-label" for="infonavit">Número Infonavit:</label>
							<dd>{{$empleado->infonavit}}</dd>
						</div>
						<div class="form-group col-xs-3">
							<label class="control-label" for="fnac">Fecha de nacimiento:</label>
							<dd>{{$empleado->fnac}}</dd>
						</div><div class="form-group col-xs-3">
							<label class="control-label" for="cp">Código Postal:</label>
							<dd>{{$empleado->cp}}</dd>
						</div>
					</div>
					<div class="col-md-12 offset-md-2 mt-3">
						<div class="form-group col-xs-3">
							<label class="control-label" for="calle">Calle:</label>
							<dd>{{$empleado->calle}}</dd>
						</div>
						<div class="form-group col-xs-3">
							<label class="control-label" for="numext">Número Exterior:</label>
							<dd>{{$empleado->numext}}</dd>
						</div>
						<div class="form-group col-xs-3">
							<label class="control-label" for="numint">Número Interior:</label>
							<dd>{{$empleado->numint}}</dd>
						</div>
						<div class="form-group col-xs-3">
							<label class="control-label" for="colonia">Colonia:</label>
							<dd>{{$empleado->colonia}}</dd>
						</div>
					</div>
					<div class="col-md-12 offset-md-2 mt-3">
						<div class="form-group col-xs-3">
							<label class="control-label" for="municipio">Delegación/Municipio:</label>
							<dd>{{$empleado->municipio}}</dd>
						</div>
						<div class="form-group col-xs-3">
							<label class="control-label" for="estado">Estado:</label>
							<dd>{{$empleado->estado}}</dd>
						</div>
						<div class="form-group col-xs-3">
							<label class="control-label" for="calles">Entre calles:</label>
							<dd>{{$empleado->calles}}</dd>
						</div>
						<div class="form-group col-xs-3">
							<label class="control-label" for="referencia">Referencia:</label>
							<dd>{{$empleado->referencia}}</dd>
						</div>
					</div>
					<a class="btn btn-info btn-md" href="{{ route('empleados.edit',['empleado'=>$empleado]) }}">
						<strong>Editar</strong>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection