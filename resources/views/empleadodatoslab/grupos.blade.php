<option>Sin Definir</option>
@foreach($oficina->datosLab as $datos)
@foreach($datos->grupos as $grupo)
<option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
@endforeach
@endforeach