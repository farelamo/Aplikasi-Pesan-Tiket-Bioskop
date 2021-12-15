<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmGenreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_genre', function (Blueprint $table) {
            $table->bigIncrements('id_film_genre');
            $table->unsignedBigInteger('id_film');
            $table->unsignedBigInteger('id_genre');
            $table->timestamps();
            
            $table->foreign('id_film')->references('id_film')->on('film')->onDelete('cascade')->onUpdate('cascade'); 
            $table->foreign('id_genre')->references('id_genre')->on('genre')->onDelete('cascade')->onUpdate('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('film_genre');
    }
}
