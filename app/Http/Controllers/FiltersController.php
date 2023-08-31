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

use function Laravel\Prompts\search;

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
        if ($request->has('nama_resep')) {
            $recipes = reseps::where('nama_resep', 'like', '%' . $request->nama_resep . '%')->paginate(6);
        } else {
            $recipes = reseps::paginate(6);
        }
        /* proses filter lanjutan resep
        $recipes = reseps::query();
        if ($request->has('nama_resep')) {
            $recipes->where('nama_resep', 'like', '%' . $request->nama_resep . '%');
            if ($request->has('min_price') != NULL && $request->has('max_price') != NULL) {
                $minprice = str_replace(['.', ','], '', $request->min_price);
                $maxprice = str_replace(['.', ','], '', $request->max_price);
                $min_price = (int)$minprice;
                $max_price = (int)$maxprice;
                $recipes->whereBetween("pengeluaran_memasak", [$min_price, $max_price]);

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
                $recipes->whereBetween('lama_memasak', [$min, $max]);
            }
            if ($request->has('ingredients')) {
                $ingredients = $request->ingredients;
                $recipes->whereHas('bahan', function ($query) use ($ingredients) {
                    $query->whereIn("nama_bahan", $ingredients);
                });
            }
            if ($request->has('alat')) {
                $tools = $request->alat;
                $recipes->whereHas('alat', function ($query) use ($tools) {
                    $query->whereIn("nama_alat", $tools);
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
        } 
             if ($request->has('min_price') != NULL && $request->has('max_price') != NULL) {
                $minprice = str_replace(['.', ','], '', $request->min_price);
                $maxprice = str_replace(['.', ','], '', $request->max_price);
                $min_price = (int)$minprice;
                $max_price = (int)$maxprice;
                $recipes->whereBetween("pengeluaran_memasak", [$min_price, $max_price]);

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
                $recipes->whereBetween('lama_memasak', [$min, $max]);
            }
            if ($request->has('ingredients')) {
                $ingredients = $request->ingredients;
                $recipes->whereHas('bahan', function ($query) use ($ingredients) {
                    $query->whereIn("nama_bahan", $ingredients);
                });
            }
            if ($request->has('alat')) {
                $tools = $request->alat;
                $recipes->whereHas('alat', function ($query) use ($tools) {
                    $query->whereIn("nama_alat", $tools);
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
            $recipes->paginate(6); */


        return view('template.resep', compact('toolsCooks', 'special_day', 'categories_foods_all', 'categories_ingredients', 'recipes', 'notification', 'unreadNotificationCount', 'userLogin', 'favorite'));
    }
    public function filter_resep(Request $request)
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
        if ($request->has('min_price') != NULL && $request->has('max_price') != NULL) {
            $minprice = str_replace(['.', ','], '', $request->min_price);
            $maxprice = str_replace(['.', ','], '', $request->max_price);
            $min_price = (int)$minprice;
            $max_price = (int)$maxprice;
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
        }
        if ($request->has('alat')) {
            $tools = $request->alat;
        }
        if ($request->has('nama_resep')) {
            $recipes = reseps::query()
                ->where("nama_resep", "like", "%" . $request->nama_resep . "%")
                ->whereBetween('pengeluaran_memasak', [$min_price, $max_price])
                ->whereBetween('lama_memasak', [$min, $max])
                ->whereHas('alat', function ($query) use ($tools) {
                    $query->whereIn('nama_alat', $tools);
                })
                ->paginate(6);
        } else {
            $recipes = reseps::query()
                ->whereBetween('pengeluaran_memasak', [$min_price, $max_price])
                ->whereBetween('lama_memasak', [$min, $max])
                ->whereHas('alat', function ($query) use ($tools) {
                    $query->whereIn('nama_alat', $tools);
                })
                ->paginate(6);
        }
        //$recipes->paginate(6);
        return view('template.resep', compact('toolsCooks', 'special_day', 'categories_foods_all', 'categories_ingredients', 'recipes', 'notification', 'unreadNotificationCount', 'userLogin', 'favorite'));
    }
}
