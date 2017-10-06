@extends('layouts.app')
	@section('content')
	<div class="container theme-showcase">
		<div class="jumbotron">
			<p>Aún no tienes referencias personales</p>
        	<a type="button" class="btn btn-sm btn-success" href="{{ route('referenciapersonales.create') }}">Agregar</a>
      	</div>
		
	</div>
	
	@endsection