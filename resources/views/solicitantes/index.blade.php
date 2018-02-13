@extends('layouts.blank')
@section('content')
<div class="container">
	<div class="panel-body">
		<div class="col-lg-6">
			<div class="row">
				<div class="col-sm-4">
			<form action="">
				<div class="input-group">

					<input type="text" 
					       id="solicitante" 
					       name="query" 
					       class="form-control" 
					       placeholder="Buscar..."
					       autofocus
					       onKeypress="if(event.keyCode == 13) event.returnValue = false;"
					       > {{--   --}}


				</div>
				
			</form>
		</div>
		<div class="col-sm-4">
			{{-- <a class="btn btn-info" 
				   href="{{ route('solicitantes.create')}}">
							        <strong>
							   SOLICITANTES</strong>
							</a> --}}
						</div>
		</div>
			
		</div>
	</div>

{{-- TABLA AJAX DE PROVEEDORES --}} 
	<div id="datos" name="datos" class="jumbotron">
		<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
			<thead>
				<tr class="info">
					<th>@sortablelink('identificador', 'ID de Cliente')</th>
					<th>@sortablelink('solicitante->folio', 'Folio de Solicitante')</th>
					<th>@sortablelink('nombre', 'Nombre')</th>
					<th>@sortablelink('rfc', 'RFC')</th>
					<th>@sortablelink('solicitante->numgrupo', 'Nùmero de Grupo')</th>
					<th>@sortablelink('solicitante->integrante', 'Integrante') </th>
					<th>Operacion</th>
				</tr>
			</thead>
			 <tbody>
			@foreach($clientes as $cliente)
				<tr class="active"
				    title="Has Click Aquì para Ver"
					style="cursor: pointer"
					href="#{{$cliente->id}}">
					<td>{{$cliente->identificador}}</td>
					<td>{{$cliente->solicitante->folio }}</td>
					<td>
						
						{{$cliente->nombre}} {{ $cliente->apellidopaterno }} {{ $cliente->apellidomaterno }}
						
					</td>
					<td>{{ strtoupper($cliente->rfc) }}</td>
					<td>{{ $cliente->solicitante->numgrupo}}</td>
					<td>{{ $cliente->solicitante->integrante}}</td>
					
					<td>
						<div class="row">
							<div class="col-sm-4">
							<a class="btn btn-success btn-sm" 
					href="{{ route('clientes.solicitantes.show',['cliente'=>$cliente,'solicitante'=>$cliente->solicitante]) }}">
								<i class="fa fa-eye" aria-hidden="true"></i> 
								<strong>Ver
							</strong></a>
						</div>
						<div class="col-sm-4">
							<a class="btn btn-info btn-sm" href="{{ route('clientes.solicitantes.edit',['cliente'=>$cliente,'solicitante'=>$cliente->solicitante]) }}">
								
								<i class="fa fa-pencil-square-o" aria-hidden="true"></i> <strong>Editar</strong>
							</a>
						</div>
						</div>
				
				</td>
				</tr>
				@endforeach
			 </tbody> 
			</table>
		</div>
			
		


	</div>
{{-- TABLA AJAX DE PROVEEDORES --}}


{{--   TABLA VISTA RÀPIDA  --}}
{{-- @foreach ($clientes as $cliente)
	
	<div class="persona" id="{{$cliente->id}}">
		<div class="container" id="tab">
			<div role="application" class="panel panel-group" >
				<div class="panel-default">
					<div class="panel-heading"><h4>@if ($cliente->tipopersona == "Fisica")
						
						{{ucwords($cliente->nombre)." ".ucwords($cliente->apellidopaterno)." ".ucwords($cliente->apellidomaterno)}}
					@else
						
						{{ucwords($cliente->razonsocial)}}
					@endif:</h4></div>
					
				</div>
				<ul role="tablist" class="nav nav-tabs nav-pills nav-justified">
					<li role="tab" tabindex="0" aria-controls="tabs-1" aria-labelledby="ui-id-1" aria-selected="true" aria-expanded="true" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active ui-state-active active"><a href="#tab1{{$cliente->id}}" tabindex="-1">Dirección/Domicilio:</a></li>
					<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-2" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false"><a href="#tab2{{$cliente->id}}" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-2">Datos para Cotización:</a></li>
					<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="#tab3{{$cliente->id}}" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Cotizaciones:</a></li>
					<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="#tab4{{$cliente->id}}" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">CRM:</a></li>
				</ul>
				<div class="panel-default pestana" aria-hidden="false" id="tab1{{$cliente->id}}" style="display: block;">
					<div class="panel-heading">Dirección</div>
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
				<div class="panel-default pestana" id="tab2{{$cliente->id}}">

					<div class="panel-heading">Dirección/Domicilio:</div>
					<div class="panel-body">
						

						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="calle">Calle:</label>
		    					<dd>{{$cliente->calle}}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="numext">Numero exterior:</label>
		    					<dd>{{$cliente->numext}}</dd>
		  					</div>	
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="numint">Numero interior:</label>
		    					<dd>{{$cliente->numint}}</dd>
		  					</div>		
						</div>
						<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="colonia">Colonia:</label>
		  						<dd>{{$cliente->colonia}}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="municipio">Delegación o Municipio:</label>
		  						<dd>{{$cliente->municipio}}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="ciudad">Ciudad:</label>
		  						<dd>{{ $cliente->ciudad }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="estado">Estado:</label>
		  						<dd>{{$cliente->estado}}</dd>
		  					</div>
						</div>
						<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="calle1">Entre calle:</label>
		  						<dd>{{$cliente->calle1}}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="calle2">Y calle:</label>
		  						<dd>{{$cliente->calle2}}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="referencia">Referencia:</label>
		  						<dd>{{$cliente->referencia}}</dd>
		  					</div>
						</div>
					
					</div>
				</div>
				<div class="panel-default pestana" id="tab3{{$cliente->id}}">
					<div class="panel-heading">
						contactosProvedor:
					</div> --}}
					
					{{-- @if (count($cliente->contactosProvedor) == 0)
					<div class="panel-body">
						<h3>Aún no tienes contactosProvedor</h3>
					</div>
					@endif
					@if (count($cliente->contactosProvedor) !=0)
					<div class="panel-body">
						<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
							<thead>
								<tr class="info">
									<th>Nombre del contacto</th>
									<th>Telèfono Directo</th>
									
									<th>Telèfono celular</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($cliente->contactosProvedor as $contacto)
								<tr class="active">
									<td>{{ $contacto->nombre }} {{$contacto->apater}} {{$contacto->amater}}</td>

									<td>{{$contacto->telefono1}}</td>
									
									<td>{{$contacto->celular1}}</td>
									
								</tr>
								
							@endforeach
							</tbody>
						</table>
					</div>
					@endif --}}
				{{-- </div>
				
							
				<div class="panel-default pestana" id="tab4{{$cliente->id}}">
				 	<div class="panel-heading">Datos Generales:</div> --}}
				{{--  	@if (count($cliente->datosGeneralesProvedor) == 0)
						<div class="panel-body">
							<h3>Aún no tienes datos generales</h3>
						</div>
						@endif
						@if (count($cliente->datosGeneralesProvedor) !=0)
				 	<div class="panel-body">
				 		<div class="col-md-12 offset-md-2 mt-3">
				 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
				 			<label class="control-label" for="nombre">Tamaño de la empresa:</label>
								<dd>{{$cliente->datosGeneralesProvedor->nombre}}</dd>
				 			</div>
				 		</div>
				 		<div class="col-md-12 offset-md-2 mt-3">
				 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
				 				<label class="control-label" for="web">Sitio web:</label>
				 				<dd>{{$cliente->datosGeneralesProvedor->web}}</dd>
				 			</div>

				 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
				 				<label class="control-label" for="comentario">Comentarios:</label>
				 				<dd>{{$cliente->datosGeneralesProvedor->comentario}}</dd>
				 			</div>
				 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
				 				<label class="control-label" for="fechacontacto">Fecha de contacto:</label>
				 				<dd>{{$cliente->datosGeneralesProvedor->fechacontacto}}</dd>
				 			</div>
				 		</div>
				 	</div>
				 	@endif --}}
				{{-- </div>
			</div>
		</div>
	</div>
@endforeach --}}
					{{--   TABLA VISTA RÀPIDA  --}}





	
{{-- </div> --}}


@endsection