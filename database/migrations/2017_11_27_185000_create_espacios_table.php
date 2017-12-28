<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEspaciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('espacios', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();
          $table->softDeletes();

          $table->integer('idUser')->unsigned();
          $table->foreign('idUser')->references('id')->on('users');

          $table->string('direccion', 45)->nullable();
          $table->string('dpto', 45)->nullable();
          $table->string('pais', 45)->nullable();
          $table->string('provincia', 45)->nullable();
          $table->string('ciudad', 45)->nullable();
          $table->string('zipcode', 45)->nullable();
          $table->string('tipoEspacio', 45)->nullable();
          $table->integer('cantAutos')->unsigned()->nullable();
          $table->integer('cantMotos')->unsigned()->nullable();
          $table->integer('cantBicicletas')->unsigned()->nullable();
          $table->string('aptoDiscapacitados', 45)->nullable();
          $table->string('aptoElectricos', 45)->nullable();
          $table->string('infopublica', 250)->nullable();
          $table->string('infoprivada', 250)->nullable();
          $table->integer('estadiaMinimaMinutos')->unsigned()->nullable();
          $table->integer('estadiaMaximaMinutos')->unsigned()->nullable();
          $table->integer('anticipacionMinutos')->unsigned()->nullable();
          $table->decimal('precioAutosMinuto', 6, 2)->unsigned()->nullable();
          $table->decimal('precioMotosMinuto', 6, 2)->unsigned()->nullable();
          $table->decimal('precioBicicletasMinuto', 6, 2)->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('espacios');
    }
}
