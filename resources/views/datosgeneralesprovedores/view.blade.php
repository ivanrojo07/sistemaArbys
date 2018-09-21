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
	 	<div class="panel-heading">Datos Generales:</div>
	 	<div class="panel-body">
	 		<div class="col-md-12 offset-md-2 mt-3">
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="nombre">Tamaño de la empresa:</label>
					<dd>{{$datos->tamano}}</dd>
	 			</div>
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="nombre">Giro de la empresa:</label>
	 				@if($datos->giro_id == null)
	 				<dd>No tiene giro</dd>
	 				@else
					<dd>{{$giro->nombre}}</dd>
					@endif
	 			</div>
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="nombre">Forma de contacto:</label>
	 				@if($datos->forma_contacto_id == null)
	 				<dd>No tiene forma de contacto</dd>
	 				@else
	 				<dd>{{$formaContacto->nombre}}</dd>
	 				@endif
	 			</div>
	 		</div>
	 		<div class="col-md-12 offset-md-2 mt-3">
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="web">Sitio web:</label>
	 				<dd><a href="{{$datos->web}}" target="_blank">{{$datos->web}}</a></dd>
	 			</div>

	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="comentario">Comentarios:</label>
	 				<dd>{{$datos->comentario}}</dd>
	 			</div>
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="fechacontacto">Fecha de contacto:</label>
	 				<dd>{{$datos->fechacontacto}}</dd>
	 				
	 			</div>
	 		</div>
 		<a class="btn btn-info" href="{{ route('provedores.datosgenerales.edit',['provedores'=>$provedore,'datosgenerale'=>$datos]) }}">
 	<strong>Editar</strong>	</a>
	 	</div>
	</div>
	@endsection