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
						<a href="{{ route('clientes.pago.create', ['id' => $cliente->id]) }}" class="btn btn-info">
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
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>
							Datos para Cotización:
						</h4>
					</div>
				</div>
			</div>
			<div class="panel-body">
				@if($cliente->info == null)
				<form role="form" id="form-cliente" method="POST"  action="{{ route('clientes.info.store', ['cliente' => $cliente]) }}">
                    {{ csrf_field() }}
					<div class="row">
						<div class="col-sm-3 form-group">
							<label for="" class="control-label">Ingreso Mensual:</label>
							<input type="text" class="form-control" name="ingreso">
						</div>
						<div class="col-sm-3 form-group">
							<label for="" class="control-label">Monto a Pagar:</label>
							<input type="text" class="form-control" name="monto">
						</div>
						<div class="col-sm-3 form-group">
							<label for="" class="control-label">Calificación:</label>
							<select name="calificacion" id="" class="form-control">
								<option value="" selected="">Seleccionar</option>
								@for($i = 0; $i <= 10; $i++)
								<option value="{{ $i }}">{{ $i }}</option>
								@endfor
							</select>
						</div>
						<div class="col-sm-3 form-group text-center">
							<a class="btn btn-success" style="margin-top: 27px"><strong>Agregar</strong></a>
						</div>
					</div>
				</form>
				@else
				<div class="row">
					<div class="col-sm-3 form-group">
						<label for="" class="control-label">Ingreso Mensual:</label>
						<input type="text" class="form-control" name="ingreso" value="{{ $cliente->info->ingreso }}" readonly="">
					</div>
					<div class="col-sm-3 form-group">
						<label for="" class="control-label">Monto a Pagar:</label>
						<input type="text" class="form-control" name="monto" value="{{ $cliente->info->monto }}" readonly="">
					</div>
					<div class="col-sm-3 form-group">
						<label for="" class="control-label">Calificación:</label>
						<input type="text" class="form-control" name="calificacion" value="{{ $cliente->info->monto }}" readonly="">
					</div>
				</div>
				@endif
			</div>
			<ul class="nav nav-tabs">
				<li class="active">
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
			</ul>
			<div class="tab-content">
				<div id="dat" class="tab-pane fade in active">
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12">
								@if(count($cliente->transactions) > 0)
								<table class="table table-bordered table-stripped table-hover" style="margin-bottom: 0">
									<tr class="info">
										<th>Clave</th>
										<th>Descripción</th>
										<th>Marca</th>
										<th>Precio</th>
									</tr>
									@foreach($cliente->transactions as $transation)
									<tr>
										<td>{{ $transation->product->clave }}</td>
										<td>{{ $transation->product->descripcion }}</td>
										<td>{{ $transation->product->marca }}</td>
										<td>${{ number_format($transation->product->precio_lista, 2) }}</td>
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
				<div id="crm" class="tab-pane fade ">
					<iframe src="{{ route ('clientes.crm.create',['cliente'=>$cliente]) }}" style="width: 100%; height: 600px;">
					</iframe>
				</div>
				<div id="cot" class="tab-pane fade">
					<iframe src="{{ route('clientes.producto.index',['cliente'=>$cliente]) }}" style="width: 100%; height: 600px;">
					</iframe>
				</div>
				<div id="pagos" class="tab-pane fade">
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12 text-center form-group">
								<a class="btn btn-success" href="{{ route('clientes.pago.create', ['cliente' => $cliente]) }}">
									<i class="fa fa-pencil-square-o" aria-hidden="true"></i> <strong>Registrar Pagos</strong>
								</a>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<table class="table table-bordered table-stripped table-hover">
									<tr class="info">
										<td class="col-sm-4">Estado de Pago</td>
										<td class="col-sm-4">Fecha de Registro</td>
										<td class="col-sm-4">Monto del Pago</td>
									</tr>
									@foreach($cliente->pagos as $pago)
									<tr>
										<td>{{ $pago->status }}</td>
										<td>{{ $pago->created_at }}</td>
										<td>{{ number_format($pago->monto, 2) }}</td>
									</tr>
									@endforeach
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

@endsection