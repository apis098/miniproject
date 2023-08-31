<?php

namespace App\Http\Controllers;

use App\Models\kategori_makanan;
use Illuminate\Http\Request;

class KategoriMakananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('m')) {
            $kategori_makanans = kategori_makanan::where("nama_makanan", "like", "%" . $request->m . "%")->paginate(1);
        } else {
            $kategori_makanans = kategori_makanan::paginate(1);
        }
        return view('admin.kategorimakanan', compact('kategori_makanans'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_makanan' => 'required'
        ], [
            "nama_makanan.required" => "Field Kategori Makanan Harus Diisi"
        ]);
        kategori_makanan::create([
            'nama_makanan' => $request->nama_makanan
        ]);
        return redirect()->back()->with('success', 'Data Kategori Makanan Berhasil Ditambah.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama_makanan' => 'required'
        ], [
            "nama_makanan.required" => "Field Kategori Makanan Harus Diisi"
        ]);

        kategori_makanan::find($id)->update([
            'nama_makanan' => $request->nama_makanan
        ]);
        return redirect()->route('kategori-makanan.index', compact('request'))->with('success', 'Data Kategori Makanan Berhasil Edit.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori_makanans = kategori_makanan::find($id);
        $kategori_makanans->resep()->where('kategori_reseps_id', $kategori_makanans->id)->update([
            "kategori_reseps_id" => NULL
        ]);
        $kategori_makanans->delete();
        return redirect()->back()->with('info', 'Data Kategori Makanan Berhasil Dihapus');
    }
}
