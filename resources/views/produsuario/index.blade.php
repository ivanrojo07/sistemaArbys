@extends('layouts.blank')
	@section('content')
	<div class="container theme-showcase">
		<div class="jumbotron">
			<p>Aún no tienes Productos</p>
        	<a type="button" class="btn btn-sm btn-success" href="{{ route('prodpersonal.create') }}">Agregar</a>
      	</div>
		
	</div>
	
	@endsection