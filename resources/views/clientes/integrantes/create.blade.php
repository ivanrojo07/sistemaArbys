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
		<form method="POST" action="{{ route('clientes.solicitantes.store',['cliente' => $cliente]) }}">
				{{ csrf_field() }}
				<input type="hidden" name="cliente" value="{{ $cliente }}">
				<div class="panel-body">
					<h4 class="text-center" style="padding: 3% 0%;">DATOS GENERALES</h4>
					<div class="row">
						<div class="col-sm-3 form-group">
							<label class="control-label">Clave de la unidad:</label>
							<input class="form-control" name="clave_unidad" value="{{ $producto->clave }}" readonly>
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Tipo de la unidad:</label>
							<input class="form-control" name="tipo_unidad" value="{{ $producto->tipo }}" readonly>
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Costo de la unidad:</label>
							<input class="form-control" name="costo" value="{{ $producto->precio_lista }}" readonly>
						</div>
						@if($pago->meses == 60)
							<div class="col-sm-3 form-group">
								<label class="control-label">Cuota Mensual:</label>
								<input class="form-control" name="cuota_mensual" value="{{ $producto->m60}}" readonly="">
							</div>
						@elseif($pago->meses == 48)
							<div class="col-sm-3 form-group">
								<label class="control-label">Cuota Mensual:</label>
								<input class="form-control" name="cuota_mensual" value="{{ $producto->m48 }}" readonly="">
							</div>
						@elseif($pago->meses == 36)
							<div class="col-sm-3 form-group">
								<label class="control-label">Cuota Mensual:</label>
								<input class="form-control" name="cuota_mensual" value="{{ $producto->m36 }}" readonly="">
							</div>
						@elseif($pago->meses == 24)
							<div class="col-sm-3 form-group">
								<label class="control-label">Cuota Mensual:</label>
								<input class="form-control" name="cuota_mensual" value="{{ $producto->m24 }}" readonly="">
							</div>
						@elseif($pago->meses == 12)
							<div class="col-sm-3 form-group">
								<label class="control-label">Cuota Mensual:</label>
								<input class="form-control" name="cuota_mensual" value="{{ $producto->m12 }}" readonly="">
							</div>
						@endif
						<div class="col-sm-3 form-group">
							<label class="control-label">Plazo</label>
							<input class="form-control" name="plazo" value="{{ $pago->meses }}" readonly>
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Número de Tarifa:</label>
							<input type="text" class="form-control" name="num_tarifa">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Clave Asesor:</label>
							<input class="form-control" name="clave_asesor" value="{{ $cliente->vendedor->id }}" readonly="">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Nombre asesor:</label>
							<input class="form-control" name="nombre_asesor" value="{{ $cliente->vendedor->empleado->nombre }} {{ $cliente->vendedor->empleado->appaterno }} {{ $cliente->vendedor->empleado->apmaterno }}" readonly="">
						</div>
					</div>
					<h4 class="text-center" style="padding: 3% 0%;">DATOS SOLICITANTE</h4>
					<div class="row">
						@if($cliente->tipo === "Física")
						<div class="col-sm-3 form-group">
							<label class="control-label">Nombre:</label>
							<input class="form-control" name="nombre_sol" value="{{ $cliente->nombre ." ".$cliente->appaterno." ".$cliente->apmaterno }}" readonly>
						</div>
						@else
						<div class="col-sm-3 form-group">
							<label class="control-label">Razon:</label>
							<input class="form-control" name="razon" value="{{ $cliente->razon }}" readonly>
						</div>
						@endif
						<div class="col-sm-3 form-group">
							<label class="control-label">✱Calle:</label>
							<input type="text" class="form-control" name="calle">
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
							<input type="email" class="form-control" name="correo" value="{{ $cliente->email }}" readonly>
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">Telefono Fijo:</label>
							<input type="text" class="form-control" name="telefono" pattern="+[0-9]">
						</div>
						<div class="col-sm-3 form-group">
							<label class="control-label">✱RFC:</label>
							<input type="text" class="form-control" name="RFC" value="{{ $cliente->rfc }}" readonly>
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
							<input type="text" class="form-control" name="celular" value="{{ $cliente->movil }}" readonly>
						</div>
					</div>
					@if($cliente->tipo == "Moral")
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
					@endif
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
						{{-- <div class="col-sm-4 form-group">
							<label class="control-label">Cuota Mensual:</label>
							<input type="text" class="form-control" name="cuota_mensual_pago">
						</div> --}}
						@if($pago->meses == 60)
							<div class="col-sm-4 form-group">
								<label class="control-label">Cuota Mensual:</label>
								<input class="form-control" name="cuota_mensual_pago" value="{{ $producto->m60}}">
							</div>
						@elseif($pago->meses == 48)
							<div class="col-sm-4 form-group">
								<label class="control-label">Cuota Mensual:</label>
								<input class="form-control" name="cuota_mensual_pago" value="{{ $producto->m48 }}">
							</div>
						@elseif($pago->meses == 36)
							<div class="col-sm-4 form-group">
								<label class="control-label">Cuota Mensual:</label>
								<input class="form-control" name="cuota_mensual_pago" value="{{ $producto->m36 }}">
							</div>
						@elseif($pago->meses == 24)
							<div class="col-sm-4 form-group">
								<label class="control-label">Cuota Mensual:</label>
								<input class="form-control" name="cuota_mensual_pago" value="{{ $producto->m24 }}">
							</div>
						@elseif($pago->meses == 12)
							<div class="col-sm-4 form-group">
								<label class="control-label">Cuota Mensual:</label>
								<input class="form-control" name="cuota_mensual_pago" value="{{ $producto->m12 }}">
							</div>
						@endif
						<div class="col-sm-4 form-group">
							<label class="control-label">Importe del Recibo:</label>
							<input type="text" class="form-control" name="importe_recibo" value="{{ $pago->total }}" readonly="">
						</div>
						<div class="col-sm-8 form-group">
							<label class="control-label">Cantidad con Letra:</label>
							<input type="text" class="form-control" name="cantidad_letra" id="cant_letra" readonly="">
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
							<input type="text" class="form-control" name="nombre_benef" value="{{ $cliente->nombre }} {{ $cliente->appaterno }} {{ $cliente->apmaterno }}" readonly="">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Edad:</label>
							<input type="text" class="form-control" name="edad_benef" value="{{Carbon\Carbon::parse($cliente->nacimiento)->age }}" readonly="">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Parentesco:</label>
							<input type="text" class="form-control" name="parentesco">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Telefono Fijo/celular:</label>
							<input type="text" class="form-control" name="telefono_benef" value="{{ $cliente->movil }}" readonly="">
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
@section('scripts')
<script>
	var numeroALetras = (function() {

	    function Unidades(num){

	        switch(num)
	        {
	            case 1: return 'UN';
	            case 2: return 'DOS';
	            case 3: return 'TRES';
	            case 4: return 'CUATRO';
	            case 5: return 'CINCO';
	            case 6: return 'SEIS';
	            case 7: return 'SIETE';
	            case 8: return 'OCHO';
	            case 9: return 'NUEVE';
	        }

	        return '';
	    }//Unidades()

	    function Decenas(num){

	        let decena = Math.floor(num/10);
	        let unidad = num - (decena * 10);

	        switch(decena)
	        {
	            case 1:
	                switch(unidad)
	                {
	                    case 0: return 'DIEZ';
	                    case 1: return 'ONCE';
	                    case 2: return 'DOCE';
	                    case 3: return 'TRECE';
	                    case 4: return 'CATORCE';
	                    case 5: return 'QUINCE';
	                    default: return 'DIECI' + Unidades(unidad);
	                }
	            case 2:
	                switch(unidad)
	                {
	                    case 0: return 'VEINTE';
	                    default: return 'VEINTI' + Unidades(unidad);
	                }
	            case 3: return DecenasY('TREINTA', unidad);
	            case 4: return DecenasY('CUARENTA', unidad);
	            case 5: return DecenasY('CINCUENTA', unidad);
	            case 6: return DecenasY('SESENTA', unidad);
	            case 7: return DecenasY('SETENTA', unidad);
	            case 8: return DecenasY('OCHENTA', unidad);
	            case 9: return DecenasY('NOVENTA', unidad);
	            case 0: return Unidades(unidad);
	        }
	    }//Unidades()

	    function DecenasY(strSin, numUnidades) {
	        if (numUnidades > 0)
	            return strSin + ' Y ' + Unidades(numUnidades)

	        return strSin;
	    }//DecenasY()

	    function Centenas(num) {
	        let centenas = Math.floor(num / 100);
	        let decenas = num - (centenas * 100);

	        switch(centenas)
	        {
	            case 1:
	                if (decenas > 0)
	                    return 'CIENTO ' + Decenas(decenas);
	                return 'CIEN';
	            case 2: return 'DOSCIENTOS ' + Decenas(decenas);
	            case 3: return 'TRESCIENTOS ' + Decenas(decenas);
	            case 4: return 'CUATROCIENTOS ' + Decenas(decenas);
	            case 5: return 'QUINIENTOS ' + Decenas(decenas);
	            case 6: return 'SEISCIENTOS ' + Decenas(decenas);
	            case 7: return 'SETECIENTOS ' + Decenas(decenas);
	            case 8: return 'OCHOCIENTOS ' + Decenas(decenas);
	            case 9: return 'NOVECIENTOS ' + Decenas(decenas);
	        }

	        return Decenas(decenas);
	    }//Centenas()

	    function Seccion(num, divisor, strSingular, strPlural) {
	        let cientos = Math.floor(num / divisor)
	        let resto = num - (cientos * divisor)

	        let letras = '';

	        if (cientos > 0)
	            if (cientos > 1)
	                letras = Centenas(cientos) + ' ' + strPlural;
	            else
	                letras = strSingular;

	        if (resto > 0)
	            letras += '';

	        return letras;
	    }//Seccion()

	    function Miles(num) {
	        let divisor = 1000;
	        let cientos = Math.floor(num / divisor)
	        let resto = num - (cientos * divisor)

	        let strMiles = Seccion(num, divisor, 'UN MIL', 'MIL');
	        let strCentenas = Centenas(resto);

	        if(strMiles == '')
	            return strCentenas;

	        return strMiles + ' ' + strCentenas;
	    }//Miles()

	    function Millones(num) {
	        let divisor = 1000000;
	        let cientos = Math.floor(num / divisor)
	        let resto = num - (cientos * divisor)

	        let strMillones = Seccion(num, divisor, 'UN MILLON DE', 'MILLONES DE');
	        let strMiles = Miles(resto);

	        if(strMillones == '')
	            return strMiles;

	        return strMillones + ' ' + strMiles;
	    }//Millones()

	    return function NumeroALetras(num, currency) {
	        currency = currency || {};
	        let data = {
	            numero: num,
	            enteros: Math.floor(num),
	            centavos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),
	            letrasCentavos: '',
	            letrasMonedaPlural: currency.plural || 'PESOS',//'PESOS', 'Dólares', 'Bolívares', 'etcs'
	            letrasMonedaSingular: currency.singular || 'PESO', //'PESO', 'Dólar', 'Bolivar', 'etc'
	            letrasMonedaCentavoPlural: currency.centPlural || 'CENTAVOS',
	            letrasMonedaCentavoSingular: currency.centSingular || 'CENTAVOS'
	        };

	        if (data.centavos > 0) {
	            data.letrasCentavos = 'CON ' + (function () {
	                    if (data.centavos == 1)
	                        return Millones(data.centavos) + ' ' + data.letrasMonedaCentavoSingular;
	                    else
	                        return Millones(data.centavos) + ' ' + data.letrasMonedaCentavoPlural;
	                })();
	        };

	        if(data.enteros == 0)
	            return 'CERO ' + data.letrasMonedaPlural + ' ' + data.letrasCentavos;
	        if (data.enteros == 1)
	            return Millones(data.enteros) + ' ' + data.letrasMonedaSingular + ' ' + data.letrasCentavos;
	        else
	            return Millones(data.enteros) + ' ' + data.letrasMonedaPlural + ' ' + data.letrasCentavos;
	    };

	})();

	$(document).ready(function($) {
		$('#cant_letra').val(numeroALetras({{ $pago->total}}))	;
	});

// Modo de uso: 500,34 USD
console.log(numeroALetras(500.34, {}));
</script>
@endsection