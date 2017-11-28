<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personal_id')->unsigned();
            $table->foreign('personal_id')->references('id')->on('personals');
            $table->date('fecha_act');
            $table->date('fecha_cont');
            $table->date('fecha_aviso');
            $table->string('hora');
            $table->string('status');
            $table->text('comentarios')->nullable();
            $table->text('acuerdos')->nullable();
            $table->text('observaciones')->nullable();
            $table->enum('tipo_cont',['Mail','Telefono','Cita','Whatsapp','Otro']);
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
        Schema::dropIfExists('crm');
    }
}
