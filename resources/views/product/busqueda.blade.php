<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px">
	<tr class="info">
		<th class="col-sm-2">@sortablelink('clave', 'Identificador')</th>
		<th class="col-sm-1">@sortablelink('marca', 'Marca')</th>
		<th class="col-sm-4">@sortablelink('descripcion', 'Descripción')</th>
		<th class="col-sm-2">@sortablelink('precio_lista', 'Precio de Lista')</th>
		<th class="col-sm-2">@sortablelink('apertura', 'Precio de Apertura') </th>
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

<script type="text/javascript" src="{{ asset('js/forms.js') }}"></script>