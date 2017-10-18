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
<<<<<<< HEAD
            $table->string('nombre')->nullable();
=======
            $table->string('nombre');
>>>>>>> 048fb935f2d0de00ab53c0dd6730d2470a1223c7
            $table->string('apellidopaterno')->nullable();
            $table->string('apellidomaterno')->nullable();
            $table->string('razonsocial')->nullable();
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
            $table->date('recidir')->nullable();
            $table->string('vivienda')->nullable();
            $table->string('mail');
            $table->string('rfc');
            $table->string('telefonofijo');
            $table->string('telefonocel');
            $table->string('estadocivil')->nullable();
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
        Schema::dropIfExists('personals');
    }
}
