<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiasyhorariosEspaciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diasyhorarios_espacios', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();
          $table->softDeletes();

          $table->integer('idEspacio')->unsigned();
          $table->foreign('idEspacio')->references('id')->on('espacios');

          $table->string('dia', 45);
          $table->time('horaComienzo');
          $table->time('horaFin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diasyhorarios_espacios');
    }
}
