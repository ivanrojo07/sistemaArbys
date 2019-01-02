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
                    @foreach(Auth::user()->perfil->componentes as $componente)
                        @if($componente->nombre == 'indice usuarios')
                            <div class="col-sm-4 text-center">
                                <a href="{{ route('usuarios.index') }}" class="btn btn-primary">
                                    <i class="fa fa-bars"></i><strong> Lista de Usuarios</strong>
                                </a>
                            </div>
                        @endif
                    @endforeach
				</div>
			</div>
        </div>
        <form action="{{ route('usuarios.store') }}" method="post">    
            {{ csrf_field() }}
            <div class="panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label class="control-label">✱Empleado:</label>
                            <select class="form-control" name="empleado_id" required="">
                                <option selected="">Seleccionar</option>
                                @foreach($empleados as $empleado)
                                    <option value="{{ $empleado->id }}">{{ $empleado->nombre }} {{ $empleado->appaterno }} - {{ $empleado->rfc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="control-label">✱Nombre de Usuario:</label>
                            <input type="text" name="name" class="form-control" required="">
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="control-label">✱Contraseña:</label>
                            <input type="text" name="password" class="form-control" required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label class="control-label">✱Perfil:</label>
                            <select class="form-control" name="perfil_id" required="">
                                <option selected="">Seleccionar</option>
                                @foreach($perfiles as $perfil)
                                    <option value="{{ $perfil->id }}">{{ $perfil->nombre }}</option>
                                @endforeach
                            </select>
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

@endsection