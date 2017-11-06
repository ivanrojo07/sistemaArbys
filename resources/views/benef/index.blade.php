@extends('layouts.infopersonal')
	@section('personal')
	<ul role="tablist" class="nav nav-tabs nav-pills nav-justified">
      <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="#">Dirección/Domicilio:</a></li>
      <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="" class="ui-tabs-anchor">Datos Laborales:</a></li>
      <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="" class="ui-tabs-anchor">Referencias Personales:</a></li>
      <li class="active"><a href="" class="ui-tabs-anchor">Datos de Beneficiarios:</a></li>
      <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="" class="ui-tabs-anchor">Productos:</a></li>
      <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="" class="ui-tabs-anchor">C.R.M.:</a></li>
    </ul>
    <div class="panel-default">
    	<div class="panel-heading">Datos de Beneficiarios</div>
    	<div class="panel-body">
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