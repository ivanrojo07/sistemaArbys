@extends('layouts.blank') 
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Canales de Venta:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a class="btn btn-success" href="{{ route('canalventas.create') }}">
							<i class="fa fa-plus"></i><strong> Agregar Canal</strong>
						</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-4">
						
					</div>
				</div>
				@if (count($canalventas) > 0)
					<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px">
						<tr class="info">
							<th>@sortablelink('id', '#')</th>
							<th>@sortablelink('nombre', 'Nombre')</th>
							<th>Acción</th>
						</tr>
						@foreach($canalventas as $canalventa)
							<tr>
								<td>{{ $canalventa->id }}</td>
								<td>{{ $canalventa->nombre }}</td>
								<td class="text-center">
									<a class="btn btn-warning btn-sm" href="{{ route('canalventas.edit', ['banco' => $canalventa]) }}">
										<i class="fa fa-pencil"></i> Editar
									</a>
								</td>
							</tr>
						@endforeach
					</table>
					{{ $canalventas->links() }}
				@else
					<h4>No hay canales de venta disponibles.</h4>
				@endif
			</div>
		</div>
	</div>
</div>

@endsection