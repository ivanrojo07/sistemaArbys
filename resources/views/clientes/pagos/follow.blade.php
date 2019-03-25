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
			<form action="{{ route('clientes.pagos.store', ['cliente' => $cliente]) }}" method="post" id="form">
				{{ csrf_field() }}
				<input type="hidden" name="product_id" value="{{ $pago->transaction->product->id }}">
				<input type="hidden" name="meses" value="{{ $pago->meses }}">
				<input type="hidden" name="total" value="{{ $pago->total }}">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="table-responsive">
								<table class="table table-sm table-bordered table-stripped table-hover">
									<tr class="info">
										<th>Producto</th>
										<th>Fecha del Pago</th>
										<th>Meses</th>
										<th>Total a Pagar</th>
										<th>Restante a Pagar</th>
									</tr>
									<tr>
										<td>{{ $pago->transaction->product->descripcion }}</td>
										<td>{{ $pago->created_at }}</td>
										<td>{{ $pago->meses }}</td>
										<td>${{ number_format($pago->total, 2) }}</td>
										<td>${{ number_format($pago->restante, 2) }}</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<div class="row">
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
							<input type="number" name="monto" id="monto" class="form-control" min="0" required id="monto" step="0.01">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Número de Referencia:</label>
							<input type="text" name="referencia" id="referencia" class="form-control" required="">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Número de Fólio:</label>
							<input type="text" name="folio" id="folio" class="form-control" required="">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3 form-group">
							<label class="control-label">Cantidad a Pagar:</label>
							<input type="text" name="restante" id="total" class="form-control" value="{{ $pago->restante }}" required readonly="">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Restante:</label>
							<input type="text" id="restante" class="form-control" readonly="">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 text-center">
							<input type="submit" id="guardar" class="btn btn-warning" value="Guardar">
							<input type="hidden" name="status" id="status" value="No Aprobado">
							<input type="submit" id="aprobar" class="btn btn-success" value="Aprobar Pago" style="display: none;">
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
			var monto$ = document.getElementById('monto').value;
			var total$ = document.getElementById('total').value;
			if(total$ !== '') {
				document.getElementById('monto').max = total$;
				if(total$ != 0 && parseInt(monto$) > parseInt(total$)) {
					alert('El monto del pago no puede ser mayor al total a pagar.\nEl monto ha sido cambiado al total a pagar.')
					monto$ = total$;
					document.getElementById('monto').value = monto$;
				}
			}
			var restante$ = total$ !== '' && monto$ !== '' ? total$ - monto$ : '';
			document.getElementById('restante').value = total$ !== '' && monto$ !== '' && restante$ >= 0 ? restante$.toFixed(2) : '';
			document.getElementById('aprobar').style.display = restante$ === 0 ? 'inline-block' : 'none';
			document.getElementById('guardar').style.display = restante$ === 0 ? 'none' : 'inline-block';
			document.getElementById('status').value = restante$ === 0 ? 'Aprobado' : 'No Aprobado';
		});
	});

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