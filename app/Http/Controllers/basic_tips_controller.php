<?php

namespace App\Http\Controllers;

use App\Models\basic_tips;
use Illuminate\Http\Request;

class basic_tips_controller extends Controller
{
    public function index()
    {
        $data = basic_tips::all();
        $title = "Tips Dasar Memasak";
        return view('admin.basic_tips.index', compact('data', 'title'));
    }
    public function create()
    {
        return view('basic_tips.create', [
            "title" => "Tambah Data Tips Dasar"
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

        $data = new basic_tips();

        $data->name = $request->name;
        $data->description = $request->description;
        $data->save();

        return redirect()->route('BasicTips.index')->with('success', 'Data Tips Dasar Berhasil Ditambah.');
    }
    public function edit($id)
    {
        $data = basic_tips::find($id);
        return view('basic_tips.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
        ];
        $customMassages = [
            'name.required' => 'Kolom ini harus di isi.',
            'description.required' => 'Kolom ini harus di isi',
        ];
        $data = basic_tips::findOrFail($id);
        $data->name = $request->name;
        $data->description = $request->description;
        $data->save();

        return redirect()->route('BasicTips.index')->with('Data Berhaasil Diupdate.');

    }
    public function show($id)
    {
        $data = basic_tips::findOrFail($id);
        return response()->json($data);
    }
    public function destroy($id)
    {
        $data = basic_tips::findOrFail($id);
        $data->delete();

        return redirect()->route('BasicTips.index')->with('success', 'Data has been deleted successfully.');
    }
}
