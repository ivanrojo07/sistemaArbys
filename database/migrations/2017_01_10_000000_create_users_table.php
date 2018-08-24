<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('perfil_id')->unsigned()->nullable();
            $table->foreign('perfil_id')->references('id')->on('perfils');
            $table->integer('puesto_id')->unsigned()->nullable();
            $table->foreign('puesto_id')->references('id')->on('puestos');
            $table->integer('area_id')->unsigned()->nullable();
            $table->foreign('area_id')->references('id')->on('areas');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nombre')->nullable();
            $table->string('appaterno')->nullable();
            $table->string('apmaterno')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
