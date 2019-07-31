@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Agregar tipos</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="col-lg-6">
        <a class="btn btn-success" href="{{route('tipos.create')}}">
			<strong>Agregar tipos</strong>
		</a>
		</div>
	</div>
	@if (count($tipos) == 0)
		{{-- expr --}}
		<label>No hay tipos</label>
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
		@foreach($tipos as $tipo)
			<tr class="active">
				<td>
					{{ $tipo->id }}
				</td>
				<td>{{ $tipo->nombre }}</td>
				<td>
					<div class="row-8">
						<div class="col-sm-4">
							<a class="btn btn-info btn-sm" 
							   href="#">
							   <strong>
							   <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar
							   </strong>
							</a>
							
						</div>
					</div>
					<form role="form" method="POST">
						{{ csrf_field() }}
						<input type="hidden" name="_method" value="DELETE">
					<a type="submit" class="btn btn-info btn-sm" >
						<i class="fa fa-trash" aria-hidden="true"></i>
						<strong>
						 Borrar
						</strong>
					</a>
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