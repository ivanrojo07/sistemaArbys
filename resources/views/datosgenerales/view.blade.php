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
	 	<div class="panel-body">
	 		<div class="col-md-12 offset-md-2 mt-3">
	 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	 			<label class="control-label" for="nombre">Giro:</label>
				<dd>{{$giro->nombre}}</dd>
	 			</div>
	 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	 			<label class="control-label" for="nombre">Tamaño de la empresa:</label>
					<dd>{{$datos->tamano}}</dd>
	 			</div>
	 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	 			<label class="control-label" for="formacontacto">Forma de contacto:</label>
					<dd>{{$datos->formacontacto}}</dd>
	 			</div>
	 		</div>
	 		<div class="col-md-12 offset-md-2 mt-3">
	 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="web">Sitio web:</label>
	 				<dd>{{$datos->web}}</dd>
	 			</div>

	 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="comentario">Comentarios:</label>
	 				<dd>{{$datos->comentario}}</dd>
	 			</div>
	 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="fechacontacto">Fecha de contacto:</label>
	 				<dd>{{$datos->fechacontacto}}</dd>
	 			</div>
	 		</div>
	 		<a class="btn btn-info" href="{{ route('clientes.datosgenerales.edit',['cliente'=>$personal,'datosgenerale'=>$datos]) }}">Editar</a>
	 	</div>
	</div>
	@endsection