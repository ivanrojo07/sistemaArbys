@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		@include('empleado.head')
		<ul class="nav nav-tabs nav-justified">
			<li><a href="{{ route('empleados.show', ['empleado' => $empleado]) }}">Generales:</a></li>
			<li class="active"><a href="{{ route('empleados.laborals.index', ['empleado' => $empleado]) }}">Laborales:</a></li>
			<li><a href="{{ route('empleados.estudios.index', ['empleado' => $empleado]) }}">Estudios:</a></li>
			<li><a href="{{ route('empleados.emergencias.index', ['empleado' => $empleado]) }}">Emergencias:</a></li>
			<li><a href="{{ route('empleados.vacaciones.index', ['empleado' => $empleado]) }}">Vacaciones:</a></li>
			<li><a href="{{ route('empleados.faltas.index', ['empleado' => $empleado]) }}">Administrativo:</a></li>
		</ul>
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h5>Laborales:</h5>
					</div>
				</div>
			</div>
			<form role="form" method="POST" action="{{ route('empleados.laborals.update', ['empleado' => $empleado, 'laboral' => $datoslab]) }}">
				<input type="hidden" name="_method" value="PUT">
				{{ csrf_field() }}
				<div class="panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="form-group col-sm-3">
								<label class="control-label">Fecha de Contratación:</label>
								<input class="form-control" type="date" name="contratacion" readonly="" value="{{ $datoslab->contratacion }}">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label">✱Fecha de Actualización:</label>
								<input class="form-control" type="date" name="actualizacion" required="">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label">✱Tipo de Contrato:</label>
								<select type="select" class="form-control" name="contrato_id" required="">
									<option>Sin Definir</option>
									@foreach ($contratos as $contrato)
										<option value="{{ $contrato->id }}" {{ $datoslab->contrato->id == $contrato->id ? 'selected' : '' }}>{{ $contrato->nombre }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label">✱Área:</label>
								<select type="select" class="form-control" name="area_id" required="">
									<option>Sin Definir</option>
									@foreach ($areas as $area)
										<option value="{{ $area->id }}" {{ $datoslab->area->id == $area->id ? 'selected' : '' }}>{{ $area->nombre }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label">Puesto Inicial:</label>
								<input class="form-control" type="text" name="original" readonly="" value="{{ $datoslab->original }}">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label">✱Puesto:</label>
								<select type="select" name="puesto_id" id="puesto_id" class="form-control" required="">
									<option>Sin Definir</option>
									@foreach ($puestos as $puesto)
										@if($puesto->id != 1)
											<option value="{{ $puesto->id }}">{{ $puesto->nombre }}</option>
										@endif
									@endforeach
								</select>
							</div>
							<div class="form-group col-sm-3" style="display: none;" id="region">
								<label class="control-label">Región:</label>
								<select class="form-control" id="regiones">
									<option>No Definido</option>
									@foreach($regiones as $region)
										<option value="{{ $region->id }}">{{ $region->nombre }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-sm-3" style="display: none;" id="estado">
								<label class="control-label">Estado:</label>
								<select class="form-control" id="estados">
								</select>
							</div>
							<div class="form-group col-sm-3" style="display: none;" id="oficina">
								<label class="control-label">Oficina:</label>
								<select class="form-control" id="oficinas">
								</select>
							</div>
							<div class="form-group col-sm-3" style="display: none;" id="grupo">
								<label class="control-label">Grupo:</label>
								<select class="form-control" id="grupos">
								</select>
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label">✱Salario Nominal:</label>
								<input class="form-control" type="text" name="actual" required>
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label">Salario Inicial:</label>
								<input class="form-control" type="text" name="inicial" readonly="" value="{{ $datoslab->inicial }}">
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-sm-4 col-sm-offset-4 text-center form-group">
								<button type="submit" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Guardar</button>
							</div>
							<div class="col-sm-4 text-right text-danger">
								<h5>✱Campos Requeridos</h5>
							</div>
						</div>
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
      		document.getElementById('grupo').style.display = 'none';
			$("#grupos").prop('name', '');
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
      				document.getElementById('grupo').style.display = 'block';
					$("#oficinas").prop('name', 'oficina_id');
					$("#grupos").prop('name', 'grupo_id');
    				break;
    		}

			$('#regiones').change(function() {
				var id = $('#regiones').val();
				$.ajax({
					url: "{{ url('/region2') }}/"+id,
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
					url: "{{ url('/estado2') }}/"+id,
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
					url: "{{ url('/oficina2') }}/"+id,
					type: "GET",
					dataType: "html",
					success: function(res){
						$('#grupos').html(res);
					},
					error: function (){
						$('#grupos').html('');
					}
				});
			});

    	});

    });

</script>

@endsection