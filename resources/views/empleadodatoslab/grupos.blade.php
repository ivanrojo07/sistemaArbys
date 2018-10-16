<option>Sin Definir</option>
@foreach($oficina->datosLab as $datos)
@foreach($datos->grupos as $grupo)
@if(count($grupo->vendedores) != 4)
<option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
@endif
@endforeach
@endforeach