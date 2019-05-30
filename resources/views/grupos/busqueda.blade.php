<div class="row">
	<div class="col-sm-12">
		@if(count($grupos) > 0)
			<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px">
				<tr class="info">
					<th class="col-sm-2">Nombre</th>
					<th class="col-sm-2">Oficina</th>
					<th class="col-sm-2">Subgerente</th>
					<th class="col-sm-2">Capacidad</th>
					<th class="text-center col-sm-2">Acciones</th>
				</tr>
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
			</table>
		@else
			<h4>Aún no hay grupos registrados.</h4>
		@endif
	</div>
</div>