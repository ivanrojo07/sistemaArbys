@extends('layouts.blank')
	@section('content')
		<div class="container" id="tab">
			<form role="form" id="form-cliente" method="POST" action="{{ route('personals.store') }}" name="form">
				{{ csrf_field() }}
				<div role="application" class="panel panel-group">
					<div class="panel-default">
						<div class="panel-heading"><h4>Datos del Personal:</h4></div>
						<div class="panel-body">
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="tipo">Tipo de Cliente:</label>
			    					<select type="select" name="tipo" class="form-control" id="tipo" onchange="formulario(this)">
			    						<option id="Prospecto" value="Prospecto" selected="selected">Prospecto</option>
			    						<option id="Cliente" value="Cliente">Cliente</option>
			    					</select>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="tipopersona">Tipo de Persona:</label>
			    					<select type="select" name="tipopersona" class="form-control" id="tipopersona" onchange="persona(this)">
			    						<option id="Fisica" value="Fisica">Fisica</option>
			    						<option id="Moral" value="Moral">Moral</option>
			    					</select>
			  					</div>	
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="prioridad">Prioridad:</label>
			    					<select type="select" name="prioridad" class="form-control" id="prioridad" onchange="persona(this)">
			    						<option id="Baja" value="Baja">Baja</option>
			    						<option id="Mediana" value="Mediana">Mediana</option>
			    						<option id="Alta" value="Alta">Alta</option>
			    					</select>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="calificacion">Calificación:</label>
			    					<select type="select" name="calificacion" class="form-control" id="calificacion" onchange="persona(this)">
			    						<option id="1" value=1>1</option>
			    						<option id="2" value=2>2</option>
			    						<option id="3" value=3>3</option>
			    						<option id="4" value=4>4</option>
			    						<option id="5" value=5>5</option>
			    						<option id="6" value=6>6</option>
			    						<option id="7" value=7>7</option>
			    						<option id="8" value=8>8</option>
			    						<option id="9" value=9>9</option>
			    						<option id="10" value=10>10</option>
			    					</select>
			  					</div>
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="nombre">* Nombre(s):</label>
			  						<input type="text" class="form-control" id="idnombre" name="nombre" required="">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="apellidopaterno">* Apellido Paterno:</label>
			  						<input type="text" class="form-control" id="apellidopaterno" name="apellidopaterno" required>
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
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="control-label" for="mail">* Correo:</label>
									<input type="email" class="form-control" id="mail" name="mail" required>
								</div>
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="control-label" for="rfc">* RFC:</label>
									<input type="text" class="form-control" id="varrfc" name="rfc" required minlength="12" maxlength="13" pattern="^[A-Za-z]{4}[0-9]{6}[A-Za-z0-9]{3}" placeholder="Ingrese 13 caracteres" title="Siga el formato 4 letras seguidas por 6 digitos y 3 caracteres">
								</div>
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="control-label" for="telefonofijo">* Número de Telefono:</label>
									<input type="text" class="form-control" id="telefonofijo" name="telefonofijo" required>
								</div>
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="control-label" for="telefonocel">* Número Celular:</label>
									<input type="text" class="form-control" id="telefonocel" name="telefonocel" required>
								</div>
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12" id="cliente2" style="display:none;">
									<label class="control-label" for="estadocivil">Estado Civil:</label>
									<select type="select" class="form-control" id="estadocivil" name="estadocivil">
										<option value="" selected="selected">seleccionar</option>
			    						<option value="Casado">Casado</option>
			    						<option value="Soltero">Soltero</option>
			    					</select>
								</div>
							</div>
						</div>
					</div>
				<ul role="tablist" class="nav nav-tabs nav-pills nav-justified">
					<li class="active"><a href="#tab1" class="ui-tabs-anchor">Dirección/Domicilio:</a></li>
					<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab disabled" style="display:none;"><a href="" class="ui-tabs-anchor disabled" id="clienteli1">Datos Laborales:</a></li>
					<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab disabled" id="clienteli2" style="display:none;"><a href="" class="ui-tabs-anchor disabled">Referencias Personales:</a></li>
					<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab disabled" id="clienteli3" style="display:none;"><a href="" class="ui-tabs-anchor disabled">Datos de Beneficiarios:</a></li>
					<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab disabled"><a href="" class="ui-tabs-anchor disabled">Productos:</a></li>
					<li class="disabled" disabled><a href="" class="ui-tabs-anchor disabled">Productos seleccionados:</a></li>
					<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab disabled"><a href="" class="ui-tabs-anchor disabled">C.R.M.:</a></li>
				</ul>
				<div class="panel-default">
					<div class="panel-heading">Dirección/Domicilio:</div>
					<div class="panel-body">
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">	
								<label class="control-label" for="calle" id="lbl_calle">Calle:</label>
								<input type="text" class="form-control" id="calle" name="calle">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">	
								<label class="control-label" for="numext" id="lbl_numext">Número Exterior:</label>
								<input type="text" class="form-control" id="numext" name="numext">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="numinter">Número Interior:</label>
								<input type="text" class="form-control" id="numinter" name="numinter">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="cp" id="lbl_cp">* Código Postal:</label>
								<input type="text" class="form-control" id="cp" name="cp" required="">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="colonia" id="lbl_colonia">Colonia:</label>
								<input type="text" class="form-control" id="colonia" name="colonia">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="municipio" id="lbl_municipio">Municipio/Delegación:</label>
								<input type="text" class="form-control" id="municipio" name="municipio">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="ciudad" id="lbl_ciudad">Ciudad:</label>
								<input type="text" class="form-control" id="ciudad" name="ciudad">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="estado" id="lbl_estado">Estado:</label>
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
								<label class="control-label" for="recidir">Tiempo residiendo:</label>
								<input type="date" class="form-control" id="recidir" name="recidir">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12" id="cliente1" style="display:none;">
								<label class="control-label" for="vivienda">Tipo de vivienda:</label>
								<input type="text" class="form-control" id="vivienda" name="vivienda">
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