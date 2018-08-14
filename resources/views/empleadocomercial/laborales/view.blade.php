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
						<a href="{{ route('empleadoc.show', ['id' => $empleado->id]) }}" class="ui-tabs-anchor">Generales:</a>
					</li>
					<li role="presentation" class="active">
						<a href="#" class="ui-tabs-anchor">Laborales:</a>
					</li>
				</ul>
			</div>
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
								<input class="form-control" type="date" id="fechacontratacion" name="fechacontratacion" value="{{ $datoslab->fechacontratacion }}" readonly="">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="contrato">Tipo de contrato:</label>
								@if($contrato==null)
								<input class="form-control" type="text" id="contrato_id" name="contrato_id" value="NO DEFINIDO" readonly="">
								@else
								<input class="form-control" type="text" id="contrato_id" name="contrato_id" value="{{ $contrato->nombre }}" readonly="">
								@endif
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="area_id">Área:</label>
								@if($area==null)
								<input class="form-control" type="text" id="area_id" name="area_id" value="NO DEFINIDO" readonly="">
								@else
								<input class="form-control" type="text" id="area_id" name="area_id" value="{{ $area->nombre }}" readonly="">
								@endif
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="puesto_id">
								Puesto:</label>
								@if($puesto==null)
								<input class="form-control" type="text" id="puesto_id" name="puesto_id" value="NO DEFINIDO" readonly="">
								@else
								<input class="form-control" type="text" id="puesto_id" name="puesto_id" value="{{ $puesto->nombre }}" readonly="">
								@endif
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-3">
								<label class="control-label" for="sucursal">Sucursal:</label>
								@if($sucursal==null)
								<input class="form-control" type="text" id="sucursal" name="sucursal" value="NO DEFINIDO" readonly="">
								@else
								<input class="form-control" type="text" id="sucursal" name="sucursal" value="{{ $sucursal->nombre }}" readonly="">
								@endif
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="lugartrabajo">Lugar de Trabajo:</label>
								<input class="form-control" type="text" id="lugartrabajo" name="lugartrabajo" value="{{ $datoslab->lugartrabajo }}" readonly="">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-3">
								<label class="control-label" for="salarionom"><i class="fa fa-asterisk" aria-hidden="true"></i>Salario Nóminal:</label>
								<input class="form-control" type="text" id="salarionom" name="salarionom" value="{{ $datoslab->salarionom }}" readonly="">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="salariodia">Salario Diario:</label>
								<input class="form-control" type="text" id="salariodia" name="salariodia" value="{{ $datoslab->salariodia }}" readonly="">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="puesto_inicio">Puesto Inicial:</label>
								<input class="form-control" type="text" id="puesto_inicio" name="puesto_inicio" value="{{ $datoslab->puesto_inicio }}" readonly="">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="periodopaga">Periodicidad de Pago:</label>
								<input class="form-control" type="text" id="periodopaga" name="periodopaga" value="{{ $datoslab->periodopaga }}" readonly="">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-3">
								<label class="control-label" for="prestaciones">Prestaciones:</label>
								<input class="form-control" type="text" id="prestaciones" name="prestaciones" value="{{ $datoslab->prestaciones }}" readonly="">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="regimen">Régimen de Contratación:</label>
								<input class="form-control" type="text" id="regimen" name="regimen" value="{{ $datoslab->regimen }}" readonly="">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="hentrada">Hora de Entrada:</label>
								<input class="form-control" type="text" id="hentrada" name="hentrada" value="{{ $datoslab->hentrada }}" readonly="">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="hsalida">Hora de Salida:</label>
								<input class="form-control" type="text" id="hsalida" name="hsalida" value="{{ $datoslab->hsalida }}" readonly="">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-3">
								<label class="control-label" for="hcomida">Tiempo de Comida:</label>
								<input class="form-control" type="text" id="hcomida" name="hcomida" value="{{ $datoslab->hcomida }}" readonly="">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="banco">Banco:</label>
								@if($datoslab->banco==null)
								<input class="form-control" type="text" id="banco" name="banco" value="NO DEFINIDO" readonly="">
								@else
								<input class="form-control" type="text" id="banco" name="banco" value="{{ $datoslab->banco }}" readonly="">
								@endif
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="cuenta">Cuenta:</label>
								<input class="form-control" type="text" id="cuenta" name="cuenta" value="{{ $datoslab->cuenta }}" readonly="">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="clabe">CLABE:</label>
								<input class="form-control" type="clabe" name="clabe" id="clabe" value="{{ $datoslab->clabe }}" readonly="">
							</div>
						</div>
					</div>
				</div>
		</div>
	</div>
</div>
@endsection