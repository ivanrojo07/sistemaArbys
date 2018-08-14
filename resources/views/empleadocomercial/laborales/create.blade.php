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
					<li role="presentation">
						<a href="{{ route('empleadoc.show', ['id' => $empleado->id, 'empleado' => $empleado]) }}" class="ui-tabs-anchor">Generales:</a>
					</li>
					<li role="presentation" class="active">
						<a href="#" class="ui-tabs-anchor">Laborales:</a>
					</li>
				</ul>
			</div>
			<form role="form" id="form-empleado" method="POST" action="{{ route('empleadoc.datoslaborales.store', ['empleado' => $empleado]) }}" name="form">
			{{ csrf_field()}}
			<input type="hidden" name="empleado_comercial_id" value="{{ $empleado->id }}">
				<div class="panel-default">
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
							<div class="form-group col-sm-3">
								<label class="control-label" for="fechacontratacion">Fecha de Contratación:</label>
								<input class="form-control" type="date" id="fechacontratacion" name="fechacontratacion" value="" required="">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="contrato">Tipo de contrato:</label>
								<select type="select" class="form-control" name="contrato_id" >
									<option id="contrato_id" value="">Sin Definir</option>
									@foreach ($contratos as $contrato)
										{{-- expr --}}
										<option id="{{$contrato->id}}" value="{{$contrato->id}}" @if ($datoslab->contrato_id == $contrato->id)
											{{-- expr --}}
											selected="selected" 
										@endif>{{$contrato->nombre}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="area_id">Área:</label>
								<select type="select" class="form-control" name="area_id">
							        <option id="area_id" value="">Sin Definir</option>
									@foreach ($areas as $area)
										<option id="{{$area->id}}" 
											    value="{{$area->id}}" 
									@if ($datoslab->area_id == $area->id)
											{{-- expr --}}
											selected="selected" 
										@endif>{{$area->nombre}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="puesto_id">
								Puesto:</label>
								<select type="select" name="puesto_id" id="puesto_id" class="form-control" >
									<option id="puesto_id" value="">Sin Definir</option>
									@foreach ($puestos as $puesto)
										{{-- expr --}}
										<option id="{{$puesto->id}}" 
											    value="{{$puesto->id}}" 
											    
									@if ($datoslab->puesto_id == $puesto->id)
											{{-- expr --}}
											selected
										@endif>{{$puesto->nombre}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-3">
								<label class="control-label" for="contrato">Sucursal:</label>
								<select type="select" class="form-control" name="sucursal_id" >
									<option id="sucursal_id" value="">Sin Definir</option>
									@foreach ($sucursales as $sucursal)
										{{-- expr --}}
										<option id="{{$sucursal->id}}" value="{{$sucursal->id}}" @if ($datoslab->sucursal_id == $sucursal->id)
											{{-- expr --}}
											selected="selected" 
										@endif>{{$sucursal->nombre}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="lugartrabajo">Lugar de Trabajo:</label>
								<select type="select" name="lugartrabajo" class="form-control" id="lugartrabajo" value="{{ $datoslab->lugartrabajo }}">
									<option id="1" value="Oficinas" @if ($datoslab->lugartrabajo == "Oficinas")
										{{-- expr --}}
										selected="selected" 
									@endif>Oficinas</option>
									<option id="2" value="Campo" @if ($datoslab->lugartrabajo == "Campo")
										{{-- expr --}}
										selected="selected" 
									@endif>Campo</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-3">
								<label class="control-label" for="salarionom"><i class="fa fa-asterisk" aria-hidden="true"></i>Salario Nóminal:</label>
								<input class="form-control" type="text" id="salarionom" name="salarionom" value="{{ $datoslab->salarionom }}" required>
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="salariodia">Salario Diario:</label>
								<input class="form-control" type="text" id="salariodia" name="salariodia" value="{{ $datoslab->salariodia }}">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="puesto_inicio">Puesto Inicial:</label>
								<input class="form-control" type="text" id="puesto_inicio" name="puesto_inicio" value="{{ $datoslab->puesto_inicio }}">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="periodopaga">Periodicidad de Pago:</label>
								<select type="select" class="form-control" name="periodopaga" id="periodopaga">
									<option id="1" value="Semanal" @if ($datoslab->periodopaga == "Semanal")
										{{-- expr --}}
										selected="selected" 
									@endif>Semanal</option>
									<option id="2" value="Quincenal" @if ($datoslab->periodopaga == "Quincenal")
										{{-- expr --}}
										selected="selected" 
									@endif>Quincenal</option>
									<option id="3" value="Mensual" @if ($datoslab->periodopaga == "Mensual")
										{{-- expr --}}
										selected="selected" 
									@endif>Mensual</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-3">
								<label class="control-label" for="prestaciones">Prestaciones:</label>
								<select class="form-control" type="select" name="prestaciones" id="prestaciones">
									<option id="1" value="De Ley" @if ($datoslab->prestaciones == "De Ley")
										{{-- expr --}}
										selected="selected" 
									@endif>De Ley</option>
								</select>
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="regimen">Régimen de Contratación:</label>
								<select class="form-control" type="select" name="regimen" id="regimen" value="{{ $datoslab->regimen }}">
									<option id="1" value="Sueldos y Salarios" @if ($datoslab->regimen == "Sueldos y Salarios")
										{{-- expr --}}
										selected="selected" 
									@endif>Sueldos y Salarios</option>
									<option id="2" value="Jubilados" @if ($datoslab->regimen == "Jubilados")
										{{-- expr --}}
										selected="selected" 
									@endif>Jubilados</option>
									<option id="3" value="Pensionados" @if ($datoslab->regimen == "Pensionados")
										{{-- expr --}}
										selected="selected" 
									@endif>Pensionados</option>
								</select>
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="hentrada">Hora de Entrada:</label>
								<input class="form-control" type="text" id="hentrada" name="hentrada" value="{{ $datoslab->hentrada }}">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="hsalida">Hora de Salida:</label>
								<input class="form-control" type="text" id="hsalida" name="hsalida" value="{{ $datoslab->hsalida }}">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-3">
								<label class="control-label" for="hcomida">Tiempo de Comida:</label>
								<select class="form-control" type="select" name="hcomida" id="hcomida" value="{{ $datoslab->hcomida }}">
									<option id="1" value="0 min" @if ($datoslab->hcomida == "0 min")
										{{-- expr --}}
										selected="selected" 
									@endif>0 min.</option>
									<option id="2" value="30 min" @if ($datoslab->hcomida == "30 min")
										{{-- expr --}}
										selected="selected" 
									@endif>30 min.</option>
									<option id="3" value="45 min" @if ($datoslab->hcomida == "45 min")
										{{-- expr --}}
										selected="selected" 
									@endif>45 min.</option>
									<option id="4" value="60 min" @if ($datoslab->hcomida == "60 min")
										{{-- expr --}}
										selected="selected" 
									@endif>60 min.</option>
									<option id="5" value="1 hr 15 min" @if ($datoslab->hcomida == "1 hr 15 min")
										{{-- expr --}}
										selected="selected" 
									@endif>1 hr 15 min.</option>
									<option id="6" value="1 hr 30 min" @if ($datoslab->hcomida == "1 hr 30 min")
										{{-- expr --}}
										selected="selected" 
									@endif>1 hr 30 min.</option>
									<option id="7" value="2 hrs" @if ($datoslab->hcomida == "2 hrs")
										{{-- expr --}}
										selected="selected" 
									@endif>2 hrs.</option>
									<option id="8" value="2 hrs 30 min" @if ($datoslab->hcomida == "2 hrs 30 min")
										{{-- expr --}}
										selected="selected" 
									@endif>2 hrs 30 min.</option>
									<option id="9" value="3 hrs" @if ($datoslab->hcomida == "3 hrs")
										{{-- expr --}}
										selected="selected" 
									@endif>3 hrs.</option>
								</select>
							</div>
							<div class="form-group col-sm-3">
						<label class="control-label" for="banco">Banco:</label>
						<select class="form-control" type="select" name="banco" id="banco">
							<option id="banco" value="">Sin Definir</option>
							@foreach ($bancos as $banco)
								{{-- expr --}}
								<option id="{{$banco->nombre}}" value="{{$banco->nombre}}" @if ($datoslab->banco == $banco->nombre)
									{{-- expr --}}
									selected="selected" 
								@endif>{{$banco->nombre}}</option>
							@endforeach
						</select>
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="cuenta">Cuenta:</label>
								<input class="form-control" type="text" id="cuenta" name="cuenta" value="{{ $datoslab->cuenta }}">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="clabe">CLABE:</label>
								<input class="form-control" type="clabe" name="clabe" id="clabe" value="{{ $datoslab->clabe }}">
							</div>
						</div>
					</div>
					<div class="panel-heading">
						<div class="row">
							<div class="col-sm-4">
								<label class="control-label">
									<h5>Datos de Baja:</h5>
								</label>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="form-group col-sm-3">
								<label class="control-label" for="fechabaja">Fecha de la baja:</label>
								<input class="form-control" type="date" id="fechabaja" name="fechabaja" value="{{ $datoslab->fechabaja }}">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="tipobaja_id">Tipo de Baja:</label>
								<select class="form-control" type="select" name="tipobaja_id" id="tipobaja_id">
									<option id="0" value="">No hay baja</option>
									@foreach ($bajas as $baja)
										{{-- expr --}}
										<option id="{{$baja->id}}" value="{{$baja->id}}" @if ($datoslab->tipobaja_id == $baja->id)
											{{-- expr --}}
											selected="selected" 
										@endif>{{ $baja->nombre }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="comentariobaja">Comentarios:</label>
								<textarea class="form-control" id="comentariobaja" name="comentariobaja" maxlength="500">{{$datoslab->comentariobaja}}</textarea>
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