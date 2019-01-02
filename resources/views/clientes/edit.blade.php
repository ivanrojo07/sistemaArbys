@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Datos del Cliente:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a href="{{ route('clientes.create') }}" class="btn btn-success">
							<i class="fa fa-plus"></i><strong> Agregar Cliente</strong>
						</a>
					</div>
					<div class="col-sm-4 text-center">
						<a href="{{ route('clientes.index') }}" class="btn btn-primary">
							<i class="fa fa-bars"></i><strong> Lista de Clientes</strong>
						</a>
					</div>
				</div>
			</div>
		</div>
		<form method="POST" action="{{ route('clientes.update', ['cliente' => $cliente]) }}">
        	<input type="hidden" name="_method" value="PUT">
			{{ csrf_field() }}
			<div class="panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-3 form-group">
							<label class="control-label">Tipo de Persona:</label>
							<select type="select" name="tipo" class="form-control" id="tipopersona" onchange="persona(this)">
	    						<option id="Fisica" value="Fisica">Física</option>
							</select>
						</div>
						<div class="col-sm-3 form-group" id="rfcf">
							<label class="control-label">✱RFC:</label>
							<input type="text" class="form-control" id="rfc" name="rfc" value="{{ $cliente->rfc }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">✱Fecha de Nacimiento:</label>
		  					<input type="date" class="form-control" id="fecha_nacimiento" name="nacimiento" required value="{{ $cliente->nacimiento }}">
						</div>
						<div id="perfisica">
							<div class="col-sm-3 form-group">
								<label class="control-label">✱Nombre:</label>
		  						<input type="text" class="form-control" id="idnombre" name="nombre" value="{{ $cliente->nombre }}">
							</div>
							<div class="col-sm-3 form-group">
								<label class="control-label">✱Apellido Paterno:</label>
		  						<input type="text" class="form-control" id="apellidopaterno" name="appaterno"  value="{{ $cliente->appaterno }}">
							</div>
							<div class="col-sm-3 form-group">
								<label class="control-label">Apellido Materno:</label>
		  						<input type="text" class="form-control" id="apellidomaterno" name="apmaterno" value="{{ $cliente->apmaterno }}">
							</div>
						</div>
						<div class="col-sm-3 form-group" id="permoral" style="display: none;">
							<label class="control-label">✱Razónn Social:</label>
	  						<input type="text" class="form-control" id="razonsocial" name="razon" value="{{ $cliente->razon }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">✱Correo Electrónico:</label>
							<input type="email" class="form-control" id="mail" name="email" required value="{{ $cliente->email }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Teléfono:</label>
							<input type="number" class="form-control" id="telefono" name="telefono" pattern="+[0-9]" value="{{ $cliente->telefono }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Teléfono Celular:</label>
							<input type="number" class="form-control" id="telefonocel" name="movil" pattern="+[0-9]" required value="{{ $cliente->movil }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label" for="canal_ventas">✱Canal de Ventas:</label>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon3" onclick='getCanales()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
		    					<select type="select" name="canal_ventas" class="form-control" id="canal_ventas" required>
		    						<option  value="">Seleccionar</option>
		    						@foreach($canal_ventas as $canal)
		    						<option  value="{{ $canal->nombre }}" @if($cliente->canal_ventas==$canal->nombre)
		    						selected="selected" 
		    						@endif>{{ $canal->nombre }}</option>
		    						@endforeach
		    					</select>
						   </div>
						</div>
						<div class="col-sm-6 form-group">
							<label class="control-label">Comentarios:</label>
		  					<textarea class="form-control" name="comentarios">{{ $cliente->comentarios }}</textarea>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-sm-4 col-sm-offset-4 text-center">
			  				<button type="submit" class="btn btn-success">
				  				<i class="fa fa-check-circle"></i> Guardar
				  			</button>
						</div>
						<div class="col-sm-4 text-right text-danger">
							<h5>✱Campos Requeridos</h5>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

{{-- <script>
	function sub(){
		a = document.getElementById("ingresos").value;
		b = document.getElementById("canalventa").value;
		b = b.toUpperCase(b);
		a = a.toUpperCase(a);
		document.getElementById("id_auto").value=a;
		
	}

	$(document).ready(function(){
    	$("input").keyup(function(){
      		a = document.getElementById("varrfc").value;
			b = document.getElementById("identificador").value;
			b = b.toUpperCase(b);
			a = a.toUpperCase(a);
			document.getElementById("id_auto").value=a+b;
	    });
	});
</script> --}}

@endsection