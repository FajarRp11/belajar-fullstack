<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Pengalaman extends Model
{
    protected $fillable = [
        'user_id',
        'nama_institusi',
        'posisi',
        'tahun_mulai',
        'tahun_berakhir',
        'deskripsi'
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
