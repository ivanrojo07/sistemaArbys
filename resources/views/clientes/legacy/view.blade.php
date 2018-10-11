@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row" id="tab" >
					<div role="application" class="panel panel-group" >
						<div class="panel-default">
							<div class="panel-heading" style="background-color: lightgray !important;">
								<div class="row" align="right">
									<div class="col-sm-2"><h4>Datos del Cliente:</h4></div>
									<div class="col-sm-2">

										<a class="btn btn-info" href="{{ route('clientes.edit',['cliente'=>$cliente]) }}"><strong>Editar</strong></a>
									</div> 
									<div class="col-sm-2">
										<?php $solicitante=$cliente;?>
										<a class="btn btn-warning btn-sm" href="{{ route('clientes.pago.create',['cliente'=>$cliente]) }}">

											<i class="fa fa-pencil-square-o" aria-hidden="true"></i> <strong>Pagos</strong>
										</a>
									</div>

									<div class="col-sm-2">

										<a class="btn btn-primary" 
										href="{{ route('clientes.index') }}">

										<strong>Buscar Clientes</strong></a>
									</div>
								</div>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="form-group col-sm-3">
										<label class="control-label" for="tipopersona">Tipo de Persona:</label>
										<dd>{{ $cliente->tipopersona }}</dd>
									</div>

									<div class="form-group col-sm-3">
										<label class="control-label" for="rfc">RFC:</label>
										<dd>{{ $cliente->rfc }}</dd>
									</div>
									<div class="form-group col-sm-3">
										<label class="control-label" for="vendedor">ID:</label>
										<dd>{{ $cliente->identificador }}</dd>
									</div>
									<div class="form-group col-sm-3">
										<label class="control-label" for="vendedor">Fecha de Resgistro:</label>
										<dd>{{ $cliente->created_at }}</dd>
									</div>
								</div>
								@if ($cliente->tipopersona == "Fisica")
								<div class="row" id="perfisica">
									<div class="form-group col-sm-3">
										<label class="control-label" for="nombre">Nombre(s):</label>
										<dd>{{ $cliente->nombre }}</dd>
									</div>
									<div class="form-group col-sm-3">
										<label class="control-label" for="apellidopaterno">Apellido Paterno:</label>
										<dd>{{ $cliente->apellidopaterno }}</dd>
									</div>
									<div class="form-group col-sm-3">
										<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
										<dd>{{ $cliente->apellidomaterno }}</dd>
									</div>
									<div class="form-group col-sm-3">
										<label class="control-label" for="fecha_nacimiento">Fecha de Nacimiento:</label>
										<dd>{{ $cliente->fecha_nacimiento }}</dd>
									</div>
								</div>
								@else
								{{-- false expr --}}
								<div class="row" id="permoral">
									<div class="form-group col-sm-3">

										<label class="control-label" for="razonsocial">Razon Social:</label>
										<dd>{{ $cliente->razonsocial }}</dd>
									</div>

								</div>
								@endif
								<div class="row">
									<div class="form-group col-sm-3">
										<label class="control-label" for="tipopersona">Correo:</label>
										<dd>{{ $cliente->mail }}</dd>
									</div>

									<div class="form-group col-sm-3">
										<label class="control-label" for="rfc">Telèfono:</label>
										<dd>{{ $cliente->telefono }}</dd>
									</div>
									<div class="form-group col-sm-3">
										<label class="control-label" for="vendedor">Telèfono Celular:</label>
										<dd>{{ $cliente->telefonocel }}</dd>
									</div>



								</div>
								<div class="row">
									<div class="form-group col-sm-3">
										<label class="control-label" for="canal_ventas">Canal de Ventas:</label>
										<dd>{{ $cliente->canal_ventas }}</dd>
									</div>

									<div class="form-group col-sm-3">
										<label class="control-label" for="cp">Código Postal:</label>
										<dd>{{ $cliente->cp }}</dd>
									</div>

									<div class="form-group col-sm-3">
										<label class="control-label" for="vendedor">Comentarios:</label>
										<dd>{{ $cliente->comentarios }}</dd>
									</div>

									<div class="form-group col-sm-3">
										<label class="control-label" for="vendedor">Actualización:</label>
										<dd>{{ $cliente->updated_at }}</dd>
									</div>

								</div>
							</div>
							<div class="panel-heading" style="background-color: lightgray !important; color: black;">
								<div class="row" >
									<div class="col-sm-2 col-sm-offset-1" >
										<h4>Datos para Cotización:</h4>
									</div>
								</div>
							</div>
							@if($cliente->info==null)
							<form role="form" id="form-cliente" method="POST"  action="{{ route('clientes.info.store',['cliente'=>$cliente]) }}">
								{{ csrf_field() }}			
								<div class="panel-body">
									<div class="row">
										<div class="col-sm-2 col-sm-offset-1">
											<label class="control-label" for="ingreso">Ingreso Mensual</label>
											<input type="number" step="any" name="ingreso" class="form-control" placeholder="$--">
										</div>
										<div class="col-sm-2">
											<label class="control-label" for="monto">Monto a Pagar (Mensual)</label>
											<input type="number" step="any" name="monto" class="form-control" placeholder="$--">
										</div>
										<div class="col-sm-2">
											<label class="control-label" for="calificacion">Calificación</label>
											<select name="calificacion" class="form-control">
												<option value="">Seleccionar</option>
												@for($i = 0; $i <= 10; $i++)
												<option value="{{$i}}">{{$i}}</option>
												@endfor
											</select>
										</div>
										<div class="col-sm-2 col-sm-offset-1"><br>
											<button type="submit" class="btn btn-success"><strong>Agregar</strong></button>
										</div>
									</div><br>
								</div>
							</form>
							@else
							<div class="panel-body">
								<div class="row">
									<div class="col-sm-2 col-sm-offset-1">
										<label class="control-label" for="ingreso">Ingreso Mensual</label>
										<dd>{{$cliente->info->ingreso}}</dd>
									</div>
									<div class="col-sm-2">
										<label class="control-label" for="monto">Monto a Pagar (Mensual)</label>
										<dd>{{$cliente->info->monto}}</dd>
									</div>
									<div class="col-sm-2">
										<label class="control-label" for="calificacion">Calificación</label>
										<dd>{{$cliente->info->calificacion}}</dd>
									</div>
									<div class="col-sm-2 col-sm-offset-1"><br>
										<form role="form" id="form-cliente" method="POST" 
										action="{{ route('clientes.info.update',['cliente'=>$cliente,'info'=>$cliente->info]) }}">
										{{ csrf_field() }}
										<input type="hidden" name="_method" value="PUT">
										<!-- <button type="submit" class="btn btn-warning"><strong>Editar</strong></button> -->
										</form>
									</div>
								</div>
							</div>
							@endif
						</div>
						<ul class="nav nav-tabs nav-pills nav-justified">
							<li class="active"><a data-toggle="tab" href="#dat" class="btn-info">Productos Elegídos</a></li>
							<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a data-toggle="tab" href="#crm" class="btn-info">CRM</a></li>
							<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a data-toggle="tab" href="#cot" class="btn-info">Cotizaciòn</a></li>
							<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a data-toggle="tab" href="#pagos" class="btn-info">Pagos</a></li>
						</ul>
						<div class="tab-content">
							<div id="dat" class="tab-pane fade in active">
								<div role="application" class="panel panel-group">
									<div class="panel-default">
										<div class="container pull-right">
											<br>
											<button onclick="location.reload()" class="btn btn-warning"><strong>Recargar Página</strong></button>
										</div>
										<div class="panel-body">
											@if($cliente->transactions->count()==0)
											<div class="row">
												<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
													<h4>Aún no se han Elegído Productos para este Cliente.</h4>
												</div>
											</div>
											@else
											<div class="row">
												@foreach($cliente->transactions as $trans)
												<div class="form-group col-sm-3">
													<label class="control-label" for="calle">Descripción:</label>
													<dd>{{$trans->product->descripcion}}</dd>
												</div>
												<div class="form-group col-sm-3">
													<label class="control-label" for="calle">Marca:</label>
													<dd>{{$trans->product->marca}}</dd>
												</div>
												<div class="form-group col-sm-3">
													<label class="control-label" for="calle">Precio:</label>
													<dd>${{number_format($trans->product->precio_lista,2)}}</dd>
												</div>
												<div class="form-group col-sm-3">
													<label class="control-label" for="calle">Clave:</label>
													<dd>{{$trans->product->clave}}</dd>
												</div>
												@endforeach
											</div>
											@endif
										</div>
									</div>
								</div>
							</div>
							<div id="crm" class="tab-pane fade ">
								<iframe src="{{route ('clientes.crm.create',['cliente'=>$cliente])}}" height="500px" >
								</iframe>
							</div>
							<div id="cot" class="tab-pane fade">
								<!-- @yield('datos') -->
								<iframe src="{{route('clientes.producto.index',['cliente'=>$cliente])}}" height="500px" >
								</iframe>
							</div>
							<div id="pagos" class="tab-pane fade">
								<div role="application" class="panel panel-group">
									<div class="container pull-right row"><br>
										<div class="col-sm-4">
											<button onclick="location.reload()" class="btn btn-warning"><strong>Recargar Página</strong></button>
										</div>
										<div class="col-sm-4">
											<a class="btn btn-primary" href="{{ route('clientes.pago.create',['cliente'=>$cliente]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <strong>Registrar Pagos</strong></a>
										</div>
									</div>
									<div class="panel-default">
										<div class="panel-body">
											<div class="row">
												<div class="col-sm-4">
													<div class="list-group" id="list-tab" role="tablist">
														<a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="profile">
															Estado&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fecha de Registro&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Monto del Pago
														</a>
														@foreach($cliente->pagos as $pago)
														<a class="list-group-item list-group-item-action list-group-item-info" id="list-profile-list" data-toggle="list" onclick="viewPago({{$pago->id}})" role="tab" aria-controls="profile" style="cursor: pointer;">
															{{$pago->status}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															{{$pago->created_at}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															${{number_format($pago->monto,2)}}
														</a>
														@endforeach
													</div>
												</div>
												<div class="col-sm-8">
													@foreach($cliente->pagos as $pago)
													<div class="container-fluid esconder" id="{{$pago->id}}" style="border:solid;display: none;border-color: #ccccff;border-radius: 2px;padding: 20px; ">

														<div class="row">
															<div class="col-sm-2 col-sm-offset-4">
																<label class="form-label">Vendedor/Usuario:</label>
															</div>
															<div class="col-sm-4">
																<strong>{{$pago->usuario->name}}</strong>
															</div>
														</div><br>
														<div class="row">
															<div class="col-sm-1">
																<label class="form-label">Banco:</label>
															</div>
															<div class="col-sm-4">
																<dd>{{$pago->banco}}</dd>
															</div>
															<div class="col-sm-1">
																<label class="form-label">Monto:</label>
															</div>
															<div class="col-sm-4">
																<dd>${{number_format($pago->monto,2)}}</dd>
															</div>
														</div><br>
														<div class="row">
															<div class="col-sm-4 form-group">
																<label class="form-label">Forma de Pago:</label>
																<dd>{{$pago->forma_pago}}</dd>
															</div>

															@switch($pago->forma_pago)
															@case('Cheque')
															<div class="col-sm-3 form-group">
																<label class="form-label">Número de Cheque:</label>
																<dd>{{$pago->numero_cheque}}</dd>
															</div>

															@break
															@case('Tarjeta de Crédito')
															<div class="col-sm-4 form-group">
																<label class="form-label">Número de Tarjeta:</label>
																<dd>{{$pago->numero_tarjeta}}</dd>
															</div>

															<div class="col-sm-4 form-group">
																<label class="form-label">Tarjetahabiente:</label>
																<dd>{{$pago->nombre_tarjetaHabiente}}</dd>
															</div>

															@break
															@case('Tarjeta de Débito')
															<div class="col-sm-4 form-group">
																<label class="form-label">Número de Tarjeta:</label>
																<dd>{{$pago->numero_tarjeta}}</dd>
															</div>

															<div class="col-sm-4 form-group">
																<label class="form-label">Tarjetahabiente:</label>
																<dd>{{$pago->nombre_tarjetaHabiente}}</dd>
															</div>

															@break
															@case('Depósito')
															<div class="col-sm-4 form-group">
																<label class="form-label">Número/Fólio de Depósito:</label>
																<dd>{{$pago->numero_deposito}}</dd>
															</div>


															@break

															@default

															@endswitch
														</div><br>
														<div class="row">
															<div class="col-sm-4 form-group">
																<label class="control-label">Identificación:</label>
																<dd>{{$pago->identificacion}}</dd>
															</div>
															<div class="col-sm-4 form-group">
																<label class="control-label">Comprobante:</label>
																<dd>{{$pago->comprobante}}</dd>
															</div>
														</div><hr>
														<legend>Producto</legend>
														<div class="row">
															<div class="col-sm-4 form-group">
																<label class="control-label">Marca:</label>
																<dd>{{$pago->product->marca}}</dd>
															</div>
															<div class="col-sm-4 form-group">
																<label class="control-label">Descripción:</label>
																<dd>{{$pago->product->descripcion}}</dd>
															</div>
															<div class="col-sm-4 form-group">
																<label class="control-label">Precio:</label>
																<dd>${{number_format($pago->product->precio_lista,2)}}</dd>
															</div>
														</div>


													</div>
													@endforeach
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


@endsection