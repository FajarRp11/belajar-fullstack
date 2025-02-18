<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use App\Models\Pengalaman;
use App\Models\RiwayatPendidikan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class PortfolioController extends Controller
{
    public function getAllUser() {
        $data = User::all();
        return response()->json([
            'status' => true,
            'message' => "success",
            'data' => $data
        ]);
    }

    public function getAllUserInfo(string $username) {
        $user = User::where('username', $username)->first();
        
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User tidak ditemukan'
            ], 404);
        }

        $pengalaman = Pengalaman::where('user_id', $user->id)->get();
        $pendidikan = RiwayatPendidikan::where('user_id', $user->id)->get();
        $biodata = Biodata::where('user_id', $user->id)->get();

        $data = [
            'user' => $user->name,
            'biodata' => $biodata,
            'pengalaman' => $pengalaman,
            'pendidikan' => $pendidikan,
        ];

        return response()->json([
            'status' => true,
            'message' => "data berhasil diambil",
            'data' => $data
        ]);
    }
}
