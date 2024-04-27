<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'latitude',
        'longitude',
        'tanggal',
        'masuk',
        'pulang',
    ];

    // Anda juga dapat menambahkan relasi atau method lain di sini sesuai kebutuhan
}
