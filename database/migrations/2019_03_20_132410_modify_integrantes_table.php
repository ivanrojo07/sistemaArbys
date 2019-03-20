<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyIntegrantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('integrantes', function (Blueprint $table) {
            // Datos generales
            $table->string('clave_unidad');
            $table->string('tipo_unidad');
            $table->string('costo');
            $table->string('cuota_mensual');
            $table->string('plazo');
            $table->string('num_tarifa');
            $table->string('clave_asesor');
            $table->string('nombre_asesor');
            // Datos Solicitante
            $table->string('nombre_sol');
            $table->string('razon');
            $table->string('calle');
            $table->string('num_int');
            $table->string('num_ext');
            $table->string('colonia');
            $table->string('delegacionmunicipio');
            $table->integer('cp');
            $table->string('ciudad');
            $table->string('estado');
            $table->string('correo');
            $table->string('telefono');
            $table->string('RFC');
            $table->string('tiempo_residir');
            $table->string('tipo_vivienda');
            $table->string('nombre_conyuge');
            $table->string('estado_civil');
            $table->string('genero');
            $table->string('sociedad_conyugal');
            $table->string('celular');
            // Datos del representante legal
            $table->string('nombre_rep_leg');
            $table->text('direccion_rep_leg');
            $table->string('telefono_rep_leg');
            $table->string('correo_rep_leg');
            // Datos del empleo actual
            $table->string('razon_empresa');
            $table->string('giro_empresa');
            $table->text('direccion_empresa');
            $table->string('puesto');
            $table->string('antiguedad_empresa');
            $table->string('ingresos');
            $table->string('telefono_empresa');
            $table->string('correo_empresa');
            // Referencias personales
            $table->string('nombre_ref1');
            $table->string('telefono_ref1');
            $table->string('correo_ref1');
            $table->string('nombre_ref2');
            $table->string('telefono_ref2');
            $table->string('correo_ref2');
            // Recibimos pago
            $table->string('cuota_insc');
            $table->string('cuota_mensual');
            $table->string('importe_recibo');
            $table->string('cantidad_letra');
            // Crediticios
            $table->string('cuenta_cheques');
            $table->string('banco');
            $table->string('num_cuenta');
            $table->string('otra_cuenta');
            $table->string('banco2');
            $table->string('num_tarjeta_credito');
            $table->string('num_cuenta2');
            // Datos del beneficiario
            $table->string('nombre_benef');
            $table->string('edad_benef');
            $table->string('parentesco');
            $table->string('telefono_benef');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('integrantes', function (Blueprint $table) {
            $table->dropColumn(['votes', 'avatar', 'location']);
        });
    }
}
