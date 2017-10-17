@extends('layouts.app')
	@section('content')
		<div class="container">
				<div class="panel-body">
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    					<label class="control-label" for="tipo">Tipo de cliente:</label>
    					<dd>{{ $personal->tipo}}</dd>
  					</div>

					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    					<label class="control-label" for="tipopersona">Tipo de Persona:</label>
    					<dd>{{ $personal->tipopersona}}</dd>
  					</div>
					@if ($personal->tipopersona == "Fisica")
						{{-- true expr --}}
  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="nombre">Nombre(s):</label>
  						<dd>{{ $personal->nombre}}</dd>
  					</div>
  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="apellidopaterno">Apellido Paterno:</label>
  						<dd>{{ $personal->apellidopaterno }}</dd>
  					</div>
  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
  						<dd>{{ $personal->apellidomaterno }}</dd>
  					</div>
					@else
						{{-- false expr --}}
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="razonsocial">Razón Social:</label>
  						<dd>{{ $personal->razonsocial}}</dd>
  					</div>
					@endif
				</div>
				<div class="col-md-12 offset-md-2 mt-3">
					<h2><span>Dirección</span></h2>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">	
						<label class="control-label" for="calle">Calle:</label>
						<dd>{{ $personal->calle }}</dd>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">	
						<label class="control-label" for="numext" >Número Exterior:</label>
						<dd>{{ $personal->numext}}</dd>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="numinter">Número Interior:</label>
						<dd>{{ $personal->numinter}}</dd>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="cp">Código Postal:</label>
						<dd>{{ $personal->cp}}</dd>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="colonia">Colonia:</label>
						<dd>{{ $personal->colonia}}</dd>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="municipio">Municipio/Delegación</label>
						<dd>{{ $personal->municipio}}</dd>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="ciudad">Ciudad:</label>
						<dd>{{ $personal->ciudad}}</dd>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="estado">Estado:</label>
						<dd>{{ $personal->estado}}</dd>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="calle1">Entre calle:</label>
						<dd>{{ $personal->calle1}}</dd>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="calle2">Y calle:</label>
						<dd>{{ $personal->calle2}}</dd>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="referencia">Referencia:</label>
						<dd>{{ $personal->referencia}}</dd>
					</div>
					@if ($personal->tipo == "Cliente")
						{{-- expr --}}
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="recidir">Tiempo recidiendo:</label>
						<dd>{{ $personal->recidir}}</dd>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="vivienda">Tipo de vivienda:</label>
						<dd>{{ $personal->vivienda}}</dd>
					</div>
					@endif
				</div>
				<div class="col-md-12 offset-md-2 mt-3">
					<h2><span>Datos personales</span></h2>
					
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="mail">Correo:</label>
						<dd>{{ $personal->mail}}</dd>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="rfc">RFC:</label>
						<dd>{{ $personal->rfc}}</dd>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="telefonofijo">Número de Telefono:</label>
						<dd>{{ $personal->telefonofijo}}
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="telefonocel">Número Celular:</label>
						<dd>{{ $personal->telefonocel}}</dd>
					</div>
					@if ($personal->tipo == "Cliente")
						{{-- expr --}}
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="estadocivil">Estado Civil:</label>
						<dd>{{ $personal->estadocivil}}</dd>
					</div>
					@endif
				</div>
				@if ($personal->tipo == "Cliente")
					<a href="{{ route('personals.datoslaborales.index', $personal) }}" class="btn btn-primary btn-lg">Datos Laborales</a>
					<a href="{{ route('personals.referenciapersonales.index', $personal) }}" class="btn btn-primary btn-lg">Referencias Personales</a>
					<a href="{{ route('personals.datosbeneficiario.index', $personal) }}" class="btn btn-primary btn-lg">Datos Beneficiarios</a>
				@endif
				<a href="#" class="btn btn-primary btn-lg">Productos</a>
				@if ($personal->tipo == 'Prospecto')
					<a href="#" class="btn btn-primary btn-lg">Venta Frio</a>
				@endif
		</div>
	@endsection