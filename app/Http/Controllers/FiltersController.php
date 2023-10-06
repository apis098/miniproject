<?php

namespace App\Http\Controllers;

use App\Models\bahan_reseps;
use App\Models\ChMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\reseps;
use App\Models\notifications;
use App\Models\favorite;
use App\Models\footer;
use App\Models\kategori_makanan;
use App\Models\special_days;
use App\Models\toolsCooks;
use Illuminate\Support\Facades\Validator;
use App\Models\kursus;
use App\Models\District;
use App\Models\jenis_kursuses;
use App\Models\Province;
use App\Models\Village;
use App\Models\Regency;
use Illuminate\Support\Facades\DB;

class FiltersController extends Controller
{
    public function resep_index(Request $request)
    {
        $userLogin = Auth::user();
        $notification = [];
        $favorite = [];
        $footer = footer::first();
        $unreadNotificationCount = [];
        $messageCount = [];
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
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
        // memberikan data untuk filter lanjutan resep
        $special_day = special_days::all();
        $toolcook = toolsCooks::all();
        $toolsCooks = $toolcook->unique("nama_alat");
        $categories_foods_all = kategori_makanan::all();
        $categories_ingredients = bahan_reseps::pluck("nama_bahan")->unique();
        // validasi filter
        if ($request->min_time != NULL && $request->max_time != NULL) {
            if ($request->min_timer === 'jam') {
                $request->merge(["min_time" => $request->min_time * 60]);
            }
            if ($request->max_timer === 'jam') {
                $request->merge(["max_time" => $request->max_time * 60]);
            }
        }
        $validator  = Validator::make($request->all(), [
            'min_price' => 'lte:max_price|required_with:max_price',
            'max_price' => 'required_with:min_price',
            'min_time' => 'lte:max_time|required_with:max_time',
            'max_time' => 'required_with:min_time'
        ], [
            'min_price.lte' => 'Minimal harga tidak boleh melebihi maksimal harga!',
            'min_time.lte' => 'Minimal waktu tidak boleh melebihi maksimal waktu!',
            'min_price.required_with' => "Maksimal harga harus terisi!",
            "max_price.required_with" => "Minimal harga harus terisi!",
            "min_time.required_with" => "Maksimal waktu harus terisi!",
            "max_time.required_with" => "Minimal waktu harus terisi!"
        ]);
        if ($validator->fails()) {
            //return redirect()->back()->withErrors($validator);
            return redirect('resep')->with('error', $validator->errors()->all());
        }
        $recipess = reseps::query();
        if ($request->has('nama_resep')) {
            $recipess->where('nama_resep', 'like', '%' . $request->nama_resep . '%');
        }
        if ($request->min_price != NULL && $request->max_price != NULL) {
            $minprice = str_replace(['.', ','], '', $request->min_price);
            $maxprice = str_replace(['.', ','], '', $request->max_price);
            $min_price = (int)$minprice;
            $max_price = (int)$maxprice;
            $recipess->whereBetween('pengeluaran_memasak', [$min_price, $max_price]);
        }
        if ($request->min_time != NULL && $request->max_time != NULL) {
            $min = $request->min_time;
            $max = $request->max_time;
            $recipess->whereBetween('lama_memasak', [$min, $max]);
        }

        if ($request->has('ingredients')) {
            $bahan = $request->ingredients;
            $recipess->whereHas('bahan', function ($query) use ($bahan) {
                $query->whereIn("nama_bahan", $bahan);
            });
        }
        if ($request->has('alat')) {
            $alat = $request->alat;
            $recipess->whereHas("alat", function ($queri) use ($alat) {
                $queri->whereIn("nama_alat", $alat);
            });
        }
        if ($request->has("hari_khusus")) {
            $d = $request->hari_khusus;
            $recipess->whereHas("hari_resep", function ($querys) use ($d) {
                $querys->whereIn("nama", $d);
            });
        }
        if ($request->has("jenis_makanan")) {
            $jm = $request->jenis_makanan;
            $recipess->whereHas("kategori_resep", function ($qwerty) use ($jm) {
                $qwerty->whereIn("nama_makanan", $jm);
            });
        }
        $recipes = $recipess->paginate(3);
        //dd($recipes);
        return view('template.resep', compact('toolsCooks', 'messageCount', 'special_day', 'footer', 'categories_foods_all', 'categories_ingredients', 'recipes', 'notification', 'unreadNotificationCount', 'userLogin', 'favorite'));
    }
    public function filter_resep(Request $request)
    {
        $userLogin = Auth::user();
        $notification = [];
        $favorite = [];
        $footer = footer::first();
        $unreadNotificationCount = [];
        $messageCount = [];
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
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
        // memberikan data untuk filter lanjutan resep
        $special_day = special_days::all();
        $toolcook = toolsCooks::all();
        $toolsCooks = $toolcook->unique("nama_alat");
        $categories_foods_all = kategori_makanan::all();
        $categories_ingredients = bahan_reseps::pluck("nama_bahan")->unique();
        // validasi filter
        $validator  = Validator::make($request->all(), [
            'min_price' => 'lte:max_price|required_with:max_price',
            'max_price' => 'required_with:min_price',
            'min_time' => 'lte:max_time|required_with:max_time',
            'max_time' => 'required_with:min_time'
        ], [
            'min_price.lte' => 'Minimal harga tidak boleh melebihi maksimal harga!',
            'min_time.lte' => 'Minimal waktu tidak boleh melebihi maksimal waktu!',
            'min_price.required_with' => "Maksimal harga harus terisi!",
            "max_price.required_with" => "Minimal harga harus terisi!",
            "min_time.required_with" => "Maksimal waktu harus terisi!",
            "max_time.required_with" => "Minimal waktu harus terisi!"
        ]);
        if ($validator->fails()) {
            //return redirect()->back()->withErrors($validator);
            return redirect('resep')->with('error', $validator->errors()->all());
        }
        //dd($recipes);
        //$recipes = reseps::query();
        $min_price = null;
        $max_price = null;
        $min = null;
        $max = null;
        $tools = null;
        $ingredients = null;
        $days = [];
        $categories_foods = [];
        $recipes = reseps::query();
        if ($request->has('min_price') != NULL && $request->has('max_price') != NULL) {
            $minprice = str_replace(['.', ','], '', $request->min_price);
            $maxprice = str_replace(['.', ','], '', $request->max_price);
            $min_price = (int)$minprice;
            $max_price = (int)$maxprice;
            $recipes->whereBetween('pengeluaran_memasak', [$min_price, $max_price]);
        }
        if ($request->min_time && $request->max_time) {
            $min = $request->min_time;
            if ($request->min_timer === 'jam') {
                $min *= 60;
            }
            $max = $request->max_time;
            if ($request->max_timer === 'jam') {
                $max *= 60;
            }
            $recipes->whereBetween('lama_memasak', [$min, $max]);
        }
        if ($request->has('alat')) {
            $tools = $request->alat;
            $recipes->whereHas('alat', function ($query) use ($tools) {
                $query->whereIn('nama_alat', $tools);
            });
        }
        if ($request->has('ingredients')) {
            $ingredients = $request->ingredients;
            $recipes->whereHas('bahan', function ($query) use ($ingredients) {
                $query->whereIn("nama_bahan", $ingredients);
            });
        }
        if ($request->has('hari_khusus')) {
            $days = $request->hari_khusus;
            $recipes->whereHas("hari_resep", function ($query) use ($days) {
                $query->whereIn('nama', $days);
            });
        }
        if ($request->has('jenis_makanan')) {
            $categories_foods = $request->jenis_makanan;
            $recipes->whereHas("kategori_resep", function ($query) use ($categories_foods) {
                $query->whereIn('nama_makanan', $categories_foods);
            });
        }
        $recipes->paginate(6);
        return view('template.resep', compact('messageCount', 'toolsCooks', 'footer', 'special_day', 'categories_foods_all', 'categories_ingredients', 'recipes', 'notification', 'unreadNotificationCount', 'userLogin', 'favorite'));
    }
    public function filter_kursus(Request $request)
    {
        $userLogin = Auth::user();
        $notification = [];
        $favorite = [];
        $footer = footer::first();
        $unreadNotificationCount = [];
        $messageCount = [];
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
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
        // validasi filter
        $validator  = Validator::make($request->all(), [
            'min_price' => 'lte:max_price|required_with:max_price',
            'max_price' => 'required_with:min_price',
            'min_time' => 'lte:max_time|required_with:max_time',
            'max_time' => 'required_with:min_time'
        ], [
            'min_price.lte' => 'Minimal harga tidak boleh melebihi maksimal harga!',
            'min_time.lte' => 'Minimal waktu tidak boleh melebihi maksimal waktu!',
            'min_price.required_with' => "Maksimal harga harus terisi!",
            "max_price.required_with" => "Minimal harga harus terisi!",
            "min_time.required_with" => "Maksimal waktu harus terisi!",
            "max_time.required_with" => "Minimal waktu harus terisi!"
        ]);
        if ($validator->fails()) {
            //return redirect()->back()->withErrors($validator);
            return redirect('resep')->with('error', $validator->errors()->all());
        }
        $kursus_terbaru = kursus::query();
        $kursus_terbaru->where('status', 'diterima')->whereDate('waktu_diterima', today());
        $semua_kursus = kursus::query();
        $semua_kursus->where('status', 'diterima');
        if ($request->has('cari_nama_kursus')) {
            $semua_kursus->where('nama_kursus', 'like', '%' . $request->cari_nama_kursus . '%');
            $kursus_terbaru->where('nama_kursus', 'like', '%' . $request->cari_nama_kursus . '%');
        }
        if ($request->has('jenis_kursus')) {
            $jenis_kursuses = $request->jenis_kursus;
            $semua_kursus->whereHas('jenis_kursus', function ($q) use ($jenis_kursuses) {
                $q->whereIn('jenis_kursus', $jenis_kursuses);
            });
            $kursus_terbaru->whereHas('jenis_kursus', function ($q) use ($jenis_kursuses) {
                $q->whereIn('jenis_kursus', $jenis_kursuses);
            });
        }
        if ($request->has('min_price') != NULL && $request->has('max_price') != NULL) {
            $minprice = str_replace(['.', ','], '', $request->min_price);
            $maxprice = str_replace(['.', ','], '', $request->max_price);
            $min_price = (int)$minprice;
            $max_price = (int)$maxprice;
            $kursus_terbaru->whereBetween('tarif_per_jam', [$min_price, $max_price]);
            $semua_kursus->whereBetween('tarif_per_jam', [$min_price, $max_price]);
        }
        $kursus_terbaru = $kursus_terbaru->get();
        $semua_kursus = $semua_kursus->get();
        $jenis_kursus = jenis_kursuses::pluck('jenis_kursus')->unique();
        $provinsi = Province::pluck('name');
        $regency = Regency::pluck('name');
        $district = District::pluck('name');
        $village = Village::pluck('name');
        $lokasi_kursus = kursus::all()->map(function ($posisi) {
            return [
                'latitude' => $posisi->latitude,
                'longitude' => $posisi->longitude,
                'id_kursus' => $posisi->id,
                'nama_kursus' => $posisi->nama_kursus
            ];
        });
        return view('template.kursus', compact('semua_kursus', 'district', 'village', 'regency', 'provinsi', 'jenis_kursus', 'lokasi_kursus', 'kursus_terbaru', 'messageCount', 'notification', 'footer', 'unreadNotificationCount', 'userLogin', 'favorite'));
    }
}
