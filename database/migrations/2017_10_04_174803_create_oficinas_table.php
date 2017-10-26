<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOficinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oficinas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('telefono');
            $table->string('rentaoficina');
            $table->string('luz');
            $table->string('responsableoficina');
            $table->string('modulooficina');
            $table->string('objetivo');
            $table->enum('personal',['AsistGen','AyudAsist','Asesor','Supervisor','GerenVentas','Mantenimiento']);
            $table->integer('numoficina');
            $table->enum('documentacion', ['ActaConstitutiva', 'Permisos', 'Licencias']);
            $table->string('region');
            $table->string('estado');
            $table->string('provedores');
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
        Schema::dropIfExists('oficinas');
    }
}
