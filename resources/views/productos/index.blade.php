@extends('layouts.test')
@section('content1')
<div class="container" >
    <div class="panel-default" >
    	
    	<div class="panel-body">
        <div class="container">
          <form class="form-inline" id="search" action="{{ route('clientes.producto.index',['cliente'=>$cliente]) }}">
            <div class="container">

              <div class="panel-body">
                <label class="control-label" for="costo1">Costo de:</label>
                <input type="number" class="form-control"  name="costo1" id="costo1" value="{{ $request->costo1 }}">  
                <label class="control-label" for="costo2">a:</label>
                <input type="number" class="form-control" name="costo2" id="costo2" value="{{ $request->costo2 }}">
              
            
                <label class="control-label" for="mensualidad1">Mensualidades de:</label>
                <input type="number" class="form-control" name="mensualidad1" id="mensualidad1" value="{{ $request->mensualidad1 }}">
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
            <tr class="active"
                title="Has Click Aquì para Ver"
                style="cursor: pointer"
                data-toggle="modal" 
                data-target="#cotizacion_modal{{$producto->id}}">
              <td>{{$producto->marca}}</td>
              <td>{{$producto->descripcion}}</td>
              <td>${{ number_format($producto->precio_lista,2)}}</td>
              <td>${{ number_format($producto->apertura,2)}}</td>
              <td>${{ number_format($producto->inicial,2)}}</td>
              <td><form role="form" id="form-cliente" method="POST"  action="{{ route('clientes.products.transactions.store',['cliente'=>$cliente,'product'=>$producto]) }}">
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

    {{--dd($productos)--}}
                {{-- Modal Productos--}} 
                @foreach($productos as $producto)

                <div class="modal fade"  id="cotizacion_modal{{$producto->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="position: 0,0 !important; right: -200px;">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header" style="background-color: gray;">
                        <h5 class="modal-title" id="exampleModalLongTitle" style="color: white;"><strong>{{$producto->descripcion}}</strong>&nbsp;&nbsp;&nbsp;&nbsp;{{$producto->marca}} </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
                        </button>
                      </div>
                      <div class="modal-body">
                        
                          
                           
                            
                            <ul class="nav nav-pills mb-3 nav-fill" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="contado" data-toggle="pill" href="#pills-contado{{$producto->id}}" role="tab" aria-controls="pills-Anual" aria-selected="true">Contado</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="12meses" data-toggle="pill" href="#pills-doce{{$producto->id}}" role="tab" aria-controls="pills-Semestral" aria-selected="false">12 Meses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="36meses" data-toggle="pill" href="#pills-treinta{{$producto->id}}" role="tab" aria-controls="pills-Trimestral" aria-selected="false">36 Meses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="48meses" data-toggle="pill" href="#pills-cuarenta{{$producto->id}}" role="tab" aria-controls="pills-Mensual" aria-selected="false">48 Meses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="48meses" data-toggle="pill" href="#60Meses{{$producto->id}}" role="tab" aria-controls="pills-Mensual" aria-selected="false">60 Meses</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-contado{{$producto->id}}" role="tabpanel" aria-labelledby="contado">
                                    <div class="card-deck">
                                        <div class="card">
                                            <div class="card-body">
                                                <h3>Contado</h3>
                                                <h4 class="card-title">Pago Inicial: ${{ $producto->inicial}}</h4>
                                                <h4>Mensual: ${{ $producto->mensualidad_p_fisica}}</h4>
                                                <h4>Apertura: ${{ $producto->apertura}}</h4>
                                            </div>
                                        </div>
                                     </div>
                                </div>
                                <div class="tab-pane fade" id="pills-doce{{$producto->id}}" role="tabpanel" aria-labelledby="36meses">
                                    <div class="card-deck">
                                        <div class="card">
                                            <div class="card-body">
                                                <h3>12 Meses</h3>
                                                <h4 class="card-title">Pago Inicial: ${{ $producto->inicial}}</h4>
                                                <h4>Mensual: ${{ $producto->mensualidad_p_fisica}}</h4>
                                                <h4>Apertura: ${{ $producto->apertura}}</h4>
                                            </div>
                                        </div>
                                     </div>
                                </div>
                                <div class="tab-pane fade" id="pills-treinta{{$producto->id}}" role="tabpanel" aria-labelledby="48meses">
                                   <div class="card-deck">
                                        <div class="card">
                                            <div class="card-body">
                                                <h3>36 Meses</h3>
                                                <h4 class="card-title">Pago Inicial: ${{ $producto->inicial}}</h4>
                                                <h4>Mensual: ${{ $producto->mensualidad_p_fisica}}</h4>
                                                <h4>Apertura: ${{ $producto->apertura}}</h4>
                                             </div>
                                        </div>
                                     </div>
                                </div>
                                <div class="tab-pane fade" id="pills-cuarenta{{$producto->id}}" role="tabpanel" aria-labelledby="12meses">
                                   <div class="card-deck">
                                        <div class="card">
                                            <div class="card-body">
                                                <h3>48 Meses</h3>
                                                <h4 class="card-title">Pago Inicial: ${{ $producto->inicial}}</h4>
                                                <h4>Mensual: ${{ $producto->mensualidad_p_fisica}}</h4>
                                                <h4>Apertura: ${{ $producto->apertura}}</h4>
                                            </div>
                                        </div>
                                     </div>
                                </div>
                                <div class="tab-pane fade" id="60Meses{{$producto->id}}" role="tabpanel" aria-labelledby="60meses">
                                    <div class="card-deck">
                                        <div class="card">
                                            <div class="card-body">
                                                <h3>60 Meses</h3>
                                                <h4 class="card-title">Pago Inicial: ${{ $producto->inicial}}</h4>
                                                <h4>Mensual: ${{ $producto->mensualidad_p_fisica}}</h4>
                                                <h4>Apertura: ${{ $producto->apertura}}</h4>
                                            </div>
                                        </div>
                                     </div>
                                </div>
                            </div>
                        
                            
                         
                      
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary"><strong>Mandar E-mail</strong></button>
                        <button type="button" class="btn btn-warning"><strong>Imprimir</strong></button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><strong>Cerrar</strong></button>

                      </div>
                    </div>
                  </div>
                </div>

                @endforeach
                {{-- Modal Productos --}} 
                


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
