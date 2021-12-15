<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('id_transaksi');
            $table->unsignedBigInteger('id_user_pengguna');
            $table->unsignedBigInteger('id_jadwal');
            $table->unsignedBigInteger('id_tiket');
            $table->integer('total_tiket')->nullable();
            $table->integer('total_harga')->nullable();
            $table->unsignedBigInteger('id_notifikasi');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->timestamps();

            $table->foreign('id_user_pengguna')->references('id_user_pengguna')->on('user_pengguna')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_jadwal')->references('id_jadwal')->on('jadwal')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_tiket')->references('id_tiket')->on('tiket')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_notifikasi')->references('id_notifikasi')->on('notifikasi')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('created_by')->references('id_user_karyawan')->on('user_karyawan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('updated_by')->references('id_user_karyawan')->on('user_karyawan')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
