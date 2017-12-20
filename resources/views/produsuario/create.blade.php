@extends('layouts.blank')
	@section('content')
		<div class="container">
					
			<form role="form" method="POST" action="{{ route('personals.store') }}" class="prs">
				<div class="panel-body">
					{{ csrf_field() }}
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    					<label class="control-label" for="tipo">Producto:</label>
    					<select type="select" name="tipo" class="form-control" id="tipo" onchange="formulario(this)">
    						<option id="Prospecto" value="Pack" selected="selected">Pack</option>
    						<option id="Cliente" value="Automovil">Automovil</option>
    						<option id="Cliente" value="Motocicleta">Motocicleta</option>
    					</select>
  					</div>
  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="nombre">Ingresos:</label>
  						<input type="text" class="form-control" id="nombre" name="nombre">
  					</div>
  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="apellidopaterno">Canal de venta:</label>
  						<input type="text" class="form-control" id="apellidopaterno" name="apellidopaterno">
  					</div>
  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="apellidomaterno">Promoción:</label>
  						<input type="text" class="form-control" id="apellidomaterno" name="apellidomaterno">
  					</div>
				</div>
				<div class="col-md-12 offset-md-2 mt-3">
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">	
						<label class="control-label" for="calle">Seguimiento:</label>
						<input type="text" class="form-control" id="calle" name="calle">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">	
						<label class="control-label" for="numext" >Calificación:</label>
						<input type="number" class="form-control" id="numext" name="numext">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="numinter">Comentarios:</label>
						<input type="textarea" class="form-control" id="numinter" name="numinter">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="cp">Lista de Precios:</label>
						<input type="text" class="form-control" id="cp" name="cp">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="colonia">Cotizador:</label>
						<input type="text" class="form-control" id="colonia" name="colonia">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="municipio">ID:</label>
						<input type="text" class="form-control" id="municipio" name="municipio">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="ciudad">Objetivo Mensual:</label>
						<input type="text" class="form-control" id="ciudad" name="ciudad">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="estado">Folio:</label>
						<input type="text" class="form-control" id="estado" name="estado">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="calle1">Fecha de solicitud:</label>
						<input type="date" class="form-control" id="calle1" name="calle1">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="calle2">Fecha de contrato:</label>
						<input type="date" class="form-control" id="calle2" name="calle2">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="referencia">Fecha de pago:</label>
						<input type="date" class="form-control" id="referencia" name="referencia">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12" id="cliente">
						<label class="control-label" for="recidir">Fecha de entrega:</label>
						<input type="date" class="form-control" id="recidir" name="recidir">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12" id="cliente1">
						<label class="control-label" for="vivienda">Referencia de contrato:</label>
						<input type="text" class="form-control" id="vivienda" name="vivienda">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12" id="cliente1">
						<label class="control-label" for="vivienda">Referencia de apertura:</label>
						<input type="text" class="form-control" id="vivienda" name="vivienda">
					</div>
				</div>
  				<button type="submit" class="btn btn-default">Guardar</button>
			</form>
		</div>
	@endsection