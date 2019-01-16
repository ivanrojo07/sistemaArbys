@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Datos del Cliente:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a href="{{ route('clientes.create') }}" class="btn btn-success">
							<i class="fa fa-plus"></i><strong> Agregar Cliente</strong>
						</a>
					</div>
					<div class="col-sm-4 text-center">
						<a href="{{ route('clientes.index') }}" class="btn btn-primary">
							<i class="fa fa-bars"></i><strong> Lista de Clientes</strong>
						</a>
					</div>
				</div>
			</div>
		</div>
		<form method="POST" action="{{ route('clientes.update', ['cliente' => $cliente]) }}">
        	<input type="hidden" name="_method" value="PUT">
			{{ csrf_field() }}
			<div class="panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-3 form-group">
							<label class="control-label">Tipo de Persona:</label>
							<dd>{{ $cliente->tipo }}</dd>
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">✱RFC:</label>
							<input type="text" class="form-control" id="rfc" name="rfc" value="{{ $cliente->rfc }}" pattern="{{ $cliente->tipo == 'Física' ? '^[A-Za-z]{4}[0-9]{6}[A-Za-z0-9]{3}' : '^[A-Za-z]{3}[0-9]{6}[A-Za-z0-9]{3}' }}" placeholder="{{ $cliente->tipo == 'Física' ? '13' : '12' }} Caracteres">
						</div>
						@if($cliente->tipo == 'Física')
							<div class="col-sm-3 form-group">
								<label class="control-label">✱Nombre:</label>
		  						<input type="text" class="form-control" id="nombre" name="nombre" required="" value="{{ $cliente->nombre }}">
							</div>
							<div class="col-sm-3 form-group">
								<label class="control-label">✱Apellido Paterno:</label>
		  						<input type="text" class="form-control" id="appaterno" name="appaterno" required="" value="{{ $cliente->appaterno }}">
							</div>
							<div class="col-sm-3 form-group">
								<label class="control-label">Apellido Materno:</label>
		  						<input type="text" class="form-control" id="apmaterno" name="apmaterno" value="{{ $cliente->apmaterno }}">
							</div>
							<div class="col-sm-3 form-group">
								<label class="control-label">✱Fecha de Nacimiento:</label>
			  					<input type="date" class="form-control" id="nacimiento" name="nacimiento" required="" value="{{ $cliente->nacimiento }}">
							</div>
						@else
							<div class="col-sm-3 form-group" id="moral">
								<label class="control-label">✱Razón Social:</label>
		  						<input type="text" class="form-control" id="razon" name="razon" required="" value="{{ $cliente->razon }}">
							</div>
						@endif
						<div class="col-sm-3 form-group">
							<label class="control-label">✱Correo Electrónico:</label>
							<input type="email" class="form-control" id="email" name="email" required value="{{ $cliente->email }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Teléfono:</label>
							<input type="number" class="form-control" id="telefono" name="telefono" pattern="+[0-9]" value="{{ $cliente->telefono }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Teléfono Celular:</label>
							<input type="number" class="form-control" id="movil" name="movil" pattern="+[0-9]" value="{{ $cliente->movil }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label" for="canal_ventas">✱Canal de Ventas:</label>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon3" onclick='getCanales()'>
									<i class="fa fa-refresh"></i>
								</span>
		    					<select type="select" name="canal" class="form-control" id="canal" required>
		    						<option  value="">Seleccionar</option>
		    						@foreach($canal_ventas as $canal)
		    							<option value="{{ $canal->nombre }}"{{ $cliente->canal == $canal->nombre ? ' selected' : '' }}>{{ $canal->nombre }}</option>
		    						@endforeach
		    					</select>
						   </div>
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Comentarios:</label>
		  					<textarea class="form-control" name="comentarios" id="comentarios">{{ $cliente->comentarios }}</textarea>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-sm-4 col-sm-offset-4 text-center">
			  				<button type="submit" class="btn btn-success">
				  				<i class="fa fa-check"></i> Guardar
				  			</button>
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

<script>

	function getCanales() {
		$.ajax({
			url: "{{ url('/getcanales') }}",
			type: "GET",
			dataType: "html",
		}).done(function(resultado) {
			$("#canal").html(resultado);
		});
	}

</script>

@endsection