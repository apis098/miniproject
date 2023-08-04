<?php

namespace App\Http\Controllers;

use App\Models\kategori_bahan;
use App\Models\resep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class kategori_bahan_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$kategori_bahans = kategori_bahan::with('reseps');
        $kategori_bahans = kategori_bahan::all();
        return view('admin.kategori_bahan.kategoribahan', compact('kategori_bahans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_bahan' => 'required|unique:kategori_bahans',
            'foto' => 'required|image|mimes:png,jpg,jpeg'
        ]);
        $create = [
            'kategori_bahan' => $request->kategori_bahan,
            'foto' => $request->file('foto')->store('public')
        ];
        kategori_bahan::create($create);
        return redirect()->back()->with('success', 'Sukses menambahkan kategori bahan masakan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reseps = kategori_bahan::find($id);
        $kategori_bahan = kategori_bahan::all();
        return view('show-kategoribahan', compact('reseps', 'kategori_bahan'));
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
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kategori_bahan' => 'required|unique:kategori_bahans,kategori_bahan,'.$id,
            'foto' => 'nullable|image|mimes:png,jpg,jpeg'
        ]);
        $update = kategori_bahan::find($id);
        $update->kategori_bahan = $request->kategori_bahan;
        if ($request->hasFile('foto')) {
            Storage::delete($update->foto);
            $update->foto = $request->file('foto')->store('public');
        }
        $update->save();
        return redirect('/admin/kategori-bahan')->with('success', 'Sukses mengupdate data kategori bahan masakan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hapus = kategori_bahan::find($id);
        Storage::delete($hapus->foto);
        kategori_bahan::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Sukses menghapus data kategori bahan masakan.');
    }
}
