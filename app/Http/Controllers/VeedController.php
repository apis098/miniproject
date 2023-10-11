<?php

namespace App\Http\Controllers;

use App\Models\ChMessage;
use App\Models\comment_veed;
use App\Models\like_comment_veed;
use App\Models\Share;
use App\Models\upload_video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\notifications;
use App\Models\favorite;
use App\Models\followers;
use App\Models\footer;
use App\Models\like_reply_comment_veed;
use App\Models\like_veed;
use App\Models\Reply;
use App\Models\reply_comment_veed;
use App\Models\reseps;
use Flasher\Prime\EventDispatcher\Event\ResponseEvent;

use function Laravel\Prompts\alert;

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
        $allUser = User::where('role', 'koki')->whereNot('id', auth()->user())->get();
        $top_users = User::has("followers")->orderBy("followers", "desc")->take(5)->get();
        // $resep = reseps::where('user_id',$top_users->id)->count();
        // dd($resep);
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
            // $user_following = followers::where('follower_id', auth()->user()->id)->get();
        }
        if ($userLogin) {
            $id_user = Auth::user()->id;
            $id_admin = User::where("role", "admin")->first();
            if ($id_user == $id_admin->id) {
                $admin = true;
            }
            $notification = notifications::where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $unreadNotificationCount = notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
            $userLog = 2;
        }
        if ($userLogin) {
            $favorite = favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        $footer = footer::first();

        $video_pembelajaran = upload_video::inRandomOrder()->get();

        $reply_comment_veed = reply_comment_veed::latest()->get();
        // $tripay = new TripayPaymentController();
        // $channels = $tripay->getPaymentChannels();

        return view("template.veed", compact("top_users", "messageCount", "allUser", "reply_comment_veed", "video_pembelajaran", "notification", "footer", "favorite", "unreadNotificationCount", "userLogin"));
    }
    public function detailVeed($id)
    {
        $userLogin = Auth::user();
        // untuk user belum login
        $userLog = 1;
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
        $admin = false;
        $messageCount = [];
        $user_following = [];
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
            $user_following = followers::where('follower_id', auth()->user()->id)->get();
        }
        if ($userLogin) {
            $id_user = Auth::user()->id;
            $id_admin = User::where("role", "admin")->first();
            if ($id_user == $id_admin->id) {
                $admin = true;
            }
            $notification = notifications::where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $unreadNotificationCount = notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
            $userLog = 2;
        }
        if ($userLogin) {
            $favorite = favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        $footer = footer::first();

        $item_video = upload_video::findOrFail($id);

        $reply_comment_veed = reply_comment_veed::latest()->get();

        // $tripay = new TripayPaymentController();
        // $channels = $tripay->getPaymentChannels();

        return view("template.detailVeed", compact("messageCount", "user_following", "reply_comment_veed", "item_video", "notification", "footer", "favorite", "unreadNotificationCount", "userLogin"));
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
    public function komentar_veed(Request $request, string $pengirim_id, string $penerima_id, string $veed_id)
    {
        $new = comment_veed::create([
            "pengirim_id" => $pengirim_id,
            "penerima_id" => $penerima_id,
            "veed_id" => $veed_id,
            "komentar" => $request->commentVeed
        ]);

        $comment_veed = comment_veed::find($new->id);
        $pengirim_veed = User::find($pengirim_id);
        $jumlah_like_veed = like_comment_veed::query()
        ->where('comment_veed_id', $comment_veed->id)
        ->where('veed_id', $veed_id)
        ->count();
        $time =  \Carbon\Carbon::parse($comment_veed->created_at)->locale('id_ID')->diffForHumans();
        return response()->json([
            "success" => true,
            "message" => "Anda berhasil memberi komentar!",
            "up" => $comment_veed,
            "pengirim" => $pengirim_veed,
            "jumlah_like_veed" => $jumlah_like_veed,
            "veed_id" => $veed_id,
            "time" => $time,
        ]);
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
        $item_comment = reply_comment_veed::where('comment_id', $comment_id)->first();
        $up = $item_comment->reply_comment_veed;
        if ($store_comment) {
            return response()->json([
                "success" => true,
                "message" => "Sukses membalas komentar!",
                "update" => $up
            ]);
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
                ->where('reply_comment_veed_id', $reply_comment_id)
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
                ->where('reply_comment_veed_id', $reply_comment_id)
                ->count();
            return response()->json([
                "success" => true,
                "message" => "Sukses membatalkan like!",
                "like" => false,
                "countLike" => $countLike
            ]);
        }
    }
    public function hapus_komentar_feed(string $id)
    {
        $COMMENT = comment_veed::find($id);
        $COMMENT->delete();
        return redirect()->back()->with('success', 'sukses menghapus komentar feed!');
    }
    public function hapus_balasan_komentar_feed(string $id)
    {
        $reply_comment = reply_comment_veed::find($id);
        $reply_comment->delete();
        return redirect()->back()->with('success', 'sukses menghapus balasan komentar feed!');
    }
    public function shareVeed(Request $request, $id)
    {
        if (Auth::check()) {
            $userIds = $request->input('user_id', []); // Mendapatkan array user_id yang dicentang

            foreach ($userIds as $userId) {
                // insert data share
                $data = new Share();
                $data->user_id = $userId;
                $data->sender_id = auth()->user()->id;
                $data->feed_id = $id;
                $data->save();
                // insert data notifikasi
                $notification = new notifications();
                $notification->user_id = $userId;
                $notification->notification_from = auth()->user()->id;
                $notification->veed_id = $id;
                $notification->share_id = $data->id;
                $notification->save();
            }

            return redirect()->back()->with('success', 'Konten yang anda bagikan telah terkirim!');
        } else {
            return redirect()->back()->with('error', 'Silahkan login terlebih dahulu');
        }
    }
}
