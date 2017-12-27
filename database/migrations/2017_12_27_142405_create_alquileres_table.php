<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlquileresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('alquileres', function (Blueprint $table) {
        $table->increments('id');
        $table->timestamps();
        $table->softDeletes();

        $table->integer('idEspacio')->unsigned();
        $table->foreign('idEspacio')->references('id')->on('espacios');

        $table->integer('idVehiculo')->unsigned();
        $table->foreign('idVehiculo')->references('id')->on('vehiculos');

        $table->dateTime('fechaComienzoAlquiler');
        $table->dateTime('fechaFinAlquiler');
        $table->decimal('precioPorMinutoConDesc', 6, 2);
        $table->decimal('precioFinal', 6, 2);
        $table->integer('rating')->unsigned();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alquileres');
    }
}
