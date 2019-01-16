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
				<div class="panel-body">
					<div class="row">
						@php($flag = false)
						@foreach($cliente->transactions as $transaction)
							@if(count($transaction->pagos) == 0)
								@php($flag = true)
								@break
							@endif
						@endforeach
						@if($flag)
							<div class="col-sm-6">
								<h5>Productos Elegidos</h5>
								<div class="row">
									<div class="col-sm-12">
										<div class="table-responsive">
											<table class="table table-sm table-bordered table-stripped table-hover">
												<tr class="info">
													<th>Descripción</th>
													<th>Precio</th>
													<th>Apertura</th>
													<th>Acción</th>
												</tr>
												@foreach($cliente->transactions as $transaccion)
													@if(count($transaccion->pagos) == 0)
														<tr>
															<td>{{ $transaccion->product->descripcion }}</td>
															<td>${{ number_format($transaccion->product->precio_lista, 2) }}</td>
															<td>${{ number_format($transaccion->product->apertura, 2) }}</td>
															<td class="text-center">
																<a class="btn btn-sm btn-success" id="product{{ $transaccion->product->id }}" onclick="getProduct({{ $transaccion->product->id }})">Seleccionar</a>
																<a class="btn btn-sm btn-default disabled" id="product{{ $transaccion->product->id }}d" style="display: none;">Seleccionar</a>
															</td>
														</tr>
													@endif
												@endforeach
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<h5>Producto a Pagar</h5>
								<div class="row">
									<div class="col-sm-12" id="producto">
										<h4>Seleccione un producto.</h4>
									</div>
								</div>
							</div>
						@else
							<div class="col-sm-12">
								<h4>No hay productos por empezar a pagar.</h4>
							</div>
						@endif
					</div>
					<div id="seleccion" style="display: none;">
						<div class="row">
							<div class="col-sm-3 form-group">
								<label class="control-label">Identificación:</label>
								<select class="form-control" name="identificacion" id="identificacion" required>
									<option value="">Seleccionar</option>
									<option value="INE">INE</option>
									<option value="IFE">IFE</option>
									<option value="Pasaporte">Pasaporte</option>
									<option value="Cédula Profesional">Cédula Profesional</option>
									<option value="Cartilla">Cartilla</option>
								</select>
							</div>
							<div class="col-sm-3 form-group">
								<label class="control-label">Comprobante de Domicilio:</label>
								<select class="form-control" name="comprobante" id="comprobante" required>
									<option value="">Seleccionar</option>
									<option value="Luz">Luz</option>
									<option value="Agua">Agua</option>
									<option value="Teléfono">Teléfono</option>
									<option value="Predial">Predial</option>
								</select>
							</div>
							<div class="col-sm-3 form-group">
								<label class="control-label">Forma de Pago:</label>
								<select class="form-control" name="forma_pago" id="forma" required>
									<option value="">Seleccionar</option>
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
									<option id="sin_definir" value="">Seleccionar</option>
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
							<div class="col-sm-3 form-group" id="plan_col" style="display: none;">
								<label class="control-label">Plan de Pago:</label>
								<select name="plan" class="form-control" id="plan">
									<option value="Plan Ahorro" selected="">Plan Ahorro</option>
									<option value="Plan Inmediato">Plan Inmediato</option>
								</select>
							</div>
							<div class="col-sm-3 form-group">
								<label class="control-label">Tiempo de entrega:</label>
								<input type="text" id="entrega" class="form-control" readonly="">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3 col-sm-offset-6 form-group">
								<label class="control-label">Total a Pagar:</label>
								<input type="text" name="total" id="total" class="form-control" required readonly="">
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
			pago(mensualidades);
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

	function getProduct(id) {
		@foreach($cliente->transactions as $transaccion)
			@if(count($transaccion->pagos) == 0)
	            document.getElementById('product{{ $transaccion->product->id }}').style.display = 'none';
	            document.getElementById('product{{ $transaccion->product->id }}d').style.display = 'inline-block';
        	@endif
		@endforeach
		document.getElementById('seleccion').style.display = 'block';
		$.ajax({
			url: "{{ url('/getProduct') }}/" + id,
			type: "GET",
			dataType: "html",
		}).done(function(resultado) {
			$("#producto").html(resultado);
		});
	}

	function destroy() {
		$("#producto").html('<h4>Seleccione un producto.</h4>');
		$('#total').val('');
		$('#restante').val('');
		@foreach($cliente->transactions as $transaccion)
			@if(count($transaccion->pagos) == 0)
	            document.getElementById('product{{ $transaccion->product->id }}').style.display = 'inline-block';
	            document.getElementById('product{{ $transaccion->product->id }}d').style.display = 'none';
        	@endif
		@endforeach
		reset();
	}

	function reset() {
		document.getElementById('seleccion').style.display = 'none';
		document.getElementById('aprobar').style.display = 'none';
		document.getElementById('guardar').style.display = 'inline-block';
		tipo = banco = monto = true;
		$("#forma").prop('value', '');
		$("#comprobante").prop('value', '');
		$("#identificacion").prop('value', '');
		$("#referencia").prop('value', '');
		$("#folio").prop('value', '');
		change();
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