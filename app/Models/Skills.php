<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Skills extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'image',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getIdAttribute($value)
    {
        return Crypt::encrypt($value);
    }
}
