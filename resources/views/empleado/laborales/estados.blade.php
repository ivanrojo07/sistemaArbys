<option value="">Seleccionar</option>
@foreach($region->estados as $estado)
	<option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
@endforeach