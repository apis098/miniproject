<?php

namespace App\Http\Controllers;

use App\Models\SpecialDays;
use App\Models\User;
use Illuminate\Http\Request;

class SpecialDaysController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('d')) {
            $special_days = SpecialDays::where("nama", "like", "%" . $request->d . "%")->paginate(5);
        } else {
            $special_days = SpecialDays::paginate(5);
        }
        $verifed_count = User::where('isSuperUser', 'no')->where('followers','>',10000)->where('role','koki')->count();
        return view('admin.specialdays', compact('special_days','verifed_count'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required'
        ], [
            "nama.required" => "Field Hari Khusus Harus Diisi"
        ]);
        SpecialDays::create([
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

        SpecialDays::find($id)->update([
            'nama' => $request->nama
        ]);

        return redirect()->route('special-days.index', compact('request'))->with('success', 'Data Hari Khusus Berhasil Update.');
    }

    public function destroy(string $id)
    {
        $special_days = SpecialDays::find($id);
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
