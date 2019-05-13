@extends('layouts.blank')
@section('content')
	{{-- expr --}}
	
	<div class="container">
		<div class="panel panel-group">
			@include('empleado.head')
			<ul class="nav nav-tabs nav-justified">
				<li role="presentation" class=""><a href="{{ route('empleados.show',['empleado'=>$empleado]) }}"  class="ui-tabs-anchor">Generales:</a></li>
		
				<li role="presentation" ><a href="{{ route('empleados.laborals.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Laborales:</a></li>
				
				@if(count($empleado->laborales) > 0 && $empleado->laborales->last()->puesto->nombre == "Vendedor")
					<li role="presentation" class="active"><a href="{{ route('empleados.objetivos.index', ['empleado' => $empleado]) }}">Ventas:</a></li>
				@endif
		
				<li role="presentation" class=""><a href="{{ route('empleados.estudios.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Estudios:</a></li>
		
				<li role="presentation" class=""><a href="{{ route('empleados.emergencias.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Emergencias:</a></li>
		
				<li role="presentation" class=""><a href="{{ route('empleados.vacaciones.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Vacaciones:</a></li>
		
				<li role="presentation" class=""><a href="{{ route('empleados.faltas.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Administrativo:</a></li>
			</ul>
			<div class="panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-sm-4">
								<h3>Objetivos:</h3>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="form-group col-sm-3">
								<label class="control-label">Fecha:</label>
								<input class="form-control" type="date" name="fecha" id="fecha" value="{{ date("Y-m-d") }}" readonly="">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label">Objetivo Cliente:</label>
								<input class="form-control" type="number" name="num_clientes" id="num_clientes">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label">Objetivo venta:</label>
								<input class="form-control" type="number" name="venta" id="venta">
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-sm-12 text-center">
								<button class="btn btn-success" id="asignar">
									<i class="fa fa-pencil"></i><strong> Asignar</strong>
								</button>
							</div>
						</div>
					</div>
				</div>
			<div class="panel-default">
				<div class="panel-heading"><h3><strong>Historial:</strong></h3></div>
				<div class="panel-body">
					<div class="col-sm-12">
					@if(count($objetivos) > 0)
		  				<table class="table table-bordered table-hover table-stripped">
		  					<tr class="info">
		  						<th class="col-sm-4">Fecha:</th>
		  						<th class="col-sm-4">Objetivo Cliente:</th>
		  						<th class="col-sm-4">Objetivo Venta:</th>
		  					</tr>
		  					@foreach($laborales as $laboral)
			  					<tr>
									<td>${{ number_format($laboral->actual, 2) }}</td>
			  						<td>{{ $laboral->puesto->nombre }}</td>
			  						<td>{{ $laboral->actualizacion }}</td>
			  					</tr>
		  					@endforeach
		  				</table>
		  			@else
		  			<h5>No hay objetivos asignados</h5>
		  			@endif
		  			</div>				
				</div>
			</div>
		</div>
	</div>
@endsection
@section('scripts')
<script>
	$(document).ready(function($) {
		$('#asignar').on('click', function(event) {
			event.preventDefault();
			//falta empleado id
			var objetivo_cliente = $('#num_clientes').val();
		    var objetivo_venta = $('#venta').val();
		    var fecha = $('#fecha').val();
		    var token = '{{csrf_token()}}';// ó $("#token").val() si lo tienes en una etiqueta html.
		    var data={objetivo_cliente:objetivo_cliente,_token:token, objetivo_venta:objetivo_venta, fecha:fecha};
			$.ajax({
				url : '{{ route('empleados.objetivos.store', ['empleado' => $empleado]) }}',
				type : "POST",
				dataType : "json",
				data : data,
			}).done(function (data) {
				console.log("success");
			}).fail(function(data){
				console.log(data);
			});
		});
	});
</script>
@endsection