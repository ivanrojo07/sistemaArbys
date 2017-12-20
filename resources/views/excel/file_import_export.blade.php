@extends('layouts.blank')
@section('content')
<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">Excel</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<h4>
						
						<a class="label label-info label-bs" href="{{ route('excel-file',['type'=>'xls']) }}"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Descargar en archivo xls</a>
						<a class="label label-info" href="{{ route('excel-file',['type'=>'xlsx']) }}"> <i class="fa fa-file-excel-o" aria-hidden="true"></i> Descargar en archivo xlsx</a>
						<a class="label label-info" href="{{ route('excel-file',['type'=>'csv']) }}"><i class="fa fa-download" aria-hidden="true"></i> Descargar en archivo csv</a>
					</h4>
				</div>
			</div>
			<form role="form" method="POST" action="{{ route('import-csv-excel') }}" accept-charset="UTF-8" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					
					<label for="sample_file" class="col-md-3">Seleccionar archivo a importar:</label>
					<div class="col-md-9">
                    <input class="form-control" name="sample_file" type="file" id="sample_file" accept=".xls, .xlsx, .csv">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-top: 10px;">
			<input class="btn btn-primary" type="submit" value="Importar">
			</div>
                    </div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection