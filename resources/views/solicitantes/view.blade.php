
@extends('layouts.test')
@section('content1')

	<div class="container" id="tab">
		<div role="application" class="panel panel-group" >
			<div class="panel-default">
				<div class="panel-heading">							
					<div class="row" align="">
						<div class="col-sm-3"><h4>Datos Generales:</h4></div>
						<div class="col-sm-2">
							<a class="btn btn-primary" href="{{ route('clientes.solicitantes.edit',['cliente'=>$cliente,'solicitante'=>$solicitante]) }}"><i class="fa fa-pencil"></i><strong> Editar</strong></a>
						</div>
						<div class="col-sm-2">
							<a class="btn btn-success" href="{{ url('solicitantes', ['id' => $cliente->id]) }}"><i class="fa fa-list"></i><strong> Lista de Solicitudes</strong></a>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="col-md-12 offset-md-2 mt-3">
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="tipopersona">Tipo de Unidad:</label>
	    					<dd>{{ $solicitante->tipo_unidad}}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="tipopersona">Clave de Unidad:</label>
	    					<dd>{{ $solicitante->clave_unidad}}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="tipopersona">Costo:</label>
	    					<dd>{{ $solicitante->costo }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="tipopersona">Cuota Mensual:</label>
	    					<dd>{{ $solicitante->cuota_mensual }}</dd>
	  					</div>
	  				</div>
	  				<div class="col-md-12 offset-md-2 mt-3">
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="tipopersona">Plazo:</label>
	    					<dd>{{ $solicitante->plazo }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="tipopersona">Numero de tarifa:</label>
	    					<dd>{{ $solicitante->num_tarifa }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="tipopersona">Clave Asesor:</label>
	    					<dd>{{ $solicitante->clave_asesor }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="tipopersona">Nombre Asesor:</label>
	    					<dd>{{ $solicitante->nombre_asesor }}</dd>
	  					</div>
					</div>
	  				<div class="col-md-12 offset-md-2 mt-3">
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="vendedor">RFC:</label>
	  						<dd>{{ strtoupper($cliente->rfc) }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="rfc">Telèfono:</label>
	  						<dd>{{ $solicitante->telefono }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="vendedor">Tiempo de Residir:</label>
	  						<dd>{{ $solicitante->tiemporesidir }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="tipopersona">Tipo de Vivienda:</label>
	    					<dd>{{ $solicitante->tipovivienda }}</dd>
	  					</div>
					</div>
					<div class="col-md-12 offset-md-2 mt-3">							
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="tipopersona">Estado Civil:</label>
	    					<dd>{{ $solicitante->estadocivil }}</dd>
	  					</div>
					</div>			
				</div>
			</div>
			<div class="panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-sm-3">
							<h4>Datos del Solicitante:</h4>
						</div>
					</div>
				</div>	
				<div class="panel-body">
					<div class="col-md-12 offset-md-2 mt-3">
						@if($cliente->tipo === "Fisica")
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="vendedor">Nombre:</label>
	  						<dd>{{ $solicitante->nombre_sol }}</dd>
	  					</div>
	  					@else
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="vendedor">Razon:</label>
	  						<dd>{{ $solicitante->razon }}</dd>
	  					</div>
	  					@endif
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="numinter">Calle:</label>
	    					<dd>{{ $solicitante->calle }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="vendedor">Numero interior:</label>
	  						<dd>{{ $solicitante->num_int }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="numinter">num_ext:</label>
	    					<dd>{{ $solicitante->num_ext }}</dd>
	  					</div>
					</div>
					<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="cp">Colonia:</label>
	    					<dd>{{ $solicitante->colonia }}</dd>
	  					</div>		
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="colonia">Delegaciíon / Municipio:</label>
	  						<dd>{{ $solicitante->delegacionmunicipio }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="vendedor">Código Postal:</label>
	  						<dd>{{ $solicitante->cp }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="numinter">Ciudad:</label>
	    					<dd>{{ $solicitante->ciudad }}</dd>
	  					</div>
					</div>
					<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="cp">Estado:</label>
	    					<dd>{{ $solicitante->estado }}</dd>
	  					</div>		
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="colonia">Correo:</label>
	  						<dd>{{ $solicitante->correo }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="vendedor">Teléfono:</label>
	  						<dd>{{ $solicitante->telefono }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="numinter">RFC:</label>
	    					<dd>{{ $solicitante->RFC }}</dd>
	  					</div>
					</div>
					<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="cp">Tiempo de residir:</label>
	    					<dd>{{ $solicitante->tiempo_residir }}</dd>
	  					</div>		
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="colonia">Tipo de Vivenda:</label>
	  						<dd>{{ $solicitante->tipo_vivienda }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="vendedor">Nombre del Conyuge:</label>
	  						<dd>{{ $solicitante->nombre_conyuge }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="numinter">Estado Civil:</label>
	    					<dd>{{ $solicitante->estado_civil }}</dd>
	  					</div>
					</div>
					<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="cp">Género:</label>
	    					<dd>{{ $solicitante->genero }}</dd>
	  					</div>		
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="colonia">Sociedad Conyugal:</label>
	  						<dd>{{ $solicitante->sociedad_conyugal }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="vendedor">Carpeta de Integrante:</label>
	  						<dd>{{ $solicitante->carpeta_integrante }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="numinter">Celular:</label>
	    					<dd>{{ $solicitante->celular }}</dd>
	  					</div>
					</div>
				</div>
			</div>
			<div class="panel-default">
				<div class="panel-heading"><h4>Datos Representante Legal:</h4></div>	
				<div class="panel-body">
					<div class="col-md-12 offset-md-2 mt-3">
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="vendedor">Nombre:</label>
	  						<dd>{{ $solicitante->nombre_rep_leg }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="numinter">Dirección:</label>
	    					<dd>{{ $solicitante->direccion_rep_leg }}</dd>
	  					</div>
					</div>
					<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="cp">Telefono:</label>
	    					<dd>{{ $solicitante->telefono_rep_leg }}</dd>
	  					</div>		
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="colonia">Correo:</label>
	  						<dd>{{ $solicitante->correo_rep_leg }}</dd>
	  					</div>
	  					
					</div>
				</div>
			</div>
			<div class="panel-default">
				<div class="panel-heading"><h4>Dato Empleo Actual:</h4></div>	
				<div class="panel-body">
					<div class="col-md-12 offset-md-2 mt-3">
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="vendedor">Razón:</label>
	  						<dd>{{ $solicitante->razon_empresa }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="vendedor">Giro:</label>
	  						<dd>{{ $solicitante->giro_empresa }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="numinter">Dirección:</label>
	    					<dd>{{ $solicitante->direccion_empresa }}</dd>
	  					</div>
					</div>
					<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="cp">Puesto:</label>
	    					<dd>{{ $solicitante->puesto }}</dd>
	  					</div>		
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="colonia">Antiguedad:</label>
	  						<dd>{{ $solicitante->antiguedad_empresa }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="municipio">Ingresos:</label>
	  						<dd>{{ $solicitante->ingresos }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="ciudad">Teléfono:</label>
	  						<dd>{{ $solicitante->telefono_empresa }}</dd>
	  					</div>
	  					
					</div>
					<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="cp">Correo:</label>
	    					<dd>{{ $solicitante->correo_empresa }}</dd>
	  					</div>							
					</div>										
				</div>
			</div>
			<div class="panel-default">
				<div class="panel-heading"><h4>Referencias Personales:</h4></div>	
				<div class="panel-body">
					<div class="col-md-12 offset-md-2 mt-3">
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="vendedor">Nombre Referencia 1:</label>
	  						<dd>{{ $solicitante->nombre_ref1 }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="vendedor">Telefono Referencia 1:</label>
	  						<dd>{{ $solicitante->telefono_ref1 }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="numinter">Correo Referencia 1:</label>
	    					<dd>{{ $solicitante->correo_ref1 }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="cp">Nombre Referencia 2:</label>
	    					<dd>{{ $solicitante->nombre_ref2 }}</dd>
	  					</div>		
					</div>
					<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="colonia">Telefono Referencia 2:</label>
	  						<dd>{{ $solicitante->telefono_ref2 }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="municipio">Correo Referencia 2:</label>
	  						<dd>{{ $solicitante->correo_ref2 }}</dd>
	  					</div>
	  				</div>										
				</div>
			</div>
			<div class="panel-default">
				<div class="panel-heading"><h4>Datos del Pago:</h4></div>	
				<div class="panel-body">
					<div class="col-md-12 offset-md-2 mt-3">
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="vendedor">Cuota Inscripción:</label>
	  						<dd>{{ $solicitante->cuota_insc }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="vendedor">Cuota Mensual:</label>
	  						<dd>{{ $solicitante->cuota_mensual_pago }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="numinter">Importe del Recibo:</label>
	    					<dd>{{ $solicitante->importe_recibo }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="cp">Cantidad con Letra:</label>
	    					<dd>{{ $solicitante->cantidad_letra }}</dd>
	  					</div>		
					</div>									
				</div>
			</div>
			<div class="panel-default">
				<div class="panel-heading"><h4>Datos Crediticios:</h4></div>	
				<div class="panel-body">
					<div class="col-md-12 offset-md-2 mt-3">
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="vendedor">Cuenta de Cheques:</label>
	  						<dd>{{ $solicitante->cuenta_cheques }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="vendedor">Banco:</label>
	  						<dd>{{ $solicitante->banco }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="numinter">Número de cuenta:</label>
	    					<dd>{{ $solicitante->num_cuenta }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="cp">¿Tiene otras cuentas?:</label>
	    					<dd>{{ $solicitante->otra_cuenta }}</dd>
	  					</div>
					</div>
	  				<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="cp">Banco:</label>
	    					<dd>{{ $solicitante->banco2 }}</dd>
	  					</div>		
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="cp">Número de Tarjeta de Credito:</label>
	    					<dd>{{ $solicitante->num_tarjeta_credito }}</dd>
	  					</div>	
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="cp">Número de cuenta:</label>
	    					<dd>{{ $solicitante->num_cuenta2 }}</dd>
	  					</div>	
	  				</div>
				</div>
			</div>
			<div class="panel-default">
				<div class="panel-heading"><h4>Datos del Beneficiario:</h4></div>	
				<div class="panel-body">
					<div class="col-md-12 offset-md-2 mt-3">
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="vendedor">Nombre:</label>
	  						<dd>{{ $solicitante->nombre_benef }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="vendedor">Edad:</label>
	  						<dd>{{ $solicitante->edad }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="numinter">Parentesco:</label>
	    					<dd>{{ $solicitante->parentesco }}</dd>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="cp">Telefono:</label>
	    					<dd>{{ $solicitante->telefono_benef }}</dd>
	  					</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection

	