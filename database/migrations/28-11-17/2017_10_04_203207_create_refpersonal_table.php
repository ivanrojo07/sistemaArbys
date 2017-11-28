<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefpersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refpersonal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personal_id')->unsigned();
            $table->foreign('personal_id')->references('id')->on('personals');
            $table->string('nombre');
            $table->string('apepat');
            $table->string('apemat');
            $table->string('telefono1');
            $table->string('telefono2')->nullable();
            $table->string('telefono3')->nullable();
            $table->string('parentesco');
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
        Schema::dropIfExists('refpersonal');
    }
}
