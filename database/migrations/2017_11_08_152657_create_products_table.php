<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clave');
            $table->string('descripcion');
            $table->integer('precio_lista');
            $table->integer('mensualidad_p_fisica');
            $table->integer('mensualidad_p_moral')->nullable();
            $table->integer('apertura');
            $table->integer('inicial');
            $table->string('marca');
            $table->string('tipo');
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
        Schema::dropIfExists('products');
    }
}
