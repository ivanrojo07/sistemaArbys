<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentaprodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventaprod', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('producto',['Pack','Automovil','Motocicleta']);
            $table->float('ingresos',8,2);
            $table->string('canalventa');
            $table->string('promocion');
            $table->string('seguimiento');
            $table->integer('calificación')->nullable();
            $table->text('comentario')->nullable();
            $table->string('listaprecio');
            $table->string('cotizador')->nullable();
            $table->string('identificador')->nullable();
            $table->string('objetivomes')->nullable();
            $table->string('folio')->nullable();
            $table->date('fechasol')->nullable();
            $table->date('fechacont')->nullable();
            $table->date('fechapag')->nullable();
            $table->date('fechaentrega')->nullable();
            $table->string('refcontrato')->nullable();
            $table->string('refapertura')->nullable();
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
        Schema::dropIfExists('ventaprod');
    }
}
