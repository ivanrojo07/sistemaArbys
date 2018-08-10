@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Oficinas:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a href="{{ route('oficina.create') }}"><button class="btn btn-primary">Agregar Nueva</button></a>
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
								<th>Responsable</th>
								<th class="text-center">Acciones</th>
							</tr>
							@foreach($oficinas as $oficina)
							<tr>
								<td>{{ $oficina->id }}</td>
								<td>{{ $oficina->nombre }}</td>
								<td>{{ $oficina->abreviatura }}</td>
								<td>{{ $oficina->responsable }}</td>
								<td class="text-center">
									<a class="btn btn-success btn-sm" href="#">
										<i class="fa fa-eye" aria-hidden="true"></i><strong> Ver</strong>
									</a>
									<a class="btn btn-info btn-sm" href="#">
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