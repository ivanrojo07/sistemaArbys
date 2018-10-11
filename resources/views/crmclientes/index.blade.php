@extends('layouts.blank')
@section('content')

<div class="panel-default">
	<div class="panel panel-group" style="margin-bottom: 0px;">
		<div class="panel-body">
			<form role="form" method="POST" action="{{ route('clientes.crm.store', ['cliente' => $cliente]) }}">
				{{ csrf_field() }}
				<input type="hidden" name="cliente_id" value="{{ $cliente->id }}">
				<div class="col-sm-12 text-right">
					<a class="btn btn-warning" id="limpiar" onclick="limpiar()">
						<strong>Limpiar</strong>
					</a>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label" for="fecha_act">Fecha Actual:</label>
						<input type="date" class="form-control" id="fecha_act" name="fecha_act" value="{{ date('Y-m-d') }}" readonly>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="fecha_aviso"><i class="fa fa-asterisk" aria-hidden="true"></i> Fecha Aviso:</label>
						<input type="date" class="form-control" id="fecha_aviso" name="fecha_aviso" required="required" min="{{date('Y-m-d')}}" max="{{date('Y-m-d',strtotime('+2 Months'))}}">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="fecha_cont"><i class="fa fa-asterisk" aria-hidden="true"></i> Fecha siguiente contacto:</label>
						<input type="date" class="form-control" id="fecha_cont" name="fecha_cont" required="required" min="{{date('Y-m-d',strtotime('+2 Days'))}}" max="{{date('Y-m-d',strtotime('+2 Months'))}}" disabled>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="hora">Hora:</label>
						<input type="text" class="form-control" id="hora" name="hora" name="hora" value="">
					</div>
					<div class="form-group col-sm-6">
						<label class="control-label" for="tipo_cont">Forma de contacto:</label>
						<select class="form-control" type="select" name="tipo_cont" id="tipo_cont" required>
							<option id="Mail" value="Mail">Email/Correo Electronico</option>
							<option id="Telefono" value="Telefono">Telefono</option>
							<option id="Cita" value="Cita">Cita</option>
							<option id="Whatsapp" value="Whatsapp">Whatsapp</option>
							<option id="Otro" value="Otro" selected="selected">Otro</option>
						</select>
					</div>
					<div class="form-group col-sm-6">
						<label class="control-label" for="status">Estado:</label>
						<select class="form-control" type="select" name="status" id="status" required>
							<option id="Pendiente" value="Pendiente">Pendiente</option>
							<option id="Cotizando" value="Cotizando">En Cotización</option>
							<option id="Cancelado" value="Cancelado">Cancelado</option>
							<option id="Toma_decision" value="Toma_decision">Tomando decisión</option>
							<option id="Espera" value="Espera">En espera</option>
							<option id="Revisa_doc" value="Revisa_doc">Revisando documento</option>
							<option id="Proceso_aceptar" value="Proceso_aceptar">Proceso de Aceptación</option>
							<option id="Entrega" value="Entrega">Para entrega</option>
							<option id="Otro" value="Otro" selected="selected">Otro</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-4">
						<label class="control-label" for="acuerdos">Acuerdos: </label>
						<textarea class="form-control" rows="5" id="acuerdos" name="acuerdos" maxlength="500"></textarea>
					</div>

					<div class="form-group col-sm-4">
						<label class="control-label" for="comentarios">Comentarios: </label>
						<textarea class="form-control" rows="5" id="comentarios" name="comentarios" maxlength="500"></textarea>
					</div>

					<div class="form-group col-sm-4">
						<label class="control-label" for="observaciones">Observaciones: </label>
						<textarea class="form-control" rows="5" id="observaciones" name="observaciones" maxlength="500"></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 text-center form-group">
						<a class="btn btn-info" id="nuevo" onclick="modificar()" style="display: none;">
							<strong>Nuevo</strong>
						</a>
						<button id="submit" type="submit" class="btn btn-success">
							<strong>Guardar</strong>
						</button>
					</div>
				</div>
			</form>
			<div class="row">
				<div class="col-sm-12">
					@if ($crms->count() == 0)
					<h4>Aún no tienes CRM</h4>
					@else
					<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px">
						<tr class="info">
							<th>Fecha contacto</th>
							<th>Fecha aviso</th>
							<th>Hora</th>
							<th>Estado</th>
							<th>Forma de contacto</th>
							<th>Acuerdos</th>
							<th>Observaciones</th>
						</tr>
						@foreach($crms as $crm)
						<tr onclick="crm({{$crm}})" title="Has Click Aquì para ver o modificar" style="cursor: pointer">
							<td>{{$crm->fecha_cont}}</td>
							<td>{{$crm->fecha_aviso}}</td>
							<td>{{$crm->hora}}</td>
							<td>{{$crm->tipo_cont}}</td>
							<td>{{$crm->status}}</td>
							<td>{{substr($crm->acuerdos,0,50)}}...</td>
							<td>{{substr($crm->observaciones,0,50)}}...</td>
						</tr>
						@endforeach
					</table>
					@endif	
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

	function crm(elemento) {
		document.getElementById("fecha_cont").value = elemento.fecha_cont;
		document.getElementById("fecha_cont").disabled = true;
		document.getElementById("fecha_aviso").value = elemento.fecha_aviso;
		document.getElementById("fecha_aviso").disabled = true;
		document.getElementById("hora").value = elemento.hora;
		document.getElementById("hora").disabled = true;
		document.getElementById("tipo_cont").value = elemento.tipo_cont;
		document.getElementById('tipo_cont').disabled = true;
		document.getElementById('status').value = elemento.status;
		document.getElementById('status').disabled = true;
		document.getElementById('acuerdos').value = elemento.acuerdos;
		document.getElementById('acuerdos').disabled = true;
		document.getElementById('comentarios').value = elemento.comentarios;
		document.getElementById('comentarios').disabled = true;
		document.getElementById('observaciones').value = elemento.observaciones;
		document.getElementById('observaciones').disabled = true;
		document.getElementById('submit').disabled= true;

		$('#limpiar').hide();
		$('#nuevo').show();
	}

	function modificar() {
		document.getElementById("fecha_cont").disabled = false;
		document.getElementById("fecha_aviso").disabled = false;
		document.getElementById("hora").disabled = false;
		document.getElementById("tipo_cont").disabled = false;
		document.getElementById("status").disabled = false;
		document.getElementById("acuerdos").disabled = false;
		document.getElementById("comentarios").disabled = false;
		document.getElementById("observaciones").disabled = false;
		document.getElementById("submit").disabled = false;

		$('#limpiar').show();
		$('#nuevo').hide();
		$("input").val('');
		$("textarea").val('');
		$('#fecha_cont').prop('disabled',true);
	}

	function limpiar() {
		document.getElementById("fecha_cont").value = '';
		document.getElementById("fecha_aviso").value = '';
		document.getElementById("hora").value = '';
		document.getElementById("tipo_cont").value = '';
		document.getElementById('status').value = '';
		document.getElementById('acuerdos').value = '';
		document.getElementById('comentarios').value = '';
		document.getElementById('observaciones').value = '';				
	}

	$(document).ready(function() {
		$('#fecha_aviso').change(function() {
			var aviso = $('#fecha_aviso').val();
			$('#fecha_cont').val("");
			$('#fecha_cont').attr("min",aviso);
			$('#fecha_cont').prop('disabled',false);
		});
	});

</script>

@endsection