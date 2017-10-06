@extends('layouts.app')
	@section('content')
	<div class="container theme-showcase">
		<div class="jumbotron">
			<p>Aún no tienes beneficiarios</p>
        	<a type="button" class="btn btn-sm btn-success" href="{{ route('beneficiarios.create') }}">Agregar</a>
      	</div>
		
	</div>
	
	@endsection