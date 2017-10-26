<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatoslabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datoslab', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personal_id')->unsigned();
            $table->foreign('personal_id')->references('id')->on('personals');
            $table->string('nombreempresa');
            $table->string('calleempresa');
            $table->integer('numextempresa');
            $table->integer('numinterempresa');
            $table->string('cpempresa');
            $table->string('coloniaempresa');
            $table->string('municipioempresa');
            $table->string('ciudadempresa');
            $table->string('estadoempresa');
            $table->string('giroempresa');
            $table->string('puestoempresa');
            $table->string('antiguedadempresa');
            $table->string('telefonoempresa');
            $table->string('ingresosmesempresa');
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
        Schema::dropIfExists('datoslab');
    }
}
