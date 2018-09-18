<option>Sin Definir</option>
@foreach($oficina->datosLab as $dato)
@if($dato->puesto_id == 6)
<option value="{{ $dato->empleado->id }}">{{ $dato->empleado->nombre . ' ' . $dato->empleado->appaterno }}</option>
@endif
@endforeach