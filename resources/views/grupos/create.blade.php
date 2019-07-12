@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Datos del Grupo:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a href="{{ route('grupos.index') }}"><button class="btn btn-primary"><strong><i class="fa fa-eye" aria-hidden="true"></i> Ver Grupos</strong></button></a>
					</div>
				</div>
			</div>
			<form action="{{ route('grupos.store') }}" method="post">
				{{ csrf_field() }}
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-sm-4">
							<label for="nombre" class="control-label">Nombre:</label>
							<input type="text" name="nombre" class="form-control" id="nombre" required="">
						</div>
						<div class="form-group col-sm-4">
							<label for="estado" class="control-label">Subgerente:</label>
							<select class="form-control" name="subgerente_id" id="subgerente" required="">
								<option selected="">Seleccionar</option>
								@foreach($subgerentes as $subgerente)
									@php($empleado = $subgerente->empleado)
									<option value="{{ $subgerente->id }}">{{ $empleado->nombre . ' ' . $empleado->appaterno }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 text-center">
							<button type="submit" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Guardar</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection