@extends('layouts.blank') 
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Vendedores:</h4>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-3 form-group">
						<div class="input-group">
							<input type="text" id="buscador" class="form-control" autofocus placeholder="Buscar...">
					        <span class="input-group-btn">
								<a class="btn btn-default" onclick="buscar()">
									<i class="fa fa-search"></i>
								</a>
							</span>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="row">
							<div class="col-sm-12">
								<input type="radio" name="status" value="Baja"> Baja
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<input type="radio" name="status" value="Activo"> Activo
							</div>
						</div>
					</div>
				</div>
				<div id="vendedores">
					<div class="row">
						<div class="col-sm-12">
							<table class="table table-stripped table-bordered table-hover" style="margin-bottom: 0px;">
								<tr class="info">
									<th>Nombre</th>
									<th>Apellido Paterno</th>
									<th>Apellido Materno</th>
									<th>Oficina</th>
									<th>Estado</th>
								</tr>
								@foreach($vendedores as $vendedor)
									<tr>
										<td>{{ $vendedor->empleado->nombre }}</td>
										<td>{{ $vendedor->empleado->appaterno }}</td>
										<td>{{ $vendedor->empleado->apmaterno ? $vendedor->empleado->apmaterno : 'N/A' }}</td>
										<td>{{ $vendedor->empleado->laborales->last()->oficina->nombre }}</td>
										<td>{{ $vendedor->status }}</td>
									</tr>
								@endforeach
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Clientes:</h4>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<table class="table table-stripped table-bordered table-hover" style="margin-bottom: 0px;">
							<tr class="info">
								<th>Nombre</th>
								<th>Apellido Paterno</th>
								<th>Apellido Materno</th>
								<th>Vendedor</th>
								<th>Acción</th>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection