<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BiodataController;
use App\Http\Controllers\API\PengalamanController;
use App\Http\Controllers\API\RiwayatPendidikanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route autentikasi
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Route biodata 
Route::get('images/{folder}/{filename}', function($folder, $filename) {
    $path = storage_path('app/private/images/' . $folder . '/' . $filename);

    if(!file_exists($path)) {
        abort(500);
    }

    $file = file_get_contents($path);
    $type = mime_content_type($path);

    return response($file)->header('Content-Type', $type);
})->name('show-image');

Route::get('/biodata/user', [BiodataController::class, 'index'])->middleware('auth:sanctum');
Route::post('/biodata/user/update', [BiodataController::class, 'update'])->middleware('auth:sanctum');

// Route riwayat pendidikan
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/riwayat-pendidikan/user', [RiwayatPendidikanController::class, 'index']);
    Route::post('/riwayat-pendidikan/store', [RiwayatPendidikanController::class, 'store']);
    Route::get('/riwayat-pendidikan/edit/{id}', [RiwayatPendidikanController::class, 'edit']);
    Route::put('/riwayat-pendidikan/update/{id}', [RiwayatPendidikanController::class, 'update']);
    Route::delete('/riwayat-pendidikan/delete/{id}', [RiwayatPendidikanController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/pengalaman/user', [PengalamanController::class, 'getPengalaman']);
    Route::post('/pengalaman/store', [PengalamanController::class, 'createPengalaman']);
    Route::get('/pengalaman/edit/{id}', [PengalamanController::class, 'getSinglePengalaman']);
    Route::put('/pengalaman/update/{id}', [PengalamanController::class, 'updatePengalaman']);
    Route::delete('/pengalaman/delete/{id}', [PengalamanController::class, 'deletePengalaman']);
});