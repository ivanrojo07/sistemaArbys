@extends('layouts.infoprovedor')
	@section('cliente')
		<ul role="tablist" class="nav nav-tabs">
			<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('provedores.show',['provedore'=>$provedore]) }}">Dirección Fiscal:
				
			</a></li>
			<li class="active"><a href="{{ route('provedores.direccionfisica.index',['provedore'=>$provedore]) }}">Dirección Fisica:</a></li>
			<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="{{ route('provedores.contacto.index',['provedore'=>$provedore]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a></li>
			<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="{{ route('provedores.datosgenerales.index', ['provedore'=>$provedore]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Datos Generales:</a></li>
			
		</ul>
			<div class="panel panel-default">
			<form role="form" name="domicilio" id="form-cliente" method="POST" action="{{ route('provedores.direccionfisica.store', ['provedore'=>$provedore]) }}" name="form">
			{{ csrf_field() }}
			 <input type="hidden" name="provedor_id" value="{{$provedore->id}}">
			 <div class="panel-default">
				<div class="panel-heading">Dirección Fisica:
				&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</div>
				<div class="panel-body">
						<div class="col-lg-offset-10">
							<button type="submit" class="btn btn-success">
								<strong> Guardar
							</strong></button>
							
						</div>
						<div class="col-lg-3">
							
							<label>

								<input type="checkbox" 
								       data-toggle="toggle" 
								       onchange="datosFiscal();"
								       id="#boton-toggle">
								¿Usar datos de dirección fiscal?.
							</label>
						

						</div>
					<div class="col-md-12 offset-md-2 mt-3">
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="calle"><i class="fa fa-asterisk" aria-hidden="true"></i> Calle:</label>
	    					<input type="text" class="form-control" id="calle" name="calle" value="" autofocus required>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="numext"><i class="fa fa-asterisk" aria-hidden="true"></i> Numero exterior:</label>
	    					<input type="text" class="form-control" id="numext" name="numext" value="" required>
	  					</div>	
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="numint">Numero interior:</label>
	    					<input type="text" class="form-control" id="numint" name="numint" value="">
	  					</div>		
					</div>
					<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="colonia"><i class="fa fa-asterisk" aria-hidden="true"></i> Colonia:</label>
	  						<input type="text" class="form-control" id="colonia" name="colonia" value="" required>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="municipio"><i class="fa fa-asterisk" aria-hidden="true"></i> Delegación o Municipio:</label>
	  						<input type="text" class="form-control" id="municipio" name="municipio" value="" required>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="ciudad"><i class="fa fa-asterisk" aria-hidden="true"></i> Ciudad:</label>
	  						<input type="text" class="form-control" id="ciudad" name="ciudad" value="" required>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="estado"><i class="fa fa-asterisk" aria-hidden="true"></i> Estado:</label>
	  						<input type="text" class="form-control" id="estado" name="estado" value="" required>
	  					</div>
					</div>
					<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="cp">Código postal:</label>
			    					<input type="text" class="form-control" id="cp" name="cp"  minlength="5" maxlength="5">
			  					</div>		
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="calle1">Entre calle:</label>
	  						<input type="text" class="form-control" id="calle1" name="calle1" value="">
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="calle2">Y calle:</label>
	  						<input type="text" class="form-control" id="calle2" name="calle2" value="">
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="referencia">Referencia:</label>
	  						<input type="text" class="form-control" id="referencia" name="referencia" value="">
	  					</div>
					</div>
				</div>
			</div>
			</div>
	</form>
</div>
<script>
	function datosFiscal(){
                if($(':checkbox').prop('checked') == true){
                	document.domicilio.calle.defaultValue = "{{$provedore->calle}}";
               		document.domicilio.numext.defaultValue = "{{$provedore->numext}}";
                	document.domicilio.numint.defaultValue = "{{$provedore->numinter}}";
                	document.domicilio.colonia.defaultValue = "{{$provedore->colonia}}";
                	document.domicilio.municipio.defaultValue = "{{$provedore->municipio}}";
                	document.domicilio.ciudad.defaultValue = "{{$provedore->ciudad}}";
                	document.domicilio.estado.defaultValue = "{{$provedore->estado}}";
                	document.domicilio.calle1.defaultValue = "{{$provedore->calle1}}";
                	document.domicilio.calle2.defaultValue = "{{$provedore->calle2}}";
                	document.domicilio.referencia.defaultValue = "{{$provedore->referencia}}";
				}
				else if($(':checkbox').prop('checked') == false){
                    document.domicilio.calle.defaultValue = "";
                    document.domicilio.numext.defaultValue = "";
                    document.domicilio.numint.defaultValue = "";
                    document.domicilio.colonia.defaultValue = "";
                    document.domicilio.municipio.defaultValue = "";
                    document.domicilio.ciudad.defaultValue = "";
                    document.domicilio.estado.defaultValue = "";
                    document.domicilio.calle1.defaultValue = "";
                    document.domicilio.calle2.defaultValue = "";
                    document.domicilio.referencia.defaultValue = "";
				}
            }
</script>
@endsection