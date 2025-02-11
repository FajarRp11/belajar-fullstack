<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\RiwayatPendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RiwayatPendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $data = RiwayatPendidikan::where('user_id', $user->id)->orderBy('tahun_masuk', 'desc')->get();
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->user();
        // Validasi data
        $validate = Validator::make($request->all(), [
            'nama_institusi' => 'required|string|max:255',
            'jurusan' => 'required|string',
            'tahun_masuk' => 'required|string|numeric',
            'tahun_lulus' => 'required|string|numeric'
        ]);

        // jika validasi gagal
        if($validate->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal validasi data',
                'data' => $validate->errors()
            ]);
        }

        $pendidikan = [
            'user_id' => $user->id,
            'nama_institusi' => $request->nama_institusi,
            'jurusan' => $request->jurusan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_lulus' => $request->tahun_lulus
        ];

        $data = RiwayatPendidikan::create($pendidikan);
        return response()->json([
            'status' => true,
            'message' => 'Berhasil menambah data',
            'data' => $data
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ID = decrypt($id);
        $data = RiwayatPendidikan::findOrFail($ID);
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ID = decrypt($id);
        $cekPendidikan = RiwayatPendidikan::findOrFail($ID);

        $validate = Validator::make($request->all(), [
           'nama_institusi' => 'required|string|max:255',
            'jurusan' => 'required|string',
            'tahun_masuk' => 'required|string|numeric',
            'tahun_lulus' => 'required|string|numeric'
        ]);

        // jika validasi gagal
        if($validate->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal validasi data',
                'data' => $validate->errors()
            ]);
        }

        $pendidikan = [
            'nama_institusi' => $request->nama_institusi,
            'jurusan' => $request->jurusan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_lulus' => $request->tahun_lulus
        ];

        $data = $cekPendidikan->update($pendidikan);
        return response()->json([
            'status' => true,
            'message' => 'Berhasil update data',
            'data' => $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ID = decrypt($id);
        RiwayatPendidikan::findOrFail($ID)->delete();
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => [
                'message' => 'Berhasil hapus data'
            ]
        ]);
    }
}
