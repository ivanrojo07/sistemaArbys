@extends('layouts.infopersonal')
	@section('personal')
		<ul role="tablist" class="nav nav-tabs nav-pills nav-justified">
		    <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.show',['personal'=>$personal]) }}">Dirección/Domicilio:</a></li>
		    @if ($personal->tipo == 'Cliente')
		    <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.datoslaborales.index',['personal'=>$personal]) }}" class="ui-tabs-anchor">Datos Laborales:</a></li>
		    <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.referenciapersonales.index',['personal'=>$personal]) }}" class="ui-tabs-anchor">Referencias Personales:</a></li>
		    <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.datosbeneficiario.index',['personal'=>$personal]) }}" class="ui-tabs-anchor">Datos de Beneficiarios:</a></li>
		    @endif
		    <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.producto.index',['personal'=>$personal]) }}" class="ui-tabs-anchor">Productos:</a></li>
		    <li class="active"><a href="{{ route('personals.crm.index',['personal'=>$personal]) }}" class="ui-tabs-anchor">C.R.M.:</a></li>
		</ul>
		<div class="panel-default">
			<div class="panel-heading">C.R.M.</div>
			<div class="panel-body">
				<div class="panel-body">
					<form role="form" method="POST" action="{{ route('personals.crm.store',['personal'=>$personal]) }}">
						{{ csrf_field() }}
						<input type="hidden" name="personal_id" value="{{ $personal->id }}">
					<div class="col-md-12 offset-md-2 mt-3">
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="fecha_act">Fecha Actual:</label>
							<input type="date" class="form-control" id="fecha_act" name="fecha_act" value="{{ date('Y-m-d') }}" readonly>
						</div>
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="fecha_cont">* Fecha siguiente contacto:</label>
							<input type="date" class="form-control" id="fecha_cont" name="fecha_cont" required="required">
						</div>
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="hora">Hora:</label>
							<input type="text" class="form-control" id="hora" name="hora" name="hora">
						</div>
					</div>
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="acuerdos">Acuerdos: </label>
							<textarea class="form-control" rows="5" id="acuerdos" name="acuerdos" maxlength="500"></textarea>
						</div>
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="tipo_cont">Forma de contacto:</label>
							<select class="form-control" type="select" name="tipo_cont" id="tipo_cont" >
								<option id="Mail" value="Mail">Email/Correo Electronico</option>
								<option id="Telefono" value="Telefono">Telefono</option>
								<option id="Cita" value="Cita">Cita</option>
								<option id="Whatsapp" value="Whatsapp">Whatsapp</option>
								<option id="Otro" value="Otro" selected="selected">Otro</option>
							</select>
						</div>
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="observaciones">Observaciones: </label>
							<textarea class="form-control" rows="5" id="observaciones" name="observaciones" maxlength="500"></textarea>
						</div>
						<div class="col-md-12 offset-md-2 mt-3">
							<button type="submit" class="btn btn-default">Guardar</button>
						
						</div>
					</form>
				</div>
				<div class="panel-body">
					@if (count($crms)==0)
						<p>Aun no tienes C.R.M.'s</p>
					@endif
					@if (count($crms)!=0)
						<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse;margin-bottom: 0px">
							<thead>
								<tr class="info">
									<th>Fecha</th>
									<th>Fecha contacto</th>
									<th>Hora</th>
									<th>Forma de contacto</th>
									<th>Acuerdos</th>
									<th>Observaciones</th>
									<th>Operación</th>
								</tr>
							</thead>
							@foreach ($crms as $crm)
								{{-- expr --}}
								<tr>
									<td>{{$crm->fecha_act}}</td>
									<td>{{$crm->fecha_cont}}</td>
									<td>{{$crm->hora}}</td>
									<td>{{$crm->tipo_cont}}</td>
									<td>{{substr($crm->acuerdos,0,50)}}...</td>
									<td>{{substr($crm->observaciones,0,50)}}...</td>
									<td><a class="btn btn-primary" href="{{ route('personals.crm.show',['personal'=>$personal,'crm'=>$crm]) }}">Ver</a></td>
								</tr>
							@endforeach
						</table>
					@endif	
				</div>
			</div>
		</div>
	@endsection