@extends('layouts.blank')
	@section('content')

		<div class="container" id="tab">
			<form role="form" id="form-cliente" method="POST" action="{{ route('clientes.solicitantes.update',['cliente'=>$cliente,'solicitante'=>$cliente->solicitante]) }}" >
				<input type="hidden" name="_method" value="PUT">
				{{ csrf_field() }}

				<input type="hidden" name="cliente_id" value="{{$cliente->id}}" id="cliente_id">

				<div role="application" class="panel panel-group" >
					<div class="panel-default">
						<div class="panel-heading"><h4><strong>Datos del Solicitante:</strong> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-asterisk" aria-hidden="true"></i>
					Campos Requeridos</h4> 
						</div>
						<div class="panel-body">

							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="clienteid">ID del Cliente:</label>
			    					<dd><strong> {{ $cliente->identificador }}</strong></dd>
			  					</div>

								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="tiemporesidir"><i class="fa fa-asterisk" aria-hidden="true"></i>Tiempo de Residencia:</label>
			    					<input type="text" class="form-control" id="tiemporesidir" name="tiemporesidir" placeholder="Tiempo de Residencia" required value="{{$solicitante->tiemporesidir}}">
			  					</div>	
			  					
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  				<label class="control-label" for="tipovivienda">Tipo de Vivienda:</label>
									<select type="select" class="form-control" id="tipovivienda" name="tipovivienda" required>
										<option value="" selected="selected">Seleccionar</option>
			    						<option value="Tipo 1"@if($solicitante->tipovivienda=='Tipo 1')
			    												selected="selected" 
			    												@endif
			    						>Tipo  1</option>
			    						<option value="Tipo 2"@if($solicitante->tipovivienda=='Tipo 2')
			    												selected="selected" 
			    												@endif>Tipo  2</option>
			    						<option value="Tipo 3"@if($solicitante->tipovivienda=='Tipo 3')
			    												selected="selected" 
			    												@endif>Tipo  3</option>
			    					</select>
								
								</div>

			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  				<label class="control-label" for="estadocivil">Estado Civil:</label>
									<select type="select" class="form-control" id="estadocivil" name="estadocivil" required>
										<option value="" selected="selected">Seleccionar</option>
			    						<option value="Soltero/a"@if($solicitante->estadocivil=='Soltero/a')
			    												selected="selected" 
			    												@endif>Soltero/a</option>
			    						<option value="Casado/a"@if($solicitante->estadocivil=='Casado/a')
			    												selected="selected" 
			    												@endif>Casado/a</option>
			    						<option value="Divorciado/a"@if($solicitante->estadocivil=='Divorciado/a')
			    												selected="selected" 
			    												@endif>Divorciado/a</option>
			    						<option value="Viudo/a"@if($solicitante->estadocivil=='Viudo/a')
			    												selected="selected" 
			    												@endif>Viudo/a</option>
			    					</select>
								
								</div>
								
			  					
							</div>

							
							
							

							

						</div>
					</div>
					

			
					<div class="panel-default">
						<div class="panel-heading"><strong>Datos Laborales:</strong></div>
						<div class="panel-body">
							<div class="col-md-12 offset-md-2 mt-3" id="direccion1">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="nombreempresa"><i class="fa fa-asterisk" aria-hidden="true"></i> Nombre de la Empresa:</label>
			    					<input type="text" class="form-control" id="nombreempresa" name="nombreempresa" placeholder="Empresa donde Labora" required value="{{$solicitante->nombreempresa}}">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="giro">Giro:</label>
			    					<input type="text" class="form-control" id="giro" name="giro" placeholder="Giro de la Empresa" value="{{$solicitante->giro}}">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="puesto">Puesto:</label>
			    					<input type="text" class="form-control" id="puesto" name="puesto" placeholder="Puesto en la Empresa" value="{{$solicitante->puesto}}">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="antiguedad" id="lbl_antiguedad"><i class="fa fa-asterisk" aria-hidden="true"></i> Antiguedad:</label>
								<input type="text" class="form-control" id="antiguedad" name="antiguedad" placeholder="Tiempo en la Empresa" value="{{$solicitante->antiguedad}}">
							</div>
			  					
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="direccion2">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="telefono1"><i class="fa fa-asterisk" aria-hidden="true"></i> Telèfono de la Empresa:</label>
			  						<input type="text" class="form-control" id="telefono1" name="telefono1" required placeholder="Telèfono.." pattern="+[0-9]" value="{{$solicitante->telefono1}}">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="telefono2"><i class="fa fa-asterisk" aria-hidden="true" ></i> Telèfono de la Empresa(2):</label>
			  						<input type="text" class="form-control" id="telefono2" name="telefono2" placeholder="Telèfono Alternatvio" pattern="+[0-9]" value="{{$solicitante->telefono2}}">
			  					</div>
			  					
			  					
							</div>
							
	  				
						</div>
					</div>

					<div class="panel-default">
						<div class="panel-heading"><strong>Referencias Personales:</strong></div>
						<div class="panel-body">

							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="nombre1">Nombre:</label>
			  						<input type="text" class="form-control" id="nombre1" name="nombre1"  placeholder="Primera Referencia" required value="{{$solicitante->nombre1}}">
			  					</div>
			  					
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="telefonoref1"><i class="fa fa-asterisk" aria-hidden="true"></i>Telèfono:</label>
			  						<input type="text" class="form-control" id="telefonoref1" name="telefonoref1" pattern="+[0-9]" required value="{{$solicitante->telefonoref1}}">
			  					</div>

			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="parentesco1"><i class="fa fa-asterisk" aria-hidden="true"></i>Parentesco:</label>
			  						<input type="text" class="form-control" id="parentesco1" name="parentesco1" placeholder="Parentesco" required  value="{{$solicitante->parentesco1}}">
			  					</div>
			  				

			  				</div>

			  				<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="nombre2">Nombre:</label>
			  						<input type="text" class="form-control" id="nombre2" name="nombre2"  placeholder="Segunda Referencia"  value="{{$solicitante->nombre2}}">
			  					</div>
			  					
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="telefonoref2"><i class="fa fa-asterisk" aria-hidden="true"></i>Telèfono:</label>
			  						<input type="text" class="form-control" id="telefonoref2" name="telefonoref2" pattern="+[0-9]"  value="{{$solicitante->telefonoref2}}">
			  					</div>

			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="parentesco2"><i class="fa fa-asterisk" aria-hidden="true"></i>Parentesco:</label>
			  						<input type="text" class="form-control" id="parentesco2" name="parentesco2" placeholder="Parentesco"  value="{{$solicitante->parentesco2}}">
			  					</div>
			  				

			  				</div>
			  		

			  			
			  				
			  					
						</div>
						</div>	

						<div class="panel-default">
						 <div class="panel-heading"><strong>Datos de Solicitud:</strong></div>
						  <div class="panel-body">
						   <div class="col-md-12 offset-md-2 mt-3">
						   		<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="folio">Folio:(Automàtico)</label>
			  						<input type="text" class="form-control" id="id_auto" name="folio" readonly="" placeholder="Automàtico" value="{{$solicitante->folio}}">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="refcontrato">Referencia de Contrato</label>
			  						<input type="text" class="form-control" id="refcontrato" name="refcontrato" required value="{{$solicitante->refcontrato}}">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="refapertura">Referencia de Apertura</label>
			  						<input type="text" class="form-control" id="refapertura" name="refapertura" required value="{{$solicitante->refapertura}}">
			  					</div>
						   </div>
						   <div class="col-md-12 offset-md-2 mt-3">
						   
			  				 <div class="form-group col-xs-3">
								<label class="control-label" for="fechasolicitud">Fecha de Solicitud:</label>
								<input type="date" class="form-control" name="fechasolicitud" id="fechasolicitud" value="{{$solicitante->fechasolicitud}}" required>
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="fechacontrato">Fecha de Contrato:</label>
								<input type="date" class="form-control" name="fechacontrato" id="fechacontrato" value="{{$solicitante->fechacontrato}}" required>
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="fechapago">Fecha de Pago:</label>
								<input type="date" class="form-control" name="fechapago" id="fechapago" value="{{$solicitante->fechapago}}" required>
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="fechaentrega">Fecha de Entrega:</label>
								<input type="date" class="form-control" name="fechaentrega" id="fechaentrega" value="{{$solicitante->fechaentrega}}">
							</div>
						   </div>
						  </div>
						 </div>

						 <div class="panel-default">
						 <div class="panel-heading"><strong>Datos del Beneficiario:</strong></div>
						  <div class="panel-body">
						   <div class="col-md-12 offset-md-2 mt-3">
						   		<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="nombrebeneficiario">Nombre:</label>
			  						<input type="text" class="form-control" id="nombrebeneficiario" name="nombrebeneficiario" value="{{$solicitante->nombrebeneficiario}}" >
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="edadbeneficiario">Edad</label>
			  						<input type="text" class="form-control" id="edadbeneficiario" name="edadbeneficiario"  value="{{$solicitante->edadbeneficiario}}">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="telbeneficiario">Telèfono</label>
			  						<input type="text" class="form-control" id="telbeneficiario" name="telbeneficiario" pattern="+[0-9]" value="{{$solicitante->telbeneficiario}}">
			  					</div>
						   </div>
						 
						  </div>
						 </div>
						 <div class="panel-default">
						 <div class="panel-heading"><strong>Datos del Contrato:</strong></div>
						  <div class="panel-body">
						   <div class="col-md-12 offset-md-2 mt-3">
						   		<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="numcontrato">Nùmero de Contrato:</label>
			  						<input type="text" class="form-control" id="numcontrato" name="numcontrato" required value="{{$solicitante->numcontrato}}">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="numgrupo">Nùmero de Grupo</label>
			  						<input type="text" class="form-control" id="numgrupo" name="numgrupo" required value="{{$solicitante->numgrupo}}">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="integrante">Nùmero de Integrante</label>
			  						<input type="text" class="form-control" id="integrante" name="integrante" required value="{{$solicitante->integrante}}">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<button type="submit" 
									        class="btn btn-success">
									 <strong>Guardar</strong>
								</button>
			  					</div>

			  					
						   </div>
						 
						  </div>
						 </div>
					
					</div>
					
								</form>	
  				</div>
						
			
		</div>


<script>
		function sub(){
			a=document.getElementById("ingresos").value;
			b=document.getElementById("canalventa").value;
			b=b.toUpperCase(b);
			a=a.toUpperCase(a);
			document.getElementById("id_auto").value=a;
			
		}

	$(document).ready(function(){
    $("input").keyup(function(){
            a=document.getElementById("cliente_id").value;
			b=document.getElementById("integrante").value;
			b=b.toUpperCase(b);
			a=a.toUpperCase(a);
			document.getElementById("id_auto").value=a+b;
    });
});
		
		// function f_corta(){
		// 	familia=document.getElementById("familia_id").value;
		// 	var ar_familia=familia.split(",");
		// 	tipo=document.getElementById("tipo").value;
		// 	var ar_tipo=tipo.split(",");
		// 	subtipo=document.getElementById("subptipo").value;
		// 	var ar_subtipo=subtipo.split(",");
		// 	medida=document.getElementById("medida1").value;
		// 	medida=medida.toUpperCase(medida);
		// 	modelo=document.getElementById("modelo_id").value;
		// 	modelo=modelo.toUpperCase(modelo);
		// 	presentacion=document.getElementById("presentacion").value;
		// 	var ar_presentacion=presentacion.split(",");
		// 	calidad=document.getElementById("calidad").value;
		// 	var ar_calidad=calidad.split(",");
		// 	acabado=document.getElementById("acabado").value;
		// 	var ar_acabado= acabado.split(",");
		// 	document.getElementById("corta_id").value=ar_familia[0]+ar_tipo[0]+ar_subtipo[0]+medida+modelo+ar_presentacion[0]+ar_calidad[0]+ar_acabado[0];
		// 	document.getElementById("descripcion").value=ar_familia[1]+", "+ar_tipo[1]+", "+ar_subtipo[1]+ ", "+ medida + ", "+modelo+ ", "+ar_presentacion[1]+ ", "+ar_calidad[1]+ ", "+ar_acabado[1];

		// }
	</script>


	@endsection