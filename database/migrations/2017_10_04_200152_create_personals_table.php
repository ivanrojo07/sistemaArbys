<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('tipo', ['Prospecto','Cliente']);
            $table->enum('tipopersona',['Fisica','Moral']);
            $table->string('nombre')->nullable();
            $table->string('apellidopaterno')->nullable();
            $table->string('apellidomaterno')->nullable();
            $table->string('razonsocial')->nullable();
            $table->enum('prioridad',['Baja','Mediana','Alta']);
            $table->string('calificacion');
            $table->string('calle')->nullable();
            $table->string('numext')->nullable();
            $table->string('numinter')->nullable();
            $table->string('cp')->nullable();
            $table->string('colonia')->nullable();
            $table->string('municipio')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('estado')->nullable();
            $table->string('calle1')->nullable();
            $table->string('calle2')->nullable();
            $table->string('referencia')->nullable();
            $table->string('recidir')->nullable();
            $table->string('vivienda')->nullable();
            $table->string('mail');
            $table->string('rfc');
            $table->string('telefonofijo');
            $table->string('telefonocel');
            $table->string('estadocivil')->nullable();
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personals');
    }
}
