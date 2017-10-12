@extends('layouts.app')
	@section('content')
	<div class="container theme-showcase">
		<div class="jumbotron">
			<h2><span class="label label-default">Datos Laborales:</span></h2>
			@if (!$refpersonals)
				<p>Aún no tienes referencias personales</p>
			@endif
			@if ($refpersonals)
			<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
					<thead>
						<tr class="info">
							<th>Nombre del cliente</th>
							<th>Nombre de la referecia</th>
							<th>Telefono</th>
							<th>Parentesco</th>
							<th>Operaciones</th>
						</tr>
					</thead>
					@foreach ($refpersonals as $refpersonal)
						<tr class="active">
							<td>{{$personal->nombre}} {{ $personal->apellidopaterno }} {{ $personal->apellidomaterno }}</td>
							<td>{{ $refpersonal->nombre }} {{$refpersonal->apepat}} {{$refpersonal->apemat}}</td>
							<td>{{ $refpersonal->telefono1 }}<br>{{$refpersonal->telefono2}}<br>{{$refpersonal->telefono3}}</td>
							<td>{{$refpersonal->parentesco}}</td>
							<td>
								<a class="btn btn-success btn-sm" href="{{ route('personals.referenciapersonales.show',[$personal,$refpersonal]) }}">Ver</a>
								<a class="btn btn-info btn-sm" href="{{ route('personals.referenciapersonales.edit',[$personal,$refpersonal]) }}">Editar</a>
						</tr>
							</td>
						</tbody>
					@endforeach
				</table>
			@endif
			<a type="button" class="btn btn-sm btn-success" href="{{ route('personals.referenciapersonales.create', $personal) }}">Agregar</a>
      	</div>
		
	</div>
	
	@endsection