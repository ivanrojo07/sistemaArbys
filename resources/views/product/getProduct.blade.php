<input type="hidden" name="product_id" value="{{ $producto->id }}">
<div class="table-responsive">
	<table class="table table-bordered table-hover">
		<tr class="info">
			<th>Descripción</th>
			<th>Precio</th>
			<th>Apertura</th>
			<th>Acción</th>
		</tr>
		<tr>
			<td>{{ $producto->descripcion }}</td>
			<td>${{ number_format($producto->precio_lista, 2) }}</td>
			<td>${{ number_format($producto->apertura, 2) }}</td>
			<td class="text-center">
				<a class="btn btn-sm btn-danger" onclick="destroy()">Cancelar</a>
			</td>
		</tr>
	</table>
</div>
<div class="table-responsive">
	<table class="table table-bordered table-hover">
		<tr class="info">
			@if($producto->m60 > 0)
				<th class="col-sm-3"><input type="radio" name="meses" value="60" onclick="pago(60)"> 60 Meses</th>
			@endif
			<th class="col-sm-3"><input type="radio" name="meses" value="48" onclick="pago(48)"> 48 Meses</th>
			<th class="col-sm-3"><input type="radio" name="meses" value="36" onclick="pago(36)" required=""> 36 Meses</th>
			<th class="col-sm-3"><input type="radio" name="meses" value="24" onclick="pago(24)"> 24 Meses</th>
			@if($producto->m12 > 0)
				<th class="col-sm-3"><input type="radio" name="meses" value="12" onclick="pago(12)"> 12 Meses</th>
			@endif
		</tr>
		<tr>
			@if($producto->m60 > 0)
				<td>${{ number_format($producto->m60, 2) }} por mes</td>
			@endif
			<td>${{ number_format($producto->m48, 2) }} por mes</td>
			<td>${{ number_format($producto->m36, 2) }} por mes</td>
			<td>${{ number_format($producto->m24, 2) }} por mes</td>
			@if($producto->m12 > 0)
				<td>${{ number_format($producto->m12, 2) }} por mes</td>
			@endif
		</tr>
	</table>
</div>

<script type="text/javascript">

	var mensualidades = '';

	function pago(meses) {
		mensualidades = meses;
		var plan = $('#plan').val();
		var prec = {{ $producto->precio_lista }} * 0.3;
		var entrega = '';
		if(plan == 'A') {
			switch(meses) {
				case 60:
					entrega += Math.ceil(prec / {{ $producto->m60 }}) + ' meses';
					break;
				case 48:
					entrega += Math.ceil(prec / {{ $producto->m48 }}) + ' meses';
					break;
				case 36:
					entrega += Math.ceil(prec / {{ $producto->m36 }}) + ' meses';
					break;
				case 24:
					entrega += Math.ceil(prec / {{ $producto->m24 }}) + ' meses';
					break;
				case 12:
					entrega += Math.ceil(prec / {{ $producto->m12 }}) + ' meses';
					break;
			}
		} else {
			entrega += '1 mes';
		}
		
		prec += {{ $producto->apertura }};

		$("#total").val(prec.toFixed(2));
		$("#entrega").val(entrega);
	}

</script>