@extends('layouts.blank')

@section('content')
<div class="container clearfix">
		<div class="row">
	<div class="panel-body">
			<div class="col-xs-12">
			<form action="{{ url('personal') }}">
				<div class="input-group">

					<input type="text" 
					       name="query" 
					       id="personal" 
					       class="form-control" 
					       placeholder="Buscar..."
					       autofocus=""> 
			
					<!-- <span class="input-group-btn">
						<button class="btn btn-default" type="submit"> <i class="fa fa-search" aria-hidden="true"></i> </button>
					</span> -->	
			<div class="col-xs-3">

				<input id="boton-toggle" 
				       href="/clientes" 
				       type="checkbox" 
				       data-toggle="toggle" 
				       data-on="Sí" 
				       data-off="No" 
				       data-style="ios" 
				       checked="true" 
				       name="cliente" 
				       id="tgCliente" 
				       class="intro">

				<label>&nbsp;&nbsp;Clientes
			</label>

		</div>
		<div  class="col-xs-3">

				<input href="/prospectos" 
				       id="boton-toggle" 
				       type="checkbox" 
				       data-toggle="toggle" 
				       data-on="Sí" 
				       name="prospecto" 
				       data-off="No" 
				       data-style="ios" 
				       checked="true" 
				       id="tgProspecto"
				       class="ortni">

				<label>&nbsp;&nbsp;Prospectos
			</label>
		
					</div>	
				</div>	
			</form>
	</div>
</div>
</div>


	<div class="jumbotron" id="datos" name="datos">
		<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
			<thead>
				<tr class="info">
					<th>@sortablelink('id','#')</th>
					<th>@sortablelink('nombre', 'Nombre/Razón Social'){{-- Nombre --}}</th>
					<th>@sortablelink('prioridad', 'Prioridad')</th>
					<th>@sortablelink('tipo', 'Tipo de cliente')</th>
					<th>@sortablelink('calificacion', 'Calificación')</th>
					<th>@sortablelink('mail', 'Correo')</th>
					<th>@sortablelink('created_at','Fecha de alta')</th>
					<th>@sortablelink('producto','Producto')
					<th>Operacion</th>
				</tr>
			</thead>
			@foreach($personals as $personal)
				<tr class="active">
					<td>{{$personal->id}}</td>
					<td>
						@if ($personal->tipopersona == "Fisica")
						{{$personal->nombre}} {{ $personal->apellidopaterno }} {{ $personal->apellidomaterno }}
						@else
						{{$personal->razonsocial}}
						@endif
					</td>
					<td>{{ $personal->prioridad }}</td>
					<td>{{ $personal->tipo }}</td>
					<td>{{ strtoupper($personal->calificacion) }}</td>
					<td>{{$personal->mail}}</td>
					<td>{{$personal->created_at}}</td>
					<td></td>
					<td>
						<a class="btn btn-success btn-sm" href="{{ route('personals.show',$personal) }}"><i class="fa fa-eye" aria-hidden="true"></i> Ver</a>
						<a class="btn btn-info btn-sm" href="{{ route('personals.edit', $personal) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
				</tr>
					</td>
				</tbody>
			@endforeach
		</table>
	</div>


	{{ $personals->links() }}
</div>
<script>
	
</script>
@endsection