@extends('layouts.app')
@section('content')
<div class="container">
	<form role="form" id="form-empleado" method="POST" action="{{ route('empleados.store') }}" name="form">
		{{ csrf_field()}}
		<div role="application" class="panel panel-group">
			<div class="panel-default">
				<div class="panel-heading"><h4>Datos del Empleado:</h4></div>
				<div class="panel-body">
					<div class="col-xs-12 offset-md-2 mt-3">
						<div class="form-group col-xs-3">
							<label class="control-label" for="appaterno">* Apellido Paterno:</label>
							<input type="text" class="form-control" id="appaterno" name="appaterno" required="required">
						</div>
						<div class="form-group col-xs-3">
							<label class="control-label" for="apmaterno">* Apellido Materno:</label>
							<input type="text" id="apmaterno" class="form-control" name="apmaterno" required="required">
						</div>
						<div class="form-group col-xs-3">
							<label class="control-label" for="nombre">* Nombre(s):</label>
							<input type="text" class="form-control" id="nombre" name="nombre" required="required">
						</div>
						<div class="form-group col-xs-3">
							<label class="control-label" for="rfc">RFC:</label>
							<input type="text" class="form-control" id="rfc" name="rfc">
						</div>
					</div>
				</div>
			</div>
			<div>
				<ul class="nav nav-pills nav-justified">
					<li class="active"><a href="#tab1"  class="ui-tabs-anchor">Generales:</a></li>

					<li role="presentation" class="disabled" disabled="disabled"><a class="ui-tabs-anchor" disabled="disabled">Laborales:</a></li>

					<li role="presentation" class="disabled" disabled="disabled"><a class="ui-tabs-anchor" disabled="disabled">Estudios:</a></li>

					<li role="presentation" class="disabled" disabled="disabled"><a class="ui-tabs-anchor" disabled="disabled">Emergencias:</a></li>

					<li role="presentation" class="disabled" disabled="disabled"><a class="ui-tabs-anchor" disabled="disabled">Vacaciones:</a></li>

					<li role="presentation" class="disabled" disabled="disabled"><a class="ui-tabs-anchor" disabled="disabled">Administrativo:</a></li>
				</ul>
			</div>
				<div class="panel-default">
					<div class="panel-heading"><h5>Datos Generales:</h5></div>
					<div class="panel-body">
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-xs-3">
								<label class="control-label" for="telefono">Teléfono:</label>
								<input type="text" class="form-control" name="telefono" id="telefono">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="movil">Celular:</label>
								<input type="text" class="form-control" name="movil" id="movil">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="email">Correo electrónico:</label>
								<input type="text" class="form-control" name="email" id="email">
							</div><div class="form-group col-xs-3">
								<label class="control-label" for="nss">Número de Seguro Social (IMSS):</label>
								<input type="text" class="form-control" name="nss" id="nss">
							</div>
						</div>
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-xs-3">
								<label class="control-label" for="curp">C.U.R.P.:</label>
								<input type="text" class="form-control" name="curp" id="curp">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="infonavit">Número Infonavit:</label>
								<input type="text" class="form-control" name="infonavit" id="infonavit">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="fnac">Fecha de nacimiento:</label>
								<input type="date" class="form-control" name="fnac" id="fnac">
							</div><div class="form-group col-xs-3">
								<label class="control-label" for="cp">Código Postal:</label>
								<input type="text" class="form-control" name="cp" id="cp">
							</div>
						</div>
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-xs-3">
								<label class="control-label" for="calle">Calle:</label>
								<input type="text" class="form-control" name="calle" id="calle">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="numext">Número Exterior:</label>
								<input type="text" class="form-control" name="numext" id="numext">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="numint">Número Interior:</label>
								<input type="text" class="form-control" name="numint" id="numint">
							</div><div class="form-group col-xs-3">
								<label class="control-label" for="colonia">Colonia:</label>
								<input type="text" class="form-control" name="colonia" id="colonia">
							</div>
						</div>
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-xs-3">
								<label class="control-label" for="municipio">Delegación/Municipio:</label>
								<input type="text" class="form-control" name="municipio" id="municipio">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="estado">Estado:</label>
								<input type="text" class="form-control" name="estado" id="estado">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="calles">Entre calles:</label>
								<input type="text" class="form-control" name="calles" id="calles" placeholder="calle y calle">
							</div><div class="form-group col-xs-3">
								<label class="control-label" for="referencia">Referencia:</label>
								<input type="text" class="form-control" name="referencia" id="referencia">
							</div>
						</div>
						<button class="btn btn-success">Guardar</button>
	  				<p><strong>*Campo requerido</strong></p>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection