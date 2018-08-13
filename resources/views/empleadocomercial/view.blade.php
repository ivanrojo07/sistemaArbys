@extends('layouts.blank')
@section('content')

<div class="container-fluid">
	<div role="application" class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<label class="control-label">
							<h4>Datos del Empleado:</h4>
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
					<li class="active"><a href="#" class="ui-tabs-anchor">Generales:</a></li>
					<li role="presentation"><a href="{{ route('empleadoc.datosLaborales.index', ['id' => $empleado->id]) }}" class="ui-tabs-anchor">Laborales:</a></li>
					<li role="presentation"><a class="ui-tabs-anchor">Estudios:</a></li>
					<li role="presentation"><a class="ui-tabs-anchor">Emergencias:</a></li>
					<li role="presentation"><a class="ui-tabs-anchor">Vacaciones:</a></li>
					<li role="presentation"><a class="ui-tabs-anchor">Administrativo:</a></li>
				</ul>
			</div>
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<label class="control-label">
							<h5>Datos Generales:</h5>
						</label>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label" for="telefono">Teléfono:</label>
						<input type="text" class="form-control" name="telefono" id="telefono" value="{{ $empleado->telefono }}" readonly="">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="movil">Celular:</label>
						<input type="text" class="form-control" name="movil" id="movil" value="{{ $empleado->movil }}" readonly="">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="email">Correo electrónico:</label>
						<input type="text" class="form-control" name="email" id="email" value="{{ $empleado->email }}" readonly="">
					</div><div class="form-group col-sm-3">
						<label class="control-label" for="nss">Número de Seguro Social (IMSS):</label>
						<input type="text" class="form-control" name="nss" id="nss" value="{{ $empleado->nss }}" readonly="">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label" for="curp">C.U.R.P.:</label>
						<input type="text" class="form-control" name="curp" id="curp" value="{{ $empleado->curp }}" readonly="">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="infonavit">Número Infonavit:</label>
						<input type="text" class="form-control" name="infonavit" id="infonavit" value="{{ $empleado->infonavit }}" readonly="">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="fnac">Fecha de nacimiento:</label>
						<input type="date" class="form-control" name="fnac" id="fnac" value="{{ $empleado->fnac }}" readonly="">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="cp">Código Postal:</label>
						<input type="text" class="form-control" name="cp" id="cp" value="{{ $empleado->cp }}" readonly="">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label" for="calle">Calle:</label>
						<input type="text" class="form-control" name="calle" id="calle" value="{{ $empleado->calle }}" readonly="">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="numext">Número Exterior:</label>
						<input type="text" class="form-control" name="numext" id="numext" value="{{ $empleado->numext }}" readonly="">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="numint">Número Interior:</label>
						<input type="text" class="form-control" name="numint" id="numint" value="{{ $empleado->numint }}" readonly="">
					</div><div class="form-group col-sm-3">
						<label class="control-label" for="colonia">Colonia:</label>
						<input type="text" class="form-control" name="colonia" id="colonia" value="{{ $empleado->colonia }}" readonly="">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label" for="municipio">Delegación/Municipio:</label>
						<input type="text" class="form-control" name="municipio" id="municipio" value="{{ $empleado->municipio }}" readonly="">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="estado">Estado:</label>
						<input type="text" class="form-control" name="estado" id="estado" value="{{ $empleado->estado }}" readonly="">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="calles">Entre calles:</label>
						<input type="text" class="form-control" name="calles" id="calles" placeholder="calle y calle" value="{{ $empleado->calles }}" readonly="">
					</div><div class="form-group col-sm-3">
						<label class="control-label" for="referencia">Referencia:</label>
						<input type="text" class="form-control" name="referencia" id="referencia" value="{{ $empleado->referencia }}" readonly="">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label" for="oficina">Oficina:</label>
						<input type="text" class="form-control" name="oficina" id="oficina" value="{{ $empleado->oficina->nombre }}" readonly="">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="experto">Experto en:</label>
						<input type="text" class="form-control" name="experto" id="experto" value="<?php
							if($empleado->experto == 1)
								echo('Autos');
							else if($empleado->experto == 2)
								echo('Motos');
							else if($empleado->experto == 3)
								echo('Casas');
							else if($empleado->experto == 4)
								echo('Autos y Motos');
							else if($empleado->experto == 5)
								echo('Autos y Casas');
							else if($empleado->experto == 6)
								echo('Motos y Casas');
							else if($empleado->experto == 7)
								echo('Autos, Motos y Casas');
						?>" readonly="">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 col-sm-offset-4 text-center">
						<a href="{{ route('empleadoc.edit', ['id' => $empleado->id]) }}"><button class="btn btn-primary">Editar</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection