@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Grupos:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a class="btn btn-success" href="{{ route('grupos.create') }}"><strong><i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar Grupo</strong></a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-4 form-group">
						<div class="input-group">
							<input type="text" id="buscar" class="form-control" autofocus placeholder="Buscar...">
					        <span class="input-group-btn">
								<a class="btn btn-default"><i class="fa fa-search"></i></a>
							</span>
						</div>
					</div>
				</div>
				<div id="grupos">
					<div class="row">
						<div class="col-sm-12">
							@if(count($grupos) > 0)
								<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;" id="tabla">
									<thead>
										<tr class="info">
											<th class="col-sm-2">Nombre</th>
											<th class="col-sm-2">Oficina</th>
											<th class="col-sm-2">Subgerente</th>
											<th class="col-sm-2">Capacidad</th>
											<th class="text-center col-sm-2">Acciones</th>
										</tr>
									</thead>
									<tbody>
									@foreach($grupos as $grupo)
										<tr>
											<td>{{ $grupo->nombre }}</td>
											@if($grupo->subgerente == null)
												<td> -- </td>
												<td>Sin asignar</td>
											@else
												@php($emp = $grupo->subgerente->empleado)
												<td>{{ $grupo->subgerente->empleado->laborales->last()->oficina->nombre }}</td>
											<td>{{ $emp->nombre . ' ' . $emp->appaterno . ' ' . $emp->apmaterno }}</td>
											@endif
											<td>{{ count($grupo->vendedores) < 4 ? 4 - count($grupo->vendedores) : 'Lleno' }}</td>
											<td class="text-center">
												<a class="btn btn-primary btn-sm" href="{{ route('grupos.show', ['grupo' => $grupo]) }}">
													<i class="fa fa-eye" aria-hidden="true"></i><strong> Ver</strong>
												</a>
												<a class="btn btn-warning btn-sm" href="{{ route('grupos.edit', ['grupo' => $grupo]) }}">
													<i class="fa fa-pencil" aria-hidden="true"></i><strong> Editar</strong>
												</a>
												<form action="{{ route('grupos.destroy', ['grupo' => $grupo]) }}" style="display: inline;" method="post">
													{{ csrf_field() }}
													<input type="hidden" name="_method" value="DELETE">
													<button type="submit" class="btn btn-danger btn-sm">
														<i class="fa fa-times"></i> Eliminar
													</button>
												</form>
											</td>
										</tr>
									@endforeach
									</tbody>
								</table>
							@else
								<h4>Aún no hay grupos registrados.</h4>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function($) {
		$('#buscar').on('keyup', function() {
			//event.preventDefault();
			var value = $(this).val();
			var rows = $('#tabla tbody tr');
			$.each(rows, function(index, el) {
				var showRow = false;
				el.style.display = 'none';

				for(var x = 0; x < el.childElementCount; x++){
	                if(el.children[x].textContent.toLowerCase().indexOf(value.toLowerCase().trim()) > -1){
	                    showRow = true;
	                    break;
	                }
	            }
	            if(showRow){
	                el.style.display = null;
	            }

			});
		});
	});

</script>

@endsection