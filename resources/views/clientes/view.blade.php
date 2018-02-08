
@extends('layouts.test')
@section('content1')

		<div class="container" id="tab">
				<div role="application" class="panel panel-group" >
					<div class="panel-default">
						<div class="panel-heading"><h4>Datos del cliente:</h4></div>
						<div class="panel-body">
							<div class="col-md-12 offset-md-2 mt-3">
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="tipopersona">Tipo de Persona:</label>
			    					<dd>{{ $cliente->tipopersona }}</dd>
			  					</div>
			  					
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="rfc">RFC:</label>
			  						<dd>{{ $cliente->rfc }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="vendedor">ID:</label>
			  						<dd>{{ $cliente->identificador }}</dd>
			  					</div>
							</div>
						@if ($cliente->tipopersona == "Fisica")
								{{-- true expr --}}
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="nombre">Nombre(s):</label>
			  						<dd>{{ $cliente->nombre }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="apellidopaterno">Apellido Paterno:</label>
			  						<dd>{{ $cliente->apellidopaterno }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
			  						<dd>{{ $cliente->apellidomaterno }}</dd>
			  					</div>
							</div>
						@else
								{{-- false expr --}}
							<div class="col-md-12 offset-md-2 mt-3" id="permoral">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">

			  						<label class="control-label" for="razonsocial">Razon Social:</label>
			  						<dd>{{ $cliente->razonsocial }}</dd>
			  					</div>
			  					
							</div>
						@endif
						<div class="col-md-12 offset-md-2 mt-3">
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="tipopersona">Correo:</label>
			    					<dd>{{ $cliente->mail }}</dd>
			  					</div>
			  					
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="rfc">Telèfono:</label>
			  						<dd>{{ $cliente->telefono }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="vendedor">Telèfono Celular:</label>
			  						<dd>{{ $cliente->telefonocelular }}</dd>
			  					</div>
			  					<a class="btn btn-info" href="{{ route('clientes.edit',['cliente'=>$cliente]) }}"><strong>Editar</strong></a>
							</div>
						</div>
					</div>
					
					<div class="panel-default">
						<div class="panel-heading"><h4>Dirección:</h4></div>
						<div class="panel-body">
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="calle">Calle:</label>
			    					<dd>{{ $cliente->calle }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numext">Numero exterior:</label>
			    					<dd>{{ $cliente->numext }}</dd>
			  					</div>	
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numinter">Numero interior:</label>
			    					<dd>{{ $cliente->numinter }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="cp">Código postal:</label>
			    					<dd>{{ $cliente->cp }}</dd>
			  					</div>		
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="colonia">Colonia:</label>
			  						<dd>{{ $cliente->colonia }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="municipio">Delegación o Municipio:</label>
			  						<dd>{{ $cliente->municipio }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ciudad">Ciudad:</label>
			  						<dd>{{ $cliente->ciudad }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="estado">Estado:</label>
			  						<dd>{{ $cliente->estado }}</dd>
			  					</div>
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="calle1">Entre calle:</label>
			  						<dd>{{ $cliente->calle1 }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="calle2">Y calle:</label>
			  						<dd>{{ $cliente->calle2 }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="referencia">Referencia:</label>
			  						<dd>{{ $cliente->referencia }}</dd>
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
    	           <a data-toggle="cot" 
    	              href="#emp" 
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
    	<iframe src="{{route ('sucursal.index')}}"
    			height="500px" >
    		
    	</iframe>
    </div>




       </div>

  				</div>
		</div>
	@endsection

	