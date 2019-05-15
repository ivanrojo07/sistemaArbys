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
						@if(count($empleados) > 0)
							<table id="empleados" class="table table-striped table-bordered table-hover" style=" margin-bottom: 0px;">
								<thead>
								<tr class="info">
									<th>ID</th>
									<th>Nombre</th>
									<th>Apellido Paterno</th>
									<th>Apellido Materno</th>
									<th>RFC</th>
									<th>Puesto</th>
									<th>Oficina</th>
									<th class="text-center">Acciones</th>
								</tr>
								</thead>
								<tbody>
								@foreach ($empleados as $empleado)
									@if($empleado->id != 1)
										<tr>
											<td>{{ $empleado->id }}</td>
											<td>{{ $empleado->nombre }}</td>
											<td>{{ $empleado->appaterno }}</td>
											<td>{{ $empleado->apmaterno }}</td>
											<td>{{ $empleado->rfc }}</td>
											@if(count($empleado->laborales) > 0)
											<td>{{ $empleado->laborales->last()->puesto->nombre }}</td>
											<th>
												@isset($empleado->laborales->last()->oficina->nombre)
													{{ $empleado->laborales->last()->oficina->nombre }}
												@endisset
											</th>
											@else
											<td> -- </td>
											<td> -- </td>
											@endif
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
								</tbody>
							</table>
							{{ $empleados->links() }}
						@else
							<h4>No hay empleados disponibles.</h4>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
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