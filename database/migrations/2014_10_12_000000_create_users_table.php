<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->string('firstName');
            $table->string('lastName');
            $table->string('birthDate',10);
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->string('phoneNumber',25)->nullable();
            $table->integer('zipcode')->nullable();
            $table->string('country')->nullable();
            $table->integer('DNI')->nullable()->unsigned();
            $table->string('profilePic')->default('avatar.jpg');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
