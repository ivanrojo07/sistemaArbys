@extends('layouts.blank')
@section('content')

<div class="container-fluid mt-4">
	@if ( session('error') )
	<div class="alert alert-danger">
		{{session('error')}}
	</div>
	@endif

	<br>
	<div class="row">
		<div class="col-12 col-md-4">

			<div class="panel panel-group">
				<div class="panel-default">
					<div class="panel-heading">
						<h4>Excel:</h4>
					</div>
					<div class="panel-body">
						<div class="row text-center">
							<!--<div class="col-sm-12 col-md-4 form-group">
								<a class="control-label" href="{{ route('excel-file',['type'=>'xls']) }}"><i
										class="fa fa-file-excel-o" aria-hidden="true"></i> Descargar en XLS</a>
							</div>-->
							<div class="col-sm-12 col-md-4 form-group">
								<a class="control-label" href="{{ route('excel-file',['type'=>'xlsx']) }}"><i
										class="fa fa-file-excel-o" aria-hidden="true"></i> Descargar en XLSX</a>
							</div>
							<div class="col-sm-12 col-md-4 form-group">
								<a class="control-label" href="{{ route('excel-file',['type'=>'csv']) }}"><i
										class="fa fa-download" aria-hidden="true"></i> Descargar en CSV</a>
							</div>
						</div>
						<form role="form" method="POST" action="{{ route('import-csv-excel') }}" accept-charset="UTF-8"
							enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-sm-12 form-group">
									<label for="sample_file">Seleccionar archivo a importar:</label>
									<input class="form-control" name="sample_file" type="file" id="inputArchivo"
										accept=".xls, .xlsx, .csv">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12" style="margin-top: 1em">
									<input class="btn btn-success botonSubirExcel" type="submit" name="tipo"
										value="carros" disabled>
									<input class="btn btn-success botonSubirExcel" type="submit" name="tipo"
										value="motos" disabled>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>
		<div class="col-12 col-md-8">
			<div class="table-responsive">
				<table class="table border" id="tabla-lista-productos">
					<thead class="thead-dark">
						<tr>
							<th scope="col"># MOV.</th>
							<th scope="col">Responsable</th>
							<th scope="col">Fecha</th>
							<th scope="col">Productos</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($listasProductos as $lista)
						<tr>
							<th scope="row">{{$lista->id}}</th>
							<td>{{$lista->user->empleado->nombre_completo}}</td>
							<td>{{$lista->created_at}}</td>
							<td>
								<button class="btn btn-primary" data-toggle="modal" data-target="#lista-{{$lista->id}}">
									<i class="fa fa-th-large" aria-hidden="true"></i>
								</button>

								<!-- Modal -->
								<div class="modal fade" id="lista-{{$lista->id}}" tabindex="-1" role="dialog"
									aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Lista # {{$lista->id}}
												</h5>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-xs-12">
														<div class="row">
															<div class="col-xs-12 col-md-6">
																<label for="">Responsable</label>
																<input type="text" class="form-control" value="{{$lista->user->empleado->nombre_completo}}" readonly>
															</div>
															<div class="col-xs-12 col-md-6">
																<label for="">Fecha de creación</label>
																<input type="text" class="form-control" value="{{$lista->created_at}}" readonly>
															</div>
														</div>
													</div>
													<br><br><hr>
													<div class="col-xs-12">
														<div class="table-responsive">
															<table class="table tablaProductos">
																<thead>
																	<tr>
																		<th scope="col">ID</th>
																		<th scope="col">Clave</th>
																		<th scope="col">Descripcion</th>
																		<th scope="col">Precio</th>
																		<th scope="col">Apertura</th>
																		<th scope="col">Marca</th>
																		<th scope="col">Tipo</th>
																		<th scope="col">¿Mostrar?</th>
																	</tr>
																</thead>
																<tbody>
																	@foreach ($lista->productos as $producto)
																	<tr>
																		<th scope="row">{{$producto->id}}</th>
																		<td>{{$producto->clave}}</td>
																		<td>{{$producto->descripcion}}</td>
																		<td>{{$producto->precio_lista}}</td>
																		<td>{{$producto->apertura}}</td>
																		<td>{{$producto->marca}}</td>
																		<td>{{$producto->tipo}}</td>
																		<td>{{$producto->mostrar ? 'Sí' : 'No'}}</td>
																	</tr>
																	@endforeach
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary"
													data-dismiss="modal">Close</button>
												<button type="button" class="btn btn-primary">Save changes</button>
											</div>
										</div>
									</div>
								</div>

							</td>
						</tr>
						@endforeach
					</tbody>
					{{$listasProductos->links()}}
				</table>
			</div>
		</div>
	</div>


</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
	$(document).on('change','#inputArchivo',function(){

	$(".botonSubirExcel").each( function(){
		$(this).attr('disabled',false)
	} );

});

</script>

@endsection

@section('scripts')
<script>

$(document).ready(function(){
	$('.tablaProductos').each( function(){
		$(this).DataTable({
			pageLength: 4,
		});
	} );
});

</script>
@endsection