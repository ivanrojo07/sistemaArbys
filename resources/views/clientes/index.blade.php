@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Clientes:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a href="{{ route('clientes.create') }}" class="btn btn-success">
							<i class="fa fa-plus"></i><strong> Agregar Cliente</strong>
						</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-4 form-group">
						<div class="input-group">
							<input type="text" id="buscador" class="form-control" autofocus placeholder="Buscar...">
					        <span class="input-group-btn">
								<a class="btn btn-default" onclick="buscar()"><i class="fa fa-search"></i></a>
							</span>
						</div>
					</div>
				</div>
				<div id="clientes">
					<div class="row">
						<div class="col-sm-12">
							@if(count($clientes) > 0)
								<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px">
									<tr class="info">
										<th>Identificador</th>
										<th>Tipo de persona</th>
										<th>Nombre/Razón Social</th>
										<th>RFC</th>
										<th>Vendedor</th>
										<th>Oficina</th>
										<th>Ver</th>
										<th>Editar</th>
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
											{{-- VENDEDOR --}}
											{{-- <td>{{ !$cliente->vendedor ? " " : !$cliente->vendedor->empleado ? " " : $cliente->vendedor->empleado->nombre }}</td> --}}
											{{-- OFICINA --}}
											{{-- <td>{{ !$cliente->vendedor ? " " : !$cliente->vendedor->empleado->oficina ? " " : $cliente->vendedor->empleado->oficina->nombre }}</td> --}}
											<td class="text-center">
												<a class="btn btn-primary btn-sm" href="{{ route('clientes.show', ['cliente' => $cliente]) }}">
													<i class="fa fa-eye"></i><strong> Ver</strong>
												</a>
											</td>
											<td class="text-center">
												@if ( Auth::user()->id == 1 || Auth::user()->perfil->componentes()->where('nombre','editar cliente')->first() )
													<a class="btn btn-warning btn-sm" href="{{ route('clientes.edit', ['cliente' => $cliente]) }}">
														<i class="fa fa-pencil"></i><strong> Editar</strong>
													</a>
												@endif
												
											</td>
										</tr>
									@endforeach
								</table>
							@else
								<h4>No hay clientes disponibles.</h4>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	
	function buscar() {
		var val = $('#buscador').val();
		$.ajax({
			url : "buscarCliente",
			type : "GET",
			dataType : "html",
			data : {
				query : val
			},
		}).done(function(res) {
			$("#clientes").html(res);
		});
	}

</script>

@endsection