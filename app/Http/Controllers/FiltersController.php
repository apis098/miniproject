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
        $tools = toolsCooks::all();
        $categories_foods = kategori_makanan::all();
        $categories_ingredients = bahan_reseps::pluck("nama_bahan")->unique();
        // proses filter lanjutan resep
        $recipes = reseps::paginate(6);
        if ($request->has('nama_resep')) {
            $recipes = [];
            $recipes = reseps::where('nama_resep', 'like', '%' . $request->nama_resep . '%')->paginate(6);
            if ($request->has('ingredients')) {
                $ingredients = $request->ingredients;
                $recipes = reseps::whereHas('bahan', function($query) use($ingredients){
                    $query->whereIn("nama_bahan", $ingredients);
                })->paginate(6);
            }
            if ($request->has('alat')) {
                $tools = $request->alat;
                $recipes = reseps::whereHas('alat', function($query) use($tools){
                    $query->whereIn("nama_alat", $tools);
                })->paginate(6);
            }
            if ($request->has('hari_khusus')) {
                $days = $request->hari_khusus;
                $recipes = reseps::whereHas("hari_resep", function($query) use($days){
                    $query->whereIn('nama', $days);
                })->paginate(6);
            }
            if ($request->has('jenis_makanan')) {
                $categories_foods = $request->jenis_makanan;
                $recipes = reseps::whereHas("kategori_resep", function($query) use($categories_foods) {
                    $query->whereIn('nama_makanan', $categories_foods);
                })->paginate(6);
            }
        } else {
            if ($request->has('ingredients')) {
                $ingredients = $request->ingredients;
                $recipes = reseps::whereHas('bahan', function($query) use($ingredients){
                    $query->whereIn("nama_bahan", $ingredients);
                })->paginate(6);
            }
            if ($request->has('alat')) {
                $tools = $request->alat;
                $recipes = reseps::whereHas('alat', function($query) use($tools){
                    $query->whereIn("nama_alat", $tools);
                })->paginate(6);
            }
            if ($request->has('hari_khusus')) {
                $days = $request->hari_khusus;
                $recipes = reseps::whereHas("hari_resep", function($query) use($days){
                    $query->whereIn('nama', $days);
                })->paginate(6);
            }
            if ($request->has('jenis_makanan')) {
                $categories_foods = $request->jenis_makanan;
                $recipes = reseps::whereHas("kategori_resep", function($query) use($categories_foods) {
                    $query->whereIn('nama_makanan', $categories_foods);
                })->paginate(6);
            }
        }
        return view('template.resep', compact('tools','special_day','categories_foods','categories_ingredients','recipes', 'notification', 'unreadNotificationCount', 'userLogin', 'favorite'));
    }
}
