<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGerenteIdToOficinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oficinas', function (Blueprint $table) {
            $table->integer('gerente_id')->unsigned()->nullable();
            $table->foreign('gerente_id')->references('id')->on('gerentes');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('oficinas', function (Blueprint $table) {
            $table->dropForeign(['gerente_id']);
            $table->dropColumn('gerente_id');
       });
    }
}
