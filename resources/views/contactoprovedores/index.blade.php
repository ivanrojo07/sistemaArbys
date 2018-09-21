@extends('layouts.infoprovedor')
	@section('cliente')
		<ul role="tablist" class="nav nav-tabs">
			<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab">
				<a href="{{ route('provedores.show',['provedore'=>$provedore]) }}">Dirección Fìsica:</a>
			</li>
			<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab">
				<a href="{{ route('provedores.direccionfisica.index',['provedore'=>$provedore]) }}">Dirección Fisica:</a>
			</li>
			<li class="active">
				<a href="{{ route('provedores.contacto.index',['provedore'=>$provedore]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a>
			</li>
			<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false">
				<a href="{{ route('provedores.datosgenerales.index',['cliente'=>$provedore]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Datos Generales:</a>
			</li>
			<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-4" aria-selected="false" aria-expanded="false">
				<a href="{{ route('provedores.datosbancarios.index', ['cliente' => $provedore]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-4">Datos Bancarios:</a>
			</li>
		</ul>
	<div class="panel panel-default">
		<div class="panel-heading">
			Contactos:
		</div>
		<div class="panel-body">
			<div class="form-group col-lg-offset-11">
				<a type="button" class="btn btn-success" href="{{ route('provedores.contacto.create',['provedore'=>$provedore]) }}">
			<strong>Agregar</strong>	</a>
			</div>
		@if ($contactos->count() == 0)
			<h3>Aún no tienes contactos</h3>
		@endif
		@if ($contactos->count() !=0)
			
		<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
				<thead>
					<tr class="info">
						<th>Nombre del contacto</th>
						<th>Telefono Directo</th>
						<th>Celular</th>
						<th>Correo Electronico</th>
						<th>Operaciones</th>
					</tr>
				</thead>
				@foreach ($contactos as $contacto)
					<tr class="active">
						<td>{{ $contacto->nombre }} {{$contacto->apater}} {{$contacto->amater}}</td>
						<td>{{$contacto->telefonodir}}</td>
						<td>{{$contacto->celular1}}</td>
						<td>{{$contacto->email1}}</td>
						<td>
							<a class="btn btn-success btn-sm" href="{{ route('provedores.contacto.show',['provedore'=>$provedore,'contacto'=>$contacto]) }}">
						<strong>Ver</strong>	</a>
							<a class="btn btn-info btn-sm" href="{{ route('provedores.contacto.edit',['provedore'=>$provedore,'contacto'=>$contacto]) }}">
						<strong>Editar</strong>	</a>
					</tr>
						</td>
					</tbody>
				@endforeach
			</table>
		@endif
		
		</div>
	</div>
		@endsection