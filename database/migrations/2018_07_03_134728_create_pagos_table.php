<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('product_id')->on('transactions');
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('cliente_id')->on('transactions');
            $table->string('identificacion');
            $table->string('comprobante');
            $table->string('forma_pago');
            $table->string('banco')->nullable();
            $table->string('status');
            $table->decimal('monto');
            $table->string('numero_cheque')->nullable();
            $table->string('numero_deposito')->nullable();
            $table->string('numero_tarjeta')->nullable();
            $table->string('nombre_tarjetaHabiente')->nullable();
            $table->integer('meses');
            $table->string('referencia');
            $table->string('folio');
            $table->decimal('total');
            $table->decimal('restante');
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
        Schema::dropIfExists('pagos');
    }
}
