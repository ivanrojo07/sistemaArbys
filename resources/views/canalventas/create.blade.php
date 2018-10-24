@extends('layouts.blank') 
@section('content')

<div class="container">
	<form role="form" method="POST" action="{{ route('canalventas.store') }}">
		{{ csrf_field() }}
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Nuevo Canal de Ventas <small><i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</small></h4>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label"><i class="fa fa-asterisk" aria-hidden="true"></i> Nombre del Canal de Ventas:</label>
						<input type="text" class="form-control" id="nombre" name="nombre" required autofocus>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">Etiqueta:</label>
						<input type="text" class="form-control" id="etiqueta" name="etiqueta">
					</div>
				</div>
			</div>
			<div class="panel-body">
				<button type="submit" class="btn btn-success">
					<strong>Guardar</strong>
				</button>
			</div>
		</div>
	</form>
</div>

@endsection  