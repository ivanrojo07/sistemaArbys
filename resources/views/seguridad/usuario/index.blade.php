@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Usuarios:</h4>
					</div>
                    @foreach(Auth::user()->perfil->componentes as $componente)
                        @if($componente->nombre == 'crear usuario')
                            <div class="col-sm-4 text-center">
                                <a class="btn btn-success" href="{{ route('usuarios.create') }}">
                                    <i class="fa fa-plus"></i><strong> Agregar Usuario</strong>
                                </a>
                            </div>
                        @endif
                    @endforeach
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
                    <div class="col-sm-12">
                        @if(count($usuarios) > 0)
                            <table class="table table-hover table-striped table-bordered" style="margin-bottom: 0;">
                                <tr class="info">
                                    <th class="col-sm-1" >Perfil</th>
                                    <th class="col-sm-3">Nombre</th>
                                    <th class="col-sm-2">Correo</th>
                                    <th class="col-sm-3">Puesto</th>
                                    <th class="text-center col-sm-3">Acciones</th>
                                </tr>
                                @foreach($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $usuario->perfil->nombre }}</td>
                                        <td>{{ $usuario->empleado->nombre . ' ' . $usuario->empleado->appaterno . ' ' . $usuario->empleado->apmaterno }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>{{ $usuario->empleado->laborales->last()->puesto->nombre }}</td>
                                        <td class="text-center">
                                            @foreach(Auth::user()->perfil->componentes as $componente)
                                                @if($componente->nombre == 'ver usuario')
                                                    <a class="btn btn-primary btn-sm" href="{{ route('usuarios.show', ['usuario' => $usuario]) }}">
                                                        <i class="fa fa-eye"></i> Ver
                                                    </a>
                                                @endif
                                                @if($componente->nombre == 'editar usuario')
                                                    <a class="btn btn-warning btn-sm" href="{{ route('usuarios.edit', ['usuario' => $usuario]) }}">
                                                        <i class="fa fa-pencil"></i> Editar
                                                    </a>
                                                @endif
                                                @if($componente->nombre == 'eliminar usuario')
                                                    <form method="post" action="{{ route('usuarios.destroy', ['usuario' => $usuario]) }}" style="display: inline;">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-danger btn-sm" type="submit">
                                                            <i class="fa fa-times"></i> Eliminar
                                                        </button>
                                                    </form>
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <h4>No hay usuarios disponibles.</h4>
                        @endif
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection