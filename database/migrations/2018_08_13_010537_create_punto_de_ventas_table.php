<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePuntoDeVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('punto_de_ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('oficina_id')->unsigned();
            $table->foreign('oficina_id')->references('id')->on('oficinas');
            $table->string('nombre');
            $table->string('abreviatura', 3);
            $table->string('responsable');
            $table->string('descripcion', 500);
            $table->enum('tipo', ['oficina', 'kiosko']);
            $table->string('calle');
            $table->string('numext');
            $table->string('numint')->nullable();
            $table->string('colonia');
            $table->string('cp');
            $table->string('ciudad');
            $table->string('nombre_plaza');
            $table->string('numero_stand');
            $table->string('ubicacion');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
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
        Schema::dropIfExists('punto_de_ventas');
    }
}
