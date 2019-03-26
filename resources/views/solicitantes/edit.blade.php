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
		<form method="POST" action="{{ route('clientes.solicitantes.update',['cliente' => $cliente,'solicitante' => $solicitante]) }}">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="PUT">
				<input type="hidden" name="cliente_id" value="{{ $cliente->id }}">
				<div class="panel-body">
					<h4 class="text-center" style="padding: 3% 0%;">DATOS GENERALES</h4>
					<div class="row">
						<div class="col-sm-3 form-group">
							<label class="control-label">Clave de la unidad:</label>
							<input class="form-control" name="clave_unidad" value="{{ $solicitante->clave_unidad }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Tipo de la unidad:</label>
							<input class="form-control" name="tipo_unidad" value="{{ $solicitante->tipo_unidad }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Costo de la unidad:</label>
							<input class="form-control" name="costo" value="{{ $solicitante->costo }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Cuota Mensual:</label>
							<input class="form-control" name="cuota_mensual" value="{{ $solicitante->cuota_mensual }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Plazo</label>
							<input class="form-control" name="plazo" value="{{ $solicitante->plazo }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Número de Tarifa:</label>
							<input type="text" class="form-control" name="num_tarifa" value="{{ $solicitante->num_tarifa }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Clave Asesor:</label>
							<input class="form-control" name="clave_asesor" value="{{ $solicitante->clave_asesor }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Nombre asesor:</label>
							<input class="form-control" name="nombre_asesor" value="{{ $solicitante->nombre_asesor }}">
						</div>
					</div>
					<h4 class="text-center" style="padding: 3% 0%;">DATOS SOLICITANTE</h4>
					<div class="row">
						<div class="col-sm-3 form-group">
							<label class="control-label">Nombre:</label>
							<input class="form-control" name="nombre_sol" value="{{ $solicitante->nombre_sol }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Calle:</label>
							<input type="text" class="form-control" name="calle" value="{{ $solicitante->calle }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Número ext.:</label>
							<input type="number" class="form-control" name="num_int" pattern="+[0-9]" min="0" value="{{ $solicitante->num_int }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Número int.:</label>
							<input type="number" class="form-control" name="num_ext" pattern="+[0-9]" min="0" value="{{ $solicitante->num_ext }}">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3 form-group">
							<label class="control-label">Colonia:</label>
							<input type="text" class="form-control" name="colonia" value="{{ $solicitante->colonia }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Delegación (Municipio):</label>
							<input type="text" class="form-control" name="delegacionmunicipio" value="{{ $solicitante->delegacionmunicipio }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Código Postal:</label>
							<input type="text" class="form-control" name="cp" value="{{ $solicitante->cp }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Ciudad:</label>
							<input type="text" class="form-control" name="ciudad" value="{{ $solicitante->ciudad }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Estado:</label>
							<input type="text" class="form-control" name="estado" value="{{ $solicitante->estado }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">✱Correo Electrónico:</label>
							<input type="email" class="form-control" name="correo" value="{{ $solicitante->correo }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Telefono Fijo:</label>
							<input type="text" class="form-control" name="telefono" pattern="+[0-9]" value="{{ $solicitante->telefono }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">✱RFC:</label>
							<input type="text" class="form-control" name="RFC" value="{{ $solicitante->RFC }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">✱Tiempo de Residir:</label>
							<input type="text" class="form-control" name="tiempo_residir" value="{{ $solicitante->tiempo_residir }}">
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
							<input type="text" class="form-control" name="nombre_conyuge" value="{{ $solicitante->nombre_conyuge }}">
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
							<input type="text" class="form-control" name="carpeta_integrante" value="{{ $solicitante->carpeta_integrante }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">✱Celular:</label>
							<input type="text" class="form-control" name="celular" value="{{ $solicitante->celular }}">
						</div>
					</div>
					<h4 class="text-center" style="padding: 3% 0%;">DATOS DEL REPRESENTANTE LEGAL</h4>
					<div class="row">
						<div class="col-sm-3 form-group">
							<label class="control-label">Nombre:</label>
							<input type="text" class="form-control" name="nombre_rep_leg" value="{{ $solicitante->nombre_rep_leg }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Domicilio:</label>
							<textarea class="form-control" id="direccion_rep_leg" name="direccion_rep_leg" rows="3" style="resize: vertical;">
								{{ $solicitante->direccion_rep_leg }}
							</textarea>
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Telefono Fijo/Celular:</label>
							<input type="text" class="form-control" name="telefono_rep_leg" value="{{ $solicitante->telefono_rep_leg }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Correo Electrónico:</label>
							<input type="text" class="form-control" name="correo_rep_leg" value="{{ $solicitante->correo_rep_leg }}">
						</div>
					</div>
					<h4 class="text-center" style="padding: 3% 0%;">DATOS DEL EMPLEO ACTUAL</h4>
					<div class="row">
						<div class="col-sm-3 form-group">
							<label class="control-label">Razon Social de la Empresa:</label>
							<input type="text" class="form-control" name="razon_empresa" value="{{ $solicitante->razon_empresa }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Giro de la Empresa:</label>
							<input type="text" class="form-control" name="giro_empresa" value="{{ $solicitante->giro_empresa }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Domicilio:</label>
							<textarea class="form-control" id="direccion_rep_leg" name="direccion_empresa" rows="3" style="resize: vertical;">
								{{ $solicitante->direccion_empresa }}
							</textarea>
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Puesto:</label>
							<input type="text" class="form-control" name="puesto" value="{{ $solicitante->puesto }}">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3 form-group">
							<label class="control-label">Antiguedad en la Empresa:</label>
							<input type="text" class="form-control" name="antiguedad_empresa" value="{{ $solicitante->antiguedad_empresa }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Ingresos Mensuales:</label>
							<input type="text" class="form-control" name="ingresos" value="{{ $solicitante->ingresos }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Telefono Fijo/Celular:</label>
							<input type="text" class="form-control" name="telefono_empresa" value="{{ $solicitante->telefono_empresa }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Correo Electrónico:</label>
							<input type="text" class="form-control" name="correo_empresa" value="{{ $solicitante->correo_empresa }}">
						</div>
					</div>
					<h4 class="text-center" style="padding: 3% 0%;">REFERENCIAS PERSONALES</h4>
					<div class="row">
						<h5 style="padding-left: 3%;"><strong>Referencia 1</strong></h5>
						<div class="col-sm-4 form-group">
							<label class="control-label">Nombre:</label>
							<input type="text" class="form-control" name="nombre_ref1" value="{{ $solicitante->nombre_ref1 }}">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Telefono Fijo/Celular:</label>
							<input type="text" class="form-control" name="telefono_ref1" value="{{ $solicitante->telefono_ref1 }}">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Correo Electrónico:</label>
							<input type="text" class="form-control" name="correo_ref1" value="{{ $solicitante->correo_ref1 }}">
						</div>
					</div>
					<div class="row">
						<h5 style="padding-left: 3%;"><strong>Referencia2</strong></h5>
						<div class="col-sm-4 form-group">
							<label class="control-label">Nombre:</label>
							<input type="text" class="form-control" name="nombre_ref2" value="{{ $solicitante->nombre_ref2 }}">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Telefono Fijo/Celular:</label>
							<input type="text" class="form-control" name="telefono_ref2" value="{{ $solicitante->telefono_ref2 }}">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Correo Electrónico:</label>
							<input type="text" class="form-control" name="correo_ref2" value="{{ $solicitante->correo_ref2 }}">
						</div>
					</div>
					<h4 class="text-center" style="padding: 3% 0%;">RECIBIMOS PAGO</h4>
					<div class="row">
						<div class="col-sm-4 form-group">
							<label class="control-label">Cuota de Inscripción e IVA:</label>
							<input type="text" class="form-control" name="cuota_insc" value="{{ $solicitante->cuota_insc }}">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Cuota Mensual:</label>
							<input type="text" class="form-control" name="cuota_mensual_pago" value="{{ $solicitante->cuota_mensual_pago }}">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Importe del Recibo:</label>
							<input type="text" class="form-control" name="importe_recibo" value="{{ $solicitante->importe_recibo }}">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Cantidad con Letra:</label>
							<input type="text" class="form-control" name="cantidad_letra" value="{{ $solicitante->cantidad_letra }}">
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
							<input type="text" class="form-control" name="banco" value="{{ $solicitante->banco }}">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Número de cuenta:</label>
							<input type="text" class="form-control" name="num_cuenta" value="{{ $solicitante->num_cuenta }}">
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
							<input type="text" class="form-control" name="banco2" value="{{ $solicitante->banco2 }}">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Tarjetas de Credito:</label>
							<input type="text" class="form-control" name="num_tarjeta_credito" value="{{ $solicitante->num_tarjeta_credito }}">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Número de Cuenta:</label>
							<input type="text" class="form-control" name="num_cuenta2" value="{{ $solicitante->num_cuenta2 }}">
						</div>
					</div>
					<h4 class="text-center" style="padding: 3% 0%;">DATOS DEL BENEFICIARIO</h4>
					<div class="row">
						<div class="col-sm-4 form-group">
							<label class="control-label">Nombre:</label>
							<input type="text" class="form-control" name="nombre_benef" value="{{ $solicitante->nombre_benef }}">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Edad:</label>
							<input type="text" class="form-control" name="edad_benef" value="{{ $solicitante->edad_benef }}">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Parentesco:</label>
							<input type="text" class="form-control" name="parentesco" value="{{ $solicitante->parentesco }}">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Telefono Fijo/celular:</label>
							<input type="text" class="form-control" name="telefono_benef" value="{{ $solicitante->telefono_benef }}">
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


<script>
		function sub(){
			a=document.getElementById("ingresos").value;
			b=document.getElementById("canalventa").value;
			b=b.toUpperCase(b);
			a=a.toUpperCase(a);
			document.getElementById("id_auto").value=a;
			
		}

	$(document).ready(function(){
    $("input").keyup(function(){
            a=document.getElementById("cliente_id").value;
			b=document.getElementById("integrante").value;
			b=b.toUpperCase(b);
			a=a.toUpperCase(a);
			document.getElementById("id_auto").value=a+b;
    });
});
	</script>


	@endsection