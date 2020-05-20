<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFieldsToMensualidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mensualidades', function (Blueprint $table) {
            $table->decimal('aportacion')->default(0);
            $table->decimal('gastos_administracion')->default(0);
            $table->decimal('iva_gda')->default(0);
            $table->decimal('seguro_vida')->default(0);
            $table->decimal('porcentaje_compensatorio')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mensualidades', function (Blueprint $table) {
            $table->dropColumn('aportacion');
            $table->dropColumn('gastos_administracion');
            $table->dropColumn('iva_gda');
            $table->dropColumn('seguro_vida');
            $table->dropColumn('porcentaje_compensatorio');
        });
    }
}
