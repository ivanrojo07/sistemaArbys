@extends('layouts.infoprovedor')
@section('personal')
	{{-- expr --}}
	<ul role="tablist" class="nav nav-tabs nav-pills nav-justified">
    	<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('provedores.show',['provedore'=>$provedore]) }}" class="ui-tabs-anchor">Dirección/Domicilio:</a></li>
    	
    	
    
    	<li class="active"><a href="{{ route('provedores.crm.index',['provedore'=>$provedore]) }}" class="ui-tabs-anchor">C.R.M.:</a></li>
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