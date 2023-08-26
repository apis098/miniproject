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
        $recipes = reseps::paginate(6);
        if ($request->has('nama_resep')) {
            $recipes = reseps::where('nama_resep', 'like', '%' . $request->nama_resep . '%')->paginate(6);
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
        $special_day = special_days::all();
        $tools = toolsCooks::all();
        $categories_foods = kategori_makanan::all();
        $categories_ingredients = bahan_reseps::pluck("nama_bahan")->unique();
        return view('template.resep', compact('tools','special_day','categories_foods','categories_ingredients','recipes', 'notification', 'unreadNotificationCount', 'userLogin', 'favorite'));
    }
}
