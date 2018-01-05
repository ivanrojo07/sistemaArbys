<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identificador')->unique();
            $table->string('marca');
            // $table->integer('marca_id')->unsigned();
            // $table->foreign('marca_id')->references('id')->on('marca');
            $table->string('clave');
            $table->string('familia');
            // $table->integer('familia_id')->unsigned();
            // $table->foreign('familia_id')->references('id')->on('familia');
            $table->string('tipo');
            // $table->integer('tipo_id')->unsigned();
            // $table->foreign('tipo_id')->references('id')->on('tipo');
            $table->string('subtipo')->nullable();
            // $table->integer('subtipo_id')->unsigned();
            // $table->foreign('subtipo_id')->references('id')->on('subtipo');
            $table->string('medida1')->nullable();
            $table->string('unidad1')->nullable();
            // $table->integer('unidad1_id')->unsigned()->nullable();
            // $table->foreign('unidad1_id')->references('id')->on('unidad');
            $table->string('medida2')->nullable();
            $table->string('unidad2')->nullable();
            // $table->integer('unidad2_id')->unsigned()->nullable();
            // $table->foreign('unidad2_id')->references('id')->on('unidad');
            $table->string('medida3')->nullable();
            $table->string('unidad3');
            // $table->integer('unidad3_id')->unsigned();
            // $table->foreign('unidad3_id')->references('id')->on('unidad');
            $table->string('modelo')->nullable();
            $table->string('presentacion');
            // $table->integer('presentacion_id')->unsigned();
            // $table->foreign('presentacion_id')->references('id')->on('presentacion');
            $table->string('calidad');
            // $table->integer('calidad_id')->unsigned();
            // $table->foreign('calidad_id')->references('id')->on('calidad');
            $table->string('acabado');
            // $table->integer('acabado_id')->unsigned();
            // $table->foreign('acabado_id')->references('id')->on('acabado');
            $table->string('descripcion_short');
            $table->text('descripcion_large');
            $table->string('Sat_id')->nullable();
            $table->text('Sat_descripcion')->nullable();
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
        Schema::dropIfExists('producto');
    }
}
