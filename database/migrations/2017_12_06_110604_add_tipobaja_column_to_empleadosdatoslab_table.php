<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTipobajaColumnToEmpleadosdatoslabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        // Schema::enableForeignKeyConstraints();
        Schema::table('empleadosdatoslab', function (Blueprint $table) {
            //
            $table->integer('tipobaja_id')->nullable()->unsigned();
            $table->foreign('tipobaja_id')->references('id')->on('tipobaja');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::disableForeignKeyConstraints();
        Schema::table('empleadosdatoslab', function (Blueprint $table) {
            //
            $table->dropForeign(['tipobaja_id']);
        });
    }
}
