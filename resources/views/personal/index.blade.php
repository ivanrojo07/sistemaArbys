@extends('layouts.app')

@section('content')
<div class="row-8">
		<table class="table">
			<thead>
				<th>Nombre</th>
				<th>Correo</th>
				<th>Operacion</th>
			</thead>
			@foreach($personals as $personal)
				<tbody>
					<td>{{$personal->nombre}} {{ $personal->apellidopaterno }} {{ $personal->apellidomaterno }}</td>
					<td>{{$personal->mail}}</td>
					<td>
					
					</td>
				</tbody>
			@endforeach
		</table>
		{!!$personals->render()!!}
</div>
@endsection