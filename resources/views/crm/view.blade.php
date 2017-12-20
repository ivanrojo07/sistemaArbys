@extends('layouts.infopersonal')
@section('personal')
	{{-- expr --}}
	<ul role="tablist" class="nav nav-tabs">
    	<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.show',['personal'=>$personal]) }}" class="">Dirección/Domicilio:</a></li>
    	@if ($personal->tipo == 'Cliente')
    	<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.datoslaborales.index',['personal'=>$personal]) }}" class="">Datos Laborales:</a></li>
    	<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.referenciapersonales.index',['personal'=>$personal]) }}" class="">Referencias Personales:</a></li>
    	<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.datosbeneficiario.index',['personal'=>$personal]) }}" class="">Datos de Beneficiarios:</a></li>
    	@endif
    	<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.producto.index',['personal'=>$personal]) }}" class="">Productos:</a></li>
    	<li class=""><a href="{{ route('personals.product.index',['personal'=>$personal]) }}" class="">Productos seleccionados:</a></li>
    	<li class="active"><a href="{{ route('personals.crm.index',['personal'=>$personal]) }}" class="">C.R.M.:</a></li>
	</ul>
		<div class="panel-default">
			<div class="panel-heading">C.R.M.</div>
			<div class="panel-body">
				<div class="col-md-12 offset-md-2 mt-3">
					<div class="form-group col-xs-4">
						<label class="control-label">Fecha de creación:</label>
						<dd>{{$crm->fecha_act}}</dd>
					</div>
					<div class="form-group col-xs-4">
						<label class="control-label">Fecha del proximo contacto:</label>
						<dd>{{$crm->fecha_cont}}</dd>
					</div>
					<div class="form-group col-xs-4">
						<label class="control-label">Hora:</label>
						<dd>{{$crm->hora}}</dd>
					</div>
				</div>
				<div class="col-md-12 offset-md-2 mt-3">
					<div class="form-group col-xs-4">
						<label class="control-label">Acuerdos:</label>
						<dd>{{$crm->acuerdos}}</dd>
					</div>
					<div class="form-group col-xs-4">
						<label class="control-label">Tipo de contacto:</label>
						<dd>{{$crm->tipo_cont}}</dd>
					</div>
					<div class="form-group col-xs-4">
						<label class="control-label">Observaciones:</label>
						<dd>{{$crm->observaciones}}</dd>
					</div>
				</div>
			</div>
		</div>
@endsection