<?php

namespace App\Http\Controllers\FRONTEND;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function portfolio($username) {
        return view('app.home', ['username' => $username]);
    }
}
