@extends('layouts.blank')
@section('content')

<script src="{{ asset('js/pago.js') }}"></script>

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
										<td>{{ $transaccion->product->precio_lista }}</td>
										<td></td>
									</tr>
									@endforeach
								</table>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<h5>Producto a Pagar</h5>
						<div class="row">
							<div class="col-sm-12">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label for="" class="controll-label">Identificación:</label>
						{{-- <select class="form-control" name="identificacion" id="identificacion" required>
							<option value="">Seleccione una Opción</option>
							<option value="I.N.E.">I.N.E.</option>
							<option value="I.F.E.">I.F.E.</option>
							<option value="Pasaporte">Pasaporte</option>
							<option value="Cédula Profesional">Cédula Profesional</option>
							<option value="Cartilla">Cartilla</option>
						</select> --}}
					</div>
					<div class="col-sm-3">
						<label for="" class="controll-label">Comprobante de Domicilio:</label>
						{{-- <select class="form-control" name="comprobante" id="comprobante" required>
							<option value="">Seleccione una Opción</option>
							<option value="Luz">Luz</option>
							<option value="Agua">Agua</option>
							<option value="Teléfono">Teléfono</option>
							<option value="Predial">Predial</option>
						</select> --}}
					</div>
					<div class="col-sm-3">
						<label for="" class="controll-label">Banco:</label>
						{{-- <select type="select" name="banco" class="form-control" id="banco" required>
							<option id="sin_definir" value="">Seleccione Uno</option>
							@foreach($bancos as $banco)
							<option id="{{ $banco->id }}" value="{{ $banco->nombre }}">{{ $banco->nombre }}</option>
							@endforeach
						</select> --}}
					</div>
					<div class="col-sm-3">
						<label for="" class="controll-label">Monto del Pago:</label>
						{{-- <input type="number" step="any" name="monto" id="monto" class="form-control" placeholder="$--" min="0" required> --}}
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label for="" class="controll-label">Forma de Pago:</label>
						{{-- <select class="form-control" name="forma_pago" id="forma_pago" required title="Debe Elegir una Forma de Pago">
							<option value="">Seleccione una Opción</option>
							<option value="Efectivo">Efectivo</option>
							<option value="Cheque">Cheque</option>
							<option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
							<option value="Tarjeta de Débito">Tarjeta de Débito</option>
							<option value="Depósito">Depósito</option>
						</select> --}}
					</div>
					<div class="col-sm-3">
						<label for="" class="controll-label">Número de Cheque:</label>
						{{-- <input type="number" name="numero_cheque" id="numero_cheque" class="form-control" placeholder="#--" min="0"> --}}
					</div>
					<div class="col-sm-3">
						<label for="" class="controll-label">Número de Tarjeta:</label>
						{{-- <input type="number" name="numero_tarjeta" id="numero_tarjeta" class="form-control" placeholder="#--" min="0"> --}}
					</div>
					<div class="col-sm-3">
						<label for="" class="controll-label">Nombre de Tarjetahabiente:</label>
						{{-- <input type="text" name="nombre_tarjetaHabiente" id="nombre_tarjetaHabiente" class="form-control" placeholder="Nombre Completo"> --}}
					</div>
					<div class="col-sm-3">
						<label for="" class="controll-label">Folio de Depósito:</label>
						{{-- <input type="number" name="numero_deposito" id="numero_deposito" class="form-control" placeholder="#--" min="0"></div> --}}
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 text-center">
						<input type="submit" name="" class="btn btn-warning" value="Guardar" onclick="check()">
						<button  onclick="checkDos()" class="btn btn-success">Aprobado</button>
						<button  onclick="checkTres()" class="btn btn-danger">No Aprobado</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">	
		<div class="col-sm-6">
			<legend>&nbsp;&nbsp;Productos Elegídos:</legend>
			<fieldset class="fset">

				@foreach($cliente->transactions as $tran)
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb alert alert-info" id="{{ $tran->product->descripcion }}">
						<li class="breadcrumb-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Tooltip on top">{{ $tran->product->descripcion }}</a></li>
						<li class="breadcrumb-item"><a href="#">${{ number_format($tran->product->precio_lista,2) }}</a></li>
						<li class="breadcrumb-item active" aria-current="page"><span class="label label-success btn" onclick="append('{{ $tran->product->descripcion }}','${{ number_format($tran->product->precio_lista,2) }}','{{ $tran->product->id }}')" >Seleccionar</span></li>
					</ol>
				</nav>
				@endforeach
			</fieldset>
		</div>
		<div class="col-sm-6">
			<legend>&nbsp;&nbsp;Producto a Pagar:</legend>
			<fieldset class="fset">
				<nav aria-label="breadcrumb" id="seleccionados">
				</nav>
			</fieldset>
		</div>
	</div><br><br>
	{{-- FORMULARIO --}}
	<FORM id="thisform" method="POST" action="{{ route('clientes.pago.store',['cliente'=>$cliente]) }}">{{ csrf_field() }}
		<input type="hidden" name="cliente_id" id="cliente_id" value="{{ $cliente->id }}">
		<input type="hidden" name="usuario_id" id="usuario_id" value="1">
		<input type="hidden" name="product_id" id="product_id" value="0">
		<input type="hidden" name="status" id="status" value="Guardado">
		<div class="row fset">
			<div class="col-sm-3 form-group">
				<label class="control-label"><strong>Identificación</strong></label>
				<select class="form-control" name="identificacion" id="identificacion" required>
					<option value="">Seleccione una Opción</option>
					<option value="I.N.E.">I.N.E.</option>
					<option value="I.F.E.">I.F.E.</option>
					<option value="Pasaporte">Pasaporte</option>
					<option value="Cédula Profesional">Cédula Profesional</option>
					<option value="Cartilla">Cartilla</option>
				</select>
			</div>
			<div class="col-sm-3 form-group">
				<label class="control-label"><strong>Comprobante de Domicilio</strong></label>
				<select class="form-control" name="comprobante" id="comprobante" required>
					<option value="">Seleccione una Opción</option>
					<option value="Luz">Luz</option>
					<option value="Agua">Agua</option>
					<option value="Teléfono">Teléfono</option>
					<option value="Predial">Predial</option>
				</select>
			</div>
			<div class="col-sm-3 form-group">
				<label class="control-label" for="banco"> <i class="fa fa-asterisk" aria-hidden="true"></i>Banco</label>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon3" onclick='getBancos()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
					<select type="select" name="banco" class="form-control" id="banco" required>
						<option id="sin_definir" value="">Seleccione Uno</option>
						@foreach($bancos as $banco)
						<option id="{{ $banco->id }}" value="{{ $banco->nombre }}">{{ $banco->nombre }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-sm-3 form-group">
				<label class="control-label"><strong>Monto del Pago</strong></label>
				<input type="number" step="any" name="monto" id="monto" class="form-control" placeholder="$--" min="0" required>
			</div>
		</div><br>
		<div class="row fset">
			<div class="col-sm-3 form-group">
				<label class="control-label"><strong>Forma de Pago</strong></label>
				<select class="form-control" name="forma_pago" id="forma_pago" required title="Debe Elegir una Forma de Pago">
					<option value="">Seleccione una Opción</option>
					<option value="Efectivo">Efectivo</option>
					<option value="Cheque">Cheque</option>
					<option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
					<option value="Tarjeta de Débito">Tarjeta de Débito</option>
					<option value="Depósito">Depósito</option>
				</select>
			</div>
			<div class="col-sm-3 form-group nondisp" id="cheque">
				<label class="control-label"><strong>Número de Cheque</strong></label>
				<input type="number" name="numero_cheque" id="numero_cheque" class="form-control" placeholder="#--" min="0">
			</div>
			<div class="col-sm-3 form-group nondisp" id="tarjeta">
				<label class="control-label"><strong>Número de Tarjeta</strong></label>
				<input type="number" name="numero_tarjeta" id="numero_tarjeta" class="form-control" placeholder="#--" min="0">
			</div>
			<div class="col-sm-3 form-group nondisp" id="thabiente">
				<label class="control-label"><strong>Nombre Tarjetahabiente</strong></label>
				<input type="text" name="nombre_tarjetaHabiente" id="nombre_tarjetaHabiente" class="form-control" placeholder="Nombre Completo">
			</div>
			<div class="col-sm-3 form-group nondisp" id="deposito">
				<label class="control-label"><strong>Número/Fólio de Depósito</strong></label>
				<input type="number" name="numero_deposito" id="numero_deposito" class="form-control" placeholder="#--" min="0"></div>
			</div>
		</FORM>
		{{-- FORMULARIO --}}





		<script type="text/javascript">
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
				}).done(function(resultado){
					$("#banco").html(resultado);
				});
			}
		</script>
		@endsection