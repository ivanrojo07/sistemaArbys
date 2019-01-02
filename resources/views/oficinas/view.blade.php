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
			<div class="panel-body">
				<div class="row">
					<div class="form-group col-sm-4">
						<label class="control-label">Nombre:</label>
						<input type="text" name="nombre" class="form-control" value="{{ $oficina->nombre }}" readonly="">
					</div>
					<div class="form-group col-sm-4">
						<label class="control-label">Estado al que pertenece:</label>
						<input type="text" name="estado_id" class="form-control" value="{{ $oficina->estado->nombre }}" readonly="">
					</div>
					<div class="form-group col-sm-1">
						<label class="control-label">Abreviatura:</label>
						<input type="text" name="abreviatura" maxlength="3" class="form-control" value="{{ $oficina->abreviatura }}" readonly="">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-4">
						<label class="control-label">Responsable Comercial:</label>
						<input type="text" name="responsable" class="form-control" value="{{ $oficina->responsable_com }}" readonly="">
					</div>
					<div class="form-group col-sm-4">
						<label class="control-label">Responsable Administrativo:</label>
						<input type="text" name="responsable" class="form-control" value="{{ $oficina->responsable_adm }}" readonly="">
					</div>
					<div class="col-sm-4">
						<label class="control-label">Descripción:</label>
						<textarea class="form-control" maxlength="500" rows="3" name="descripcion" readonly="">{{ $oficina->descripcion }}</textarea>
					</div>
				</div>
			</div>
			<div class="panel-heading">
				<h4>Dirección:</h4>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="form-group col-sm-4">
						<label class="control-label">Calle:</label>
						<input type="text" class="form-control" id="calle" name="calle" value="{{ $oficina->calle }}" readonly="">
					</div>
					<div class="form-group col-sm-4">
						<label class="control-label">Número Exterior:</label>
						<input type="text" class="form-control" id="numext" name="numext" value="{{ $oficina->numext }}" readonly="">
					</div>
					<div class="form-group col-sm-4">
						<label class="control-label">Número Interior:</label>
						<input type="text" class="form-control" id="numint" name="numint" value="{{ $oficina->numint }}" readonly="">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-4">
						<label class="control-label">CP:</label>
						<input type="text" class="form-control" id="cp" name="cp" value="{{ $oficina->cp }}" readonly="">
					</div>
					<div class="form-group col-sm-4">
						<label class="control-label">Delegación:</label>
						<input type="text" class="form-control" id="delegacion" name="delegacion" value="{{ $oficina->delegacion }}" readonly="">
					</div>
					<div class="form-group col-sm-4">
						<label class="control-label">Ciudad:</label>
						<input type="text" class="form-control" id="ciudad" name="ciudad" value="{{ $oficina->ciudad }}" readonly="">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<label class="control-label">Teléfono 1:</label>
						<input type="text" class="form-control" id="cp" name="cp" value="{{ $oficina->telefono1 }}" readonly="">
					</div>
					<div class="col-sm-4">
						<label class="control-label">Teléfono 2:</label>
						<input type="text" class="form-control" id="delegacion" name="delegacion" value="{{ $oficina->telefono2 }}" readonly="">
					</div>
					<div class="col-sm-4">
						<label class="control-label">Teléfono 3:</label>
						<input type="text" class="form-control" id="ciudad" name="ciudad" value="{{ $oficina->telefono3 }}" readonly="">
					</div>
				</div>
			</div>
			@foreach(Auth::user()->perfil->componentes as $componente)
                @if($componente->nombre == 'editar oficina')
					<div class="panel-footer">
						<div class="row">
							<div class="col-sm-12 text-center">
								<a href="{{ route('oficinas.edit', ['id' => $oficina->id]) }}">
									<button class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>
								</a>
							</div>
						</div>
					</div>
				@endif
			@endforeach
		</div>
	</div>
</div>

@endsection