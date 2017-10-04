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
            $table->string('nombre');
            $table->string('domicilio');
            $table->integer('tiemporesidiendo');
            $table->string('tipovivienda');
            $table->string('mail');
            $table->string('rfc');
            $table->string('telefonofijo');
            $table->string('telefonocelular');
            $table->string('estadocivil');
            $table->string('nombreEmpresa');
            $table->string('domicilioempresa');
            $table->string('giro');
            $table->string('puesto');
            $table->integer('antiguedad');
            $table->string('telefonoempresa');
            $table->decimal('ingresosmensual',5,2);
            $table->string('nombrerefpers');
            $table->string('telefonorefpers');
            $table->string('parentescorefpers');
            $table->enum('productos',['Pack','Automovil','Motocicleta']);
            $table->string('ingresos');
            $table->string('canalventa');
            $table->string('promocion');
            $table->string('seguimiento');
            $table->string('listadeprecio');
            $table->string('folio');
            $table->date('fechasolicitud');
            $table->date('fechacontrato');
            $table->date('fechapago');
            $table->date('fechaentrega');
            $table->string('referenciacontrato');
            $table->string('referecnciaapertura');
            $table->string('nombrebeneficiario');
            $table->integer('edadbeneficiario');
            $table->string('parentescobeneficiario');
            $table->string('telefonobeneficiario');
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
        Schema::dropIfExists('clientes');
    }
}
