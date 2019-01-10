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
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						@if(count($vendedores) > 0)
							<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px">
								<tr class="info">
									<th>Nombre</th>
									<th>Apellido Paterno</th>
									<th>Apellido Materno</th>
									<th>RFC</th>
									<th>Estado</th>
									<th>Acción</th>
								</tr>
								@foreach($vendedores as $vendedor)
									<tr class="active">
										<td>{{ $vendedor->empleado->nombre }}</td>
										<td>{{ $vendedor->empleado->appaterno }}</td>
										<td>{{ $vendedor->empleado->apmaterno ? $vendedor->empleado->apmaterno : 'N/A' }}</td>
										<td>{{ $vendedor->empleado->rfc }}</td>
										<td>{{ $vendedor->status }}</td>
										<td class="text-center">
											<a class="btn btn-primary btn-sm" href="{{ route('empleados.show', ['empleado' => $vendedor->empleado]) }}">
												<i class="fa fa-eye"></i> Ver
											</a>
											@if($vendedor->status == 'Activo')
												<a class="btn btn-warning btn-sm" href="{{ route('vendedors.baja', ['vendedor' => $vendedor]) }}">
													<i class="fa fa-level-down"></i> Baja
												</a>
											@else
												<a class="btn btn-success btn-sm" href="{{ route('vendedors.alta', ['vendedor' => $vendedor]) }}">
													<i class="fa fa-level-up"></i> Alta
												</a>
												<form action="{{ route('vendedors.destroy', ['vendedor' => $vendedor]) }}" style="display: inline;" method="post">
													{{ csrf_field() }}
													<input type="hidden" name="_method" value="DELETE">
													<button type="submit" class="btn btn-danger btn-sm">
														<i class="fa fa-times"></i> Eliminar
													</button>
												</form>
											@endif
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
	</div>
</div>

@endsection