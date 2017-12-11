@extends('layouts.infocliente')
	@section('cliente')
		<ul role="tablist" class="nav nav-tabs nav-pills nav-justified">
<<<<<<< HEAD
			<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><!-- <a href="{{ route('clientes.show',['cliente'=>$personal]) }} ">Dirección Fiscal:</a> --></li>
			<li class="active"><!-- <a href=" {{ route('clientes.direccionfisica.index',['cliente'=>$personal]) }} ">Dirección Fisica:</a> --></li>
			<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><!-- <a href="{{ route('clientes.contacto.index',['cliente'=>$personal]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a> --></li>
			<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><!-- <a href="<{{ route('clientes.datosgenerales.index', ['cliente'=>$personal]) }} " role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Datos Generales:</a> --></li>
=======
			<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"> <a href="{{ route('clientes.show',['cliente'=>$personal]) }} ">Dirección Fiscal:</a> </li>
			<li class="active"> <a href=" {{ route('clientes.direccionfisica.index',['cliente'=>$personal]) }} ">Dirección Fisica:</a> ></li>
			<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"> <a href="{{ route('clientes.contacto.index',['cliente'=>$personal]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a> </li>
			<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"> <a href="<{{ route('clientes.datosgenerales.index', ['cliente'=>$personal]) }} " role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Datos Generales:</a> </li>
>>>>>>> 3959c603c50cefa9e10ac7950f3b15e83ae0fa03
		</ul>
					<div class="panel-default">

						<div class="panel-heading">Dirección Fisica:</div>
						<div class="panel-body">
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="calle">Calle:</label>
<<<<<<< HEAD
			    					<dd><!-- {{$direccion->calle}} --></dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numext">Numero exterior:</label>
			    					<dd><!-- {{$direccion->numext}} --></dd>
			  					</div>	
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numint">Numero interior:</label>
			    					<dd><!-- {{$direccion->numint}} --></dd>
=======
			    					<dd> {{$direccion->calle}} </dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numext">Numero exterior:</label>
			    					<dd> {{$direccion->numext}} </dd>
			  					</div>	
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numint">Numero interior:</label>
			    					<dd> {{$direccion->numint}} </dd>
>>>>>>> 3959c603c50cefa9e10ac7950f3b15e83ae0fa03
			  					</div>		
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="colonia">Colonia:</label>
<<<<<<< HEAD
			  						<dd><!-- {{$direccion->colonia}} --></dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="municipio">Delegación o Municipio:</label>
			  						<dd><!-- {{$direccion->municipio}} --></dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ciudad">Ciudad:</label>
			  						<dd><!-- {{$direccion->ciudad}} --></dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="estado">Estado:</label>
			  						<dd><!-- {{$direccion->estado}} --></dd>
=======
			  						<dd> {{$direccion->colonia}} </dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="municipio">Delegación o Municipio:</label>
			  						<dd> {{$direccion->municipio}} </dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ciudad">Ciudad:</label>
			  						<dd> {{$direccion->ciudad}} </dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="estado">Estado:</label>
			  						<dd> {{$direccion->estado}}</dd>
>>>>>>> 3959c603c50cefa9e10ac7950f3b15e83ae0fa03
			  					</div>
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="calle1">Entre calle:</label>
<<<<<<< HEAD
			  						<dd><!-- {{$direccion->calle1}} --></dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="calle2">Y calle:</label>
			  						<dd><!-- {{$direccion->calle2}} --></dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="referencia">Referencia:</label>
			  						<dd><!-- {{$direccion->referencia}} --></dd>
			  					</div>
							</div>
						<a class="btn btn-info" href="<!-- {{ route('clientes.direccionfisica.edit',['cliente'=>$personal, 'direccionfisica'=>$direccion]) }} -->">Editar</a>
=======
			  						<dd> {{$direccion->calle1}} </dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="calle2">Y calle:</label>
			  						<dd> {{$direccion->calle2}} </dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="referencia">Referencia:</label>
			  						<dd> {{$direccion->referencia}} </dd>
			  					</div>
							</div>
						<a class="btn btn-info" href=" {{ route('clientes.direccionfisica.edit',['cliente'=>$personal, 'direccionfisica'=>$direccion]) }} ">Editar</a>
>>>>>>> 3959c603c50cefa9e10ac7950f3b15e83ae0fa03
						</div>
					</div>
  				</div>
			</form>
		</div>
		@endsection