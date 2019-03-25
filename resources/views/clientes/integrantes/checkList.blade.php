@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="page-header">
	  <h1>Requisitos Integrante <small></small></h1>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">Complete los campos y añada los archivos</div>
	  	<div class="panel-body">
	    	<div class="row">
	    		<div class="col-sm-4 form-group">
	    			<label class="control-label">Identificación:</label>
					<select name="" class="form-control">
						<option value=""> --- </option>
						<option value="ine">INE</option>
						<option value="ife">IFE</option>
						<option value="pasaporte">Pasaporte</option>
						<option value="cédula profesional">Cédula Profesional</option>
						<option value="cartilla">Cartilla</option>
					</select>
	    		</div>
	    		<div class="col-sm-4 form-group">
	    			<label class="control-label">Número identificación</label>
	    			<input type="text" name="" class="form-control">
	    		</div>
	    		<div class="col-sm-4 form-group">
	    			<span class="file_ID"><label for="file_ID" style="font-size: 10px;font-weight: 600;color: #fff;border-radius: 5px;background-color: #1464dc;display: inline-block;transition: all .5s;cursor: pointer;margin-top: 10px;padding: 15px 40px !important;text-transform: uppercase;width: fit-content;text-align: center"><span>Subir Archivo</span></label></span>
	    			<span><input type="file" name="file_ID" id="file_ID" style="width: 0.1px;height: 0.1px;opacity: 0;overflow: hidden; position: absolute;z-index: -1"></span>
	    		</div>
	    	</div>
	    	<div class="row">
	    		<div class="col-sm-4 form-group">
	    			<label class="control-label">Comprobante de Domicilio:</label>
					<select name="" class="form-control">
						<option value=""> --- </option>
						<option value="luz">Luz</option>
						<option value="agua">Agua</option>
						<option value="telefono">Teléfono</option>
						<option value="predial">Predial</option>
					</select>
	    		</div>
	    		<div class="col-sm-4 form-group">
	    			<label class="control-label">A nombre de:</label>
	    			<input type="text" name="" class="form-control">
	    		</div>
	    		<div class="col-sm-4 form-group">
	    			<span class="file_ID"><label for="file_domicilio" style="font-size: 10px;font-weight: 600;color: #fff;border-radius: 5px;background-color: #1464dc;display: inline-block;transition: all .5s;cursor: pointer;padding: 15px 40px !important;text-transform: uppercase;width: fit-content;text-align: center"><span>Subir Archivo</span></label></span>
	    			<span><input type="file" name="file_domicilio" id="file_domicilio" style="width: 0.1px;height: 0.1px;opacity: 0;overflow: hidden; position: absolute;z-index: -1"></span>
	    		</div>
	    		<div class="col-sm-4 form-group">
	    			<label class="control-label">Dirección:</label>
	    			<textarea name="" id="" rows="4" class="form-control" style="resize: none;"></textarea>
	    		</div>
	    	</div>
	    	<div class="row">
	    		<div class="col-sm-2 form-group">
	    			<label class="control-label">Solicitud Firmada:</label>
	    		</div>
	    		<div class="col-sm-3 form-group">
	    			<span class="file_solicitud"><label for="file_solicitud" style="font-size: 10px;font-weight: 600;color: #fff;border-radius: 5px;background-color: #1464dc;display: inline-block;transition: all .5s;cursor: pointer;padding: 15px 40px !important;text-transform: uppercase;width: fit-content;text-align: center"><span>Subir Archivo</span></label></span>
	    			<span><input type="file" name="file_solicitud" id="file_solicitud" style="width: 0.1px;height: 0.1px;opacity: 0;overflow: hidden; position: absolute;z-index: -1"></span>
	    		</div>
	    	</div>
	    	<div class="row">
	    		<div class="col-sm-2 form-group">
	    			<label class="control-label">Comprovante de Pago:</label>
	    		</div>
	    		<div class="col-sm-3 form-group">
	    			<span class="file_pago"><label for="file_pago" style="font-size: 10px;font-weight: 600;color: #fff;border-radius: 5px;background-color: #1464dc;display: inline-block;transition: all .5s;cursor: pointer;padding: 15px 40px !important;text-transform: uppercase;width: fit-content;text-align: center"><span>Subir Archivo</span></label></span>
	    			<span><input type="file" name="file_pago" id="file_pago" style="width: 0.1px;height: 0.1px;opacity: 0;overflow: hidden; position: absolute;z-index: -1"></span>
	    		</div>
	    	</div>
	    	<div class="row">
	    		<div class="col-sm-4 col-sm-offset-4 text-center">
					<button type="submit" class="btn btn-success">
						<i class="fa fa-check"></i> Guardar
					</button>
				</div>
	    	</div>
	  	</div>
	</div>
</div>

@endsection
@section('scripts')
<script type="application/javascript">
	$('input[type=file]').change(function(){
		var filename = $(this).val().split('\\').pop();
		var idname = $(this).attr('id');
		$('span.'+idname).find('span').html(filename);
	});
</script>
@endsection

