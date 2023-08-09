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
        $title = "Data Tips Dasar";
        return view('admin.kategori_tipsdasar.kategoritipsdasar', compact('kategori', 'title'));
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
       //
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
        kategori_tipsdasar::find( $id)->update($update);
        return redirect('/admin/kategori-tipsdasar')->with('success', 'Sukses mengupdate data kategori tips dasar!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hapus = kategori_tipsdasar::find($id);
        if ($hapus->tips_dasar->count() > 0) {
            return redirect()->back()->with('error', 'Error, karena masih ada data terkait.');
        }
        kategori_tipsdasar::find($id)->delete();
        return redirect()->back()->with('success', 'Sukses menghapus data kategori tips dasar!');
    }
}
