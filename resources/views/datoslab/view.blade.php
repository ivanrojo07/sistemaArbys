@extends('layouts.app')
	@section('content')
		<div class="container">
			<div class="panel-body">
				{{-- {{dd($datoslab)}} --}}
				<h2><label class="label label-default">Datos Laborales:</label></h2>
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
			<div class="panel-body">
				{{-- {{dd($datoslab)}} --}}
				<h2><label class="label label-default">Datos Cliente:</label></h2>
				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    					<label class="control-label" for="tipo">Nombre:</label>
    					<dd>{{ ucwords($personal->nombre)}} {{ucwords($personal->apellidopaterno)}} {{ucwords($personal->apellidomaterno)}}</dd>
  				</div>
  				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    					<label class="control-label" for="tipo">RFC:</label>
    					<dd>{{ strtoupper($personal->rfc)}}</dd>
  				</div>
  				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    					<label class="control-label" for="tipo">Puesto en la empresa:</label>
    					<dd>{{ $datoslab->puestoempresa}}</dd>
  				</div>
  				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    					<label class="control-label" for="tipo">Antigüedad en la empresa:</label>
    					<dd>{{ $datoslab->antiguedadempresa}}</dd>
  				</div>
  				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    					<label class="control-label" for="tipo">Ingreso mensual:</label>
    					<dd>${{ $datoslab->ingresosmesempresa}}</dd>
  				</div>
			</div>
			<a class="btn btn-info btn-md" href="{{ route('personals.datoslaborales.edit', [$personal,$datoslab]) }}">Editar</a>
		</div>
	@endsection