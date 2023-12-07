<?php

namespace App\Http\Controllers;

use App\Models\BahanReseps;
use App\Models\ChMessage;
use App\Models\Favorite;
use App\Models\Followers;
use App\Models\Footer;
use App\Models\LangkahResep;
use App\Models\Reseps;
use App\Models\Share;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notifications;
use App\Models\SpecialDays;
use App\Models\ToolsCooks;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\KategoriMakanan;
use App\Models\HariReseps;
use App\Models\KategoryResep;
use App\Models\TopUpCategories;
use App\Models\User;
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
        $footer = Footer::first();
        $unreadNotificationCount = [];
        $categorytopup = TopUpCategories::all();
        $messageCount = [];
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
        if ($userLogin) {
            $notification = Notifications::where('user_id', auth()->user()->id)
            ->where('status','belum')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            $unreadNotificationCount = Notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
        }
        if ($userLogin) {
            $favorite = Favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        $categories_food = KategoriMakanan::all();
        $special_days = SpecialDays::all();
        return view("koki.resep", compact('categorytopup','messageCount', 'categories_food', 'footer', 'notification', 'special_days', 'userLogin', 'unreadNotificationCount', 'favorite'));
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
        $allUser = User::where("isSuperUser", "yes")->pluck('id')->toArray();
        $isPremium = "no";
        if (in_array(Auth::user()->id, $allUser)) {
            if ($request->premium == "yes") {
                $isPremium = "yes";
            } elseif ($request->premium == "no") {
                $isPremium = "no";
            }
        } else {
            $isPremium = "no";
        }
        //dd($request->all());
        $rules = [
            "nama_resep" => "required",
            "foto_resep" => "required|image|mimes:jpg,jpeg,png,gif|max:50000",
            "deskripsi_resep" => "required",
            "hari_khusus" => "nullable",
            "porsi_orang" => "required|integer|min:0",
            "lama_memasak" => "required|numeric|min:0",
            "pengeluaran_memasak" => "required|min:0",
            "nama_alat.*" => "required",
            "bahan_resep.*" => "required",
            "takaran_resep.*" => "required",
            "langkah_resep.*" => "required"
        ];
        $messages = [
            "nama_resep.required" => "Nama resep wajib diisi!",
            "foto_resep.required" => "Foto resep wajib diisi!",
            "foto_resep.image" => "Foto resep harus berupa gambar!",
            "foto_resep.mimes" => "Foto resep harus berekstensi jpg, jpeg,gif atau png!",
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
            "nama_alat.*.required" => "Nama alat tidak boleh kosong!",
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
            //return redirect()->back()->withErrors($validasi->errors());
            return response()->json($validasi->errors()->first(), 422);
        } else {
            $time = 0;
            if ($request->lama_memasak2 === 'jam') {
                $time = $request->lama_memasak * 60;
            } else if ($request->lama_memasak2 === 'menit') {
                $time = $request->lama_memasak;
            }
            $price = str_replace(['.', ','], '', $request->pengeluaran_memasak);
            $create_recipe = Reseps::create([
                "user_id" => Auth::user()->id,
                "nama_resep" => $request->nama_resep,
                "foto_resep" => $request->file('foto_resep')->store('photo-recipe', 'public'),
                "deskripsi_resep" => $request->deskripsi_resep,
                "porsi_orang" => $request->porsi_orang,
                "lama_memasak" => $time,
                "pengeluaran_memasak" => $price,
                "isPremium" => $isPremium
            ]);

            if ($create_recipe) {
                foreach ($request->bahan_resep as $number => $b) {
                    $bahan = strtolower(trim($b));
                    BahanReseps::create([
                        "resep_id" => $create_recipe->id,
                        "nama_bahan" => $bahan,
                        "takaran_bahan" => $request->takaran_resep[$number]
                    ]);
                }
                foreach ($request->nama_alat as $nm => $a) {
                    $alat = strtolower(trim($a));
                    ToolsCooks::create([
                        "recipes_id" => $create_recipe->id,
                        "nama_alat" => $alat
                    ]);
                }
                foreach ($request->langkah_resep as $nomer => $langkah) {
                    LangkahResep::create([
                        "resep_id" => $create_recipe->id,
                        "foto_langkah" => $request->file("foto_langkah_resep.$nomer")->store('photo-step', 'public'),
                        "judul_langkah" => $request->judul_langkah[$nomer],
                        "deskripsi_langkah" => $langkah
                    ]);
                }
                if ($request->has('hari_khusus')) {
                    foreach ($request->hari_khusus as $key => $value) {
                        HariReseps::create([
                            "reseps_id" => $create_recipe->id,
                            "hari_khusus_id" => $value
                        ]);
                    }
                }
                if ($request->has('jenis_makanan')) {
                    foreach ($request->jenis_makanan as $no => $jenis) {
                        KategoryResep::create([
                            "reseps_id" => $create_recipe->id,
                            "kategori_reseps_id" => $jenis
                        ]);
                    }
                }
                //notifikasi untuk follower
                $followerIds = Followers::where('user_id', auth()->user()->id)->pluck('follower_id')->toArray();
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
            return response()->json(['success' => 'Sukses menambahkan data resep!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Reseps $reseps)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit_resep = Reseps::find($id);
        $special_days = SpecialDays::all();
        $categories_foods = KategoriMakanan::all();
        $userLogin = Auth::user();
        $footer = Footer::first();
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
        $categorytopup  =  TopUpCategories::all();
        $messageCount = [];
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
        if ($userLogin) {
            $notification = Notifications::where('user_id', auth()->user()->id)
            ->where('status','belum')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            $unreadNotificationCount = Notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
        }
        if ($userLogin) {
            $favorite = Favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        return view("koki.resep-edit", compact('categorytopup',"messageCount", "footer", "categories_foods", "edit_resep", "special_days", "notification", 'userLogin', 'unreadNotificationCount', 'favorite'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            "nama_resep" => "required",
            "foto_resep" => "nullable|image|mimes:jpg,jpeg,png,gif|max:50000",
            "deskripsi_resep" => "required",
            'nama_alat.*' => 'required',
            "hari_khusus" => "nullable",
            "porsi_orang" => "required|integer|min:0",
            "lama_memasak" => "required|numeric|min:0",
            "pengeluaran_memasak" => "required|min:0",
            "bahan_resep.*" => "required",
            "takaran_resep.*" => "required",
            "langkah_resep.*" => "required",
            "judul_langkah.*" => "required",
            "bahan_resep_tambahan.*" => "required",
            "takaran_resep_tambahan.*" => "required",
            "nama_alat_tambahan.*" => "required",
            "judul_resep_tambahan.*" => "required",
            "langkah_resep_tambahan.*" => "required",
        ];

        $messages = [
            "nama_resep.required" => "Nama resep wajib diisi!",
            "foto_resep.image" => "Foto resep harus berupa gambar!",
            "foto_resep.mimes" => "Foto resep harus berekstensi jpg, jpeg,gif atau png!",
            "foto_resep.max" => "Foto resep yang diterima maksimal berukuran 50MB!",
            "deskripsi_resep.required" => "Deskripsi resep wajib diisi!",
            'nama_alat.*.required' => 'Nama alat wajib diisi',
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
            "langkah_resep.*.required" => "Langkah resep wajib diisi!",
            "judul_langkah.*.required" => "Judul langkah resep wajib diisi!",
            "bahan_resep_tambahan.*.required" => "Bahan resep tambahan harus diisi!",
            "takaran_resep_tambahan.*.required" => "Takaran resep tambahan harus diisi!",
            "nama_alat_tambahan.*.required" => "Nama alat tambahan harus diisi!",
            "judul_resep_tambahan.*.required" => "Judul langkah tambahan wajib diisi!",
            "langkah_resep_tambahan.*.required" => "Langkah resep tambahan harus diisi!",
        ];
        foreach ($request->langkah_resep as $key => $value) {
            $rules["foto_langkah_resep.$key"] = "nullable|image|mimes:jpg,jpeg,png|max:50000";
            $messages["foto_langkah_resep.$key.image"] = "Foto langkah wajib berupa gambar!";
            $messages["foto_langkah_resep.$key.mimes"] = "Foto langkah harus berekstensi jpg, jpeg, atau png!";
            $messages["foto_langkah_resep.$key.max"] = "Foto langkah yang diterima maksimal berukuran 50MB!";
        }
        if ($request->has('langkah_resep_tambahan')) {
            foreach ($request->langkah_resep_tambahan as $key => $value) {
                $rules["foto_langkah_resep_tambahan.$key"] = "required|image|mimes:jpg,jpeg,png|max:50000";
                $messages["foto_langkah_resep_tambahan.$key.required"]  = "Foto langkah wajib diisi";
                $messages["foto_langkah_resep_tambahan.$key.image"] = "Foto langkah wajib berupa gambar!";
                $messages["foto_langkah_resep_tambahan.$key.mimes"] = "Foto langkah harus berekstensi jpg, jpeg, atau png!";
                $messages["foto_langkah_resep_tambahan.$key.max"] = "Foto langkah yang diterima maksimal berukuran 50MB!";
            }
        }
        $validasi = Validator::make($request->all(), $rules, $messages);
        if ($validasi->fails()) {
            return response()->json($validasi->errors()->first(), 422);
        } else {
            $update_resep = Reseps::find($id);
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
            if ($request->has('premium')) {
                $update_resep->isPremium = $request->premium;
            }
            $update_resep->save();
            if ($request->has('hari_khusus')) {
                $update_resep->hari_resep()->sync($request->hari_khusus);
            } else {
                HariReseps::where("reseps_id", $update_resep->id)->delete();
            }
            if ($request->has('jenis_makanan')) {
                $update_resep->kategori_resep()->sync($request->jenis_makanan);
            } else {
                KategoryResep::where("reseps_id", $update_resep->id)->delete();
            }
            if ($request->has("hapus_bahan")) {
                foreach ($request->hapus_bahan as $key => $value) {
                    $n = (int)$value;
                    BahanReseps::where("id", $n)->delete();
                }
            }
            if ($request->has("hapus_alat")) {
                foreach ($request->hapus_alat as $nms => $vv) {
                    $c = (int)$vv;
                    ToolsCooks::where("id", $c)->delete();
                }
            }
            if ($request->has("hapus_langkah")) {
                foreach ($request->hapus_langkah as $key => $v) {
                    $d = (int)$v;
                    $lr = LangkahResep::where("id", $d)->first();
                    Storage::delete("public/" . $lr->foto_langkah);
                    $lr->delete();
                }
            }
            foreach ($request->bahan_resep as $i => $b) {
                $bahan = strtolower(trim($b));
                BahanReseps::where('id', $request->id_bahan_resep[$i])->update([
                    "nama_bahan" => $bahan,
                    "takaran_bahan" => $request->takaran_resep[$i]
                ]);
            }
            // menambahkan bahan jika ada
            if ($request->has("bahan_resep_tambahan")) {
                foreach ($request->bahan_resep_tambahan as $number => $b) {
                    $bahan = strtolower(trim($b));
                    BahanReseps::create([
                        "resep_id" => $update_resep->id,
                        "nama_bahan" => $bahan,
                        "takaran_bahan" => $request->takaran_resep_tambahan[$number]
                    ]);
                }
            }

            foreach ($request->nama_alat as $in => $na) {
                $alat = ToolsCooks::where('id', $request->id_alat[$in])->first();
                $alat->nama_alat = $na;
                $alat->save();
            }
            if ($request->has("nama_alat_tambahan")) {
                foreach ($request->nama_alat_tambahan as $nam => $amn) {
                    ToolsCooks::create([
                        "recipes_id" => $update_resep->id,
                        "nama_alat" => $amn
                    ]);
                }
            }
            foreach ($request->langkah_resep as $index => $langkah) {
                $langkah_resep = LangkahResep::where('id', $request->id_langkah_resep[$index])->first();
                $langkah_resep->deskripsi_langkah = $langkah;
                if ($request->hasFile("foto_langkah_resep.$index")) {
                    Storage::delete("public/" . $langkah_resep->foto_langkah);
                    $langkah_resep->foto_langkah = $request->file("foto_langkah_resep.$index")->store("photo-step", "public");
                }
                $langkah_resep->save();
            }
            foreach ($request->judul_langkah as $bb => $jl) {
                $langkah_resep2 = LangkahResep::where('id', $request->id_langkah_resep[$bb])->first();
                $langkah_resep2->judul_langkah = $jl;
                $langkah_resep2->save();
            }
            // menambahkan langkah2 jika ada
            if ($request->has("langkah_resep_tambahan")) {
                foreach ($request->langkah_resep_tambahan as $nomer => $langkah) {
                    LangkahResep::create([
                        "resep_id" => $update_resep->id,
                        "foto_langkah" => $request->file("foto_langkah_resep_tambahan.$nomer")->store('photo-step', 'public'),
                        "judul_langkah" => $request->judul_resep_tambahan[$nomer],
                        "deskripsi_langkah" => $langkah
                    ]);
                }
            }
            return response()->json([
                'success' => true,
                'redirect' => route('artikel.resep', [$update_resep->id, $update_resep->nama_resep]),
                'message' => 'Berhasil Mengupdate Resep!',
                'data' => $update_resep
            ]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $resep = Reseps::where('id', $id)->first();
        Storage::delete("public/" . $resep->foto_resep);
        foreach ($resep->langkah as $v) {
            Storage::delete("public/" . $v->foto_langkah);
        }
        Reseps::where("id", $id)->delete();
        return redirect('koki/index')->with('success', 'Sukses! anda berhasil menghapus data resep.');
    }
    public function shareRecipe(Request $request){
        if(Auth::check()){
            $resep = Reseps::findOrFail($request->recipe_id);
            $user_id = $request->input('user_id', []);
            if($user_id != null){
                foreach ($user_id as $share_to) {
                    $share = new Share();
                    $share->user_id = $share_to;
                    $share->sender_id = auth()->user()->id;
                    $share->resep_id = $request->recipe_id;
                    $share->save();

                    $notification = new Notifications();
                    $notification->user_id = $share_to;
                    $notification->notification_from = auth()->user()->id;
                    $notification->resep_id = $request->recipe_id;
                    $notification->categories = "others";
                    $notification->message = "Membagikan resep kepada anda";
                    $notification->route = "/artikel/".$resep->id."/".$resep->nama_resep;
                    $notification->save();
                }
                $check = Share::where('sender_id',auth()->user()->id)->where('resep_id',$resep->id)->count();
                return response()->json([
                    "success"=> true,
                    "message"=>"Berhasil membagikan resep!",
                    'isShared' => $check,
                    'shared_count' => $resep->share_count(),
                ]);
            }else{
                return response()->json([
                    "success"=> false,
                    "message"=>"Pilih salah satu pengguna untuk melanjutkan",
                ]);
            }
        }else{
            return response()->json([
                "success"=> false,
                "message"=>"Silahkan login terlebih dahulu",
            ]);
        }
    }
}
