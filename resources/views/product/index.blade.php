@extends('layouts.app')
@section('content')
	{{-- expr --}}
	<div class="container">
	<div class="jumbotron">
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
			@foreach($productos as $producto)
				<tr class="active">
					<td>
						{{ $producto->clave }}
					</td>
					<td>{{ $producto->marca }}</td>
					<td>{{ $producto->descripcion }}</td>
					<td>$ {{ number_format($producto->precio_lista,2) }}</td>
					<td>$ {{number_format($producto->apertura,2)}}</td>
					<td>
						$ {{number_format($producto->inicial,2)}}
					</td>
					<td>
						<a class="btn btn-success btn-sm" href=""><i class="fa fa-eye" aria-hidden="true"></i> Más información</a>
					</td>
				</tr>
				</tbody>
			@endforeach
		</table>
	</div>
	{{ $productos->links() }}
</div>
@endsection