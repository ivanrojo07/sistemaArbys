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
                        <a class="btn btn-success" href="{{ route('usuario.create') }}"><strong><i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar Usuario</strong></a>
                    </div>
                    @endif
                    @endforeach
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
                    <div class="col-sm-12">
                        @if($usuarios->last()->id == 1)
                        <h4>Aún no hay usuarios agregados.</h4>
                        @else
                        <table class="table table-hover table-striped table-bordered" style="margin-bottom: 0;">
                            <tr class="info">
                                <th class="col-sm-1" >Perfil</th>
                                <th class="col-sm-3">Nombre</th>
                                <th class="col-sm-2">Correo</th>
                                <th class="col-sm-3">Puesto</th>
                                <th class="text-center col-sm-3">Acciones</th>
                            </tr>
                            @forelse($usuarios as $usuario)
                            @if($usuario->perfil->id == 1)
                            @else
                            <?php $seguridad = false; ?>
                            @foreach($usuario->perfil->componentes as $componente)
                            @if($componente->modulo->nombre == "seguridad")
                            <?php $seguridad = true; ?>
                            @endif
                            @endforeach
                            @if(Auth::user()->perfil->id != 1 && $seguridad)
                            @else
                            <tr>
                                <td>{{ $usuario->perfil->nombre }}</td>
                                <td>{{ $usuario->empleado->nombre . ' ' . $usuario->empleado->appaterno . ' ' . $usuario->empleado->apmaterno }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $usuario->empleado->rfc }}</td>
                                <td class="text-center">
                                    <form method="post" action="{{ route('usuario.destroy', ['id' => $usuario->id]) }}" style="">
                                        @foreach(Auth::user()->perfil->componentes as $componente)
                                        @if($componente->nombre == 'ver usuario')
                                        <a class="btn btn-primary btn-sm" href="{{ route('usuario.show', ['id' => $usuario->id]) }}"><i class="fa fa-eye" aria-hidden="true"></i><strong> Ver</strong></a>
                                        @endif
                                        @if($componente->nombre == 'editar usuario')
                                        <a class="btn btn-warning btn-sm" href="{{ route('usuario.edit', ['id' => $usuario->id]) }}"><i class="fa fa-pencil" aria-hidden="true"></i><strong> Editar</strong></a>
                                        @endif
                                        @if($componente->nombre == 'eliminar usuario')
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash" aria-hidden="true"></i><strong> Borrar</strong></button>
                                        @endif
                                        @endforeach
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endif
                            @empty
                            <p>Nada</p>
                            @endforelse
                        </table>
                        @endif
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection