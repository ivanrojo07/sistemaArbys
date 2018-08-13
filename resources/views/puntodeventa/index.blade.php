@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Puntos de Venta:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a href="{{ route('puntoDeVenta.create') }}"><button class="btn btn-success">Agregar Nuevo</button></a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
							<tr class="info">
								<th>#</th>
								<th>Nombre</th>
								<th>Abreviatura</th>
								<th>Plaza</th>
								<th># Stand</th>
								<th class="text-center">Acciones</th>
							</tr>
							@foreach($puntos as $punto)
							<tr>
								<td>{{ $punto->id }}</td>
								<td>{{ $punto->nombre }}</td>
								<td>{{ $punto->abreviatura }}</td>
								<td>{{ $punto->nombre_plaza }}</td>
								<td>{{ $punto->numero_stand }}</td>
								<td class="text-center">
									<a class="btn btn-primary btn-sm" href="{{ route('puntoDeVenta.show', ['id' => $punto->id]) }}">
										<i class="fa fa-eye" aria-hidden="true"></i><strong> Ver</strong>
									</a>
									<a class="btn btn-danger btn-sm" href="{{ route('puntoDeVenta.edit', ['id' => $punto->id]) }}">
										<i class="fa fa-pencil-square-o" aria-hidden="true"></i><strong> Editar</strong>
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