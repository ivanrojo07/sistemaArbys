<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosemergenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleadosemergencias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('empleado_id')->unsigned();
            $table->foreign('empleado_id')->references('id')->on('empleados');
            $table->enum('sangre',['O-','O+','AB+','AB-','A+','A-','B+','B-']);
            $table->text('enfermedades')->nullable();
            $table->text('alergias')->nullable();
            $table->text('operaciones')->nullable();
            $table->string('nombrecontac1')->nullable();
            $table->string('parentescocontac1')->nullable();
            $table->string('telefonocontac1')->nullable();
            $table->string('movilcontac1')->nullable();
            $table->string('nombrecontac2')->nullable();
            $table->string('parentescocontac2')->nullable();
            $table->string('telefonocontac2')->nullable();
            $table->string('movilcontac2')->nullable();
            $table->string('nombrecontac3')->nullable();
            $table->string('parentescocontac3')->nullable();
            $table->string('telefonocontac3')->nullable();
            $table->string('movilcontac3')->nullable();
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
        Schema::dropIfExists('empleadosemergencias');
    }
}
