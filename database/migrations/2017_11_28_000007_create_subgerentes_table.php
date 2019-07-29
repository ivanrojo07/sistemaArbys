<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubgerentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subgerentes', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('empleado_id')->unsigned();
            $table->integer('oficina_id')->unsigned()->nullable();

            $table->foreign('empleado_id')->references('id')->on('empleados');
            $table->foreign('oficina_id')->references('id')->on('oficinas');
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
        Schema::dropIfExists('subgerentes');
    }
}
