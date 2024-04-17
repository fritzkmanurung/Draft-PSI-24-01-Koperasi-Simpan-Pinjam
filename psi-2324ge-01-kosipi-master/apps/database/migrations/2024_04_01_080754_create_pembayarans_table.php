<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pinjaman_id');
            $table->foreign('pinjaman_id')->references('id')->on('pinjamans')->onDelete('cascade');
            $table->string('kode_transaksi');
            $table->string('kode_pembayaran'); // Menambahkan kolom kode_pembayaran
            $table->date('tanggal_transaksi');
            $table->decimal('nominal_angsuran', 10, 2);
            $table->decimal('total_utang_sebelum', 10, 2);
            $table->decimal('total_utang_sesudah', 10, 2);
            $table->string('status'); // Menambahkan kolom status
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembayarans');
    }
}
