<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('membership_number')->unique()->nullable(); // Ubah menjadi unique dan nullable
            $table->unsignedBigInteger('koperasi_id')->nullable();
            // $table->foreign('koperasi_id')->references('id')->on('koperasis')->onDelete('cascade');
            $table->string('username')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('place_of_birth')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->text('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('institution')->nullable();
            $table->string('work_unit')->nullable();
            $table->string('role')->default('user');
            $table->string('photo')->nullable(); // Kolom foto profil
            $table->enum('status', ['Aktif', 'Nonaktif'])->nullable()->default('Aktif'); // Kolom status dengan dua jenis
            $table->date('joined_at')->nullable(); // Kolom tanggal bergabung
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
