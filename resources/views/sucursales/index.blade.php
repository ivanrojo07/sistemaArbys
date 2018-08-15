@extends('layouts.test')
@section('content1')

<div class="container">
	<div role="application" class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Sucursales:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a class="btn btn-success" href="{{ route('sucursales.create') }}"><strong>Nueva Sucursal</strong></a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
							<tr class="info">
								<th class="col-sm-1">CLAVE ID</th>
								<th class="col-sm-2">Nombre</th>
								<th class="col-sm-2">Responsable</th>
								<th class="col-sm-2">Regiòn</th>
								<th class="col-sm-2">Estado</th>
								<th class="col-sm-2 text-center">Acciones</th>
							</tr>
							@foreach($sucursales as $sucursal)
					       	<tr>
								<td>{{$sucursal->claveid}}</td>
								<td>{{$sucursal->nombre}}</td>
								<td>{{$sucursal->responsable}}</td>
								<td>{{$sucursal->region}}</td>
								<td>{{$sucursal->estado}}</td>
								<td class="text-center">
									<a href="{{ route('sucursales.show',['sucursal'=>$sucursal]) }}">
										<button class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button>
									</a>
									<a href="{{ route('sucursales.edit',['sucursal'=>$sucursal->id]) }}">
										<button class="btn btn-danger btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button>
									</a>
								</td>
							</tr>
							@endforeach
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection