<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecHumanosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rec_humanos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fechaalta');
            $table->enum('oficina',['Naucalpan','Atizapan','Etc']);
            $table->enum('puesto',['Recepcion','Asesor']);
            $table->enum('departamento',['Administracion','Comercial']);
            $table->string('direcciondepartamento');
            $table->string('jefedirecto');
            $table->string('nombre');
            $table->string('apellidos');
            $table->integer('edad');
            $table->string('telefonoparticular');
            $table->string('telefonocasa');
            $table->date('fechanacimiento');
            $table->enum('estadocivil',['Casado','Soltero','Divorciado']);
            $table->string('nombreconyugue')->nullable();
            $table->string('nombrehijos')->nullable();
            $table->string('nombredependienteeconomico')->nullable();
            $table->string('direccioncalle');
            $table->string('direccioncolonia');
            $table->string('direccioncp');
            $table->string('direcciondelegacion');
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
        Schema::dropIfExists('rec_humanos');
    }
}
