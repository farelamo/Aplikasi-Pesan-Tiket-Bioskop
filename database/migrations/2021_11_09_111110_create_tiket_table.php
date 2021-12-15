<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiket', function (Blueprint $table) {
            $table->bigIncrements('id_tiket');
            $table->integer('harga')->nullable();
            $table->integer('stok')->nullable();
            $table->unsignedBigInteger('id_kursi');
            $table->timestamps();

            $table->foreign('id_kursi')->references('id_kursi')->on('kursi')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tiket');
    }
}
