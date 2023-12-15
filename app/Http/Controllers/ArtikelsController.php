<?php

namespace App\Http\Controllers;

use App\Events\ShowRecipePremium;
use App\Models\ChMessage;
use App\Models\CommentResipes;
use App\Models\Favorite;
use App\Models\Reseps;
use App\Models\SpecialDays;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notifications;
use App\Models\Footer;
use App\Models\IncomeChefs;
use App\Models\LikeCommentRecips;
use App\Models\ResepPremiums;
use App\Models\Share;
use App\Models\TopUpCategories;
use App\Models\User;
use Carbon\Carbon;

class ArtikelsController extends Controller
{
    public function artikel_resep(string $id, string $judul)
    {
        // check isPremium
        $show_resep = Reseps::find($id);
        $r = Reseps::find($id);
        if($r->judul != $judul) {
            abort('404');
        }
        $isPremium = $r->isPremium;
        if ($isPremium == "yes") {
            event(new ShowRecipePremium(Auth::user()->id, $r->user->id, $id, "resep"));
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
        $gift_check = 0;
        $gift_count = 0;
        $share_check = 0;
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
        if ($userLogin) {
            $id_user = Auth::user()->id;
            $id_admin = User::where("role", "admin")->first();
            if ($id_user == $id_admin->id) {
                $admin = true;
            }
            $notification = Notifications::where('user_id', auth()->user()->id)
            ->where('status','belum')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            $unreadNotificationCount = Notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
            // jika user sudah login
            $userLog = 2;
            $gift_check = IncomeChefs::where('user_id',auth()->user()->id)->where('resep_id',$show_resep->id)->whereNot('status','sawer')->count();
            $gift_count = IncomeChefs::where('resep_id',$show_resep->id)->where('status','sawer')->count();
            $share_check = Share::where('sender_id',auth()->user()->id)->where('resep_id',$show_resep->id)->count();
        }
        if ($userLogin) {
            $favorite = Favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        $footer = Footer::first();
        $comment = $show_resep->comment_recipes->sortByDesc('likes');
        $comment_count = $comment->count();
        $categorytopup  =  TopUpCategories::all();
        $allUser = User::where('role', 'koki')->whereNot('id', auth()->user())->get();
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
        return view('template.artikel', compact('share_check','gift_check','gift_count','allUser','categorytopup','Premium','idAdmin','messageCount','admin', 'comment','comment_count', 'show_resep', 'footer', 'userLog', 'notification', 'unreadNotificationCount', 'userLogin', 'favorite'));
    }
}
