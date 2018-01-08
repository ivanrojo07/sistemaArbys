@extends('layouts.blank')
	@section('content')
	
	<div class="container" id="tab">
		<form role="form" id="form-cliente" method="POST" name="form" action="{{ route('productos.update',['producto'=>$producto]) }}">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PUT">
		<div role="application" class="panel panel-group">
					<div class="panel-default">
						<div class="panel-heading"><h4>Datos del Producto:
						&nbsp;&nbsp;&nbsp;&nbsp;		<strong><i class="fa fa-asterisk" aria-hidden="true"></i>Campo requerido</strong>
						</h4>
						</div>
						<div class="panel-body">
								<div class="form-group col-xs-2 col-xs-offset-10">
										<button type="submit" class="btn btn-success">
										<strong>Guardar</strong>
									</button>

									<a class="btn btn-info" 
							   href="{{ route('productos.create')}}">
							        <strong>
							   Agregar Nuevo</strong>
							</a>
										
								</div>
			  					<div class="form-group col-xs-3">
			  						<label class="control-label" for="id"> ID: (Automático)
			  						</label>
			  						<input type="text" class="form-control" id="id_auto" name="identificador" required readonly="" value="{{$producto->identificador}}" maxlength="20">
			  					</div>
								{{-- {{dd($marcas)}} --}}
			  					<div class="form-group col-xs-3">
			  						<label class="control-label" for="marca"><i class="fa fa-asterisk" aria-hidden="true"></i> Marca:</label>
			  						<select type="select" name="marca" class="form-control" id="marca" onchange="sub()">	
			  							@foreach ($marcas as $marca)
			  								<option id="{{$marca->id}}" value="{{$marca->abreviatura}}" @if($producto->marca == $marca->abreviatura) selected="selected" @endif>{{$marca->nombre}}</option>
			  							@endforeach
			  						</select>
			  					</div>
			  					<div class="form-group col-xs-3">
			  						<label class="control-label" for="clave"><i class="fa fa-asterisk" aria-hidden="true"></i> Clave:</label>
			  						<input  type="text" 
			  						        class="form-control" 
			  						        id="clave" 
			  						        name="clave" 
			  						        required onkeyup="sub()" 
			  						        value="{{$producto->clave}}"
			  						        autofocus>
			  					</div>
			  					<div class="form-group col-xs-3">
			  					<label class="control-label" for="familia"><i class="fa fa-asterisk" aria-hidden="true"></i> Familia:</label>

			    					<select type="select" name="familia" class="form-control" id="familia_id" required onchange="f_corta()">

			    						@foreach ($familias as $familia)
			    							{{-- expr --}}
			    							<option id="{{$familia->id}}" value="{{$familia->abreviatura}},{{$familia->nombre}}" @if($producto->familia == $familia->abreviatura) selected="selected" @endif>{{$familia->nombre}}</option>
			    						@endforeach
			    					</select>
			    				</div>
			    				<div class="form-group col-xs-3">
			  						<label class="control-label" for="modelo">Modelo:</label>
			  						<input type="text" class="form-control" id="modelo_id" name="modelo" onkeyup="f_corta()" value="{{$producto->modelo}}">
			  					</div>
			    				<div class="form-group col-xs-3">
			  					<label class="control-label" for="tipo">Tipo:</label>
			    					<select type="select" name="tipo" class="form-control" id="tipo" onchange="f_corta()">

			    						@foreach ($tipos as $tipo)
			    							{{-- expr --}}
			    							<option id="{{$tipo->id}}" value="{{$tipo->abreviatura}},{{$tipo->nombre}}" @if($producto->tipo == $tipo->abreviatura) selected="selected" @endif>{{$tipo->nombre}}</option>
			    						@endforeach
			    				</select>
			    				</div>
			    				<div class="form-group col-xs-3">
			  					<label class="control-label" for="subtipo">Subtipo:</label>
			    					<select type="select" name="subtipo" class="form-control" id="subptipo" required onchange="f_corta()">
			    					@foreach ($subtipos as $subtipo)
			    							{{-- expr --}}
			    							<option id="{{$subtipo->id}}" value="{{$subtipo->abreviatura}},{{$subtipo->nombre}}" @if($producto->subptipo == $subtipo->abreviatura) selected="selected" @endif>{{$subtipo->nombre}}</option>
			    						@endforeach	
			    				</select>
			    				</div>
			    				<div class="form-group col-xs-3">
			  					<label class="control-label" for="presentacion"><i class="fa fa-asterisk" aria-hidden="true"></i> Presentación(empaque):</label>
			    					<select type="select" name="presentacion" class="form-control" id="presentacion" required onchange="f_corta()">
			    					@foreach ($presentaciones as $presentacion)
			    							{{-- expr --}}
		    							<option id="{{$presentacion->id}}" value="{{$presentacion->abreviatura}},{{$presentacion->nombre}}" selected="selected">{{$presentacion->nombre}}</option>
		    						@endforeach	
			    				</select>
			    				</div>
			    				
			    				<div class="form-group col-xs-6">
			  					<label class="control-label" for="calidad">Calidad:</label>

			    					<select type="select" name="calidad" class="form-control" id="calidad" onchange="f_corta()">
			    					@foreach ($calidades as $calidad)
		    							{{-- expr --}}
		    							<option id="{{$calidad->id}}" value="{{$calidad->abreviatura}},{{$calidad->nombre}}" @if($producto->calidad == $calidad->abreviatura)selected="selected" @endif>{{$calidad->nombre}}</option>
		    						@endforeach	
			    				</select>
			    				</div>
			    				<div class="form-group col-xs-6">
			  					<label class="control-label" for="acabado">Acabado:</label>

			    					<select type="select" name="acabado" class="form-control" id="acabado" onchange="f_corta()">
			    					@foreach ($acabados as $acabado)
		    							{{-- expr --}}
		    							<option id="{{$acabado->id}}" value="{{$acabado->abreviatura}},{{$acabado->nombre}}" @if($producto->marca == $marca->abreviatura)selected="selected" @endif>{{$acabado->nombre}},</option>
		    						@endforeach	
			    				</select>
			    				</div>
			    				<div class="form-group col-xs-4">
			  					<label class="control-label" for="medida1"><i class="fa fa-asterisk" aria-hidden="true"></i>Medida 1:</label>
			  					<input type="text" class="form-control" id="medida1" name="medida1" required onkeyup="f_corta()" value="{{$producto->medida1}}">
			  					<label class="control-label" for="unidades">Unidades:</label>
			    					<select type="select" {{-- value="{{$producto->unidad1}}" --}} name="unidad1" class="form-control" id="unidad1">
			    						@foreach ($unidades as $unidad)
			    							{{-- expr --}}
			    							<option id="{{$unidad->id}}" value="{{$unidad->abreviatura}}"  @if($producto->unidad1 == $unidad->abreviatura)selected="selected" @endif>{{$unidad->nombre}}</option>
			    						@endforeach
				    				</select>
			    				</div>
			    				<div class="form-group col-xs-4">
			  					<label class="control-label" for="medida2">Medida 2:</label>
			  					<input type="text" class="form-control" id="medida2" name="medida2" value="{{$producto->medida2}}">
			  					<label class="control-label" for="unidades">Unidades</label>
			    					<select type="select" name="unidad2" class="form-control" id="unidad2" onchange="medida2(this)">
			    						@foreach ($unidades as $unidad)
			    							{{-- expr --}}
			    							<option id="{{$unidad->id}}" value="{{$unidad->abreviatura}}" selected="selected">{{$unidad->nombre}}</option>
			    						@endforeach
				    				</select>	
			    				</select>
			    				</div>
			    				<div class="form-group col-xs-4">
			  					<label class="control-label" for="medida3">Medida 3:</label>
			  					<input type="text" class="form-control" id="medida3" name="medida3" value="{{$producto->medida3}}">
			  					<label class="control-label" for="unidades">Unidades</label>
			    					<select type="select" name="unidad3" class="form-control" id="unidad3" onchange="medida1(this)">
			    						@foreach ($unidades as $unidad)
			    							{{-- expr --}}
			    							<option id="{{$unidad->id}}" value="{{$unidad->abreviatura}}" selected="selected">{{$unidad->nombre}}</option>
			    						@endforeach
				    				</select>	
			    				</select>
			    				</div>	  					
			    				<div class="form-group col-xs-5">
			  						<label class="control-label" for="corta"><i class="fa fa-asterisk" aria-hidden="true"></i> Descripción corta:</label>
			  						<input type="text" class="form-control" id="corta_id" name="descripcion_short" required readonly="" value="{{$producto->descripcion_short}}">
			  					</div>
			    				<div class="form-group col-xs-7">
			  						<label class="control-label" for="descripcion"><i class="fa fa-asterisk" aria-hidden="true"></i> Descripción Larga:</label>
			  						<textarea class="form-control" id="descripcion" name="descripcion_large" required readonly="">"{{$producto->descripcion_large}}"
			  							</textarea>
			  					</div>
			  					<div class="form-group col-xs-5">
			  						<label class="control-label" for="sat">Clave Sat:</label>
			  						<input type="text" class="form-control" id="sat" name="sat">
			  					</div>
			    			<div class="form-group col-xs-7">
			  						<label class="control-label" for="descripcion_sat">Descripción SAT:</label>
			  						<textarea class="form-control" id="descripcion_sat" name="descripcion_sat" >
			  							</textarea>
			  					</div>
			  				</div>

						</div>
					</div>
		</div>
	</form>
	</div>
	<script>
		function sub(){
			a=document.getElementById("marca").value;
			b=document.getElementById("clave").value;
			b=b.toUpperCase(b);
			document.getElementById("id_auto").value=a+b;
			
		}
		
		function f_corta(){
			familia=document.getElementById("familia_id").value;
			var ar_familia=familia.split(",");
			tipo=document.getElementById("tipo").value;
			var ar_tipo=tipo.split(",");
			subtipo=document.getElementById("subptipo").value;
			var ar_subtipo=subtipo.split(",");
			medida=document.getElementById("medida1").value;
			medida=medida.toUpperCase(medida);
			modelo=document.getElementById("modelo_id").value;
			modelo=modelo.toUpperCase(modelo);
			presentacion=document.getElementById("presentacion").value;
			var ar_presentacion=presentacion.split(",");
			calidad=document.getElementById("calidad").value;
			var ar_calidad=calidad.split(",");
			acabado=document.getElementById("acabado").value;
			var ar_acabado= acabado.split(",");
			document.getElementById("corta_id").value=ar_familia[0]+ar_tipo[0]+ar_subtipo[0]+medida+modelo+ar_presentacion[0]+ar_calidad[0]+ar_acabado[0];
			document.getElementById("descripcion").value=ar_familia[1]+", "+ar_tipo[1]+", "+ar_subtipo[1]+ ", "+ medida + ", "+modelo+ ", "+ar_presentacion[1]+ ", "+ar_calidad[1]+ ", "+ar_acabado[1];

		}
	</script>
	
	@endsection

