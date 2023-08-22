<?php

namespace App\Http\Controllers;

use App\Models\bahan_reseps;
use App\Models\langkah_reseps;
use App\Models\reseps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\notifications;
use App\Models\special_days;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as ValidationValidator;

class ResepsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userLogin = Auth::user();
        $notification = [];
        $unreadNotificationCount = [];
        if ($userLogin) {
            $notification = notifications::where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'desc') // Urutkan notifikasi berdasarkan created_at terbaru
                ->paginate(10); // Paginasi notifikasi dengan 10 item per halaman
            $unreadNotificationCount = notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
        }
        $special_days = special_days::all();
        return view("koki.resep", compact('notification', 'special_days', 'userLogin', 'unreadNotificationCount'));
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
        /*dd($request->all());
        $request->validate([
            "nama_resep" => "required",
            "foto_resep" => "required|image|mimes:jpg,jpeg,png|max:50000",
            "deskripsi_resep" => "required",
            "hari_khusus" => "nullable",
            "porsi_orang" => "required|numeric",
            "lama_memasak" => "required",
            "pengeluaran_memasak" => "required|numeric",
            "bahan_resep.*" => "required",
            "foto_langkah_resep.0" => "required|image|mimes:png,jpeg,jpg|max:50000",
            "takaran_resep.*" => "required",
            "langkah_resep.*" => "required"
        ]); */

        $rules = [
            "nama_resep" => "required",
            "foto_resep" => "required|image|mimes:jpg,jpeg,png|max:50000",
            "deskripsi_resep" => "required",
            "hari_khusus" => "nullable",
            "porsi_orang" => "required|numeric",
            "lama_memasak" => "required",
            "pengeluaran_memasak" => "required|numeric",
            "bahan_resep.*" => "required",
            "takaran_resep.*" => "required",
            "langkah_resep.*" => "required"
        ];
        $messages = [
            "nama_resep.required" => "Nama resep wajib diisi!",
            "foto_resep.required" => "Foto resep wajib diisi!",
            "foto_resep.image" => "Foto resep harus berupa gambar!",
            "foto_resep.mimes" => "Foto resep harus berekstensi jpg, jpeg, atau png!",
            "foto_resep.max" => "Foto resep yang diterima maksimal berukuran 50MB!",
            "deskripsi_resep.required" => "Deskripsi resep wajib diisi!",
            "porsi_orang.required" => "Porsi orang wajib diisi!",
            "porsi_orang.numeric" => "Porsi orang wajib berupa nomer!",
            "lama_memasak.required" => "Lama memasak wajib diisi!",
            "pengeluaran_memasak.required" => "Pengeluaran memasak wajib diisi!",
            "pengeluaran_memasak.numeric" => "Pengeluaran memasak wajib berupa nomer!",
            "bahan_resep.*.required" => "Bahan resep wajib diisi!",
            "takaran_resep.*.required" => "Takaran resep wajib diisi!",
            "langkah_resep.*.required" => "Langkah resep wajib diisi!"
        ];
        foreach ($request->langkah_resep as $key => $value) {
            $rules["foto_langkah_resep.$key"] = "required|image|mimes:jpg,jpeg,png|max:50000";
            $messages["foto_langkah_resep.$key.required"] = "Foto langkah wajib diisi!";
            $messages["foto_langkah_resep.$key.image"] = "Foto langkah wajib berupa gambar!";
            $messages["foto_langkah_resep.$key.mimes"] = "Foto langkah harus berekstensi jpg, jpeg, atau png!";
            $messages["foto_langkah_resep.$key.max"] = "Foto langkah yang diterima maksimal berukuran 50MB!";
        }
        $validasi = Validator::make($request->all(), $rules, $messages);
        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi);
        }
        $create_recipe = reseps::create([
            "user_id" => Auth::user()->id,
            "nama_resep" => $request->nama_resep,
            "foto_resep" => $request->file('foto_resep')->store('photo-recipe', 'public'),
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
                langkah_reseps::create([
                    "resep_id" => $create_recipe->id,
                    "foto_langkah" => $request->file("foto_langkah_resep.$nomer")->store('photo-step', 'public'),
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
    public function edit(string $id)
    {
        $edit_resep = reseps::find($id);
        $special_days = special_days::all();
        $userLogin = Auth::user();
        $notification = [];
        $unreadNotificationCount = [];
        if ($userLogin) {
            $notification = notifications::where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'desc') // Urutkan notifikasi berdasarkan created_at terbaru
                ->paginate(10); // Paginasi notifikasi dengan 10 item per halaman
            $unreadNotificationCount = notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
        }
        return view("koki.resep-edit", compact("edit_resep", "special_days", "notification", 'userLogin', 'unreadNotificationCount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            "nama_resep" => "required",
            "foto_resep" => "required|image|mimes:jpg,jpeg,png|max:50000",
            "deskripsi_resep" => "required",
            "hari_khusus" => "nullable",
            "porsi_orang" => "required|numeric",
            "lama_memasak" => "required",
            "pengeluaran_memasak" => "required|numeric",
            "bahan_resep.*" => "required",
            "takaran_resep.*" => "required",
            "langkah_resep.*" => "required"
        ];
        $messages = [
            "nama_resep.required" => "Nama resep wajib diisi!",
            "foto_resep.required" => "Foto resep wajib diisi!",
            "foto_resep.image" => "Foto resep harus berupa gambar!",
            "foto_resep.mimes" => "Foto resep harus berekstensi jpg, jpeg, atau png!",
            "foto_resep.max" => "Foto resep yang diterima maksimal berukuran 50MB!",
            "deskripsi_resep.required" => "Deskripsi resep wajib diisi!",
            "porsi_orang.required" => "Porsi orang wajib diisi!",
            "porsi_orang.numeric" => "Porsi orang wajib berupa nomer!",
            "lama_memasak.required" => "Lama memasak wajib diisi!",
            "pengeluaran_memasak.required" => "Pengeluaran memasak wajib diisi!",
            "pengeluaran_memasak.numeric" => "Pengeluaran memasak wajib berupa nomer!",
            "bahan_resep.*.required" => "Bahan resep wajib diisi!",
            "takaran_resep.*.required" => "Takaran resep wajib diisi!",
            "langkah_resep.*.required" => "Langkah resep wajib diisi!"
        ];
        foreach ($request->langkah_resep as $key => $value) {
            $rules["foto_langkah_resep.$key"] = "required|image|mimes:jpg,jpeg,png|max:50000";
            $messages["foto_langkah_resep.$key.required"] = "Foto langkah wajib diisi!";
            $messages["foto_langkah_resep.$key.image"] = "Foto langkah wajib berupa gambar!";
            $messages["foto_langkah_resep.$key.mimes"] = "Foto langkah harus berekstensi jpg, jpeg, atau png!";
            $messages["foto_langkah_resep.$key.max"] = "Foto langkah yang diterima maksimal berukuran 50MB!";
        }
        $validasi = Validator::make($request->all(), $rules, $messages);
        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi);
        }
        $update_resep = reseps::find($id);
        $update_resep->nama_resep = $request->nama_resep;
        if ($request->hasFile("foto_resep")) {
            Storage::delete("public/" . $update_resep->foto_resep);
            $update_resep->foto_resep = $request->file('foto_resep')->store('photo-recipe', 'public');
        }
        $update_resep->deskripsi_resep = $request->deskripsi_resep;
        if ($request->has("hari_khusus")) {
            $update_resep->hari_khusus = $request->hari_khusus;
        }
        $update_resep->porsi_orang = $request->porsi_orang;
        $update_resep->lama_memasak = $request->lama_memasak;
        $update_resep->pengeluaran_memasak = $request->pengeluaran_memasak;
        $update_resep->save();
        if ($request->has("hapus_bahan")) {
            foreach ($request->hapus_bahan as $key => $value) {
                bahan_reseps::where("id", $value)->delete();
            }
        }
        if ($request->has("hapus_langkah")) {
            foreach ($request->hapus_langkah as $key => $v) {
                langkah_reseps::where("id", $v)->delete();
            }
        }


        foreach ($request->bahan_resep as $i => $b) {
            $bahan = strtolower(trim($b));
            bahan_reseps::where('id', $request->id_bahan_resep[$i])->update([
                "nama_bahan" => $bahan,
                "takaran_bahan" => $request->takaran_resep[$i]
            ]);
        }
        // menambahkan bahan jika ada
        if ($request->has("bahan_resep_tambahan")) {
            foreach ($request->bahan_resep_tambahan as $number => $b) {
                $bahan = strtolower(trim($b));
                bahan_reseps::create([
                    "resep_id" => $update_resep->id,
                    "nama_bahan" => $bahan,
                    "takaran_bahan" => $request->takaran_resep_tambahan[$number]
                ]);
            }
        }
        foreach ($request->langkah_resep as $index => $langkah) {
            $langkah_resep = langkah_reseps::where('id', $request->id_langkah_resep[$index])->first();
            $langkah_resep->deskripsi_langkah = $langkah;
            if ($request->hasFile("foto_langkah_resep.$index")) {
                Storage::delete("public/" . $langkah_resep->foto_langkah);
                $langkah_resep->foto_langkah = $request->file("foto_langkah_resep.$index")->store("photo-step", "public");
            }
            $langkah_resep->save();
        }
        // menambahkan langkah2 jika ada
        if ($request->has("langkah_resep_tambahan")) {
            foreach ($request->langkah_resep_tambahan as $nomer => $langkah) {
                langkah_reseps::create([
                    "resep_id" => $update_resep->id,
                    "foto_langkah" => $request->file("foto_langkah_resep_tambahan.$nomer")->store('photo-step', 'public'),
                    "deskripsi_langkah" => $langkah
                ]);
            }
        }
        return redirect('/koki/index')->with('success', 'Sukses! anda berhasil mengupdate resep');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $resep = reseps::where('id', $id)->first();
        Storage::delete("public/" . $resep->foto_resep);
        foreach ($resep->langkah as $v) {
            Storage::delete("public/" . $v->foto_langkah);
        }
        reseps::where("id", $id)->delete();
        return redirect()->back()->with('success', 'Sukses! anda berhasil menghapus data resep.');
    }
}
