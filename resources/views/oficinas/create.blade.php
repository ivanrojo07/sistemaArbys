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
                    @foreach(Auth::user()->perfil->componentes as $componente)
	                    @if($componente->nombre == 'indice oficinas')
							<div class="col-sm-4 text-center">
								<a href="{{ route('oficinas.index') }}"><button class="btn btn-primary"><strong><i class="fa fa-eye" aria-hidden="true"></i> Ver Oficinas</strong></button></a>
							</div>
						@endif
					@endforeach
				</div>
			</div>
			<form action="{{ route('oficinas.store') }}" method="post">
				{{ csrf_field() }}
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-sm-4">
							<label class="control-label">✱Nombre:</label>
							<input type="text" name="nombre" class="form-control" required="">
						</div>
						<div class="form-group col-sm-4">
							<label class="control-label">✱Estado al que pertenece:</label>
							<select class="form-control" name="estado_id" required="">
								<option selected="selected" value="">Seleccionar</option>
								@foreach($estados as $estado)
									<option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col-sm-1">
							<label class="control-label">✱Abreviatura:</label>
							<input type="text" name="abreviatura" maxlength="3" class="form-control" required="">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-4">
							<label class="control-label">Responsable Comercial:</label>
							<input type="text" name="responsable_com" class="form-control" readonly="">
						</div>
						<div class="form-group col-sm-4">
							<label class="control-label">Responsable Administrativo:</label>
							<input type="text" name="responsable_adm" class="form-control" readonly="">
						</div>
						<div class="col-sm-4">
							<label class="control-label">Descripción:</label>
							<textarea class="form-control" maxlength="500" rows="3" name="descripcion"></textarea>
						</div>
					</div>
				</div>
				<div class="panel-default">
					<div class="panel-heading">
						<h4>Dirección:</h4>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="form-group col-sm-3">
								<label class="control-label">✱Calle:</label>
								<input type="text" class="form-control" name="calle" required="">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label">✱Número Exterior:</label>
								<input type="maxlength" class="form-control" name="numext" required="">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label">Número Interior:</label>
								<input type="text" class="form-control" name="numint">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label">✱Colonia:</label>
								<input type="text" class="form-control" name="colonia" required="">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-3">
								<label class="control-label">✱CP:</label>
								<input type="text" class="form-control" maxlength="5" name="cp" required="">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label">✱Delegación:</label>
								<input type="text" class="form-control" name="delegacion" required="">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label">✱Ciudad:</label>
								<input type="text" class="form-control" name="ciudad" required="">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label">✱Teléfono 1:</label>
								<input type="text" class="form-control" maxlength="10" name="telefono1" required="">
							</div>
							<div class="col-sm-3">
								<label class="control-label">Teléfono 2:</label>
								<input type="text" class="form-control" maxlength="10" name="telefono2">
							</div>
							<div class="col-sm-3">
								<label class="control-label">Teléfono 3:</label>
								<input type="text" class="form-control" maxlength="10" name="telefono3">
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-sm-4 col-sm-offset-4 text-center">
								<button type="submit" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Guardar</button>
							</div>
							<div class="col-sm-4 text-right text-danger">
								<h5>✱Campos Requeridos</h5>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection