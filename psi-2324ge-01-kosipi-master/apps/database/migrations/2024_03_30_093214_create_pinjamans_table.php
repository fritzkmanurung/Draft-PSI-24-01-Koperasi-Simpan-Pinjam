<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinjamansTable extends Migration
{
    public function up()
    {
        Schema::create('pinjamans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi')->unique();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->date('tanggal_transaksi');
            $table->decimal('nominal', 10, 2);
            $table->decimal('bunga', 5, 2);
            $table->integer('jangka_waktu'); // dalam bulan
            $table->decimal('nominal_angsuran', 10, 2);
            $table->decimal('harga_barang_jaminan', 10, 2);
            $table->decimal('total_utang', 10, 2);
            $table->enum('status', ['Verifikasi', 'Request'])->default('Request');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pinjamans');
    }
}
