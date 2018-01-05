@extends('layouts.blank') 
	@section('content')
		<div class="container" id="tab">
				<div role="application" class="panel panel-group" >
					<div class="panel-default">
						<div class="panel-heading"><h4>Datos del Personal:</h4></div>
						<div class="panel-body">
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="tipo">Tipo de Cliente:</label>
			    					<dd>{{ $personal->tipo }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="tipopersona">Tipo de Persona:</label>
			    					<dd>{{ $personal->tipopersona }}</dd>
			  					</div>	
							</div>
							@if ($personal->tipopersona == "Fisica")
								{{-- expr --}}
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="nombre">* Nombre(s):</label>
			  						<dd>{{ $personal->nombre }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="apellidopaterno">* Apellido Paterno:</label>
			  						<dd>{{ $personal->apellidopaterno }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
			  						<dd>{{ $personal->apellidomaterno }}</dd>
			  					</div>
							</div>
							@endif
							@if ($personal->tipopersona == "Moral" )
								{{-- expr --}}
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="razonsocial">* Razon Social:</label>
			  						<dd>{{ $personal->razonsocial }}</dd>
			  					</div>
							</div>
							@endif
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="control-label" for="mail">* Correo:</label>
									<dd>{{ $personal->mail }}</dd>
								</div>
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="control-label" for="rfc">* RFC:</label>
									<dd>{{ $personal->rfc }}</dd>
								</div>
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="control-label" for="telefonofijo">* Número de Telefono:</label>
									<dd>{{ $personal->telefonofijo }}</dd>
								</div>
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="control-label" for="telefonocel">* Número Celular:</label>
									<dd>{{ $personal->telefonocel }}</dd>
								</div>
								@if ($personal->estadocivil)
									{{-- true expr --}}
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="control-label" for="estadocivil">Estado Civil:</label>
									<dd>{{$personal->estadocivil}}</dd>
								</div>
								@endif
							</div>
						</div>
					</div>
				@yield('personal')
				</div>
			@endsection