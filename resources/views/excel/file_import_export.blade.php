@extends('layouts.blank')
@section('content')

<div class="container-fluid mt-4">
	@if ( session('error') )
	<div class="alert alert-danger">
		{{session('error')}}
	</div>
	@endif

	<div class="row">
		<div class="col-12 col-md-4"></div>
		<div class="col-12 col-md-4">

			<div class="panel panel-group">
				<div class="panel-default">
					<div class="panel-heading">
						<h4>Excel:</h4>
					</div>
					<div class="panel-body">
						<div class="row text-center">
							<div class="col-sm-12 col-md-4 form-group">
								<a class="control-label" href="{{ route('excel-file',['type'=>'xls']) }}"><i
										class="fa fa-file-excel-o" aria-hidden="true"></i> Descargar en XLS</a>
							</div>
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
		<div class="col-12 col-md-4"></div>
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