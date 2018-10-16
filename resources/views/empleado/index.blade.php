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
						<a class="btn btn-success" href="{{ route('empleados.create')}}">
							<strong>Agregar Empleado</strong>
						</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						@if($empleados->last()->id != 1)
						{{-- <div class="row">
							<div class="col-sm-12 form-group">
								<form action="" id="buscarempleado">
									<div class="input-group">
										<input type="text" id="cliente" name="query" class="form-control" placeholder="Buscar..." autofocus onKeypress="if(event.keyCode == 13) event.returnValue = false;">
										<span class="input-group-btn">
											<a readonly class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></a>
										</span>
									</div>
								</form>
							</div>
						</div> --}}
						{{-- <div class="input-group" id="datos1">
						<form action="" id="buscarempleado">
								<input type="text" id="empleado" name="query" class="form-control" placeholder="Buscar..." onKeypress="if(event.keyCode == 13) event.returnValue = false;" autofocus>
								<span class="input-group-btn">
									<a readonly class="btn btn-default">
										<i class="fa fa-search" aria-hidden="true"></i>
									</a>
								</span>
							</form>
						</div> --}}
						<table class="table table-striped table-bordered table-hover" style="color: rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
							<thead>
								<tr class="info">
									<th>@sortablelink('identificador', '#')</th>
									<th>@sortablelink('nombre', 'Nombre')</th>
									<th>@sortablelink('appaterno', 'Apellido Paterno')</th>
									<th>@sortablelink('apmaterno', 'Apellido Materno')</th>
									<th>@sortablelink('rfc', 'R.F.C.')</th>
									<th class="text-center">Acciones</th>
								</tr>
							</thead>
							@foreach ($empleados as $empleado)
							@if($empleado->id != 1)
							<tr class="active" title="Has Click Aquì para Ver" style="cursor: pointer" href="#{{$empleado->id}}">
								<td>{{$empleado->id}}</td>
								<td>{{$empleado->nombre}}</td>
								<td>{{$empleado->appaterno}}</td>
								<td>{{$empleado->apmaterno}}</td>
								<td>{{$empleado->rfc}}</td>
								<td class="text-center">
									<a class="btn btn-success btn-sm" href="{{ route('empleados.show',['empleado'=>$empleado]) }}">
										<i class="fa fa-eye" aria-hidden="true"></i><strong> Ver</strong>
									</a>
									<a class="btn btn-info btn-sm" href="{{ route('empleados.edit',['empleado'=>$empleado]) }}">
										<i class="fa fa-pencil-square-o" aria-hidden="true"></i><strong>Editar</strong>
									</a>
								</td>
							</tr>
							@endif
							@endforeach
						</table>
						{{ $empleados->links() }}
						@else
						<h4>No hay empleados agregados.</h4>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection