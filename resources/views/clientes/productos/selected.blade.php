@extends('layouts.blank')
@section('content')

<div class="panel panel-group" style="margin-bottom: 0px; height: 500px;">
	<div class="panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-12 text-center form-group">
					<button onclick="location.reload()" class="btn btn-warning">
						<strong>Recargar Página</strong>
					</button>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					@if(count($cliente->transactions) != 0)
					<table class="table table-bordered table-stripped table-hover" style="margin-bottom: 0">
						<tr class="info">
							<th>Clave</th>
							<th>Descripción</th>
							<th>Marca</th>
							<th>Precio</th>
							<th>Acción</th>
						</tr>
						@foreach($cliente->transactions as $transation)
						<tr>
							<td>{{ $transation->product->clave }}</td>
							<td>{{ $transation->product->descripcion }}</td>
							<td>{{ $transation->product->marca }}</td>
							<td>${{ number_format($transation->product->precio_lista, 2) }}</td>
							<td>
				  				<a href="{{ route('clientes.pago.select' ,['cliente' => $cliente, 'producto' => $transation->product->id]) }}" class="btn btn-success">
							<i class="fa fa-check"></i><strong> Elegir</strong>
						</a>
							</td>
						</tr>
						@endforeach	
					</table>
					@else
					<h4>No has elegido productos.</h4>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>

@endsection