@extends('layouts.app')

@section('content')
<div class="row-8">
		<table class="table">
			<thead>
				<th>Nombre</th>
				<th>Tipo de cliente</th>
				<th>RFC</th>
				<th>Correo</th>
				<th>Operacion</th>
			</thead>
			@foreach($personals as $personal)
				<tbody>
					<td>{{$personal->nombre}} {{ $personal->apellidopaterno }} {{ $personal->apellidomaterno }}</td>
					<td>{{ $personal->tipo }}</td>
					<td>{{ strtoupper($personal->rfc) }}</td>
					<td>{{$personal->mail}}</td>
					<td>
						@if ( $personal->tipo == 'Cliente')
							<a type="button" class="btn btn-primary btn-xs" href="{{ url('datoslaborales/create') }}">Datos Laborales</a>
						<a type="button" class="btn btn-primary btn-xs" href="{{ url('referenciapersonales') }}">Referencias Personales</a>
						<a type="button" class="btn btn-primary btn-xs" href="{{ url('beneficiarios') }}">Datos Beneficiarios</a>
						@endif
						@if ($personal->tipo == 'Prospecto')
							<a type="button" class="btn btn-primary btn-xs">Ventas Frio</a>
						@endif
					<a type="button" class="btn btn-primary btn-xs">Productos</a>
					</td>
				</tbody>
			@endforeach
		</table>
		{!!$personals->render()!!}
</div>
@endsection