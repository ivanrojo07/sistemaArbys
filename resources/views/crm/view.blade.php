@extends('layouts.infopersonal')
@section('personal')
	{{-- expr --}}
	<ul role="tablist" class="nav nav-tabs nav-pills nav-justified">
		    <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="#">Dirección/Domicilio:</a></li>
		    <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="" class="ui-tabs-anchor">Datos Laborales:</a></li>
		    <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="" class="ui-tabs-anchor">Referencias Personales:</a></li>
		    <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="" class="ui-tabs-anchor">Datos de Beneficiarios:</a></li>
		    <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="" class="ui-tabs-anchor">Productos:</a></li>
		    <li class="active"><a href="" class="ui-tabs-anchor">C.R.M.:</a></li>
		</ul>
		<div class="panel-default">
			<div class="panel-heading">C.R.M.</div>
			<div class="panel-body">
				<div class="col-md-12 offset-md-2 mt-3">
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label">Fecha de creación:</label>
						<dd>{{$crm->fecha_act}}</dd>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label">Fecha del proximo contacto:</label>
						<dd>{{$crm->fecha_cont}}</dd>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label">Hora:</label>
						<dd>{{$crm->hora}}</dd>
					</div>
				</div>
				<div class="col-md-12 offset-md-2 mt-3">
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label">Acuerdos:</label>
						<dd>{{$crm->acuerdos}}</dd>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label">Tipo de contacto:</label>
						<dd>{{$crm->tipo_cont}}</dd>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label">Observaciones:</label>
						<dd>{{$crm->observaciones}}</dd>
					</div>
				</div>
			</div>
		</div>
@endsection