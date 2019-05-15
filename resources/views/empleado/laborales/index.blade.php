@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		@include('empleado.head')
		<ul class="nav nav-tabs nav-justified">
			<li><a href="{{ route('empleados.show', ['empleado' => $empleado]) }}">Generales:</a></li>
			<li class="active"><a href="{{ route('empleados.laborals.index', ['empleado' => $empleado]) }}">Laborales:</a></li>
			@if(count($empleado->laborales) > 0 && $empleado->laborales->last()->puesto->nombre == "Vendedor")
				<li><a href="{{ route('empleados.objetivos.index', ['empleado' => $empleado]) }}">Ventas:</a></li>
			@endif
			<li><a href="{{ route('empleados.estudios.index', ['empleado' => $empleado]) }}">Estudios:</a></li>
			<li><a href="{{ route('empleados.emergencias.index', ['empleado' => $empleado]) }}">Emergencias:</a></li>
			<li><a href="{{ route('empleados.vacaciones.index', ['empleado' => $empleado]) }}">Vacaciones:</a></li>
			<li><a href="{{ route('empleados.faltas.index', ['empleado' => $empleado]) }}">Administrativo:</a></li>
		</ul>
		<div class="panel-default">
		  	<div class="panel-heading">
		  		<div class="row">
					<div class="col-sm-4">
						<h5>Laborales:</h5>
					</div>
					<div class="col-sm-4 text-center">
						{{--  <a class="btn btn-success btn-md" href="{{ route('empleados.laborals.createLaborals', ['empleado' => $empleado]) }}">
							<i class="fa fa-plus"></i><strong> Agregar</strong>
						</a>--}}
						<a class="btn btn-warning btn-md" href="{{ route('empleados.laborals.edit', ['empleado' => $empleado, 'laboral' => $datoslab]) }}">
							<i class="fa fa-pencil"></i><strong> Editar</strong>
						</a>
					</div>
				</div>
		  	</div>
		  	<div class="panel-body">
			  	<div class="row"> 
					<div class="form-group col-sm-3">
						<label class="control-label">Fecha Contratación:</label>
						<dd>{{ $datoslab->contratacion }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">Fecha Actualización:</label>
						<dd>{{ $datoslab->actualizacion }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">Tipo de Contrato:</label>
						<dd>{{ $datoslab->contrato->nombre }}</dd>
					</div>
			        <div class="form-group col-sm-3">
						<label class="control-label">Área:</label>
						<dd>{{ $datoslab->area->nombre }}</dd>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label">Puesto:</label>
						<dd>{{ $datoslab->puesto->nombre }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">Puesto Inicial:</label>
						<dd>{{ $datoslab->original }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">Salario:</label>
						<dd>${{ number_format($datoslab->actual, 2) }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">Salario Inicial:</label>
						<dd>${{ number_format($datoslab->inicial, 2) }}</dd>
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

						@isset ($datoslab->oficina->estado->region->nombre)
						    <div class="form-group col-sm-3">
								<label class="control-label">Region:</label>
								<dd>{{ $datoslab->oficina->estado->region->nombre }}</dd>
							</div>
						@endisset
					
					@endif
					@if($datoslab->puesto->nombre == 'Director Estatal')
					<div class="form-group col-sm-3">
						<label class="control-label">Estado:</label>
						<dd>{{ $datoslab->estado->nombre }}</dd>
					</div>
					@elseif($datoslab->puesto->nombre == 'Gerente' || $datoslab->puesto->nombre == 'Subgerente' || $datoslab->puesto->nombre == 'Vendedor')
						@isset ($datoslab->oficina->estado->nombre)
						    <div class="form-group col-sm-3">
								<label class="control-label">Estado:</label>
								<dd>{{ $datoslab->oficina->estado->nombre }}</dd>
							</div>
						@endisset
					
					@endif
					@if($datoslab->puesto->nombre == 'Gerente' || $datoslab->puesto->nombre == 'Subgerente' || $datoslab->puesto->nombre == 'Vendedor')
						@isset ($datoslab->oficina->nombre)
						    <div class="form-group col-sm-3">
								<label class="control-label">Oficina:</label>
								<dd>{{ $datoslab->oficina->nombre }}</dd>
							</div>
						@endisset
					
					@endif
					@if($datoslab->puesto->nombre == 'Vendedor')
					<div class="form-group col-sm-3">
						<label class="control-label">Grupo:</label>
						@isset ($datoslab->empleado->vendedor->grupo)
						    <dd>{{ $datoslab->empleado->vendedor->grupo ? $datoslab->empleado->vendedor->grupo->nombre : 'No Asignado.' }}</dd>
						@endisset
						@empty ($datoslab->empleado->vendedor->grupo)
						    <dd>No Asignado</dd>
						@endempty
						
					</div>
						@isset ($datoslab->empleado->vendedor->experto)
						    <div class="form-group col-sm-3">
								<label class="control-label">Experto en:</label>
								<dd>{{ $datoslab->empleado->vendedor->experto }}</dd>
							</div>
						@endisset
					
					@endif
				</div>
			</div>
		  	<div class="panel-heading">
		  		<h5>Historial de Datos Laborales:</h5>
		  	</div>
		  	<div class="panel-body">
		  		<div class="row">
		  			<div class="col-sm-12">
		  				<table class="table table-bordered table-hover table-stripped">
		  					<tr class="info">
		  						<th class="col-sm-4">Salario:</th>
		  						<th class="col-sm-4">Puesto:</th>
		  						<th class="col-sm-4">Fecha:</th>
		  					</tr>
		  					@foreach($laborales as $laboral)
			  					<tr>
									<td>${{ number_format($laboral->actual, 2) }}</td>
			  						<td>{{ $laboral->puesto->nombre }}</td>
			  						<td>{{ $laboral->actualizacion }}</td>
			  					</tr>
		  					@endforeach
		  				</table>
		  			</div>
		  		</div>
		  	</div>
		</div>
	</div>
</div>

@endsection