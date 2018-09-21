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
			<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab">
				<a href="{{ route('provedores.show',['provedore'=>$provedore]) }}">Dirección Fìsica:</a>
			</li>
			<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-2" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false">
				<a href="{{ route('provedores.direccionfisica.index', ['provedore'=>$provedore]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-2">Dirección Fiscal:</a>
			</li>
			<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false">
				<a href="{{ route('provedores.contacto.index', ['provedore'=>$provedore]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a>
			</li>
			<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false">
				<a href="{{ route('provedores.datosgenerales.index', ['provedore'=>$provedore]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Datos Generales:</a>
			</li>
			<li class="active">
				<a href="#tab4">Datos Bancarios:</a>
			</li>
		</ul>
		<div class="panel panel-default">
		<div class="panel-heading">
			<div class="row">
				<div class="col-sm-4">
					<h5>Datos Bancarios:</h5>
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="form-group col-sm-3">
					<label class="control-label" for="banco">Banco:</label>
					<dd>{{ $bancario->banco->nombre }}</dd>
				</div>
				<div class="form-group col-sm-3">
						<label class="control-label" for="cuenta">Número de Cuenta:</label>
					<dd>{{ $bancario->cuenta }}</dd>
					</div>
				<div class="form-group col-sm-3">
						<label class="control-label" for="clabe">CLABE:</label>
					<dd>{{ $bancario->clabe }}</dd>
					</div>
				<div class="form-group col-sm-3">
						<label class="control-label" for="beneficiario">Beneficiario:</label>
					<dd>{{ $bancario->beneficiario }}</dd>
					</div>
			</div>
			<div class="row">
				<div class="col-sm-12 text-center">
					<a class="btn btn-warning" href="{{ route('provedores.datosbancarios.edit', ['provedore' => $provedore, 'bancario' => $provedore->datosBancarios->first()]) }}">
				       <strong>Editar</strong>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection