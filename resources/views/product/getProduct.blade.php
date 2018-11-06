<input type="hidden" name="precio_lista" id="precio" value="{{ $producto->precio_lista }}">
<input type="hidden" name="" id="ptotal">
<table class="table table-bordered table-hover">
	<tr class="info">
		<th>Descripción</th>
		<th>Precio</th>
		<th>Apertura</th>
		<th>Acción</th>
	</tr>
	<tr>
		<td>{{ $producto->descripcion }}</td>
		<td>${{ number_format($producto->precio_lista, 2, '.', '\'') }}</td>
		<td>${{ number_format($producto->apertura, 2, '.', '\'') }}</td>
		<td class="text-center">
			<a class="btn btn-sm btn-danger" onclick="destroy()">Cancelar</a>
		</td>
	</tr>
</table>
<table class="table table-bordered table-hover">
	<tr class="info">
		@if($producto->m60 > 0)
			<th class="col-sm-3"><input type="radio" name="meses" value="60" onclick="pago(60)"> 60 Meses</th>
		@endif
		<th class="col-sm-3"><input type="radio" name="meses" value="48" onclick="pago(48)"> 48 Meses</th>
		<th class="col-sm-3"><input type="radio" name="meses" value="36" required="" onclick="pago(36)"> 36 Meses</th>
		<th class="col-sm-3"><input type="radio" name="meses" value="24" onclick="pago(24)"> 24 Meses</th>
		@if($producto->m12 > 0)
			<th class="col-sm-3"><input type="radio" name="meses" value="12" onclick="pago(12)"> 12 Meses</th>
		@endif
	</tr>
	<tr>
		@if($producto->m60 > 0)
			<td>${{ number_format($producto->m60, 2, '.', '\'') }} por mes</td>
		@endif
		<td>${{ number_format($producto->m48, 2, '.', '\'') }} por mes</td>
		<td>${{ number_format($producto->m36, 2, '.', '\'') }} por mes</td>
		<td>${{ number_format($producto->m24, 2, '.', '\'') }} por mes</td>
		@if($producto->m12 > 0)
			<td>${{ number_format($producto->m12, 2, '.', '\'') }} por mes</td>
		@endif
	</tr>
</table>

<script type="text/javascript">

	function pago(meses) {
		document.getElementById("pago").style.display = 'block';
		prec = {{ $producto->apertura }};

		switch(meses) {
			case 60:
				prec += {{ $producto->m60 }};
				break;
			case 48:
				prec += {{ $producto->m48 }};
				break;
			case 36:
				prec += {{ $producto->m36 }};
				break;
			case 24:
				prec += {{ $producto->m24 }};
				break;
			case 12:
				prec += {{ $producto->m12 }};
				break;
		}
		
		$("#total").val(prec.toFixed(2));
	}

</script>