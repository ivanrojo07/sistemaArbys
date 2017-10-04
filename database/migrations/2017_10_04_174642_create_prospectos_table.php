<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProspectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospectos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('docimicilio');
            $table->string('mail');
            $table->string('rfc');
            $table->string('telefonofijo');
            $table->string('telefonocelular');
            $table->enum('producto',['Pack','Automovil','Motocicleta']);
            $table->integer('ingresos');
            $table->string('canalventa');
            $table->string('promocion');
            $table->string('seguimiento');
            $table->integer('calificacion');
            $table->text('comentarios');
            $table->string('listadeprecios');
            $table->string('cotizador');
            $table->integer('identificador');
            $table->string('objetivomensual');
            $table->string('ventafrio');
            $table->string('seguimiento2');
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
        Schema::dropIfExists('prospectos');
    }
}
