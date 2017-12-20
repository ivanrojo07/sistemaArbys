@extends('layouts.blank')
	@section('content')
		<div class="container" >
			<form role="form" id="form-cliente">
				<div role="application" class="panel panel-group">
					<div class="panel-default">
						<div class="panel-heading"><h4>Datos del Empleado</h4></div>
						<div class="panel-body">
							<div class="col-xs-12 offset-md-2 mt-3">
								<div class="form-group col-xs-3">
			    					<label class="control-label" for="ApellidoPaterno">* Apellido Paterno:</label>
			    					<input type="text" class="form-control" id="appaterno" name="appaterno" required="">
			  					</div>
								<div class="form-group col-xs-3">
			    					<label class="control-label" for="ApellidoMaterno">* Apellido Materno:</label>
			    					<input type="text" class="form-control" id="apmaterno" name="apmaterno" required="">
			  					</div>
								<div class="form-group col-xs-3">
			    					<label class="control-label" for="ApellidoPaterno">* Nombre(s):</label>
			    					<input type="text" class="form-control" id="nombre" name="nombre" required="">
			  					</div>
								<div class="form-group col-xs-3">
			    					<label class="control-label" for="ApellidoPaterno">RFC:</label>
			    					<input type="text" class="form-control" id="rfc" name="rfc">
			  					</div>
			  				</div>
						</div>
					</div>

				<div class="tabs">
						
						<ul role="tablist" class="nav nav-tabs nav-pills nav-justified">
							<li role="tab" tabindex="0" aria-controls="tabs-1" aria-labelledby="ui-id-1" aria-selected="true" aria-expanded="true" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active ui-state-active active"><a href="#tab1"  class="ui-tabs-anchor" tabindex="-1">Generales:</a></li>

							<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-2" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false"><a href="#tab2" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-2">Laborales:</a></li>

							<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="#tab3" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Estudios:</a></li>

							<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-4" aria-labelledby="ui-id-4" aria-selected="false" aria-expanded="false"><a href="#tab4" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-4">Emergencias:</a></li>

							<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-5" aria-labelledby="ui-id-5" aria-selected="false" aria-expanded="false"><a href="#tab5" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-5">Vacaciones:</a></li>

							<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-6" aria-labelledby="ui-id-6" aria-selected="false" aria-expanded="false"><a href="#tab6" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-6">Administrativo:</a></li>

						</ul>
				<div class="panel-default pestana" aria-hidden="false" id="tab1" style="display: block;">
					<div class="panel-heading"><h5>Datos Generales:</h5></div>
					<div class="panel-body">
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-xs-3">
								<label class="control-label" for="telefono" id="lbl_calle">Teléfono:</label>
								<input type="text" class="form-control" id="telefono" name="telefono">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="celular" id="lbl_celular">Celular:</label>
								<input type="text" class="form-control" id="id_celular" name="calle">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="mail" id="lbl_mail">Correo electrónico:</label>
								<input type="text" class="form-control" id="id_mail" name="mail">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="imss" id="lbl_imss">IMSS:</label>
								<input type="text" class="form-control" id="imss" name="imss">
							</div>
						</div>
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-xs-3">
								<label class="control-label" for="curp" id="lbl_curp">CURP:</label>
								<input type="text" class="form-control" id="curp" name="curp">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="infonavit" id="lbl_infonavit"># Infonavit:</label>
								<input type="text" class="form-control" id="id_infonavir" name="infonavit">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="nacimiento" id="lbl_nacimiento">Fecha de Nacimiento:</label>
								<input type="date" class="form-control" id="id_nacimiento" name="nacimiento">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="cp" id="lbl_cp">Código Postal:</label>
								<input type="text" class="form-control" id="cp" name="cp">
							</div>
						</div>
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-xs-3">
								<label class="control-label" for="calle" id="lbl_calle">Calle:</label>
								<input type="text" class="form-control" id="calle" name="calle">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="numext" id="lbl_numext">Número Exterior:</label>
								<input type="text" class="form-control" id="id_numext" name="numext">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="numint" id="lbl_numint">Número Interior:</label>
								<input type="text" class="form-control" id="id_numint" name="numint">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="colonia" id="lbl_colonia">Colonia:</label>
								<input type="text" class="form-control" id="id_colonia" name="colonia">
							</div>
						</div>
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-xs-3">
								<label class="control-label" for="delegacion" id="lbl_delegacion">Delegación/Municipio:</label>
								<input type="text" class="form-control" id="delegacion" name="delegacion">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="estado" id="lbl_estado">Estado:</label>
								<input type="text" class="form-control" id="estado" name="estado">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="entre" id="lbl_entre">Entre Calles:</label>
								<input type="text" class="form-control" id="id_entre" name="entre">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="referencia" id="lbl_referencia">Referencia:</label>
								<input type="text" class="form-control" id="referencia" name="referencia">
							</div>
						</div>
					</div>
				</div>

						{{--***************************************************--}}
						{{--***************************************************--}}
						{{--***************************************************--}}
						{{--***************************************************--}}
				<div class="panel-default pestana" id="tab2">
					<div class="panel-heading"><h5>Laborales:</h5></div>
					<div class="panel-body">
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-xs-3">
								<label class="control-label" for="contratacion" id="lbl_contratacion">Fecha de contratación:</label>
								<input type="date" class="form-control" id="contratacion" name="contratacion">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="contrato" id="lbl_contrato">Tipo de contrato:</label>
								<input type="text" class="form-control" id="contrato" name="contrato">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="area" id="lbl_area">Área:</label>
								<input type="text" class="form-control" id="id_area" name="area">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="puesto" id="lbl_puesto">Puesto:</label>
								<input type="text" class="form-control" id="puesto" name="puesto">
							</div>
						</div>
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-xs-3">
								<label class="control-label" for="nominal" id="lbl_nominal">Salario Nóminal:</label>
								<input type="text" class="form-control" id="nominal" name="nominal" placeholder="0.0">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="diario" id="lbl_diario">Salario Diario:</label>
								<input type="text" class="form-control" id="diario" name="diario" placeholder="0.0">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="inicial" id="lbl_inicial">Puesto Inicial:</label>
								<input type="text" class="form-control" id="id_inicial" name="inicial">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="periodo" id="lbl_periodo">Periodicidad de Pago:</label>
								<select type="select" name="periodo" class="form-control" id="periodicidad">
									<option id="1" value=1>Semanal</option>
									<option id="2" value=2>Quincenal</option>
			    					<option id="3" value=3>Mensual</option>
								</select>
							</div>
						</div>
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-xs-3">
								<label class="control-label" for="prestaciones" id="lbl_prestaciones">Prestaciones:</label>
								<select type="select" name="prestaciones" class="form-control" id="prestaciones">
									<option id="1" value=1>De Ley</option>
								</select>
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="regimen" id="lbl_regimen">Régimen de Contratación:</label>
								<select type="select" name="regimen" class="form-control" id="regimen">
									<option id="1" value=1>Sueldos y salarios</option>
									<option id="2" value=2>Jubilados</option>
			    					<option id="3" value=3>Pensionados</option>
								</select>
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="entrada" id="lbl_entrada">Hora de Entradal:</label>
								<input type="text" class="form-control" id="id_entrada" name="entrada">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="salida" id="lbl_salida">Hora de Salida:</label>
								<select type="select" name="periodo" class="form-control" id="salida">
									<option id="1" value=1>Semanal</option>
									<option id="2" value=2>Quincenal</option>
			    					<option id="3" value=3>Mensual</option>
								</select>
							</div>
						</div>
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-xs-3">
								<label class="control-label" for="comida" id="lbl_comida">Tiempo de Comida:</label>
								<select type="select" name="comida" class="form-control" id="comida">
									<option id="1" value=1>0 min</option>
									<option id="2" value=2>30 min</option>
			    					<option id="3" value=3>45 min</option>
			    					<option id="4" value=4>60 min</option>
									<option id="5" value=5>1 hr 15 min</option>
			    					<option id="6" value=6>1 hr 30 min</option>
			    					<option id="7" value=7>2 hrs</option>
									<option id="8" value=8>2 hrs 30 min</option>
			    					<option id="9" value=9>3 hrs</option>
								</select>
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="lugar" id="lbl_lugar">Lugar de Trabajo:</label>
								<select type="select" name="lugar" class="form-control" id="lugar">
									<option id="1" value=1>Oficinas</option>
									<option id="2" value=2>Campo</option>
								</select>
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="banco" id="lbl_banco">Banco:</label>
								<select type="select" name="banco" class="form-control" id="banco">
									<option id="1" value=1>HSBC</option>
									<option id="2" value=2>Banorte</option>
			    					<option id="3" value=3>Banamex</option>
								</select>
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="cuenta" id="lbl_ncuenta">Cuenta:</label>
								<input type="text" class="form-control" id="cuenta" name="cuenta">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="CLABE" id="lbl_clabe">Clabe (Clave Bancaria Estandarizada):</label>
								<input type="text" class="form-control" id="clabe" name="clabe">
							</div>
						</div>
					</div>
				</div>

						{{--***************************************************--}}
						{{--***************************************************--}}
						{{--***************************************************--}}
						{{--***************************************************--}}
				<div class="panel-default pestana" id="tab3">
					<div class="panel-heading"><h5>Estudios:</h5></div>
					<div class="panel-body">
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-xs-3">
								<label class="control-label" for="escolaridad1" id="lbl_escolaridad1">Escolaridad 1:</label>
								<select type="select" name="escolaridad1" class="form-control" id="escolaridad1">
									<option id="1" value=1>Primaria</option>
									<option id="2" value=2>Secundaria</option>
			    					<option id="3" value=3>Preparatoria</option>
			    					<option id="4" value=4>Carrera</option>
									<option id="5" value=5>Maestría</option>
			    					<option id="6" value=6>Doctorado</option>
			    					<option id="7" value=7>Diplomado</option>
								</select>
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="mail" id="lbl_inst1">Institución:</label>
								<input type="text" class="form-control" id="id_inst1" name="inst1">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="cedula" id="lbl_cedula">Número de Cédula:</label>
								<input type="text" class="form-control" id="id_cedula" name="cedula">
							</div>
							
						</div>
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-xs-3">
								<label class="control-label" for="escolaridad2" id="lbl_escolaridad2">Escolaridad 2:</label>
								<select type="select" name="escolaridad2" class="form-control" id="escolaridad2">
									<option id="1" value=1>Primaria</option>
									<option id="2" value=2>Secundaria</option>
			    					<option id="3" value=3>Preparatoria</option>
			    					<option id="4" value=4>Carrera</option>
									<option id="5" value=5>Maestría</option>
			    					<option id="6" value=6>Doctorado</option>
			    					<option id="7" value=7>Diplomado</option>
								</select>
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="inst2" id="lbl_inst2">Institución:</label>
								<input type="text" class="form-control" id="id_inst2" name="inst2">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="cedula2" id="lbl_cedula2">Número de Cédula:</label>
								<input type="text" class="form-control" id="id_cedula2" name="cedula2">
							</div>
						</div>
							
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-xs-3">
								<label class="control-label" for="idioma" id="lbl_idioma">Idioma:</label>
								<select type="select" name="idioma" class="form-control" id="idioma1">
									<option id="1" value=1>Inglés</option>
									<option id="2" value=2>Frances</option>
			    					<option id="3" value=3>Portugues</option>
			    					<option id="4" value=4>Aleman</option>
									<option id="5" value=5>Italiano</option>
			    					<option id="6" value=6>Chino</option>
			    					<option id="7" value=7>Japones</option>
								</select>
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="nivel" id="lbl_nivel">Nivel:</label>
								<select type="select" name="nivel" class="form-control" id="nivel1">
									<option id="1" value=1>Básico</option>
									<option id="2" value=2>Medio</option>
			    					<option id="3" value=3>Alto</option>
								</select>
							</div>
						</div>
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-xs-3">
								<label class="control-label" for="idioma" id="lbl_idioma">Idioma 2:</label>
								<select type="select" name="idioma" class="form-control" id="idioma2">
									<option id="1" value=1>Inglés</option>
									<option id="2" value=2>Frances</option>
			    					<option id="3" value=3>Portugues</option>
			    					<option id="4" value=4>Aleman</option>
									<option id="5" value=5>Italiano</option>
			    					<option id="6" value=6>Chino</option>
			    					<option id="7" value=7>Japones</option>
								</select>
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="nivel" id="lbl_nivel">Nivel:</label>
								<select type="select" name="nivel" class="form-control" id="nivel2">
									<option id="1" value=1>Básico</option>
									<option id="2" value=2>Medio</option>
			    					<option id="3" value=3>Alto</option>
								</select>
							</div>
						</div>
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-xs-3">
								<label class="control-label" for="idioma" id="lbl_idioma">Idioma 3:</label>
								<select type="select" name="idioma" class="form-control" id="idioma3">
									<option id="1" value=1>Inglés</option>
									<option id="2" value=2>Frances</option>
			    					<option id="3" value=3>Portugues</option>
			    					<option id="4" value=4>Aleman</option>
									<option id="5" value=5>Italiano</option>
			    					<option id="6" value=6>Chino</option>
			    					<option id="7" value=7>Japones</option>
								</select>
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="nivel" id="lbl_nivel">Nivel:</label>
								<select type="select" name="nivel" class="form-control" id="nivel3">
									<option id="1" value=1>Básico</option>
									<option id="2" value=2>Medio</option>
			    					<option id="3" value=3>Alto</option>
								</select>
							</div>
						</div>
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-xs-4">
								<label class="control-label" for="curso" id="lbl_curso">Curso:</label>
								<input type="text" class="form-control" id="id_curso1" name="curso">
								<div class="boton checkbox-disabled">
									<label>
								<input id="boton-toggle" type="checkbox" data-toggle="toggle" data-on="Sí" data-off="No" data-style="ios"> ¿Certificación?
								</label>
							</div>
						</div>
						<div class="form-group col-xs-4">
								<label class="control-label" for="curso" id="lbl_curso">Curso 2:</label>
								<input type="text" class="form-control" id="id_curso2" name="curso">
								<div class="boton checkbox-disabled">
									<label>
								<input id="boton-toggle" type="checkbox" data-toggle="toggle" data-on="Sí" data-off="No" data-style="ios"> ¿Certificación?
								</label>
							</div>
						</div>
						<div class="form-group col-xs-4">
								<label class="control-label" for="curso" id="lbl_curso">Curso 3:</label>
								<input type="text" class="form-control" id="id_curso3" name="curso">
								<div class="boton checkbox-disabled">
									<label>
								<input id="boton-toggle" type="checkbox" data-toggle="toggle" data-on="Sí" data-off="No" data-style="ios"> ¿Certificación?
								</label>
							</div>
						</div>
					
						</div>
					</div>
				</div>
				{{--***************************************************--}}
						{{--***************************************************--}}
						{{--***************************************************--}}
						{{--***************************************************--}}
				<div class="panel-default pestana" id="tab4">
					<div class="panel-heading"><h5>Emergencias:</h5></div>
					<div class="panel-body">
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-xs-4">
								<label class="control-label" for="sangre" id="lbl_idioma">Tipo de Sangre:</label>
								<select type="select" name="sangre" class="form-control" id="sangre">
									<option id="1" value=1>O-</option>
									<option id="2" value=2>O+</option>
			    					<option id="3" value=3>AB+</option>
			    					<option id="4" value=4>AB-</option>
									<option id="5" value=5>A+</option>
			    					<option id="6" value=6>A-</option>
			    					<option id="7" value=7>B-</option>
			    					<option id="8" value=7>B+</option>
								</select>
							</div>
						</div>
					<div class="col-md-12 offset-md-2 mt-3">
						<div class="form-group col-xs-4">
								<label class="control-label" for="enfermedades" id="lbl_enf">Enfermedades:</label>
								<textarea class="form-control" id="id_enf" name="enfermedades" maxlength="500"> </textarea>
								</div>
						<div class="form-group col-xs-4">
								<label class="control-label" for="alergias" id="lbl_alerg">Alergias:</label>
								<textarea class="form-control" id="id_alerg" name="alerg" maxlength="500"> </textarea>
								</div>
						<div class="form-group col-xs-4">
								<label class="control-label" for="oper" id="lbl_oper">Operaciones:</label>
								<textarea class="form-control" id="id_oper" name="oper" maxlength="500"> </textarea>
						</div>
					</div>
					<div class="panel-heading"><h5>En caso de emergencia llamar a:</h5></div>
					<div class="col-xs-12 offset-md-2 mt-3">
								<div class="form-group col-xs-4">
			    					<label class="control-label" for="nombre">Nombre:</label>
			    					<input type="text" class="form-control" id="nombre1" name="nombre">
			  					</div>
			  					<div class="form-group col-xs-4">
			    					<label class="control-label" for="nombre">Parentesco</label>
			    					<input type="text" class="form-control" id="parentesco1" name="parentesco">
			  					</div>
			  				</div>
			  		<div class="col-xs-12 offset-md-2 mt-3">
								<div class="form-group col-xs-4">
			    					<label class="control-label" for="telefono">Telefono:</label>
			    					<input type="text" class="form-control" id="telefono1" name="telefono">
			  					</div>
			  					<div class="form-group col-xs-4">
			    					<label class="control-label" for="celular">Celular</label>
			    					<input type="text" class="form-control" id="celular1" name="celular">
			  					</div>
			  				</div>
			  				<div class="col-xs-12 offset-md-2 mt-3">
								<div class="form-group col-xs-4">
			    					<label class="control-label" for="nombre">Nombre 2:</label>
			    					<input type="text" class="form-control" id="nombre1" name="nombre">
			  					</div>
			  					<div class="form-group col-xs-4">
			    					<label class="control-label" for="nombre">Parentesco</label>
			    					<input type="text" class="form-control" id="parentesco1" name="parentesco">
			  					</div>
			  				</div>
			  		<div class="col-xs-12 offset-md-2 mt-3">
								<div class="form-group col-xs-4">
			    					<label class="control-label" for="telefono">Telefono 2:</label>
			    					<input type="text" class="form-control" id="telefono1" name="telefono">
			  					</div>
			  					<div class="form-group col-xs-4">
			    					<label class="control-label" for="celular">Celular 2:</label>
			    					<input type="text" class="form-control" id="celular1" name="celular">
			  					</div>
			  				</div>
			  				<div class="col-xs-12 offset-md-2 mt-3">
								<div class="form-group col-xs-4">
			    					<label class="control-label" for="nombre">Nombre:</label>
			    					<input type="text" class="form-control" id="nombre1" name="nombre">
			  					</div>
			  					<div class="form-group col-xs-4">
			    					<label class="control-label" for="nombre">Parentesco</label>
			    					<input type="text" class="form-control" id="parentesco1" name="parentesco">
			  					</div>
			  				</div>
			  		<div class="col-xs-12 offset-md-2 mt-3">
								<div class="form-group col-xs-4">
			    					<label class="control-label" for="telefono">Telefono 3:</label>
			    					<input type="text" class="form-control" id="telefono1" name="telefono">
			  					</div>
			  					<div class="form-group col-xs-4">
			    					<label class="control-label" for="celular">Celular 3:</label>
			    					<input type="text" class="form-control" id="celular1" name="celular">
			  					</div>
			  				</div>
					</div>
				</div>
				
				{{--***************************************************--}}
						{{--***************************************************--}}
						{{--***************************************************--}}
						{{--***************************************************--}}
				<div class="panel-default pestana" id="tab5">
					<div class="panel-heading"><h5>Vacaciones:</h5></div>
					<div class="panel-body">
						<div class="col-xs-12 offset-md-2 mt-3">
						<div class="form-group col-xs-4">
								<label class="control-label" for="vacaciones" id="lbl_vacaciones">Fecha de Inicio:</label>
								<input type="date" class="form-control" id="id_vacaciones" name="vacaciones">
							</div>
						<div class="form-group col-xs-4">
								<label class="control-label" for="vacaciones" id="lbl_vacaciones">Fecha de Fin:</label>
								<input type="date" class="form-control" id="id_vacaciones_fin" name="vacaciones">
							</div>
						
						</div>
						<div class="col-xs-12 offset-md-2 mt-3">
									<div class="form-group col-xs-4">
			    					<label class="control-label" for="celular">Número de días de vacaciones:</label>
			    					<input type="text" class="form-control" id="dias_vac" name="vacaciones">
			  			</div>
						</div>
						<div class="col-xs-12 offset-md-2 mt-3">
									<div class="form-group col-xs-4">
			    					<label class="control-label" for="dias_vac_rest">Días vacaiones restantes:</label>
			    					<input type="text" class="form-control" id="dias_vac_rest" name="restantes">
			  			</div>
						</div>
						<div class="col-xs-12 offset-md-2 mt-6">
							<div class="form-group col-xs-2">
								<label class="" for="dias_vac_rest">Periodo de:<input type="text" class="form-control" id="dias_vac_rest" name="restantes"></label> 
							</div>
								<div class="form-group col-xs-2">
									<label>al día : <input type="text" class="form-control" id="dias_vac_rest" name="restantes">
								</label> </div>
								<div class="form-group col-xs-2">
								<label class="" for="dias_vac_rest">Días totales: </label> <input type="text" class="form-control" id="dias_vac_rest" name="restantes">
							</div>
						</div>
						<div class="col-xs-12 offset-md-2 mt-6">
							<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
								<thead>
									<tr class="info">
										<th><a href="">Fecha:</a></th> 
										<th><a href="">Fecha Inicio:</a></th>
										<th><a href="">Fecha Fin:</a></th>
										<th><a href="">Días:</a> </th>
										<th><a href="">Días Restantes:</a></th>
									</tr>
								</thead>
								<tr>
									<th>28/11/2017</th> 
									<th>28/11/2017</th>
									<th>30/11/2017</th>
									<th>2</th>
									<th>4</th>
								</tr>
							</table>

						</div>

					</div>
				</div>
						{{--***************************************************--}}
						{{--***************************************************--}}
						{{--***************************************************--}}
						{{--***************************************************--}}
				<div class="panel-default pestana" id="tab6">
				<div class="panel-heading"><h5>Administrativo:</h5></div>
				<div class="panel-body">
						<div class="col-xs-12 offset-md-2 mt-3">
						<div class="form-group col-xs-4">
								<label class="control-label" for="fecha" id="lbl_fecha">Fecha:</label>
								<input type="date" class="form-control" id="id_fecha" name="fecha">
							</div>
					<div class="form-group col-xs-3">
								<label class="control-label" for="comentarios" id="lbl_comen">Comentarios:</label>
								<textarea class="form-control" id="id_coment" name="comentarios" maxlength="500"> </textarea>
						</div>
					<div class="form-group col-xs-3">
								<label class="control-label" for="problema" id="lbl_problema">Problema:</label>
								<textarea class="form-control" id="id_problema" name="problema" maxlength="500"> </textarea>
						</div>
					</div>
					<div class="col-xs-12 offset-md-2 mt-3">
						<div class="form-group col-xs-3">
								<label class="control-label" for="falta" id="lbl_falta">Tipo de falta:</label>
								<select type="select" name="falta" class="form-control" id="id_falta">
									<option id="1" value=1>falta 1</option>
									<option id="2" value=2>falta 2</option>
			    					<option id="3" value=3>falta 3</option>
			    					<option id="4" value=4>falta 4</option>
									<option id="5" value=5>falta 5</option>
			    					<option id="6" value=6>falta 6</option>
			    					<option id="7" value=7>falta 7</option>
									<option id="8" value=8>falta 8</option>
			    					<option id="9" value=9>falta 9</option>
								</select>
							</div>
					</div>
					<div class="col-xs-12 offset-md-2 mt-3">
						<div class="form-group col-xs-4">
			    					<label class="control-label" for="reporto">Quién lo reportó:</label>
			    					<input type="text" class="form-control" id="reporto" name="reporto">
			  			</div>

					</div>
					<div class="col-xs-12 offset-md-2 mt-3">
						<div class="form-group col-xs-12">
					<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
								<thead>
									<tr class="info">
										<th><a href="">Fecha:</a></th> 
										<th><a href="">Tipo:</a></th>
										<th><a href="">Quién Reporto:</a></th>
										<th><a href="">Problema:</a> </th>
									</tr>
								</thead>
								<tr>
									<th>28/11/2017</th> 
									<th>Administrativo</th>
									<th>José Juan Perez Lopez</th>
									<th>No portaba gafete visible.</th>
								</tr>
							</table>
						</div>
					</div>
				</div>
				</div>
			</div>
			</div>
						{{--***************************************************--}}
						{{--***************************************************--}}
						{{--***************************************************--}}
						{{--***************************************************--}}
						<button class="btn btn-success">Guardar</button>
	  				<p><strong>*Campo requerido</strong></p>
		</form>
	</div>
		@endsection
