<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitantes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('cliente_id')->unsigned();
            $table->string('integrante')->nullable();
            
            $table->string('clave_unidad')->nullable();
            $table->string('tipo_unidad')->nullable();
            $table->string('costo')->nullable();
            $table->string('cuota_mensual')->nullable();
            $table->string('plazo')->nullable();
            $table->string('num_tarifa')->nullable();
            $table->string('clave_asesor')->nullable();
            $table->string('nombre_asesor')->nullable();
            // Datos Solicitante
            $table->string('nombre_sol')->nullable();
            $table->string('razon')->nullable();
            $table->string('calle')->nullable();
            $table->string('num_int')->nullable();
            $table->string('num_ext')->nullable();
            $table->string('colonia')->nullable();
            $table->string('delegacionmunicipio')->nullable();
            $table->integer('cp')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('estado')->nullable();
            $table->string('correo')->nullable();
            $table->string('telefono')->nullable();
            $table->string('RFC')->nullable();
            $table->string('tiempo_residir')->nullable();
            $table->string('tipo_vivienda')->nullable();
            $table->string('nombre_conyuge')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('genero')->nullable();
            $table->string('sociedad_conyugal')->nullable();
            $table->string('carpeta_integrante')->nullable();
            $table->string('celular')->nullable();
            // Datos del representante legal
            $table->string('nombre_rep_leg')->nullable();
            $table->text('direccion_rep_leg')->nullable();
            $table->string('telefono_rep_leg')->nullable();
            $table->string('correo_rep_leg')->nullable();
            // Datos del empleo actual
            $table->string('razon_empresa')->nullable();
            $table->string('giro_empresa')->nullable();
            $table->text('direccion_empresa')->nullable();
            $table->string('puesto')->nullable();
            $table->string('antiguedad_empresa')->nullable();
            $table->string('ingresos')->nullable();
            $table->string('telefono_empresa')->nullable();
            $table->string('correo_empresa')->nullable();
            // Referencias personales
            $table->string('nombre_ref1')->nullable();
            $table->string('telefono_ref1')->nullable();
            $table->string('correo_ref1')->nullable();
            $table->string('nombre_ref2')->nullable();
            $table->string('telefono_ref2')->nullable();
            $table->string('correo_ref2')->nullable();
            // Recibimos pago
            $table->string('cuota_insc')->nullable();
            $table->string('cuota_mensual_pago')->nullable();
            $table->string('importe_recibo')->nullable();
            $table->string('cantidad_letra')->nullable();
            // Crediticios
            $table->string('cuenta_cheques')->nullable();
            $table->string('banco')->nullable();
            $table->string('num_cuenta')->nullable();
            $table->string('otra_cuenta')->nullable();
            $table->string('banco2')->nullable();
            $table->string('num_tarjeta_credito')->nullable();
            $table->string('num_cuenta2')->nullable();
            // Datos del beneficiario
            $table->string('nombre_benef')->nullable();
            $table->string('edad_benef')->nullable();
            $table->string('parentesco')->nullable();
            $table->string('telefono_benef')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitantes');
    }
}
