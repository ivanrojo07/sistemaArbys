	@extends('layouts.test')
@section('content1')

	<div class="container">
		<div class="panel-body">
			<div class="col-lg-6">
				
				<div class="panel-heading">
					
					
					<a class="btn btn-success" href="{{ route('sucursales.create') }}"><strong>Nueva Sucursal</strong></a>
				</div>

			</div>
		</div>
		<div id="datos" name="datos" class="jumbotron">
			<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
				<thead>

					<tr class="info">
						<th>CLAVE ID</th>
						<th>Nombre</th>
						<th>Responsable</th>
						<th>Regiòn</th>
						<th>Estado</th>
						<th>Operaciones</th>
					</tr>

				</thead>
				<tbody>


					@foreach($sucursales as $sucursal)
                   <tr>
						<th>{{$sucursal->claveid}}</th>
						<th>{{$sucursal->nombre}}</th>
						<th>{{$sucursal->responsable}}</th>
						<th>{{$sucursal->region}}</th>
						<th>{{$sucursal->estado}}</th>

						<th>
							
							<a class="btn btn-success btn-sm" 
							   href="{{ route('sucursales.show',['sucursal'=>$sucursal]) }}">

								<i class="fa fa-eye" aria-hidden="true"></i> 
								<strong>Ver
							</strong></a>

							<a class="btn btn-info btn-sm" href="{{ route('sucursales.edit',['sucursal'=>$sucursal->id]) }}">
								
								<i class="fa fa-pencil-square-o" aria-hidden="true"></i> <strong>Editar</strong>
							</a>
						</th>

					</tr>	
					@endforeach



				</tbody>

			</table>
		</div>
	</div>

@endsection



