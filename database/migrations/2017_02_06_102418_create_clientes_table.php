<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {

            $table->increments('id');
            $table->enum('tipopersona',['Fisica','Moral']);
            $table->string('identificador');
            //Nombre Completo
            $table->string('nombre')->nullable();
            $table->string('apellidopaterno')->nullable();
            $table->string('apellidomaterno')->nullable();
            $table->date('fecha_nacimiento');
            //Razon Social
            $table->string('rfc')->nullable();
            $table->string('razonsocial')->nullable();
            //Domicilio
            $table->string('cp');
            $table->string('mail');
            $table->string('telefono')->nullable();
            $table->string('telefonocel');
            $table->string('canal_ventas')->nullable();
            $table->text('comentarios')->nullable();
           
            
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
        Schema::dropIfExists('clientes');
    }
}
