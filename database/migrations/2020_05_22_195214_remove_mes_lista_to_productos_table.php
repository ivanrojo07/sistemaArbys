<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveMesListaToProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('fecha_lista');
            $table->unsignedBigInteger('lista_id');
        });
        
        Schema::table('excel_products', function (Blueprint $table) {
            $table->dropColumn('fecha_lista');
            $table->unsignedBigInteger('lista_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
