@extends('layouts.app')
@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">Excel</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<a href="{{ route('excel-file',['type'=>'xls']) }}">Descargar en archivo xls</a>
					<a href="{{ route('excel-file',['type'=>'xlsx']) }}">Descargar en archivo xlsx</a>
					<a href="{{ route('excel-file',['type'=>'csv']) }}">Descargar en archivo csv</a>
				</div>
			</div>
			<form role="form" method="POST" action="{{ route('import-csv-excel') }}" accept-charset="UTF-8" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					
					<label for="sample_file" class="col-md-3">Select File to Import:</label>
					<div class="col-md-9">
                    <input class="form-control" name="sample_file" type="file" id="sample_file">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-top: 10px;">
			<input class="btn btn-primary" type="submit" value="Upload">
			</div>
                    </div>
				</div>
			</form>
		</div>
	</div>
@endsection