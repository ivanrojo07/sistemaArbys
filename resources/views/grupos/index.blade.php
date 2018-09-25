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
					<div class="col-sm-12">
						<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
							<tr class="info">
								<th class="col-sm-2">Nombre</th>
								<th class="col-sm-2">Oficina</th>
								<th class="col-sm-2">Subgerente</th>
								<th class="text-center col-sm-2">Acciones</th>
							</tr>
							@foreach($grupos as $grupo)
							<tr>
								@php($emp = $grupo->subgerente->empleado)
								<td>{{ $grupo->nombre }}</td>
								<td>{{ $grupo->subgerente->oficina->nombre }}</td>
								<td>{{ $emp->nombre . ' ' . $emp->appaterno . ' ' . $emp->apmaterno }}</td>
								<td class="text-center">
									<a class="btn btn-primary btn-sm" href="{{ route('grupos.show', ['id' => $grupo->id]) }}">
										<i class="fa fa-eye" aria-hidden="true"></i><strong> Ver</strong>
									</a>
									<a class="btn btn-warning btn-sm" href="{{ route('grupos.edit', ['id' => $grupo->id]) }}">
										<i class="fa fa-pencil" aria-hidden="true"></i><strong> Editar</strong>
									</a>
								</td>
							</tr>
							@endforeach
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection