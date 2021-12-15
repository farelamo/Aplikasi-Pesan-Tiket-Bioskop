<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmKategoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_kategori', function (Blueprint $table) {
            $table->bigIncrements('id_film_kategori');
            $table->unsignedBigInteger('id_film');
            $table->unsignedBigInteger('id_kategori');
            $table->timestamps();
            
            $table->foreign('id_film')->references('id_film')->on('film')->onDelete('cascade')->onUpdate('cascade'); 
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori')->onDelete('cascade')->onUpdate('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('film_kategori');
    }
}
