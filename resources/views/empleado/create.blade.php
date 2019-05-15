@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Datos del Empleado:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a href="{{ route('empleados.index') }}" class="btn btn-primary">
							<i class="fa fa-bars"></i><strong> Lista de Empleados</strong>
						</a>
					</div>
				</div>
			</div>
		</div>
		<form method="POST" action="{{ route('empleados.store') }}">
			{{ csrf_field() }}
			<div class="panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-sm-3">
							<label class="control-label" for="nombre">✱Nombre:</label>
							<input type="text" class="form-control" name="nombre" required="" id="nombre" onchange="calcularRFC();">
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label" for="appaterno">✱Apellido Paterno:</label>
							<input type="text" class="form-control" name="appaterno" required="" id="appaterno" onchange="calcularRFC();">
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label" for="apmaterno">Apellido Materno:</label>
							<input type="text" class="form-control" name="apmaterno" id="apmaterno" onchange="calcularRFC();">
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label" for="fnac">✱Fecha de nacimiento:</label>
							<input type="date" class="form-control" id="nacimiento" name="nacimiento" onchange="calcularRFC();" required="">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-3">
							<label class="control-label" for="rfc">✱RFC:</label>
							<input type="text" class="form-control" name="rfc" required="" id="rfc"
								 pattern="^[A-Za-z]{4}[0-9]{6}" readonly="">
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label" for="homoclave">✱Homoclave:</label>
							<input type="text" class="form-control" name="homoclave" required="" id="homoclave">
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label" for="email">✱Correo electrónico:</label>
							<input type="text" class="form-control" name="email" required="">
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label" for="telefono">Teléfono:</label>
							<input type="text" class="form-control" name="telefono">
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label" for="movil">Celular:</label>
							<input type="text" class="form-control" name="movil">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-3">
							<label class="control-label" for="nss">NSS (IMSS):</label>
							<input type="text" class="form-control" name="nss">
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label" for="curp">CURP:</label>
							<input type="text" class="form-control" name="curp">
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label" for="infonavit">INFONAVIT:</label>
							<input type="text" class="form-control" name="infonavit">
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label" for="infonavit">Tipo de Empleado:</label>
							<select name="tipo_empleado" class="form-control" required="">
								<option value="">Seleccionar</option>
								<option value="operativo">Operativo</option>
								<option value="administrativo">Administrativo</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="panel-default">
				<div class="panel-footer">
					<div class="row">
						<div class="col-sm-4 col-sm-offset-4 text-center">
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

<script type="text/javascript">
	function calcularRFC(){
		let nombre = $('#nombre').val().substring(0,1);
		let appaterno = $('#appaterno').val().substring(0,2).toUpperCase();
		let apmaterno = $('#apmaterno').val().substring(0,1);
		let fecnacimiento = $('#nacimiento').val().split('-');

		if (fecnacimiento.length > 1 && apmaterno != '' && appaterno != '' && nombre != '')
			$('#rfc').val(appaterno + apmaterno + nombre + fecnacimiento[0].substring(2,4) + fecnacimiento[1] + fecnacimiento[2]);

	}
</script>

@endsection