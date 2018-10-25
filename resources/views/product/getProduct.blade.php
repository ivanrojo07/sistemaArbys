<input type="hidden" name="precio_lista" id="precio" value="{{ $producto->precio_lista }}">
<table class="table table-bordered table-hover">
	<tr class="info">
		<th>Descripción</th>
		<th>Precio</th>
		<th>Acción</th>
	</tr>
	<tr>
		<td>
			{{ $producto->descripcion }}
		</td>
		<td>
			${{ number_format($producto->precio_lista, 2) }}
		</td>
		<td class="text-center">
			<a class="btn btn-sm btn-danger" onclick="destroy()">Cancelar</a>
		</td>
	</tr>
</table>