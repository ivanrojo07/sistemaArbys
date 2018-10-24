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
							<strong>Agregar Cliente</strong>
						</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12 form-group">
						<form action="">
							<div class="input-group">
								<input type="text" id="cliente" name="query" class="form-control" placeholder="Buscar..." autofocus onKeypress="if(event.keyCode == 13) event.returnValue = false;">
								<span class="input-group-btn">
									<a readonly class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></a>
								</span>
							</div>
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12" id="datos" name="datos">
						<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px">
							<tr class="info">
								<th>@sortablelink('identificador', 'Identificador')</th>
								<th>@sortablelink('nombre', 'Nombre/Razón Social')</th>
								<th>@sortablelink('tipopersona', 'Tipo de persona')</th>
								<th>@sortablelink('rfc', 'RFC')</th>
								<th>@sortablelink('folio', 'Folio')</th>
								<th>@sortablelink('calificacion', 'Calificaciòn') </th>
								<th>Acción</th>
							</tr>
							@foreach($clientes as $cliente)
							<tr class="active" title="Has Click Aquì para Ver" style="cursor: pointer" href="#{{ $cliente->id }}">
								<td>{{ $cliente->identificador }}</td>
								<td>
									@if ($cliente->tipopersona == "Fisica")
									{{ $cliente->nombre }} {{ $cliente->apellidopaterno }} {{ $cliente->apellidomaterno }}
									@else
									{{ $cliente->razonsocial }}
									@endif
								</td>
								<td>{{ $cliente->tipopersona }}</td>
								<td>{{ strtoupper($cliente->rfc) }}</td>
								<td>{{ strtoupper($cliente->folio) }}</td>
								<td>{{ $cliente->calificacion }}</td>
								<td class="text-center">
									<a class="btn btn-success btn-sm" href="{{ route('clientes.show', ['id' => $cliente->id]) }}">
										<i class="fa fa-eye" aria-hidden="true"></i> <strong>Ver</strong>
									</a>
									<a class="btn btn-warning btn-sm" href="{{ route('clientes.pagos.create', ['cliente' => $cliente]) }}">
										<i class="fa fa-pencil-square-o" aria-hidden="true"></i> <strong>Pagos</strong>
									</a>
								</td>
							</tr>
							@endforeach
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection