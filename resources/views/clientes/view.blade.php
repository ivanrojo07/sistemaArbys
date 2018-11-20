@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Datos del Cliente:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a href="{{ route('clientes.pagos.create', ['id' => $cliente->id]) }}" class="btn btn-info">
							<strong>Pagos</strong>
						</a>
					</div>
					<div class="col-sm-4 text-center">
						<a href="{{ route('clientes.index') }}" class="btn btn-primary">
							<strong>Lista de Clientes</strong>
						</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-3 form-group">
						<label class="control-label">Tipo de Persona:</label>
						<input type="text" name="tipopersona" class="form-control" value="{{ $cliente->tipopersona }}" readonly="">
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label">ID:</label>
						<input type="text" name="identificador" class="form-control" value="{{ $cliente->identificador }}" readonly="">
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label">RFC:</label>
						<input type="text" name="rfc" class="form-control" value="{{ $cliente->rfc }}" readonly="">
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label">Fecha de Registro:</label>
						<input type="date" name="created_at" class="form-control" value="{{ substr($cliente->created_at, 0, 10) }}" readonly="">
					</div>
				</div>
				<div class="row">
					@if($cliente->tipopersona != 'Moral')
					<div class="col-sm-3 form-group">
						<label class="control-label">Nombre:</label>
						<input type="text" name="nombre" class="form-control" value="{{ $cliente->nombre }}" readonly="">
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label">Apellido Paterno:</label>
						<input type="text" name="apellidopaterno" class="form-control" value="{{ $cliente->apellidopaterno }}" readonly="">
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label">Apellido Materno:</label>
						<input type="text" name="apellidomaterno" class="form-control" value="{{ $cliente->apellidomaterno ? $cliente->apellidomaterno  : 'N/A' }}" readonly="">
					</div>
					@else
					<div class="col-sm-3 form-group">
						<label class="control-label">Razón Social:</label>
						<input type="text" name="razonsocial" class="form-control" value="{{ $cliente->razonsocial }}" readonly="">
					</div>
					@endif
					<div class="col-sm-3 form-group">
						<label class="control-label">Fecha de Nacimiento:</label>
						<input type="date" name="fecha_nacimiento" class="form-control" value="{{ $cliente->fecha_nacimiento }}" readonly="">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 form-group">
						<label class="control-label">Correo Electrónico:</label>
						<input type="text" name="mail" class="form-control" value="{{ $cliente->mail }}" readonly="">
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label">Teléfono:</label>
						<input type="text" name="telefono" class="form-control" value="{{ $cliente->telefono ? $cliente->telefono : 'N/A' }}" readonly="">
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label">Teléfono Celular:</label>
						<input type="text" name="telefonocel" class="form-control" value="{{ $cliente->telefonocel }}" readonly="">
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label">Código Postal:</label>
						<input type="text" name="cp" class="form-control" value="{{ $cliente->cp }}" readonly="">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 form-group">
						<label class="control-label">Canal de Ventas:</label>
						<input type="text" name="canal_ventas" class="form-control" value="{{ $cliente->canal_ventas }}" readonly="">
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label">Fecha de Actualización:</label>
						<input type="text" name="updated_at" class="form-control" value="{{ substr($cliente->updated_at, 0, 10) }}" readonly="">
					</div>
					<div class="col-sm-6 form-group">
						<label class="control-label">Comentarios:</label>
						<textarea name="comentarios" class="form-control" readonly="">{{ $cliente->comentarios }}</textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 text-center">
						<a href="{{ route('clientes.edit', ['id' => $cliente->id]) }}" class="btn btn-warning">
							<strong>Editar</strong>
						</a>
					</div>
				</div>
			</div>
			<ul class="nav nav-tabs">
				<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab">
					<a data-toggle="tab" href="#dat" class="ui-tabs-anchor">Productos Elegídos</a>
				</li>
				<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab">
					<a data-toggle="tab" href="#crm" class="ui-tabs-anchor">CRM</a>
				</li>
				<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab">
					<a data-toggle="tab" href="#cot" class="ui-tabs-anchor">Cotizaciòn</a>
				</li>
				<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab">
					<a data-toggle="tab" href="#pagos" class="ui-tabs-anchor">Pagos</a>
				</li>
				<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab">
					<a data-toggle="tab" href="#prestamos" class="ui-tabs-anchor">Préstamos</a>
				</li>
				<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab">
					<a href="{{ route('crm.index') }}" class="ui-tabs-anchor">CRM General</a>
				</li>
			</ul>
			<div class="tab-content">
				<div id="dat" class="tab-pane fade">
					<iframe src="{{ route ('seleccion', ['cliente' => $cliente]) }}" style="width: 100%;">
					</iframe>
				</div>
				<div id="crm" class="tab-pane fade">
					<iframe src="{{ route ('clientes.crm.create', ['cliente' => $cliente]) }}" style="width: 100%; height: 600px;">
					</iframe>
				</div>
				<div id="cot" class="tab-pane fade">
					<iframe src="{{ route('clientes.producto.index', ['cliente' => $cliente]) }}" style="width: 100%; height: 600px;">
					</iframe>
				</div>
				<div id="pagos" class="tab-pane fade">
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12 text-center form-group">
								<a class="btn btn-success" href="{{ route('clientes.pagos.create', ['cliente' => $cliente]) }}">
									<i class="fa fa-plus" aria-hidden="true"></i> <strong>Registrar Pago</strong>
								</a>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								@php($pagoss = 0)
								@foreach($cliente->transactions as $transaction)
									@php($pagoss += count($transaction->pagos))
								@endforeach
								@if($pagoss > 0)
									<div class="table-responsive">
										<table class="table table-bordered table-stripped table-hover">
											<tr class="info">
												<th>Producto</th>
												<th>Fecha de Pago</th>
												<th>Forma de Pago</th>
												<th>Meses</th>
												<th>Total a Pagar</th>
												<th>Monto del Pago</th>
												<th>Restante a Pagar</th>
												<th>Estado del Pago</th>
												<th>Acción</th>
											</tr>
											@foreach($cliente->transactions as $transaction)
												@foreach($transaction->pagos as $pago)
													<tr>
														<td>{{ $pago->transaction->product->descripcion }}</td>
														<td>{{ date('d/m/Y H:m:s', strtotime($pago->created_at)) }}</td>
														<td>{{ $pago->forma_pago }}</td>
														<td>{{ $pago->meses }}</td>
														<td>${{ number_format($pago->total, 2) }}</td>
														<td>${{ number_format($pago->monto, 2) }}</td>
														<td>${{ number_format($pago->restante, 2) }}</td>
														<td>{{ $pago->status }}</td>
														<td class="text-center">
															@if($pago == $transaction->pagos->last() && $pago->status != "Aprobado")
																<a class="btn btn-warning btn-sm" href="{{ route('clientes.pagos.follow', ['cliente' => $cliente, 'pago' => $pago]) }}">
																	<i class="fa fa-usd" aria-hidden="true"></i> <strong>Pagar</strong>
																</a>
															@endif
															<a class="btn btn-primary btn-sm" href="{{ route('clientes.pagos.show', ['cliente' => $cliente, 'pago' => $pago]) }}">
																<i class="fa fa-eye" aria-hidden="true"></i> <strong>Ver</strong>
															</a>
														</td>
													</tr>
												@endforeach
											@endforeach
										</table>
									</div>
								@else
									<h4>Aún no hay pagos registrados.</h4>
								@endif
							</div>
						</div>
					</div>
				</div>
				<div id="prestamos" class="tab-pane fade">
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12 text-center form-group">
								<a class="btn btn-success" href="{{ route('clientes.prestamos.create', ['cliente' => $cliente]) }}">
									<i class="fa fa-plus" aria-hidden="true"></i> <strong>Registrar Préstamo</strong>
								</a>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								@if(count($cliente->prestamos) > 0)
									<div class="table-responsive">
										<table class="table table-bordered table-stripped table-hover" style="margin-bottom: 0px;">
											<tr class="info">
												<th>Fecha</th>
												<th>Monto</th>
												<th>Meses</th>
												<th>Garantía</th>
												<th>Acción</th>
											</tr>
											@foreach($cliente->prestamos as $prestamo)
												<tr>
													<td>{{ $prestamo->created_at }}</td>
													<td>${{ number_format($prestamo->monto, 2) }}</td>
													<td>{{ $prestamo->meses }}</td>
													<td>{{ $prestamo->garantia }}</td>
													<td class="text-center">
														<a class="btn btn-primary btn-sm" href="{{ route('clientes.prestamos.show', ['cliente' => $cliente, 'prestamo' => $prestamo]) }}">
															<i class="fa fa-eye" aria-hidden="true"></i> <strong>Ver</strong>
														</a>
													</td>
												</tr>
											@endforeach
										</table>
									</div>
								@else
									<h4>Aún no hay préstamos registrados.</h4>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>

@endsection