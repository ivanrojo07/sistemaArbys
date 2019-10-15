@extends('layouts.blank')
@section('content')



<div class="container mt-2">

	{{-- MENSAJE EN CASO DE HABER ELIMIADO UN USUARIO --}}
	@if (session('status'))
	<div class="row">
		<div class="col-12">
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		</div>
	</div>
	@endif

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
						@if(count($empleados) > 0)
							<table id="empleados" class="table table-striped table-bordered table-hover" style=" margin-bottom: 0px;">
								<thead>
								<tr class="info text-center">
									<th>ID</th>
									<th>Nombre</th>
									<th>Apellido Paterno</th>
									<th>Apellido Materno</th>
									<th>RFC</th>
									<th>Puesto</th>
									<th>Oficina</th>
									<th>Ver</th>
									<th>Editar</th>
									<th class="text-center">Eliminar</th>
								</tr>
								</thead>
								<tbody>
								@foreach ($empleados as $empleado)
									@if($empleado->id != 1)
										<tr class="text-center">
											<td>{{ $empleado->id }}</td>
											<td>{{ $empleado->nombre }}</td>
											<td>{{ $empleado->appaterno }}</td>
											<td>{{ $empleado->apmaterno }}</td>
											<td>{{ $empleado->rfc }}</td>
											@if(count($empleado->laborales) > 0)
											<td>{{ $empleado->laborales->last()->puesto->nombre }}</td>

												@php($aux_puesto = $empleado->laborales->last()->puesto->nombre)
												@if($aux_puesto == "Director General" || $aux_puesto == "Director Regional" || $aux_puesto == "Director Estatal")
													<td>N/A</td>
												@else
													<td>
												
												@isset($empleado->laborales->last()->oficina->nombre)
													{{ $empleado->laborales->last()->oficina->nombre }}
												@endisset

											</td>
												@endif

											@else
											<td> -- </td>
											<td> -- </td>
											@endif
											<td>
												<a class="btn btn-primary btn-sm" href="{{ route('empleados.show', ['empleado' => $empleado]) }}">
													<i class="fa fa-eye"></i> Ver
												</a>
											</td>
											<td>
												<a class="btn btn-warning btn-sm" href="{{ route('empleados.edit', ['empleado' => $empleado]) }}">
													<i class="fa fa-pencil"></i> Editar
												</a>
											</td>
											<td class="text-center">
												{{-- BOTON ELIMINAR --}}
												<button type="button" class="btn btn-danger eliminar" data-toggle="modal" data-target="#exampleModal{{$empleado->id}}" id-empleado={{$empleado->id}}>Eliminar</button>
												{{-- MODAL --}}
												<div class="modal fade" id="exampleModal{{$empleado->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">Eliminar usuario</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
																{{-- {{url('empleados', [$empleado->id])}} --}}
															<form action="{{url('empleados')}}" method="POST" class="mt-1">
																{{ csrf_field() }}
																{{method_field('DELETE')}}
																<div class="form-group">
																	<label for="motivo" class="col-form-label">¿Estás seguro que quieres eliminarlo?</label>
																</div>
																<input type="hidden" name="empleado_id" value="{{$empleado->id}}">
																<button type="submit" class="btn btn-danger">
																	Eliminar
																</button>
															</form>
														</div>
													</div>
												</div>
											</td>
										</tr>
									@endif
								@endforeach
								</tbody>
							</table>
						@else
							<h4>No hay empleados disponibles.</h4>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('#empleados').DataTable({
		'language':{
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}
	});
} );
</script>
@endsection