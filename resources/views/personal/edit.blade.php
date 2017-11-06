@extends('layouts.app')
	@section('content')
		<div class="container" id="tab">
			<form role="form" id="form-cliente" method="POST" action="{{ route('personals.update',['personal'=>$personal]) }}" name="form">
					{{ csrf_field() }}
				<input type="hidden" name="_method" value="PUT">
				<div role="application" class="panel panel-group" >
					<div class="panel-default">
						<div class="panel-heading"><h4>Datos del Personal:</h4></div>
						<div class="panel-body">
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="tipo">Tipo de Cliente:</label>
			    					<select type="select" name="tipo" class="form-control" id="tipo" onchange="formulario(this)">
			    						<option id="Prospecto" value="Prospecto" selected="selected">Prospecto</option>
			    						<option id="Cliente" value="Cliente" value="selected">Cliente</option>
			    						
			    					</select>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="tipopersona">Tipo de Persona:</label>
			    					<select type="select" name="tipopersona" class="form-control" id="tipopersona" onchange="persona(this)">
			    						
			    							{{-- true expr --}}
			    						<option id="Fisica" value="Fisica" selected="selected">Fisica</option>
			    						<option id="Moral" value="Moral" >Moral</option>
			    					</select>
			  					</div>	
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="nombre">* Nombre(s):</label>
			  						<input type="text" class="form-control" id="nombre" name="nombre" value="{{ $personal->nombre }}">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="apellidopaterno">* Apellido Paterno:</label>
			  						<input type="text" class="form-control" id="apellidopaterno" name="apellidopaterno" value="{{ $personal->apellidopaterno }}">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
			  						<input type="text" class="form-control" id="apellidomaterno" name="apellidomaterno" value="{{ $personal->apellidomaterno }}">
			  					</div>
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="permoral" style="display:none;">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">

			  						<label class="control-label" for="razonsocial">* Razon Social:</label>
			  						<input type="text" class="form-control" id="razonsocial" name="razonsocial" value="{{ $personal->razonsocial }}">
			  					</div>
							</div>
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="control-label" for="mail">* Correo:</label>
									<input type="email" class="form-control" id="mail" name="mail" value="{{ $personal->mail }}" required>
								</div>
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="control-label" for="rfc">* RFC:</label>
									<input type="text" class="form-control" id="rfc" name="rfc" value="{{ $personal->rfc }}" required>
								</div>
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="control-label" for="telefonofijo">* Número de Telefono:</label>
									<input type="text" class="form-control" id="telefonofijo" name="telefonofijo" value="{{ $personal->telefonofijo }}" required>
								</div>
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="control-label" for="telefonocel">* Número Celular:</label>
									<input type="text" class="form-control" id="telefonocel" name="telefonocel" value="{{ $personal->telefonocel }}" required>
								</div>
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12" id="cliente2" style="display:none;">
									<label class="control-label" for="estadocivil">Estado Civil:</label>
									<select type="select" class="form-control" id="estadocivil" name="estadocivil">
										<option value="" selected="selected">seleccionar</option>
										@if ($personal->estadocivil == 'Casado')
											{{-- true expr --}}
			    						<option value="Casado" selected="selected">Casado</option>
										@else
											{{-- false expr --}}
			    						<option value="Soltero" selected="selected">Soltero</optio>
										@endif
			    					</select>
								</div>
							</div>
						</div>
					</div>
				<ul role="tablist" class="nav nav-tabs nav-pills nav-justified">
					<li class="active"><a href="#tab1">Dirección/Domicilio:</a></li>
					<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab disabled"><a href="" class="ui-tabs-anchor disabled">Datos Laborales:</a></li>
					<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab disabled"><a href="" class="ui-tabs-anchor disabled">Referencias Personales:</a></li>
					<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab disabled"><a href="" class="ui-tabs-anchor disabled">Datos de Beneficiarios:</a></li>
					<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab disabled"><a href="" class="ui-tabs-anchor disabled">Productos:</a></li>
					<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab disabled"><a href="" class="ui-tabs-anchor disabled">C.R.M.:</a></li>
				</ul>
				<div class="panel-default">
					<div class="panel-heading">Dirección/Domicilio:</div>
					<div class="panel-body">
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">	
								<label class="control-label" for="calle">* Calle:</label>
								<input type="text" class="form-control" id="calle" name="calle" value="{{ $personal->calle }}" required>
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">	
								<label class="control-label" for="numext" >* Número Exterior:</label>
								<input type="text" class="form-control" id="numext" name="numext" value="{{ $personal->numext }}" required>
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="numinter">Número Interior:</label>
								<input type="text" class="form-control" id="numinter" name="numinter" value="{{ $personal->numinter }}">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="cp">Código Postal:</label>
								<input type="text" class="form-control" id="cp" name="cp" value="{{ $personal->cp }}">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="colonia">* Colonia:</label>
								<input type="text" class="form-control" id="colonia" name="colonia" value="{{ $personal->colonia }}" required>
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="municipio">* Municipio/Delegación:</label>
								<input type="text" class="form-control" id="municipio" name="municipio" value="{{ $personal->municipio }}" required>
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="ciudad">* Ciudad:</label>
								<input type="text" class="form-control" id="ciudad" name="ciudad" value="{{ $personal->ciudad }}" required>
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="estado">* Estado:</label>
								<input type="text" class="form-control" id="estado" name="estado" value="{{ $personal->estado }}" required>
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="calle1">Entre calle:</label>
								<input type="text" class="form-control" id="calle1" name="calle1" value="{{ $personal->calle1 }}">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="calle2">Y calle:</label>
								<input type="text" class="form-control" id="calle2" name="calle2" value="{{ $personal->calle2 }}">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="referencia">Referencia:</label>
								<input type="text" class="form-control" id="referencia" name="referencia" value="{{ $personal->referencia }}">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12" id="cliente" style="display:none;">
								<label class="control-label" for="recidir">Tiempo recidiendo:</label>
								<input type="date" class="form-control" id="recidir" name="recidir" value="{{ $personal->recidir }}">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12" id="cliente1" style="display:none;">
								<label class="control-label" for="vivienda">Tipo de vivienda:</label>
								<input type="text" class="form-control" id="vivienda" name="vivienda" value="{{ $personal->vivienda }}">
							</div>
						</div>
	  				<button type="submit" class="btn btn-default">Guardar</button>
	  				<p><strong>*Campo requerido</strong></p>
					</div>
				</div>
  				</div>
			</form>
		</div>
	@endsection