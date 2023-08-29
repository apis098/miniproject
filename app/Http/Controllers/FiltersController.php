<?php

namespace App\Http\Controllers;

use App\Models\bahan_reseps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\reseps;
use App\Models\notifications;
use App\Models\favorite;
use App\Models\kategori_makanan;
use App\Models\kategori_reseps;
use App\Models\special_days;
use App\Models\toolsCooks;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FiltersController extends Controller
{
    public function resep_index(Request $request)
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
        // memberikan data untuk filter lanjutan resep
        $special_day = special_days::all();
        $toolcook = toolsCooks::all();
        $toolsCooks = $toolcook->unique();
        $categories_foods_all = kategori_makanan::all();
        $categories_ingredients = bahan_reseps::pluck("nama_bahan")->unique();
        // validasi filter
        $validator  = Validator::make($request->all(), [
            'min_price' => 'lte:max_price',
            'min_time' => 'lte:max_time'
        ], [
            'min_price.lte' => 'Minimal harga tidak boleh melebihi maksimal harga!',
            'min_time.lte' => 'Minimal waktu tidak boleh melebihi maksimal waktu!'
        ]);
        if($validator->fails()) {
            //return redirect()->back()->withErrors($validator);
            return redirect()->back()->with(['error', $validator->errors()]);

        }
        // proses filter lanjutan resep\
        $recipes = reseps::paginate(6);

        if ($request->has('nama_resep')) {
            $recipes = reseps::where('nama_resep', 'like', '%' . $request->nama_resep . '%')->paginate(6);
            if ($request->has('min_price') != NULL && $request->has('max_price') != NULL) {
                $minprice = str_replace(['.', ','], '', $request->min_price);
                $maxprice = str_replace(['.', ','], '', $request->max_price);
                $min_price = (int)$minprice;
                $max_price = (int)$maxprice;
                $recipes = reseps::whereBetween("pengeluaran_memasak", [$min_price, $max_price])->paginate(6);

            }
            if ($request->min_time && $request->max_time) {
                $min = $request->min_time;
                if ($request->min_timer === 'jam') {
                    $min*=60;
                }
                $max = $request->max_time;
                if ($request->max_timer === 'jam') {
                    $max*=60;
                }
                $recipes = reseps::whereBetween('lama_memasak', [$min, $max])->paginate(6);
            }
            if ($request->has('ingredients')) {
                $ingredients = $request->ingredients;
                $recipes = reseps::whereHas('bahan', function ($query) use ($ingredients) {
                    $query->whereIn("nama_bahan", $ingredients);
                })->paginate(6);
            }
            if ($request->has('alat')) {
                $tools = $request->alat;
                $recipes = reseps::whereHas('alat', function ($query) use ($tools) {
                    $query->whereIn("nama_alat", $tools);
                })->paginate(6);
            }
            if ($request->has('hari_khusus')) {
                $days = $request->hari_khusus;
                $recipes = reseps::whereHas("hari_resep", function ($query) use ($days) {
                    $query->whereIn('nama', $days);
                })->paginate(6);
            }
            if ($request->has('jenis_makanan')) {
                $categories_foods = $request->jenis_makanan;
                $recipes = reseps::whereHas("kategori_resep", function ($query) use ($categories_foods) {
                    $query->whereIn('nama_makanan', $categories_foods);
                })->paginate(6);
            }
        } else {
             if ($request->has('min_price') != NULL && $request->has('max_price') != NULL) {
                $minprice = str_replace(['.', ','], '', $request->min_price);
                $maxprice = str_replace(['.', ','], '', $request->max_price);
                $min_price = (int)$minprice;
                $max_price = (int)$maxprice;
                $recipes = reseps::whereBetween("pengeluaran_memasak", [$min_price, $max_price])->paginate(6);

            }
            if ($request->min_time && $request->max_time) {
                $min = $request->min_time;
                if ($request->min_timer === 'jam') {
                    $min*=60;
                }
                $max = $request->max_time;
                if ($request->max_timer === 'jam') {
                    $max*=60;
                }
                $recipes = reseps::whereBetween('lama_memasak', [$min, $max])->paginate(6);
            }
            if ($request->has('ingredients')) {
                $ingredients = $request->ingredients;
                $recipes = reseps::whereHas('bahan', function ($query) use ($ingredients) {
                    $query->whereIn("nama_bahan", $ingredients);
                })->paginate(6);
            }
            if ($request->has('alat')) {
                $tools = $request->alat;
                $recipes = reseps::whereHas('alat', function ($query) use ($tools) {
                    $query->whereIn("nama_alat", $tools);
                })->paginate(6);
            }
            if ($request->has('hari_khusus')) {
                $days = $request->hari_khusus;
                $recipes = reseps::whereHas("hari_resep", function ($query) use ($days) {
                    $query->whereIn('nama', $days);
                })->paginate(6);
            }
            if ($request->has('jenis_makanan')) {
                $categories_foods = $request->jenis_makanan;
                $recipes = reseps::whereHas("kategori_resep", function ($query) use ($categories_foods) {
                    $query->whereIn('nama_makanan', $categories_foods);
                })->paginate(6);
            }
        }

        return view('template.resep', compact('toolsCooks', 'special_day', 'categories_foods_all', 'categories_ingredients', 'recipes', 'notification', 'unreadNotificationCount', 'userLogin', 'favorite'));
    }
}
