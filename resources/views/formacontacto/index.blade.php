@extends('layouts.blank')
@section('content')
<div class="container">
	<div class="panel-body">
		<div class="col-lg-6">
			<form action="buscarformacontacto">
				<div class="input-group">
					<input type="text" name="query" class="form-control" placeholder="Buscar..." autofocus>
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit"> <i class="fa fa-search" aria-hidden="true"></i> </button>
					</span>
				</div>
			</form>
		</div>
		<div class="col-lg-6">
			<a class="btn btn-success" href="{{ route('formacontactos.create') }}">
			<strong>Agregar Forma de Contacto</strong>
		</a>
		</div> 
	</div>
	@if (count($formaContactos) == 0)
		{{-- true expr --}}
		<label>No hay forma de contactos añadidos</label>
	@else
		{{-- false expr --}}
	<div class="jumbotron">
		<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
			<thead>
				<tr class="info">
					<th>@sortablelink('id', '#'){{-- Nombre --}}</th>
					<th>@sortablelink('nombre', 'Nombre')</th>
					<th>@sortablelink('etiqueta', 'Etiqueta')</th>
					<th>Operacion</th>
				</tr>
			</thead>
			@foreach($formaContactos as $formaContacto)
				<tr class="active">
					<td>
						{{ $formaContacto->id }}
					</td>
					<td>{{ $formaContacto->nombre }}</td>
					<td>{{ $formaContacto->etiqueta }}</td>
					<td>
						<div class="row-8">
							<div class="col-sm-4">
								<a class="btn btn-info btn-sm" href="{{ route('formacontactos.edit',['formaContacto'=>$formaContacto]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
							<strong>Editar</strong>	 </a>
								
							</div>
						</div>
						<form role="form" id="eliminar {{ $formaContacto->id }}" method="POST" action="{{ route('formacontactos.destroy',['formaContacto'=>$formaContacto]) }}">
							{{ csrf_field() }}
							<input type="hidden" name="_method" value="DELETE">
						<a type="submit" onclick="deleteFunction('eliminar {{ $formaContacto->id }}')" class="btn btn-info btn-sm" ><i class="fa fa-trash" aria-hidden="true"></i><strong> Borrar</strong></a>
						</form>
				</tr>
					</td>
				</tbody>
			@endforeach
		</table>
	</div>
	{{ $formaContactos->links()}}
	@endif
</div>
@endsection