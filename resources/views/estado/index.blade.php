@extends('layouts.blank')
@section('content')

<div class="container-fluid">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Estados:</h4>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-2" style="max-height: 200px; overflow-y: auto;">
						<table class="table table-sm table-striped table-bordered table-hover">
							<tr class="info">
								<th class="col-sm-2">#</th>
								<th class="col-sm-10">Estado</th>
							</tr>
							@foreach($estados as $estado)
							<tr>
								<td>{{ $estado->id }}</td>
								<td>{{ $estado->nombre }}</td>
							</tr>
							@endforeach
						</table>
					</div>
					<div class="form-group col-sm-3">
						<label for="nombre" class="control-label">Estado:</label>
						<select class="form-control" name="estado" id="estado" onChange="abre(this.value)">
							<option selected="" value="0">Seleccionar</option>
							@foreach($estados as $estado)
							<option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-sm-1">
						<label for="abreviatura" class="control-label">Abreviatura:</label>
						<input type="text" maxlength="2" class="form-control" id="abreviatura" value="" readonly="">
					</div>
					<div class="form-group col-sm-3">
						<label for="region" class="control-label">Región:</label>
						<input type="text" maxlength="2" class="form-control" id="region" value="" readonly="">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	function abre(value){
		if(value == 0) {
			$('#abreviatura').val('');
		} else {
			estados = {!! json_encode($estados) !!};
			for (var i = 0; i < estados.length; i++) {
				if(value == estados[i].id){
					$('#abreviatura').val(estados[i].abreviatura);
				}
			}
		}
	}

	$(document).ready(function() {
		$( "#estado" ).on('change', function() {
			estado =$('#estado').val();
			$.ajax({
				url: 'estado/'+estado,
				type: "GET",
				success: function(res){
					$('#region').val(res);
				},
				error: function (){
					$('#region').val('');
				}
			});
		});
	});
</script>

@endsection