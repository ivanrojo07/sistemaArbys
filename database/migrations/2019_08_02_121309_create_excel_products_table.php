<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExcelProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excel_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clave');
            $table->string('descripcion');
            $table->string('precio_lista');
            $table->string('m60')->nullable();
            $table->string('m48')->nullable();
            $table->string('m36')->nullable();
            $table->string('m24')->nullable();
            $table->string('m12')->nullable();
            $table->string('apertura')->nullable();
            $table->string('marca');
            $table->string('tipo');
            $table->string('categoria')->nullable();
            $table->timestamps();
            $table->integer('cilindrada')->nullable();
            $table->string('tipo_moto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('excel_products');
    }
}
