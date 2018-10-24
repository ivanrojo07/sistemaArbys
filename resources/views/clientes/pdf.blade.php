<!DOCTYPE html>
<html lang="es">
	<body>
		<div class="container">
			<div class="panel panel-group">
				<div class="panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-sm-12">
								<img src="img/header.jpg">
							</div>
							<div class="row">
								<div class="col-sm-4">
									<h4>Cotización</h4>
								</div>
								<div class="col-sm-4">
									<strong>Producto:</strong> {{ $producto->descripcion }}{{ $producto->marca }}
								</div>
								<div class="col-sm-4">
									<strong>Marca:</strong> {{ $producto->marca }}
								</div>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-4 form-control">
								<label class="control-label">Clave:</label>
								<dd>{{ $producto->clave }}</dd>
							</div>
							 <div class="col-sm-offset-2">
								<h4><strong>Precio:</strong>&nbsp;&nbsp;&nbsp;<dd>${{ number_format($producto->precio_lista,2) }}</dd></h4>
							</div>
							 <div class="col-sm-offset-2">
								<h4><strong>Precio de Apertura:</strong>&nbsp;&nbsp;&nbsp;<dd>${{ number_format($producto->apertura,2) }}</dd></h4>
							</div>
							 <div class="col-sm-offset-2">
								<h4><strong>Pago Inicial:</strong>&nbsp;&nbsp;&nbsp;<dd>${{ number_format($producto->inicial,2) }}</dd></h4>
							</div>
							 <div class="col-sm-offset-2">
								<h4><strong>Mensualidad:</strong>&nbsp;&nbsp;&nbsp;<dd>
									@if($cliente->tipopersona=='Fisica')
									${{ number_format($producto->mensualidad_p_fisica,2) }}
									@else
									${{ number_format($producto->mensualidad_p_moral,2) }}
									@endif
								</dd>
								</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>