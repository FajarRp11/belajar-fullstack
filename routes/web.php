<?php

use App\Http\Controllers\FRONTEND\RiwayatPendidikanController;
use App\Http\Controllers\FRONTEND\DashboardController;
use App\Http\Controllers\FRONTEND\LoginController;
use App\Http\Controllers\FRONTEND\PengalamanController;
use App\Http\Controllers\FRONTEND\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [LoginController::class, 'login'])->name('login');

Route::get('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::get('/riwayat-pendidikan', [RiwayatPendidikanController::class, 'riwayatPendidikan'])
    ->name('riwayat-pendidikan.index');

Route::get('/pengalaman', [PengalamanController::class, 'pengalaman'])
    ->name('pengalaman.index');
