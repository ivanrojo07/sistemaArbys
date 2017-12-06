@extends('layouts.infoempleado')
@section('infoempleado')
	{{-- expr --}}
	<div>
		<ul class="nav nav-pills nav-justified">
			<li role="presentation" class=""><a href="{{ route('empleados.show',['empleado'=>$empleado]) }}"  class="ui-tabs-anchor">Generales:</a></li>

			<li role="presentation" class="active"><a href="{{ route('empleados.datoslaborales.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Laborales:</a></li>

			<li role="presentation" class=""><a href="{{ route('empleados.estudios.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Estudios:</a></li>

			<li role="presentation" class=""><a href="{{ route('empleados.emergencias.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Emergencias:</a></li>

			<li role="presentation" class=""><a href="{{ route('empleados.vacaciones.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Vacaciones:</a></li>

			<li role="presentation" class=""><a href="{{ route('empleados.faltas.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Administrativo:</a></li>
		</ul>
	</div>
	<div class="panel-default">
		<div class="panel-heading"><h5>Laborales:</h5></div>
		<div class="panel-body">
			@if ($edit == true)
				{{-- true expr --}}
			<form role="form" method="POST" action="{{ route('empleados.datoslaborales.update',['datoslaborale'=>$datoslab,'empleado'=>$empleado]) }}">
				<input type="hidden" name="_method" value="PUT">
				{{ csrf_field() }}
			@else
				{{-- false expr --}}
			<form role="form" method="POST" action="{{ route('empleados.datoslaborales.store',['empleado'=>$empleado]) }}">
				{{ csrf_field() }}
			@endif
				<input type="hidden" name="empleado_id" value="{{$empleado->id}}">
				<div class="col-md-12 offset-md-2 mt-3">
					<div class="form-group col-xs-3">
						<label class="control-label" for="fechacontratacion">Fecha de contratación:</label>
						<input class="form-control" type="date" id="fechacontratacion" name="fechacontratacion" value="{{ $datoslab->fechacontratacion }}">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="contrato">Tipo de contrato:</label>
						<select type="select" class="form-control" name="contrato_id">
							@foreach ($contratos as $contrato)
								{{-- expr --}}
								<option id="{{$contrato->id}}" value="{{$contrato->id}}" @if ($datoslab->contrato_id == $contrato->id)
									{{-- expr --}}
									selected="selected" 
								@endif>{{$contrato->nombre}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="area">Área:</label>
						<input class="form-control" type="text" id="area" name="area" value="{{ $datoslab->area }}">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="puesto">Puesto:</label>
						<input class="form-control" type="text" id="puesto" name="puesto" value="{{ $datoslab->puesto }}">
					</div>
				</div>
				<div class="col-md-12 offset-md-2 mt-3">
					<div class="form-group col-xs-3">
						<label class="control-label" for="salarionom">Salario Nóminal:</label>
						<input class="form-control" type="text" id="salarionom" name="salarionom" value="{{ $datoslab->salarionom }}">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="salariodia">Salario Diario:</label>
						<input class="form-control" type="text" id="salariodia" name="salariodia" value="{{ $datoslab->salariodia }}">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="puesto_inicio">Puesto Inicial:</label>
						<input class="form-control" type="text" id="puesto_inicio" name="puesto_inicio" value="{{ $datoslab->puesto_inicio }}">
					</div>
					<div class="form-group col-xs-3">
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
				<div class="col-md-12 offset-md-2 mt-3">
					<div class="form-group col-xs-3">
						<label class="control-label" for="prestaciones">Prestaciones:</label>
						<select class="form-control" type="select" name="prestaciones" id="prestaciones">
							<option id="1" value="De Ley" @if ($datoslab->prestaciones == "De Ley")
								{{-- expr --}}
								selected="selected" 
							@endif>De Ley</option>
						</select>
					</div>
					<div class="form-group col-xs-3">
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
					<div class="form-group col-xs-3">
						<label class="control-label" for="hentrada">Hora de Entrada:</label>
						<input class="form-control" type="text" id="hentrada" name="hentrada" value="{{ $datoslab->hentrada }}">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="hsalida">Hora de Salida:</label>
						<input class="form-control" type="text" id="hsalida" name="hsalida" value="{{ $datoslab->hsalida }}">
					</div>
				</div>
				<div class="col-md-12 offset-md-2 mt-3">
					<div class="form-group col-xs-3">
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
					<div class="form-group col-xs-3">
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
					<div class="form-group col-xs-3">
						<label class="control-label" for="banco">Banco:</label>
						<select class="form-control" type="select" name="banco" id="banco">
							<option id="1" value="HSBC" @if ($datoslab->banco == "HSBC")
								{{-- expr --}}
								selected="selected" 
							@endif>HSBC</option>
							<option id="2" value="Banorte" @if ($datoslab->banco == "Banorte")
								{{-- expr --}}
								selected="selected" 
							@endif>BANORTE</option>
							<option id="3" value="Banamex" @if ($datoslab->banco == "Banamex")
								{{-- expr --}}
								selected="selected" 
							@endif>BANAMEX</option>
						</select>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="cuenta">Cuenta:</label>
						<input class="form-control" type="text" id="cuenta" name="cuenta" value="{{ $datoslab->cuenta }}">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="clabe">CLABE(Clave Bancaria Estandarizada):</label>
						<input class="form-control" type="clabe" name="clabe" id="clabe" value="{{ $datoslab->clabe }}">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="bonopuntualidad" id="lbl_inst2">Bono Puntualidad:</label>
						<input id="boton-toggle" type="checkbox" data-toggle="toggle" data-on="Sí" data-off="No" data-style="ios" name="bonopuntualidad" @if ($datoslab->bonopuntualidad == 1)
							{{-- expr --}}
							checked="checked"
						@endif>
					</div>
				</div>
				<div class="panel">
					<div class="panel-heading">Datos de Baja:</div>
					<div class="col-md-12 offset-md-2 mt-3">
						<div class="form-group col-xs-3">
							<label class="control-label" for="fechabaja">Fecha de la baja:</label>
							<input class="form-control" type="date" id="fechabaja" name="fechabaja" value="{{ $datoslab->fechabaja }}">
						</div>
						<div class="form-group col-xs-3">
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
						<div class="form-group col-xs-3">
							<label class="control-label" for="comentariobaja">Comentarios:</label>
							<textarea class="form-control" id="comentariobaja" name="comentariobaja" maxlength="500">{{$datoslab->comentariobaja}}</textarea>
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-success">Guardar</button>
				<p><strong>*Campo requerido</strong></p>
			</form>
		</div>
	</div>
@endsection