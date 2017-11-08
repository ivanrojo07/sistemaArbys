@extends('layouts.app')

@section('content')
<div class="container">
	<div class="panel-body">
		<div class="col-lg-6">
			<form action="/personal">
				<div class="input-group">
					<input type="text" name="query" class="form-control" placeholder="Buscar...">
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit"> <i class="fa fa-search" aria-hidden="true"></i> </button>
					</span>
		<div>
			<div class="col-xs-2">
			
				<input id="boton-toggle" href="/clientes" type="checkbox" data-toggle="toggle" data-on="Sí" data-off="No" data-style="ios" checked="true" id="tgCliente"><label>&nbsp;&nbsp;&nbsp;Clientes
			</label>
		</div>
		<div  class="col-xs-2">
				<input href="/prospectos" id="boton-toggle" type="checkbox" data-toggle="toggle" data-on="Sí" data-off="No" data-style="ios" checked="true" id="tgProspecto"><label>&nbsp;&nbsp;&nbsp;Prospectos
			</label>
		</div>
				</div>

					
			</form>
		</div>
		
	</div>
	<div class="jumbotron">
		<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
			<thead>
				<tr class="info">
					<th>@sortablelink('nombre', 'Nombre'){{-- Nombre --}}</th>
					<th>@sortablelink('tipopersona', 'Tipo de persona')</th>
					<th>@sortablelink('tipo', 'Tipo de cliente')</th>
					<th>@sortablelink('rfc', 'RFC')</th>
					<th>@sortablelink('mail', 'Correo') </th>
					<th>Operacion</th>
				</tr>
			</thead>
			@foreach($personals as $personal)
				<tr class="active">
					<td>
						@if ($personal->tipopersona == "Fisica")
						{{$personal->nombre}} {{ $personal->apellidopaterno }} {{ $personal->apellidomaterno }}
						@else
						{{$personal->razonsocial}}
						@endif
					</td>
					<td>{{ $personal->tipopersona }}</td>
					<td>{{ $personal->tipo }}</td>
					<td>{{ strtoupper($personal->rfc) }}</td>
					<td>{{$personal->mail}}</td>
					<td>
						<a class="btn btn-success btn-sm" href="{{ route('personals.show',$personal) }}"><i class="fa fa-eye" aria-hidden="true"></i> Ver</a>
						<a class="btn btn-info btn-sm" href="{{ route('personals.edit', $personal) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
				</tr>
					</td>
				</tbody>
			@endforeach
		</table>
	</div>
	{{ $personals->links() }}
</div>
@endsection