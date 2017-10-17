@extends('layouts.app')
	@section('content')
		<div class="container">
			<form role="form" method="POST" action="{{ route('personals.store') }}" class="prs">
				<div class="panel-body">
					{{ csrf_field() }}
					<div class="col-md-12 offset-md-2 mt-3">
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="tipo">Tipo de cliente:</label>
	    					<select type="select" name="tipo" class="form-control" id="tipo" onchange="formulario(this)">
	    						<option id="Prospecto" value="Prospecto" selected="selected">Prospecto</option>
	    						<option id="Cliente" value="Cliente">Cliente</option>
	    					</select>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="tipopersona">Tipo de Persona:</label>
	    					<select type="select" name="tipopersona" class="form-control" id="tipopersona" onchange="persona(this)">
	    						<option id="Fisica" value="Fisica" selected="selected">Fisica</option>
	    						<option id="Moral" value="Moral">Moral</option>
	    					</select>
	  					</div>	
					</div>
					<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="nombre">Nombre(s):</label>
	  						<input type="text" class="form-control" id="nombre" name="nombre">
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="apellidopaterno">Apellido Paterno:</label>
	  						<input type="text" class="form-control" id="apellidopaterno" name="apellidopaterno">
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
	  						<input type="text" class="form-control" id="apellidomaterno" name="apellidomaterno">
	  					</div>
	
					</div>

					<div class="col-md-12 offset-md-2 mt-3" id="permoral" style="display:none;">
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="nombre">Razon Social:</label>
	  						<input type="text" class="form-control" id="nombre" name="nombre">
	  					</div>
					</div>
				<div class="col-md-12 offset-md-2 mt-3">
					<h2><span>Dirección/Domicilio</span></h2>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">	
						<label class="control-label" for="calle">Calle:</label>
						<input type="text" class="form-control" id="calle" name="calle">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">	
						<label class="control-label" for="numext" >Número Exterior:</label>
						<input type="text" class="form-control" id="numext" name="numext">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="numinter">Número Interior:</label>
						<input type="text" class="form-control" id="numinter" name="numinter">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="cp">Código Postal:</label>
						<input type="text" class="form-control" id="cp" name="cp">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="colonia">Colonia:</label>
						<input type="text" class="form-control" id="colonia" name="colonia">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="municipio">Municipio/Delegación</label>
						<input type="text" class="form-control" id="municipio" name="municipio">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="ciudad">Ciudad:</label>
						<input type="text" class="form-control" id="ciudad" name="ciudad">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="estado">Estado:</label>
						<input type="text" class="form-control" id="estado" name="estado">
					</div>
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
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12" id="cliente" style="display:none;">
						<label class="control-label" for="recidir">Tiempo recidiendo:</label>
						<input type="date" class="form-control" id="recidir" name="recidir">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12" id="cliente1" style="display:none;">
						<label class="control-label" for="vivienda">Tipo de vivienda:</label>
						<input type="text" class="form-control" id="vivienda" name="vivienda">
					</div>
				</div>
				<div class="col-md-12 offset-md-2 mt-3">
					<h2><span>Datos personales</span></h2>
					
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="mail">Correo:</label>
						<input type="email" class="form-control" id="mail" name="mail">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="rfc">RFC:</label>
						<input type="text" class="form-control" id="rfc" name="rfc">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="telefonofijo">Número de Telefono:</label>
						<input type="text" class="form-control" id="telefonofijo" name="telefonofijo">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="telefonocel">Número Celular:</label>
						<input type="text" class="form-control" id="telefonocel" name="telefonocel">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12" id="cliente2" style="display:none;">
						<label class="control-label" for="estadocivil">Estado Civil:</label>
						<select type="select" class="form-control" id="estadocivil" name="estadocivil">
							<option value="NULL" selected="selected">seleccionar</option>
    						<option value="Casado">Casado</option>
    						<option value="Soltero">Soltero</optio>
    					</select>
					</div>
				</div>
  				<button type="submit" class="btn btn-default">Guardar</button>
  				</div>
			</form>
		</div>
	@endsection