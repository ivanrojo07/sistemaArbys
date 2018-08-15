@extends('layouts.blank')
@section('content')

<div class="container">
	<div role="application" class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Empleados Comerciales:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a class="btn btn-success" href="{{ route('empleadoc.create') }}"><strong><i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar Empleado</strong></a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<div id="datos" name="datos" class="table-responsive">
							<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
								<tr class="info text-center">
									<th class="col-sm-1">#</th>
									<th class="col-sm-2">Nombre</th>
									<th class="col-sm-2">Apellido Paterno</th>
									<th class="col-sm-2">Apellido Materno</th>
									<th class="col-sm-2">RFC</th>
									<th class="col-sm-2 text-center">Acciones</th>
								</tr>
								@foreach($empleados as $empleado)
								<tr title="Haz click aquí para ver." style="cursor: pointer" href="">
									<td>{{ $empleado->id }}</td>
									<td>{{ $empleado->nombre }}</td>
									<td>{{ $empleado->appaterno }}</td>
									<td>{{ $empleado->apmaterno }}</td>
									<td>{{ $empleado->rfc }}</td>
									<td class="text-center">
										<a href="{{ route('empleadoc.show', ['id' => $empleado->id]) }}"><button class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
										<a href="{{ route('empleadoc.edit', ['id' => $empleado->id]) }}"><button class="btn btn-danger btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button></a>
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
 </div>  			
  			

<script type="text/javascript" src="{{ asset('js/peticion.js') }}"></script>
@endsection