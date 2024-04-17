<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimpanansTable extends Migration
{
    public function up()
    {
        Schema::create('simpanans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi')->unique();
            $table->string('membership_number'); // Mengganti user_id dengan membership_number
            $table->foreign('membership_number')->references('membership_number')->on('users')->onDelete('cascade'); // Menghubungkan dengan membership_number di tabel users
            $table->decimal('nominal', 10, 2);
            $table->date('tanggal_transaksi');
            $table->enum('jenis', ['sp', 'sw', 'ss']); // Simpanan Pokok, Wajib, Sukarela
            $table->set('status', ['Verifikasi', 'Request', 'Late'])->default('Request'); // Menambah kolom status dengan pilihan Verifikasi, Request, dan Late
            $table->timestamps();
        });        
    }

    public function down()
    {
        Schema::dropIfExists('simpanans');
    }
}
