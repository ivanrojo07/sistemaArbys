@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Datos del Usuario:</h4>
					</div>
                    <div class="col-sm-4 text-center">
                        <a href="{{ route('usuario.index') }}"><button class="btn btn-primary"><strong><i class="fa fa-eye" aria-hidden="true"></i> Ver Usuarios</strong></button></a>
                    </div>
				</div>
			</div>
            <div class="panel-body">
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label class="control-label">Nombre de Usuario:</label>
                        <input type="text" name="usuario" class="form-control" value="{{ $usuario->name }}" readonly="">
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Correo:</label>
                        <input type="text" name="mail" class="form-control" value="{{ $usuario->email }}" readonly="">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label class="control-label">Nombre:</label>
                        <input type="text" name="nombre" class="form-control" value="{{ $usuario->nombre }}" readonly="">
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Apellido Paterno:</label>
                        <input type="text" name="appaterno" class="form-control" value="{{ $usuario->appaterno }}" readonly="">
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Apellido Materno:</label>
                        <input type="text" name="apmaterno" class="form-control" value="{{ $usuario->apmaterno }}" readonly="">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label class="control-label">Perfil:</label>
                        <input type="text" name="perfil" class="form-control" value="{{ $usuario->perfil->nombre }}" readonly="">
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Puesto:</label>
                        <input type="text" name="puesto" class="form-control" value="{{ $usuario->puesto->nombre }}" readonly="">
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Area:</label>
                        <input type="text" name="area" class="form-control" value="{{ $usuario->area->nombre }}" readonly="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4 text-center">
                        <a href="{{ route('usuario.edit', ['id' => $usuario->id]) }}"><button class="btn btn-warning"><i class="fa fa-check-pencil" aria-hidden="true"></i> Editar</button></a>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>

@endsection