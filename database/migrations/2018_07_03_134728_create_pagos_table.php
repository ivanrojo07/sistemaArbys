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
            //-----------------------------------
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            //-----------------------------------
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('users');
            //-----------------------------------
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
            //-----------------------------------
            $table->string('identificacion');
            $table->string('comprobante');
            $table->string('forma_pago');
            $table->string('banco');
            //-----------------------------------
            $table->enum('status', ['Guardado', 'Aprobado','No Aprobado']);
            //-----------------------------------
            $table->decimal('monto', 8, 2);
            //------------- OPCIONALES ----------------
            $table->string('numero_cheque')->nullable();
            $table->string('numero_deposito')->nullable();
            $table->string('numero_tarjeta')->nullable();
            $table->string('nombre_tarjetaHabiente')->nullable();

            //-----------------------------------
            $table->softDeletes();
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
