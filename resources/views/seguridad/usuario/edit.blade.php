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
        </div>
        <form action="{{ route('usuario.update', ['id' => $usuario->id]) }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <div class="panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label class="control-label">*Empleado:</label>
                            <select class="form-control" name="empleado_id" required="">
                                <option selected="">Seleccionar</option>
                                @foreach($empleados as $empleado)
                                @if($empleado == $usuario->empleado || $empleado->user == null)
                                <option value="{{ $empleado->id }}"{{ $empleado == $usuario->empleado ? ' selected=""' : ''}}>{{ $empleado->nombre . " " . $empleado->appaterno . " - " . $empleado->rfc }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="control-label">*Nombre de Usuario:</label>
                            <input type="text" name="name" class="form-control" value="{{ $usuario->name }}" required="">
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="control-label">Correo:</label>
                            <input type="text" name="email" class="form-control" placeholder="Dejar en blanco para no cambiar." value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label class="control-label">Contraseña:</label>
                            <input type="text" name="password" class="form-control" placeholder="Dejar en blanco para no cambiar." value="">
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="control-label">*Perfil:</label>
                            <select class="form-control" name="perfil_id" required="">
                                <option>Seleccionar</option>
                                @foreach($perfiles as $perfil)
                                @if($perfil->id == 1)
                                @else
                                <?php $seguridad = false; ?>
                                @foreach($perfil->modulos as $modulo)
                                @if($modulo->nombre == "seguridad")
                                <?php $seguridad = true; ?>
                                @endif
                                @endforeach
                                @if(Auth::user()->perfil->id != 1 && $seguridad)
                                @else
                                <option value="{{ $perfil->id }}"{{ $perfil->id == $usuario->perfil_id ? ' selected' : '' }}>{{ $perfil->nombre }}</option>
                                @endif
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-4 text-center">
                            <button type="submit" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Guardar</button>
                        </div>
                    </div>
                </div>
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <h4><small><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small> Campos Requeridos</small></small></h4>
                        </div>
                    </div>
                </div>
            </div>
        </form>
	</div>
</div>

@endsection