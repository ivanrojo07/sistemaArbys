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
            $table->integer('estado_id')->unsigned();
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->string('nombre');
            $table->string('abreviatura', 3);
            $table->string('responsable_com');
            $table->string('responsable_adm');
            $table->string('descripcion', 500)->nullable();
            $table->string('calle');
            $table->integer('numext');
            $table->integer('numint')->nullable();
            $table->integer('cp');
            $table->string('delegacion');
            $table->string('ciudad');
            $table->integer('telefono1');
            $table->integer('telefono2')->nullable();
            $table->integer('telefono3')->nullable();
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
