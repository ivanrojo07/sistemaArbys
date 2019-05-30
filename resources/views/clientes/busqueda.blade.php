<div class="row">
	<div class="col-sm-12">
		@if(count($clientes) > 0)
			<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px">
				<tr class="info">
					<th>Identificador</th>
					<th>Tipo de persona</th>
					<th>Nombre/Razón Social</th>
					<th>RFC</th>
					<th>Acción</th>
				</tr>
				@foreach($clientes as $cliente)
					<tr class="active">
						<td>{{ $cliente->identificador }}</td>
						<td>{{ $cliente->tipo }}</td>
						<td>
							@if ($cliente->tipo == "Física")
								{{ $cliente->nombre }} {{ $cliente->appaterno }} {{ $cliente->apmaterno }}
							@else
								{{ $cliente->razon }}
							@endif
						</td>
						<td>{{ strtoupper($cliente->rfc) }}</td>
						<td class="text-center">
							<a class="btn btn-primary btn-sm" href="{{ route('clientes.show', ['cliente' => $cliente]) }}">
								<i class="fa fa-eye"></i><strong> Ver</strong>
							</a>
							<a class="btn btn-warning btn-sm" href="{{ route('clientes.edit', ['cliente' => $cliente]) }}">
								<i class="fa fa-pencil"></i><strong> Editar</strong>
							</a>
						</td>
					</tr>
				@endforeach
			</table>
		@else
			<h4>No hay clientes disponibles.</h4>
		@endif
	</div>
</div>