<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'pinjaman_id',
        'kode_pembayaran',
        'kode_transaksi',
        'tanggal_transaksi',
        'nominal_angsuran',
        'total_utang_sebelum',
        'total_utang_sesudah',
        'status',
    ];

    public function pinjaman()
    {
        return $this->belongsTo(Pinjaman::class);
    }
}
