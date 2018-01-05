@extends('layouts.blank')
@section('content')
	<div class="container col-xs-10 col-xs-offset-1">
		<div class="panel-body">
			<div class="col-lg-6">
				<form action="buscarproducto" onKeypress="if(event.keyCode == 13) event.returnValue = false;">
					<div class="input-group">
						<input type="text" id="producto" 
							   name="query" 
							   class="form-control" 
							   placeholder="Buscar..." 
							   autofocus>

							   <a class="btn btn-info" 
							   href="{{ route('productos.create')}}">
							        <strong>
							   Agregar Producto</strong>
							</a>
					</div>
				</form>
			</div>
		</div>

		{{-- TABLA AJAX DE CLIENTES --}}
		<div id="datos" name="datos" class="jumbotron">
			<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px; margin-left: -45px;">
	<thead>
		<tr class="info">
			<th>@sortablelink('identificador','ID')</th>
			<th>@sortablelink('marca','Marca')</th>
			<th>@sortablelink('clave','Clave')</th>
			<th>@sortablelink('descripcion_short','Descripción corta')</th>
			<th>@sortablelink('familia','Familia')</th>
			<th>@sortablelink('tipo','Tipo')</th>
			<th width="200px">Operaciones</th>
		</tr>
	</thead>
	@foreach ($productos as $producto)
		{{-- expr --}}
		<tr class="active"
		    title="Has Click Aquì para Ver"
			style="cursor: pointer"
			href="#{{$producto->id}}">
			<td>{{$producto->identificador}}</td>
			<td>{{$producto->marca}}</td>
			<td>{{$producto->clave}}</td>
			<td>{{$producto->descripcion_short}}</td>
			<td>{{$producto->familia}}</td>
			<td>{{$producto->tipo}}</td>
			<td>
				
				<a class="btn btn-success btn-sm" href="{{ route('productos.show',['producto'=>$producto]) }}"><i class="fa fa-eye" aria-hidden="true"></i>
					<strong>Ver</strong>
				</a>
				<a class="btn btn-info btn-sm" href="{{ route('productos.edit',['producto'=>$producto]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					<strong>Editar</strong>
				</a>
				
			</td>
		</tr>
	@endforeach

</table>
{{ $productos->links() }}
		</div>
		{{-- TABLA AJAX DE CLIENTES --}}



	</div>

	{{--   TABLA VISTA RÀPIDA  --}}

@foreach ($productos as $producto)
	{{-- expr --}}
	<div class="persona" id="{{$producto->id}}">
		<div class="container" id="tab">
			<div role="application" class="panel panel-group" >
				<div class="panel-default">
					<div class="panel-heading"><h4>

						{{ucwords($producto->identificador)}}
					</h4></div>
					
				</div>
				<ul role="tablist" class="nav nav-tabs nav-pills nav-justified">
					<li role="tab" tabindex="0" aria-controls="tabs-1" aria-labelledby="ui-id-1" aria-selected="true" aria-expanded="true" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active ui-state-active active"><a href="#tab1{{$producto->id}}" tabindex="-1">Datos del Producto:</a></li>
					<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-2" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false"><a href="#tab2{{$producto->id}}" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-2">Descripciòn:</a></li>
					<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="#tab3{{$producto->id}}" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Detalles:</a></li>
					<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="#tab4{{$producto->id}}" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">SAT Datos:</a></li>
				</ul>
				<div class="panel-default pestana" aria-hidden="false" id="tab1{{$producto->id}}" style="display: block;">
					<div class="panel-heading">Datos del Producto:</div>
					<div class="panel-body">
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="calle">Marca:</label>
		    					<dd>{{ $producto->marca }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="numext">Clave:</label>
		    					<dd>{{ $producto->clave }}</dd>
		  					</div>	
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="numinter">Famìlia:</label>
		    					<dd>{{ $producto->familia }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="cp">Tipo:</label>
		    					<dd>{{ $producto->tipo }}</dd>
		  					</div>		
						</div>
						<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="colonia">Sub-Tipo:</label>
		  						<dd>{{ $producto->subtipo }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="municipio">Presentaciòn(Empaque):</label>
		  						<dd>{{ $producto->presentacion }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="ciudad">Calidad:</label>
		  						<dd>{{ $producto->calidad }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="estado">Acabado:</label>
		  						<dd>{{ $producto->acabado }}</dd>
		  					</div>
						</div>
						<!-- <div class="col-md-12 offset-md-2 mt-3" id="perfisica">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="calle1">Entre calle:</label>
		  						<dd>{{ $producto->calle1 }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="calle2">Y calle:</label>
		  						<dd>{{ $producto->calle2 }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="referencia">Referencia:</label>
		  						<dd>{{ $producto->referencia }}</dd>
		  					</div>
						</div> -->
					</div>
				</div>
				<div class="panel-default pestana" id="tab2{{$producto->id}}">

					<div class="panel-heading">Descripción:</div>
					<div class="panel-body">
						

						


					<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
							
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="municipio">Desripción:</label>
		  						<dd>{{$producto->descripcion_large}}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="ciudad">Desripción Corta:</label>
		  						<dd>{{ $producto->descripcion_short }}</dd>
		  					</div>
		  					
						</div>


						
						
					</div>
				</div>


			<div class="panel-default pestana" id="tab3{{$producto->id}}">
					<div class="panel-heading">
						Detalles:
					</div>
					<div class="panel-body">

							<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="calle">Medida 1:</label>
		    					<dd>{{$producto->medida1}}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="numext">Unidad 1:</label>
		    					<dd>{{$producto->unidad1}}</dd>
		  					</div>	
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="numint">Medida 2:</label>
		    					<dd>{{$producto->medida2}}</dd>
		  					</div>	
		  						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="colonia">Unidad2:</label>
		  						<dd>{{$producto->unidad2}}</dd>
		  					</div>
						</div>

						
					</div>
				</div>	


				<div class="panel-default pestana" id="tab4{{$producto->id}}">
					<div class="panel-heading">
						Datos SAT:
					</div>
					<div class="panel-body">

							<div class="col-md-12 offset-md-2 mt-3">
							
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="calle">Clave SAT:</label>
		    					<dd>---</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="numext">Descripciòn SAT:</label>
		    					<dd>---</dd>
		  					</div>	
		  						
					
						</div>

						
					</div>
				</div>	
					
					
					
					
				
							
				
			</div>
		</div>
	</div>
@endforeach
	{{--   TABLA VISTA RÀPIDA  --}}


@endsection
