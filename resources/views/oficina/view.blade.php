@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Datos de la Oficina:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a href="{{ route('oficina.index') }}"><button class="btn btn-primary">Ver Oficinas</button></a>
						<a href="{{ route('oficina.edit', ['id' => $oficina->id]) }}"><button class="btn btn-danger">Editar</button></a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-4">
						<div class="row">
							<div class="form-group col-sm-12">
								<label for="nombre" class="control-label">Nombre:</label>
								<input type="text" name="nombre" class="form-control" id="nombre" value="{{ $oficina->nombre }}" readonly="">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-3">
								<label for="abreviatura" class="control-label">Abreviatura:</label>
								<input type="text" name="abreviatura" maxlength="3" class="form-control" id="abreviatura" value="{{ $oficina->abreviatura }}" readonly="">
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="row">
							<div class="form-group col-sm-12">
								<label for="responsable" class="control-label">Responsable:</label>
								<input type="text" name="responsable" class="form-control" id="responsable" value="{{ $oficina->responsable }}" readonly="">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-12">
								<label for="estado" class="control-label">Estado al que pertenece:</label>
								<input type="text" name="estado_id" class="form-control" id="estado" value="{{ $oficina->estado->nombre }}" readonly="">
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="row">
							<div class="form-group col-sm-12">
								<label for="descripcion" class="control-label">Descripción:</label>
								<textarea class="form-control" maxlength="500" rows="4" name="descripcion" id="descripcion" readonly="">{{ $oficina->descripcion }}</textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel-heading">
				<h4>Dirección:</h4>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="form-group col-sm-4">
						<label for="calle" class="control-label">Calle:</label>
						<input type="text" class="form-control" id="calle" name="calle" value="{{ $oficina->calle }}" readonly="">
					</div>
					<div class="form-group col-sm-4">
						<label for="numext" class="control-label">Número Exterior:</label>
						<input type="text" class="form-control" id="numext" name="numext" value="{{ $oficina->numext }}" readonly="">
					</div>
					<div class="form-group col-sm-4">
						<label for="numint" class="control-label">Número Interior:</label>
						<input type="text" class="form-control" id="numint" name="numint" value="{{ $oficina->numint }}" readonly="">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-4">
						<label for="cp" class="control-label">CP:</label>
						<input type="text" class="form-control" id="cp" name="cp" value="{{ $oficina->cp }}" readonly="">
					</div>
					<div class="form-group col-sm-4">
						<label for="delegacion" class="control-label">Delegación:</label>
						<input type="text" class="form-control" id="delegacion" name="delegacion" value="{{ $oficina->delegacion }}" readonly="">
					</div>
					<div class="form-group col-sm-4">
						<label for="ciudad" class="control-label">Ciudad:</label>
						<input type="text" class="form-control" id="ciudad" name="ciudad" value="{{ $oficina->ciudad }}" readonly="">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection