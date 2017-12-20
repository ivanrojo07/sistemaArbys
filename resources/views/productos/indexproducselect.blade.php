@extends('layouts.infopersonal')
	@section('personal')
	<ul role="tablist" class="nav nav-tabs">
      <li class=""><a href="{{ route('personals.show',['personal'=>$personal]) }}" class="">Dirección/Domicilio:</a></li>
      @if ($personal->tipo == 'Cliente')
      <li class=""><a href="{{ route('personals.datoslaborales.index',['personal'=>$personal]) }}" class="">Datos Laborales:</a></li>
      <li class=""><a href="{{ route('personals.referenciapersonales.index',['personal'=>$personal]) }}" class="">Referencias Personales:</a></li>
      <li class=""><a href="{{ route('personals.datosbeneficiario.index',['personal'=>$personal]) }}" class="">Datos de Beneficiarios:</a></li>
      @endif
      <li class=""><a href="{{ route('personals.producto.index',['personal'=>$personal]) }}" class="">Productos:</a></li>
      <li class="active"><a href="{{ route('personals.product.index',['personal'=>$personal]) }}" class="">Productos seleccionados:</a></li>
      <li class=""><a href="{{ route('personals.crm.index',['personal'=>$personal]) }}" class="">C.R.M.:</a></li>
  </ul>
    <div class="panel-default">
    	<div class="panel-heading">Productos del Cliente:</div>
    	<div class="panel-body">
    		<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51);border-collapse: collapse;margin-bottom: 0px;">
    			<thead>
    				<tr class="info">
    					<th>@sortablelink('marca','Marca')</th>
    					<th>@sortablelink('descripcion','Descripción')</th>
    					<th>@sortablelink('precio_lista','Precio de Lista')</th>
    					<th>@sortablelink('apertura','Precio de Apertura')</th>
              <th>@sortablelink('inicial','Precio Inicial')</th>
    				</tr>
    			</thead>
          @foreach ($productos as $producto)
            {{-- expr --}}
            <tr class="active">
              <td>{{$producto->marca}}</td>
              <td>{{$producto->descripcion}}</td>
              <td>${{ number_format($producto->precio_lista,2)}}</td>
              <td>${{ number_format($producto->apertura,2)}}</td>
              <td>${{ number_format($producto->inicial,2)}}</td>
            </tr>
          @endforeach
    		</table>
        </div>
    	</div>
    </div>
	@endsection