<?php

namespace App\Http\Controllers;

use App\Models\ChMessage;
use App\Models\comment_veed;
use App\Models\like_comment_veed;
use App\Models\upload_video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\notifications;
use App\Models\favorite;
use App\Models\footer;
use App\Models\like_reply_comment_veed;
use App\Models\like_veed;
use App\Models\reply_comment_veed;
use Flasher\Prime\EventDispatcher\Event\ResponseEvent;

class VeedController extends Controller
{
    public function index()
    {
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

        $video_pembelajaran = upload_video::latest()->get();

        $reply_comment_veed = reply_comment_veed::latest()->get();
        return view("template.veed", compact("messageCount", "reply_comment_veed", "video_pembelajaran", "notification", "footer", "favorite", "unreadNotificationCount", "userLogin"));
    }

    public function sukai_veed(string $user_id, string $veed_id)
    {
        $cek = like_veed::where("users_id", $user_id)->where("veed_id", $veed_id)->count();

        if ($cek == 0) {
            like_veed::create([
                "users_id" => $user_id,
                "veed_id" => $veed_id
            ]);
            $isLikeVeed = \App\Models\like_veed::query()
                ->where('users_id', Auth::user()->id)
                ->where('veed_id', $veed_id)
                ->count();
            $countLikeFeed = like_veed::where("veed_id", $veed_id)->count();
            return response()->json([
                "success" => true,
                "message" => "Sukses memberi like!",
                'like' => true,
                'is' => $isLikeVeed,
                'count' => $countLikeFeed
            ]);
        } elseif ($cek == 1) {
            like_veed::where("users_id", $user_id)->where("veed_id", $veed_id)->delete();
            $isLikeVeed = \App\Models\like_veed::query()
                ->where('users_id', Auth::user()->id)
                ->where('veed_id', $veed_id)
                ->count();
            $countLikeFeed = like_veed::where("veed_id", $veed_id)->count();
            return response()->json([
                "success" => true,
                "message" => "Sukses membatalkan like!",
                'like' => false,
                'is' => $isLikeVeed,
                'count' => $countLikeFeed
            ]);
        }
    }
    public function komentar_veed(Request $request, string $user_id, string $veed_id)
    {
        $store_comment = comment_veed::create([
            "users_id" => $user_id,
            "veed_id" => $veed_id,
            "komentar" => $request->commentVeed
        ]);
        $item_video = upload_video::where('id', $veed_id)->first();
        $update = $item_video->comment_veed;
        if ($store_comment) {
            //return redirect()->back()->with('success', 'Sukses mengirim komentar!');
            return response()->json([
                "success" => true,
                "message" => "Anda berhasil memberi komentar!",
                "update" => $update
            ]);
        }
    }
    public function like_komentar_veed(string $user_id, string $komentar_veed_id, string $veed_id)
    {
        $isLike = like_comment_veed::query();
        $isLike->where("users_id", $user_id);
        $isLike->where("comment_veed_id", $komentar_veed_id);
        $isLike->where("veed_id", $veed_id);
        $countIsLike = $isLike->count();
        if ($countIsLike == 0) {
            $store_like = like_comment_veed::create([
                "users_id" => $user_id,
                "comment_veed_id" => $komentar_veed_id,
                "veed_id" => $veed_id
            ]);
            // mendapatkan jumlah like tiap komentar
            $countLike = \App\Models\like_comment_veed::query()
                ->where('comment_veed_id', $komentar_veed_id)
                ->where('veed_id', $veed_id)
                ->count();
            return response()->json([
                "success" => true,
                "message" => "Anda berhasil mengirimkan like!",
                "like" => true,
                "count" => $countLike
            ]);
        } elseif ($countIsLike == 1) {
            $isLike->delete();
            // mendapatkan jumlah like tiap komentar
            $countLike = \App\Models\like_comment_veed::query()
                ->where('comment_veed_id', $komentar_veed_id)
                ->where('veed_id', $veed_id)
                ->count();
            return response()->json([
                "success" => true,
                "message" => "Anda berhasil membatalkan memberi like!",
                "like" => false,
                "count" => $countLike
            ]);
        }
    }
    public function balas_komentar_veed(Request $request, string $users_id, string $comment_id, string $veed_id)
    {
        $store_comment = reply_comment_veed::create([
            "users_id" => $users_id,
            "comment_id" => $comment_id,
            "veed_id" => $veed_id,
            "komentar" => $request->komentarBalasan
        ]);
        if ($store_comment) {
            /*return response()->json([
                "success" => true,
                "message" => "Sukses membalas komentar!"
            ]);*/
            return redirect()->back()->with("success", "Sukses membalas komentar!");
        }
    }
    public function sukai_balasan_komentar_veed(string $user_id, string $reply_comment_id, $veed_id)
    {
        $check = like_reply_comment_veed::where("users_id", $user_id)
            ->where("reply_comment_veed_id", $reply_comment_id)
            ->where("veed_id", $veed_id)
            ->count();
        if ($check == 0) {
            like_reply_comment_veed::create([
                "users_id" => $user_id,
                "reply_comment_veed_id" => $reply_comment_id,
                "veed_id" => $veed_id
            ]);
            $countLike = like_reply_comment_veed::query()
             ->where('users_id', $user_id)
             ->where('veed_id', $veed_id)
             ->count();
            return response()->json([
                "success" => true,
                "message" => "Sukses memberikan like!",
                "like" => true,
                "countLike" => $countLike
            ]);
        } elseif ($check == 1) {
            like_reply_comment_veed::where("users_id", $user_id)
                ->where("reply_comment_veed_id", $reply_comment_id)
                ->where("veed_id", $veed_id)
                ->delete();
            $countLike = like_reply_comment_veed::query()
             ->where('users_id', $user_id)
             ->where('veed_id', $veed_id)
             ->count();
            return response()->json([
                "success" => true,
                "message" => "Sukses membatalkan like!",
                "like" => false,
                "countLike" => $countLike
            ]);
        }
    }
}
