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
						<a href="{{ route('clientes.pago.create', ['id' => $cliente->id]) }}" class="btn btn-info">
							<strong>Pagos</strong>
						</a>
					</div>
					<div class="col-sm-4 text-center">
						<a href="{{ route('clientes.index') }}" class="btn btn-primary">
							<strong>Lista de Clientes</strong>
						</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-3 form-group">
						<label class="control-label">Tipo de Persona:</label>
						<input type="text" name="tipopersona" class="form-control" value="{{ $cliente->tipopersona }}" readonly="">
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label">ID:</label>
						<input type="text" name="identificador" class="form-control" value="{{ $cliente->identificador }}" readonly="">
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label">RFC:</label>
						<input type="text" name="rfc" class="form-control" value="{{ $cliente->rfc }}" readonly="">
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label">Fecha de Registro:</label>
						<input type="date" name="created_at" class="form-control" value="{{ substr($cliente->created_at, 0, 10) }}" readonly="">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 form-group">
						<label class="control-label">Nombre:</label>
						<input type="text" name="nombre" class="form-control" value="{{ $cliente->nombre }}" readonly="">
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label">Apellido Paterno:</label>
						<input type="text" name="apellidopaterno" class="form-control" value="{{ $cliente->apellidopaterno }}" readonly="">
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label">Apellido Materno:</label>
						<input type="text" name="apellidomaterno" class="form-control" value="{{ $cliente->apellidomaterno ? $cliente->apellidomaterno  : 'N/A' }}" readonly="">
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label">Fecha de Nacimiento:</label>
						<input type="date" name="fecha_nacimiento" class="form-control" value="{{ $cliente->fecha_nacimiento }}" readonly="">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 form-group">
						<label class="control-label">Correo Electrónico:</label>
						<input type="text" name="mail" class="form-control" value="{{ $cliente->mail }}" readonly="">
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label">Teléfono:</label>
						<input type="text" name="telefono" class="form-control" value="{{ $cliente->telefono ? $cliente->telefono : 'N/A' }}" readonly="">
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label">Teléfono Celular:</label>
						<input type="text" name="telefonocel" class="form-control" value="{{ $cliente->telefonocel }}" readonly="">
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label">Código Postal:</label>
						<input type="text" name="cp" class="form-control" value="{{ $cliente->cp }}" readonly="">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 form-group">
						<label class="control-label">Canal de Ventas:</label>
						<input type="text" name="canal_ventas" class="form-control" value="{{ $cliente->canal_ventas }}" readonly="">
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label">Fecha de Actualización:</label>
						<input type="text" name="updated_at" class="form-control" value="{{ substr($cliente->updated_at, 0, 10) }}" readonly="">
					</div>
					<div class="col-sm-6 form-group">
						<label class="control-label">Comentarios:</label>
						<textarea name="comentarios" class="form-control" readonly="">{{ $cliente->comentarios }}</textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 text-center">
						<a href="{{ route('clientes.edit', ['id' => $cliente->id]) }}" class="btn btn-warning">
							<strong>Editar</strong>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection