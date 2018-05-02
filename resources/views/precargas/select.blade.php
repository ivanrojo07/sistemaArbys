<option  value="">Seleccionar</option>

@foreach ($precargas as $precarga)
	{{-- expr --}}
	<option id="{{$precarga->id}}" value="{{$precarga->id}}">{{$precarga->nombre}}</option>
@endforeach