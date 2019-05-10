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
								<option value="Física">Física</option>
								<option value="Moral">Moral</option>
							</select>
						</div>
						<div id="fisica">
							<div class="col-sm-3 form-group">
								<label class="control-label">✱Nombre</label>
								<input type="text" class="form-control rfc" name="nombre" id="nombre" onchange="calcularRFC();">
							</div>
							<div class="col-sm-3 form-group">
								<label class="control-label">✱Apellido Paterno:</label>
								<input type="text" class="form-control rfc" name="appaterno" id="appaterno" onchange="calcularRFC();">
							</div>
							<div class="col-sm-3 form-group">
								<label class="control-label">Apellido Materno:</label>
								<input type="text" class="form-control rfc" name="apmaterno" id="apmaterno" onchange="calcularRFC();">
							</div>
							<div class="col-sm-3 form-group">
								<label class="control-label">✱Fecha de Nacimiento:</label>
								<input type="date" class="form-control rfc" id="nacimiento" name="nacimiento" onchange="calcularRFC();">
							</div>
						</div>
						<div id="moral" style="display: none;">
							<div class="col-sm-3 form-group">
								<label class="control-label">✱Razon Social:</label>
								<input type="text" class="form-control" name="razon" id="razon">
							</div>
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">✱RFC:</label>
							<input type="text" class="form-control" name="rfc" required="" id="rfc"
								 pattern="^[A-Za-z]{4}[0-9]{6}" readonly="">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">✱Homoclave:</label>
							<input type="text" class="form-control" name="homoclave" required="" id="rfc" value="" 
								 pattern="^[A-Za-z0-9]{3}" style="text-transform:uppercase;" maxlength="3" onkeyup="javascript:this.value=this.value.toUpperCase();">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">✱Correo Electrónico:</label>
							<input type="email" class="form-control" name="email" id="email" required>
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Teléfono:</label>
							<input type="number" class="form-control" name="telefono" pattern="+[0-9]" id="telefono">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Teléfono Celular:</label>
							<input type="number" class="form-control" name="movil" pattern="+[0-9]" id="movil">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">✱Canal de Ventas:</label>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon3" onclick='getCanales()'><i
										class="fa fa-refresh"></i></span>
								<select type="select" name="canal" class="form-control" id="canal" required>
									<option value="">Seleccionar</option>
									@foreach($canal_ventas as $canal)
									<option value="{{ $canal->nombre }}">{{ $canal->nombre }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Comentarios:</label>
							<textarea class="form-control" name="comentarios"></textarea>
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
		}).done(function (resultado) {
			$("#canal").html(resultado);
		});
	}

	function reset() {
		$('#rfc').val('');
		$('#nombre').val('');
		$('#appaterno').val('');
		$('#apmaterno').val('');
		$('#nacimiento').val('');
		$('#razon').val('');
		$('#email').val('');
		$('#telefono').val('');
		$('#movil').val('');
		$('#canal').val('');
		$('#comentarios').val('');
	}

	function persona(elemento) {
		reset();
		if (elemento.value == "Física") {
			$('#fisica').show();
			$('#moral').hide();

			$('#nombre').prop('required', true);
			$('#appaterno').prop('required', true);
			$('#nacimiento').prop('required', true);
			$('#razon').prop('required', false);

			$('#rfc').prop('pattern', '^[A-Za-z]{4}[0-9]{6}');
		}
		if (elemento.value == "Moral") {
			$('#fisica').hide();
			$('#moral').show();

			$('#nombre').prop('required', false);
			$('#appaterno').prop('required', false);
			$('#nacimiento').prop('required', false);
			$('#razon').prop('required', true);

			$('#rfc').prop('pattern', '^[A-Za-z]{3}[0-9]{6}');
			$('#rfc').prop('placeholder', '12 Caracteres');
		}
	}

	function calcularRFC(){
		let nombre = $('#nombre').val().substring(0,1);
		let appaterno = $('#appaterno').val().substring(0,2).toUpperCase();
		let apmaterno = $('#apmaterno').val().substring(0,1);
		let fecnacimiento = $('#nacimiento').val().split('-');

		if (fecnacimiento.length > 1 && apmaterno != '' && appaterno != '' && nombre != '')
			$('#rfc').val(appaterno + apmaterno + nombre + fecnacimiento[0].substring(2,4) + fecnacimiento[1] + fecnacimiento[2]);

	}

</script>

@endsection