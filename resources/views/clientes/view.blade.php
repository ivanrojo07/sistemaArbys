@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-3">
						<h4>Datos del Cliente:</h4>
					</div>
					<div class="col-sm-3 text-center">
						@if( Auth::user()->id == 1 || Auth::user()->perfil->componentes()->where('nombre','editar cliente')->first() )
						<a href="{{ route('clientes.edit', ['cliente' => $cliente]) }}" class="btn btn-warning">
								<i class="fa fa-pencil"></i><strong> Editar Cliente</strong>
							</a>
						@endif
						
					</div>
					<div class="col-sm-3 text-center">
						@if ( Auth::user()->id == 1 || Auth::user()->perfil->componentes()->where('nombre','crear cliente')->first() )
						<a href="{{ route('clientes.create') }}" class="btn btn-success">
								<i class="fa fa-plus"></i><strong> Agregar Cliente</strong>
							</a>
						@endif
						
					</div>
					<div class="col-sm-3 text-center">
						@if (Auth::user()->id == 1 || Auth::user()->perfil->componentes()->where('nombre','indice clientes')->first())
							<a href="{{ route('clientes.index') }}" class="btn btn-primary">
								<i class="fa fa-bars"></i><strong> Lista de Clientes</strong>
							</a>
						@endif
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-3 form-group">
						<label class="control-label">Tipo de Persona:</label>
						<input type="text" name="tipopersona" class="form-control" value="{{ $cliente->tipo }}" readonly="">
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
					@if($cliente->tipo != 'Moral')
						<div class="col-sm-3 form-group">
							<label class="control-label">Nombre:</label>
							<input type="text" name="nombre" class="form-control" value="{{ $cliente->nombre }}" readonly="">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Apellido Paterno:</label>
							<input type="text" name="apellidopaterno" class="form-control" value="{{ $cliente->appaterno }}" readonly="">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Apellido Materno:</label>
							<input type="text" name="apellidomaterno" class="form-control" value="{{ $cliente->apmaterno ? $cliente->apmaterno  : 'N/A' }}" readonly="">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Fecha de Nacimiento:</label>
							<input type="date" name="fecha_nacimiento" class="form-control" value="{{ $cliente->nacimiento }}" readonly="">
						</div>
					@else
						<div class="col-sm-3 form-group">
							<label class="control-label">Razón Social:</label>
							<input type="text" name="razonsocial" class="form-control" value="{{ $cliente->razon }}" readonly="">
						</div>
					@endif
					<div class="col-sm-3 form-group">
						<label class="control-label">Correo Electrónico:</label>
						<input type="text" name="mail" class="form-control" value="{{ $cliente->email }}" readonly="">
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label">Teléfono:</label>
						<input type="text" name="telefono" class="form-control" value="{{ $cliente->telefono ? $cliente->telefono : 'N/A' }}" readonly="">
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label">Teléfono Celular:</label>
						<input type="text" name="telefonocel" class="form-control" value="{{ $cliente->movil ? $cliente->movil : 'N/A' }}" readonly="">
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label">Fecha de Actualización:</label>
						<input type="text" name="updated_at" class="form-control" value="{{ substr($cliente->updated_at, 0, 10) }}" readonly="">
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label">Comentarios:</label>
						<textarea name="comentarios" class="form-control" readonly="">{{ $cliente->comentarios ? $cliente->comentarios : 'N/A' }}</textarea>
					</div>
					@if($cliente->vendedor)
					<div class="col-sm-3 form-group">
						<label class="control-label">Vendedor:</label>
						<input type="text" class="form-control" value="{{ $cliente->vendedor->empleado->nombre }} {{ $cliente->vendedor->empleado->appaterno }}" readonly="">
					</div>
					<div class="col-sm-3 form-group">
						<label class="control-label">Oficina:</label>
						<input type="text" class="form-control" value="{{ !$cliente->vendedor->empleado->oficina ? : $cliente->vendedor->empleado->oficina->nombre }} " readonly="">
					</div>
					@else
					<div class="col-sm-6 form-group">
						<h3 class="alert-danger">Edite cliente o vaya al módulo asignar cliente para asigar vendedor</h3>
					</div>
					@endif
				</div>
			</div>
			@if($cliente->vendedor)
			<ul class="nav nav-tabs">
				<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab">
					<a data-toggle="tab" href="#dat" class="ui-tabs-anchor">Productos Elegídos</a>
				</li>
				<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab">
					<a data-toggle="tab" href="#crm" class="ui-tabs-anchor">CRM</a>
				</li>
				<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab">
					<a data-toggle="tab" href="#cot" class="ui-tabs-anchor">Cotización</a>
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
				<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" >
					<a data-toggle="tab" href="#solicitante" class="ui-tabs-anchor btn {{$aprobado === true ? '' : 'disabled'}}">Solicitante</a>
				</li>
				{{-- @if(count($cliente->solicitante) > 0) --}}
				<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab">
					<a data-toggle="tab" href="#integrante" class="ui-tabs-anchor btn {{count($cliente->solicitante) > 0 && $aprobado === true ? '' : 'disabled'}}">Integrante</a>
				</li>
				{{-- @endif --}}
			</ul>
			@endif
			<div class="tab-content">
				<div id="dat" class="tab-pane fade">
					{{-- <iframe src="{{ route ('seleccion', ['cliente' => $cliente]) }}" style="width: 100%; height: 500px;">
					</iframe> --}}
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
											@if(isset($transation->product))
											<tr>
												<td>{{ $transation->product->clave }}</td>
												<td>{{ $transation->product->descripcion }}</td>
												<td>{{ $transation->product->marca }}</td>
												<td>${{ number_format($transation->product->precio_lista, 2) }}</td>
												<td>
													@php($igual = false)
													@foreach($pagos as $pago)
													@if ($pago->transaction->id == $transation->id)
														@php($igual = true)
													@endif
													@endforeach
													@if(!$igual)
														<a href="{{ route('clientes.pago.select' ,['cliente' => $cliente, 'transaction' => $transation->id]) }}" class="btn btn-success">
															<i class="fa fa-check"></i><strong> Elegir</strong>
														</a>
													@endif
												</td>
											</tr>
											@endif
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
				</div>
				<div id="crm" class="tab-pane fade">
					<iframe src="{{ route ('clientes.crm.create', ['cliente' => $cliente]) }}" style="width: 100%; height: 500px;">
					</iframe>
				</div>
				<div id="cot" class="tab-pane fade">
					<iframe src="{{ route('clientes.producto.index', ['cliente' => $cliente]) }}" style="width: 100%; height: 600px;">
					</iframe>
				</div>
				<div id="pagos" class="tab-pane fade">
					<div class="panel-body">
						{{-- <div class="row">
							<div class="col-sm-12 text-center form-group">
								<a class="btn btn-success" href="{{ route('clientes.pagos.create', ['cliente' => $cliente]) }}">
									<i class="fa fa-plus" aria-hidden="true"></i> <strong>Registrar Pago</strong>
								</a>
							</div>
						</div> --}}
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
												<th>Núm. compra</th>
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
												@if(isset($pago) && isset($pago->transaction) && isset($pago->transaction->product))
													<tr>
														<td>{{$transaction->id}}</td>
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
																<a class="btn btn-warning btn-sm" href="{{ route('clientes.pagos.follow', ['cliente' => $cliente, 'pago' => $pago, 'transaction' => $transaction->id]) }}">
																	<i class="fa fa-usd" aria-hidden="true"></i> <strong>Pagar</strong>
																</a>
															@endif
															<a class="btn btn-primary btn-sm" href="{{ route('clientes.pagos.show', ['cliente' => $cliente, 'pago' => $pago]) }}">
																<i class="fa fa-eye" aria-hidden="true"></i> <strong>Ver</strong>
															</a>
														</td>
													</tr>
												@endif
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
														<a class="btn btn-warning btn-sm" href="{{ route('clientes.prestamos.pdf', ['cliente' => $cliente, 'prestamo' => $prestamo]) }}">
															<strong>Descargar PDF</strong>
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
				@if($aprobado === true)
					<div id="solicitante" class="tab-pane fade">
						<iframe id="fintegrante" src="{{ url('solicitantes', ['id' => $cliente->id]) }}" style="width: 100%; height: 600px;" name="integrante">
						</iframe>
					</div>
				@endif
				@if(count($cliente->solicitante) > 0)
					<div id="integrante" class="tab-pane fade">
						<iframe id="fintegrante" src="{{ url('integrantes', ['cliente' => $cliente]) }}" style="width: 100%; height: 600px;" name="integrante">
						</iframe>
					</div>
				@endif
			</div>

@endsection