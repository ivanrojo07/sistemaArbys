@extends('layouts.blank')
@section('content')

<div class="container" id="tab">
	<div role="application" class="panel panel-group" >
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Datos del Proveedor:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a class="btn btn-success" href="{{ route('provedores.create')}}">
							<strong>Agregar Proveedor</strong>
						</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
  					<div class="form-group col-sm-3">
    					<label class="control-label" for="tipopersona">Tipo de Persona:</label>
    					<dd>{{ $provedore->tipopersona }}</dd>
  					</div>
  					<div class="form-group col-sm-3">
  						<label class="control-label" for="alias">Alias:</label>
  						<dd>{{ $provedore->alias }}</dd>
  					</div>
  					<div class="form-group col-sm-3">
  						<label class="control-label" for="rfc">RFC:</label>
  						<dd>{{ $provedore->rfc }}</dd>
  					</div>
  					<div class="form-group col-sm-3">
  						<label class="control-label" for="vendedor">Vendedor:</label>
  						<dd>{{ $provedore->vendedor }}</dd>
  					</div>
				</div>
				@if ($provedore->tipopersona == "Fisica")
				<div class="row" id="perfisica">
					<div class="form-group col-sm-3">
  						<label class="control-label" for="nombre">Nombre(s):</label>
  						<dd>{{ $provedore->nombre }}</dd>
  					</div>
  					<div class="form-group col-sm-3">
  						<label class="control-label" for="apellidopaterno">Apellido Paterno:</label>
  						<dd>{{ $provedore->apellidopaterno }}</dd>
  					</div>
  					<div class="form-group col-sm-3">
  						<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
  						<dd>{{ $provedore->apellidomaterno }}</dd>
  					</div>
				</div>
				@else
				<div class="row" id="permoral">
					<div class="form-group col-sm-3">
  						<label class="control-label" for="razonsocial">Razon Social:</label>
  						<dd>{{ $provedore->razonsocial }}</dd>
  					</div>
				</div>
				@endif
			</div>
		</div>
		<ul role="tablist" class="nav nav-tabs">
			<li class="active">
				<a href="#tab1">Dirección Física:</a>
			</li>
			<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-2" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false">
				<a href="{{ route('provedores.direccionfisica.index',['cliente'=>$provedore]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-2">Dirección Fiscal:</a>
			</li>
			<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false">
				<a href="{{ route('provedores.contacto.index',['cliente'=>$provedore]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a>
			</li>
			<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false">
				<a href="{{ route('provedores.datosgenerales.index',['cliente'=>$provedore]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Datos Generales:</a>
			</li>
			<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-4" aria-selected="false" aria-expanded="false">
				<a href="{{ route('provedores.datosbancarios.index', ['cliente' => $provedore]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-4">Datos Bancarios:</a>
			</li>
		</ul>
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h5>Dirección Física:</h5>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label" for="calle">Calle:</label>
						<dd>{{ $provedore->calle }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="numext">Numero exterior:</label>
						<dd>{{ $provedore->numext }}</dd>
					</div>	
					<div class="form-group col-sm-3">
						<label class="control-label" for="numinter">Numero interior:</label>
						<dd>{{ $provedore->numinter }}</dd>
					</div>	
				</div>
				<div class="row" id="perfisica">
					<div class="form-group col-sm-3">
							<label class="control-label" for="colonia">Colonia:</label>
							<dd>{{ $provedore->colonia }}</dd>
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label" for="municipio">Delegación o Municipio:</label>
							<dd>{{ $provedore->municipio }}</dd>
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label" for="ciudad">Ciudad:</label>
							<dd>{{ $provedore->ciudad }}</dd>
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label" for="estado">Estado:</label>
							<dd>{{ $provedore->estado }}</dd>
						</div>
				</div>
				<div class="row" id="perfisica">
					<div class="form-group col-sm-3">
						<label class="control-label" for="calle1">Entre calle:</label>
						<dd>{{ $provedore->calle1 }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="calle2">Y calle:</label>
						<dd>{{ $provedore->calle2 }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="referencia">Referencia:</label>
						<dd>{{ $provedore->referencia }}</dd>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 text-center">
						<a class="btn btn-warning" href="{{ route('provedores.edit', ['provedore'=>$provedore]) }}">
					       <strong>Editar</strong>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection