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
            $table->string('apmaterno')->nullable();
            $table->string('email');
            $table->string('rfc');
            $table->string('telefono')->nullable();
            $table->string('movil')->nullable();
            $table->string('nss')->nullable();
            $table->string('curp')->nullable();
            $table->string('infonavit')->nullable();
            $table->date('nacimiento');
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
        Schema::dropIfExists('empleados');
    }
}
