@extends('layouts.blank')
@section('content')

<div class="container">
	@if ($edit == true)
		{{-- true expr --}}

		<form role="form" 
		      method="POST" 
		      action="{{ route('empleados.update',['empleado'=>$empleado]) }}">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PUT">
	@else
		{{-- false expr --}}
		<form role="form" id="form-empleado" method="POST" action="{{ route('empleados.store') }}" name="form">
			{{ csrf_field()}}
	@endif
		<div role="application" class="panel panel-group">
			<div class="panel-default">
				<div class="panel-heading"><h4>Datos del Empleado:
					&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-asterisk" aria-hidden="true"></i>
					Campos Requeridos
				</h4></div>
				<div class="panel-body">
					<div class="col-xs-12 offset-md-2 mt-3">
						<div class="form-group col-xs-3">
							<label class="control-label" for="identificador"><i class="fa fa-asterisk" aria-hidden="true"></i> ID de empleado:</label>
							@if ($edit == true)
								{{-- true expr --}}
								<dd>{{$empleado->identificador}}</dd>
							@else
								{{-- false expr --}}
							<input class="form-control" 
							       id="identificador" 
							       type="text" 
							       name="identificador" 
							       required="required"
							       autofocus>
							@endif
						</div>
					</div>
					<div class="col-xs-12 offset-md-2 mt-3">
						<div class="form-group col-xs-3">
							<label class="control-label" for="appaterno"><i class="fa fa-asterisk" aria-hidden="true"></i> Apellido Paterno:</label>
							<input type="text" class="form-control" id="appaterno" name="appaterno" required="required" value="{{ $empleado->appaterno }}">
						</div>
						<div class="form-group col-xs-3">
							<label class="control-label" for="apmaterno"><i class="fa fa-asterisk" aria-hidden="true"></i> Apellido Materno:</label>
							<input type="text" id="apmaterno" class="form-control" name="apmaterno" required="required" value="{{ $empleado->apmaterno }}">
						</div>
						<div class="form-group col-xs-3">
							<label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i> Nombre(s):</label>
							<input type="text" class="form-control" id="nombre" name="nombre" required="required" value="{{ $empleado->nombre }}">
						</div>
						<div class="form-group col-xs-3">
							<label class="control-label" for="rfc"><i class="fa fa-asterisk" aria-hidden="true"></i>RFC:</label>
							<input type="text" class="form-control" id="rfc" name="rfc" value="{{ $empleado->rfc }}">
						</div>
					</div>
				</div>
			</div>
			@if($edit == false)
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
			@else
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
			@endif
				<div class="panel-default">
					<div class="panel-heading"><h5>Datos Generales:
					&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos
				</h5>
					
						</div>
					<div class="panel-body">
						<div class="col-xs-4 col-xs-offset-8">
									<button type="submit" 
									        class="btn btn-success">
									 <strong>Guardar</strong>
								</button>
								&nbsp;&nbsp;&nbsp;&nbsp;
								<a class="btn btn-info" 
								   href="{{ route('empleados.create') }}">
								<strong>Agregar Nuevo</strong> </a>
									
							</div><br><br><br>
							
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-xs-3">
								<label class="control-label" for="telefono">Teléfono:</label>
								<input type="text" class="form-control" name="telefono" id="telefono" value="{{ $empleado->telefono }}">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="movil">Celular:</label>
								<input type="text" class="form-control" name="movil" id="movil" value="{{ $empleado->movil }}">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="email">Correo electrónico:</label>
								<input type="text" class="form-control" name="email" id="email" value="{{ $empleado->email }}">
							</div><div class="form-group col-xs-3">
								<label class="control-label" for="nss">Número de Seguro Social (IMSS):</label>
								<input type="text" class="form-control" name="nss" id="nss" value="{{ $empleado->nss }}">
							</div>
						</div>
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-xs-3">
								<label class="control-label" for="curp">C.U.R.P.:</label>
								<input type="text" class="form-control" name="curp" id="curp" value="{{ $empleado->curp }}">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="infonavit">Número Infonavit:</label>
								<input type="text" class="form-control" name="infonavit" id="infonavit" value="{{ $empleado->infonavit }}">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="fnac">Fecha de nacimiento:</label>
								<input type="date" class="form-control" name="fnac" id="fnac" value="{{ $empleado->fnac }}">
							</div><div class="form-group col-xs-3">
								<label class="control-label" for="cp">Código Postal:</label>
								<input type="text" class="form-control" name="cp" id="cp" value="{{ $empleado->cp }}">
							</div>
						</div>
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-xs-3">
								<label class="control-label" for="calle">Calle:</label>
								<input type="text" class="form-control" name="calle" id="calle" value="{{ $empleado->calle }}">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="numext">Número Exterior:</label>
								<input type="text" class="form-control" name="numext" id="numext" value="{{ $empleado->numext }}">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="numint">Número Interior:</label>
								<input type="text" class="form-control" name="numint" id="numint" value="{{ $empleado->numint }}">
							</div><div class="form-group col-xs-3">
								<label class="control-label" for="colonia">Colonia:</label>
								<input type="text" class="form-control" name="colonia" id="colonia" value="{{ $empleado->colonia }}">
							</div>
						</div>
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-xs-3">
								<label class="control-label" for="municipio">Delegación/Municipio:</label>
								<input type="text" class="form-control" name="municipio" id="municipio" value="{{ $empleado->municipio }}">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="estado">Estado:</label>
								<input type="text" class="form-control" name="estado" id="estado" value="{{ $empleado->estado }}">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="calles">Entre calles:</label>
								<input type="text" class="form-control" name="calles" id="calles" placeholder="calle y calle" value="{{ $empleado->calles }}">
							</div><div class="form-group col-xs-3">
								<label class="control-label" for="referencia">Referencia:</label>
								<input type="text" class="form-control" name="referencia" id="referencia" value="{{ $empleado->referencia }}">
							</div>
						</div>
						
	  				
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection