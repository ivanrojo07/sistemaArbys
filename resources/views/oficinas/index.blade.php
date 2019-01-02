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
                    @foreach(Auth::user()->perfil->componentes as $componente)
	                    @if($componente->nombre == 'crear oficina')
							<div class="col-sm-4 text-center">
								<a class="btn btn-success" href="{{ route('oficinas.create') }}"><strong><i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar Oficina</strong></a>
							</div>
						@endif
					@endforeach
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						@if(count($oficinas) > 0)
							<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
								<tr class="info">
									<th class="col-sm-1">#</th>
									<th class="col-sm-1">Abreviatura</th>
									<th class="col-sm-2">Nombre</th>
									<th class="col-sm-2">Teléfono</th>
									<th class="text-center col-sm-2">Acciones</th>
								</tr>
								@foreach($oficinas as $oficina)
									<tr>
										<td>{{ $oficina->id }}</td>
										<td>{{ $oficina->abreviatura }}</td>
										<td>{{ $oficina->nombre }}</td>
										<td>{{ $oficina->telefono1 }}</td>
										<td class="text-center">
		                                    @foreach(Auth::user()->perfil->componentes as $componente)
			                                    @if($componente->nombre == 'ver oficina')
													<a class="btn btn-primary btn-sm" href="{{ route('oficinas.show', ['id' => $oficina->id]) }}">
														<i class="fa fa-eye" aria-hidden="true"></i><strong> Ver</strong>
													</a>
												@endif
												@if($componente->nombre == 'editar oficina')
													<a class="btn btn-warning btn-sm" href="{{ route('oficinas.edit', ['id' => $oficina->id]) }}">
														<i class="fa fa-pencil" aria-hidden="true"></i><strong> Editar</strong>
													</a>
												@endif
											@endforeach
										</td>
									</tr>
								@endforeach
							</table>
						@else
							<h4>Aún no hay oficinas agregadas.</h4>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection