<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCommentRemovePrecioPorMinutoAlquileres extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('alquileres', function (Blueprint $table) {
        $table->integer('rating')->unsigned()->nullable()->change();
        $table->string('comentario', 255)->after('rating')->nullable();
        $table->dropColumn('precioPorMinutoConDesc');
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
        $table->dropColumn('comentario');
        $table->decimal('precioPorMinutoConDesc', 6, 2);
      });
    }
}
