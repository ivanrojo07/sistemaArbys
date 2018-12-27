<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('transactions', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
            $table->string('status');
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('transactions');
    }
}



// suponiendo que tienes una relacion en App\Proveedor llamada direccion que utiliza App\Direccion

// $proveedor = Proveedor::create($request->all());
// $direccion = new Direccion(['dato1' => $dato1, 'dato2' => $dato2, ..., 'datoN' => $datoN]);
// $proveedor->direccion()->save($direccion);