
@extends('layouts.test')
@section('content1')

		<div class="container" id="tab">
				<div role="application" class="panel panel-group" >
					<div class="panel-default">
						<div class="panel-heading">
							
							<div class="row" align="right">
								<div class="col-sm-2"><h4>Datos del Solicitante:</h4></div>
			  						<div class="col-sm-2">
			  						<a class="btn btn-info" href="{{ route('clientes.solicitantes.edit',['cliente'=>$cliente,'solicitante'=>$cliente->solicitante]) }}"><strong>Editar</strong></a>
			  					   </div>
			  					   	<div class="col-sm-2">
			  						<a class="btn btn-warning" href="#"><strong>Actualizar a Integrante</strong></a>
			  					   </div>
			  					   	<div class="col-sm-2">
			  					   		
			  						<a class="btn btn-primary" 
			  						href="{{ url('/solicitantes') }}">

			  						<strong>Buscar Solicitantes</strong></a>
			  					   </div>
			  					</div>
						</div>
						<div class="panel-body">
							<div class="col-md-12 offset-md-2 mt-3">
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="tipopersona">ID de Cliente:</label>
			    					<dd>{{ strtoupper($cliente->identificador) }}</dd>
			  					</div>
			  					
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="rfc">Folio de Solicitante:</label>
			  						<dd>{{ strtoupper($solicitante->folio) }}</dd>
			  					</div>
			  					@if ($cliente->tipopersona == "Fisica")
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="vendedor">Nombre:</label>
			  						<dd>{{ $cliente->nombre }}&nbsp;&nbsp;{{ $cliente->apellidopaterno }}</dd>
			  					</div>
			  					@else
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="vendedor">Razòn Social:</label>
			  						<dd>{{ $cliente->razonsocial }}</dd>
			  					</div>
			  					@endif

			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="vendedor">RFC:</label>
			  						<dd>{{ strtoupper($cliente->rfc) }}</dd>
			  					</div>
							</div>
						
						<div class="col-md-12 offset-md-2 mt-3">
			  					
			  					
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="rfc">Telèfono:</label>
			  						<dd>{{ $cliente->telefono }}</dd>
			  					</div>
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
						<div class="panel-heading"><h4>Dato Laborales:</h4></div>
						<div class="panel-body">
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="calle">Nombre de Empresa:</label>
			    					<dd>{{ $solicitante->nombreempresa }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numext">Giro:</label>
			    					<dd>{{ $solicitante->giro }}</dd>
			  					</div>	
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numinter">Puesto:</label>
			    					<dd>{{ $solicitante->puesto }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="cp">Antiguedad:</label>
			    					<dd>{{ $solicitante->antiguedad }}</dd>
			  					</div>		
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="colonia">Telèfono de Empresa:</label>
			  						<dd>{{ $solicitante->telefono1 }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="municipio">Telèfono de Empresa::</label>
			  						<dd>{{ $solicitante->telefono2 }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ciudad">Ingresos:</label>
			  						<dd>{{ $solicitante->ingresos }}</dd>
			  					</div>
			  					
							</div>
							

							
						</div>
					</div>

					<div class="panel-default">
						<div class="panel-heading"><h4>Referencias Personales:</h4></div>
						<div class="panel-body">
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="calle">Nombre:</label>
			    					<dd>{{ $solicitante->nombre1 }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numext">Telèfono:</label>
			    					<dd>{{ $solicitante->telefonoref1 }}</dd>
			  					</div>	
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numinter">Parentesco:</label>
			    					<dd>{{ $solicitante->parentesco1 }}</dd>
			  					</div>
			  							
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="colonia">Nombre:</label>
			  						<dd>{{ $solicitante->nombre2 }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="municipio">Telèfono:</label>
			  						<dd>{{ $solicitante->telefonoref2 }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ciudad">Parentesco:</label>
			  						<dd>{{ $solicitante->parentesco2 }}</dd>
			  					</div>
			  					
							</div>
							

							
						</div>
					</div>

					<div class="panel-default">
						<div class="panel-heading"><h4>Datos de Solicitud:</h4></div>
						<div class="panel-body">
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="rfc">Folio de Solicitante:</label>
			  						<dd>{{ strtoupper($solicitante->folio) }}</dd>
			  					</div>
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="calle">Referencia de Contrato:</label>
			    					<dd>{{ $solicitante->refcontrato }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numext">Referencia de Apertura:</label>
			    					<dd>{{ $solicitante->refapertura }}</dd>
			  					</div>	
			  					
			  							
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="colonia">Fecha de Solicitud:</label>
			  						<dd>{{ $solicitante->fechasolicitud }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="municipio">Fecha de Contrato:</label>
			  						<dd>{{ $solicitante->fechacontrato }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ciudad">Fecha de Pago:</label>
			  						<dd>{{ $solicitante->fechapago }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numinter">Fecha de Entrega:</label>
			    					<dd>{{ $solicitante->fechaentrega}}</dd>
			  					</div>
			  					
							</div>
							

							
						</div>
					</div>

					<div class="panel-default">
						<div class="panel-heading"><h4>Datos del Beneficiario:</h4></div>
						<div class="panel-body">
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="rfc">Nombre:</label>
			  						<dd>{{ strtoupper($solicitante->nombrebeneficiario) }}</dd>
			  					</div>
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="calle">Edad:</label>
			    					<dd>{{ $solicitante->edadbeneficiario }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numext">Telèfono:</label>
			    					<dd>{{ $solicitante->telbeneficiario }}</dd>
			  					</div>	
			  					
			  							
							</div>
						</div>
					</div>

					<div class="panel-default">
						<div class="panel-heading"><h4>Datos del Contrato:</h4></div>
						<div class="panel-body">
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="rfc">Nùmero de Contrato:</label>
			  						<dd>{{ strtoupper($solicitante->numcontrato) }}</dd>
			  					</div>
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="calle">Nùmero de Grupo:</label>
			    					<dd>{{ $solicitante->numgrupo }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numext">Integrante:</label>
			    					<dd>{{ $solicitante->integrante }}</dd>
			  					</div>	
			  					
			  							
							</div>
						</div>
					</div>

				

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
		</div>
	@endsection

	