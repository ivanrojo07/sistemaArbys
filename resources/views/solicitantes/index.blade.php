@extends('layouts.blank')
@section('content')

	<div class="panel panel-group" style="margin-bottom: 0px; height: 500px;">
	<div class="panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-12">
					@if(count($cliente->transactions) != 0)
					<table class="table table-bordered table-stripped table-hover" style="margin-bottom: 0">
						<tr class="info">
							<th>Clave</th>
							<th>Descripción</th>
							<th>Marca</th>
							<th>Precio</th>
							<th>Acción</th>
						</tr>
						@foreach($cliente->transactions as $transaction)
						@foreach($transaction->pagos as $pagos)
						@if($pagos->status == "Aprobado")
						<tr>
							<td>{{ $transaction->product->clave }}</td>
							<td>{{ $transaction->product->descripcion }}</td>
							<td>{{ $transaction->product->marca }}</td>
							<td>${{ number_format($transaction->product->precio_lista, 2) }}</td>
							<td>
							@foreach($solicitante as $sol)
								@if($sol->clave_unidad == $transaction->product->clave)			
								<a href="#{{--  {{ route('clientes.solicitantes.edit', ['cliente' => $cliente, 'solicitante' => $sol]) }}--}}" class="btn btn-primary disabled">
									<i class="fa fa-pencil"></i><strong> Editar solicitud</strong>
								</a>
								<a href="{{ route('clientes.solicitantes.show', ['cliente' => $cliente, 'solicitante' => $sol]) }}" class="btn btn-warning">
									<i class="fa fa-eye"></i><strong> Ver </strong>
								</a>
								@else
								<a href="{{ route('clientes.solicitantes.create', ['cliente' => $cliente]) }}" class="btn btn-success">
									<i class="fa fa-plus"></i><strong> Crear solicitud</strong>
								</a>
								@endif
							@endforeach		
							</td>
						</tr>
						@endif
						@endforeach
						@endforeach	
					</table>
					@else
					<h4>No has elegido productos.</h4>
					@endif
				</div>
			</div>
		</div>
	</div>	
		

{{-- TABLA AJAX DE PROVEEDORES --}} 
{{-- 
	<div id="datos" name="datos" class="jumbotron">
		<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
			<thead>
				<tr class="info">
					<th>@sortablelink('identificador', 'ID de Cliente')</th>
					<th>@sortablelink('solicitante->folio', 'Folio de Solicitante')</th>
					<th>@sortablelink('nombre', 'Nombre/Razòn Social')</th>
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
					@if($cliente->tipopersona=='Fisica')
					<td>
					{{$cliente->nombre}} {{ $cliente->apellidopaterno }} {{ $cliente->apellidomaterno }}</td>
					@else
					<td>{{$cliente->razonsocial}}</td>
					@endif

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
	 --}}
{{-- TABLA AJAX DE PROVEEDORES --}}


{{--   TABLA VISTA RÀPIDA  --}}
{{--  
 @foreach ($clientes as $cliente)
	
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
					<li role="tab" tabindex="0" aria-controls="tabs-1" aria-labelledby="ui-id-1" aria-selected="true" aria-expanded="true" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active ui-state-active active"><a href="#tab1{{$cliente->id}}" tabindex="-1">Datos Generales:</a></li>
					<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-2" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false"><a href="#tab2{{$cliente->id}}" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-2">Datos para Cotización:</a></li>
					
					<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="#tab4{{$cliente->id}}" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">CRM:</a></li>
				</ul>
				<div class="panel-default pestana" aria-hidden="false" id="tab1{{$cliente->id}}" style="display: block;">
					<div class="panel-heading">Datos Generales</div>
					<div class="panel-body">
						<div class="col-md-12 offset-md-2 mt-3">
							@if($cliente->tipopersona=='Fisica')
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">

		    					<label class="control-label" for="calle">Nombre Completo:</label>
		    					
		    					<dd>{{ $cliente->nombre }}&nbsp;&nbsp;{{ $cliente->apellidopaterno }}&nbsp;&nbsp;{{ $cliente->apellidomaterno }}</dd>
		    				</div>
		  					@else
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="calle">Razón Social:</label>
		  						<dd>{{$cliente->razonsocial}}</dd>
		  					</div>
		  					@endif
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="numext">ID de Cliente:</label>
		    					<dd>{{ $cliente->identificador }}</dd>
		  					</div>	
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="numinter">Folio de Solicitante:</label>
		    					<dd>{{ $cliente->solicitante->folio }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="cp">Tipo de Persona:</label>
		    					<dd>{{ $cliente->tipopersona }}</dd>
		  					</div>		
						</div>
						<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="colonia">RFC:</label>
		  						<dd>{{ strtoupper($cliente->rfc) }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="municipio">Teléfono:</label>
		  						<dd>{{ $cliente->telefono }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="ciudad">Teléfono Celular:</label>
		  						<dd>{{ $cliente->telefonocel }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="estado">Correo(E-mail):</label>
		  						<dd>{{ $cliente->mail }}</dd>
		  					</div>
						</div>
						
					</div>
				</div>
					<div class="panel-default pestana" id="tab2{{$cliente->id}}">

					<div class="panel-heading">Datos para Cotización:</div>
					<div class="panel-body">
						

						<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="calle1">Calificación:</label>
		  						<dd>{{ $cliente->calificacion }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="calle2">Promoción:</label>
		  						<dd>{{ $cliente->promocion }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="referencia">Canal de Venta:</label>
		  						<dd>{{ $cliente->canalventa }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="referencia">Ingresos Mensuales:</label>
		  						<dd>{{ $cliente->ingresos }}</dd>
		  					</div>
						</div>

						<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="calle1">Nùmero de Integrante:</label>
		  						<dd>{{ $cliente->solicitante->integrante }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="calle2">Nùmero de Grupo:</label>
		  						<dd>{{ $cliente->solicitante->numgrupo }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="referencia">Nùmero de Contrato:</label>
		  						<dd>{{ $cliente->solicitante->numcontrato}}</dd>
		  					</div>
		  					
						</div>
				
					
					
					</div>
				</div>
			
				
							
				<div class="panel-default pestana" id="tab4{{$cliente->id}}">
					<div class="panel-heading">
						CRM:
					</div> 
					
					 @if (count($cliente->crm) == 0)
					<div class="panel-body">
						<h3>Aún no tiene CRM</h3>
					</div>
					@endif
					@if (count($cliente->crm) !=0)
					<div class="panel-body">
						<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
							<thead>
								<tr class="info">
									<th>Fecha de Contacto</th>
									<th>Fecha de Aviso</th>
									<th>Tipo de Contacto</th>
									<th>Estado</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($cliente->crm as $crm)
								<tr class="active">
									<td>{{$crm->fecha_cont }}</td>

									<td>{{$crm->fecha_aviso}}</td>
									
									<td>{{$crm->tipo_cont}}</td>

									<td>{{$crm->status}}</td>
									
								</tr>
								
							@endforeach
							</tbody>
						</table>
					</div>
					@endif 
				 </div>
			</div>
		</div>
	</div>
@endforeach 
--}}
					{{--   TABLA VISTA RÀPIDA  --}}





	
{{-- </div> --}}


@endsection