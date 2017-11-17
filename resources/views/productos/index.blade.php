@extends('layouts.infopersonal')
	@section('personal')
	<ul role="tablist" class="nav nav-tabs nav-pills nav-justified">
      <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.show',['personal'=>$personal]) }}">Dirección/Domicilio:</a></li>
      @if ($personal->tipo == 'Cliente')
      <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.datoslaborales.index',['personal'=>$personal]) }}" class="ui-tabs-anchor">Datos Laborales:</a></li>
      <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.referenciapersonales.index',['personal'=>$personal]) }}" class="ui-tabs-anchor">Referencias Personales:</a></li>
      <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.datosbeneficiario.index',['personal'=>$personal]) }}" class="ui-tabs-anchor">Datos de Beneficiarios:</a></li>
      @endif
      <li class="active"><a href="{{ route('personals.producto.index',['personal'=>$personal]) }}" class="ui-tabs-anchor">Productos:</a></li>
      <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.crm.index',['personal'=>$personal]) }}" class="ui-tabs-anchor">C.R.M.:</a></li>
  </ul>
    <div class="panel-default">
    	<div class="panel-heading">Productos del Cliente:</div>
    	<div class="panel-body">
        <div class="container">
          <form class="form-inline" action="{{ route('personals.producto.index',['personal'=>$personal]) }}">
            <div class="container">
              <div class="panel-body">
                <label class="control-label" for="costo1">Costo de:</label>
                <input type="number" class="form-control"  name="costo1">  
                <label class="control-label" for="costo2">a:</label>
                <input type="number" class="form-control" name="costo2">
              
            
                <label class="control-label" for="mensualidad1">Mensualidades de:</label>
                <input type="number" class="form-control" name="mensualidad1"></input>
                <label class="control-label" for="mensualidad2">a:</label>
                <input type="number" class="form-control" name="mensualidad2">
              </div>
              <div class="panel-body">
                <label class="control-label" for="marca">Marca:</label>
                <select type="select" name="marca" class="form-control" id="marca">
                  <option id="default" value="" selected="selected">Todos</option>
                  @foreach ($marcas as $marca)
                    {{-- expr --}}
                    <option id="{{$marca->marca}}" value="{{$marca->marca}}">{{$marca->marca}}</option>
                  @endforeach
                </select>
                <label class="control-label" for="tipo">Tipo:</label>
                <select type="select" name="tipo" class="form-control" id="tipo">
                  <option id="default" value="" selected="selected">Todos</option>
                  @foreach ($tipos as $tipo)
                    {{-- expr --}}
                    <option id="{{$tipo->tipo}}" value="{{$tipo->tipo}}">{{$tipo->tipo}}</option>

                  @endforeach
                </select>
                <label class="control-label">Meses:</label>
                <select type="select" name="mensualidades" class="form-control" id="mensualidades">
                  <option id="seleccionar" value="" selected="selected">Seleccionar</option>
                  <option id="6" value="6">6 meses</option>
                  <option id="12" value="12">12 meses</option>
                  <option id="18" value="18">18 meses</option>
                  <option id="24" value="24">24 meses</option>
                  <option id="36" value="36">36 meses</option>
                  <option id="48" value="48">48 meses</option>
                  <option id="60" value="60">60 meses</option>
                </select>
                <button type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
                <button class="btn btn-warning"> Borrar</button>
              </div>
            </div>
          </form>
        </div>
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
        {{$productos->links()}}
    	</div>
    </div>			
	@endsection