@extends('layouts.blank')
@section('content')

<div class="container">
	<div role="application" class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Proveedores:</h4>
					</div>
					@foreach(Auth::user()->perfil->componentes as $cmp)
					@if($cmp->nombre == "crear proveedor")
					<div class="col-sm-4 text-center">
						<a class="btn btn-success" href="{{ route('provedores.create') }}">
							<strong>Agregar Proveedor</strong>
						</a>
					</div>
					@endif
					@endforeach
				</div>
			</div>
			<div id="datos" name="datos" class="panel-body">
				<div class="col-sm-12">
					@if(count($provedores) == 0)
						<h4>Aún no hay proveedores agregados.</h4>
					@else
					<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px">
						<tr class="info">
							<th>ID</th>
							<th>Nombre/Razón Social</th>
							<th>Tipo de persona</th>
							<th>RFC</th>
							<th>Alias</th>
							<th>Operacion</th>
						</tr>
						@foreach($provedores as $provedore)
							<tr>
								<td>{{ $provedore->id }}</td>
								<td>
									@if($provedore->tipopersona == "Fisica")
									{{ $provedore->nombre }} {{ $provedore->apellidopaterno }} {{ $provedore->apellidomaterno }}
									@else
									{{ $provedore->razonsocial }}
									@endif
								</td>
								<td>{{ $provedore->tipopersona }}</td>
								<td>{{ strtoupper($provedore->rfc) }}</td>
								<td>{{ $provedore->alias }}</td>
								<td class="text-center">
									@foreach(Auth::user()->perfil->componentes as $cmp)
										@if($cmp->nombre == "ver proveedor")
											<a class="btn btn-primary btn-sm" href="{{ route('provedores.show', ['provedor'=>$provedore]) }}">
												<i class="fa fa-eye" aria-hidden="true"></i> <strong>Ver</strong>
											</a>
										@endif
										@if($cmp->nombre == "editar proveedor")
											<a class="btn btn-warning btn-sm" href="{{ route('provedores.edit', ['provedor'=>$provedore]) }}">
												<i class="fa fa-pencil-square-o" aria-hidden="true"></i> <strong>Editar</strong>
											</a>
										@endif
									@endforeach
								</td>
							</tr>
						@endforeach
					</table>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>

@endsection