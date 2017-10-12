@extends('layouts.app')
	@section('content')
	<div class="container theme-showcase">
		<div class="jumbotron">
			<h2><span class="label label-default">Datos Beneficiarios:</span></h2>
			{{-- {{dd(count($beneficiarios))}} --}}
			@if (count($beneficiarios) == 0)
				<p>Aún no tienes beneficiarios</p>
			@endif
			@if (count($beneficiarios) !=0)
			<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
					<thead>
						<tr class="info">
							<th>Nombre del cliente</th>
							<th>Nombre del beneficiario</th>
							<th>Telefono</th>
							<th>Parentesco</th>
							<th>Operaciones</th>
						</tr>
					</thead>
					@foreach ($beneficiarios as $beneficiario)
						<tr class="active">
							<td>{{$personal->nombre}} {{ $personal->apellidopaterno }} {{ $personal->apellidomaterno }}</td>
							<td>{{ $beneficiario->nombreben }} {{$beneficiario->apepatben}} {{$beneficiario->apematben}}</td>
							<td>{{ $beneficiario->telefonoben }}</td>
							<td>{{$beneficiario->parentescoben}}</td>
							<td>
								<a class="btn btn-success btn-sm" href="{{ route('personals.datosbeneficiario.show',[$personal,$beneficiario]) }}">Ver</a>
								<a class="btn btn-info btn-sm" href="{{ route('personals.datosbeneficiario.edit',[$personal,$beneficiario]) }}">Editar</a>
						</tr>
							</td>
						</tbody>
					@endforeach
				</table>
			@endif
			<a type="button" class="btn btn-sm btn-success" href="{{ route('personals.datosbeneficiario.create', $personal) }}">Agregar</a>
      	</div>
		
	</div>
	
	@endsection