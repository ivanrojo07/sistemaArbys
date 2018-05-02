
@extends('layouts.test')
@section('content1')

		<div class="row" id="tab" style="overflow-x: hidden;">
				<div role="application" class="panel panel-group" >
					<div class="panel-default">
						<div class="panel-heading">
							
							<div class="row" align="right">
								<div class="col-sm-2"><h4>Datos del Cliente:</h4></div>
			  						<div class="col-sm-2">

			  						<a class="btn btn-info" href="{{ route('clientes.edit',['cliente'=>$cliente]) }}"><strong>Editar</strong></a>
			  					   </div>
			  					   	<div class="col-sm-2">
			  					   		<?php $solicitante=$cliente;?>
			  						<a class="btn btn-warning" 
			  						href="{{ route('clientes.solicitantes.create',['cliente'=>$cliente]) }}">

			  						<strong>Actualizar a Solicitante</strong></a>
			  					   </div>

			  					   	<div class="col-sm-2">
			  					   		
			  						<a class="btn btn-primary" 
			  						href="{{ route('clientes.index') }}">

			  						<strong>Buscar Clientes</strong></a>
			  					   </div>
			  					</div>
						</div>
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
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="vendedor">Fecha de Resgistro:</label>
			  						<dd>{{ $cliente->created_at }}</dd>
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
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="fecha_nacimiento">Fecha de Nacimiento:</label>
			  						<dd>{{ $cliente->fecha_nacimiento }}</dd>
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
			  						<dd>{{ $cliente->telefonocel }}</dd>
			  					</div>

			  				

							</div>
							<div class="col-md-12 offset-md-2 mt-3">
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="canal_ventas">Canal de Ventas:</label>
			    					<dd>{{ $cliente->canal_ventas }}</dd>
			  					</div>
			  					
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="cp">Código Postal:</label>
			  						<dd>{{ $cliente->cp }}</dd>
			  					</div>
			  					
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="vendedor">Comentarios:</label>
			  						<dd>{{ $cliente->comentarios }}</dd>
			  					</div>

			  				

							</div>
						</div>
					</div>
					
				

				

	<ul class="nav nav-tabs nav-pills nav-justified">
		<li class="active"><a data-toggle="tab" href="#dat" class="btn-info">Datos para Cotizaciòn</a></li>
		<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a data-toggle="tab" href="#crm" class="btn-info">CRM</a></li>
		<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a data-toggle="tab" href="#cot" class="btn-info">Cotizaciòn</a></li>
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


    <div id="cot" class="tab-pane fade " style="overflow-x: hidden;">
    	<iframe src="{{route('clientes.producto.index',['cliente'=>$cliente])}}"
    			height="500px" style="overflow-x: hidden;">
    		
    	</iframe>
    </div>




       </div>

  				</div>
		</div>
	@endsection

	