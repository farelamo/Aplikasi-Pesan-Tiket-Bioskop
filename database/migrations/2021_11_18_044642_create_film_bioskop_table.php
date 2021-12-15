<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmBioskopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_bioskop', function (Blueprint $table) {
            $table->bigIncrements('id_film_bioskop');
            $table->unsignedBigInteger('id_film');
            $table->unsignedBigInteger('id_bioskop');
            $table->timestamps();
            
            $table->foreign('id_film')->references('id_film')->on('film')->onDelete('cascade')->onUpdate('cascade'); 
            $table->foreign('id_bioskop')->references('id_bioskop')->on('bioskop')->onDelete('cascade')->onUpdate('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('film_bioskop');
    }
}
