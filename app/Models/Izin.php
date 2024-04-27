<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    use HasFactory;

    protected $table = 'izins'; // Menyesuaikan nama tabel dengan nama yang telah Anda tentukan

    protected $fillable = ['alasan', 'keterangan']; // Menentukan kolom yang dapat diisi secara massal
}

