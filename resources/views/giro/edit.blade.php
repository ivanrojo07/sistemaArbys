@extends('layouts.app')
	@section('content')
	<div class="container">
		<form role="form" method="POST" action="{{ route('giros.update',['giro'=>$giro]) }}">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PUT">
			<div class="panel panel-default">
				<div class="panel-heading">
					Nuevo Giro
				</div>
				<div class="panel-body">
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="nombre">Nombre:</label>
	  					<input type="text" class="form-control" id="nombre" name="nombre" value="{{ $giro->nombre }}">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="etiqueta">Etiqueta:</label>
	  					<input type="text" class="form-control" id="etiqueta" name="etiqueta" value="{{ $giro->etiqueta }}">
					</div>
				</div>
				<div class="panel-body">
						<button type="submit" class="btn btn-default">Guardar</button>
				</div>	
			</div>
		</form>
	</div>
	@endsection