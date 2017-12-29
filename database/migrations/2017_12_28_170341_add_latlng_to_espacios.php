<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLatlngToEspacios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('espacios', function (Blueprint $table) {
        $table->decimal('lat', 8, 6)->after('zipcode')->nullable();
        $table->decimal('lng', 9, 6)->after('lat')->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('espacios', function (Blueprint $table) {
        $table->dropColumn('lat');
        $table->dropColumn('lng');
      });
    }
}
