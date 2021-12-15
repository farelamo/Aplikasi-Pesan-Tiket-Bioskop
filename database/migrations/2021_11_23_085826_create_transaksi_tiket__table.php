<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTiketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_tiket_', function (Blueprint $table) {
            $table->bigIncrements('id_transaksi_tiket');
            $table->unsignedBigInteger('id_transaksi');
            $table->unsignedBigInteger('id_tiket');
            $table->timestamps();
            
            $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksi')->onDelete('cascade')->onUpdate('cascade'); 
            $table->foreign('id_tiket')->references('id_tiket')->on('tiket')->onDelete('cascade')->onUpdate('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_tiket_');
    }
}
