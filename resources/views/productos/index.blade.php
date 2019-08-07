@extends('layouts.blank')
@section('content')

<div class="panel panel-group" style="margin-bottom: 0px;">
	<div class="panel-default">
		<div class="panel-heading">
			<form id="search-form" action="{{ route('clientes.producto.index',['cliente'=>$cliente]) }}">
				<div class="row form-group">
					<div class="col-sm-4 text-center">
						<div class="input-group">
							<input type="number" id="min" name="min" value="{{$request->min}}" class="form-control" placeholder="Precio Mínimo" min="0" style="width: 153px">
							<input type="number" id="max" name="max" value="{{$request->max}}" class="form-control" placeholder="Precio Máximo" style="width: 152px">
						</div>
					</div>
					<div class="col-sm-4 text-center">
						<input type="text" id="producto" name="kword" value="{{$request->kword}}" class="form-control" placeholder="Buscar..." autofocus>
					</div>
					@if(isset($experto))
						@if($experto == "Autos" || $experto == "Autos y Motos" || $experto == "Autos, Motos y Casas")
						<div class="col-sm-2 text-center">
							<label class="control-label">Carros:</label>
							<div class="row">
								<input type="radio" @if ($request->type == "CARRO")
									checked
								@endif name="type" id="carro" value="CARRO">
							</div>
						</div>
						@endif
						@if($experto == "Motos" || $experto == "Autos y Motos" || $experto == "Autos, Motos y Casas")
						<div class="col-sm-2 text-center">
							<label class="control-label">Motos:</label>
							<div class="row">
								<input type="radio" name="type" @if ($request->type == "MOTO")
									{{-- expr --}}
									checked
								@endif id="moto" value="MOTO">
							</div>
						</div>
						@endif
					@elseif(Auth::user()->empleado->id == 1)
					<div class="col-sm-2 text-center">
							<label class="control-label">Carros:</label>
							<div class="row">
								<input type="radio" @if ($request->type == "CARRO")
									checked
								@endif name="type" id="carro" value="CARRO">
							</div>
						</div>
						<div class="col-sm-2 text-center">
							<label class="control-label">Motos:</label>
							<div class="row">
								<input type="radio" name="type" @if ($request->type == "MOTO")
									{{-- expr --}}
									checked
								@endif id="moto" value="MOTO">
							</div>
						</div>
					@endif
				</div>
				<div class="row form-group" id="filtro-carro" style="display: none">
					<div class="col-sm-3 ">
						<label class="control-label">CATEGORIA</label>
						<select name="categoria" class="form-control">
							<option value="{{null}}">Seleccionar</option>
							@foreach ($categorias as $categoria)
								<option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="row form-group" id="filtro-moto" style="display: none">
					<div class="col-sm-3 ">
						<label class="control-label">De:</label>
						<select name="cilindrada_minima" class="form-control">
							<option value="">Seleccionar</option>
							<option value="90cc">90 CC</option>
							<option value="102cc">102 CC</option>
							<option value="125cc">125 CC</option>
							<option value="135cc">135 CC</option>
							<option value="150cc">150 CC</option>
							<option value="160cc">160 CC</option>
							<option value="200cc">200 CC</option>
							<option value="220cc">220 CC</option>
							<option value="275cc">375 CC</option>
							<option value="400cc">400 CC</option>
							<option value="495cc">495 CC</option>
							<option value="650cc">650 CC</option>
							<option value="800cc">800 CC</option>
						</select>
					</div>
					<div class="col-sm-3">
							<label class="control-label">A:</label>
							<select name="cilindrada_maxima" class="form-control">
								<option value="">Seleccionar</option>
								<option value="90cc">90 CC</option>
								<option value="102cc">102 CC</option>
								<option value="125cc">125 CC</option>
								<option value="135cc">135 CC</option>
								<option value="150cc">150 CC</option>
								<option value="160cc">160 CC</option>
								<option value="200cc">200 CC</option>
								<option value="220cc">220 CC</option>
								<option value="275cc">375 CC</option>
								<option value="400cc">400 CC</option>
								<option value="495cc">495 CC</option>
								<option value="650cc">650 CC</option>
								<option value="800cc">800 CC</option>
							</select>
						</div>
						{{-- Tipos de moto --}}
					<div class="col-sm-3" >
						<label class="control-label">Tipo:</label>
						<select name="tipo_moto_id" class="form-control">
							<option value="">Seleccionar</option>
							@foreach ($tipos as $tipo)
								<option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-12 text-center">
						<button type="submit" class="btn btn-success"><i class="fa fa-search"  aria-hidden="true"></i> Buscar</button>
					</div>
				</div>
			</form>
		</div>
		<div id="productos">
			<div class="panel-body">
				<div class="col-sm-12">
					<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px">
						<tr class="info">
							<th class="col-sm-1">Identificador</th>
							<th class="col-sm-1">Categoria</th>
							<th class="col-sm-1">Marca</th>
							<th class="col-sm-4">Descripción</th>
							<th class="col-sm-2">Precio de Lista</th>
							<th class="col-sm-2">Precio de Apertura</th>
							<th class="col-sm-1">Acción</th>
						</tr>
						@if (isset($request) && count($productos) == 0)
							{{-- expr --}}
							<div class="alert alert-danger" role="alert">
							  La busqueda no dio resultado
							</div>
						@endif
						@foreach($productos as $product)
						@if(isset($product))
						<tr class="active">
							<td>{{ $product->clave }}</td>
							<td>{{ $product->categoria }}</td>
							<td>{{ $product->marca }}</td>
							<td>{{ $product->descripcion }}</td>
							<td>${{ number_format($product->precio_lista, 2) }}</td>
							<td>${{ number_format($product->apertura, 2) }}</td>
							<td class="text-center">
								<a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal{{ $product->id }}"><i class="fa fa-eye" aria-hidden="true"></i> Ver</a>
							</td>
						</tr>
						@endif
						@endforeach
					</table>
				</div>
			</div>
			<div class="panel-heading">
				{{ $productos->links() }}
			</div>
		</div>
	</div>
</div>

@foreach($productos as $producto)
<div class="modal fade" id="myModal{{ $producto->id }}" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="modal-title"><strong>Datos del Producto</strong></h4>
                    </div>
                </div>
            </div>
            <div class="modal-body">
            	@if(isset($producto))
				<div class="row">
					<div class="form-group col-sm-2 col-sm-offset-1">
						<label class="control-label">Clave:</label>
						<dd>{{ $producto->clave }}</dd>
					</div>
					<div class="form-group col-sm-2">
						<label class="control-label">Marca:</label>
						<dd>{{ $producto->marca }}</dd>
					</div>
					<div class="form-group col-sm-2">
						<label class="control-label">Descripción:</label>
						<dd>{{ $producto->descripcion }}</dd>
					</div>
					<div class="form-group col-sm-2">
						<label class="control-label">Precio de Lista:</label>
						<dd>${{ number_format($producto->precio_lista, 2) }}</dd>
					</div>
					<div class="form-group col-sm-2">
						<label class="control-label">Apertura:</label>
						<dd>${{ number_format($producto->apertura, 2) }}</dd>
					</div>
				</div>

				<div class="row">
					<form id="meses_{{$producto->id}}" method="GET" action="{{ route('clientes.producto.show', ['cliente' => $cliente, 'producto' => $producto]) }}">
						<div class="form-group col-sm-2 col-sm-offset-1">
							<div class="input-group">
								<span class="input-group-addon">
									<input type="checkbox" name="60 meses" aria-label="60 meses" {{ $producto['m60'] > 0 ? '' : 'disabled' }} >
									<label class="control-label">60 Meses:</label>
									<dd>{{ $producto['m60'] > 0 ? '$' . number_format($producto['m60'], 2) : 'N/A' }}</dd>
								</span>
							</div>
						</div>
						<div class="form-group col-sm-2">
							<div class="input-group">
								<span class="input-group-addon">
									<input type="checkbox" name="48 meses" aria-label="48 meses" {{ $producto['m48'] > 0 ? '' : 'disabled' }} >
									<label class="control-label">48 Meses:</label>
									<dd>{{ $producto['m48'] > 0 ? '$' . number_format($producto['m48'], 2) : 'N/A' }}</dd>
								</span>
							</div>
						</div>
						<div class="form-group col-sm-2">
							<div class="input-group">
								<span class="input-group-addon">
									<input type="checkbox" name="36 meses" aria-label="36 meses" {{ $producto['m36'] > 0 ? '' : 'disabled' }}>
									<label class="control-label">36 Meses:</label>
									<dd>{{ $producto['m36'] > 0 ? '$' . number_format($producto['m36'], 2) : 'N/A' }}</dd>
								</span>
							</div>
						</div>
						<div class="form-group col-sm-2">
							<div class="input-group">
								<span class="input-group-addon">
									<input type="checkbox" name="24 meses" aria-label="24 meses" {{ $producto['m24'] > 0 ? '' : 'disabled' }}>
									<label class="control-label">24 Meses:</label>
									<dd>{{ $producto['m24'] > 0 ? '$' . number_format($producto['m24'], 2) : 'N/A' }}</dd>
								</span>
							</div>
						</div>
						<div class="form-group col-sm-2">
							<div class="input-group">
								<span class="input-group-addon">
									<input type="checkbox" name="12 meses" aria-label="12 meses" {{ $producto['m12'] > 0 ? '' : 'disabled' }}>
									<label class="control-label">12 Meses:</label>
									<dd>{{ $producto['m12'] > 0 ? '$' . number_format($producto['m12'], 2) : 'N/A' }}</dd>
								</span>
							</div>
						</div>
					</form>
				</div>
				@endif
            </div>
            <div class="modal-footer">
                <div class="row text-center">
                	{{-- <div class="col-sm-3">
						<form role="form" id="form-cliente" method="POST" action="{{ route('clientes.products.transactions.store', ['cliente' => $cliente,'product' => $producto]) }}">
							{{ csrf_field() }}
							<input type="hidden" name="cliente_id" value="{{ $cliente->id }}">
							<input type="hidden" name="product_id" value="{{ $producto->id }}">
							<input class="btn btn-success" type="submit" value="Agregar al cliente">
						</form>
                	</div>--}}
					<div class="col-sm-4">
						<form role="form" id="form-cliente" method="POST" action="{{ route('enviarCorreo', ['cliente' => $cliente,'producto' => $producto]) }}">
							{{ csrf_field() }}
							<input type="hidden" name="cliente_id" value="{{ $cliente->id }}">
							<input type="hidden" name="product_id" value="{{ $producto->id }}">
							<input class="btn btn-success" type="submit" value="Enviar a Correo">
						</form>
					</div>
					<div class="col-sm-4">
						<button form="meses_{{$producto->id}}" type="submit" class="btn btn-warning">Descargar PDF</button>
					</div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                        	Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
@section('scripts')
	<script>
		
		/**
		 * Si se selecciona "moto" 
		 * se muestran los filtros de moto
		 * se ocultan los filtros de carro 
		*/

		$('#moto').change(function() {
			if ($(this).prop('checked')) {
				$('#filtro-moto').prop('style', '');
				$('#filtro-carro').prop('style', 'display: none;');
			}
		});

		/**
		 * Si se selecciona "carro" 
		 * se muestran los filtros de carro
		 * se ocultan los filtros de moto 
		*/

		$('#carro').change(function() {
			if ($(this).prop('checked')) {
				$('#filtro-moto').prop('style', 'display: none;');
				$('#filtro-carro').prop('style', '');
			}
		});

	</script>
@endsection