@extends('layouts.infopersonal')
	@section('personal')
	<ul role="tablist" class="nav nav-tabs">
	    <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.show',['personal'=>$personal]) }}" class="">Dirección/Domicilio:</a></li>
	    @if ($personal->tipo == 'Cliente')
	    <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.datoslaborales.index',['personal'=>$personal]) }}" class="">Datos Laborales:</a></li>
	    <li class="active"><a href="{{ route('personals.referenciapersonales.index',['personal'=>$personal]) }}" class="">Referencias Personales:</a></li>
	    <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.datosbeneficiario.index',['personal'=>$personal]) }}" class="">Datos de Beneficiarios:</a></li>
	    @endif
	    <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.producto.index',['personal'=>$personal]) }}" class="">Productos:</a></li>
	    <li class=""><a href="{{ route('personals.product.index',['personal'=>$personal]) }}" class="">Productos seleccionados:</a></li>
	    <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.crm.index',['personal'=>$personal]) }}" class="">C.R.M.:</a></li>
  	</ul>
	<div class="panel-default">
		<div class="panel-heading">Referencias Personales</div>
		<div class="panel-body">
			@if (count($refpersonals) == 0)
				<p>Aún no tienes referencias personales</p>
			@endif
			@if (count($refpersonals) != 0)
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
							@if ($personal->tipopersona == "Fisica")
							<td>{{$personal->nombre}} {{ $personal->apellidopaterno }} {{ $personal->apellidomaterno }}</td>
							@else
							<td>{{$personal->razonsocial}}</td>
							@endif
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