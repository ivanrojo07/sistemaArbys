@extends('layouts.blank')
@section('content')
	{{-- expr --}}
	<div class="container clearfix">
		<div class="row">
			<div class="panel-body">
				<div class="col-lg-6">
					<form action="">
						<div class="input-group">

							<input type="text" 
								   id="producto" 
							       name="query" 
							       class="form-control" 
							       placeholder="Buscar..."
							       autofocus
					               onKeypress="if(event.keyCode == 13) event.returnValue = false;">
					        <span class="input-group-btn">
								<a readonly class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></a>
							</span>

							<!-- <span class="input-group-btn">
								<button class="btn btn-default" type="submit"> <i class="fa fa-search" aria-hidden="true"></i> </button>
							</span> -->
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<div class="container">

	<div class="jumbotron" id="datos" name="datos">


		<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
			<thead>
				<tr class="info">
					<th>@sortablelink('clave', 'Identificador'){{-- Clave --}}</th>
					<th>@sortablelink('marca', 'Marca')</th>
					<th>@sortablelink('descripcion', 'Descripción')</th>
					<th>@sortablelink('precio_lista', 'Precio de Lista')</th>
					<th>@sortablelink('apertura', 'Precio de Apertura') </th>
					<th>@sortablelink('inicial','Precio Inicial')</th>
					<th>Operacion</th>
				</tr>
			</thead>
			@foreach($productos as $product)
				<tr class="active">
					<td>
						{{ $product->clave }}
					</td>
					<td>{{ $product->marca }}</td>
					<td>{{ $product->descripcion }}</td>
					<td>$ {{ number_format($product->precio_lista,2) }}</td>
					<td>$ {{number_format($product->apertura,2)}}</td>
					<td>
						$ {{number_format($product->inicial,2)}}
					</td>
					<td>
						<a class="btn btn-success btn-sm" href="{{ route('productos.show',['product'=>$product]) }}"><i class="fa fa-eye" aria-hidden="true"></i> Más información</a>
					</td>
				</tr>
				</tbody>
			@endforeach
		</table><br>
{{ $productos->links() }}
	</div>
	

</div>



@endsection