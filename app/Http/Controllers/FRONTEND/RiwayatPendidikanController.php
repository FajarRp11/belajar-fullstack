<?php

namespace App\Http\Controllers\FRONTEND;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RiwayatPendidikanController extends Controller
{
    public function riwayatPendidikan()
    {
        return view('riwayat-pendidikan.index');
    }
}
