<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personal_id')->unsigned();
            $table->foreign('personal_id')->references('id')->on('personals');
            $table->string('nombre');
            $table->string('apater');
            $table->string('amater');
            $table->string('area');
            $table->string('puesto');
            $table->string('telefono1');
            $table->string('ext1')->nullable();
            $table->string('telefono2')->nullable();
            $table->string('ext2')->nullable();
            $table->string('telefonodir');
            $table->string('celular1');
            $table->string('celular2')->nullable();
            $table->string('email1');
            $table->string('email2')->nullable();
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
        Schema::dropIfExists('contacto');
    }
}
