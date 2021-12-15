<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalFilmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_film', function (Blueprint $table) {
            $table->bigIncrements('id_jadwal_film');
            $table->unsignedBigInteger('id_jadwal');
            $table->unsignedBigInteger('id_film');
            $table->timestamps();
            
            $table->foreign('id_jadwal')->references('id_jadwal')->on('jadwal')->onDelete('cascade')->onUpdate('cascade'); 
            $table->foreign('id_film')->references('id_film')->on('film')->onDelete('cascade')->onUpdate('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_film');
    }
}
