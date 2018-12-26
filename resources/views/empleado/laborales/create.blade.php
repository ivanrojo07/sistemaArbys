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
		</div>
		<div class="panel-default">
			<form role="form" method="POST" action="{{ route('empleados.laborals.store', ['empleado' => $empleado]) }}">
				{{ csrf_field() }}
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-sm-3">
							<label class="control-label">✱Fecha de contratación:</label>
							<input class="form-control" type="date" id="contratacion" name="contratacion" required="">
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label">✱Tipo de contrato:</label>
							<select type="select" class="form-control" name="contrato_id" id="contrato_id" required="">
								<option>Sin Definir</option>
								@foreach ($contratos as $contrato)
									<option value="{{ $contrato->id }}">{{ $contrato->nombre }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label">✱Área:</label>
							<select type="select" class="form-control" name="area_id" id="area_id" required="">
								<option>Sin Definir</option>
								@foreach ($areas as $area)
									<option value="{{ $area->id }}">{{ $area->nombre }}</option>
								@endforeach
							</select>
						</div>
						@php($p = Auth::user()->empleado->laborales->last()->puesto_id)
						<div class="form-group col-sm-3">
							<label class="control-label">✱Puesto:</label>
							<select type="select" name="puesto_id" id="puesto_id" class="form-control" required="">
								<option>Sin Definir</option>
								@foreach ($puestos as $puesto)
									@if($p != 1 && $puesto->id == 1)
									@elseif($p != 1 && $puesto->id == 2)
									@elseif($puesto->id == 3 && ($p != 1 || $p != 2))
									@else
										<option value="{{ $puesto->id }}">{{ $puesto->nombre }}</option>
									@endif
								@endforeach
							</select>
						</div>
						<div class="form-group col-sm-3" id="region" style="display: none;">
							<label class="control-label">Región:</label>
							<select id="regiones" class="form-control">
								<option>No Definido</option>
								@foreach($regiones as $region)
									<option value="{{ $region->id }}">{{ $region->nombre }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col-sm-3" id="estado" style="display: none;">
							<label class="control-label">Estado:</label>
							<select id="estados" class="form-control">
							</select>
						</div>
						<div class="form-group col-sm-3" id="oficina" style="display: none;">
							<label class="control-label">Oficina:</label>
							<select id="oficinas" class="form-control">
							</select>
						</div>
						<div class="form-group col-sm-3" id="grupo" style="display: none;">
							<label class="control-label">Grupo:</label>
							<select id="grupos" class="form-control">
							</select>
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label">✱Salario Nominal:</label>
							<input class="form-control" type="text" id="inicial" name="inicial" required>
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