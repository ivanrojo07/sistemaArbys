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
		<form action="{{ route('vendedores.unir') }}" method="post">
			{{ csrf_field() }}
			<div class="panel-default">
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
							<div class="col-sm-12">
								@if(count($vendedores) > 0)
									<table class="table table-stripped table-bordered table-hover" style="margin-bottom: 0px;">
										<tr class="info">
											<th>Vendedor</th>
											<th>Grupo</th>
											<th>Subgerente</th>
											<th class="col-sm-1">Seleccionar</th>
										</tr>
										@foreach($vendedores as $vendedor)
											<tr>
												<td>{{ $vendedor->empleado->nombre }} {{ $vendedor->empleado->appaterno }} {{ $vendedor->empleado->apmaterno }}</td>
												@if(isset($vendedor->grupo))
													<td>{{ $vendedor->grupo->nombre }}</td>
													<td>{{ $vendedor->grupo->subgerente->empleado->nombre}} {{ $vendedor->grupo->subgerente->empleado->appaterno }} {{ $vendedor->grupo->subgerente->empleado->apmaterno }}</td>
												@else
													<td>No asignado</td>
													<td>No asignado</td>
												@endif
												<td class="text-center">
													<input type="radio" name="vendedor_id" value="{{ $vendedor->id }}" required="">
												</td>
											</tr>
										@endforeach
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
							<h4>Grupos:</h4>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-12 text-center">
							@if(count($grupos) > 0)
								<table class="table table-stripped table-bordered table-hover">
									<tr class="info">
										<th class="text-center">Nombre</th>
										<th class="text-center">Cantidad Vendedores</th>
										<th class="text-center">Subgerente</th>
										<th class="text-center">No. de Grupos</th>
										<th class="col-sm-1">Seleccionar</th>
									</tr>
									@foreach($grupos as $grupo)
										<tr>
											<td>{{ $grupo->nombre }}</td>
											@if(count($grupo->vendedores) > 0)
											<td>{{ count($grupo->vendedores) }}</td>
											@else
											<td>No asignado</td>
											@endif
											<td>{{ $grupo->subgerente->empleado->nombre }}{{ $grupo->subgerente->empleado->appaterno }} {{ $grupo->subgerente->empleado->apmaterno }}</td>
											<td>{{ $num_grupos[$grupo->subgerente->id] }}</td>
											<td class="text-center">
												<input type="radio" name="grupo_id" value="{{ $grupo->id }}" required="">
											</td>
										</tr>
									@endforeach
								</table>
							@else
								<h4>No hay grupos disponibles.</h4>
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
					</div>
				</div>
				<div class="panel-heading">
					<div class="row">
						<div class="col-sm-4">
							<h4>Resumen:</h4>
						</div>
					</div>
				</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-3"></div>
							<div class="col-sm-6">
								<table class="table table-stripped table-bordered table-hover">
									<tr class="info">
										<th class="text-center">Gerente</th>
										<th class="text-center">Grupos</th>
										<th class="text-center">No. de Vendedores</th>
									</tr>
									@foreach($grupos as $grupo)
										<tr>
											<td>{{ $grupo->subgerente->empleado->nombre }}{{ $grupo->subgerente->empleado->appaterno }} {{ $grupo->subgerente->empleado->apmaterno }}</td>
											<td>{{ $num_grupos[$grupo->subgerente_id] }}</td>
											@if(count($grupo->vendedores) > 0)
												<td>{{ count($grupo->vendedores) }}</td>
											@else
												<td>No asigando</td>
											@endif
										</tr>
									@endforeach
								</table>
							</div>
						</div>
					</div>
			</div>
		</form>
	</div>
</div>
@section('scripts')
<script>
	$('input[type=radio][name=grupo_id]').click(function(event) {
		let cantidad_vendedores = $(this).closest('tr')[0];
		cantidad_vendedores = $(cantidad_vendedores).children('td')[1].innerHTML;
		if (cantidad_vendedores == 4) {
			swal("¡Upps!", "Ya no puedes asignar mas vendedores a este grupo", "error");
			$(this).attr('checked', false);
		}
	});
</script>
@endsection
@endsection