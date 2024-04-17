<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_transaksi',
        'user_id',
        'tanggal_transaksi',
        'nominal',
        'bunga',
        'jangka_waktu',
        'nominal_angsuran',
        'harga_barang_jaminan',
        'total_utang',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $table = 'pinjamans'; // Menyesuaikan nama tabel
}
