@extends('layouts.infoprovedor')
	@section('cliente')
		<ul role="tablist" class="nav nav-tabs">
			<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab">
				<a href="{{ route('provedores.show',['provedore'=>$provedore]) }}">Dirección Fìsica:</a>
			</li>
			<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab">
				<a href="{{ route('provedores.direccionfisica.index',['provedore'=>$provedore]) }}">Dirección Fisica:</a>
			</li>
			<li class="active">
				<a href="{{ route('provedores.contacto.index',['provedore'=>$provedore]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a>
			</li>
			<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false">
				<a href="{{ route('provedores.datosgenerales.index',['cliente'=>$provedore]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Datos Generales:</a>
			</li>
			<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-4" aria-selected="false" aria-expanded="false">
				<a href="{{ route('provedores.datosbancarios.index', ['cliente' => $provedore]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-4">Datos Bancarios:</a>
			</li>
		</ul>
					<div class="panel panel-default">
						<div class="panel-heading">Contacto:</div>
						<div class="panel-body">
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="nombre">Nombre:</label>
			    					<dd>{{ $contacto->nombre }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="apater">Apellido paterno:</label>
									<dd>{{ $contacto->apater }}</dd>
			  					</div>	
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="amater">Apellido materno:</label>
			    					<dd>{{ $contacto->amater }}</dd>
			  					</div>		
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="area">Area:</label>
			  						<dd>{{ $contacto->area }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="puesto">Puesto:</label>
			  						<dd>{{ $contacto->puesto }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="telefono1">Telefono:</label>
			  						<dd>{{ $contacto->telefono1 }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ext1">Extensión:</label>
			  						<dd>{{ $contacto->ext1 }}</dd>
			  					</div>
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="telefono2">Telefono :</label>
			  						<dd>{{ $contacto->telefono2 }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ext2">Extensión:</label>
			  						<dd>{{ $contacto->ext2 }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="telefonodir">Telefono directo:</label>
			  						<dd>{{ $contacto->telefonodir }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="celular1">Celular:</label>
			  						<dd>{{ $contacto->celular1 }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="celular2">Celular:</label>
			  						<dd>{{ $contacto->celular2 }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="email1">Correo electronico:</label>
			  						<dd>{{ $contacto->email1 }}</dd>
			  					</div>

			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="email2">Correo electronico:</label>
			  						<dd>{{$contacto->email2}}</dd>
			  					</div>
							</div>
							<a class="btn btn-info" href="{{ route('provedores.contacto.edit',['provedore'=>$provedore,'contacto'=>$contacto]) }}">
						<strong>Editar</strong>	</a>
						</div>
					</div>
  				</div>
			</form>
		</div>
@endsection