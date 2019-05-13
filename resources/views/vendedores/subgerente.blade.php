@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		@include('vendedores.head')
		<ul class="nav nav-tabs nav-justified">
							<li class="active"><a href="{{ url('control_vendedores/subgerentes') }}">Subgerentes:</a></li>
							<li><a href="{{ url('control_vendedores/grupos') }}">Grupos:</a></li>
							<li><a href="">Vendedores:</a></li>
								
						</ul>
		<div class="panel-body">
					<div class="row">
						<div class="col-sm-4 col-sm-offset-3 form-group">
							<div class="input-group">
								<input type="text" id="buscador" class="form-control" autofocus placeholder="Buscar...">
						        <span class="input-group-btn">
									<a class="btn btn-default" onclick="buscar()">
										<i class="fa fa-search"></i>
									</a>
								</span>
							</div>
						</div>
					</div>
					<div id="vendedores">
						<div class="row">
							<div class="col-sm-12 text-center">
								@if(1 > 0)
									<table class="table table-stripped table-bordered table-hover" style="margin-bottom: 0px;">
										<tr class="info">
											<th class="text-center">Nombre</th>
											<th class="text-center">Número de grupos</th>
											<th class="text-center">Número de vendedores</th>						
											<th class="col-sm-1">Acciones</th>
										</tr>
										@foreach($subgerentes as $subgerente)
											<tr>
												{{-- @if(isset($vendedor->grupo)) --}}
												<td>{{ $subgerente->empleado->nombre}} {{ $subgerente->empleado->appaterno }} {{ $subgerente->empleado->apmaterno }}</td>
												<td>{{ $subgerente->grupos->count() }}</td>
												{{-- @else --}}
													{{-- <td>No asignado</td>
													<td>No asignado</td> --}}
												{{-- @endif --}}
												@php
														$vendedores=0;
														
												@endphp	
												<td>@foreach ($subgerente->grupos as $grupo)
													@php
														$vendedores+=$grupo->vendedores->count();
													@endphp
												@endforeach
												{{$vendedores}}
												</td>
												<td>
													<button class="btn btn-primary detalleg">
														Detalles
													</button>
												</td>
												{{-- <td class="text-center">
													<input type="radio" name="vendedor_id" value="{{ $vendedor->id }}" required="">
												</td> --}}
											</tr>
										@endforeach
									</table>
									<br>
									<br>
									<br>
									<table class="table table-stripped table-bordered table-hover" style="margin-bottom: 0px;display: none;" id="grupos">
									</table>
									<br>
									<br>
									<br>
									<table class="table table-stripped table-bordered table-hover" style="margin-bottom: 0px;">
										<tr class="info">
											
											<th class="text-center">Vendedor</th>
											<th class="text-center">Objetivo</th><th class="text-center">Clientes</th>
											<th class="text-center">Ventas</th>						
											<th class="col-sm-1">Acciones</th>
										</tr>
										
									</table>
								@else
									<h4>No hay vendedores disponibles.</h4>
								@endif
							</div>
						</div>
					</div>
				</div>
	</div>
</div>

@endsection
@section('scripts')
<script>
	$(document).ready(function() {
		$('.detalleg').on('click', function(event) {
			var gerente = $(this).parent().parent().children().eq(0).html().split(' ')[1];
			arreglo_gerentes = [
				@foreach($grupos as $grupo)
					{
						'appaterno':"{{ $grupo->subgerente->empleado->appaterno }}"
					},
				@endforeach
			];
			console.log(arreglo_gerentes);
			$('#grupos').empty();
			

			var contenido = `<tr class="info">
				<th class="text-center">grupo</th>
				<th class="text-center"># de vendedores</th>						
				<th class="col-sm-1">Acciones</th>
			</tr>`;
			// for (var i = 0; i < arreglo_gerentes.length ; i++) {
			// 	if (arreglo_gerentes[i] == gerente) {
			// 		contenido += `<tr>

			// 		`;
			// 	}
			// }
				<tr>
					
					{{-- @if(isset($vendedor->grupo)) --}}
					<td>{{$grupo->nombre }}</td>
					{{-- @else --}}
						{{-- <td>No asignado</td>
						<td>No asignado</td> --}}
					{{-- @endif --}}
					
					<td>
					{{$grupo->vendedores->count()}}
					</td>
					<td></td>
					{{-- <td class="text-center">
						<input type="radio" name="vendedor_id" value="{{ $vendedor->id }}" required="">
					</td> --}}
				</tr>
			
		});
	});
</script>

@endsection