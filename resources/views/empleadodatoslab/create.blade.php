@extends('layouts.infoempleado')
@section('infoempleado')

<div>
	<ul class="nav nav-pills nav-justified">
		<li role="presentation" class=""><a href="{{ route('empleados.show',['empleado'=>$empleado]) }}"  class="ui-tabs-anchor">Generales:</a></li>

		<li role="presentation" class="active"><a href="{{ route('empleados.datoslaborales.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Laborales:</a></li>

		<li role="presentation" class=""><a href="{{ route('empleados.estudios.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Estudios:</a></li>

		<li role="presentation" class=""><a href="{{ route('empleados.emergencias.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Emergencias:</a></li>

		<li role="presentation" class=""><a href="{{ route('empleados.vacaciones.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Vacaciones:</a></li>

		<li role="presentation" class=""><a href="{{ route('empleados.faltas.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Administrativo:</a></li>
	</ul>
</div>
<div class="panel-default">
	<div class="panel-heading">
		<h5>Laborales:&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</h5></div>
		<div class="panel-body">
			@if($edit)
			<form role="form" method="POST" action="{{ route('empleados.datoslaborales.store',['empleado'=>$empleado]) }}">
				{{ csrf_field() }}
			@else
				{{-- false expr --}}
			<form role="form" method="POST" action="{{ route('empleados.datoslaborales.store',['empleado'=>$empleado]) }}">
				{{ csrf_field() }}
			@endif
				<input type="hidden" name="empleado_id" value="{{ $empleado->id }}">
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label" for="fechacontratacion"><i class="fa fa-asterisk" aria-hidden="true"></i>Fecha de contratación:</label>
						<input class="form-control" type="date" id="fechacontratacion" name="fechacontratacion" value="{{ $datoslab->fechacontratacion }}" required
						<?php
							if($edit) echo ' readonly';
						?>
						>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="contrato">Tipo de contrato:</label>
						<select type="select" class="form-control" name="contrato_id" id="contrato_id">
							<option>Sin Definir</option>
							@foreach ($contratos as $contrato)
							<option value="{{ $contrato->id }}"
							<?php
								if($datoslab->contrato_id == $contrato->id) echo ' selected';
							?>
							>{{ $contrato->nombre }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="area_id">Área:</label>
						<select type="select" class="form-control" name="area_id" id="area_id">
							<option>Sin Definir</option>
							@foreach ($areas as $area)
							<option value="{{ $area->id }}"
							<?php
								if($datoslab->area_id == $area->id) echo ' selected';
							?>
							>{{ $area->nombre }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="puesto_id">Puesto:</label>
						<select type="select" name="puesto_id" id="puesto_id" class="form-control" >
							<option>Sin Definir</option>
							@foreach ($puestos as $puesto)
							@if($puesto->id != 1)
							<option value="{{ $puesto->id }}"
							<?php
								if($datoslab->puesto_id == $puesto->id) echo ' selected';
							?>
							>{{ $puesto->nombre }}</option>
							@endif
							@endforeach
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3" id="region" style="display: none;">
						<label class="control-label">Región:</label>
						<select id="regiones" class="form-control">
							<option>No Definido</option>
							@foreach($regiones as $region)
							<option value="{{ $region->id }}">{{ $region->nombre }}</option>
							@endforeach
						</select>
						<br>
					</div>
					<div class="col-sm-3" id="estado" style="display: none;">
						<label class="control-label">Estado:</label>
						<select id="estados" class="form-control">
						</select>
					</div>
					<div class="col-sm-3" id="oficina" style="display: none;">
						<label class="control-label">Oficina:</label>
						<select id="oficinas" class="form-control">
						</select>
					</div>
					<div class="col-sm-3" id="subgerente" style="display: none;">
						<label class="control-label">Subgerente:</label>
						<select id="subgerentes" class="form-control">
						</select>
					</div>
				</div>
				<div class="row text-center">
					<div class="col-sm-12">
						<button type="submit" class="btn btn-success">
							<strong>Guardar</strong>	
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

    	$('#puesto_id').change(function() {
    		var val = parseInt(document.getElementById("puesto_id").value);
      		document.getElementById('region').style.display = 'none';
			$("#regiones").prop('name', '');
      		document.getElementById('estado').style.display = 'none';
			$("#estados").prop('name', '');
      		document.getElementById('oficina').style.display = 'none';
			$("#oficinas").prop('name', '');
      		document.getElementById('subgerente').style.display = 'none';
			$("#subgetentes").prop('name', '');
    		switch(val) {
    			case 3:
      				document.getElementById('region').style.display = 'block';
      				$("#regiones").prop('name', 'region_id');
    				break;
    			case 4:
      				document.getElementById('region').style.display = 'block';
      				document.getElementById('estado').style.display = 'block';
					$("#estados").prop('name', 'estado_id');
    				break;
    			case 5:
      				document.getElementById('region').style.display = 'block';
      				document.getElementById('estado').style.display = 'block';
      				document.getElementById('oficina').style.display = 'block';
					$("#oficinas").prop('name', 'oficina_id');
    				break;
    			case 6:
      				document.getElementById('region').style.display = 'block';
      				document.getElementById('estado').style.display = 'block';
      				document.getElementById('oficina').style.display = 'block';
					$("#oficinas").prop('name', 'oficina_id');
    				break;
    			case 7:
      				document.getElementById('region').style.display = 'block';
      				document.getElementById('estado').style.display = 'block';
      				document.getElementById('oficina').style.display = 'block';
      				document.getElementById('subgerente').style.display = 'block';
					$("#oficinas").prop('name', 'oficina_id');
					$("#subgerentes").prop('name', 'subgerente');
    				break;
    		}

			$('#regiones').change(function() {
				var id = $('#regiones').val();
				$.ajax({
					url: '../../../../region2/' + id,
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

			$('#estados').change(function() {
				var id = $('#estados').val();
				$.ajax({
					url: '../../../../estado2/' + id,
					type: "GET",
					dataType: "html",
					success: function(res){
						$('#oficinas').html(res);
					},
					error: function (){
						$('#oficinas').html('');
					}
				});
			});

			$('#oficinas').change(function() {
				var id = $('#oficinas').val();
				$.ajax({
					url: '../../../../oficina2/' + id,
					type: "GET",
					dataType: "html",
					success: function(res){
						$('#subgerentes').html(res);
					},
					error: function (){
						$('#subgerentes').html('');
					}
				});
			});

    	});

    });
</script>

@endsection