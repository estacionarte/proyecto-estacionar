<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEstadofieldsToEspacios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('espacios', function (Blueprint $table) {
        $table->boolean('necesita_confirmacion')->after('precioBicicletasMinuto')->nullable();
        $table->boolean('aprobado')->after('necesita_confirmacion')->nullable();
        $table->boolean('disponible')->after('aprobado')->nullable();

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropColumn('necesita_confirmacion');
        $table->dropColumn('aprobado');
        $table->dropColumn('disponible');
    }
}
