<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('perfil_id')->unsigned();
            $table->foreign('perfil_id')->references('id')->on('perfils');
            $table->integer('puesto_id')->unsigned();
            $table->foreign('puesto_id')->references('id')->on('puestos');
            $table->integer('area_id')->unsigned();
            $table->foreign('area_id')->references('id')->on('areas');
            $table->string('usuario')->unique();
            $table->string('mail')->unique();
            $table->string('password');
            $table->string('nombre');
            $table->string('appaterno');
            $table->string('apmaterno');
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
        Schema::dropIfExists('usuarios');
    }
}
