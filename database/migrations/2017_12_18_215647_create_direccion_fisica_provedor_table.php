<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDireccionFisicaProvedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccion_fisica_provedor', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('provedor_id')->unsigned();
        $table->foreign('provedor_id')->references('id')->on('proveedores');
        $table->string('calle');
        $table->string('numext');
        $table->string('numint')->nullable();
        $table->string('cp')->nullable();
        $table->string('colonia');
        $table->string('municipio');
        $table->string('ciudad');
        $table->string('estado');
        $table->string('referencia')->nullable();
        $table->string('calle1')->nullable();
        $table->string('calle2')->nullable();
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
        Schema::dropIfExists('direccion_fisica_provedor');
    }
}
