<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\reseps;
use App\Models\notifications;
use App\Models\favorite;

class FiltersController extends Controller
{
    public function resep_index()
    {
        $userLogin = Auth::user();
        $userLogin = Auth::user();
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
        $recipes = reseps::paginate(6);
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
        return view('template.resep', compact('recipes', 'notification', 'unreadNotificationCount', 'userLogin', 'favorite'));
    }
    public function filter_resep_action(Request $request)
    {
        $userLogin = Auth::user();
        $userLogin = Auth::user();
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
        $recipes = reseps::paginate(6);
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
        return view('template.resep', compact('recipes', 'notification', 'unreadNotificationCount', 'userLogin', 'favorite'));
    }
}
