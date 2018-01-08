


		<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
			<thead>
				<tr class="info">
					<th>@sortablelink('clave', 'Identificador'){{-- Clave --}}</th>
					<th>@sortablelink('marca', 'Marca')</th>
					<th>@sortablelink('descripcion', 'Descripción')</th>
					<th>@sortablelink('precio_lista', 'Precio de Lista')</th>
					<th>@sortablelink('apertura', 'Precio de Apertura') </th>
					<th>@sortablelink('inicial','Precio Inicial')</th>
					<th>Operacion</th>
				</tr>
			</thead>
			@foreach($productos as $product)
				<tr class="active">
					<td>
						{{ $product->clave }}
					</td>
					<td>{{ $product->marca }}</td>
					<td>{{ $product->descripcion }}</td>
					<td>$ {{ number_format($product->precio_lista,2) }}</td>
					<td>$ {{number_format($product->apertura,2)}}</td>
					<td>
						$ {{number_format($product->inicial,2)}}
					</td>
					<td>
						<a class="btn btn-success btn-sm" href="{{ route('productos.show',['product'=>$product]) }}"><i class="fa fa-eye" aria-hidden="true"></i> Más información</a>
					</td>
				</tr>
				</tbody>
			@endforeach
		</table><br>

	
	

	<script type="text/javascript" src="{{ asset('js/forms.js') }}"></script>