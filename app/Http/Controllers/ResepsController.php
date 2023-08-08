<?php

namespace App\Http\Controllers;

use App\Models\kategori_bahan;
use App\Models\kategori_seputardapur;
use App\Models\kategori_tipsdasar;
use App\Models\reseps;
use App\Models\seputar_dapur;
use App\Models\special_days;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResepsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tips = kategori_tipsdasar::all();
        $dapur = kategori_seputardapur::all();
        $hari = special_days::all();
        $bahan = kategori_bahan::all();
        $resep = reseps::all();
        return view('admin.resep.resep', compact('tips', 'dapur', 'hari', 'bahan', 'resep'));
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
            'userkoki_id' => "nullable",
            'tipsdasar_id' => "nullable",
            'seputardapur_id' => "nullable",
            'specialday_id' => "nullable",
            'nama_masakan' => "required",
            'foto_masakan' => "required|image|mimes:png,jpg,jpeg,webp|max:50000",
            'deskripsi_masakan' => "required",
            'bahan_masakan' => "required",
            'langkah2_memasak' => "required"
        ]);
        $create = [
            "userkoki_id" => NULL,
            "tipsdasar_id" => $request->tipsdasar_id,
            "seputardapur_id" => $request->seputardapur_id,
            "specialday_id" => $request->specialday_id,
            "nama_masakan" => $request->nama_masakan,
            "foto_masakan" => $request->file('foto_masakan')->store('photoResep'),
            "deskripsi_masakan" => $request->deskripsi_masakan,
            "bahan_masakan" => implode(",", $request->bahan_masakan),
            "langkah2_memasak" => $request->langkah2_memasak,
        ];
        $resep = reseps::create($create);
        $ats = implode(" , ", $request->bahan_masakan);
        $arr = explode(" , ", $ats);
        $resep->kategori_bahan()->attach($arr);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(reseps $reseps)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(reseps $reseps)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'userkoki_id' => "nullable",
            'tipsdasar_id' => "nullable",
            'seputardapur_id' => "nullable",
            'specialday_id' => "nullable",
            'nama_masakan' => "required",
            'foto_masakan' => "image|mimes:png,jpg,jpeg,webp|max:50000",
            'deskripsi_masakan' => "required",
            'bahan_masakan' => "required",
            'langkah2_memasak' => "required"
        ]);
        $update = reseps::find($id);
        $update->tipsdasar_id = $request->tipsdasar_id;
        $update->seputardapur_id = $request->seputardapur_id;
        $update->specialday_id = $request->specialday_id;
        $update->nama_masakan = $request->nama_masakan;
        if ($request->hasFile('foto_masakan')) {
            Storage::delete($update->foto_masakan);
            $update->foto_masakan = $request->file('foto_masakan')->store('photoResep');
        }
        $update->deskripsi_masakan = $request->deskripsi_masakan;
        $update->bahan_masakan = implode(',', $request->bahan_masakan);
        $update->langkah2_memasak = $request->langkah2_memasak;
        $update->save();
        $ats = implode(" , ", $request->bahan_masakan);
        $arr = explode(" , ", $ats);
        $update->kategori_bahan()->sync($arr);
        return redirect()->back()->with('success', 'Sukse mengupdate data.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hapus = reseps::find($id);
        Storage::delete($hapus->foto_masakan);
        reseps::where('id', $id)->delete();
        return redirect()->back();
    }
}
