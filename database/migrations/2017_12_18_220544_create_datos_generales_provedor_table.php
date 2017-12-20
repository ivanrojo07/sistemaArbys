<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosGeneralesProvedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_generales_provedor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('provedor_id')->unsigned();
            $table->foreign('provedor_id')->references('id')->on('proveedores');
            $table->integer('giro_id')->unsigned();
            $table->foreign('giro_id')->references('id')->on('giro');
            $table->enum('tamano',['micro', 'pequeña','mediana', 'grande']);
            $table->integer('forma_contacto_id')->unsigned();
            $table->foreign('forma_contacto_id')->references('id')->on('forma_contacto');
            $table->string('web')->nullable();
            $table->text('comentario')->nullable();
            $table->date('fechacontacto')->nullable();
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
        Schema::dropIfExists('datos_generales_provedor');
    }
}
