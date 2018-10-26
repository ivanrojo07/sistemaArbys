@extends('layouts.blank')
@section('content')

<div class="panel panel-group" style="margin-bottom: 0px;">
	<div class="panel-default">
		<div class="panel-heading">
			<div class="row form-group">
				<div class="col-sm-4 text-center">
					<div class="input-group">
						<input type="number" id="min" name="min" class="form-control" placeholder="Precio Mínimo" min="0" style="width: 153px">
						<input type="number" id="max" name="max" class="form-control" placeholder="Precio Máximo" style="width: 152px">
				        <span class="input-group-btn">
							<a class="btn btn-default" id="range"><i class="fa fa-search" aria-hidden="true"></i></a>
						</span>
					</div>
				</div>
				<div class="col-sm-4 text-center">
					<div class="input-group">
						<input type="text" id="producto" name="kword" class="form-control" placeholder="Buscar..." autofocus>
				        <span class="input-group-btn">
							<a class="btn btn-default" id="trigger"><i class="fa fa-search" aria-hidden="true"></i></a>
						</span>
					</div>
				</div>
				<div class="col-sm-2 text-center">
					<label class="control-label">Carros:</label>
					<div class="row">
						<input type="radio" name="type" id="carro" value="CARRO">
					</div>
				</div>
				<div class="col-sm-2 text-center">
					<label class="control-label">Motos:</label>
					<div class="row">
						<input type="radio" name="type" id="moto" value="MOTO">
					</div>
				</div>
			</div>
		</div>
		<div id="productos">
			<div class="panel-body">
				<div class="col-sm-12">
					<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px">
						<tr class="info">
							<th class="col-sm-2">Identificador</th>
							<th class="col-sm-1">Marca</th>
							<th class="col-sm-4">Descripción</th>
							<th class="col-sm-2">Precio de Lista</th>
							<th class="col-sm-2">Precio de Apertura</th>
							<th class="col-sm-1">Acción</th>
						</tr>
						@foreach($productos as $product)
						<tr class="active">
							<td>{{ $product->clave }}</td>
							<td>{{ $product->marca }}</td>
							<td>{{ $product->descripcion }}</td>
							<td>${{ number_format($product->precio_lista, 2) }}</td>
							<td>${{ number_format($product->apertura, 2) }}</td>
							<td class="text-center">
								<a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal{{ $product->id }}"><i class="fa fa-eye" aria-hidden="true"></i> Ver</a>
							</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
			<div class="panel-heading">
				{{ $productos->links() }}
			</div>
		</div>
	</div>
</div>

@foreach($productos as $producto)
<div class="modal fade" id="myModal{{ $producto->id }}" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="modal-title"><strong>Datos del Producto</strong></h4>
                    </div>
                </div>
            </div>
            <div class="modal-body">
				<div class="row">
					<div class="form-group col-sm-2 col-sm-offset-1">
						<label class="control-label">Clave:</label>
						<dd>{{ $producto->clave }}</dd>
					</div>
					<div class="form-group col-sm-2">
						<label class="control-label">Marca:</label>
						<dd>{{ $producto->marca }}</dd>
					</div>
					<div class="form-group col-sm-2">
						<label class="control-label">Descripción:</label>
						<dd>{{ $producto->descripcion }}</dd>
					</div>
					<div class="form-group col-sm-2">
						<label class="control-label">Precio de Lista:</label>
						<dd>${{ number_format($producto->precio_lista, 2) }}</dd>
					</div>
					<div class="form-group col-sm-2">
						<label class="control-label">Apertura:</label>
						<dd>${{ number_format($producto->apertura, 2) }}</dd>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-2 col-sm-offset-1">
						<label class="control-label">60 Meses:</label>
						<dd>{{ $producto['m60'] > 0 ? '$' . number_format($producto['m60'], 2) : 'N/A' }}</dd>
					</div>
					<div class="form-group col-sm-2">
						<label class="control-label">48 Meses:</label>
						<dd>{{ $producto['m48'] > 0 ? '$' . number_format($producto['m48'], 2) : 'N/A' }}</dd>
					</div>
					<div class="form-group col-sm-2">
						<label class="control-label">36 Meses:</label>
						<dd>{{ $producto['m36'] > 0 ? '$' . number_format($producto['m36'], 2) : 'N/A' }}</dd>
					</div>
					<div class="form-group col-sm-2">
						<label class="control-label">24 Meses:</label>
						<dd>{{ $producto['m24'] > 0 ? '$' . number_format($producto['m24'], 2) : 'N/A' }}</dd>
					</div>
					<div class="form-group col-sm-2">
						<label class="control-label">12 Meses:</label>
						<dd>{{ $producto['m12'] > 0 ? '$' . number_format($producto['m12'], 2) : 'N/A' }}</dd>
					</div>
				</div>
            </div>
            <div class="modal-footer">
                <div class="row text-center">
                	<div class="col-sm-3">
						<form role="form" id="form-cliente" method="POST" action="{{ route('clientes.products.transactions.store', ['cliente' => $cliente,'product' => $producto]) }}">
							{{ csrf_field() }}
							<input type="hidden" name="cliente_id" value="{{ $cliente->id }}">
							<input type="hidden" name="product_id" value="{{ $producto->id }}">
							<input class="btn btn-success" type="submit" value="Agregar al cliente">
						</form>
                	</div>
					<div class="col-sm-3">
						<a href="" class="btn btn-default disabled">
							Enviar a Correo
						</a>
					</div>
					<div class="col-sm-3">
						<a href="{{ route('clientes.producto.show', ['cliente' => $cliente, 'producto' => $producto]) }}" class="btn btn-warning">
							Descargar PDF
						</a>
					</div>
                    <div class="col-sm-3">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                        	Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<script type="text/javascript">
	$(document).ready(function() {
		$("#min").change(function() {
			var val = $('#min').val();
			$("#max").prop('min', val);
		});

		$("#range").click('change', function() {
			var min = $('#min').val();
			var max = $('#max').val();
			var link = 'producto3'
			if(min == '' && max == '')
				link += ''
			else if(min != '' && max == '')
				link += '?min=' + min;
			else if(min == '' && max != '')
				link += '?max=' + max;
			else if(min != '' && max != '')
				link += '?min=' + min + '&max=' + max;
			// alert(link);
			$.ajax({
				url: link,
				type: "GET",
				dataType: "html",
				success: function(res){
					$('#productos').html(res);
				},
				error: function (){
					$('#productos').html('');
				}
			});
		});

		$("#carro").click(function() {
			var val = $('#carro').val();
			$.ajax({
				url: "producto4?query=" + val,
				type: "GET",
				dataType: "html",
				success: function(res){
					$('#productos').html(res);
				},
				error: function (){
					$('#productos').html('');
				}
			});
		});

		$("#moto").click(function() {
			var val = $('#moto').val();
			$.ajax({
				url: "producto4?query=" + val,
				type: "GET",
				dataType: "html",
				success: function(res){
					$('#productos').html(res);
				},
				error: function (){
					$('#productos').html('');
				}
			});
		});

		$("#trigger").click('change', function() {
			query = $('#producto').val();
			console.log(query);
			$.ajax({
				url: "producto2?query=" + query,
				type: "GET",
				dataType: "html",
				success: function(res){
					$('#productos').html(res);
				},
				error: function (){
					$('#productos').html('');
				}
			});
		});
	});
</script>

@endsection