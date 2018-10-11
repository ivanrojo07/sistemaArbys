@extends('layouts.blank')
@section('content')

<div class="panel-default" >
	<div class="panel panel-group">
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-offset-4 col-sm-4 text-center form-group">
					<div class="input-group">
						<input type="text" id="producto" name="kword" class="form-control" placeholder="BLUEPRINT" autofocus readonly="">
						<span class="input-group-btn">
							<a class="btn btn-default disabled" id="trigger"><i class="fa fa-search" aria-hidden="true"></i></a>
						</span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
						<thead>
							<tr class="info">
								<th>@sortablelink('marca','Marca')</th>
								<th>@sortablelink('descripcion','Descripción')</th>
								<th>@sortablelink('precio_lista','Precio de Lista')</th>
								<th>@sortablelink('apertura','Precio de Apertura')</th>
								<th>@sortablelink('inicial','Precio Inicial')</th>
							</tr>
						</thead>
						@foreach ($productos as $producto)
						<tr class="active" title="Has Click Aquì para Ver" style="cursor: pointer" data-toggle="modal" data-target="#cotizacion_modal{{ $producto->id }}">
							<td>{{ $producto->marca }}</td>
							<td>{{ $producto->descripcion }}</td>
							<td>${{ number_format($producto->precio_lista,2) }}</td>
							<td>${{ number_format($producto->apertura,2) }}</td>
							<td>${{ number_format($producto->inicial,2) }}</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					{{ $productos->appends(Request::all())->links() }}
				</div>
			</div>
		</div>
	</div>
</div>

@foreach($productos as $producto)

<div class="modal fade"  id="cotizacion_modal{{ $producto->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle"><strong>{{ $producto->marca }}</strong> {{ $producto->descripcion }}</h5>
			</div>
			<div class="modal-body">




				<ul class="nav nav-pills mb-3 nav-fill" id="pills-tab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="contado" data-toggle="pill" href="#pills-contado{{ $producto->id }}" role="tab" aria-controls="pills-Anual" aria-selected="true">Contado</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="12meses" data-toggle="pill" href="#pills-doce{{ $producto->id }}" role="tab" aria-controls="pills-Semestral" aria-selected="false">12 Meses</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="36meses" data-toggle="pill" href="#pills-treinta{{ $producto->id }}" role="tab" aria-controls="pills-Trimestral" aria-selected="false">36 Meses</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="48meses" data-toggle="pill" href="#pills-cuarenta{{ $producto->id }}" role="tab" aria-controls="pills-Mensual" aria-selected="false">48 Meses</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="48meses" data-toggle="pill" href="#60Meses{{ $producto->id }}" role="tab" aria-controls="pills-Mensual" aria-selected="false">60 Meses</a>
					</li>
				</ul>
				<div class="tab-content" id="pills-tabContent" style="color: black">
					<div class="row">
						<div class="col">
							<h4 class="card-title">
								<div class="row">
									<div class="col-sm-3 col-sm-offset-1">Pago Inicial:<br><br>${{ number_format($producto->inicial,2) }}
									</div>
									<div class="col-sm-3">Apertura:<br><br> ${{ number_format($producto->apertura,2) }}</div>
								</div>

							</h4></div>
							<div class="col">

							</div>
						</div>

						<div class="tab-pane fade show active" id="pills-contado{{ $producto->id }}" role="tabpanel" aria-labelledby="contado">
							<div class="card-deck">
								<div class="card">
									<div class="card-body">
										<h3>Contado</h3>

										<h4>Mensual:&nbsp;&nbsp; ${{ number_format($producto->mensualidad_p_fisica,2) }}</h4>

									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="pills-doce{{ $producto->id }}" role="tabpanel" aria-labelledby="36meses">
							<div class="card-deck">
								<div class="card">
									<div class="card-body">
										<h3>12 Meses</h3>

										<h4>Mensual:&nbsp;&nbsp; ${{ number_format($producto->mensualidad_p_fisica,2) }}</h4>

									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="pills-treinta{{ $producto->id }}" role="tabpanel" aria-labelledby="48meses">
							<div class="card-deck">
								<div class="card">
									<div class="card-body">
										<h3>36 Meses</h3>

										<h4>Mensual:&nbsp;&nbsp; ${{ number_format($producto->mensualidad_p_fisica,2) }}</h4>

									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="pills-cuarenta{{ $producto->id }}" role="tabpanel" aria-labelledby="12meses">
							<div class="card-deck">
								<div class="card">
									<div class="card-body">
										<h3>48 Meses</h3>

										<h4>Mensual: &nbsp;&nbsp;${{ number_format($producto->mensualidad_p_fisica,2) }}</h4>

									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="60Meses{{ $producto->id }}" role="tabpanel" aria-labelledby="60meses">
							<div class="card-deck">
								<div class="card">
									<div class="card-body">
										<h3>60 Meses</h3>

										<h4>Mensual:&nbsp;&nbsp; ${{ $producto->mensualidad_p_fisica }}</h4>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer ">
					<div class="row">
						<div class="col-sm-4">
							<form role="form" id="form-cliente" method="POST"  action="{{ route('clientes.products.transactions.store',['cliente'=>$cliente,'product'=>$producto]) }}">
								{{ csrf_field() }}
								<input type="hidden" name="cliente_id" value="{{ $cliente->id }}">
								<input type="hidden" name="product_id" value="{{ $producto->id }}">
								<input class="btn btn-success" type="submit" value="Agregar al cliente">
							</form></div>
							<div class="col-sm-3">
								<a href="" class="btn btn-primary" >
									<strong>Enviar a Correo</strong>
								</a>
							</div>

							<div class="col-sm-3">
								<a href="{{ route('clientes.producto.show',['cliente'=>$cliente,
								'producto'=>$producto]) }}" class="btn btn-warning" >
								<strong>Documento PDF</strong>
							</a>
						</div>

						<div class="col-sm-2"><button type="button" class="btn btn-danger" data-dismiss="modal"><strong>Cerrar</strong></button></div>






					</div>
				</div>
			</div>
		</div>
	</div>

	@endforeach



	<script type="text/javascript">
		function limpiarBusqueda(){
			document.getElementById('costo1').value = "";
			document.getElementById('costo2').value = "";
			document.getElementById('mensualidad1').value = "";
			document.getElementById('mensualidad2').value = "";
			document.getElementById('marca').value = "";
			document.getElementById('tipo').value = "";
			document.getElementById('mensualidades').value = "";
		}
	</script>

	@endsection