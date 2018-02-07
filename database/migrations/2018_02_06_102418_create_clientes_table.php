<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('tipopersona',['Fisica','Moral']);
            //Nombre Completo
            $table->string('nombre');
            $table->string('apellidopaterno');
            $table->string('apellidomaterno');
            //Domicilio
            $table->string('calle')->nullable();
            $table->string('numext')->nullable();
            $table->string('numinter')->nullable();
            $table->string('cp')->nullable();
            $table->string('colonia')->nullable();
            $table->string('municipio')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('estado')->nullable();
            $table->string('identificador');
            $table->string('mail');
            $table->string('rfc');
            $table->string('telefono');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
