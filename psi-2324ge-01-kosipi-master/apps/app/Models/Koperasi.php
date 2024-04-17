<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koperasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        // tambahkan atribut lain yang sesuai dengan migration Koperasi
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
