@extends('layouts.app')
	@section('content')
		<div class="container" id="tab">
			<form role="form" id="form-cliente" method="POST" action="" name="form">
				<div role="application" class="panel panel-group">
					<div class="panel-default">
						<div class="panel-heading"><h4>Datos del Empleado</h4></div>
						<div class="panel-body">
							<div class="col-xs-12 offset-md-2 mt-3">
								<div class="form-group col-xs-3">
			    					<label class="control-label" for="ApellidoPaterno">* Apellido Paterno:</label>
			    					<input type="text" class="form-control" id="appaterno" name="appaterno" required="">
			  					</div>
								<div class="form-group col-xs-3">
			    					<label class="control-label" for="ApellidoMaterno">* Apellido Materno:</label>
			    					<input type="text" class="form-control" id="apmaterno" name="apmaterno" required="">
			  					</div>
								<div class="form-group col-xs-3">
			    					<label class="control-label" for="ApellidoPaterno">* Nombre(s):</label>
			    					<input type="text" class="form-control" id="nombre" name="nombre" required="">
			  					</div>
								<div class="form-group col-xs-3">
			    					<label class="control-label" for="ApellidoPaterno">RFC:</label>
			    					<input type="text" class="form-control" id="rfc" name="rfc">
			  					</div>
			  				</div>
						</div>
					</div>
				<ul role="tablist" class="nav nav-tabs nav-pills nav-justified">
					<li class="active"><a href="#tab1">Generales:</a></li>
					<li class="ui-tabs-tab ui-corner-top ui-state-default "><a href="" class="ui-tabs-anchor disabled" id="rhli1">Laborales:</a></li>
					<li class="ui-tabs-tab ui-corner-top ui-state-default " id="rhli2"><a href="" class="ui-tabs-anchor disabled">Estudios:</a></li>
					<li class="ui-tabs-tab ui-corner-top ui-state-default" id="rhli3"><a href="" class="ui-tabs-anchor disabled">Emergencias:</a></li>
					<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab disabled"><a href="" class="ui-tabs-anchor disabled">Administrarivo:</a></li>
				</ul>
				<div class="panel-default">
					<div class="panel-heading"><h5>Datos Generales:</h5></div>
					<div class="panel-body">
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-xs-3">
								<label class="control-label" for="telefono" id="lbl_calle">Teléfono:</label>
								<input type="text" class="form-control" id="telefono" name="telefono">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="celular" id="lbl_celular">Celular:</label>
								<input type="text" class="form-control" id="id_celular" name="calle">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="mail" id="lbl_mail">Correo electrónico:</label>
								<input type="text" class="form-control" id="id_mail" name="mail">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="imss" id="lbl_imss">IMSS:</label>
								<input type="text" class="form-control" id="imss" name="imss">
							</div>
						</div>
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-xs-3">
								<label class="control-label" for="curp" id="lbl_curp">CURP:</label>
								<input type="text" class="form-control" id="curp" name="curp">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="infonavit" id="lbl_infonavit"># Infonavit:</label>
								<input type="text" class="form-control" id="id_infonavir" name="infonavit">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="nacimiento" id="lbl_nacimiento">Fecha de Nacimiento:</label>
								<input type="date" class="form-control" id="id_nacimiento" name="nacimiento">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="cp" id="lbl_cp">Código Postal:</label>
								<input type="text" class="form-control" id="cp" name="cp">
							</div>
						</div>
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-xs-3">
								<label class="control-label" for="calle" id="lbl_calle">Calle:</label>
								<input type="text" class="form-control" id="calle" name="calle">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="numext" id="lbl_numext">Número Exterior:</label>
								<input type="text" class="form-control" id="id_numext" name="numext">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="numint" id="lbl_numint">Número Interior:</label>
								<input type="text" class="form-control" id="id_numint" name="numint">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="colonia" id="lbl_colonia">Colonia:</label>
								<input type="text" class="form-control" id="id_colonia" name="colonia">
							</div>
						</div>
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-xs-3">
								<label class="control-label" for="delegacion" id="lbl_delegacion">Delegación/Municipio:</label>
								<input type="text" class="form-control" id="delegacion" name="delegacion">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="estado" id="lbl_estado">Estado:</label>
								<input type="text" class="form-control" id="estado" name="estado">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="entre" id="lbl_entre">Entre Calles:</label>
								<input type="text" class="form-control" id="id_entre" name="entre">
							</div>
							<div class="form-group col-xs-3">
								<label class="control-label" for="referencia" id="lbl_referencia">Referencia:</label>
								<input type="text" class="form-control" id="referencia" name="referencia">
							</div>
						</div>
						<button type="submit" class="btn btn-success">Guardar</button>
	  				<p><strong>*Campo requerido</strong></p>
					</div>
				</div>
			</div>
		</form>
	</div>




		@endsection