@extends('layouts.blank')
@section('content')

<div class="container" id="tab">
	<form role="form" id="form-cliente" method="POST" action="{{ route('provedores.update', ['provedore' => $provedore]) }}" name="form">
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="PUT">
		<div role="application" class="panel panel-group" >
			@include('provedores.head')
			<ul role="tablist" class="nav nav-tabs">
				<li class="active">
					<a href="#tab1">Dirección Fìsica:</a>
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
				<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-4" aria-selected="false" aria-expanded="false">
					<a href="{{ route('provedores.datosbancarios.index', ['provedore'=>$provedore]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-4">Datos Bancarios:</a>
				</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-sm-4">
							<h5>Dirección Física: <small><i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</small></h5>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-sm-3">
	    					<label class="control-label" for="calle"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Calle:</label>
	    					<input type="text" class="form-control" id="calle" name="calle" value="{{ $provedore->calle }}" required>
	  					</div>
	  					<div class="form-group col-sm-3">
	    					<label class="control-label" for="numext"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Numero exterior:</label>
	    					<input type="text" class="form-control" id="numext" name="numext" value="{{ $provedore->numext }}" required>
	  					</div>	
	  					<div class="form-group col-sm-3">
	    					<label class="control-label" for="numinter">Numero interior:</label>
	    					<input type="text" class="form-control" id="numinter" name="numinter" value="{{ $provedore->numinter }}">
	  					</div>	
					</div>
					<div class="row" id="perfisica">
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="colonia"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Colonia:</label>
	  						<input type="text" class="form-control" id="colonia" name="colonia" value="{{ $provedore->colonia }}" required>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="municipio"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Delegación o Municipio:</label>
	  						<input type="text" class="form-control" id="municipio" name="municipio" value="{{ $provedore->municipio }}" required>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="ciudad"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Ciudad:</label>
	  						<input type="text" class="form-control" id="ciudad" name="ciudad" value="{{ $provedore->ciudad }}" required>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="estado"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Estado:</label>
	  						<input type="text" class="form-control" id="estado" name="estado" value="{{ $provedore->estado }}" required>
	  					</div>
					</div>
					<div class="row" id="perfisica">
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="calle1">Entre calle:</label>
	  						<input type="text" class="form-control" id="calle1" name="calle1" value="{{ $provedore->calle1 }}">
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="calle2">Y calle:</label>
	  						<input type="text" class="form-control" id="calle2" name="calle2" value="{{ $provedore->calle2 }}">
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="referencia">Referencia:</label>
	  						<input type="text" class="form-control" id="referencia" name="referencia" value="{{ $provedore->referencia }}">
	  					</div>
					</div>
					<div class="row">
						<div class="col-sm-12 text-center">
							<button type="submit" class="btn btn-success">
						        <strong>Guardar</strong>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection