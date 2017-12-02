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
        Schema::create('espacios_diasyhorarios', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();
          $table->softDeletes();

          $table->integer('idEspacio')->unsigned();
          $table->foreign('idEspacio')->references('id')->on('espacios');

          $table->string('dia', 45);
          $table->string('horaComienzo',4);
          $table->string('horaFin',4);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('espacios_diasyhorarios');
    }
}
