
@extends('layouts.test')
@section('content1')

		<div class="container" id="tab">
				<div role="application" class="panel panel-group" >
					<div class="panel-default">
						<div class="panel-heading">							
							<div class="row" align="">
								<div class="col-sm-3"><h4>Datos Generales:</h4></div>
		  						<div class="col-sm-2">
		  							<a class="btn btn-info disabled" href="#{{--route('clientes.solicitantes.edit',['cliente'=>$cliente,'solicitante'=>$solicitante]) --}}"><strong>Editar</strong></a>
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
			  					

			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="vendedor">RFC:</label>
			  						<dd>{{ strtoupper($cliente->rfc) }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="rfc">Telèfono:</label>
			  						<dd>{{ $solicitante->telefono }}</dd>
			  					</div>
						
							<div class="col-md-12 offset-md-2 mt-3">
							{{--  
								{{ $solicitante->razon_empresa }}
								{{ $solicitante->giro_empresa }}
								{{ $solicitante->direccion_empresa }}
								{{ $solicitante->puesto }}
								{{ $solicitante->antiguedad_empresa }}
								{{ $solicitante->ingresos }}
								{{ $solicitante->telefono_empresa }}
								{{ $solicitante->correo_empresa }}

								{{ $solicitante->nombre_ref1 }}
								{{ $solicitante->telefono_ref1 }}
								{{ $solicitante->correo_ref1 }}
								{{ $solicitante->nombre_ref2 }}
								{{ $solicitante->telefono_ref2 }}
								{{ $solicitante->correo_ref2 }}

								{{ $solicitante->cuota_insc }}
								{{ $solicitante->cuota_mensual_pago }}
								{{ $solicitante->importe_recibo }}
								{{ $solicitante->cantidad_letra }}

								{{ $solicitante->cuenta_cheques }}
								{{ $solicitante->banco }}
								{{ $solicitante->num_cuenta }}
								{{ $solicitante->otra_cuenta }}
								{{ $solicitante->banco2 }}
								{{ $solicitante->num_tarjeta_credito }}
								{{ $solicitante->num_cuenta2 }}

								{{ $solicitante->nombre_benef }}
								{{ $solicitante->parentesco }}
								{{ $solicitante->telefono_benef }}
				  			--}}	
				  					
				  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
				  						<label class="control-label" for="vendedor">Tiempo de Residir:</label>
				  						<dd>{{ $solicitante->tiemporesidir }}</dd>
				  					</div>
				  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
				    					<label class="control-label" for="tipopersona">Tipo de Vivienda:</label>
				    					<dd>{{ $solicitante->tipovivienda }}</dd>
				  					</div>
				  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
				    					<label class="control-label" for="tipopersona">Estado Civil:</label>
				    					<dd>{{ $solicitante->estadocivil }}</dd>
				  					</div>
				  				

								</div>
								
							</div>
					</div>
					
					<div class="panel-default">
						<div class="panel-heading"><h4>Dato Solicitante:</h4></div>	
						<div class="panel-body">
							<div class="col-md-12 offset-md-2 mt-3">
			  					@if ($cliente->tipopersona == "Fisica")
				  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
				  						<label class="control-label" for="vendedor">Nombre:</label>
				  						<dd>{{ $cliente->nombre }}&nbsp;&nbsp;{{ $cliente->apellidopaterno }}</dd>
				  					</div>
			  					@else
				  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
				  						<label class="control-label" for="vendedor">Razòn Social:</label>
				  						<dd>{{ $cliente->razon }}</dd>
				  					</div>
			  					@endif
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numinter">Calle:</label>
			    					<dd>{{ $solicitante->calle }}</dd>
			  					</div>
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="cp">Número interior:</label>
			    					<dd>{{ $solicitante->num_int }}</dd>
			  					</div>		
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="colonia">Número exterior:</label>
			  						<dd>{{ $solicitante->numn_ext }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="municipio">Colonia:</label>
			  						<dd>{{ $solicitante->colonia }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ciudad">Delegación/Municipio:</label>
			  						<dd>{{ $solicitante->delegacionmunicipio }}</dd>
			  					</div>
			  					
							</div>
							<!--  ###############################-->
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="cp">Código Postal:</label>
			    					<dd>{{ $solicitante->cp }}</dd>
			  					</div>		
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="colonia">Ciudad:</label>
			  						<dd>{{ $solicitante->ciudad }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="municipio">Estado:</label>
			  						<dd>{{ $solicitante->estado }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ciudad">Correo:</label>
			  						<dd>{{ $solicitante->correo }}</dd>
			  					</div>
			  					
							</div>							
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="cp">Telefono:</label>
			    					<dd>{{ $solicitante->telefono }}</dd>
			  					</div>		
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="colonia">RFC:</label>
			  						<dd>{{ $solicitante->RFC }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="municipio">Tiempo residir:</label>
			  						<dd>{{ $solicitante->tiempo_residir }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ciudad">Tipo de vivienda:</label>
			  						<dd>{{ $solicitante->tipo_vivienda }}</dd>
			  					</div>
			  					
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="cp">Nombre Conyugue:</label>
			    					<dd>{{ $solicitante->antiguedad }}</dd>
			  					</div>		
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="colonia">Estado Civil:</label>
			  						<dd>{{ $solicitante->estado_civil }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="municipio">Genero:</label>
			  						<dd>{{ $solicitante->genero }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ciudad">Sociedad Conyugal:</label>
			  						<dd>{{ $solicitante->sociedad_conyugal }}</dd>
			  					</div>
			  					
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="cp">Carpeta Integrante:</label>
			    					<dd>{{ $solicitante->carpeta_integrante }}</dd>
			  					</div>		
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="colonia">Celular:</label>
			  						<dd>{{ $solicitante->celular }}</dd>
			  					</div>			  					
							</div>

							
						</div>
					</div>

					<div class="panel-default">
						<div class="panel-heading"><h4>Representante Legal:</h4></div>		
						<div class="panel-body">
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="calle">Nombre:</label>
			    					<dd>{{ $solicitante->nombre_rep_leg }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numext">Dirección:</label>
			    					<dd>{{ $solicitante->direccion_rep_leg }}</dd>
			  					</div>	
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numinter">Telefono:</label>
			    					<dd>{{ $solicitante->telefono_rep_leg }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numinter">Correo:</label>
			    					<dd>{{ $solicitante->correo_rep_leg }}</dd>
			  					</div>
			  							
							</div>								
						</div>
					</div>

				
{{--  
	<ul class="nav nav-tabs nav-pills nav-justified">
								<li class="active">
    				<a data-toggle="tab" 
    				   href="#dat" 
    				   class="btn-info">Datos para Cotizaciòn</a>
    							</li>
								<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab">
    				<a data-toggle="tab" 
    	   				href="#crm" 
    	   				class="btn-info">CRM
    		
    				</a>
								</li>

                                 <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab">
    	           <a data-toggle="tab" 
    	              href="#cot" 
    	              class="btn-info">Cotizaciòn</a>
   									</li>
    
  					</ul>

  <div class="tab-content">
<div id="dat" class="tab-pane fade in active">
<div role="application" class="panel panel-group">
				<div class="panel-default">

					<div class="panel-heading"><h4>Datos para Cotizaciòn:</h4></div>

                  
                   	<div class="panel-body">
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="calle">Folio:</label>
			    					<dd>{{ $cliente->folio }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numext">Ingresos:</label>
			    					<dd>{{ $cliente->ingresos }}</dd>
			  					</div>	
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numinter">Canal de Venta:</label>
			    					<dd>{{ $cliente->canalventa }}</dd>
			  					</div>
			  							
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="colonia">Promocion:</label>
			  						<dd>{{ $cliente->promocion }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="municipio">Objetivo Mensual:</label>
			  						<dd>{{ $cliente->objetivo }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ciudad">Calificacion:</label>
			  						<dd>{{ $cliente->calificacion }}</dd>
			  					</div>
			  					
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="calle1">Comentarios:</label>
			  						<dd>{{ $cliente->comentarios }}</dd>
			  					</div>
			  					
							</div>

							 
						</div>
               </div>
			</div>
		</div>


 <div id="crm" class="tab-pane fade ">
    	<iframe src="{{route ('clientes.crm.index',['cliente'=>$cliente])}}"
    			height="500px" >
    		
    	</iframe>
    </div>


    <div id="cot" class="tab-pane fade ">
    	<iframe src="{{route('clientes.producto.index',['cliente'=>$cliente])}}"
    			height="500px" >
    		
    	</iframe>
    </div>



       </div>

  				</div>
		--}}
		</div>
	@endsection

	