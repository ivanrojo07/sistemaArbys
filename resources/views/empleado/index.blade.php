@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Empleados:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a class="btn btn-success" href="{{ route('empleados.create') }}">
							<i class="fa fa-plus"></i><strong> Agregar Empleado</strong>
						</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						@if($empleados->last()->id != 1)
							<table class="table table-striped table-bordered table-hover" style="color: rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
								<tr class="info">
									<th>ID</th>
									<th>Nombre</th>
									<th>Apellido Paterno</th>
									<th>Apellido Materno</th>
									<th>RFC</th>
									<th class="text-center">Acciones</th>
								</tr>
								@foreach ($empleados as $empleado)
									@if($empleado->id != 1)
										<tr>
											<td>{{ $empleado->id }}</td>
											<td>{{ $empleado->nombre }}</td>
											<td>{{ $empleado->appaterno }}</td>
											<td>{{ $empleado->apmaterno }}</td>
											<td>{{ $empleado->rfc }}</td>
											<td class="text-center">
												<a class="btn btn-primary btn-sm" href="{{ route('empleados.show', ['empleado' => $empleado]) }}">
													<i class="fa fa-eye"></i> Ver
												</a>
												<a class="btn btn-warning btn-sm" href="{{ route('empleados.edit', ['empleado' => $empleado]) }}">
													<i class="fa fa-pencil"></i> Editar
												</a>
											</td>
										</tr>
									@endif
								@endforeach
							</table>
							{{ $empleados->links() }}
						@else
							<h4>No hay empleados agregados.</h4>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection