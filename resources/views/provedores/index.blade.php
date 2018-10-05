@extends('layouts.blank')
@section('content')

<div class="container">
	<div role="application" class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Proveedores:</h4>
					</div>
					@foreach(Auth::user()->perfil->componentes as $cmp)
					@if($cmp->nombre == "crear proveedor")
					<div class="col-sm-4 text-center">
				   		<a class="btn btn-success" href="{{ route('provedores.create') }}">
				        	<strong>Agregar Proveedor</strong>
						</a>
					</div>
					@endif
					@endforeach
				</div>
			</div>
			<div id="datos" name="datos" class="panel-body">
				<div class="col-sm-12">
					@if(count($provedores) == 0)
						<h4>Aún no hay proveedores agregados.</h4>
					@else
					<table class="table table-striped table-bordered table-hover" style="color:rgb(51, 51, 51); border-collapse: collapse; margin-bottom: 0px">
						<tr class="info">
							<th>@sortablelink('id', 'Identificador')</th>
							<th>@sortablelink('nombre', 'Nombre/Razón Social')</th>
							<th>@sortablelink('tipopersona', 'Tipo de persona')</th>
							<th>@sortablelink('alias', 'Alias')</th>
							<th>@sortablelink('rfc', 'RFC')</th>
							<th>@sortablelink('vendedor', 'Vendedor') </th>
							<th>Operacion</th>
						</tr>
						@foreach($provedores as $provedore)
						<tr class="active" title="Has Click Aquì para Ver" style="cursor: pointer" href="#{{ $provedore->id }}">
							<td>{{ $provedore->id }}</td>
							<td>
								@if($provedore->tipopersona == "Fisica")
								{{ $provedore->nombre }} {{ $provedore->apellidopaterno }} {{ $provedore->apellidomaterno }}
								@else
								{{ $provedore->razonsocial }}
								@endif
							</td>
							<td>{{ $provedore->tipopersona }}</td>
							<td>{{ $provedore->alias }}</td>
							<td>{{ strtoupper($provedore->rfc) }}</td>
							<td>{{ $provedore->vendedor }}</td>
							<td class="text-center">
								@foreach(Auth::user()->perfil->componentes as $cmp)
								@if($cmp->nombre == "ver proveedor")
								<a class="btn btn-primary btn-sm" href="{{ route('provedores.show', ['provedor'=>$provedore]) }}">
									<i class="fa fa-eye" aria-hidden="true"></i> <strong>Ver</strong>
								</a>
								@endif
								@if($cmp->nombre == "editar proveedor")
								<a class="btn btn-warning btn-sm" href="{{ route('provedores.edit', ['provedor'=>$provedore]) }}">
									<i class="fa fa-pencil-square-o" aria-hidden="true"></i> <strong>Editar</strong>
								</a>
								@endif
								@endforeach
							</td>
						</tr>
						@endforeach
					</table>
					@endif
				</div>
			</div>
		</div>
		@foreach(Auth::user()->perfil->componentes as $cmp)
		@if($cmp->nombre == "indice datos proveedor")
		@foreach($provedores as $provedore)
		<div class="panel-default persona" id="{{ $provedore->id }}">
			<div class="panel-heading">
				<h4>
				@if ($provedore->tipopersona == "Fisica")
					{{ ucwords($provedore->nombre) . " " . ucwords($provedore->apellidopaterno) . " " . ucwords($provedore->apellidomaterno) }}
				@else
					{{ ucwords($provedore->razonsocial) }}
				@endif
				:</h4>
			</div>
			<ul role="tablist" class="nav nav-tabs nav-pills nav-justified">
				<li role="tab" tabindex="0" aria-controls="tabs-1" aria-labelledby="ui-id-1" aria-selected="true" aria-expanded="true" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active ui-state-active active">
					<a href="#tab1{{ $provedore->id }}" tabindex="-1">Dirección Física:</a>
				</li>
				<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-2" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false">
					<a href="#tab2{{ $provedore->id }}" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-2">Dirección Fiscal:</a>
				</li>
				<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false">
					<a href="#tab3{{ $provedore->id }}" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Contactos:</a>
				</li>
				<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-4" aria-labelledby="ui-id-4" aria-selected="false" aria-expanded="false">
					<a href="#tab4{{ $provedore->id }}" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-4">Datos Generales:</a>
				</li>
				<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-5" aria-labelledby="ui-id-5" aria-selected="false" aria-expanded="false">
					<a href="#tab5{{ $provedore->id }}" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-5">Datos Bancarios:</a>
				</li>
			</ul>
			<div class="pestana panel-default" aria-hidden="false" id="tab1{{ $provedore->id }}" style="display: block;">
				<div class="panel-heading">
					Dirección Física:
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-sm-3">
	    					<label class="control-label" for="calle">Calle:</label>
	    					<dd>{{ $provedore->calle }}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	    					<label class="control-label" for="numext">Numero exterior:</label>
	    					<dd>{{ $provedore->numext }}</dd>
	  					</div>	
	  					<div class="form-group col-sm-3">
	    					<label class="control-label" for="numinter">Numero interior:</label>
	    					<dd>{{ $provedore->numinter }}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	    					<label class="control-label" for="cp">Código postal:</label>
	    					<dd>{{ $provedore->cp }}</dd>
	  					</div>		
					</div>
					<div class="row" id="perfisica">
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="colonia">Colonia:</label>
	  						<dd>{{ $provedore->colonia }}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="municipio">Delegación o Municipio:</label>
	  						<dd>{{ $provedore->municipio }}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="ciudad">Ciudad:</label>
	  						<dd>{{ $provedore->ciudad }}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="estado">Estado:</label>
	  						<dd>{{ $provedore->estado }}</dd>
	  					</div>
					</div>
					<div class="row" id="perfisica">
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="calle1">Entre calle:</label>
	  						<dd>{{ $provedore->calle1 }}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="calle2">Y calle:</label>
	  						<dd>{{ $provedore->calle2 }}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="referencia">Referencia:</label>
	  						<dd>{{ $provedore->referencia }}</dd>
	  					</div>
					</div>
				</div>
			</div>
			<div class="pestana panel-default" id="tab2{{ $provedore->id }}">
				<div class="panel-heading">
					Dirección Fiscal:
				</div>
				<div class="panel-body">
					@if(!isset($provedore->direccionFisicaProvedor))
					<h3>Aún no tiene dirección fiscal.</h3>
					@else
					<div class="row">
						<div class="form-group col-sm-3">
	    					<label class="control-label" for="calle">Calle:</label>
	    					<dd>{{ $provedore->direccionFisicaProvedor->calle }}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	    					<label class="control-label" for="numext">Numero exterior:</label>
	    					<dd>{{ $provedore->direccionFisicaProvedor->numext }}</dd>
	  					</div>	
	  					<div class="form-group col-sm-3">
	    					<label class="control-label" for="numint">Numero interior:</label>
	    					<dd>{{ $provedore->direccionFisicaProvedor->numint }}</dd>
	  					</div>		
					</div>
					<div class="row" id="perfisica">
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="colonia">Colonia:</label>
	  						<dd>{{ $provedore->direccionFisicaProvedor->colonia }}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="municipio">Delegación o Municipio:</label>
	  						<dd>{{ $provedore->direccionFisicaProvedor->municipio }}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="ciudad">Ciudad:</label>
	  						<dd>{{ $provedore->direccionFisicaProvedor->ciudad }}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="estado">Estado:</label>
	  						<dd>{{ $provedore->direccionFisicaProvedor->estado }}</dd>
	  					</div>
					</div>
					<div class="row" id="perfisica">
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="calle1">Entre calle:</label>
	  						<dd>{{ $provedore->direccionFisicaProvedor->calle1}}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="calle2">Y calle:</label>
	  						<dd>{{ $provedore->direccionFisicaProvedor->calle2}}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="referencia">Referencia:</label>
	  						<dd>{{ $provedore->direccionFisicaProvedor->referencia }}</dd>
	  					</div>
					</div>
					@endif
				</div>
			</div>
			<div class="pestana panel-default" id="tab3{{ $provedore->id }}">
				<div class="panel-heading">
					Contactos:
				</div>
				@if (count($provedore->contactosProvedor) == 0)
				<div class="panel-body">
					<h3>Aún no tiene contactos.</h3>
				</div>
				@else
				<div class="panel-body">
					<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
						<tr class="info">
							<th>Nombre del contacto</th>
							<th>Telèfono Directo</th>
							<th>Telèfono celular</th>
						</tr>
						@foreach ($provedore->contactosProvedor as $contacto)
						<tr class="active">
							<td>{{ $contacto->nombre }} {{ $contacto->apater }} {{ $contacto->amater }}</td>

							<td>{{ $contacto->telefono1}}</td>
							
							<td>{{ $contacto->celular1}}</td>
						</tr>
						@endforeach
					</table>
				</div>
				@endif
			</div>	
			<div class="pestana panel-default" id="tab4{{ $provedore->id }}">
			 	<div class="panel-heading">Datos Generales:</div>
			 	@if ($provedore->datosGeneralesProvedor == null)
					<div class="panel-body">
						<h3>Aún no tiene datos generales.</h3>
					</div>
				@else
			 	<div class="panel-body">
			 		<div class="row">
			 			<div class="form-group col-sm-3">
			 			<label class="control-label" for="nombre">Tamaño de la empresa:</label>
							<dd>{{ $provedore->datosGeneralesProvedor->nombre }}</dd>
			 			</div>
			 		</div>
			 		<div class="row">
			 			<div class="form-group col-sm-3">
			 				<label class="control-label" for="web">Sitio web:</label>
			 				<dd>{{ $provedore->datosGeneralesProvedor->web }}</dd>
			 			</div>

			 			<div class="form-group col-sm-3">
			 				<label class="control-label" for="comentario">Comentarios:</label>
			 				<dd>{{ $provedore->datosGeneralesProvedor->comentario }}</dd>
			 			</div>
			 			<div class="form-group col-sm-3">
			 				<label class="control-label" for="fechacontacto">Fecha de contacto:</label>
			 				<dd>{{ $provedore->datosGeneralesProvedor->fechacontacto }}</dd>
			 			</div>
			 		</div>
			 	</div>
			 	@endif
			</div>
			<div class="pestana panel-default" id="tab5{{ $provedore->id }}">
			 	<div class="panel-heading">
				 	Datos Bancarios:
				 </div>
		 		@if ($provedore->datosBancarios == null)
				<div class="panel-body">
					<h3>Aún no tiene datos bancarios.</h3>
				</div>
				@else
		 		<div class="panel-body">
			 		<div class="row">
			 			<div class="form-group col-sm-3">
			 				<label class="control-label" for="nombre">Banco:</label>
							<dd>{{ $provedore->datosBancarios->banco->nombre }}</dd>
			 			</div>
			 			<div class="form-group col-sm-3">
			 				<label class="control-label" for="nombre">Número de Cuenta:</label>
							<dd>{{ $provedore->datosBancarios->cuenta }}</dd>
			 			</div>
			 			<div class="form-group col-sm-3">
			 				<label class="control-label" for="nombre">CLABE:</label>
							<dd>{{ $provedore->datosBancarios->clabe }}</dd>
			 			</div>
			 			<div class="form-group col-sm-3">
			 				<label class="control-label" for="nombre">Beneficiario:</label>
							<dd>{{ $provedore->datosBancarios->beneficiario }}</dd>
			 			</div>
			 		</div>
			 	</div>
			 	@endif
			</div>
		</div>
		@endforeach
		@endif
		@endforeach
		</div>
	</div>
</div>

@endsection