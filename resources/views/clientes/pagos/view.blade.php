@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Datos del Pago:</h4>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<div class="table-responsive">
							<table class="table table-sm table-bordered table-stripped table-hover">
								<tr class="info">
									<th>Producto</th>
									<th>Fecha del Pago</th>
									<th>Meses</th>
									<th>Total a Pagar</th>
									<th>Restante a Pagar</th>
								</tr>
								<tr>
									<td>{{ $pago->transaction->product->descripcion }}</td>
									<td>{{ $pago->created_at }}</td>
									<td>{{ $pago->meses }}</td>
									<td>${{ number_format($pago->total, 2) }}</td>
									<td>${{ number_format($pago->restante, 2) }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 form-group">
						<label class="control-label">Identificación:</label>
						<dd>{{ $pago->identificacion }}</dd>
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label">Comprobante de Domicilio:</label>
						<dd>{{ $pago->comprobante }}</dd>
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label">Forma de Pago:</label>
						<dd>{{ $pago->forma_pago }}</dd>
					</div>
					<div class="col-sm-3 form-group" @if($pago->banco == null) style="display: none;" @endif>
						<label class="control-label">Banco:</label>
						<dd>{{ $pago->banco }}</dd>
					</div>
					<div class="col-sm-3 form-group" @if($pago->numero_cheque == null) style="display: none;" @endif>
						<label class="control-label">Número de Cheque:</label>
						<input type="number" name="numero_cheque" class="form-control" min="0" id="cheque">
					</div>
					<div class="col-sm-3 form-group" @if($pago->numero_tarjeta == null) style="display: none;" @endif>
						<label class="control-label">Número de Tarjeta:</label>
						<dd>{{ $pago->numero_tarjeta }}</dd>
					</div>
					<div class="col-sm-3 form-group" @if($pago->nombre_tarjetaHabiente == null) style="display: none;" @endif>
						<label class="control-label">Nombre de Tarjetahabiente:</label>
						<dd>{{ $pago->nombre_tarjetaHabiente }}</dd>
					</div>
					<div class="col-sm-3 form-group" @if($pago->numero_deposito == null) style="display: none;" @endif>
						<label class="control-label">Folio de Depósito:</label>
						<dd>{{ $pago->numero_deposito }}</dd>
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label">Monto del Pago:</label>
						<dd>{{ $pago->monto }}</dd>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 form-group">
						<label class="control-label">Número de Referencia:</label>
						<dd>{{ $pago->referencia }}</dd>
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label">Número de Fólio:</label>
						<dd>{{ $pago->folio }}</dd>
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label">Cantidad a Pagar:</label>
						<dd>{{ $pago->restante + $pago->monto }}</dd>
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label">Restante:</label>
						<dd>{{ $pago->restante }}</dd>
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>

@endsection