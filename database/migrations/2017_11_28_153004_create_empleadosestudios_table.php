<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosestudiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleadosestudios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('empleado_id')->unsigned();
            $table->foreign('empleado_id')->references('id')->on('empleados');
            $table->string('escolaridad1');
            $table->string('institucion1')->nullable();
            $table->string('cedula1')->nullable();
            $table->string('escolaridad2');
            $table->string('institucion2')->nullable();
            $table->string('cedula2')->nullable();
            $table->string('idioma1');
            $table->string('nivel1');
            $table->string('idioma2');
            $table->string('nivel2');
            $table->string('idioma3');
            $table->string('nivel3');
            $table->string('curso1');
            $table->boolean('certificado1')->nullable();
            $table->string('curso2')->nullable();
            $table->boolean('certificado2')->nullable();
            $table->string('curso3')->nullable();
            $table->boolean('certificado3')->nullable();
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
        Schema::dropIfExists('empleadosestudios');
    }
}
