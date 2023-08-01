<?php

namespace App\Http\Controllers;


use App\Models\special_days;
use Illuminate\Http\Request;

class special_days_controller extends Controller
{
    public function index()
    {
        $data = special_days::all();
        return view('special_days.index', [
            "title" => "Daftar Hari Spesial",
            "data" => $data
        ]);
    }
    public function create()
    {
        return view('special_days.create', [
            "title" => "Tambah Data Hari Spesial"
        ]);
    }
    public function edit($id)
    {
        $data=special_days::find($id);
        return view('special_days.edit', [
            "title" => "Form Edit Data Hari Spesial",
            "data" => $data
        ]);
    }
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
        ];
        $customMessages = [
            'name.required' => 'Ada column yang belum terisi',
            'description.required' => 'Ada Column yang belum terisi',
        ];
        $this->validate($request, $rules, $customMessages);

        $data = new special_days();

        $data->name = $request->name;
        $data->description = $request->description;
        $data->save();

        return redirect('/special-days')->with('success', 'Data Hari Khusus Berhasil Ditambah.');
    }
    public function update(Request $request,$id)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
        ];
        $customMessages = [
            'name.required' => 'Ada column yang belum terisi',
            'description.required' => 'Ada Column yang belum terisi',
        ];
        $this->validate($request, $rules, $customMessages);

        $data = special_days::findOrFail($id);

        $data->name = $request->name;
        $data->description = $request->description;
        $data->save();

        return redirect('/special-days')->with('success', 'Data Hari Khusus Berhasil Update.');
    }
    public function destroy(Request $request)
    {
        $selectedIds = $request->input('ids');

        if (!is_array($selectedIds)) {
            return response()->json(['message' => 'Invalid input.'], 400);
        }

        try {
            // Hapus data berdasarkan ID yang diterima dari permintaan
            special_days::whereIn('id', $selectedIds)->delete();

            return response()->json(['message' => 'Data berhasil dihapus.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan saat menghapus data.'], 500);
        }
    }
}
