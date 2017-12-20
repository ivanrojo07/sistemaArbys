@extends('layouts.blank')
@section('content')
	<div class="container">
		<form role="form" method="POST" action="{{ route($actualizar,['familia'=>$precarga]) }}">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PUT">
			<div class="panel panel-default">
				<div class="panel-heading">
					Editar {{$titulo}}
				</div>
				<div class="panel-body">
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="nombre">* Nombre:</label>
						<input type="text" class="form-control" id="nombre" name="nombre" value="{{ $precarga->nombre }}">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="descripcion">Descripción:</label>
						<input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $precarga->descripcion }}">
					</div>
				</div>
				<div class="panel-body">
						<button type="submit" class="btn btn-default">Guardar</button>
						<p><strong>*Campo requerido</strong></p>
				</div>
			</div>
		</form>
	</div>

@endsection