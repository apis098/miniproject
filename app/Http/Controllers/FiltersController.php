<?php

namespace App\Http\Controllers;

use App\Models\BahanReseps;
use App\Models\User;
use App\Models\ChMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reseps;
use App\Models\Notifications;
use App\Models\Favorite;
use App\Models\Footer;
use App\Models\KategoriMakanan;
use App\Models\SpecialDays;
use App\Models\ToolsCooks;
use Illuminate\Support\Facades\Validator;
use App\Models\kursus;
use App\Models\District;
use App\Models\jenis_kursuses;
use App\Models\Province;
use App\Models\Village;
use App\Models\Regency;
use App\Models\TopUpCategories;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FiltersController extends Controller
{
    public function resep_index(Request $request)
    {
        $userLogin = Auth::user();
        $notification = [];
        $favorite = [];
        $footer = Footer::first();
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
        // memberikan data untuk filter lanjutan resep
        $special_day = SpecialDays::all();
        $toolcook = ToolsCooks::all();
        $toolsCooks = $toolcook->unique("nama_alat");
        $categories_foods_all = KategoriMakanan::all();
        $categories_ingredients = BahanReseps::pluck("nama_bahan")->unique();
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
        $recipess = Reseps::query();
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
        $recipes = $recipess->inRandomOrder()->paginate(4);
        //dd($recipes);
   // mengecek apakah koki berlangganan sudah habis atau belum masa berlangganannya,
   if (Auth::user()) {
    if(auth()->user()->status_langganan == "sedang berlangganan") {
        $tanggal_berakhir_langganan = Carbon::parse(auth()->user()->akhir_langganan);
        $tanggal_saat_ini = Carbon::now();
        if($tanggal_saat_ini->gt($tanggal_berakhir_langganan)) {
            $update_status = User::find(auth()->user()->id);
            $update_status->status_langganan = "belum berlangganan";
            $update_status->awal_langganan = null;
            $update_status->akhir_langganan = null;
            $update_status->save();
        }
    }
}
        return view('template.resep', compact('categorytopup','toolsCooks', 'messageCount', 'special_day', 'footer', 'categories_foods_all', 'categories_ingredients', 'recipes', 'notification', 'unreadNotificationCount', 'userLogin', 'favorite'));
    }
    public function filter_resep(Request $request)
    {
        $userLogin = Auth::user();
        $notification = [];
        $favorite = [];
        $footer = Footer::first();
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
        // memberikan data untuk filter lanjutan resep
        $special_day = SpecialDays::all();
        $toolcook = ToolsCooks::all();
        $toolsCooks = $toolcook->unique("nama_alat");
        $categories_foods_all = KategoriMakanan::all();
        $categories_ingredients = BahanReseps::pluck("nama_bahan")->unique();
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
        //$recipes = Reseps::query();
        $min_price = null;
        $max_price = null;
        $min = null;
        $max = null;
        $tools = null;
        $ingredients = null;
        $days = [];
        $categories_foods = [];
        $recipes = Reseps::query();
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
           // mengecek apakah koki berlangganan sudah habis atau belum masa berlangganannya,
           if (Auth::user()) {
            if(auth()->user()->status_langganan == "sedang berlangganan") {
                $tanggal_berakhir_langganan = Carbon::parse(auth()->user()->akhir_langganan);
                $tanggal_saat_ini = Carbon::now();
                if($tanggal_saat_ini->gt($tanggal_berakhir_langganan)) {
                    $update_status = User::find(auth()->user()->id);
                    $update_status->status_langganan = "belum berlangganan";
                    $update_status->awal_langganan = null;
                    $update_status->akhir_langganan = null;
                    $update_status->save();
                }
            }
        }
        return view('template.resep', compact('categorytopup','messageCount', 'toolsCooks', 'footer', 'special_day', 'categories_foods_all', 'categories_ingredients', 'recipes', 'notification', 'unreadNotificationCount', 'userLogin', 'favorite'));
    }
}
