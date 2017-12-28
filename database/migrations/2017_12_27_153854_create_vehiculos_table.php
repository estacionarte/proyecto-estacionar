<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('idUser')->unsigned();
            $table->foreign('idUser')->references('id')->on('users');

            $table->string('tipoVehiculo', 45)->nullable();
            $table->string('marca', 45)->nullable();
            $table->string('modelo', 45)->nullable();
            $table->string('color', 45)->nullable();
            $table->string('patente', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehiculos');
    }
}
