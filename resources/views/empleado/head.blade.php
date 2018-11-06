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
</div>