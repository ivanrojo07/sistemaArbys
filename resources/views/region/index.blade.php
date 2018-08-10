@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Regiones:</h4>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-4">
						<table class="table table-striped table-bordered table-hover"style="">
							<tr class="info">
								<th class="col-sm-2">#</th>
								<th class="col-sm-10">Región</th>
							</tr>
							@foreach($regiones as $region)
							<tr>
								<td>{{ $region->id }}</td>
								<td>{{ $region->nombre }}</td>
							</tr>
							@endforeach
						</table>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-2 col-sm-offset-4">
						<label for="nombre" class="control-label">Región:</label>
						<select class="form-control" name="region" id="region" onChange="abre(this.value)">
							<option selected="" value="0">Seleccionar</option>
							@foreach($regiones as $region)
							<option value="{{ $region->id }}">{{ $region->nombre }}</option>
							@endforeach
						</select>

					</div>
					<div class="form-group col-sm-2">
						<label for="abreviatura" class="control-label">Abreviatura:</label>
						<input type="text" maxlength="2" class="form-control" id="abreviatura" value="" readonly="">
					</div>
				</div>
			</div>
		</div>
		<div id="estados" class="panel-default"></div>
	</div>
</div>

<script>
	function abre(value){
		if(value == 0) {
			$('#abreviatura').val('');
		} else {
			regiones = {!! json_encode($regiones) !!};
			for (var i = 0; i < regiones.length; i++) {
				if(value == regiones[i].id){
					$('#abreviatura').val(regiones[i].abreviatura);
				}
			}
		}
	}


	$(document).ready(function() {
		$( "#region" ).on('change', function() {
			region =$('#region').val();
			$.ajax({
				url: 'region/'+region,
				type: "GET",
				dataType: "html",
				success: function(res){
					$('#estados').html(res);
				},
				error: function (){
					$('#estados').html('');
				}
			});
		});
	});
</script>

@endsection