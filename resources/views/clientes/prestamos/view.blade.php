@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Datos del Préstamo:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a href="{{ route('clientes.show', ['cliente' => $cliente]) }}" class="btn btn-primary">
							<i class="fa fa-undo"></i><strong> Volver</strong>
						</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-4 form-group">
						<label class="control-label">Monto:</label>
						<dd>{{ $prestamo->monto }}</dd>
					</div>
					<div class="col-sm-4 form-group">
						<label class="control-label">Meses:</label>
						<dd>{{ $prestamo->meses }}</dd>
					</div>
					<div class="col-sm-4 form-group">
						<label class="control-label">Garantía:</label>
						<dd>{{ $prestamo->garantia }}</dd>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<table class="table table-stripped table-hover table-bordered" style="margin-bottom: 0px;">
							<tr class="info">
								<th>Mes</th>
								<th>Pago Inicial</th>
								<th>Mensualidad</th>
							</tr>
							@for($i = 1; $i <= $prestamo->meses; $i++)
								<tr>
									<td class="text-center">{{ $i }}</td>
									<td>{{ $i == 1 ? number_format($prestamo->monto * 0.1, 2) : number_format(0, 2) }}</td>
									<td>{{ number_format($prestamo->monto / 12, 2) }}</td>
								</tr>
							@endfor
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection