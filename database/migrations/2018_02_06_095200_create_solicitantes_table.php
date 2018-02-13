<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitantes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            //----------------------
            $table->string('tiemporesidir')->nullable();
            $table->string('tipovivienda')->nullable();
            $table->enum('estadocivil', ['Soltero/a','Casado/a','Divorciado/a','Viudo/a']);
            //----------------- DATOS LABORALES-----------------------------
            $table->string('nombreempresa')->nullable();
            $table->string('giro')->nullable();
            $table->string('puesto')->nullable();
            $table->string('antiguedad')->nullable();
            $table->string('telefono1')->nullable();
            $table->string('telefono2')->nullable();
           
            //---------------REFERENCIAS-------------------------
            $table->string('nombre1')->nullable();
            $table->string('telefonoref1')->nullable();
            $table->string('parentesco1')->nullable();

            $table->string('nombre2')->nullable();
            $table->string('telefonoref2')->nullable();
            $table->string('parentesco2')->nullable();
            //--------------DATOS DE SOLICITUD--------------------
            $table->string('folio');
            $table->date('fechasolicitud')->nullable();
            $table->date('fechacontrato')->nullable();
            $table->date('fechapago')->nullable();
            $table->date('fechaentrega')->nullable();
            $table->string('refcontrato')->nullable();
            $table->string('refapertura')->nullable();
            //-------------DATOS BENEFICIARIO--------------------
            $table->string('nombrebeneficiario')->nullable();
            $table->integer('edadbeneficiario')->nullable();
            $table->string('telbeneficiario')->nullable();
            //-----------DATOS DE CONTRATO------------------------
            $table->string('numcontrato')->nullable();
            $table->string('numgrupo')->nullable();
            $table->string('integrante')->nullable();


            //----------------------
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
        Schema::dropIfExists('solicitantes');
    }
}
