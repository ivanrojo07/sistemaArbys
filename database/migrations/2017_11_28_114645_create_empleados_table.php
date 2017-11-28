<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('appaterno');
            $table->string('apmaterno');
            $table->string('rfc')->nullable();
            $table->string('telefono')->nullable();
            $table->string('movil')->nullable();
            $table->string('email')->nullable();
            $table->string('nss')->nullable();
            $table->string('curp')->nullable();
            $table->string('infonavit')->nullable();
            $table->date('fnac')->nullable();
            $table->string('cp')->nullable();
            $table->string('calle')->nullable();
            $table->string('numext')->nullable();
            $table->string('numint')->nullable();
            $table->string('colonia')->nullable();
            $table->string('municipio')->nullable();
            $table->string('estado')->nullable();
            $table->string('calles')->nullable();
            $table->string('referencia')->nullable();
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
        Schema::dropIfExists('empleados');
    }
}
