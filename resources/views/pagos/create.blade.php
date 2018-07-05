@extends('layouts.pagos')
@section('content1')

	<legend style="background-color:#730099;color: white;text-align: center;">
	<h3> Pagos &nbsp;&nbsp; &nbsp;&nbsp;Usuario: Admin</h3>&nbsp;&nbsp; &nbsp;&nbsp;Cliente:<strong> &nbsp;&nbsp;{{$cliente->nombre}}&nbsp;&nbsp;{{$cliente->apellidopaterno}}&nbsp;&nbsp;{{$cliente->apellidomaterno}}</strong> &nbsp;&nbsp; &nbsp;&nbsp; ID: &nbsp;&nbsp;<strong>{{$cliente->identificador}}</strong>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<strong>{{date('d-M-Y')}}</strong>
</legend>
<div class="container">
  <div class="row">	
  	<div class="col-sm-6">
  		<legend>&nbsp;&nbsp;Productos Elegídos:</legend>
  		<fieldset class="fset">
			
			@foreach($cliente->transactions as $tran)
		    <nav aria-label="breadcrumb">
			  <ol class="breadcrumb alert alert-info" id="{{$tran->product->descripcion}}">
			    <li class="breadcrumb-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Tooltip on top">{{$tran->product->descripcion}}</a></li>
			    <li class="breadcrumb-item"><a href="#">${{number_format($tran->product->precio_lista,2)}}</a></li>
			    <li class="breadcrumb-item active" aria-current="page"><span class="label label-success btn" onclick="append('{{$tran->product->descripcion}}','${{number_format($tran->product->precio_lista,2)}}','{{$tran->product->id}}')" >Seleccionar</span></li>
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
 <FORM id="thisform">
 	<input type="hidden" name="cliente_id" id="cliente_id" value="{{$cliente->id}}">
 	<input type="hidden" name="usuario_id" id="usuario_id" value="1">
 	<input type="hidden" name="product_id" id="product_id" value="0">
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
				<option id="{{$banco->id}}" value="{{$banco->id}}">{{$banco->nombre}}</option>
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
</div><br>
<div class="row fset"><legend>&nbsp;&nbsp;Solicitud</legend>
	<div class="col-sm-3 form-group">
		<input type="submit" name="" class="btn btn-warning" value="Guardar" onclick="check()">
	</div>
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