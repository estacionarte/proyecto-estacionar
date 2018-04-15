<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEstadoToAlquileres extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('alquileres', function (Blueprint $table) {
        $table->renameColumn('rating', 'rating_anfitrion');
        $table->integer('rating_conductor')->unsigned()->nullable()->after('rating');
        $table->renameColumn('comentario', 'comentario_anfitrion');
        $table->string('comentario_conductor', 255)->after('comentario')->nullable();
        $table->string('estado', 255)->after('comentario_conductor')->nullable();
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
        $table->renameColumn('rating_anfitrion', 'rating');
        $table->dropColumn('rating_conductor');
        $table->renameColumn('comentario_anfitrion', 'comentario');
        $table->dropColumn('comentario_conductor');
        $table->dropColumn('estado');
      });
    }
}
