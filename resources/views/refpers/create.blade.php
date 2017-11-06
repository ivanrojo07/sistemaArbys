@extends('layouts.infopersonal')
	@section('personal')
	<ul role="tablist" class="nav nav-tabs nav-pills nav-justified">
    	<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="#">Dirección/Domicilio:</a></li>
    	<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="" class="ui-tabs-anchor">Datos Laborales:</a></li>
    	<li class="active"><a href="" class="ui-tabs-anchor">Referencias Personales:</a></li>
  		<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="" class="ui-tabs-anchor">Datos de Beneficiarios:</a></li>
    	<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="" class="ui-tabs-anchor">Productos:</a></li>
    	<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="" class="ui-tabs-anchor">C.R.M.:</a></li>
	</ul>
	<div class="panel-default">
		<div class="panel-heading">Referencias Personales</div>
		<div class="panel-body">
			<form role="form" method="POST" action="{{ route('personals.referenciapersonales.store', $personal) }}">
				<div class="panel-body">
					{{ csrf_field() }}
					<input type="hidden" name="personal_id" value="{{$personal->id}}">
  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="nombre">Nombre(s):</label>
  						<input type="text" class="form-control" id="nombre" name="nombre">
  					</div>
  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="apepat">Apellido Paterno:</label>
  						<input type="text" class="form-control" id="apepat" name="apepat">
  					</div>
  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="apemat">Apellido Materno:</label>
  						<input type="text" class="form-control" id="apemat" name="apemat">
  					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="telefono1">Telefono:</label>
						<input type="text" class="form-control" id="telefono1" name="telefono1">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="telefono2">telefono 2:</label>
						<input type="text" class="form-control" id="telefono2" name="telefono2">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="telefono3">telefono 3:</label>
						<input type="text" class="form-control" id="telefono3" name="telefono3">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="parentesco">Parentesco:</label>
						<input type="text" class="form-control" id="parentesco" name="parentesco">
					</div>
				</div>
				<button type="submit" class="btn btn-default">Guardar</button>
			</form>
		</div>
	</div>
		
	@endsection