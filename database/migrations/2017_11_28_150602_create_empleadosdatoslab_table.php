<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosdatoslabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleadosdatoslab', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('empleado_id')->unsigned();
            $table->foreign('empleado_id')->references('id')->on('empleados');
            $table->date('fechacontratacion')->nullable();
            $table->integer('contrato_id')->unsigned();
            $table->foreign('contrato_id')->references('id')->on('tipocontrato');
            $table->string('area')->nullable();
            $table->string('puesto')->nullable();
            $table->decimal('salarionom',8,2)->nullable();
            $table->decimal('salariodia',8,2)->nullable();
            $table->string('puesto_inicio')->nullable();
            $table->enum('periodopaga',['Semanal','Quincenal','Mensual']);
            $table->string('prestaciones')->nullable();
            $table->enum('regimen',['Sueldos y salarios','Jubilados','Pensionados']);
            $table->string('hentrada')->nullable();
            $table->string('hsalida')->nullable();
            $table->string('hcomida');
            $table->string('lugartrabajo');
            $table->string('banco');
            $table->string('cuenta')->nullable();
            $table->string('clabe')->nullable();
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
        Schema::dropIfExists('empleadosdatoslab');
    }
}
