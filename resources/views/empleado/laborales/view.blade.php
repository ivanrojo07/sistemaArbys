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
		<div class="panel-heading"><h5><strong>Laborales:</strong></h5></div>
		<div class="panel-body">
			<div class="col-md-12 offset-md-2 mt-3">
				<div class="form-group col-xs-3">
					<label class="control-label" for="fechacontratacion">Fecha de contratación:</label>
					<dd>{{ $actual->fechacontratacion }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="contrato">Tipo de contrato:</label>
					<dd>{{ $contrato->nombre }}</dd>
				</div>

				<div class="form-group col-xs-3">
					<label class="control-label" for="area">Área:</label>
					
					<dd>{{ $area->nombre }}</dd>
				</div>
				
				<div class="form-group col-xs-3">
					<label class="control-label" for="puesto">Puesto:</label>
					<dd>{{ $puesto->nombre }}</dd>
				</div>

			</div>
			<div class="col-md-12 offset-md-2 mt-3">
				<div class="form-group col-xs-3">
					<label class="control-label" for="salarionom">Salario Nóminal:</label>
					<dd>{{ $actual->salarionom }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="salariodia">Salario Diario:</label>
					<dd>{{ $actual->salariodia }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="puesto_inicio">Puesto Inicial:</label>
					<dd>{{ $actual->puesto_inicio }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="periodopaga">Periodicidad de Pago:</label>
					<dd>{{ $actual->periodopaga }}</dd>
				</div>
			</div>
			<div class="col-md-12 offset-md-2 mt-3">
				<div class="form-group col-xs-3">
					<label class="control-label" for="prestaciones">Prestaciones:</label>
					<dd>{{ $actual->prestaciones }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="regimen">Régimen de Contratación:</label>
					<dd>{{ $actual->regimen }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="hentrada">Hora de Entrada:</label>
					<dd>{{ $actual->hentrada }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="hsalida">Hora de Salida:</label>
					<dd>{{ $actual->hsalida }}</dd>
				</div>
			</div>
			<div class="col-md-12 offset-md-2 mt-3">
				<div class="form-group col-xs-3">
					<label class="control-label" for="hcomida">Tiempo de Comida:</label>
					<dd>{{ $actual->hcomida }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="lugartrabajo">Lugar de Trabajo:</label>
					<dd>{{ $actual->lugartrabajo }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="banco">Banco:</label>
					<dd>{{ $actual->banco }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="cuenta">Cuenta:</label>
					<dd>{{ $actual->cuenta }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="clabe">CLABE:</label>
					<dd>{{ $actual->clabe }}</dd>
				</div>
			</div>
			<div class="col-md-12 offset-md-2 mt-3">
				<div class="form-group col-xs-3">
					<label class="control-label" for="sucursal">Sucursal:</label>
					@if($sucursal==null)
					<dd>NO DEFINIDO</dd>
					@else
					<dd>{{ $sucursal->nombre }}</dd>
					@endif

				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="almacen">Almacen:</label>
					@if($almacen==null)
					<dd>NO DEFINIDO</dd>
					@else
					<dd>{{ $almacen->nombre }}</dd>
					@endif
				</div>
			</div>
			
			<a class="btn btn-info btn-md" href="{{ route('empleados.datoslaborales.edit',['empleado'=>$empleado,'datoslaborale'=>$actual]) }}">
				<strong>Editar</strong>
			</a>
		</div>
	</div>
@endsection