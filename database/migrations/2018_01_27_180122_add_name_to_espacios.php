<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNameToEspacios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('espacios', function (Blueprint $table) {
        $table->string('nombre', 255)->before('direccion')->nullable();
        $table->dropColumn('dpto');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('alquileres', function (Blueprint $table) {
        $table->dropColumn('nombre');
        $table->string('dpto', 45)->nullable();
      });
    }
}
