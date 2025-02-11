<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class RiwayatPendidikan extends Model
{
    protected $fillable = [
        'user_id',
        'nama_institusi',
        'jurusan',
        'tahun_masuk',
        'tahun_lulus'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getIdAttribute($value)
    {
        return Crypt::encrypt($value);
    }

}
