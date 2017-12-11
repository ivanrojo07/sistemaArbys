@extends('layouts.app')
	@section('content')
		<div class="container" id="tab">
			<form role="form" id="form-cliente" method="POST" action="{{ route('clientes.store') }}" name="form">
				{{ csrf_field() }}
				<div role="application" class="panel panel-group" >
					<div class="panel-default">
						<div class="panel-heading"><h4>Datos del cliente:</h4>
						</div>
						<div class="panel-body">
							<div class="col-md-12 offset-md-2 mt-3">
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="tipopersona">Tipo de Persona:</label>
			    					<select type="select" name="tipopersona" class="form-control" id="tipopersona" onchange="persona(this)">
			    						<option id="Fisica" value="Fisica">Fisica</option>
			    						<option id="Moral" value="Moral">Moral</option>
			    					</select>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="alias">* Alias:</label>
			  						<input type="text" class="form-control" id="alias" name="alias" required>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="rfc">* RFC:</label>
			  						<input type="text" class="form-control" id="varrfc" name="rfc" required minlength="12" maxlength="13" pattern="^[A-Za-z]{4}[0-9]{6}[A-Za-z0-9]{3}" placeholder="Ingrese 13 caracteres" title="Siga el formato 4 letras seguidas por 6 digitos y 3 caracteres">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="vendedor">Vendedor:</label>
			  						<input type="text" class="form-control" id="vendedor" name="vendedor">
			  					</div>
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="nombre">* Nombre(s):</label>
			  						<input type="text" class="form-control" id="nombre" name="nombre">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="apellidopaterno">* Apellido Paterno:</label>
			  						<input type="text" class="form-control" id="apellidopaterno" name="apellidopaterno">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
			  						<input type="text" class="form-control" id="apellidomaterno" name="apellidomaterno">
			  					</div>
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="permoral" style="display:none;">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">

			  						<label class="control-label" for="razonsocial">* Razon Social:</label>
			  						<input type="text" class="form-control" id="razonsocial" name="razonsocial">
			  					</div>
							</div>

						</div>
					</div>
					<ul role="tablist" class="nav nav-tabs nav-pills nav-justified">
						<li class="active"><a href="#tab1">Dirección Fisica:</a></li>
						<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab disabled" aria-controls="tabs-2" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false"><a href="#tab2" role="presentation" tabindex="-1" class="ui-tabs-anchor disabled" id="ui-id-2">Dirección Fiscal:</a></li>
						<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab disabled" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="#tab3" role="presentation" tabindex="-1" class="ui-tabs-anchor disabled" id="ui-id-3">Contacto:</a></li>
						<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab disabled" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="#tab3" role="presentation" tabindex="-1" class="ui-tabs-anchor disabled" id="ui-id-3">Datos Generales:</a></li>
					</ul>
					<div class="panel-default">
						<div class="panel-heading">Dirección Fisica:</div>
						<div class="panel-body">
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="calle">* Calle:</label>
			    					<input type="text" class="form-control" id="calle" name="calle" required>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numext">* Numero exterior:</label>
			    					<input type="text" class="form-control" id="numext" name="numext" required>
			  					</div>	
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numinter">Numero interior:</label>
			    					<input type="text" class="form-control" id="numinter" name="numinter">
			  					</div>
			  					
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="colonia">* Colonia:</label>
			  						<input type="text" class="form-control" id="colonia" name="colonia" required>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="municipio">* Delegación o Municipio:</label>
			  						<input type="text" class="form-control" id="municipio" name="municipio" required>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ciudad">* Ciudad:</label>
			  						<input type="text" class="form-control" id="ciudad" name="ciudad" required>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="estado">* Estado:</label>
			  						<input type="text" class="form-control" id="estado" name="estado" required>
			  					</div>
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="calle1">Entre calle:</label>
			  						<input type="text" class="form-control" id="calle1" name="calle1">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="calle2">Y calle:</label>
			  						<input type="text" class="form-control" id="calle2" name="calle2">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="referencia">Referencia:</label>
			  						<input type="text" class="form-control" id="referencia" name="referencia">
			  					</div>
							</div>
	  				<button type="submit" class="btn btn-success">Guardar</button>
	  				<p><strong>*Campo requerido</strong></p>
						</div>
					</div>
  				</div>
			</form>
		</div>
	@endsection