<?php

namespace App\Http\Controllers;

use App\Models\basic_tips;
use App\Models\favorite;
use App\Models\reseps;
use App\Models\seputar_dapur;
use App\Models\special_days;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\notifications;
use App\Models\footer;

class artikels extends Controller
{
    public function artikel_resep(string $id, string $judul)
    {
        $userLogin = Auth::user();
        // untuk user belum login
        $userLog = 1;
        $notification = [];
        $favorite = [];
        $unreadNotificationCount=[];
        if ($userLogin) {
            $notification = notifications::where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'desc') // Urutkan notifikasi berdasarkan created_at terbaru
                ->paginate(10); // Paginasi notifikasi dengan 10 item per halaman
                $unreadNotificationCount = notifications::where('user_id',auth()->user()->id)->where('status', 'belum')->count();
                // jika user sudah login
                $userLog = 2;
        }
        if ($userLogin) {
            $favorite = favorite::where('user_id_from', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        }
        $footer = footer::first();
        $show_resep = reseps::find($id);
        return view('template.artikel', compact('show_resep', 'footer','userLog','notification','unreadNotificationCount','userLogin','favorite'));
    }
}
