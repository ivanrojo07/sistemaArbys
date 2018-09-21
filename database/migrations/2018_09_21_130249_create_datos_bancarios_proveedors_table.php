<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosBancariosProveedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_bancarios_proveedors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('provedor_id')->unsigned();
            $table->foreign('provedor_id')->references('id')->on('proveedores');
            $table->integer('banco_id')->unsigned();
            $table->foreign('banco_id')->references('id')->on('bancos');
            $table->string('cuenta');
            $table->string('clabe');
            $table->string('beneficiario');
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
        Schema::dropIfExists('datos_bancarios_proveedors');
    }
}
