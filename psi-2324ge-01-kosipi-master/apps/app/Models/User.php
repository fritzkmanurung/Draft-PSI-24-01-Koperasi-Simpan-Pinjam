<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'membership_number',
        'koperasi_id',
        'username',
        'name',
        'email',
        'password',
        'place_of_birth',
        'date_of_birth',
        'address',
        'phone_number',
        'institution',
        'work_unit',
        'role',
        'photo', // Tambahkan kolom foto profil
        'status', // Tambahkan kolom status
        'joined_at', // Tambahkan kolom tanggal bergabung
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function koperasi()
    {
        return $this->belongsTo(Koperasi::class);
    }
}
