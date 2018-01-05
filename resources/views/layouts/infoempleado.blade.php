@extends('layouts.blank') 
@section('content')
<div class="container">
	<div role="application" class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading"><h4>Datos del Empleado:</h4><a class="btn btn-info" href="{{ route('empleados.create') }}"><strong>Nuevo Empleado</strong></a></div>
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
		@yield('infoempleado')
	</div>
</div>
@endsection