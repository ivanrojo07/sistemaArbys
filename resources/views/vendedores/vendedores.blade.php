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
									<table class="table table-stripped table-bordered table-hover" style="margin-bottom: 0px;">
										<tr class="info">
											<th class="text-center">Nombre</th>
											<th class="text-center">Grupo</th>
											<th class="text-center">Subgerente</th>
													
											<th class="col-sm-1">Acciones</th>
										</tr>
										@foreach($vendedores as $vendedor)
											<tr>
												{{-- @if(isset($vendedor->grupo)) --}}
												<td>{{ $vendedor->empleado->nombre}} {{ $vendedor->empleado->appaterno }} {{ $vendedor->empleado->apmaterno }}</td>
												<td>
													@if ($vendedor->grupo->count())
														{{ $vendedor->grupo}}
													@endif
													
												</td>
												<td>
													@if ($vendedor->empleado->grupo->subgerente->count())
														{{ $vendedor->empleado->grupo->subgerente}}
													@endif
													
												</td>
												{{-- @else --}}
													{{-- <td>No asignado</td>
													<td>No asignado</td> --}}
												{{-- @endif --}}												
										@endforeach
												
												
												<td>
													
												</td>
										
									</table>
									<br>
									<br>
									<br>
									<table class="table table-stripped table-bordered table-hover" style="margin-bottom: 0px;">
										<tr class="info">
											
											<th class="text-center">Nombre</th>
											<th class="text-center">Grupo</th>

											<th class="text-center">Subgerente</th>						

											<th class="text-center">Ventas</th>
											<th class="col-sm-1">Acciones</th>
										</tr>
										
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
							</div>
						</div>
					</div>
				</div>
	</div>
</div>

@endsection