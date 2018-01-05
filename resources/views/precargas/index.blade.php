@extends('layouts.blank')
@section('content')
	<div class="container">
		<div class="panel-body">
			<div class="col-lg-6">
				<form action="{{ $buscar }}">
					<div class="input-group">
						<input type="text" 
						       name="query" 
						       class="form-control" 
						       placeholder="Buscar..."
						       autofocus="true">
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i>
							</button>
						</span>
					</div>
				</form>
			</div>
			<div class="col-lg-6">
				<a class="btn btn-success" href="{{ route($agregar) }}">
				<strong>Agregar {{$titulo}}</strong>
			</a>
			</div>
		</div>
		@if (count($precargas) == 0)
			{{-- expr --}}
			<label>No hay {{$titulo}} añadidos</label>
		@else
		<div class="jumbotron">
		<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
			<thead>
				<tr class="info">
					<th>@sortablelink('id', '#'){{-- Nombre --}}</th>
					<th>@sortablelink('nombre', 'Nombre')</th>
					<th>@sortablelink('abreviatura', 'Abreviatura')</th>
					<th>Operacion</th>
				</tr>
			</thead>
			@foreach($precargas as $precarga)
				<tr class="active">
					<td>
						{{ $precarga->id }}
					</td>
					<td>{{ $precarga->nombre }}</td>
					<td>{{ $precarga->abreviatura }}</td>
					<td>
						<div class="row-8">
							<div class="col-sm-4">
								<a class="btn btn-info btn-sm" 
								   href="{{ route($editar,['precarga'=>$precarga]) }}">
								   <strong>
								   <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar
								   </strong>
								</a>
								
							</div>
						</div>
						<form role="form" id="eliminar {{ $precarga->id }}" method="POST" action="{{ route($borrar,['precarga'=>$precarga]) }}">
							{{ csrf_field() }}
							<input type="hidden" name="_method" value="DELETE">
						<a type="submit" onclick="deleteFunction('eliminar {{ $precarga->id }}')" class="btn btn-info btn-sm" >
							
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
	{{ $precargas->links()}}
		@endif
	</div>
@endsection