@extends('layouts.blank')
	@section('content')
		<div class="row" id="tab">
			<form role="form" id="form-cliente" method="POST" action="{{ route('clientes.update',[
            'id'=>$cliente->id]) }}" >
            	<input type="hidden" name="_method" value="PUT">
				{{ csrf_field() }}
				<div role="application" class="panel panel-group" >
					<div class="panel-default">
						<div class="panel-heading"><h4><strong>Datos del cliente:</strong> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-asterisk" aria-hidden="true"></i>
					Campos Requeridos</h4> 
						</div>
						<div class="panel-body">

							<div class="row ">
								<div class="col-sm-2">
			    					<label class="control-label" for="tipopersona"><i class="fa fa-asterisk" aria-hidden="true"></i>Tipo de Persona:</label>
			    					<select type="select" name="tipopersona" class="form-control" id="tipopersona" onchange="persona(this)">

			    						<option id="Fisica" value="Fisica" 
			    						@if($cliente->tipopersona=='Fisica')
			    						selected="selected" 
			    						@endif>
			    						Fisica</option>
			    						<option id="Moral" value="Moral"
			    						@if($cliente->tipopersona=='Moral')
			    						selected="selected" 
			    						@endif>
			    						Moral</option>

			    					</select>
			  					</div>	
			  					
			  					<div class="col-sm-2">
			  						<label class="control-label" for="identificador"><i class="fa fa-asterisk" aria-hidden="true"></i>ID:</label>
			  						<input type="text" class="form-control" id="identificador" name="identificador" placeholder="Identificador" required
			  						value="{{$cliente->identificador}}">
			  					</div>
			  					<div class="col-sm-2" id="rfcf">
									<label class="control-label" for="rfc"><i class="fa fa-asterisk" aria-hidden="true"></i> RFC: (Automático)</label>
									<input type="text" class="form-control" id="rfc" name="rfc"  readonly value="{{$cliente->rfc}}">
								</div>
								<div class="col-sm-2" id="rfcm" style="display: none;">
									<label class="control-label" for="rfc"><i class="fa fa-asterisk" aria-hidden="true"></i> RFC: (Persona Moral)</label>
									<input type="text" class="form-control" id="rfc2" name="Moral">
								</div>
								<div class="col-sm-3">
			  						<label class="control-label" for="fecha_nacimiento"><i class="fa fa-asterisk" aria-hidden="true"></i>Fecha de Nacimiento:</label>
			  						<input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required value="{{$cliente->fecha_nacimiento}}">
			  					</div>
			  					
							</div><br>

							<div class="row " id="perfisica">
								<div class="col-sm-3">
			  						<label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i> Nombre(s):</label>
			  						<input type="text" class="form-control" id="idnombre" name="nombre" value="{{$cliente->nombre}}">
			  					</div>
			  					<div class="col-sm-3">
			  						<label class="control-label" for="apellidopaterno"><i class="fa fa-asterisk" aria-hidden="true"></i> Apellido Paterno:</label>
			  						<input type="text" class="form-control" id="apellidopaterno" name="apellidopaterno"  value="{{$cliente->apellidopaterno}}">
			  					</div>
			  					<div class="col-sm-3">
			  						<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
			  						<input type="text" class="form-control" id="apellidomaterno" name="apellidomaterno" value="{{$cliente->apellidomaterno}}">
			  					</div>
			  					
							</div>

							<div class="row" id="permoral" style="display:none;">
								<div class="col-sm-3">
									<label class="control-label" for="razonsocial"><i class="fa fa-asterisk" aria-hidden="true"></i> Razon Social:</label>
			  						<input type="text" class="form-control" id="razonsocial" name="razonsocial" value="{{$cliente->razonsocial}}">
			  					</div>
			  					
							</div><br>
							<div class="row">
								<div class="col-sm-3" >
									<label class="control-label" for="mail"><i class="fa fa-asterisk" aria-hidden="true"></i> Correo:</label>
									<input type="email" class="form-control" id="mail" name="mail"  placeholder="E-mail" required value="{{$cliente->mail}}"> 
								</div>
								<div class="col-sm-3">
			  						<label class="control-label" for="telefono">Telèfono:</label>
			  						<input type="number" class="form-control" id="telefono" name="telefono" pattern="+[0-9]" value="{{$cliente->telefono}}">
			  					</div>
			  					<div class="col-sm-3">
			  						<label class="control-label" for="telefonocel"><i class="fa fa-asterisk" aria-hidden="true"></i>Telèfono Celular:</label>
			  						<input type="number" class="form-control" id="telefonocel" name="telefonocel" pattern="+[0-9]" required value="{{$cliente->telefonocel}}">
			  					</div>
							</div><br>

							<div class="row">
								<div class="col-sm-3">
			    					<label class="control-label" for="canal_ventas"><i class="fa fa-asterisk" aria-hidden="true"></i>Canal de Ventas:</label>
			    					<div class="input-group">
						<span class="input-group-addon" id="basic-addon3" onclick='getCanales()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
			    					<select type="select" name="canal_ventas" class="form-control" id="canal_ventas" required>
			    						<option  value="">Seleccionar</option>
			    						@foreach($canal_ventas as $canal)
			    						<option  value="{{$canal->nombre}}" @if($cliente->canal_ventas==$canal->nombre)
			    						selected="selected" 
			    						@endif>{{$canal->nombre}}</option>
			    						@endforeach
			    					</select>
			    				   </div>
			  					</div>
			  					<div class="col-sm-2">
			  						<label class="control-label" for="cp"><i class="fa fa-asterisk" aria-hidden="true"></i>Código Postal:</label>
			  						<input type="number" class="form-control" id="cp" name="cp" pattern="+[0-9]" required value="{{$cliente->cp}}">
			  					</div>
			  					<div class="col-sm-2">
			  						<label class="control-label" for="fecha_actual"><i class="fa fa-asterisk" aria-hidden="true"></i>Fecha Actual:</label>
			  						<input type="date" class="form-control" id="fecha_actual" name="fecha_actual" value="{{date('Y-m-d')}}" readonly>
			  					</div>
			  					<div class="col-sm-4">
			  						<label class="control-label" for="comentarios"><i class="fa fa-asterisk" aria-hidden="true"></i>Comentarios:</label>
			  						<textarea class="form-control" name="comentarios" >{{$cliente->comentarios}}</textarea>
			  					</div>
							</div><br>
							<div class="row" >
							  <div class="col-sm-2">
								<button  type="submit" class="btn btn-success"><strong>Guardar</strong></button>
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