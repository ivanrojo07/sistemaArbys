<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vendedor_id')->unsigned();
            $table->foreign('vendedor_id')->references('id')->on('vendedors');
            $table->string('tipo');
            $table->string('identificador');
            $table->string('nombre')->nullable();
            $table->string('appaterno')->nullable();
            $table->string('apmaterno')->nullable();
            $table->string('razon')->nullable();
            $table->date('nacimiento')->nullable();
            $table->string('rfc');
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->string('movil')->nullable();
            $table->string('canal')->nullable();
            $table->text('comentarios')->nullable();
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
        Schema::dropIfExists('clientes');
    }
}
