<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\BalasReplyCommentfeeds;
use App\Models\ChMessage;
use App\Models\CommentFeed;
use App\Models\LikeCommentFeed;
use App\Models\Share;
use App\Models\UploadVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Notifications;
use App\Models\Favorite;
use App\Models\Followers;
use App\Models\Footer;
use App\Models\IncomeChefs;
use App\Models\Kursus;
use App\Models\LikeReplyCommentFeed;
use App\Models\LikeFeed;
use App\Models\LikeBalasReplyCommentFeeds;
// use App\Models\LikeReplyCommentFeed;
use App\Models\Reply;
use App\Models\ReplyCommentFeed;
use App\Models\Reseps;
use App\Models\TopUpCategories;
use Flasher\Prime\EventDispatcher\Event\ResponseEvent;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

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
        $categorytopup  =  TopUpCategories::all();
        $admin = false;
        $recipes = Reseps::latest()->paginate(5);
        $course = Kursus::latest()->paginate(5);
        $messageCount = [];
        $income =[];
        $allUser = User::where('role', 'koki')->whereNot('id', auth()->user())->get();
        $top_users = User::has("followers")->orderBy("followers", "desc")->take(5)->get();
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
        if ($userLogin) {
            $video_pembelajaran = UploadVideo::inRandomOrder()->get();
            $income = IncomeChefs::select('feed_id', DB::raw('SUM(pemasukan) as total_income'))
            ->where('status', 'sawer')
            ->where('chef_id', auth()->user()->id)
            ->groupBy('feed_id')
            ->get();

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
            $userLog = 2;
        }
        if ($userLogin) {
            $favorite = Favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        $footer = Footer::first();

        $video_pembelajaran = UploadVideo::inRandomOrder()->get();
        $reply_comment_veed = ReplyCommentFeed::latest()->get();
        // $tripay = new TripayPaymentController();
        // $channels = $tripay->getPaymentChannels();
        $count_comment = CommentFeed::count();
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
        return view("template.veed", compact('income','course','recipes','categorytopup',"count_comment","top_users", "messageCount", "allUser", "reply_comment_veed", "video_pembelajaran", "notification", "footer", "favorite", "unreadNotificationCount", "userLogin"));
    }
    public function detailVeed($id)
    {
        $userLogin = Auth::user();
        // untuk user belum login
        $userLog = 1;
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
        $categorytopup  =  TopUpCategories::all();
        $admin = false;
        $messageCount = [];
        $user_following = [];
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
            $user_following = Followers::where('follower_id', auth()->user()->id)->get();
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
            $userLog = 2;
        }
        if ($userLogin) {
            $favorite = Favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        $footer = Footer::first();

        $item_video = UploadVideo::findOrFail($id);

        $reply_comment_veed = ReplyCommentFeed::latest()->get();

        // $tripay = new TripayPaymentController();
        // $channels = $tripay->getPaymentChannels();

        return view("template.detailVeed", compact('categorytopup',"messageCount", "user_following", "reply_comment_veed", "item_video", "notification", "footer", "favorite", "unreadNotificationCount", "userLogin"));
    }
    public function sukai_veed(string $user_id, string $veed_id)
    {
        $cek = LikeFeed::where("users_id", $user_id)->where("veed_id", $veed_id)->count();
        $feed = UploadVideo::findOrFail($veed_id);
        if ($cek == 0) {
            $like = new LikeFeed();
            $like->users_id = $user_id;
            $like->veed_id = $veed_id;
            $like->save();

            if($feed->users_id != Auth::user()->id){
                $notification = new Notifications();
                $notification->user_id = $feed->users_id;
                $notification->notification_from = auth()->user()->id;
                $notification->veed_id = $veed_id;
                $notification->categories = "like_veed";
                $notification->message = "Menyukai postingan anda";
                $notification->save();

                $let_route = Notifications::findOrFail($notification->id);
                $let_route->route = "/status-baca/shared-feed/" . $notification->id;
                $let_route->save();
            }

            $isLikeVeed = \App\Models\LikeFeed::query()
                ->where('users_id', Auth::user()->id)
                ->where('veed_id', $veed_id)
                ->count();
            $countLikeFeed = LikeFeed::where("veed_id", $veed_id)->count();
            return response()->json([
                "success" => true,
                "message" => "Sukses memberi like!",
                'like' => true,
                'is' => $isLikeVeed,
                'count' => $countLikeFeed
            ]);
        } elseif ($cek == 1) {
            LikeFeed::where("users_id", $user_id)->where("veed_id", $veed_id)->delete();
            $isLikeVeed = \App\Models\LikeFeed::query()
                ->where('users_id', Auth::user()->id)
                ->where('veed_id', $veed_id)
                ->count();
            $countLikeFeed = LikeFeed::where("veed_id", $veed_id)->count();
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
        $new = CommentFeed::create([
            "pengirim_id" => $pengirim_id,
            "penerima_id" => $penerima_id,
            "veed_id" => $veed_id,
            "komentar" => $request->commentVeed
        ]);
        $data_sender = User::findOrFail($pengirim_id);
        if($penerima_id != Auth::user()->id){
            $notification = new Notifications();
            $notification->user_id = $penerima_id;
            $notification->notification_from = auth()->user()->id;
            $notification->veed_id = $veed_id;
            $notification->categories = "Komentar veed";
            $notification->message =  "Mengomentari postingan anda";
            $notification->save();

            $let_route = Notifications::findOrFail($notification->id);
            $let_route->route = "/status-baca/shared-feed/".$notification->id;
            $let_route->save();
        }
        $comment_veed = CommentFeed::findOrFail($new->id);
        $data_veed = UploadVideo::findOrFail($new->veed_id);
        $comment_count = $data_veed->countCommentFeed();
        $pengirim_veed = User::findOrFail($pengirim_id);
        $commentId = $comment_veed->id;
        $jumlah_like_veed = LikeCommentFeed::query()
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
            "veed_id" => $new->veed_id,
            "time" => $time,
            "commentId" => $commentId,
            "active" => true,
            "comment_count" => $comment_count,
        ]);
    }
    public function like_komentar_veed(string $user_id, string $komentar_veed_id, string $veed_id)
    {
        $isLike = LikeCommentFeed::query();
        $isLike->where("users_id", $user_id);
        $isLike->where("comment_veed_id", $komentar_veed_id);
        $isLike->where("veed_id", $veed_id);
        $countIsLike = $isLike->count();
        if ($countIsLike == 0) {
            $store_like = LikeCommentFeed::create([
                "users_id" => $user_id,
                "comment_veed_id" => $komentar_veed_id,
                "veed_id" => $veed_id
            ]);
            $comment = CommentFeed::findOrFail($komentar_veed_id);
            if($comment->pengirim_id != Auth::user()->id){
                $notification = new Notifications();
                $notification->user_id = $comment->pengirim_id;
                $notification->notification_from = auth()->user()->id;
                $notification->veed_id = $veed_id;
                $notification->categories = "like_veed";
                $notification->message = "Menyukai komentar anda";
                $notification->save();

                $let_route = Notifications::findOrFail($notification->id);
                $let_route->route = "/status-baca/shared-feed/" . $notification->id;
                $let_route->save();
            }
            // mendapatkan jumlah like tiap komentar
            $countLike = \App\Models\LikeCommentFeed::query()
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
            $countLike = \App\Models\LikeCommentFeed::query()
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
        $store_comment = ReplyCommentFeed::create([
            "users_id" => $users_id,
            "comment_id" => $comment_id,
            "veed_id" => $veed_id,
            "komentar" => $request->komentarBalasan
        ]);
        $comment = CommentFeed::findOrFail($comment_id);
        if($comment->pengirim_id != Auth::user()->id){
            $notification = new Notifications();
            $notification->user_id = $comment->pengirim_id;
            $notification->notification_from = auth()->user()->id;
            $notification->veed_id = $veed_id;
            $notification->categories = "reply_comment";
            $notification->message = "Membalas komentar anda";
            $notification->save();

            $let_route = Notifications::findOrFail($notification->id);
            $let_route->route = "/status-baca/shared-feed/" . $notification->id;
            $let_route->save();
        }
        $item_comment = ReplyCommentFeed::where('comment_id', $comment_id)->first();
        $dataReplies = ReplyCommentFeed::findOrFail($store_comment->id);
        $feed = UploadVideo::findOrFail($store_comment->veed_id);
        $comment_count = $feed->countCommentFeed();
        $jumlah_like_veed = LikeReplyCommentFeed::query();
        $user_sender = User::findOrFail(auth()->user()->id);
        $time =  \Carbon\Carbon::parse($dataReplies->created_at)->locale('id_ID')->diffForHumans();
        if ($store_comment) {
            return response()->json([
                "success" => true,
                "message" => "Anda berhasil memberi komentar!",
                "up" => $dataReplies,
                "pengirim" => $user_sender,
                "jumlah_like_veed" => $jumlah_like_veed,
                "veed_id" => $veed_id,
                "time" => $time,
                "commentId" => $comment_id,
                "comment_count" => $comment_count,
            ]);
        }
    }
    public function like_replies_reply(string $user_id, string $reply_replyComment_id, $veed_id)
    {
        $check = LikeBalasReplyCommentFeeds::where("user_id", $user_id)
            ->where("reply_comment_feed_id", $reply_replyComment_id)
            ->where("feed_id", $veed_id)
            ->count();
        if ($check == 0) {
            LikeBalasReplyCommentFeeds::create([
                "user_id" => $user_id,
                "reply_comment_feed_id" => $reply_replyComment_id,
                "feed_id" => $veed_id
            ]);
            $data_replies = BalasReplyCommentfeeds::findOrFail($reply_replyComment_id);
            if($data_replies->pengirim_reply_comment_id != Auth::user()->id){
                $notification = new Notifications();
                $notification->user_id = $data_replies->pengirim_reply_comment_id;
                $notification->notification_from = auth()->user()->id;
                $notification->veed_id = $veed_id;
                $notification->categories = "like_veed";
                $notification->message = "Menyukai komentar anda";
                $notification->save();

                $let_route = Notifications::findOrFail($notification->id);
                $let_route->route = "/status-baca/shared-feed/" . $notification->id;
                $let_route->save();
            }
            $countLike = LikeBalasReplyCommentFeeds::query()
                ->where('feed_id', $veed_id)
                ->where('reply_comment_feed_id', $reply_replyComment_id)
                ->count();
            return response()->json([
                "success" => true,
                "message" => "Sukses memberikan like!",
                "like" => true,
                "countLike" => $countLike
            ]);
        } elseif ($check == 1) {
            LikeBalasReplyCommentFeeds::where("user_id", $user_id)
                ->where("reply_comment_feed_id", $reply_replyComment_id)
                ->where("feed_id", $veed_id)
                ->delete();
            $countLike = LikeBalasReplyCommentFeeds::query()
                ->where('feed_id', $veed_id)
                ->where('reply_comment_feed_id', $reply_replyComment_id)
                ->count();
            return response()->json([
                "success" => true,
                "message" => "Sukses membatalkan like!",
                "like" => false,
                "countLike" => $countLike
            ]);
        }
    }
    public function sukai_balasan_komentar_veed(string $user_id, string $reply_comment_id, $veed_id)
    {
        $check = LikeReplyCommentFeed::where("users_id", $user_id)
            ->where("reply_comment_veed_id", $reply_comment_id)
            ->where("veed_id", $veed_id)
            ->count();
        if ($check == 0) {
            LikeReplyCommentFeed::create([
                "users_id" => $user_id,
                "reply_comment_veed_id" => $reply_comment_id,
                "veed_id" => $veed_id
            ]);
            $data_replies = ReplyCommentFeed::findOrFail($reply_comment_id);
            if($data_replies->users_id != Auth::user()->id){
                $notification = new Notifications();
                $notification->user_id = $data_replies->users_id;
                $notification->notification_from = auth()->user()->id;
                $notification->veed_id = $veed_id;
                $notification->categories = "like_veed";
                $notification->message = "Menyukai komentar anda";
                $notification->save();

                $let_route = Notifications::findOrFail($notification->id);
                $let_route->route = "/status-baca/shared-feed/" . $notification->id;
                $let_route->save();
            }
            $countLike = LikeReplyCommentFeed::query()
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
            LikeReplyCommentFeed::where("users_id", $user_id)
                ->where("reply_comment_veed_id", $reply_comment_id)
                ->where("veed_id", $veed_id)
                ->delete();
            $countLike = LikeReplyCommentFeed::query()
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
        $COMMENT = CommentFeed::find($id);
        $COMMENT->delete();
        return response()->json([
            "message" => "Sukses menghapus komentar feed!"
        ]);
    }
    public function hapus_balasan_komentar_feed(string $id)
    {
        $reply_comment = ReplyCommentFeed::find($id);
        $reply_comment->delete();
        return response()->json([
            "message" => "Sukses menghapus balasan komentar feed!"
        ]);
    }
    public function delete_replies_reply_feed($id){
        $replies_replyComment = BalasReplyCommentfeeds::findOrFail($id);
        $replies_replyComment->delete();
        return response()->json([
            "message" => "Sukses menghapus balasan komentar feed!"
        ]);
    }
    public function shareVeed(Request $request, $id)
    {
        if (Auth::check()) {
            $userIds = $request->input('user_id', []); // Mendapatkan array user_id yang dicentang
            if($userIds != null){
                $feed = UploadVideo::findOrFail($id);
                foreach ($userIds as $userId) {
                    // insert data share
                    $data = new Share();
                    $data->user_id = $userId;
                    $data->sender_id = auth()->user()->id;
                    $data->feed_id = $id;
                    $data->save();
                    // insert data notifikasi
                    $notification = new Notifications();
                    $notification->user_id = $userId;
                    $notification->notification_from = auth()->user()->id;
                    $notification->veed_id = $id;
                    $notification->share_id = $data->id;
                    $notification->save();
                }

                return response()->json([
                    "success"=> true,
                    "message"=>"Berhasil membagikan Postingan!",
                    'shared_count' => $feed->share_count(),
                ]);
            }else{
                return response()->json([
                    "success"=> false,
                    "message"=>"Pilih salah satu pengguna untuk melanjutkan",
                ]);
            }
        } else {
            return response()->json([
                "success"=> false,
                "message"=>"Silahkan login terlebih dahulu",
            ]);
        }
    }

    public function balasRepliesCommentsFeeds(Request $request, string $pemilik_id, string $comment_id, string $parent_id = null)
    {
        if ($parent_id != null) {
            $store = BalasReplyCommentfeeds::create([
                "pengirim_reply_comment_id" => auth()->user()->id,
                "pemilik_reply_comment_id" => $pemilik_id,
                "reply_comment_id" => $comment_id,
                "parent_id"=>$parent_id,
                "komentar" => $request->komentar
            ]);
        } else {
            $store = BalasReplyCommentfeeds::create([
                "pengirim_reply_comment_id" => auth()->user()->id,
                "pemilik_reply_comment_id" => $pemilik_id,
                "reply_comment_id" => $comment_id,
                "komentar" => $request->komentar
            ]);
        }
        $data_reply = ReplyCommentFeed::findOrFail($comment_id);
        if($data_reply->users_id != Auth::user()->id){
            $notification = new Notifications();
            $notification->user_id = $data_reply->users_id;
            $notification->notification_from = auth()->user()->id;
            $notification->veed_id = $data_reply->veed_id;
            $notification->categories = "reply_comment";
            $notification->message = "Membalas komentar anda";
            $notification->save();

            $let_route = Notifications::findOrFail($notification->id);
            $let_route->route = "/status-baca/shared-feed/" . $notification->id;
            $let_route->save();
        }
        $feed = UploadVideo::findOrFail($data_reply->veed_id);
        $comment_count = $feed->countCommentFeed();
        $dataReplies = BalasReplyCommentfeeds::findOrFail($store->id);
        $user_sender = User::findOrFail(auth()->user()->id);
        $user_penerima = User::findOrFail($pemilik_id);
        $feed_id = $store->reply_comment->veed_id;
        $jumlah_like_veed = LikeReplyCommentFeed::query();
        $time =  \Carbon\Carbon::parse($dataReplies->created_at)->locale('id_ID')->diffForHumans();
        return response()->json([
            "success" => true,
            "message" => "Anda berhasil memberi komentar!",
            "up" => $dataReplies,
            "pengirim" => $user_sender,
            "penerima" => $user_penerima,
            "jumlah_like_veed" => $jumlah_like_veed,
            "time" => $time,
            "commentId" => $comment_id,
            "feed_id" => $feed_id,
            "comment_count" => $comment_count,
        ]);
    }
    public function sukaiBalasRepliesCommentsFeeds(string $user, string $comment)
    {

    }
    public function lihat_feed_premium(string $video)
    {
        $feed = Crypt::decrypt($video);
        $videoPath = storage_path('app/'.$feed);
        if (!file_exists($videoPath)) {
            abort(404);
        }
        return response()->file($videoPath, [
            "Content-Type" => 'video/mp4',
        ]);
    }
}
