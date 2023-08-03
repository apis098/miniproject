<?php

namespace App\Http\Controllers;

use App\Models\kategori_tipsdasar;
use Illuminate\Http\Request;

class kategori_tipsdasar_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = kategori_tipsdasar::all();
        return view('admin.kategori_tipsdasar.kategoritipsdasar', compact('kategori'));
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
        $request->validate([
            'nama_kategori' => "required|unique:kategori_tipsdasars"
        ]);
        $create = [
            'nama_kategori' => $request->nama_kategori
        ];
        kategori_tipsdasar::create($create);
        return redirect()->back()->with('success', 'Sukses menambahkan data kategori tips dasar');
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
        $edit = kategori_tipsdasar::where('id', $id)->first();
        return view('admin.kategori_tipsdasar.edit-crudresep', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kategori' => "required|unique:kategori_tipsdasars,nama_kategori,".$id
        ]);
        $update = [
            'nama_kategori' => $request->nama_kategori
        ];
        kategori_tipsdasar::where('id', $id)->update($update);
        return redirect('/admin/kategori-tipsdasar')->with('success', 'Sukses mengupdate data kategori tips dasar!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        kategori_tipsdasar::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Sukses menghapus data kategori tips dasar!');
    }
}
