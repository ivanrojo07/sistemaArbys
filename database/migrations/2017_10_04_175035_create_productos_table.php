<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('producto');
            $table->string('ingresos');
            $table->string('canalventa');
            $table->string('promocion');
            $table->string('seguimiento');
            $table->integer('calificacion');
            $table->text('comentarios');
            // $table->string('listaprecio');
            $table->string('cotizador');
            // $table->string('ID');
            $table->string('objetivomes');
            $table->string('folio');
            $table->date('solicitud');
            $table->date('contrato');
            $table->date('pago');
            $table->date('entrega');
            $table->string('refcontrato');
            $table->string('refapertura');
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
        Schema::dropIfExists('productos');
    }
}
