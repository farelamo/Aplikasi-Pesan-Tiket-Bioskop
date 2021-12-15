<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPenggunaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_pengguna', function (Blueprint $table) {
            $table->bigIncrements('id_user_pengguna');
            $table->string('nama',200)->nullable();
            $table->string('username',50)->nullable();
            $table->string('password',50)->nullable();
            $table->string('email',200)->nullable();
            $table->string('foto',200)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_pengguna');
    }
}
