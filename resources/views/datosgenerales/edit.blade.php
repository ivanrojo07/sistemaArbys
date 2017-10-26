@extends('layouts.infocliente')
	@section('cliente')
	<ul role="tablist" class="nav nav-tabs nav-pills nav-justified">
		<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('clientes.show',['cliente'=>$personal]) }}">Dirección Fiscal:</a></li>
		<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('clientes.direccionfisica.index',['cliente'=>$personal]) }}">Dirección Fisica:</a></li>
		<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="{{ route('clientes.contacto.index',['cliente'=>$personal]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a></li>
		<li class="active"><a href="{{ route('clientes.datosgenerales.index',['cliente'=>$personal]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Datos Generales:</a></li>
	</ul>
	<div class="panel-default">
	 	<div class="panel-heading">Datos Generales:</div>
		<form role="form" id="form-cliente" method="POST" action="{{ route('clientes.datosgenerales.update',['cliente'=>$personal, 'datosgenerale'=>$datos]) }}" name="form">
	{{ csrf_field() }}
	<input type="hidden" name="_method" value="PUT">
	 <input type="hidden" name="personal_id" value="{{$personal->id}}">
	 	<div class="panel-body">
	 		<div class="col-md-12 offset-md-2 mt-3">
	 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	 			<label class="control-label" for="nombre">Giro:</label>
				<select type="select" name="giro_id" class="form-control" id="giro_id">
						@foreach ($giros as $giro)
							<option id="'{{$giro->id}}'" value="{{$giro->id}}" selected="selected">{{$giro->nombre}}</option>
						@endforeach
				</select>
	 			</div>
	 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	 			<label class="control-label" for="nombre">Tamaño de la empresa:</label>
					<select type="select" name="tamano" class="form-control" id="tamano">
						<option id="micro" value="micro">Micro</option>
						<option id="pequeña" value="pequeña">Pequeña</option>
						<option id="mediana" value="mediana">Mediana</option>
						<option id="grande" value="grande">Grande</option>
					</select>
	 			</div>
	 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	 			<label class="control-label" for="formacontacto">Forma de contacto:</label>
					<select type="select" name="formacontacto" class="form-control" id="formacontacto">
						<option id="telefono" value="telefono">Telefono</option>
						<option id="celular" value="celular">Celular</option>
						<option id="correo" value="correo">Correo</option>
					</select>
	 			</div>
	 		</div>
	 		<div class="col-md-12 offset-md-2 mt-3">
	 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="web">Sitio web:</label>
	 				<input type="text" class="form-control" id="web" name="web" value="{{ $datos->web }}">
	 			</div>

	 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="comentario">Comentarios:</label>
	 				<textarea  class="form-control" rows="5" id="comentario" name="comentario">{{ $datos->comentario }}</textarea>
	 			</div>
	 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="fechacontacto">Fecha de contacto:</label>
	 				<input type="date" class="form-control" id="fechacontacto" name="fechacontacto" value="{{ $datos->fechacontacto }}">
	 			</div>
	 		</div>
	 		<button type="submit" class="btn btn-default">Guardar</button>
	 	</div>
	</div>
	@endsection