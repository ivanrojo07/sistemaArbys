@extends('layouts.blank') 
@section('content')
<div class="container">

	<div class="panel-body">
		<div class="col-lg-6">
		</div>
		<div class="col-lg-6">
			<a class="btn btn-success" href="{{route('precargas.carros.create')}}">
				<strong>Agregar categoria</strong>
			</a>
		</div>
	</div>

	@if (count($categoriasCarros))
		<label for="">No hay categorias añadidas</label>
	@else

	<div class="jumbotron">
			<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
				<thead>
					<tr class="info">
						<th>Nombre</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th>1</th>
						<th>2</th>
						<th>3</th>
					</tr>
				</tbody>
			</table>
	</div>

	@endif

</div>
@endsection