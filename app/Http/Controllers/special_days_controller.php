<?php

namespace App\Http\Controllers;


use App\Models\special_days;
use Illuminate\Http\Request;

class special_days_controller extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('d')) {
            $special_days = special_days::where("nama", "like", "%" . $request->d . "%")->paginate(5);
        } else {
            $special_days = special_days::paginate(5);
        }
        return view('admin.specialdays', compact('special_days'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required'
        ], [
            "nama.required" => "Field Hari Khusus Harus Diisi"
        ]);
        special_days::create([
            'nama' => $request->nama
        ]);

        return redirect()->back()->with('success', 'Data Hari Khusus Berhasil Ditambah.');
    }


    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama' => 'required'
        ], [
            "nama.required" => "Field Hari Khusus Harus Diisi"
        ]);

        special_days::find($id)->update([
            'nama' => $request->nama
        ]);

        return redirect()->route('special-days.index', compact('request'))->with('success', 'Data Hari Khusus Berhasil Update.');
    }

    public function destroy(string $id)
    {
        $special_days = special_days::find($id);
        //      // Cek apakah ada produk terkait dengan kategori ini

        $special_days->resep()->where("hari_khusus_id", $special_days->id)->update([
            "hari_khusus_id" => NULL
        ]);
        $special_days->delete();
        return redirect()->back()->with('info', 'Data hari khusus berhasil dihapus.');
    }

    // public function show($id)
    // {
    //     $special_days = special_days::find($id);
    //     return response()->json($special_days);
    // }
}
