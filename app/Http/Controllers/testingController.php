<?php

namespace App\Http\Controllers;

use App\Models\basic_tips;
use Illuminate\Http\Request;

class testingController extends Controller
{
    public function create(){
        $data = basic_tips::all();
        $title="Form input langkah langkah";
        return view('testing.create',compact('title','data'));  
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'text1.*' => 'required|string|max:255',
            'text3.*' => 'required|string|max:255',
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Menambahkan validasi untuk foto
        ]);

        foreach ($validatedData['text1'] as $key => $name) {
            $photo = $validatedData['photos'][$key]->store('photos', 'public'); // Simpan foto ke dalam storage

            basic_tips::create([
                'kategori_id'=> 1,
                'userkoki_id'=>auth()->user()->id,
                'judul' => $name,
                'deskripsi' => $validatedData['text3'][$key],
                'foto' => $photo,
            ]);
        }

        return redirect()->route('Testing.create')->with('success', 'Data hari spesial berhasil disimpan.');
    }
}
