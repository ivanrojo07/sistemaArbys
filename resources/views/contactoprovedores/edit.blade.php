@extends('layouts.infoprovedor')
	@section('cliente')
					<ul role="tablist" class="nav nav-tabs">
						<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('provedores.show',['provedore'=>$provedore]) }}">Dirección Fiscal:</a></li>
						<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('provedores.direccionfisica.index',['provedore'=>$provedore]) }}">Dirección Fisica:</a></li>
						<li class="active"><a href="{{ route('provedores.contacto.index',['provedore'=>$provedore]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a></li>
						<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="{{ route('provedores.datosgenerales.index', ['provedore'=>$provedore]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Datos Generales:</a></li>
						
					</ul>
					<div class="panel panel-default">
						<div class="panel-heading">Contacto:
						&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</div>
							<form role="form" method="POST" action="{{ route('provedores.contacto.update', ['provedore'=>$provedore,'contacto'=>$contacto]) }}" name="form">
								{{ csrf_field() }}
							 	<input type="hidden" name="provedor_id" value="{{$provedore->id}}">
							 	<input type="hidden" name="_method" value="PUT">
						<div class="panel-body">

							<div class="col-xs-offset-10">
								<button type="submit" class="btn btn-success">
								<strong>Guardar</strong>	
								</button>
								
							</div>	
							
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i> Nombre:</label>
			    					<input type="text" class="form-control" id="nombre" name="nombre" value="{{ $contacto->nombre }}" required autofocus>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="apater"><i class="fa fa-asterisk" aria-hidden="true"></i> Apellido paterno:</label>
			    					<input type="text" class="form-control" id="apater" name="apater" value="{{ $contacto->apater }}" required>
			  					</div>	
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="amater">Apellido materno:</label>
			    					<input type="text" class="form-control" id="amater" name="amater" value="{{ $contacto->amater }}">
			  					</div>		
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="area">Area:</label>
			  						<input type="text" class="form-control" id="area" name="area" value="{{ $contacto->area }}">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="puesto">Puesto:</label>
			  						<input type="text" class="form-control" id="puesto" name="puesto" value="{{ $contacto->puesto }}">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="telefono1">Telefono:</label>
			  						<input type="text" class="form-control" id="telefono1" name="telefono1" value="{{ $contacto->telefono1 }}">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ext1">Extensión:</label>
			  						<input type="text" class="form-control" id="ext1" name="ext1" value="{{ $contacto->ext1 }}">
			  					</div>
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="telefono2">Telefono :</label>
			  						<input type="text" class="form-control" id="telefono2" name="telefono2" value="{{ $contacto->telefono2 }}">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ext2">Extensión:</label>
			  						<input type="text" class="form-control" id="ext2" name="ext2" value="{{ $contacto->ext2 }}">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="telefonodir"><i class="fa fa-asterisk" aria-hidden="true"></i> Telefono directo:</label>
			  						<input type="text" class="form-control" id="telefonodir" name="telefonodir" value="{{ $contacto->telefonodir }}" required>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="celular1">Celular:</label>
			  						<input type="text" class="form-control" id="celular1" name="celular1" value="{{ $contacto->celular1 }}">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="celular2">Celular:</label>
			  						<input type="text" class="form-control" id="celular2" name="celular2" value="{{ $contacto->celular2 }}">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="email1"><i class="fa fa-asterisk" aria-hidden="true"></i> Correo electronico:</label>
			  						<input type="text" class="form-control" id="email1" name="email1" value="{{ $contacto->email1 }}" required>
			  					</div>

			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="email2">Correo electronico:</label>
			  						<input type="text" class="form-control" id="email2" name="email2" value="{{$contacto->email2}}">
			  					</div>
							</div>
						</div>
					</div>
  				</div>
			</form>
		</div>
@endsection