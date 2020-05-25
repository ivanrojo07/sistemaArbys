<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHistorialIdToAperturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aperturas', function (Blueprint $table) {
            $table->unsignedBigInteger('historial_id');
            $table->string('categoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aperturas', function (Blueprint $table) {
            $table->dropColumn('historial_id');
            $table->dropColumn('categoria');
        });
    }
}
