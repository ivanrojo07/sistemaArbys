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
                    <div class="col-sm-4 text-center">
                        <a class="btn btn-success" href="{{ route('usuario.create') }}"><strong><i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar Usuario</strong></a>
                    </div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
                    <div class="col-sm-12">
                        <table class="table table-hover table-striped table-bordered" style="margin-bottom: 0;">
                            <tr class="info">
                                <th>Perfil</th>
                                <th class="col-sm-3">Nombre</th>
                                <th>Area</th>
                                <th>Puesto</th>
                                <th class="text-center col-sm-3">Acciones</th>
                            </tr>
                            @foreach($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->perfil->nombre }}</td>
                                <td>{{ $usuario->nombre . ' ' . $usuario->appaterno . ' ' . $usuario->apmaterno }}</td>
                                <td>{{ $usuario->area->nombre }}</td>
                                <td>{{ $usuario->puesto->nombre }}</td>
                                <td class="text-center">
                                    <form method="post" action="{{ route('usuario.destroy', ['id' => $usuario->id]) }}" style="">
                                        <a class="btn btn-primary btn-sm" href="{{ route('usuario.show', ['id' => $usuario->id]) }}"><i class="fa fa-eye" aria-hidden="true"></i><strong> Ver</strong></a>
                                        <a class="btn btn-warning btn-sm" href="{{ route('usuario.edit', ['id' => $usuario->id]) }}"><i class="fa fa-pencil" aria-hidden="true"></i><strong> Editar</strong></a>
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash" aria-hidden="true"></i><strong> Borrar</strong></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection