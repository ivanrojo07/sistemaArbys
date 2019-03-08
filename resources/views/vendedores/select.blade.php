<option  value="">Seleccionar</option>

@foreach ($vendedores as $vendedor)
	{{-- expr --}}
	<option value="{{$vendedor->id}}">{{$vendedor->nombre}}{{$vendedor->apaterno}}</option>
@endforeach