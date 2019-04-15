@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-3">
						<h4>Datos del Grupo:</h4>
					</div>
					<div class="col-sm-3 text-center">
						<a href="{{ route('grupos.edit', ['id' => $grupo->id]) }}" class="btn btn-warning">
							<i class="fa fa-pencil"></i><strong> Editar Grupo</strong>
						</a>
					</div>
					<div class="col-sm-3 text-center">
						<a href="{{ route('grupos.create') }}" class="btn btn-success">
							<i class="fa fa-plus"></i><strong> Agregar Grupo</strong>
						</a>
					</div>
					<div class="col-sm-3 text-center">
						<a href="{{ route('grupos.index') }}" class="btn btn-primary">
							<i class="fa fa-bars"></i><strong> Lista de Grupos</strong>
						</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="form-group col-sm-4">
						<label for="nombre" class="control-label">Nombre:</label>
						<input type="text" name="nombre" class="form-control" id="nombre" value="{{ $grupo->nombre }}" disabled="">
					</div>
					@if($grupo->subgerente == null)
						<div class="form-group col-sm-4">
							<label for="estado" class="control-label">Subgerente:</label>
							<input type="text" name="nombre" class="form-control" id="nombre" value="Sin asignar" disabled="">
						</div>
					@else
						@php($e = $grupo->subgerente->empleado)
						<div class="form-group col-sm-4">
							<label for="estado" class="control-label">Subgerente:</label>
							<input type="text" name="nombre" class="form-control" id="nombre" value="{{ $e->nombre . ' ' . $e->appaterno . ' ' . $e->apmaterno }}" disabled="">
						</div>
					@endif
				</div>
			</div>
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Vendedores:</h4>
					</div>
					@if(count($grupo->vendedores) < 4)
						<div class="col-sm-4 text-center">
							<a href="{{ route('grupos.vendedores', ['grupo' => $grupo ]) }}" class="btn btn-success">
								<i class="fa fa-plus"></i><strong> Agregar Vendedores</strong>
							</a>
						</div>
					@endif
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						@if(count($grupo->vendedores) > 0)
							<table class="table table-bordered table-hover table-stripped">
								<tr class="info">
									<th>Nombre</th>
									<th>Apellido Paterno</th>
									<th>Apellido Materno</th>
									<th>Correo</th>
									<th>Acción</th>
								</tr>
								@foreach($grupo->vendedores as $vendedor)
								<tr>
									<td>{{ $vendedor->empleado->nombre }}</td>
									<td>{{ $vendedor->empleado->appaterno }}</td>
									<td>{{ $vendedor->empleado->apmaterno ? $vendedor->empleado->apmaterno : 'N/A' }}</td>
									<td>{{ $vendedor->empleado->email }}</td>
									<td class="text-center">
										<a href="{{ route('empleados.show', ['empleado' => $vendedor->empleado]) }}" class="btn btn-sm btn-primary">
											<i class="fa fa-eye"></i> Ver
										</a>
										<form action="{{ route('grupos.unbind', ['grupo' => $grupo]) }}" method="post" style="display: inline;">
											{{ csrf_field() }}
											<input type="hidden" name="_method" value="DELETE">
											<input type="hidden" name="vendedor_id" value="{{ $vendedor->id }}">
											<button type="submit" class="btn btn-sm btn-danger">
												<i class="fa fa-times"></i> Eliminar
											</button>
										</form>
									</td>
								</tr>
								@endforeach
							</table>
						@else
							<h4>No hay vendedores en el grupo.</h4>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection