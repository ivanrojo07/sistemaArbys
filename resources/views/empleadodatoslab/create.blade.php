@extends('layouts.infoempleado')
@section('infoempleado')
	{{-- expr --}}
	<div>
		<ul class="nav nav-pills nav-justified">
			<li role="presentation" class=""><a href="#"  class="ui-tabs-anchor">Generales:</a></li>

			<li role="presentation" class="active"><a href="#" class="ui-tabs-anchor">Laborales:</a></li>

			<li role="presentation" class=""><a href="#" class="ui-tabs-anchor">Estudios:</a></li>

			<li role="presentation" class=""><a href="#" class="ui-tabs-anchor">Emergencias:</a></li>

			<li role="presentation" class=""><a href="#" class="ui-tabs-anchor">Vacaciones:</a></li>

			<li role="presentation" class=""><a href="#" class="ui-tabs-anchor">Administrativo:</a></li>
		</ul>
	</div>
	<div class="panel-default">
		<div class="panel-heading"><h5>Laborales:</h5></div>
		<div class="panel-body">
			<form role="form" method="POST" action="{{ route('empleados.datoslaborales.store',['empleado'=>$empleado]) }}">
				{{ csrf_field() }}
				<input type="hidden" name="empleado_id" value="{{$empleado->id}}">
				<div class="col-md-12 offset-md-2 mt-3">
					<div class="form-group col-xs-3">
						<label class="control-label" for="fechacontratacion">Fecha de contratación:</label>
						<input class="form-control" type="date" id="fechacontratacion" name="fechacontratacion" value="{{ $datoslab->fechacontratacion }}">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="contrato">Tipo de contrato:</label>
						<input class="form-control" type="text" id="contrato" name="contrato" value="{{ $datoslab->contrato }}">
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
						<select type="select" class="form-control" name="periodopaga" id="periodopaga" value={{ $datoslab->periodopaga }}>
							<option id="1" value="Semanal">Semanal</option>
							<option id="2" value="Quincenal">Quincenal</option>
							<option id="3" value="Mensual">Mensual</option>
						</select>
					</div>
				</div>
				<div class="col-md-12 offset-md-2 mt-3">
					<div class="form-group col-xs-3">
						<label class="control-label" for="prestaciones">Prestaciones:</label>
						<select class="form-control" type="select" name="prestaciones" id="prestaciones" value="{{ $datoslab->prestaciones }}">
							<option id="1" value="De Ley">De Ley</option>
						</select>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="regimen">Régimen de Contratación:</label>
						<select class="form-control" type="select" name="regimen" id="regimen" value="{{ $datoslab->regimen }}">
							<option id="1" value="Sueldos y Salarios">Sueldos y Salarios</option>
							<option id="2" value="Jubilados">Jubilados</option>
							<option id="3" value="Pensionados">Pensionados</option>
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
							<option id="1" value="0 min">0 min.</option>
							<option id="2" value="30 min">30 min.</option>
							<option id="3" value="45 min">45 min.</option>
							<option id="4" value="60 min">60 min.</option>
							<option id="5" value="1 hr 15 min">1 hr 15 min.</option>
							<option id="6" value="1 hr 30 min">1 hr 30 min.</option>
							<option id="7" value="2 hrs">2 hrs.</option>
							<option id="8" value="2 hrs 30 min">2 hrs 30 min</option>
							<option id="9" value="3 hrs">3 hrs.</option>
						</select>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="lugartrabajo">Lugar de Trabajo:</label>
						<select type="select" name="lugartrabajo" class="form-control" id="lugartrabajo" value="{{ $datoslab->lugartrabajo }}">
							<option id="1" value="Oficinas">Oficinas</option>
							<option id="2" value="Campo">Campo</option>
						</select>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="banco">Banco:</label>
						<select class="form-control" type="select" name="banco" id="banco" value="{{ $datoslab->banco }}">
							<option id="1" value="HSBC">HSBC</option>
							<option id="2" value="Banorte">BANORTE</option>
							<option id="3" value="Banamex">BANAMEX</option>
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
				</div>
				<button type="submit" class="btn btn-success">Guardar</button>
				<p><strong>*Campo requerido</strong></p>
			</form>
		</div>
	</div>
@endsection