<?php

namespace App\Http\Controllers;

use App\Models\basic_tips;
use App\Models\ChMessage;
use App\Models\comment_recipes;
use App\Models\favorite;
use App\Models\reseps;
use App\Models\seputar_dapur;
use App\Models\special_days;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\notifications;
use App\Models\footer;
use App\Models\like_comment_recipes;
use App\Models\ResepPremiums;
use App\Models\User;

class artikels extends Controller
{
    public function artikel_resep(string $id, string $judul)
    {
        // check isPremium
        $r = reseps::find($id);
        $isPremium = $r->isPremium;
        if ($isPremium == "yes") {
            $Premium = true;
        } elseif($isPremium == "no") {
            $Premium = false;
        }
        $idAdmin = User::where('role', 'admin')->first();
        $userLogin = Auth::user();
        // untuk user belum login
        $userLog = 1;
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
        $admin = false;
        $messageCount = [];
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
        if ($userLogin) {
            $id_user = Auth::user()->id;
            $id_admin = User::where("role", "admin")->first();
            if ($id_user == $id_admin->id) {
                $admin = true;
            } 
            $notification = notifications::where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'desc') // Urutkan notifikasi berdasarkan created_at terbaru
                ->paginate(10); // Paginasi notifikasi dengan 10 item per halaman
            $unreadNotificationCount = notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
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
        $comment = $show_resep->comment_recipes->sortByDesc('likes');
        $comment_count = $comment->count();
        return view('template.artikel', compact('Premium','idAdmin','messageCount','admin', 'comment','comment_count', 'show_resep', 'footer', 'userLog', 'notification', 'unreadNotificationCount', 'userLogin', 'favorite'));
    }
}
