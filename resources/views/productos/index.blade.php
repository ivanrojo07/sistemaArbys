@extends('layouts.infopersonal')
	@section('personal')
	<ul role="tablist" class="nav nav-tabs">
      <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.show',['personal'=>$personal]) }}" class="">Dirección/Domicilio:</a></li>
      @if ($personal->tipo == 'Cliente')
      <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.datoslaborales.index',['personal'=>$personal]) }}" class="">Datos Laborales:</a></li>
      <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.referenciapersonales.index',['personal'=>$personal]) }}" class="">Referencias Personales:</a></li>
      <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.datosbeneficiario.index',['personal'=>$personal]) }}" class="">Datos de Beneficiarios:</a></li>
      @endif
      <li class="active"><a href="{{ route('personals.producto.index',['personal'=>$personal]) }}" class="">Productos:</a></li>
      <li class=""><a href="{{ route('personals.product.index',['personal'=>$personal]) }}" class="">Productos seleccionados:</a></li>
      <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.crm.index',['personal'=>$personal]) }}" class="">C.R.M.:</a></li>
  </ul>
    <div class="panel-default">
    	<div class="panel-heading">Productos:</div>
    	<div class="panel-body">
        <div class="container">
          <form class="form-inline" id="search" action="{{ route('personals.producto.index',['personal'=>$personal]) }}">
            <div class="container">
              <div class="panel-body">
                <label class="control-label" for="costo1">Costo de:</label>
                <input type="number" class="form-control"  name="costo1" id="costo1" value="{{ $request->costo1 }}">  
                <label class="control-label" for="costo2">a:</label>
                <input type="number" class="form-control" name="costo2" id="costo2" value="{{ $request->costo2 }}">
              
            
                <label class="control-label" for="mensualidad1">Mensualidades de:</label>
                <input type="number" class="form-control" name="mensualidad1" id="mensualidad1" value="{{ $request->mensualidad1 }}"></input>
                <label class="control-label" for="mensualidad2">a:</label>
                <input type="number" class="form-control" name="mensualidad2" id="mensualidad2" value="{{ $request->mensualidad2 }}">
              </div>
              <div class="panel-body">
                <label class="control-label" for="marca">Marca:</label>
                <select type="select" name="marca" class="form-control" id="marca">
                  <option id="default" value="">Todos</option>
                  @foreach ($marcas as $marca)
                    {{-- expr --}}
                    <option id="{{$marca->marca}}" value="{{$marca->marca}}" @if ($marca->marca == $request->marca)
                      selected="selected" 
                    @endif>{{$marca->marca}}</option>
                  @endforeach
                </select>
                <label class="control-label" for="tipo">Tipo:</label>
                <select type="select" name="tipo" class="form-control" id="tipo">
                  <option id="default" value="" selected="selected">Todos</option>
                  @foreach ($tipos as $tipo)
                    {{-- expr --}}
                    <option id="{{$tipo->tipo}}" value="{{$tipo->tipo}}" @if ($tipo->tipo == $request->tipo)
                      {{-- expr --}}
                      selected="selected" 
                    @endif>{{$tipo->tipo}}</option>

                  @endforeach
                </select>
                <label class="control-label">Meses:</label>
                <select type="select" name="mensualidades" class="form-control" id="mensualidades">
                  <option id="seleccionar" value="" selected="selected">Seleccionar</option>
                  <option id="6" value="6" @if ($request->mensualidades == "6")
                    {{-- expr --}}
                    selected="selected" 
                  @endif>6 meses</option>
                  <option id="12" value="12" @if ($request->mensualidades == "12")
                    {{-- expr --}}
                    selected="selected" 
                  @endif>12 meses</option>
                  <option id="18" value="18" @if ($request->mensualidades == "18")
                    {{-- expr --}}
                    selected="selected" 
                  @endif>18 meses</option>
                  <option id="24" value="24" @if ($request->mensualidades == "24")
                    {{-- expr --}}
                    selected="selected" 
                  @endif>24 meses</option>
                  <option id="36" value="36" @if ($request->mensualidades == "36")
                    {{-- expr --}}
                    selected="selected" 
                  @endif>36 meses</option>
                  <option id="48" value="48" @if ($request->mensualidades == "48")
                    {{-- expr --}}
                    selected="selected" 
                  @endif>48 meses</option>
                  <option id="60" value="60" @if ($request->mensualidades == "60")
                    {{-- expr --}}
                    selected="selected" 
                  @endif>60 meses</option>
                </select>
                <button type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i><strong>Buscar</strong> </button>
                <a type="submit" class="btn btn-warning" onclick='limpiarBusqueda(this)'><strong>Borrar</strong></a>
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
              <th>Agregar</th>
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
              <td><form role="form" id="form-cliente" method="POST"  action="{{ route('personals.products.transactions.store',['personal'=>$personal,'product'=>$producto]) }}">
                {{ csrf_field() }}
                <input class="btn btn-primary" type="submit" value="Agregar al cliente">
              </form></td>
            </tr>
          @endforeach
    		</table>
        </div>
        {{$productos->appends(Request::all())->links()}}
    	</div>
    </div>			
    <script type="text/javascript">
    function limpiarBusqueda(){
      document.getElementById('costo1').value = "";
      document.getElementById('costo2').value = "";
      document.getElementById('mensualidad1').value = "";
      document.getElementById('mensualidad2').value = "";
      document.getElementById('marca').value = "";
      document.getElementById('tipo').value = "";
      document.getElementById('mensualidades').value = "";
    }
    </script>
	@endsection
