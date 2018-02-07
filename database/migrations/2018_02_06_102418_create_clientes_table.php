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
            //Nombre Completo
            $table->string('nombre')->nullable();
            $table->string('apellidopaterno')->nullable();
            $table->string('apellidomaterno')->nullable();
            //Razon Social
            $table->string('razonsocial')->nullable();
            //Domicilio
            $table->string('calle')->nullable();
            $table->string('numext')->nullable();
            $table->string('numinter')->nullable();
            $table->string('cp')->nullable();
            $table->string('colonia')->nullable();
            $table->string('municipio')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('estado')->nullable();
            //Referencia
            $table->string('calle1')->nullable();
            $table->string('calle2')->nullable();
            $table->string('referencia')->nullable();
            //
            
            $table->string('mail')->nullable();
            $table->string('rfc')->nullable();
            $table->string('telefono')->nullable();
            $table->string('telefonocel')->nullable();

            //$table->enum('prod', ['Pack','Auto','Motocicleta']);
            
            $table->integer('ingresos')->nullable();
            $table->string('canalventa')->nullable();
            $table->string('promocion')->nullable();
           // $table->string('seguimiento')->nullable();

            $table->enum('calificacion', ['30','60','90']);
            $table->text('comentarios')->nullable();

           // $table->string('listaprecios')->nullable();
           // $table->string('cotizador')->nullable();
            $table->string('identificador')->nullable();
            $table->string('objetivo')->nullable();
            $table->string('folio');
            

            $table->integer('solicitante_id')->unsigned()->nullable();

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
