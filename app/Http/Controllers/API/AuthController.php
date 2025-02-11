<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Proses validasi gagal',
                'data' => $validator->errors()
            ]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        $success['token'] = $user->createToken('auth_token')->plainTextToken;
        $success['nama_lengkap'] = $user->nama_lengkap;

        return response()->json([
            'status' => true,
            'message' => 'Berhasil membuat akun',
            'data' => $success
        ]);
    }

    // fungsi login untuk login ke dalam aplikasi
    public function login(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Temukan pengguna berdasarkan username
        $user = User::where('username', $validated['username'])->first();

        // Periksa apakah pengguna ditemukan dan password cocok
        if ($user && Hash::check($validated['password'], $user->password)) {
            // Login berhasil, buat token
            $token = $user->createToken('auth_token')->plainTextToken;
            $success = [
                'token' => $token,
                'nama_lengkap' => $user->nama_lengkap,
            ];

            // jika berhasil login
            return response()->json([
                'status' => true,
                'message' => 'Berhasil Login.',
                'data' => $success,
            ]);
        } else {
            // Login gagal
            return response()->json([
                'status' => false,
                'message' => 'Silakan periksa username dan Password Anda.',
                'data' => null,
            ]);
        }
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Berhasil logout'
        ]);
    }

}
