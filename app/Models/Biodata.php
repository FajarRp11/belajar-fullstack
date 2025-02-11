<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $fillable = [
        'user_id',
        'foto',
        'nomor_hp',
        'tanggal_lahir',
        'gender'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
