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
			<tbody>
				<tr class="active">
					<td>
						{{ $tipo->id }}
					</td>
					<td>{{ $tipo->nombre }}</td>
					<td>
						{{-- BOTON EDITAR TIPO --}}
						<form style="display: inline-block !important;" role="form" method="GET" action="{{route('tipo.edit')}}">
							{{ csrf_field() }}
							<input type="hidden" name="tipo_id" value="{{$tipo->id}}">
							<button type="submit" class="btn btn-info btn-sm" >
								<i class="fa fa-pencil" aria-hidden="true"></i>
								<strong>Editar</strong>
							</button>
						</form>
						{{-- BOTON ELIMINAR TIPO --}}
						<form style="display: inline-block !important;" role="form" method="POST" action="{{route('tipo.delete')}}">
							{{ csrf_field() }}
							<input type="hidden" name="_method" value="DELETE">
							<input type="hidden" name="tipo_id" value="{{$tipo->id}}">
							<button type="submit" class="btn btn-info btn-sm" >
								<i class="fa fa-trash" aria-hidden="true"></i>
								<strong>
								Borrar
								</strong>
							</button>
						</form>
					</td>
				</tr>
			</tbody>
		@endforeach
	</table>
	</div>
	@endif
</div>

@endsection