<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosGeneralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_generales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personal_id')->unsigned();
            $table->foreign('personal_id')->references('id')->on('personals');
            $table->integer('giro_id')->unsigned();
            $table->foreign('giro_id')->references('id')->on('giro');
            $table->enum('tamano',['micro', 'pequeña','mediana', 'grande']);
            $table->string('formacontacto');
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
        Schema::dropIfExists('datos_generales');
    }
}
