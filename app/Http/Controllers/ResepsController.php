<?php

namespace App\Http\Controllers;

use App\Models\bahan_reseps;
use App\Models\favorite;
use App\Models\followers;
use App\Models\langkah_reseps;
use App\Models\reseps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\notifications;
use App\Models\special_days;
use App\Models\toolsCooks;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\kategori_makanan;
use App\Models\hari_reseps;
use App\Models\kategori_reseps;
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
        $favorite = [];
        $unreadNotificationCount = [];
        if ($userLogin) {
            $notification = notifications::where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'desc') // Urutkan notifikasi berdasarkan created_at terbaru
                ->paginate(10); // Paginasi notifikasi dengan 10 item per halaman
            $unreadNotificationCount = notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
        }
        if ($userLogin) {
            $favorite = favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        $categories_food = kategori_makanan::all();
        $special_days = special_days::all();
        return view("koki.resep", compact('categories_food', 'notification', 'special_days', 'userLogin', 'unreadNotificationCount', 'favorite'));
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
        //dd($request->all());
        $rules = [
            "nama_resep" => "required",
            "foto_resep" => "required|image|mimes:jpg,jpeg,png|max:50000",
            "deskripsi_resep" => "required",
            "hari_khusus" => "nullable",
            "porsi_orang" => "required|integer|min:0",
            "lama_memasak" => "required|numeric|min:0",
            "pengeluaran_memasak" => "required|min:0",
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
            "porsi_orang.integer" => "Porsi orang wajib berupa nomer!",
            "porsi_orang.min" => "Porsi orang tidak boleh bernilai minus!",
            "lama_memasak.required" => "Lama memasak wajib diisi!",
            "lama_memasak.numeric" => "Lama memasak wajib berupa nomer!",
            "lama_memasak.min" => "Lama memasak tidak boleh bernilai minus!",
            "pengeluaran_memasak.required" => "Pengeluaran memasak wajib diisi!",
            "pengeluaran_memasak.min" => "Pengeluaran memasak tidak boleh bernilai minus!",
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
            return response()->json(["error" => $validasi->errors()->first()], 422);
        }
        $time = 0;
        if ($request->lama_memasak2 === 'jam') {
            $time = $request->lama_memasak * 60;
        } else if ($request->lama_memasak2 === 'menit') {
            $time = $request->lama_memasak;
        }
        $price = str_replace(['.', ','], '', $request->pengeluaran_memasak);
        $create_recipe = reseps::create([
            "user_id" => Auth::user()->id,
            "nama_resep" => $request->nama_resep,
            "foto_resep" => $request->file('foto_resep')->store('photo-recipe', 'public'),
            "deskripsi_resep" => $request->deskripsi_resep,
            "porsi_orang" => $request->porsi_orang,
            "lama_memasak" => $time,
            "pengeluaran_memasak" => $price
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
            foreach ($request->nama_alat as $nm => $a) {
                $alat = strtolower(trim($a));
                toolsCooks::create([
                    "recipes_id" => $create_recipe->id,
                    "nama_alat" => $alat
                ]);
            }
            foreach ($request->langkah_resep as $nomer => $langkah) {
                langkah_reseps::create([
                    "resep_id" => $create_recipe->id,
                    "foto_langkah" => $request->file("foto_langkah_resep.$nomer")->store('photo-step', 'public'),
                    "judul_langkah" => $request->judul_langkah[$nomer],
                    "deskripsi_langkah" => $langkah
                ]);
            }
            if ($request->has('hari_khusus')) {
                if ($request->hari_khusus != 'on') {
                    # code...
                    hari_reseps::create([
                        "reseps_id" => $create_recipe->id,
                        "hari_khusus_id" => $request->hari_khusus
                    ]);
                }
            }
            if ($request->has('jenis_makanan')) {
                foreach ($request->jenis_makanan as $no => $jenis) {
                    kategori_reseps::create([
                        "reseps_id" => $create_recipe->id,
                        "kategori_reseps_id" => $jenis
                    ]);
                }
            }
            //notifikasi untuk follower
            $followerIds = followers::where('user_id', auth()->user()->id)->pluck('follower_id')->toArray();
            if ($followerIds != null) {
                foreach ($followerIds as $followerId) {
                    $notification = new Notifications([
                        'notification_from' => auth()->user()->id,
                        'resep_id' => $create_recipe->id,
                        'follower_id' => $followerId,
                        'user_id' => $followerId,
                    ]);
                    $notification->save();
                }
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
        $categories_foods = kategori_makanan::all();
        $userLogin = Auth::user();
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
        if ($userLogin) {
            $notification = notifications::where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'desc') // Urutkan notifikasi berdasarkan created_at terbaru
                ->paginate(10); // Paginasi notifikasi dengan 10 item per halaman
            $unreadNotificationCount = notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
        }
        if ($userLogin) {
            $favorite = favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        return view("koki.resep-edit", compact("categories_foods", "edit_resep", "special_days", "notification", 'userLogin', 'unreadNotificationCount', 'favorite'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $rules = [
            "nama_resep" => "required",
            "foto_resep" => "nullable|image|mimes:jpg,jpeg,png|max:50000",
            "deskripsi_resep" => "required",
            "hari_khusus" => "nullable",
            "porsi_orang" => "required|integer|min:0",
            "lama_memasak" => "required|numeric|min:0",
            "pengeluaran_memasak" => "required|min:0",
            "bahan_resep.*" => "required",
            "takaran_resep.*" => "required",
            "langkah_resep.*" => "required"
        ];
        $messages = [
            "nama_resep.required" => "Nama resep wajib diisi!",
            "foto_resep.image" => "Foto resep harus berupa gambar!",
            "foto_resep.mimes" => "Foto resep harus berekstensi jpg, jpeg, atau png!",
            "foto_resep.max" => "Foto resep yang diterima maksimal berukuran 50MB!",
            "deskripsi_resep.required" => "Deskripsi resep wajib diisi!",
            "porsi_orang.required" => "Porsi orang wajib diisi!",
            "porsi_orang.integer" => "Porsi orang wajib berupa nomer!",
            "porsi_orang.min" => "Porsi orang tidak boleh bernilai minus!",
            "lama_memasak.required" => "Lama memasak wajib diisi!",
            "lama_memasak.numeric" => "Lama memasak wajib berupa nomer!",
            "lama_memasak.min" => "Lama memasak tidak boleh bernilai minus!",
            "pengeluaran_memasak.required" => "Pengeluaran memasak wajib diisi!",
            "pengeluaran_memasak.min" => "Pengeluaran memasak tidak boleh bernilai minus!",
            "bahan_resep.*.required" => "Bahan resep wajib diisi!",
            "takaran_resep.*.required" => "Takaran resep wajib diisi!",
            "langkah_resep.*.required" => "Langkah resep wajib diisi!"
        ];
        foreach ($request->langkah_resep as $key => $value) {
            $rules["foto_langkah_resep.$key"] = "nullable|image|mimes:jpg,jpeg,png|max:50000";
            $messages["foto_langkah_resep.$key.image"] = "Foto langkah wajib berupa gambar!";
            $messages["foto_langkah_resep.$key.mimes"] = "Foto langkah harus berekstensi jpg, jpeg, atau png!";
            $messages["foto_langkah_resep.$key.max"] = "Foto langkah yang diterima maksimal berukuran 50MB!";
        }
        $validasi = Validator::make($request->all(), $rules, $messages);
        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
            //return response()->json([$validasi->errors(), 422]);
        }
        $update_resep = reseps::find($id);
        $update_resep->nama_resep = $request->nama_resep;
        if ($request->hasFile("foto_resep")) {
            Storage::delete("public/" . $update_resep->foto_resep);
            $update_resep->foto_resep = $request->file('foto_resep')->store('photo-recipe', 'public');
        }
        $update_resep->deskripsi_resep = $request->deskripsi_resep;

        $update_resep->porsi_orang = $request->porsi_orang;
        $lama_memasak = $request->lama_memasak;
        if (strtolower(trim($request->lama_memasak2)) == 'jam') {
            $timer = $request->lama_memasak * 60;
        } else {
            $timer = $request->lama_memasak;
        }
        $update_resep->lama_memasak = $timer;
        $price = str_replace([',', '.'], '', $request->pengeluaran_memasak);
        $update_resep->pengeluaran_memasak = $price;
        $update_resep->save();
        if ($request->hari_khusus != "on") {
            $ceks = reseps::has("hari_resep")->count();
            if ($ceks >= 1) {
                hari_reseps::where("reseps_id", $update_resep->id)->delete();
            }
            hari_reseps::create([
                "reseps_id" => $update_resep->id,
                "hari_khusus_id" => $request->hari_khusus
            ]);
        } else {
            hari_reseps::where("reseps_id", $update_resep->id)->delete();
        }
        if ($request->has('jenis_makanan')) {
            $update_resep->kategori_resep()->sync($request->jenis_makanan);
        } else {
            kategori_reseps::where("reseps_id", $request->jenis_makanan)->delete();
        }
        if ($request->has("hapus_bahan")) {
            foreach ($request->hapus_bahan as $key => $value) {
                $n = (int)$value;
                bahan_reseps::where("id", $n)->delete();
            }
        }
        if ($request->has("hapus_alat")) {
            foreach ($request->hapus_alat as $nms => $vv) {
                $c = (int)$vv;
                toolsCooks::where("id", $c)->delete();
            }
        }
        if ($request->has("hapus_langkah")) {
            foreach ($request->hapus_langkah as $key => $v) {
                $d = (int)$v;
                langkah_reseps::where("id", $d)->delete();
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

        foreach ($request->nama_alat as $in => $na) {
            $alat = toolsCooks::where('id', $request->id_alat[$in])->first();
            $alat->nama_alat = $na;
            $alat->save();
        }
        if ($request->has("nama_alat_tambahan")) {
            foreach ($request->nama_alat_tambahan as $nam => $amn) {
                toolsCooks::create([
                    "recipes_id" => $update_resep->id,
                    "nama_alat" => $amn
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
        foreach ($request->judul_langkah as $bb => $jl) {
            $langkah_resep2 = langkah_reseps::where('id', $request->id_langkah_resep[$bb])->first();
            $langkah_resep2->judul_langkah = $jl;
            $langkah_resep2->save();
        }
        // menambahkan langkah2 jika ada
        if ($request->has("langkah_resep_tambahan")) {
            foreach ($request->langkah_resep_tambahan as $nomer => $langkah) {
                langkah_reseps::create([
                    "resep_id" => $update_resep->id,
                    "foto_langkah" => $request->file("foto_langkah_resep_tambahan.$nomer")->store('photo-step', 'public'),
                    "judul_langkah" => $request->judul_resep_tambahan[$nomer],
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
        return redirect('koki/index')->with('success', 'Sukses! anda berhasil menghapus data resep.');
    }
}
