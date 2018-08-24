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
        <form action="{{ route('usuario.store') }}" method="post">    
        {{ csrf_field() }}
            <div class="panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label class="control-label">*Nombre de Usuario:</label>
                            <input type="text" name="name" class="form-control" required="">
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="control-label">*Correo:</label>
                            <input type="text" name="email" class="form-control" required="">
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="control-label">*Contraseña:</label>
                            <input type="text" name="password" class="form-control" required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label class="control-label">*Nombre:</label>
                            <input type="text" name="nombre" class="form-control" required="">
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="control-label">*Apellido Paterno:</label>
                            <input type="text" name="appaterno" class="form-control" required="">
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="control-label">Apellido Materno:</label>
                            <input type="text" name="apmaterno" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label class="control-label">*Perfil:</label>
                            <select class="form-control" name="perfil_id" required="">
                                <option selected="">Seleccionar</option>
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
                                <option value="{{ $perfil->id }}">{{ $perfil->nombre }}</option>
                                @endif
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="control-label">*Puesto:</label>
                            <select class="form-control" name="puesto_id" required="">
                                <option selected="">Seleccionar</option>
                                @foreach($puestos as $puesto)
                                <option value="{{ $puesto->id }}">{{ $puesto->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="control-label">*Area:</label>
                            <select class="form-control" name="area_id" required="">
                                <option selected="">Seleccionar</option>
                                @foreach($areas as $area)
                                <option value="{{ $area->id }}">{{ $area->nombre }}</option>
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