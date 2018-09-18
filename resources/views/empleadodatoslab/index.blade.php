@extends('layouts.infoempleado')
@section('infoempleado')

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

@if(!$datoslab)
<h3>Aún no tienes historial laboral</h3>
@endif
@if($datoslab)			
<div class="panel panel-default">
  	<div class="panel-heading" align="center">
  		<strong>Datos Laborales Actuales</strong>
  	</div>
  	<div class="panel-body" >
	  	<div class="row"> 
			<div class="form-group col-sm-3">
				<label class="control-label" for="fechacontratacion">Fecha de Contratación:</label>
				<dd><strong> {{ $datoslab->fechacontratacion }}</strong></dd>
			</div>
			<div class="form-group col-sm-3">
				<label class="control-label" for="contrato">Tipo de Contrato:</label>
				<dd>{{ $datoslab->contrato->nombre }}</dd>
			</div>
	        <div class="form-group col-sm-3">
				<label class="control-label" for="area">Área:</label>
				<dd>{{ $datoslab->area->nombre }}</dd>
			</div>
			<div class="form-group col-sm-3">
				<label class="control-label" for="puesto">Puesto:</label>
				<dd>{{ $datoslab->puesto->nombre }}</dd>
			</div>
		</div>
		<div class="row">
			@if($datoslab->puesto->nombre == 'Director Regional')
			<div class="form-group col-sm-3">
				<label class="control-label">Region:</label>
				<dd>{{ $datoslab->region->nombre }}</dd>
			</div>
			@elseif($datoslab->puesto->nombre == 'Director Estatal')
			<div class="form-group col-sm-3">
				<label class="control-label">Region:</label>
				<dd>{{ $datoslab->estado->region->nombre }}</dd>
			</div>
			@elseif($datoslab->puesto->nombre == 'Gerente' || $datoslab->puesto->nombre == 'Subgerente' || $datoslab->puesto->nombre == 'Vendedor')
			<div class="form-group col-sm-3">
				<label class="control-label">Region:</label>
				<dd>{{ $datoslab->oficina->estado->region->nombre }}</dd>
			</div>
			@endif
			@if($datoslab->puesto->nombre == 'Director Estatal')
			<div class="form-group col-sm-3">
				<label class="control-label">Estado:</label>
				<dd>{{ $datoslab->estado->nombre }}</dd>
			</div>
			@elseif($datoslab->puesto->nombre == 'Gerente' || $datoslab->puesto->nombre == 'Subgerente' || $datoslab->puesto->nombre == 'Vendedor')
			<div class="form-group col-sm-3">
				<label class="control-label">Estado:</label>
				<dd>{{ $datoslab->oficina->estado->nombre }}</dd>
			</div>
			@endif
			@if($datoslab->puesto->nombre == 'Gerente' || $datoslab->puesto->nombre == 'Subgerente' || $datoslab->puesto->nombre == 'Vendedor')
			<div class="form-group col-sm-3">
				<label class="control-label">Oficina:</label>
				<dd>{{ $datoslab->oficina->nombre }}</dd>
			</div>
			@endif
			@if($datoslab->puesto->nombre == 'Vendedor')
			<div class="form-group col-sm-3">
				<label class="control-label">Subgerente:</label>
				<dd>{{ $subgerente->nombre }}</dd>
			</div>
			@endif
		</div>
	</div>
</div>
@endif

@endsection