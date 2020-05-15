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
									<input class="form-control" name="sample_file" type="file" id="sample_file"
										accept=".xls, .xlsx, .csv">
								</div>
							</div>
							<div class="row">
								<div class="col-12 col-md-12">
									<label for="">Mes a subir la lista</label>
									<select name="mes_lista" id="inputMesLista" class="form-control" required>
										<option value="">Seleccionar</option>
										<option value="01">Enero</option>
										<option value="02">Febrero</option>
										<option value="03">Marzo</option>
										<option value="04">Abril</option>
										<option value="05">Mayo</option>
										<option value="06">Junio</option>
										<option value="07">Julio</option>
										<option value="08">Agosto</option>
										<option value="09">Septiembre</option>
										<option value="10">Octubre</option>
										<option value="11">Noviembre</option>
										<option value="12">Diciembre</option>
									</select>
								</div>
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
	$(document).on('change','#inputMesLista, #sample_file', function(){
	const archivoExcel = $('#sample_file').val();

	const mes_lista = $('#inputMesLista').val()

	if( isNaN( parseInt(mes_lista) ) ){
		$('.botonSubirExcel').each( function(){
				console.log( $(this).val() );
				$(this).prop("disabled", true);
			} );
		return
		console.log('si es nan');
	}

	var request = $.ajax({
		url: '/api/productos',
		type: 'GET',
		data: { mes_lista } ,
		contentType: 'application/json; charset=utf-8'
	});



	request.done(function(data) {
		console.log(data)

		if( data.totalProductos > 0 ){
			swal(
				"El mes que elegiste cuenta con productos",
				"Si guardas la lista podrías sobreescribir los datos",
				"warning");
			return
		}

		if( archivoExcel ){
			$('.botonSubirExcel').each( function(){
				console.log( $(this).val() );
				$(this).prop("disabled", false);
			} );
		}

	});

	request.fail(function(jqXHR, textStatus) {
		console.log( jqXHR, textStatus )
	});

});


</script>

@endsection