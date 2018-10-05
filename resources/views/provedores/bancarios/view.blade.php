@extends('layouts.blank')
@section('content')

<div class="container" id="tab">
	<div role="application" class="panel panel-group" >
		@include('provedores.head')
		<ul role="tablist" class="nav nav-tabs">
			@foreach(Auth::user()->perfil->componentes as $cmp)
			@if($cmp->nombre == 'ver proveedor')
			<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab">
				<a href="{{ route('provedores.show',['provedore'=>$provedore]) }}">Dirección Fìsica:</a>
			</li>
			@endif
			@if($cmp->nombre == 'ver datos proveedor')
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
			@endif
			@endforeach
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