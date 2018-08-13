@extends('layouts.blank')
@section('content')

<div class="container">
	<div role="application" class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<form action="{{-- busqueda --}}" id="buscarempleado">
						<!-- {{ csrf_field() }} -->
						<div class="input-group col-sm-10" id="datos1">
							<input type="text" id="empleado" name="query" class="form-control" placeholder="Buscar..." onKeypress="if(event.keyCode == 13) event.returnValue = false;" autofocus>
							<span class="input-group-btn">
								<a readonly class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></a>
								<a class="btn btn-info" href="{{ route('empleadoc.create') }}"><strong>Agregar Empleado</strong></a>
							</span>
						</div>
					</form>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<div id="datos" name="datos" class="table-responsive">
							<table class="table table-striped table-bordered table-hover" style="color: rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
								<thead>
									<tr class="info text-center">
										<th class="col-sm-1">#</th>
										<th class="col-sm-3">Nombre</th>
										<th class="col-sm-2">Apellido Paterno</th>
										<th class="col-sm-2">Apellido Materno</th>
										<th class="col-sm-2">RFC</th>
										<th class="col-sm-2 text-center">Acciones</th>
									</tr>
								</thead>
								@foreach($empleados as $empleado)
								<tr class="active" title="Haz click aquí para ver." style="cursor: pointer" href="#">
									<td>{{ $empleado->id }}</td>
									<td>{{ $empleado->nombre }}</td>
									<td>{{ $empleado->appaterno }}</td>
									<td>{{ $empleado->apmaterno }}</td>
									<td>{{ $empleado->rfc }}<div class=""></div></td>
									<td class="text-center">
										<a class="btn btn-success btn-sm" href="{{ route('empleadoc.show', ['id' => $empleado->id]) }}">
											<i class="fa fa-eye" aria-hidden="true"></i><strong> Ver</strong>
										</a>
										<a class="btn btn-info btn-sm" href="{{ route('empleadoc.edit', ['id' => $empleado->id]) }}">
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
 </div>  			
  			

<script type="text/javascript" src="{{ asset('js/peticion.js') }}"></script>
@endsection