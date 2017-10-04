<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clientes_id')->unsigned();
            $table->foreign('clientes_id')->references('id')->on('clientes');
            $table->string('nombre');
            $table->string('apellidopaterno');
            $table->string('apellidomaterno');
            $table->string('calle');
            $table->integer('numext');
            $table->integer('numinter');
            $table->string('cp');
            $table->string('colonia');
            $table->string('municipio');
            $table->string('ciudad');
            $table->string('estado');
            $table->string('calle1');
            $table->string('calle2');
            $table->string('referencia')->nullable();
            $table->date('recidir');
            $table->string('vivienda');
            $table->string('mail');
            $table->string('rfc');
            $table->string('telefonofijo');
            $table->string('telefonocel');
            $table->enum('estadocivil',['Casado','Soltero']);
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
        Schema::dropIfExists('personas');
    }
}
