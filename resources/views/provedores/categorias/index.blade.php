@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Agregar categoria</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="col-lg-6">
        <a class="btn btn-success" href="{{route('categorias.create')}}">
			<strong>Agregar categoria</strong>
		</a>
		</div>
	</div>
	@if (count($categorias) == 0)
		{{-- expr --}}
		<label>No hay categorias</label>
	@else
	<div class="jumbotron">
	<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
		<thead>
			<tr class="info">
				<th>@sortablelink('id', '#'){{-- Nombre --}}</th>
				<th>@sortablelink('nombre', 'Nombre')</th>
				<th>Operacion</th>
			</tr>
		</thead>
		@foreach($categorias as $categoria)
			<tr class="active">
				<td>
					{{ $categoria->id }}
				</td>
				<td>{{ $categoria->nombre }}</td>
				<td>
					<div class="row-8">
						<div class="col-sm-4">
							<a class="btn btn-info btn-sm" href="{{route('categoria.edit',['id'=>$categoria->id])}}">
							   <strong><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar </strong>
							</a>
						</div>
					</div>
					<form role="form" method="POST" action="{{route('categoria.delete')}}">
						{{ csrf_field() }}
						<input type="hidden" name="_method" value="DELETE">
						<input type="hidden" name="categoria_id" value="{{$categoria->id}}">
						<button type="submit" class="btn btn-info btn-sm" >
							<i class="fa fa-trash" aria-hidden="true"></i>
							<strong>
						 		Borrar
							</strong>
						</button>
					</form>
			</tr>
				</td>
			</tbody>
		@endforeach
	</table>
	</div>
	@endif
</div>

@endsection