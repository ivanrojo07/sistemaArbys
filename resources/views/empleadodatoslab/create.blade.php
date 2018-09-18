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
				<!-- <div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label" for="contrato">Sucursal:</label>
						<select type="select" class="form-control" name="sucursal_id" >
							<option id="sucursal_id" value="">Sin Definir</option>
							@foreach ($sucursales as $sucursal)
							<option id="{{$sucursal->id}}" value="{{$sucursal->id}}"
							<?php
								// if($datoslab->sucursal_id == $sucursal->id) echo ' selected';
							?>
							>{{ $sucursal->nombre }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="lugartrabajo">Lugar de Trabajo:</label>
						<select type="select" name="lugartrabajo" class="form-control" id="lugartrabajo" value="{{ $datoslab->lugartrabajo }}">
							<option id="1" value="Oficinas"
							<?php
								// if($datoslab->lugartrabajo == "Oficinas") echo ' selected';
							?>
							>Oficinas</option>
							<option id="2" value="Campo"
							<?php
								// if($datoslab->lugartrabajo == "Campo") echo ' selected';
							?>
							>Campo</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label" for="salarionom"><i class="fa fa-asterisk" aria-hidden="true"></i>Salario Nóminal:</label>
						<input class="form-control" type="text" id="salarionom" name="salarionom" value="{{ $datoslab->salarionom }}" required>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="periodopaga">Periodicidad de Pago:</label>
						<select type="select" class="form-control" name="periodopaga" id="periodopaga">
							<option id="1" value="Semanal"
							<?php
								// if($datoslab->periodopaga == "Semanal") echo ' selected';
							?>
							>Semanal</option>
							<option id="2" value="Quincenal"
							<?php
								// if($datoslab->periodopaga == "Quincenal") echo ' selected';
							?>
							>Quincenal</option>
							<option id="3" value="Mensual"
							<?php
								// if($datoslab->periodopaga == "Mensual") echo ' selected';
							?>
							>Mensual</option>
						</select>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="prestaciones">Prestaciones:</label>
						<select class="form-control" type="select" name="prestaciones" id="prestaciones">
							<option id="1" value="De Ley"
							<?php
								// if($datoslab->prestaciones == "De Ley") echo ' selected';
							?>
							>De Ley</option>
						</select>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="regimen">Régimen de Contratación:</label>
						<select class="form-control" type="select" name="regimen" id="regimen" value="{{ $datoslab->regimen }}">
							<option id="1" value="Sueldos y Salarios"
							<?php
								// if($datoslab->regimen == "Sueldos y Salarios") echo ' selected';
							?>
							>Sueldos y Salarios</option>
							<option id="2" value="Jubilados"
							<?php
								// if($datoslab->regimen == "Jubilados") echo ' selected';
							?>
							>Jubilados</option>
							<option id="3" value="Pensionados"
							<?php
								// if($datoslab->regimen == "Pensionados") echo ' selected';
							?>
							>Pensionados</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label" for="hentrada">Hora de Entrada:</label>
						<input class="form-control" type="text" id="hentrada" name="hentrada" value="{{ $datoslab->hentrada }}">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="hsalida">Hora de Salida:</label>
						<input class="form-control" type="text" id="hsalida" name="hsalida" value="{{ $datoslab->hsalida }}">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label" for="banco">Banco:</label>
						<select class="form-control" type="select" name="banco" id="banco">
							<option id="banco" value="">Sin Definir</option>
							@foreach ($bancos as $banco)
							<option id="{{$banco->nombre}}" value="{{$banco->nombre}}" @if ($datoslab->banco == $banco->nombre)
								{{-- expr --}}
								selected="selected" 
								@endif>{{$banco->nombre}}</option>
								@endforeach
						</select>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="cuenta">Cuenta:</label>
						<input class="form-control" type="text" id="cuenta" name="cuenta" value="{{ $datoslab->cuenta }}">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="clabe">CLABE:</label>
						<input class="form-control" type="clabe" name="clabe" id="clabe" value="{{ $datoslab->clabe }}">
					</div>
				</div> -->
				<div id="regional" style="display: none">
					<div class="row">
						<div class="col-sm-3">
							<label class="control-label">Región:</label>
							<select name="region_id" class="form-control">
								<option>No Definido</option>
							</select>
						</div>
					</div>
					<br>
				</div>
				<div id="estatal" style="display: none">
					<div class="row">
						<div class="col-sm-3">
							<label class="control-label">Región:</label>
							<select id="region_id" class="form-control">
								<option>No Definido</option>
							</select>
						</div>
						<div class="col-sm-3">
							<label class="control-label">Estado:</label>
							<select name="estado_id" class="form-control">
								<option>No Definido</option>
							</select>
						</div>
					</div>
					<br>
				</div>
				<div id="gerente" style="display: none">
					<div class="row">
						<div class="col-sm-3">
							<label class="control-label">Región:</label>
							<select id="region_id" class="form-control">
								<option>No Definido</option>
							</select>
						</div>
						<div class="col-sm-3">
							<label class="control-label">Estado:</label>
							<select id="estado_id" class="form-control">
								<option>No Definido</option>
							</select>
						</div>
						<div class="col-sm-3">
							<label class="control-label">Oficina:</label>
							<select name="oficina_id" class="form-control">
								<option>No Definido</option>
							</select>
						</div>
					</div>
					<br>
				</div>
				<div id="subgerente" style="display: none">
					<div class="row">
						<div class="col-sm-3">
							<label class="control-label">Región:</label>
							<select id="region_id" class="form-control">
								<option>No Definido</option>
							</select>
						</div>
						<div class="col-sm-3">
							<label class="control-label">Estado:</label>
							<select id="estado_id" class="form-control">
								<option>No Definido</option>
							</select>
						</div>
						<div class="col-sm-3">
							<label class="control-label">Oficina:</label>
							<select name="oficina_id" class="form-control">
								<option>No Definido</option>
							</select>
						</div>
					</div>
					<br>
				</div>
				<div id="vendedor" style="display: none">
					<div class="row">
						<div class="col-sm-3">
							<label class="control-label">Región:</label>
							<select id="region_id" class="form-control">
								<option>No Definido</option>
							</select>
						</div>
						<div class="col-sm-3">
							<label class="control-label">Estado:</label>
							<select id="estado_id" class="form-control">
								<option>No Definido</option>
							</select>
						</div>
						<div class="col-sm-3">
							<label class="control-label">Oficina:</label>
							<select id="oficina_id" class="form-control">
								<option>No Definido</option>
							</select>
						</div>
						<div class="col-sm-3">
							<label class="control-label">Subgerente:</label>
							<select name="subgetente_id" class="form-control">
								<option>No Definido</option>
							</select>
						</div>
					</div>
					<br>
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
      		document.getElementById('regional').style.display = 'none';
      		document.getElementById('estatal').style.display = 'none';
      		document.getElementById('gerente').style.display = 'none';
      		document.getElementById('subgerente').style.display = 'none';
      		document.getElementById('vendedor').style.display = 'none';
    		switch(val) {
    			case 3:
      				document.getElementById('regional').style.display = 'block';
    				break;
    			case 4:
      				document.getElementById('estatal').style.display = 'block';
    				break;
    			case 5:
      				document.getElementById('gerente').style.display = 'block';
    				break;
    			case 6:
      				document.getElementById('subgerente').style.display = 'block';
    				break;
    			case 7:
      				document.getElementById('vendedor').style.display = 'block';
    				break;
    		}
    	});
    });
</script>

@endsection