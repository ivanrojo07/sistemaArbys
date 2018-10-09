@extends('layouts.blank')
@section('content')
	{{-- expr --}}
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
							{{-- <input type="submit" name=""> --}}
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
									<a class="btn btn-primary btn-sm" href="{{ route('productos.show', ['product' => $product]) }}"><i class="fa fa-eye" aria-hidden="true"></i> Ver</a>
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

<script type="text/javascript">
	$(document).ready(function() {
		$("#trigger").click('change', function() {
			query = $('#producto').val();
			// console.log(query);
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