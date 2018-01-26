<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSucursalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursals', function (Blueprint $table) {

            $table->increments('id');
            $table->string('nombre');

            $table->string('responsable');
            $table->string('claveid');
            

            $table->string('region');

            $table->string('calle');
            $table->string('numext');
            $table->string('numint')->nullable();
            $table->string('colonia');
            $table->string('delegacion');
            $table->string('ciudad');
            $table->string('estado');
            $table->string('calle1')->nullable();
            $table->string('calle2')->nullable();
            $table->string('referencia')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sucursals');
    }
}
