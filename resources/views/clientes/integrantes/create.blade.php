@extends('layouts.blank')
@section('content')

<div class="panel panel-group" style="margin-bottom: 0px;">
	<div class="panel-default">
		<div class="panel-heading">
			<div class="row">
				<div class="col-sm-3">
					<h4>Solicitud para Integrante:</h4>
				</div>
			</div>
		</div>
		<form method="POST" action="{{ route('clientes.integrante.store',['cliente' => $cliente]) }}">
				{{ csrf_field() }}
				<input type="hidden" name="cliente" value="{{ $cliente }}">
				<div class="panel-body">
					<h4 class="text-center" style="padding: 3% 0%;">DATOS GENERALES</h4>
					<div class="row">
						<div class="col-sm-3 form-group">
							<label class="control-label">Clave de la unidad:</label>
							<label class="form-control" name="clave_unidad" readonly>XXXXXXX</label>
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Tipo de la unidad:</label>
							<label class="form-control" name="tipo_unidad" readonly>XXXXXXX</label>
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Costo de la unidad:</label>
							<label class="form-control" name="costo" readonly>XXXXXXX</label>
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Cuota Mensual:</label>
							<label class="form-control" name="cuota_mensual" readonly>XXXXXXX</label>
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Plazo</label>
							<label class="form-control" name="plazo" readonly>xxxxxxx</label>
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Número de Tarifa:</label>
							<input type="text" class="form-control" name="num_tarifa">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Clave Asesor:</label>
							<label class="form-control" name="clave_asesor" readonly>XXXX</label>
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Nombre asesor:</label>
							<label class="form-control" name="nombre_asesor" readonly>XXXXXXXX</label>
						</div>
					</div>
					<h4 class="text-center" style="padding: 3% 0%;">DATOS SOLICITANTE</h4>
					<div class="row">
						<div class="col-sm-3 form-group">
							<label class="control-label">Nombre:</label>
							<label class="form-control" name="nombre_sol">XXXXXXX</label>
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">✱Calle:</label>
							<input type="text" class="form-control" name="calle" required>
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">✱Número ext.:</label>
							<input type="number" class="form-control" name="num_int" pattern="+[0-9]" min="0">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Número int.:</label>
							<input type="number" class="form-control" name="num_ext" pattern="+[0-9]" min="0">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3 form-group">
							<label class="control-label">✱Colonia:</label>
							<input type="text" class="form-control" name="colonia">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">✱Delegación (Municipio):</label>
							<input type="text" class="form-control" name="delegacionmunicipio">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">✱Código Postal:</label>
							<input type="text" class="form-control" name="cp">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">✱Ciudad:</label>
							<input type="text" class="form-control" name="ciudad">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">✱Estado:</label>
							<input type="text" class="form-control" name="estado">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">✱Correo Electrónico:</label>
							<input type="email" class="form-control" name="correo">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Telefono Fijo:</label>
							<input type="text" class="form-control" name="telefono" pattern="+[0-9]">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">✱RFC:</label>
							<input type="text" class="form-control" name="RFC">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">✱Tiempo de Residir:</label>
							<input type="text" class="form-control" name="tiempo_residir">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">✱Vive en casa:</label>
							<select name="tipo_vivienda" class="form-control">
								<option value=""> --- </option>
								<option value="propia">PROPIA</option>
								<option value="rentada">RENTADA</option>
							</select>
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Nombre del Conyugue:</label>
							<input type="text" class="form-control" name="nombre_conyuge">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">✱Estado Civil:</label>
							<select name="estado_civil" class="form-control">
								<option value=""> --- </option>
								<option value="soltero">SOLTERO</option>
								<option value="casado">CASADO</option>
							</select>
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">✱Genero:</label>
							<select name="genero" class="form-control">
								<option value=""> --- </option>
								<option value="M">MASCULINO</option>
								<option value="F">FEMENINO</option>
							</select>
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Sociedad Conyugal:</label>
							<select name="sociedad_conyugal" class="form-control">
								<option value=""> --- </option>
								<option value="separacion de bienes">Separacion de Bienes</option>
								<option value="bienes mancomunados">Bienes Mancomunados</option>
							</select>
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Donde Desea Recibir su Carpeta del Integrante:</label>
							<input type="text" class="form-control" name="carpeta_integrante">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">✱Celular:</label>
							<input type="text" class="form-control" name="celular" pattern="+[0-9]">
						</div>
					</div>
					<h4 class="text-center" style="padding: 3% 0%;">DATOS DEL REPRESENTANTE LEGAL</h4>
					<div class="row">
						<div class="col-sm-3 form-group">
							<label class="control-label">Nombre:</label>
							<input type="text" class="form-control" name="nombre_rep_leg">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Domicilio:</label>
							<textarea class="form-control" id="direccion_rep_leg" name="direccion_rep_leg" rows="3" style="resize: vertical;">
							</textarea>
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Telefono Fijo/Celular:</label>
							<input type="text" class="form-control" name="telefono_rep_leg">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Correo Electrónico:</label>
							<input type="text" class="form-control" name="correo_rep_leg">
						</div>
					</div>
					<h4 class="text-center" style="padding: 3% 0%;">DATOS DEL EMPLEO ACTUAL</h4>
					<div class="row">
						<div class="col-sm-3 form-group">
							<label class="control-label">Razon Social de la Empresa:</label>
							<input type="text" class="form-control" name="razon_empresa">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Giro de la Empresa:</label>
							<input type="text" class="form-control" name="giro_empresa">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Domicilio:</label>
							<textarea class="form-control" id="direccion_rep_leg" name="direccion_empresa" rows="3" style="resize: vertical;">
							</textarea>
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Puesto:</label>
							<input type="text" class="form-control" name="puesto">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3 form-group">
							<label class="control-label">Antiguedad en la Empresa:</label>
							<input type="text" class="form-control" name="antiguedad_empresa">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Ingresos Mensuales:</label>
							<input type="text" class="form-control" name="ingresos">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Telefono Fijo/Celular:</label>
							<input type="text" class="form-control" name="telefono_empresa">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Correo Electrónico:</label>
							<input type="text" class="form-control" name="correo_empresa">
						</div>
					</div>
					<h4 class="text-center" style="padding: 3% 0%;">REFERENCIAS PERSONALES</h4>
					<div class="row">
						<h5 style="padding-left: 3%;"><strong>Referencia 1</strong></h5>
						<div class="col-sm-4 form-group">
							<label class="control-label">Nombre:</label>
							<input type="text" class="form-control" name="nombre_ref1">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Telefono Fijo/Celular:</label>
							<input type="text" class="form-control" name="telefono_ref1">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Correo Electrónico:</label>
							<input type="text" class="form-control" name="correo_ref1">
						</div>
					</div>
					<div class="row">
						<h5 style="padding-left: 3%;"><strong>Referencia2</strong></h5>
						<div class="col-sm-4 form-group">
							<label class="control-label">Nombre:</label>
							<input type="text" class="form-control" name="nombre_ref2">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Telefono Fijo/Celular:</label>
							<input type="text" class="form-control" name="telefono_ref2">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Correo Electrónico:</label>
							<input type="text" class="form-control" name="correo_ref2">
						</div>
					</div>
					<h4 class="text-center" style="padding: 3% 0%;">RECIBIMOS PAGO</h4>
					<div class="row">
						<div class="col-sm-4 form-group">
							<label class="control-label">Cuota de Inscripción e IVA:</label>
							<input type="text" class="form-control" name="cuota_insc">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Cuota Mensual:</label>
							<input type="text" class="form-control" name="cuota_mensual_pago">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Importe del Recibo:</label>
							<input type="text" class="form-control" name="importe_recibo">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Cantidad con Letra:</label>
							<input type="text" class="form-control" name="cantidad_letra">
						</div>
					</div>
					<h4 class="text-center" style="padding: 3% 0%;">CREDITICIOS</h4>
					<div class="row">
						<div class="col-sm-3 form-group">
							<label class="control-label">Cuenta de cheques:</label>
							<select name="cuenta_cheques" class="form-control">
								<option value=""> --- </option>
								<option value="si">SI</option>
								<option value="no">NO</option>
							</select>
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Banco:</label>
							<input type="text" class="form-control" name="banco">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Número de cuenta:</label>
							<input type="text" class="form-control" name="num_cuenta">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Otras Cuentas:</label>
							<select name="otra_cuenta" class="form-control">
								<option value=""> --- </option>
								<option value="si">SI</option>
								<option value="no">NO</option>
							</select>
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Banco:</label>
							<input type="text" class="form-control" name="banco2">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Tarjetas de Credito:</label>
							<input type="text" class="form-control" name="num_tarjeta_credito">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Número de Cuenta:</label>
							<input type="text" class="form-control" name="num_cuenta2">
						</div>
					</div>
					<h4 class="text-center" style="padding: 3% 0%;">DATOS DEL BENEFICIARIO</h4>
					<div class="row">
						<div class="col-sm-4 form-group">
							<label class="control-label">Nombre:</label>
							<input type="text" class="form-control" name="nombre_benef">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Edad:</label>
							<input type="text" class="form-control" name="edad_benef">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Parentesco:</label>
							<input type="text" class="form-control" name="parentesco">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Telefono Fijo/celular:</label>
							<input type="text" class="form-control" name="telefono_benef">
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-sm-4 col-sm-offset-4 text-center">
							<button type="submit" class="btn btn-success">
								<i class="fa fa-check"></i> Guardar
							</button>
						</div>
						<div class="col-sm-4 text-right text-danger">
							<h5>✱Campos Requeridos</h5>
						</div>
					</div>
					<div style="margin: 50px 0;"></div>
				</div>
			</form>
	</div>
</div>

@endsection