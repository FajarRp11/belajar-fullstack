<?php

namespace App\Http\Controllers\FRONTEND;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function home() {
        return view('app.home');
    }

    public function portfolio($username) {
        return view('app.portfolio', ['username' => $username]);
    }
}
