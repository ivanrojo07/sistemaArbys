@extends('layouts.app')
	@section('content')
		<div class="container">
			<div class="panel-body">
				<h2><label class="label label-default">Datos de la Referencia:</label></h2>
				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    					<label class="control-label" for="tipo">Nombre:</label>
    					<dd>{{ $refpersonal->nombre}}</dd>
  				</div>
  				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    					<label class="control-label" for="tipo">Apellido Paterno:</label>
    					<dd>{{ $refpersonal->apepat}}</dd>
  				</div>
  				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    					<label class="control-label" for="tipo">Apellido Materno:</label>
    					<dd>{{ $refpersonal->apemat}}</dd>
  				</div>
  				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    					<label class="control-label" for="tipo">Telefonos:</label>
    					<dd>#1: {{ $refpersonal->telefono1}}</dd>
    					@if ($refpersonal->telefono2 != null)
    						<dd>#2: {{$refpersonal->telefono2}}</dd>
    					@endif
    					@if ($refpersonal->telefono3 != null)
    						<dd>#3: {{$refpersonal->telefono3}}</dd>
    					@endif
  				</div>
  				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    					<label class="control-label" for="tipo">Parentesco:</label>
    					<dd>{{ $refpersonal->parentesco}}</dd>
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
    					<label class="control-label" for="tipo">Correo:</label>
    					<dd>{{ $personal->mail}}</dd>
  				</div>
  				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    					<label class="control-label" for="tipo">Telefonos de contacto:</label>
    					<dd>{{ $personal->telefonofijo}}</dd>
    					<dd>{{ $personal->telefonocel}}</dd>
  				</div>
  			</div>
			<a class="btn btn-info btn-md" href="{{ route('personals.referenciapersonales.edit', [$personal,$refpersonal]) }}">Editar</a>
		</div>
	@endsection