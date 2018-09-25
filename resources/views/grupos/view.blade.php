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
			<div class="panel-body">
				<div class="row">
					<div class="form-group col-sm-4">
						<label for="nombre" class="control-label">Nombre:</label>
						<input type="text" name="nombre" class="form-control" id="nombre" value="{{ $grupo->nombre }}" disabled="">
					</div>
					@php($e = $grupo->subgerente->empleado)
					<div class="form-group col-sm-4">
						<label for="estado" class="control-label">Subgerente:</label>
						<input type="text" name="nombre" class="form-control" id="nombre" value="{{ $e->nombre . ' ' . $e->appaterno . ' ' . $e->apmaterno }}" disabled="">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 text-center">
						<a href="{{ route('grupos.edit', ['id' => $grupo->id]) }}"><button class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection