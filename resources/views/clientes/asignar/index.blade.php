@extends('layouts.blank') 
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Vendedores:</h4>
					</div>
				</div>
			</div>
		</div>
		<form action="{{ route('clientes.unir') }}" method="post">
			{{ csrf_field() }}
			<div class="panel-default">
				<div class="panel-body">
					<div id="vendedores">
						<div class="row">
							<div class="col-sm-12">
								@if(count($vendedores) > 0)
									<table id="tabla-vendedores" class="table table-stripped table-bordered table-hover" style="margin-bottom: 0px;">
										<thead>
											<tr class="info">
												<th>Nombre</th>
												<th>Oficina</th>
												<th>Estado</th>
												<th class="col-sm-1">Seleccionar</th>
											</tr>
										</thead>
										<tbody>
										@foreach($vendedores as $vendedor)
											<tr>
												<td>{{ $vendedor->empleado->nombre }} {{ $vendedor->empleado->appaterno }}</td>
												<td>{{ $vendedor->empleado->laborales->last()->oficina->nombre }}</td>
												<td>{{ $vendedor->status }}</td>
												<td class="text-center">
													<input type="radio" name="vendedor_id" value="{{ $vendedor->id }}" required="">
												</td>
											</tr>
										@endforeach
										</tbody>
									</table>
								@else
									<h4>No hay vendedores disponibles.</h4>
								@endif
							</div>
						</div>
					</div>
				</div>
				<div class="panel-heading">
					<div class="row">
						<div class="col-sm-4">
							<h4>Clientes:</h4>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-12">
							@if(count($clientes) > 0)
								<table id="tabla-clientes" class="table table-stripped table-bordered table-hover" style="margin-bottom: 0px;">
									<thead>
										<tr class="info">
											<th>Nombre</th>
											<th>Vendedor</th>
											<th class="col-sm-1">Seleccionar</th>
										</tr>
									</thead>
									<tbody>
									@foreach($clientes as $cliente)
										<tr>
											<td>{{ $cliente->razon }}{{ $cliente->nombre }} {{ $cliente->appaterno }}</td>
											@if($cliente->vendedor)
											<td>{{ $cliente->vendedor->empleado->nombre }} {{ $cliente->vendedor->empleado->appaterno }}</td>
											@else
											<td>No asignado</td>
											@endif
											<td class="text-center">
												<input type="radio" name="cliente_id" value="{{ $cliente->id }}" required="">
											</td>
										</tr>
									@endforeach
									</tbody>
								</table>
							@else
								<h4>No hay clientes disponibles.</h4>
							@endif
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-sm-4 col-sm-offset-4 text-center">
			  				<button type="submit" class="btn btn-success">
				  				<i class="fa fa-check"></i> Asignar
				  			</button>
						</div>
						<div class="col-sm-4 text-right text-danger">
							<h5>✱Campos Requeridos</h5>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection
@section('scripts')
<script>
	$(document).ready( function () {
	    $('#tabla-vendedores').DataTable();
	    $('#tabla-clientes').DataTable();
	} );
</script>
@endsection