@extends('layouts.blank')
	@section('content')
	<div class="container">
		<form role="form" method="POST" action="{{ route('formacontactos.store') }}">
			{{ csrf_field() }}
			<div class="panel panel-default">
				<div class="panel-heading">
					Nueva Forma de contacto
				</div>
				<div class="panel-body">
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="nombre">* Nombre:</label>
	  					<input type="text" class="form-control" id="nombre" name="nombre" required autofocus>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="etiqueta">Etiqueta:</label>
	  					<input type="text" class="form-control" id="etiqueta" name="etiqueta">
					</div>
				</div>
				<div class="panel-body">
					<button type="submit" class="btn btn-success">Guardar</button>
					<p><strong><i class="fa fa-asterisk" aria-hidden="true"></i>Campo requerido</strong></p>
				</div>	
			</div>
		</form>
	</div>
	@endsection