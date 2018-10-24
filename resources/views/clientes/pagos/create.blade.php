@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Datos del Pago:</h4>
					</div>
				</div>
			</div>
			<form action="" method="post">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-6">
							<h5>Productos Elegidos</h5>
							<div class="row">
								<div class="col-sm-12">
									<table class="table table-sm table-bordered table-stripped table-hover">
										<tr class="info">
											<td>Descripción</td>
											<td>Precio</td>
											<td>Acción</td>
										</tr>
										@foreach($cliente->transactions as $transaccion)
										<tr>
											<td>{{ $transaccion->product->descripcion }}</td>
											<td>${{ number_format($transaccion->product->precio_lista, 2) }}</td>
											<td class="text-center">
												<a class="btn btn-sm btn-success" onclick="getProduct({{ $transaccion->product->id }})">Seleccionar</a>
												<a class="btn btn-sm btn-default disabled" id="product{{ $transaccion->product->id }}" style="display: none;">Seleccionar</a>
											</td>
										</tr>
										@endforeach
									</table>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<h5>Producto a Pagar</h5>
							<div class="row">
								<div class="col-sm-12" id="producto">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3 form-group">
							<label class="control-label">Identificación:</label>
							<select class="form-control" name="identificacion" id="identificacion" required>
								<option value="">Sin definir</option>
								<option value="INE">INE</option>
								<option value="IFE">IFE.</option>
								<option value="Pasaporte">Pasaporte</option>
								<option value="Cédula Profesional">Cédula Profesional</option>
								<option value="Cartilla">Cartilla</option>
							</select>
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Comprobante de Domicilio:</label>
							<select class="form-control" name="comprobante" id="comprobante" required>
								<option value="">Sin definir</option>
								<option value="Luz">Luz</option>
								<option value="Agua">Agua</option>
								<option value="Teléfono">Teléfono</option>
								<option value="Predial">Predial</option>
							</select>
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Forma de Pago:</label>
							<select class="form-control" name="forma_pago" id="forma" required>
								<option value="">Sin definir</option>
								<option value="Efectivo">Efectivo</option>
								<option value="Cheque">Cheque</option>
								<option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
								<option value="Tarjeta de Débito">Tarjeta de Débito</option>
								<option value="Depósito">Depósito</option>
							</select>
						</div>
						<div class="col-sm-3 form-group" id="bancos" style="display: none;">
							<label onclick="getBancos()" class="control-label">Banco:</label>
							<select type="select" name="banco" class="form-control" id="banco">
								<option id="sin_definir" value="">Seleccione Uno</option>
								@foreach($bancos as $banco)
								<option id="{{ $banco->id }}" value="{{ $banco->nombre }}">{{ $banco->nombre }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-sm-3 form-group" id="cheques" style="display: none;">
							<label class="control-label">Número de Cheque:</label>
							<input type="number" name="numero_cheque" class="form-control" min="0" id="cheque">
						</div>
						<div id="tarjetas" style="display: none;">
							<div class="col-sm-3 form-group">
								<label class="control-label">Número de Tarjeta:</label>
								<input type="number" name="numero_tarjeta" class="form-control" min="0" id="tarjeta">
							</div>
							<div class="col-sm-3 form-group">
								<label class="control-label">Nombre de Tarjetahabiente:</label>
								<input type="text" name="nombre_tarjetaHabiente" class="form-control" id="tarjetah">
							</div>
						</div>
						<div class="col-sm-3 form-group" id="depositos" style="display: none;">
							<label class="control-label">Folio de Depósito:</label>
							<input type="number" name="numero_deposito" class="form-control" min="0" id="deposito">
						</div>
						<div class="col-sm-3 form-group" id="montos" style="display: none;">
							<label class="control-label">Monto del Pago:</label>
							<input type="number" name="monto" class="form-control" min="0" required id="monto">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 text-center">
							<input type="submit" name="" class="btn btn-warning" value="Guardar" onclick="">
							<button onclick="" class="btn btn-success">Aprobado</button>
							<button onclick="" class="btn btn-danger">No Aprobado</button>
						</div>
					</div>
				</div>	
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	
	var tipo = monto = banco = tarjeta = cheque = deposito = false; 
	var forma;

	function change() {
    	if(tipo) {
    		tarjeta = cheque = deposito = true;
			$("#monto").prop('value', '');
			$("#banco").prop('value', '');
			tipo = false;
    	}

		if(monto) {
			$("#monto").prop('value', '');
            document.getElementById("montos").style.display = 'none';
            monto = false;
    	}

    	if(banco) {
			$("#banco").prop('value', '');
			$("#banco").prop('required', false);
            document.getElementById("bancos").style.display = 'none';
            banco = false;
    	}

		if(deposito) {
			$("#deposito").prop('value', '');
			$("#deposito").prop('required', false);
            document.getElementById("depositos").style.display = 'none';
            deposito = false;
    	}

    	if(cheque) {
			$("#cheque").prop('value', '');
			$("#cheque").prop('required', false);
            document.getElementById("cheques").style.display = 'none';
            cheque = false;
    	}

    	if(tarjeta) {
			$("#tarjeta").prop('value', '');
			$("#tarjetah").prop('value', '');
			$("#tarjeta").prop('required', false);
			$("#tarjetah").prop('required', false);
            document.getElementById("tarjetas").style.display = 'none';
            tarjeta = false;	
    	}

        $("#forma").change(function() {
            forma = $("#forma").val();
            if(forma != "") {
            	if(forma == "Efectivo") {
	        		banco = true;
	        		document.getElementById("montos").style.display = 'block';
	            } else {
	        		monto = true;
					$("#banco").prop('required', true);
	        		document.getElementById("bancos").style.display = 'block';
	            }
            } else
	        	banco = monto = true;
            tipo = true;
        });

        $("#banco").change(function() {
            var val = $("#banco").val();
            if(val != "") {
            	if(forma == "Cheque") {
					$("#cheque").prop('required', true);
            		document.getElementById("cheques").style.display = 'block';
            		tarjeta = deposito = true;
            	} else if(forma == "Tarjeta de Crédito" || forma == "Tarjeta de Débito") {
					$("#tarjeta").prop('required', true);
					$("#tarjetah").prop('required', true);
            		document.getElementById("tarjetas").style.display = 'block';
            		deposito = cheque = true;
            	} else if(forma == "Depósito") {
					$("#deposito").prop('required', true);
            		document.getElementById("depositos").style.display = 'block';
            		tarjeta = cheque = true;
            	}
	        	document.getElementById("montos").style.display = 'block';
            } else {
            	monto = tarjeta = cheque = deposito = true;
            }
        });

	}

	$(document).ready(function() {
		change();
		$(document).change(function() {
			change();
		});
	});

	function getProduct(id) {
		$.ajax({
			url: "{{ url('/getProduct') }}/" + id,
			type: "GET",
			dataType: "html",
		}).done(function(resultado) {
			$("#producto").html(resultado);
		});
	}

	function getBancos(){
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			url: "{{ url('/getbancos') }}",
			type: "GET",
			dataType: "html",
		}).done(function(resultado) {
			$("#banco").html(resultado);
		});
	}

</script>

@endsection