<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntegrantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integrantes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->string('identificacion')->nullable();
            $table->string('num_identificacion')->nullable();
            $table->string('comprobante_domicilio')->nullable();
            $table->string('nombre_comp_domc')->nullable();
            $table->string('direccion')->nullable();
            $table->string('solicitud')->nullable();
            
            $table->string('archivo_identificacion')->nullable();
            $table->string('archivo_comprobante')->nullable();
            $table->string('archivo_solicitud')->nullable();
            $table->string('archivo_pago')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('integrantes');
    }
}
