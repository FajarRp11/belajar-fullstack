<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pengalaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengalamanController extends Controller
{
    public function getPengalaman(Request $request) {
        $user = $request->user();
        $data = Pengalaman::where('user_id', $user->id)->get();
        return response()->json([
            'status' => true,
            'message' => "success",
            'data' => $data
        ]);
    }

    public function createPengalaman(Request $request) {
        $user = $request->user();

        $validate = Validator::make($request->all(), [
            'nama_institusi' => 'required|string|max:255',
            'posisi' => 'required|string',
            'tahun_mulai' => 'required|string|numeric',
            'tahun_berakhir' => 'required|string|numeric',
            'deskripsi' => 'string|max:255' 
        ]);

        // jika validasi gagal
        if($validate->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal validasi data',
                'data' => $validate->errors()
            ]);
        }

        $pengalaman = [
            'user_id' => $user->id,
            'nama_institusi' => $request->nama_institusi,
            'posisi' => $request->posisi,
            'tahun_mulai' => $request->tahun_mulai,
            'tahun_berakhir' => $request->tahun_berakhir,
            'deskripsi' => $request->deskripsi
        ];

        $data = Pengalaman::create($pengalaman);
        return response()->json([
            'status' => true,
            'message' => "Berhasil menambah data pengalaman",
            'data' => $data
        ]);
    }
}
