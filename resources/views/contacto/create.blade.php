@extends('layouts.infocliente')
	@section('cliente')
					<ul role="tablist" class="nav nav-tabs nav-pills nav-justified">
						<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('clientes.show',['cliente'=>$personal]) }}">Dirección Fiscal:</a></li>
						<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="#">Dirección Fisica:</a></li>
						<li class="active"><a href="{{ route('clientes.contacto.index',['cliente'=>$personal]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a></li>
						<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="{{ route('clientes.contacto.index', ['cliente'=>$personal]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Datos Generales:</a></li>
					</ul>
					<div class="panel-default">
					<form role="form" name="domicilio" id="form-cliente" method="POST" action="{{ route('clientes.contacto.store', ['cliente'=>$personal]) }}" name="form">
					{{ csrf_field() }}
					 <input type="hidden" name="personal_id" value="{{$personal->id}}">
						<div class="panel-heading">Contacto:</div>
						<div class="panel-body">
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="nombre">Nombre:</label>
			    					<input type="text" class="form-control" id="nombre" name="nombre" value="">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="apater">Apellido paterno:</label>
			    					<input type="text" class="form-control" id="apater" name="apater" value="">
			  					</div>	
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="amater">Apellido materno:</label>
			    					<input type="text" class="form-control" id="amater" name="amater" value="">
			  					</div>		
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="area">Area:</label>
			  						<input type="text" class="form-control" id="area" name="area" value="">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="puesto">Puesto:</label>
			  						<input type="text" class="form-control" id="puesto" name="puesto" value="">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="telefono1">Telefono:</label>
			  						<input type="text" class="form-control" id="telefono1" name="telefono1" value="">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ext1">Extensión:</label>
			  						<input type="text" class="form-control" id="ext1" name="ext1" value="">
			  					</div>
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="telefono2">Telefono :</label>
			  						<input type="text" class="form-control" id="telefono2" name="telefono2" value="">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ext2">Extensión:</label>
			  						<input type="text" class="form-control" id="ext2" name="ext2" value="">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="telefonodir">Telefono directo:</label>
			  						<input type="text" class="form-control" id="telefonodir" name="telefonodir" value="">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="celular1">Celular:</label>
			  						<input type="text" class="form-control" id="celular1" name="celular1" value="">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="celular2">Celular:</label>
			  						<input type="text" class="form-control" id="celular2" name="celular2" value="">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="email1">Correo electronico:</label>
			  						<input type="text" class="form-control" id="email1" name="email1" value="">
			  					</div>

			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="email2">Correo electronico:</label>
			  						<input type="text" class="form-control" id="email2" name="email2" value="">
			  					</div>
							</div>
						<button type="submit" class="btn btn-default">Guardar</button>
						</div>
					</div>
  				</div>
			</form>
		</div>
@endsection