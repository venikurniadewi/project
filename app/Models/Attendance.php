<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendances';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'latitude',
        'longitude',
        'tanggal',
        'masuk',
        'pulang',
        'keterangan',
        'created_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
