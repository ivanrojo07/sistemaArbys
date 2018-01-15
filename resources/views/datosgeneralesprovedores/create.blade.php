@extends('layouts.infoprovedor')
	@section('cliente')
	<ul role="tablist" class="nav nav-tabs">
		<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('provedores.show',['provedore'=>$provedore]) }}">Dirección Fiscal:
		</a></li>
		<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('provedores.direccionfisica.index',['provedore'=>$provedore]) }}">Dirección Fisica:</a></li>
		<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="{{ route('provedores.contacto.index',['provedore'=>$provedore]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a></li>
		<li class="active"><a href="{{ route('provedores.datosgenerales.index',['provedore'=>$provedore]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Datos Generales:</a></li>
		<li class=""><a href="{{ route('provedores.crm.index',['provedore'=>$provedore]) }}" class="ui-tabs-anchor">C.R.M.:</a></li>
	</ul>
	<div class="panel panel-default">
	 	<div class="panel-heading">Datos Generales:&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</div>
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
				<select type="select" name="giro_id" class="form-control" id="giro_id">
					    <option id="giro_id'" value="">Sin Definir</option>
						@foreach ($giros as $giro)
							<option id="{{$giro->id}}" value="{{$giro->id}}" selected="selected">{{$giro->nombre}}</option>
						@endforeach
				</select>
	 			</div>
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 			<label class="control-label" for="nombre">Tamaño de la empresa:</label>
					<select type="select" name="tamano" class="form-control" id="tamano">
						<option id="micro" value="micro">Micro</option>
						<option id="pequeña" value="pequeña">Pequeña</option>
						<option id="mediana" value="mediana">Mediana</option>
						<option id="grande" value="grande">Grande</option>
					</select>
	 			</div>
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 			<label class="control-label" for="forma_contacto_id">Forma de contacto:</label>
					<select type="select" name="forma_contacto_id" class="form-control" id="forma_contacto_id">

		<option id="forma_contacto_id" value="">Sin Definir</option>

						@foreach ($formaContactos as $formaContacto)
							{{-- expr --}}
							<option id="{{$formaContacto->id}}" value="{{ $formaContacto->id }}" selected="selected">{{ $formaContacto->nombre }}</option>
						@endforeach
					</select>
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
	 				<label class="control-label" for="fechacontacto">Fecha de contacto:</label>
	 				<input type="date" class="form-control" id="fechacontacto" name="fechacontacto" value="">
	 			</div>
	 		</div>
	 	</div>
	 	</form>
	 	</div>
	</div>
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