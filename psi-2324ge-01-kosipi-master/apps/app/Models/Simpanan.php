<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simpanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_transaksi',
        'membership_number', // Mengganti 'user_id' dengan 'membership_number'
        'nominal',
        'tanggal_transaksi',
        'jenis',
        'status', // Menambah kolom 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'membership_number', 'membership_number'); // Mengubah relasi dengan menambahkan foreign key
    }
}
