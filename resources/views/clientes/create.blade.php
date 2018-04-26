@extends('layouts.blank')
	@section('content')
		<div class="row" id="tab">
			<form role="form" id="form-cliente" method="POST" action="{{ route('clientes.store') }}" >
				{{ csrf_field() }}
				<div role="application" class="panel panel-group" >
					<div class="panel-default">
						<div class="panel-heading"><h4><strong>Datos del cliente:</strong> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-asterisk" aria-hidden="true"></i>
					Campos Requeridos</h4> 
						</div>
						<div class="panel-body">

							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="tipopersona"><i class="fa fa-asterisk" aria-hidden="true"></i>Tipo de Persona:</label>
			    					<select type="select" name="tipopersona" class="form-control" id="tipopersona" onchange="persona(this)">
			    						<option id="Fisica" value="Fisica">Fisica</option>
			    						<option id="Moral" value="Moral">Moral</option>
			    					</select>
			  					</div>	
			  					
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="identificador"><i class="fa fa-asterisk" aria-hidden="true"></i>ID:</label>
			  						<input type="text" class="form-control" id="identificador" name="identificador" placeholder="Identificador" required>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="control-label" for="rfc"><i class="fa fa-asterisk" aria-hidden="true"></i> RFC:</label>
									<input type="text" class="form-control" id="varrfc" name="rfc" required minlength="12" maxlength="13" pattern="^[A-Za-z]{4}[0-9]{6}[A-Za-z0-9]{3}" placeholder="Ingrese 13 caracteres" title="Siga el formato 4 letras seguidas por 6 digitos y 3 caracteres">
								</div>
								
			  					
							</div>

							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i> Nombre(s):</label>
			  						<input type="text" class="form-control" id="idnombre" name="nombre" >
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="apellidopaterno"><i class="fa fa-asterisk" aria-hidden="true"></i> Apellido Paterno:</label>
			  						<input type="text" class="form-control" id="apellidopaterno" name="apellidopaterno"  >
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
			  						<input type="text" class="form-control" id="apellidomaterno" name="apellidomaterno">
			  					</div>
			  					
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="permoral" style="display:none;">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">

			  						<label class="control-label" for="razonsocial"><i class="fa fa-asterisk" aria-hidden="true"></i> Razon Social:</label>
			  						<input type="text" class="form-control" id="razonsocial" name="razonsocial">
			  					</div>
			  					
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="control-label" for="mail"><i class="fa fa-asterisk" aria-hidden="true"></i> Correo:</label>
									<input type="email" class="form-control" id="mail" name="mail"  placeholder="E-mail" required>
								</div>
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="telefono">Telèfono:</label>
			  						<input type="text" class="form-control" id="telefono" name="telefono" pattern="+[0-9]">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="telefonocel"><i class="fa fa-asterisk" aria-hidden="true"></i>Telèfono Celular:</label>
			  						<input type="text" class="form-control" id="telefonocel" name="telefonocel" pattern="+[0-9]" required>
			  					</div>
							</div>	

							

						</div>
					</div>
					

			
					<div class="panel-default">
						<div class="panel-heading"><strong>Direcciòn:</strong></div>
						<div class="panel-body">
							<div class="col-md-12 offset-md-2 mt-3" id="direccion1">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="calle"><i class="fa fa-asterisk" aria-hidden="true"></i> Calle:</label>
			    					<input type="text" class="form-control" id="calle" name="calle" required>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numext"><i class="fa fa-asterisk" aria-hidden="true"></i> Numero exterior:</label>
			    					<input type="text" class="form-control" id="numext" name="numext" required>
			  					</div>	
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numinter">Numero interior:</label>
			    					<input type="text" class="form-control" id="numinter" name="numinter">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="cp" id="lbl_cp"><i class="fa fa-asterisk" aria-hidden="true"></i> Código Postal:</label>
								<input type="text" class="form-control" id="cp" name="cp" required="">
							</div>
			  					
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="direccion2">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="colonia"><i class="fa fa-asterisk" aria-hidden="true"></i> Colonia:</label>
			  						<input type="text" class="form-control" id="colonia" name="colonia" required>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="municipio"><i class="fa fa-asterisk" aria-hidden="true"></i> Delegación o Municipio:</label>
			  						<input type="text" class="form-control" id="municipio" name="municipio" required>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ciudad"><i class="fa fa-asterisk" aria-hidden="true"></i> Ciudad:</label>
			  						<input type="text" class="form-control" id="ciudad" name="ciudad" required>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="estado"><i class="fa fa-asterisk" aria-hidden="true"></i> Estado:</label>
			  						<input type="text" class="form-control" id="estado" name="estado" required>
			  					</div>
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="direccion3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="calle1">Entre calle:</label>
			  						<input type="text" class="form-control" id="calle1" name="calle1">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="calle2">Y calle:</label>
			  						<input type="text" class="form-control" id="calle2" name="calle2">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="referencia">Referencia:</label>
			  						<input type="text" class="form-control" id="referencia" name="referencia">
			  					</div>
							</div>
	  				
						</div>
					</div>

					<div class="panel-default">
						<div class="panel-heading"><strong>Datos de Cotizaciòn:</strong></div>
						<div class="panel-body">

							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="identificador">Folio:(Automàtico)</label>
			  						<input type="text" class="form-control" id="id_auto" name="folio" readonly="" placeholder="Automàtico">
			  					</div>
			  					
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ingresos"><i class="fa fa-asterisk" aria-hidden="true"></i>Ingresos Mensuales:</label>
			  						<input type="text" class="form-control" id="ingresos" name="ingresos" placeholder="$---" required>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  				<label class="control-label" for="canalventa">Canal de Venta:</label>
									<select type="select" class="form-control" id="canalventa" name="canalventa">
										<option value="" selected="selected">Seleccionar</option>
										@foreach($canalventas as $canalventa)
			    						<option value="{{$canalventa->nombre}}">{{$canalventa->nombre}}</option>
			    						@endforeach
			    						
			    					</select>
								
								</div>

			  				</div>
			  				<div class="col-md-12 offset-md-2 mt-3">
								
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  				<label class="control-label" for="promocion">Promociòn:</label>
									<select type="select" class="form-control" id="promocion" name="promocion">
										<option value="" selected="selected">Seleccionar</option>
			    						<option value="Prom1">Promociòn 1</option>
			    						<option value="Prom2">Promociòn 2</option>
			    						<option value="Prom3">Promociòn 3</option>
			    					</select>
								
								</div>
								
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="objetivo">Objetivo Mensual</label>
			  						<input type="text" class="form-control" id="objetivo" name="objetivo"  placeholder="Objetivo Mensual">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  				<label class="control-label" for="calificacion"><i class="fa fa-asterisk" aria-hidden="true"></i>Calificaciòn:</label>
									<select type="select" class="form-control" id="calificacion" name="calificacion">
										<option value="" selected="selected">Seleccionar</option>
			    						<option value="30">30</option>
			    						<option value="60">60</option>
			    						<option value="90">90</option>
			    					</select>
								
								</div>
			  					
			  				</div>

			  				<div class="col-md-12 offset-md-2 mt-3">
								
			  					
								
								<div class="form-group col-xs-8">
						<label class="control-label" for="comentarios" id="lbl_oper">Comentarios:</label>
						<textarea class="form-control" id="comentarios" name="comentarios" maxlength="500"></textarea>
					</div>
					<div class="form-group col-xs-8">
					 <button  type="submit" class="btn btn-success"><strong>Guardar</strong></button>
				</div>
			  				
			  				</div>
			  				
			  					
						</div>
						</div>	
					
					</div>
  				</div>
					</form>		
			
		</div>


<script>
		function sub(){
			a=document.getElementById("ingresos").value;
			b=document.getElementById("canalventa").value;
			b=b.toUpperCase(b);
			a=a.toUpperCase(a);
			document.getElementById("id_auto").value=a;
			
		}

	$(document).ready(function(){
    $("input").keyup(function(){
      a=document.getElementById("varrfc").value;
			b=document.getElementById("identificador").value;
			b=b.toUpperCase(b);
			a=a.toUpperCase(a);
			document.getElementById("id_auto").value=a+b;
    });
});
		
		// function f_corta(){
		// 	familia=document.getElementById("familia_id").value;
		// 	var ar_familia=familia.split(",");
		// 	tipo=document.getElementById("tipo").value;
		// 	var ar_tipo=tipo.split(",");
		// 	subtipo=document.getElementById("subptipo").value;
		// 	var ar_subtipo=subtipo.split(",");
		// 	medida=document.getElementById("medida1").value;
		// 	medida=medida.toUpperCase(medida);
		// 	modelo=document.getElementById("modelo_id").value;
		// 	modelo=modelo.toUpperCase(modelo);
		// 	presentacion=document.getElementById("presentacion").value;
		// 	var ar_presentacion=presentacion.split(",");
		// 	calidad=document.getElementById("calidad").value;
		// 	var ar_calidad=calidad.split(",");
		// 	acabado=document.getElementById("acabado").value;
		// 	var ar_acabado= acabado.split(",");
		// 	document.getElementById("corta_id").value=ar_familia[0]+ar_tipo[0]+ar_subtipo[0]+medida+modelo+ar_presentacion[0]+ar_calidad[0]+ar_acabado[0];
		// 	document.getElementById("descripcion").value=ar_familia[1]+", "+ar_tipo[1]+", "+ar_subtipo[1]+ ", "+ medida + ", "+modelo+ ", "+ar_presentacion[1]+ ", "+ar_calidad[1]+ ", "+ar_acabado[1];

		// }
	</script>


	@endsection