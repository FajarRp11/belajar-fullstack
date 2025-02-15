<?php

namespace App\Http\Controllers\FRONTEND;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengalamanController extends Controller
{
    public function pengalaman() {
        return view('admin.pengalaman.index');
    }
}
