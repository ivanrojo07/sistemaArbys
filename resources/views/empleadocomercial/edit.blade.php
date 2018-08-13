@extends('layouts.blank')
@section('content')

<div class="container">
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
			<form role="form" id="form-empleado" method="POST" action="{{ route('empleadoc.update', ['id' => $empleado->id]) }}" name="form">
			{{ csrf_field()}}
			<input type="hidden" name="_method" value="PUT">
				<div class="panel-default">
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
								<input type="text" class="form-control" id="appaterno" name="appaterno" value="{{ $empleado->appaterno }}">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="apmaterno"> Apellido Materno:</label>
								<input type="text" id="apmaterno" class="form-control" name="apmaterno" value="{{ $empleado->apmaterno }}">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="nombre"> Nombre(s):</label>
								<input type="text" class="form-control" id="nombre" name="nombre" value="{{ $empleado->nombre }}">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="rfc">RFC:</label>
								<input type="text" class="form-control" id="rfc" name="rfc" value="{{ $empleado->rfc }}">
							</div>
						</div>
					</div>
					<div>
						<ul class="nav nav-pills nav-justified">
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
								<input type="text" class="form-control" name="telefono" id="telefono" value="{{ $empleado->telefono }}">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="movil">Celular:</label>
								<input type="text" class="form-control" name="movil" id="movil" value="{{ $empleado->movil }}">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="email">Correo electrónico:</label>
								<input type="text" class="form-control" name="email" id="email" value="{{ $empleado->email }}">
							</div><div class="form-group col-sm-3">
								<label class="control-label" for="nss">Número de Seguro Social (IMSS):</label>
								<input type="text" class="form-control" name="nss" id="nss" value="{{ $empleado->nss }}">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-3">
								<label class="control-label" for="curp">C.U.R.P.:</label>
								<input type="text" class="form-control" name="curp" id="curp" value="{{ $empleado->curp }}">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="infonavit">Número Infonavit:</label>
								<input type="text" class="form-control" name="infonavit" id="infonavit" value="{{ $empleado->infonavit }}">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="fnac">Fecha de nacimiento:</label>
								<input type="date" class="form-control" name="fnac" id="fnac" value="{{ $empleado->fnac }}">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="cp">Código Postal:</label>
								<input type="text" class="form-control" name="cp" id="cp" value="{{ $empleado->cp }}">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-3">
								<label class="control-label" for="calle">Calle:</label>
								<input type="text" class="form-control" name="calle" id="calle" value="{{ $empleado->calle }}">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="numext">Número Exterior:</label>
								<input type="text" class="form-control" name="numext" id="numext" value="{{ $empleado->numext }}">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="numint">Número Interior:</label>
								<input type="text" class="form-control" name="numint" id="numint" value="{{ $empleado->numint }}">
							</div><div class="form-group col-sm-3">
								<label class="control-label" for="colonia">Colonia:</label>
								<input type="text" class="form-control" name="colonia" id="colonia" value="{{ $empleado->colonia }}">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-3">
								<label class="control-label" for="municipio">Delegación/Municipio:</label>
								<input type="text" class="form-control" name="municipio" id="municipio" value="{{ $empleado->municipio }}">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="estado">Estado:</label>
								<input type="text" class="form-control" name="estado" id="estado" value="{{ $empleado->estado }}">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="calles">Entre calles:</label>
								<input type="text" class="form-control" name="calles" id="calles" placeholder="calle y calle" value="{{ $empleado->calles }}">
							</div><div class="form-group col-sm-3">
								<label class="control-label" for="referencia">Referencia:</label>
								<input type="text" class="form-control" name="referencia" id="referencia" value="{{ $empleado->referencia }}">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-3">
								<label class="control-label" for="oficina">Oficina:</label>
								<select class="form-control" name="oficina_id" id="oficina">
									<option value="0">Seleccionar</option>
									@foreach($oficinas as $oficina)
									@if($oficina->id == $empleado->oficina_id)
									<option value="{{ $oficina->id }}" selected="">{{ $oficina->nombre }}</option>
									@else
									<option value="{{ $oficina->id }}">{{ $oficina->nombre }}</option>
									@endif
									@endforeach
								</select>
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="experto">Experto en:</label>
								<select class="form-control" name="experto" id="experto">
									<option value="0">Seleccionar</option>
									<option <?php echo($empleado->experto == 1 ? 'selected=""' : '') ?> value="1">Autos</option>
									<option <?php echo($empleado->experto == 2 ? 'selected=""' : '') ?> value="2">Motos</option>
									<option <?php echo($empleado->experto == 3 ? 'selected=""' : '') ?> value="3">Casas</option>
									<option <?php echo($empleado->experto == 4 ? 'selected=""' : '') ?> value="4">Autos y Motos</option>
									<option <?php echo($empleado->experto == 5 ? 'selected=""' : '') ?> value="5">Autos y Casas</option>
									<option <?php echo($empleado->experto == 6 ? 'selected=""' : '') ?> value="6">Motos y Casas</option>
									<option <?php echo($empleado->experto == 7 ? 'selected=""' : '') ?> value="7">Autos, Motos y Casas</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4 col-sm-offset-4 text-center">
								<button type="submit" class="btn btn-success">
									<strong>Guardar</strong>
								</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection