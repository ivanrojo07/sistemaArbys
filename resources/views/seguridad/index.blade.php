@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-4 text-center">
						<h4>Seguridad</h4>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<a href="{{ route('perfil.index') }}"><button class="btn btn-primary"><strong>Perfiles</strong></button></a>
						<a href="{{ route('usuario.index') }}"><button class="btn btn-primary"><strong>Usuarios</strong></button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection