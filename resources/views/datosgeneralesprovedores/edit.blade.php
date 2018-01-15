@extends('layouts.infoprovedor')
	@section('cliente')
	<ul role="tablist" class="nav nav-tabs">
		<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('provedores.show',['provedore'=>$provedore]) }}">Dirección Fiscal:
		
		<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('provedores.direccionfisica.index',['provedore'=>$provedore]) }}">Dirección Fisica:</a></li>
		<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="{{ route('provedores.contacto.index',['provedore'=>$provedore]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a></li>
		<li class="active"><a href="{{ route('provedores.datosgenerales.index',['provedore'=>$provedore]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Datos Generales:</a></li>
		<li class=""><a href="{{ route('provedores.crm.index',['provedore'=>$provedore]) }}" class="ui-tabs-anchor">C.R.M.:</a></li>
	</ul>
	<div class="panel panel-default">
	 	<div class="panel-heading">Datos Generales:&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</a></li></div>
		<form role="form" id="form-cliente" method="POST" action="{{ route('provedores.datosgenerales.update',['provedore'=>$provedore, 'datosgenerale'=>$datos]) }}" name="form">
	{{ csrf_field() }}
	<input type="hidden" name="_method" value="PUT">
	 <input type="hidden" name="provedor_id" value="{{$provedore->id}}">
	 	<div class="panel-body">
	 		<div class="col-xs-offset-10">
				<button type="submit" class="btn btn-success"><strong>Guardar</strong> </button>
				
			</div>	
	 		<div class="col-md-12 offset-md-2 mt-3">
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 			<label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i>Giro:</label>
				<select type="select" name="giro_id" class="form-control" id="giro_id">
					 <option id="giro_id'" value="">Sin Definir</option>
					
						@foreach ($giros as $giro)
							<option id="'{{$giro->id}}'" value="{{$giro->id}}" @if ($datos->giro_id == $giro->id)
								{{-- expr --}}
								selected="selected"
							@endif >{{$giro->nombre}}</option>
						@endforeach
				</select>
	 			</div>
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 			<label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i>Tamaño de la empresa:</label>
					<select type="select" name="tamano" class="form-control" id="tamano">
						<option id="micro" value="micro" @if ($datos->tamano == "micro")
							selected="selected" 
							{{-- expr --}}
						@endif>Micro</option>
						<option id="pequeña" value="pequeña" @if ($datos->tamano == "pequeña")
							selected="selected" 
							{{-- expr --}}
						@endif>Pequeña</option>
						<option id="mediana" value="mediana" @if ($datos->tamano == "mediana")
							selected="selected" 
							{{-- expr --}}
						@endif>Mediana</option>
						<option id="grande" value="grande" @if ($datos->tamano == "grande")
							selected="selected" 
							{{-- expr --}}
						@endif>Grande</option>
					</select>
	 			</div>
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 			<label class="control-label" for="forma_contacto_id"><i class="fa fa-asterisk" aria-hidden="true"></i>Forma de contacto:</label>
					<select type="select" name="forma_contacto_id" class="form-control" id="forma_contacto_id">

					<option id="forma_contacto_id" value="">Sin Definir</option>

						@foreach ($formaContactos as $formaContacto)
							{{-- expr --}}
							<option id="{{$formaContacto->id}}" value="{{ $formaContacto->id }}" @if ($datos->forma_contacto_id == $formaContacto->id)
								{{-- expr --}}
								selected="selected"
							@endif>{{ $formaContacto->nombre }}</option>
						@endforeach
					</select>
	 			</div>
	 		</div>
	 		<div class="col-md-12 offset-md-2 mt-3">
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="web">Sitio web:</label>
	 				<input type="text" class="form-control" id="web" name="web" value="{{ $datos->web }}" autofocus>
	 			</div>

	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="comentario">Comentarios:</label>
	 				<textarea  class="form-control" rows="5" id="comentario" name="comentario">{{ $datos->comentario }}</textarea>
	 			</div>
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="fechacontacto">Fecha de contacto:</label>
	 				<input type="date" class="form-control" id="fechacontacto" name="fechacontacto" value="{{ $datos->fechacontacto }}">
	 			</div>
	 		</div>
	 	</div>
	</div>
	@endsection