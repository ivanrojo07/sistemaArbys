@extends('layouts.blank') 
@section('content')
<div class="container">

	@if (session('success'))
		<div class="alert alert-success">
			{{session('success')}}
		</div>
	@endif

	<div class="panel-body">
		<div class="col-lg-6">
		</div>
		<div class="col-lg-6">
			<a class="btn btn-success" href="#">
				<strong>Agregar categoria</strong>
			</a>
		</div>
	</div>

	@if (!count($categoriasMotos))
		<label for="">No hay categorias añadidas</label>
	@else

	<div class="jumbotron">
			<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
				<thead>
					<tr class="info">
						<th class="text-center">Nombre</th>
						<th class="text-center">Editar</th>
						<th class="text-center">Eliminar</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($categoriasMotos as $categoriaMoto)
					<tr>
						<td>{{$categoriaMoto->nombre}}</td>
						<td class="text-center"><a href="{{route('precargas.carros.edit',['categoriaCarro'=>$categoriaMoto])}}" class="btn btn-warning">Editar</a></td>
						<td class="text-center"><a href="#" class="btn btn-danger">Eliminar</a></td>
					</tr
					@endforeach>
				</tbody>
			</table>
	</div>

	@endif

</div>
@endsection