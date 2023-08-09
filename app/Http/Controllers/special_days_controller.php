<?php

namespace App\Http\Controllers;


use App\Models\special_days;
use Illuminate\Http\Request;

class special_days_controller extends Controller
{
    public function index()
    {
        $data = special_days::all();
        $title = "Data Hari Spesial";
        return view('admin.special_days.index',compact('data','title'));
    }
    public function detail2(){
        return view('template.detail2');
    }
    public function create()
    {
        return view('special_days.create', [
            "title" => "Tambah Data Hari Spesial"
        ]);
    }
    public function edit($id)
    {
        $data=special_days::findOrFail($id);
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

            return redirect()->route('SpecialDays.index')->with('success', 'Data Hari Khusus Berhasil Ditambah.');
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

        return redirect()->route('SpecialDays.index')->with('success', 'Data Hari Khusus Berhasil Update.');
    }

    public function destroy($id)
    {
        $data = special_days::findOrFail($id);
         // Cek apakah ada produk terkait dengan kategori ini
    if ($data->resep->count() > 0) {
        return redirect()->route('SpecialDays.index')->with('error', 'Error, karena masih ada data terkait.');
    }

        $data->delete();
        return redirect()->route('SpecialDays.index')->with('success', 'Data hari khusus berhasil duhapus.');
    }

    public function show($id)
    {
        $data = special_days::find($id);
        return response()->json($data);
    }
}
