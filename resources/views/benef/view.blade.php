@extends('layouts.app')
	@section('content')
		<div class="container">
				<div class="panel-body">
					<h2><label class="label label-default">Datos Laborales:</label></h2>
  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="nombreben">Nombre(s):</label>
  						<dd>{{$beneficiario->nombreben}}</dd>
  					</div>
  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="apepatben">Apellido Paterno:</label>
  						<dd>{{$beneficiario->apepatben}}</dd>
  					</div>
  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="apematben">Apellido Materno:</label>
  						<dd>{{$beneficiario->apematben}}</dd>
  					</div>
				</div>
				<div class="panel-body">
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="edadben">Edad:</label>
						<dd>{{$beneficiario->edadben}}</dd>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="parentescoben">Parentesco:</label>
						<dd>{{$beneficiario->parentescoben}}</dd>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="telefonoben">Telefono:</label>
						<dd>{{$beneficiario->telefonoben}}</dd>
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
			<a class="btn btn-info btn-md" href="{{ route('personals.datosbeneficiario.edit', [$personal,$beneficiario]) }}">Editar</a>
				</div>
			</form>
		</div>
	@endsection