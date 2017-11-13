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
            $table->string('nombrepadre');
            $table->string('direccionpadre');
            $table->string('ocupacionpadre');
            $table->string('telefonopadre');
            $table->string('nombremadre');
            $table->string('direccionmadre');
            $table->string('ocupacionmadre');
            $table->string('telefonomadre');
            $table->string('nombrerefpers');
            $table->string('parentescorefpers');
            $table->string('domiciliorefpers');
            $table->string('telefonorefpers');
            $table->enum('escolaridad',['Secundaria','Preparatoria','Carrera','Licenciatura']);
            $table->string('nombrecompania1');
            $table->string('domiciliocompania1');
            $table->string('telefonocompania1');
            $table->string('puestocompania1');
            $table->date('fechainiciocompania1');
            $table->date('fechaterminocompania1');
            $table->string('nombrejefecompania1');
            $table->boolean('solicitarinfocompania1');
            $table->string('nombrecompania2');
            $table->string('domiciliocompania2');
            $table->string('telefonocompania2');
            $table->string('puestocompania2');
            $table->date('fechainiciocompania2');
            $table->date('fechaterminocompania2');
            $table->string('nombrejefecompania2');
            $table->boolean('solicitarinfocompania2');
            $table->string('nombrecompania3');
            $table->string('domiciliocompania3');
            $table->string('telefonocompania3');
            $table->string('puestocompania3');
            $table->date('fechainiciocompania3');
            $table->date('fechaterminocompania3');
            $table->string('nombrejefecompania3');
            $table->boolean('solicitarinfocompania3');
            $table->boolean('confirmactanac');
            $table->boolean('confirmcomprobantedom');
            $table->boolean('confi');
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
