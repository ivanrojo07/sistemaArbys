@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col text-center">
						<h2>Acceso Denegado.</h2>
					</div>
				</div>
				<div class="row">
                    <div class="col-sm-12 text-center">
						Regresa <a href="{{ url()->previous() }}">aquí</a>.
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection