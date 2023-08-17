<?php

namespace App\Http\Controllers;

use App\Models\bahan_reseps;
use App\Models\langkah_reseps;
use App\Models\reseps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\notifications;
use Illuminate\Support\Facades\Storage;

class ResepsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userLogin = Auth::user();
        $notification = [];
        if ($userLogin) {
            $notification = notifications::where('user_id', auth()->user()->id)->get();
        }
        return view("koki.resep", compact('notification'));
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
            "nama_resep" => "required",
            "foto_resep" => "required|image|mimes:png,jpg,jpeg|max:50000",
            "deskripsi_resep" => "required",
            "hari_khusus" => "nullable",
            "porsi_orang" => "required|numeric",
            "lama_memasak" => "required|numeric",
            "pengeluaran_memasak" => "required|numeric",
            "bahan_resep.*" => "required",
            "takaran_resep.*" => "required",
            "foto_langkah_resep.*" => "required|image|mimes:png,jpg,jpeg|max:50000",
            "langkah_resep.*" => "required" 
        ]);
        $photo_file = $request->file("foto_resep");
        $photo_path = $photo_file->store("photos/photo-resep");
        $create_recipe = reseps::create([
            "user_id" => Auth::user()->id,
            "nama_resep" => $request->nama_resep,
            "foto_resep" => $photo_path,
            "deskripsi_resep" => $request->deskripsi_resep,
            "hari_khusus" => $request->hari_khusus,
            "porsi_orang" => $request->porsi_orang,
            "lama_memasak" => $request->lama_memasak,
            "pengeluaran_memasak" => $request->pengeluaran_memasak
        ]);
        if ($create_recipe) {
            foreach ($request->bahan_resep as $number => $b) {
                $bahan = strtolower(trim($b));
                bahan_reseps::create([
                    "resep_id" => $create_recipe->id,
                    "nama_bahan" => $bahan,
                    "takaran_bahan" => $request->takaran_resep[$number]
                ]);
            }
            foreach ($request->langkah_resep as $nomer => $langkah) {
                $photo_file2 = $request->file("foto_langkah_resep.$nomer");
                $photo_path2 = $photo_file2->store("photos/photo-langkah");
                langkah_reseps::create([
                    "resep_id" => $create_recipe->id,
                    "foto_langkah" => $photo_path2,
                    "deskripsi_langkah" => $langkah
                ]);
            }
        }
        return redirect('/koki/index')->with('success', 'Sukses! anda berhasil membuat resep baru.');
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
            "nama_resep" => "required",
            "foto_resep" => "nullable|image|mimes:png,jpg,jpeg|max:50000",
            "deskripsi_resep" => "required",
            "hari_khusus" => "nullable",
            "porsi_orang" => "required|numeric",
            "lama_memasak" => "required|numeric",
            "pengeluaran_memasak" => "required|numeric",
            "bahan_resep.*" => "required",
            "takaran_resep.*" => "required",
            "foto_langkah_resep.*" => "required|image|mimes:png,jpg,jpeg|max:50000",
            "langkah_resep.*" => "required" 
        ]);
        $update_resep = reseps::find($id);
        $update_resep->nama_resep = $request->nama_resep;
        if ($request->hasFile("foto_resep")) {
            Storage::delete($update_resep->foto_resep);
            $photo_file = $request->file("foto_resep");
            $photo_path = $photo_file->store("photos/photo-resep");
            $update_resep->foto_resep = $photo_path;
        }
        $update_resep->deskripsi_resep = $request->deskripsi_resep;
        if ($request->has("hari_khusus")) {
            $update_resep->hari_khusus = $request->hari_khusus;
        }
        $update_resep->porsi_orang = $request->porsi_orang;
        $update_resep->lama_memasak = $request->lama_memasak;
        $update_resep->pengeluaran_memasak = $request->pengeluaran_memasak;
        $update_resep->save();
        return redirect('/koki/index')->with('success', 'Sukses! anda berhasil mengupdate resep');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $resep = reseps::where('id',$id)->first();
        Storage::delete($resep->foto_resep);
        foreach ($resep->langkah as $v) {
            Storage::delete($v->foto_langkah);
        }
        reseps::where("id", $id)->delete();
        return redirect()->back()->with('success', 'Sukses! anda berhasil menghapus data resep.');
    }
}
