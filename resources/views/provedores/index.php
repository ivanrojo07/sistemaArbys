@extends('layouts.app')
@section('content')
<div class="container">
	<div class="panel-body">
		<div class="col-lg-6">
			<form action="buscarcliente">
				{{ csrf_field() }}
				<div class="input-group">
					<input type="text" name="query" class="form-control" placeholder="Buscar...">
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit"> <i class="fa fa-search" aria-hidden="true"></i> </button>
					</span> 
				</div>
			</form>
		</div>
	</div>
	<div class="jumbotron">
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

			@foreach($provedores as $personal)

				<tr class="active">
					<td>{{$personal->id}}</td>
					<td>
						@if ($personal->tipopersona == "Fisica")
						{{$personal->nombre}} {{ $personal->apellidopaterno }} {{ $personal->apellidomaterno }}
						@else
						{{$personal->razonsocial}}
						@endif
					</td>
					<td>{{ $personal->tipopersona }}</td>
					<td>{{ $personal->alias }}</td>
					<td>{{ strtoupper($personal->rfc) }}</td>
					<td>{{$personal->vendedor}}</td>
					<td>
							<a class="btn btn-success btn-sm"{{-- href="{{ route('clientes.show',['cliente'=>$personal]) }}" --}}><i class="fa fa-eye" aria-hidden="true"></i> Ver</a>
							<a class="btn btn-info btn-sm" href="{{ route('clientes.edit',['cliente'=>$personal]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
				</tr>
				</td>
			</tbody>
		</div>
			@endforeach
		</table>
	</div>
<<<<<<< HEAD
	{{ $personals->links()}}
</div>
@foreach ($personals as $personal)
=======
	{{ $provedores->links()}}
</div>
@foreach ($provedores as $personal)
>>>>>>> 3959c603c50cefa9e10ac7950f3b15e83ae0fa03
	{{-- expr --}}
	<div class="container" id="tab">
				<div role="application" class="panel panel-group" >
					<div class="panel-default">
						<div class="panel-heading"><h4>Datos del cliente:</h4></div>
						<div class="panel-body">
							<div class="col-md-12 offset-md-2 mt-3">
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="tipopersona">Tipo de Persona:</label>
			    					<dd>{{ $personal->tipopersona }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="alias">Alias:</label>
			  						<dd>{{ $personal->alias }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="rfc">RFC:</label>
			  						<dd>{{ $personal->rfc }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="vendedor">Vendedor:</label>
			  						<dd>{{ $personal->vendedor }}</dd>
			  					</div>
							</div>
						@if ($personal->tipopersona == "Fisica")
								{{-- true expr --}}
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="nombre">Nombre(s):</label>
			  						<dd>{{ $personal->nombre }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="apellidopaterno">Apellido Paterno:</label>
			  						<dd>{{ $personal->apellidopaterno }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
			  						<dd>{{ $personal->apellidomaterno }}</dd>
			  					</div>
							</div>
						@else
								{{-- false expr --}}
							<div class="col-md-12 offset-md-2 mt-3" id="permoral">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">

			  						<label class="control-label" for="razonsocial">Razon Social:</label>
			  						<dd>{{ $personal->razonsocial }}</dd>
			  					</div>
							</div>
						@endif
						</div>
					</div>
					<ul role="tablist" class="nav nav-tabs nav-pills nav-justified">
						<li role="tab" tabindex="0" aria-controls="tabs-1" aria-labelledby="ui-id-1" aria-selected="true" aria-expanded="true" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active ui-state-active active"><a href="#tab1" tabindex="-1">Dirección Fiscal:</a></li>
						<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-2" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false"><a href="#tab2" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-2">Dirección Fisica:</a></li>
						<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="#tab3" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a></li>
						<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="#tab4" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Datos Generales:</a></li>
					</ul>
					<div class="panel-default pestana" aria-hidden="false" id="tab1" style="display: block;">
						<div class="panel-heading">Dirección Fiscal:</div>
						<div class="panel-body">
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="calle">Calle:</label>
			    					<dd>{{ $personal->calle }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numext">Numero exterior:</label>
			    					<dd>{{ $personal->numext }}</dd>
			  					</div>	
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numinter">Numero interior:</label>
			    					<dd>{{ $personal->numinter }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="cp">Código postal:</label>
			    					<dd>{{ $personal->cp }}</dd>
			  					</div>		
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="colonia">Colonia:</label>
			  						<dd>{{ $personal->colonia }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="municipio">Delegación o Municipio:</label>
			  						<dd>{{ $personal->municipio }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ciudad">Ciudad:</label>
			  						<dd>{{ $personal->ciudad }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="estado">Estado:</label>
			  						<dd>{{ $personal->estado }}</dd>
			  					</div>
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="calle1">Entre calle:</label>
			  						<dd>{{ $personal->calle1 }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="calle2">Y calle:</label>
			  						<dd>{{ $personal->calle2 }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="referencia">Referencia:</label>
			  						<dd>{{ $personal->referencia }}</dd>
			  					</div>
							</div>
						</div>
					</div>
					<div class="panel-default pestana" id="tab2">

						<div class="panel-heading">Dirección Fisica:</div>
						<div class="panel-body">
							@if (count($personal->direccionFisica) == 0 )
								{{-- true expr --}}
								<h3>Aun no tiene direccion Fisica</h3>
							@else
								{{-- false expr --}}

							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="calle">Calle:</label>
			    					<dd>{{$personal->direccionFisica->calle}}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numext">Numero exterior:</label>
			    					<dd>{{$personal->direccionFisica->numext}}</dd>
			  					</div>	
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numint">Numero interior:</label>
			    					<dd>{{$personal->direccionFisica->numint}}</dd>
			  					</div>		
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="colonia">Colonia:</label>
			  						<dd>{{$personal->direccionFisica->colonia}}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="municipio">Delegación o Municipio:</label>
			  						<dd>{{$personal->direccionFisica->municipio}}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ciudad">Ciudad:</label>
			  						<dd>{{ $personal->direccionFisica->ciudad }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="estado">Estado:</label>
			  						<dd>{{$personal->direccionFisica->estado}}</dd>
			  					</div>
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="calle1">Entre calle:</label>
			  						<dd>{{$personal->direccionFisica->calle1}}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="calle2">Y calle:</label>
			  						<dd>{{$personal->direccionFisica->calle2}}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="referencia">Referencia:</label>
			  						<dd>{{$personal->direccionFisica->referencia}}</dd>
			  					</div>
							</div>
							@endif
						</div>
					</div>
					<div class="panel-default pestana" id="tab3">
						<div class="panel-heading">
							Contactos:
						</div>
						
						@if (count($personal->contactos) == 0)
						<div class="panel-body">
							<h3>Aún no tienes contactos</h3>
						</div>
						@endif
						@if (count($personal->contactos) !=0)
						<div class="panel-body">
							<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
								<thead>
									<tr class="info">
										<th>Nombre del contacto</th>
										<th>Puesto</th>
										<th>Area</th>
										<th>telefono:</th>
									</tr>
								</thead>
								@foreach ($personal->contactos as $contacto)
									<tr class="active">
										<td>{{ $contacto->nombre }} {{$contacto->apater}} {{$contacto->amater}}</td>
										<td>{{$contacto->puesto}}</td>
										<td>{{$contacto->area}}</td>
										<td>{{$contacto->telefonodir}}</td>
										
									</tr>
									</tbody>
								@endforeach
							</table>
						</div>
						@endif
					</div>
					
								
					<div class="panel-default pestana" id="tab4">
				 	<div class="panel-heading">Datos Generales:</div>
				 	@if (count($personal->datosGenerales) == 0)
						<div class="panel-body">
							<h3>Aún no tienes datos generales</h3>
						</div>
						@endif
						@if (count($personal->datosGenerales) !=0)
				 	<div class="panel-body">
				 		<div class="col-md-12 offset-md-2 mt-3">
				 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
				 			<label class="control-label" for="nombre">Tamaño de la empresa:</label>
								<dd>{{$personal->datosGenerales->nombre}}</dd>
				 			</div>
				 		</div>
				 		<div class="col-md-12 offset-md-2 mt-3">
				 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
				 				<label class="control-label" for="web">Sitio web:</label>
				 				<dd>{{$personal->datosGenerales->web}}</dd>
				 			</div>

				 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
				 				<label class="control-label" for="comentario">Comentarios:</label>
				 				<dd>{{$personal->datosGenerales->comentario}}</dd>
				 			</div>
				 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
				 				<label class="control-label" for="fechacontacto">Fecha de contacto:</label>
				 				<dd>{{$personal->datosGenerales->fechacontacto}}</dd>
				 			</div>
				 		</div>
				 	</div>
				 	@endif
				</div>
  				</div></div>
@endforeach

@endsection