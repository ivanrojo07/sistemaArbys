@extends('layouts.infopersonal')  
  @section('personal')
  <ul role="tablist" class="nav nav-tabs">
    <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.show',['personal'=>$personal]) }}" class="">Dirección/Domicilio:</a></li>
    @if ($personal->tipo == 'Cliente')
    <li class="active"><a href="{{ route('personals.datoslaborales.index',['personal'=>$personal]) }}" class="">Datos Laborales:</a></li>
    <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.referenciapersonales.index',['personal'=>$personal]) }}" class="">Referencias Personales:</a></li>
    <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.datosbeneficiario.index',['personal'=>$personal]) }}" class="">Datos de Beneficiarios:</a></li>
    @endif
    <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.producto.index',['personal'=>$personal]) }}" class="">Productos:</a></li>
    <li class=""><a href="{{ route('personals.product.index',['personal'=>$personal]) }}" class="">Productos seleccionados:</a></li>
    <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.crm.index',['personal'=>$personal]) }}" class="">C.R.M.:</a></li>
  </ul>
		<div class="panel-default">
      <div class="panel-heading">Datos Laborales&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</div>
			<div class="panel-body">
				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    					<label class="control-label" for="tipo">Nombre de la empresa:</label>
    					<dd>{{ $datoslab->nombreempresa}}</dd>
  				</div>
  				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    					<label class="control-label" for="tipo">Calle:</label>
    					<dd>{{ $datoslab->calleempresa}}</dd>
  				</div>
  				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    					<label class="control-label" for="tipo">Numero exterior:</label>
    					<dd>{{ $datoslab->numextempresa}}</dd>
  				</div>
  				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    					<label class="control-label" for="tipo">Numero interior:</label>
    					<dd>{{ $datoslab->numinterempresa}}</dd>
  				</div>
  				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    					<label class="control-label" for="tipo">Codigo postal:</label>
    					<dd>{{ $datoslab->cpempresa}}</dd>
  				</div>
  				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    					<label class="control-label" for="tipo">Colonia:</label>
    					<dd>{{ $datoslab->coloniaempresa}}</dd>
  				</div>
  				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    					<label class="control-label" for="tipo">Municipio:</label>
    					<dd>{{ $datoslab->municipioempresa}}</dd>
  				</div>
  				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    					<label class="control-label" for="tipo">Ciudad:</label>
    					<dd>{{ $datoslab->ciudadempresa}}</dd>
  				</div>
  				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    					<label class="control-label" for="tipo">Estado:</label>
    					<dd>{{ $datoslab->estadoempresa}}</dd>
  				</div>
  				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    					<label class="control-label" for="tipo">Giro:</label>
    					<dd>{{ $datoslab->giroempresa}}</dd>
  				</div>
  				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    					<label class="control-label" for="tipo">Telefono:</label>
    					<dd>{{ $datoslab->telefonoempresa}}</dd>
          </div>
      </div>
      <a class="btn btn-info btn-md" href="{{ route('personals.datoslaborales.edit', [$personal,$datoslab]) }}"><strong>Editar</strong></a>
    </div>
		</div>
	@endsection