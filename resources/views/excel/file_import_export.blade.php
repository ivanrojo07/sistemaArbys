@extends('layouts.blank')
@section('content')

<div class="container-fluid mt-4">
	@if ( session('error') )
		<div class="alert alert-danger">
			{{session('error')}}
		</div>
	@endif
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Excel:</h4>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row text-center">
					<div class="col-sm-4 form-group">
						<a class="control-label" href="{{ route('excel-file',['type'=>'xls']) }}"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Descargar en XLS</a>
					</div>
					<div class="col-sm-4 form-group">
						<a class="control-label" href="{{ route('excel-file',['type'=>'xlsx']) }}"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Descargar en XLSX</a>
					</div>
					<div class="col-sm-4 form-group">
						<a class="control-label" href="{{ route('excel-file',['type'=>'csv']) }}"><i class="fa fa-download" aria-hidden="true"></i> Descargar en CSV</a>
					</div>
				</div>
				<form role="form" method="POST" action="{{ route('import-csv-excel') }}" accept-charset="UTF-8" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-3 form-group">
							<label for="sample_file">Seleccionar archivo a importar:</label>
						</div>
						<div class="col-sm-9 form-group">
							<input class="form-control" name="sample_file" type="file" id="sample_file" accept=".xls, .xlsx, .csv">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<input class="btn btn-success" type="submit" name="tipo" value="carros">
							<input class="btn btn-success" type="submit"name="tipo" value="motos">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection