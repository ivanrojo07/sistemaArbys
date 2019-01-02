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
						<a href="{{ route('clientes.index') }}" class="btn btn-primary">
							<i class="fa fa-bars"></i><strong> Lista de Clientes</strong>
						</a>
					</div>
				</div>
			</div>
			<form method="POST" action="{{ route('clientes.store') }}">
				{{ csrf_field() }}
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-3 form-group">
							<label class="control-label">Tipo de Persona:</label>
							<select type="select" name="tipo" class="form-control" onchange="persona(this)">
								<option value="Fisica">Fisica</option>
								{{-- <option value="Moral">Moral</option> --}}
							</select>
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">✱RFC:</label>
							<input type="text" class="form-control" name="rfc" required="">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">✱Fecha de Nacimiento:</label>
							<input type="date" class="form-control" id="fecha_nacimiento" name="nacimiento" required>
						</div>
						<div id="fisica">
							<div class="col-sm-3 form-group">
								<label class="control-label">✱Nombre</label>
								<input type="text" class="form-control" name="nombre" id="nombre">
							</div>
							<div class="col-sm-3 form-group">
								<label class="control-label">✱Apellido Paterno:</label>
								<input type="text" class="form-control" name="appaterno" id="appaterno">
							</div>
							<div class="col-sm-3 form-group">
								<label class="control-label">Apellido Materno:</label>
								<input type="text" class="form-control" name="apmaterno">
							</div>
						</div>
						<div id="moral" style="display: none;">
							<div class="col-sm-3 form-group">
								<label class="control-label">✱Razon Social:</label>
								<input type="text" class="form-control" name="razon" id="razonsocial">
							</div>
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">✱Correo Electrónico:</label>
							<input type="email" class="form-control" name="email" required>
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Teléfono:</label>
							<input type="number" class="form-control" name="telefono" pattern="+[0-9]">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Teléfono Celular:</label>
							<input type="number" class="form-control" name="movil" pattern="+[0-9]">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">✱Canal de Ventas:</label>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon3" onclick='getCanales()'><i class="fa fa-refresh"></i></span>
		    					<select type="select" name="canal" class="form-control" id="canal_ventas" required>
		    						<option  value="">Seleccionar</option>
		    						@foreach($canal_ventas as $canal)
		    							<option  value="{{ $canal->nombre }}">{{ $canal->nombre }}</option>
		    						@endforeach
		    					</select>
						   </div>
						</div>
						<div class="col-sm-6 form-group">
							<label class="control-label">Comentarios:</label>
							<textarea class="form-control" name="comentarios"></textarea>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-sm-4 col-sm-offset-4 text-center">
			  				<button type="submit" class="btn btn-success">
				  				<i class="fa fa-check-circle"></i> Guardar
				  			</button>
						</div>
						<div class="col-sm-4 text-right text-danger">
							<h5>✱Campos Requeridos</h5>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<script>

	function getCanales() {
		$.ajax({
			url: "{{ url('/getcanales') }}",
			type: "GET",
			dataType: "html",
		}).done(function(resultado) {
			$("#canal_ventas").html(resultado);
		});
	}

	function reset() {

	}

	function persona(elemento) {
		reset();
		if(elemento.value == "Física") {
			$("#fisica").show();
			$("#moral").hide();
			$("#nombre").prop('required') = true;
			$("#appaterno").prop('required') = true;
		}
		if(elemento.value =="Moral"){
			document.getElementById('perfisica').style.display='none';
			document.getElementById('permoral').style.display='block';
			$("#rfcm").show();
			$("#rfcf").hide();
			document.getElementById('rfc').name="Fisica";
			document.getElementById('rfc2').name="rfc";
			document.getElementById('rfc2').pattern="^[A-Za-z]{3}[0-9]{6}[A-Za-z0-9]{3}";
			document.getElementById('rfc2').placeholder="Ingrese 12 caracteres";
			document.getElementById('rfc2').title="Siga el formato 3 letras seguidas por 6 digitos y 3 caracteres";
			$("#rfc2").prop('required')=true;
		}
	}

</script>

@endsection