<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Skills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SkillsController extends Controller
{
    private function url() {
        $url = env('APP_URL') . '/';
        return $url;
    }

    public function getSkills (Request $request) {
        $user = $request->user();
        $skills = Skills::where('user_id', $user->id)->get();

        $data = $skills->map(function($skill) {
            return [
                'id' => $skill->id,
                'user_id' => $skill->user_id,
                'name' => $skill->name,
                'image' => $this->url() . 'api/images/foto/' . $skill->image
            ];
        });

        return response()->json([
            'status' => true,
            'message' => 'Succes',
            'data' => $data
        ]);
    }

    public function createSkills(Request $request) {
        $user = $request->user();

        $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if($validate->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal validasi data',
                'data' => $validate->errors()
            ]);
        }

        $data = [
            'user_id' => $user->id,
            'name' => $request->name,
        ];

        $foto = $request->file('image');
        if($foto) {
            $data['image'] = $foto->hashName();
            $foto->storeAs('/images/foto', $foto->hashName());

            $skills = Skills::create($data);
            return response()->json([
                'status' => true,
                'message' => 'Success',
                'data' => $skills
            ]);
        }
    }

    public function getSingleSkills(Request $request, string $id) {
        $ID = decrypt($id);
        $data = Skills::findOrFail($ID);
        return response()->json([
            'status' => true,
            'message' => 'Success access single skills data',
            'data' => $data
        ]);
    }

    public function updateSkills(Request $request, string $id) 
    {
        $ID = decrypt($id);
        
        $skills = Skills::findOrFail($ID);
        $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if($validate->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal validasi data',
                'data' => $validate->errors()
            ]);
        }

        $data = [
            'name' => $request->name
        ];

        if($request->hasFile('image')) {
            // Hapus file lama jika ada
            if($skills->image && Storage::exists('images/foto/' . $skills->image)) {
                Storage::delete('images/foto/' . $skills->image);
            }

            // Upload file baru
            $foto = $request->file('image');
            $filename = $foto->hashName();
            $foto->storeAs('images/foto', $filename);
            
            $data['image'] = $filename;
        }

        $skills->update($data);
        
        return response()->json([
            'status' => true,
            'message' => 'Berhasil update data',
            'data' => $skills
        ]);
    }
}
