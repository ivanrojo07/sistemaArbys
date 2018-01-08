@extends('layouts.blank')
@section('content')
<div class="container">
	<div class="panel-body">
		<div class="col-lg-6">
			<form action="buscarprovedor">
				<div class="input-group">

					<input type="text" 
					       id="provedor" 
					       name="query" 
					       class="form-control" 
					       placeholder="Buscar..."
					       autofocus
					       onKeypress="if(event.keyCode == 13) event.returnValue = false;">


				</div>
				<a class="btn btn-info" 
				   href="{{ route('provedores.create')}}">
							        <strong>
							   Agregar Proveedor</strong>
							</a>
			</form>
		</div>
	</div>

{{-- TABLA AJAX DE PROVEEDORES --}} 
	<div id="datos" name="datos" class="jumbotron">
		<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
			<thead>
				<tr class="info">
					<th>@sortablelink('id', 'Identificador')</th>
					<th>@sortablelink('nombre', 'Nombre/Razón Social'){{-- Nombre --}}</th>
					<th>@sortablelink('tipopersona', 'Tipo de persona')</th>
					<th>@sortablelink('alias', 'Alias')</th>
					<th>@sortablelink('rfc', 'RFC')</th>
					<th>@sortablelink('vendedor', 'Vendedor') </th>
					<th>Operacion</th>
				</tr>
			</thead>

			@foreach($provedores as $provedore)
				<tr class="active"
				    title="Has Click Aquì para Ver"
					style="cursor: pointer"
					href="#{{$provedore->id}}">
					<td>{{$provedore->id}}</td>
					<td>
						@if ($provedore->tipopersona == "Fisica")
						{{$provedore->nombre}} {{ $provedore->apellidopaterno }} {{ $provedore->apellidomaterno }}
						@else
						{{$provedore->razonsocial}}
						@endif
					</td>
					<td>{{ $provedore->tipopersona }}</td>
					<td>{{ $provedore->alias }}</td>
					<td>{{ strtoupper($provedore->rfc) }}</td>
					<td>{{$provedore->vendedor}}</td>
					<td>
							<a class="btn btn-success btn-sm" href="{{ route('provedores.show',['provedor'=>$provedore]) }}">
								<i class="fa fa-eye" aria-hidden="true"></i> 
								<strong>Ver
							</strong></a>

							<a class="btn btn-info btn-sm" href="{{ route('provedores.edit',['provedor'=>$provedore]) }}">
								
								<i class="fa fa-pencil-square-o" aria-hidden="true"></i> <strong>Editar</strong>
							</a>
				</tr>
				</td>
			</tbody>
		</div>
			@endforeach
		</table>


	</div>
{{-- TABLA AJAX DE PROVEEDORES --}}


{{--   TABLA VISTA RÀPIDA  --}}
@foreach ($provedores as $provedore)
	{{-- expr --}}
	<div class="persona" id="{{$provedore->id}}">
		<div class="container" id="tab">
			<div role="application" class="panel panel-group" >
				<div class="panel-default">
					<div class="panel-heading"><h4>@if ($provedore->tipopersona == "Fisica")
						{{-- true expr --}}
						{{ucwords($provedore->nombre)." ".ucwords($provedore->apellidopaterno)." ".ucwords($provedore->apellidomaterno)}}
					@else
						{{-- false expr --}}
						{{ucwords($provedore->razonsocial)}}
					@endif:</h4></div>
					
				</div>
				<ul role="tablist" class="nav nav-tabs nav-pills nav-justified">
					<li role="tab" tabindex="0" aria-controls="tabs-1" aria-labelledby="ui-id-1" aria-selected="true" aria-expanded="true" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active ui-state-active active"><a href="#tab1{{$provedore->id}}" tabindex="-1">Dirección Fiscal:</a></li>
					<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-2" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false"><a href="#tab2{{$provedore->id}}" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-2">Dirección Fisica:</a></li>
					<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="#tab3{{$provedore->id}}" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a></li>
					<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="#tab4{{$provedore->id}}" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Datos Generales:</a></li>
				</ul>
				<div class="panel-default pestana" aria-hidden="false" id="tab1{{$provedore->id}}" style="display: block;">
					<div class="panel-heading">Dirección Fiscal:</div>
					<div class="panel-body">
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="calle">Calle:</label>
		    					<dd>{{ $provedore->calle }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="numext">Numero exterior:</label>
		    					<dd>{{ $provedore->numext }}</dd>
		  					</div>	
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="numinter">Numero interior:</label>
		    					<dd>{{ $provedore->numinter }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="cp">Código postal:</label>
		    					<dd>{{ $provedore->cp }}</dd>
		  					</div>		
						</div>
						<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="colonia">Colonia:</label>
		  						<dd>{{ $provedore->colonia }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="municipio">Delegación o Municipio:</label>
		  						<dd>{{ $provedore->municipio }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="ciudad">Ciudad:</label>
		  						<dd>{{ $provedore->ciudad }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="estado">Estado:</label>
		  						<dd>{{ $provedore->estado }}</dd>
		  					</div>
						</div>
						<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="calle1">Entre calle:</label>
		  						<dd>{{ $provedore->calle1 }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="calle2">Y calle:</label>
		  						<dd>{{ $provedore->calle2 }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="referencia">Referencia:</label>
		  						<dd>{{ $provedore->referencia }}</dd>
		  					</div>
						</div>
					</div>
				</div>
				<div class="panel-default pestana" id="tab2{{$provedore->id}}">

					<div class="panel-heading">Dirección Fisica:</div>
					<div class="panel-body">
						@if (count($provedore->direccionFisicaProvedor) == 0 )
							{{-- true expr --}}
							<h3>Aun no tiene direccion Fisica</h3>
						@else
							{{-- false expr --}}

						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="calle">Calle:</label>
		    					<dd>{{$provedore->direccionFisicaProvedor->calle}}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="numext">Numero exterior:</label>
		    					<dd>{{$provedore->direccionFisicaProvedor->numext}}</dd>
		  					</div>	
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="numint">Numero interior:</label>
		    					<dd>{{$provedore->direccionFisicaProvedor->numint}}</dd>
		  					</div>		
						</div>
						<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="colonia">Colonia:</label>
		  						<dd>{{$provedore->direccionFisicaProvedor->colonia}}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="municipio">Delegación o Municipio:</label>
		  						<dd>{{$provedore->direccionFisicaProvedor->municipio}}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="ciudad">Ciudad:</label>
		  						<dd>{{ $provedore->direccionFisicaProvedor->ciudad }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="estado">Estado:</label>
		  						<dd>{{$provedore->direccionFisicaProvedor->estado}}</dd>
		  					</div>
						</div>
						<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="calle1">Entre calle:</label>
		  						<dd>{{$provedore->direccionFisicaProvedor->calle1}}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="calle2">Y calle:</label>
		  						<dd>{{$provedore->direccionFisicaProvedor->calle2}}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="referencia">Referencia:</label>
		  						<dd>{{$provedore->direccionFisicaProvedor->referencia}}</dd>
		  					</div>
						</div>
						@endif
					</div>
				</div>
				<div class="panel-default pestana" id="tab3{{$provedore->id}}">
					<div class="panel-heading">
						contactosProvedor:
					</div>
					
					@if (count($provedore->contactosProvedor) == 0)
					<div class="panel-body">
						<h3>Aún no tienes contactosProvedor</h3>
					</div>
					@endif
					@if (count($provedore->contactosProvedor) !=0)
					<div class="panel-body">
						<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
							<thead>
								<tr class="info">
									<th>Nombre del contacto</th>
									<th>Telèfono Directo</th>
									
									<th>Telèfono celular</th>
								</tr>
							</thead>
							@foreach ($provedore->contactosProvedor as $contacto)
								<tr class="active">
									<td>{{ $contacto->nombre }} {{$contacto->apater}} {{$contacto->amater}}</td>

									<td>{{$contacto->telefono1}}</td>
									
									<td>{{$contacto->celular1}}</td>
									
								</tr>
								</tbody>
							@endforeach
						</table>
					</div>
					@endif
				</div>
				
							
				<div class="panel-default pestana" id="tab4{{$provedore->id}}">
				 	<div class="panel-heading">Datos Generales:</div>
				 	@if (count($provedore->datosGeneralesProvedor) == 0)
						<div class="panel-body">
							<h3>Aún no tienes datos generales</h3>
						</div>
						@endif
						@if (count($provedore->datosGeneralesProvedor) !=0)
				 	<div class="panel-body">
				 		<div class="col-md-12 offset-md-2 mt-3">
				 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
				 			<label class="control-label" for="nombre">Tamaño de la empresa:</label>
								<dd>{{$provedore->datosGeneralesProvedor->nombre}}</dd>
				 			</div>
				 		</div>
				 		<div class="col-md-12 offset-md-2 mt-3">
				 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
				 				<label class="control-label" for="web">Sitio web:</label>
				 				<dd>{{$provedore->datosGeneralesProvedor->web}}</dd>
				 			</div>

				 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
				 				<label class="control-label" for="comentario">Comentarios:</label>
				 				<dd>{{$provedore->datosGeneralesProvedor->comentario}}</dd>
				 			</div>
				 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
				 				<label class="control-label" for="fechacontacto">Fecha de contacto:</label>
				 				<dd>{{$provedore->datosGeneralesProvedor->fechacontacto}}</dd>
				 			</div>
				 		</div>
				 	</div>
				 	@endif
				</div>
			</div>
		</div>
	</div>
@endforeach
					{{--   TABLA VISTA RÀPIDA  --}}





	
</div>


@endsection