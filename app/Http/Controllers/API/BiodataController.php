<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private function url() {
        $url = env('APP_URL') . '/';
        return $url;
    }

    public function index(Request $request)
    {
        $user = $request->user();
        $biodata = Biodata::where('user_id', $user->id)->first();
        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'foto' => $this->url() . 'api/images/foto/' . ($biodata ? $biodata->foto : 'default.jpg'),
            'nomor_hp' => $biodata->nomor_hp ?? 'Update biodata anda',
            'tanggal_lahir' => $biodata->tanggal_lahir ?? 'Update biodata anda',
            'gender' => $biodata->gender ?? 'Update biodata anda'
        ];

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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = $request->user();

        $validate = Validator::make($request->all(), [
            'foto' => 'image|mimes:jpg,png,jpeg|max:2048',
            'nomor_hp' => 'required|string|max:15|unique:biodatas,nomor_hp,' . $request->user()->id . ',user_id',
            'tanggal_lahir' => 'required|date',
            'gender' => 'required|in:LAKI-LAKI,PEREMPUAN'
        ]);

        if($validate->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Proses validasi gagal',
                'data' => $validate->errors()
            ]);
        }

        $biodata = Biodata::where('user_id', $user->id)->first();

        $data = [
            'user_id' => $user->id,
            'nomor_hp' => $request->nomor_hp,
            'tanggal_lahir' => $request->tanggal_lahir,
            'gender' => $request->gender,
        ];

        if($biodata) {
            $foto = $request->file('foto');
            if($request->file('foto')) {
                Storage::exists('images/foto/' . $biodata->foto);
                Storage::delete('images/foto/' . $biodata->foto);

                $data['foto'] = $foto->hashName();
                $foto->storeAs('/images/foto/', $foto->hashName());
            }

            $biodata->update($data);
            return response()->json([
                'status' => true,
                'message' => 'Berhasil update data',
                'data' => $biodata
            ]);
        } else {
            $foto = $request->file('foto');
            if($foto) {
                $data['foto'] = $foto->hashName();
                $foto->storeAs('/images/foto/', $foto->hashName());
            }

            $success = Biodata::create($data);
            return response()->json([
                'status' => true,
                'message' => 'succes',
                'data' => $success
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
