@extends('layouts.infoprovedor')
	@section('cliente')
		<ul role="tablist" class="nav nav-tabs">
			<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab">
				<a href="{{ route('provedores.show',['provedore'=>$provedore]) }}">Dirección Fìsica:</a>
			</li>
			<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab">
				<a href="{{ route('provedores.direccionfisica.index',['provedore'=>$provedore]) }}">Dirección Fisica:</a>
			</li>
			<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false">
				<a href="{{ route('provedores.contacto.index',['provedore'=>$provedore]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a>
			</li>
			<li class="active">
				<a href="{{ route('provedores.datosgenerales.index',['provedore'=>$provedore]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Datos Generales:</a>
			</li>
			<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-4" aria-selected="false" aria-expanded="false">
				<a href="{{ route('provedores.datosbancarios.index', ['cliente' => $provedore]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-4">Datos Bancarios:</a>
			</li>
		</ul>
	<div class="panel panel-default">
	 	<div class="panel-heading">Datos Generales: &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</div>
		<form role="form" id="form-cliente" method="POST" action="{{ route('provedores.datosgenerales.store',['provedore'=>$provedore]) }}" name="form">
			{{ csrf_field() }}
	 		<input type="hidden" name="provedor_id" value="{{$provedore->id}}">
	 	<div class="panel-body">
	 		<div class="col-xs-offset-10">
				<button type="submit" class="btn btn-success">
				<strong>Guardar</strong> </button>
				
			</div>	
	 		<div class="col-md-12 offset-md-2 mt-3">
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 			<label class="control-label" for="nombre">Giro:</label>
	 			<div class="input-group">
  						<span class="input-group-addon" id="basic-addon3" onclick='getGiros()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
				<select type="select" name="giro_id" class="form-control" id="giro_id" required>
							<option id="sin_definir" value="">Sin Definir</option>
						@foreach ($giros as $giro)
							<option id="'{{$giro->id}}'" value="{{$giro->id}}">{{$giro->nombre}}</option>
						@endforeach
				</select>
				 </div>
	 			</div>
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 			<label class="control-label" for="nombre">Tamaño de la empresa:</label>
					<select type="select" name="tamano" class="form-control" id="tamano" required>
						<option value="">Elija el tamaño de la empresa</option>
						<option id="micro" value="micro">Micro</option>
						<option id="pequeña" value="pequeña">Pequeña</option>
						<option id="mediana" value="mediana">Mediana</option>
						<option id="grande" value="grande">Grande</option>
					</select>
	 			</div>
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 			<label class="control-label" for="forma_contacto_id"> <i class="fa fa-asterisk" aria-hidden="true"></i>Forma de contacto:</label>
	 				<div class="input-group">
  						<span class="input-group-addon" id="basic-addon3" onclick='getContacto()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
					<select type="select" name="forma_contacto_id" class="form-control" id="forma_contacto_id" required>
						<option id="sin_definir" value="">Sin Definir</option>
						@foreach ($formaContactos as $formaContacto)
							{{-- expr --}}
							<option id="{{$formaContacto->id}}" value="{{ $formaContacto->id }}">{{ $formaContacto->nombre }}</option>
						@endforeach
					</select>
					</div>
	 			</div>
	 		</div>
	 		<div class="col-md-12 offset-md-2 mt-3">
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="web">Sitio web:</label>
	 				<input type="url" class="form-control" id="web" name="web" onblur="checkURL(this)" value="" autofocus>
	 			</div>

	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="comentario">Comentarios:</label>
	 				<textarea  class="form-control" rows="5" id="comentario" name="comentario"></textarea>
	 			</div>
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="fechacontacto"> <i class="fa fa-asterisk" aria-hidden="true"></i>Fecha de contacto:</label>
	 				<input type="date" class="form-control" id="fechacontacto" name="fechacontacto">
	 			</div>
	 		</div>
	 	</div>
	 	{{-- <div class="panel-heading jumbotron" style="color: black;">Datos Bancarios: &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</div>
	 	<div class="panel-body">
	 	  <div class="row">
	 	  	<div class="col-sm-3">
	 	  		<label class="control-label" for="banco"> <i class="fa fa-asterisk" aria-hidden="true"></i>Banco</label>
	 	  		<div class="input-group">
  						<span class="input-group-addon" id="basic-addon3" onclick='getBancos()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
					<select type="select" name="banco" class="form-control" id="banco">
						<option id="sin_definir" value="sin_definir">Sin Definir</option>
						@foreach($bancos as $banco)
						<option id="{{$banco->id}}" value="{{$banco->id}}">{{$banco->nombre}}</option>
						@endforeach
					</select>
				</div>
	 	  	</div>
	 	  	<div class="col-sm-3">
	 	  		<label class="control-label" for="cuenta"> <i class="fa fa-asterisk" aria-hidden="true"></i>Número de Cuenta</label>
	 	  		<input type="text" name="cuenta" id="cuenta" class="form-control">
	 	  	</div>
	 	  	<div class="col-sm-3">
	 	  		<label class="control-label" for="clabe"> <i class="fa fa-asterisk" aria-hidden="true"></i>CLABE</label>
	 	  		<input type="text" name="clabe" id="clabe" class="form-control">
	 	  	</div>
	 	  	<div class="col-sm-3">
	 	  		<label class="control-label" for="beneficiario"> <i class="fa fa-asterisk" aria-hidden="true"></i>Beneficiario</label>
	 	  		<input type="text" name="beneficiario" id="beneficiario" class="form-control">
	 	  	</div>
	 	  </div>	
	 	</div> --}}
	 	</form>
	 	</div>
	</div>

		<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
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

		function getGiros(){
			$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
			});
			$.ajax({
				url: "{{ url('/getgiros') }}",
			    type: "GET",
			    dataType: "html",
			}).done(function(resultado){
			    $("#giro_id").html(resultado);
			});
		}

		function getContacto(){
			$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
			});
			$.ajax({
				url: "{{ url('/getcontacto') }}",
			    type: "GET",
			    dataType: "html",
			}).done(function(resultado){
			    $("#forma_contacto_id").html(resultado);
			});
		}


	</script>
	@endsection
	<script type="text/javascript">
		// input type url agree http:// in automatic
		function checkURL (abc) {
  			var string = abc.value;
  			if (!~string.indexOf("http")) {
    			string = "http://" + string;
  			}
  			abc.value = string;
  			return abc
		}
	</script>