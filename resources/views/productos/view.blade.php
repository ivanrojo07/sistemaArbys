@extends('layouts.blank')
@section('content')
	<div class="container" id="tab">
		<div role="application" class="panel panel-group">
					<div class="panel-default">
						<div class="panel-heading"><h4>Datos del Producto:</h4>
						</div>
						<div class="panel-body">
							<div class="row">

			  					<div class="form-group col-xs-3">
			  						<label class="control-label" for="id">* ID:</label>
			  						<dd>{{$producto->identificador}}</dd>
			  					</div>
								{{-- {{dd($marcas)}} --}}
			  					<div class="form-group col-xs-3">
			  						<label class="control-label" for="marca">* Marca:</label>
			  						<dd>{{$producto->marca}}</dd>
			  					</div>
			  					<div class="form-group col-xs-3">
			  						<label class="control-label" for="clave">* Clave:</label>
			  						<dd>{{$producto->clave}}</dd>
			  					</div>
			  					<div class="form-group col-xs-3">
			  						<label class="control-label" for="familia">* Familia:</label>
			  						<dd>{{$producto->familia}}</dd>
			    				</div>
			    			</div>
			    			<div class="row">
			    				<div class="form-group col-xs-3">
			  						<label class="control-label" for="modelo">Modelo:</label>
			  						<dd>{{$producto->modelo}}</dd>
			  					</div>
			    				<div class="form-group col-xs-3">
			  						<label class="control-label" for="tipo">Tipo:</label>
			    					<dd>{{$producto->tipo}}</dd>
			    				</div>
			    				<div class="form-group col-xs-3">
			  						<label class="control-label" for="subtipo">Subtipo:</label>
			    					<dd>{{$producto->subtipo}}</dd>
			    				</div>
			    				<div class="form-group col-xs-3">
			  						<label class="control-label" for="presentacion">* Presentación(empaque):</label>
			    					<dd>{{$producto->presentacion}}</dd>
			    				</div>

			    				
			    			</div>
			    			<div class="row">
			    				<div class="form-group col-xs-6">
			  						<label class="control-label" for="calidad">Calidad:</label>
			    					<dd>{{$producto->calidad}}</dd>
			    				</div>
			    				<div class="form-group col-xs-6">
				  					<label class="control-label" for="acabado">Acabado:</label>
				  					<dd>{{$producto->acabado}}</dd>
			    				</div>
			    				<div class="form-group col-xs-4">
				  					<label class="control-label" for="medida1">Medida 1:</label>
				  					<dd>
				  						{{$producto->medida1}} {{$producto->unidad1}}
				  					</dd>
			    				</div>
			    				<div class="form-group col-xs-4">
			  						<label class="control-label" for="medida2">Medida 2:</label>
			  						<dd>{{$producto->medida2}} {{$producto->unidad2}}</dd>
			    				</div>
			    				<div class="form-group col-xs-4">
			  						<label class="control-label" for="medida3">Medida 3:</label>
			  						<dd>{{$producto->medida3}} {{$producto->unidad3}}</dd>
			    				</div>
			    				<div class="form-group col-xs-5">
			  						<label class="control-label" for="corta">* Descripción corta:</label>
			  						<dd>{{$producto->descripcion_short}}</dd>
			  					</div>
			    				<div class="form-group col-xs-7">
			  						<label class="control-label" for="descripcion">* Descripción Larga:</label>
			  						<textarea class="form-control" id="descripcion" name="descripcion_large" required disabled>"{{$producto->descripcion_large}}"
			  							</textarea>
			  					</div>
			  					<div class="form-group col-xs-5">
			  						<label class="control-label" for="sat">Clave Sat:</label>
			  						<dd></dd>
			  					</div>
			    				<div class="form-group col-xs-7">
			  						<label class="control-label" for="descripcion_sat">Descripción SAT:</label>
			  						<textarea class="form-control" id="descripcion_sat" name="descripcion_sat" disabled>
			  							</textarea>
			  					</div>
			  				</div>

						</div>
					</div>
				</div>	
		</div>
	</div>
@endsection
