@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Productos:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<div class="input-group">
							<input type="text" id="producto" name="kword" class="form-control" placeholder="Buscar..." autofocus>
					        <span class="input-group-btn">
								<a class="btn btn-default" id="trigger"><i class="fa fa-search" aria-hidden="true"></i></a>
							</span>
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
                <div class="row">
                    <div class="col-sm-2 col-sm-offset-10">
                        <button type="button" class="btn btn-block btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<script type="text/javascript">
	$(document).ready(function() {
		$("#trigger").click('change', function() {
			query = $('#producto').val();
			console.log(query);
			$.ajax({
				url: "producto?query=" + query,
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