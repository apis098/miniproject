<?php

namespace App\Http\Controllers;

use App\Models\ChMessage;
use App\Models\Complaint;
use App\Models\Favorite;
use App\Models\Footer;
use App\Models\likes;
use App\Models\Notifications;
use App\Models\Reply;
use App\Models\ReplyComplaint;
use App\Models\TopUpCategories;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Notification;

class ReplyController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $user = Auth::user();
        $userRole = $user->role;
        $data = Reply::where('user_id', $userId)->get();
        $title = "Balasan anda terhadap pengguna lain";
        if ($userRole == 'admin') {
            return view('replies.index', compact('data', 'title'));
        } else {
            return view('replies.index_koki', compact('data', 'title'));
        }

    }
    public function show($id)
    {
        $data = Complaint::findOrFail($id);
        $replies = $data->replies->sortByDesc('likes');
        $repliesCount = $replies->count();
        $userLogin = Auth::user();
        $notification = [];
        $footer = Footer::first();
        $favorite = [];
        $unreadNotificationCount = [];
        $categorytopup = TopUpCategories::all();
        $messageCount = [];
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
        // $balasanKomentar = [];
        // if($replies->isNotEmpty()){
        //     $balasanKomentar = $replies->first()->repliesComment->sortByDesc('likes');
        // }
        if ($userLogin) {
            $notification = Notifications::where('user_id', auth()->user()->id)
                ->where('status', 'belum')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $unreadNotificationCount = Notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
        }
        if ($userLogin) {
            $favorite = Favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        $title = "Data balasan keluhan ";
        return view('replies.detail', compact('categorytopup', 'messageCount', 'data', 'footer', 'title', 'replies', 'repliesCount', 'userLogin', 'notification', 'unreadNotificationCount', 'favorite'));
    }
    public function reply(Request $request, $id)
    {

        $validasi = Validator::make($request->all(), [
            'reply' => 'required|string',
        ], [
            'reply.required' => 'Komentar harus diisi!',
            'reply.string' => 'Komentar harus berupa string!'
        ]);
        if ($validasi->fails()) {
            return response()->json($validasi->errors()->first(), 422);
        }

        $complaint = Complaint::findOrFail($id);
        $user = Auth::user();
        if ($user) {
            $reply = new Reply([
                'user_id' => auth()->user()->id,
                'reply' => $request->reply,
            ]);
            $complaint->replies()->save($reply);
            if ($complaint->user_id != auth()->user()->id) {
                $notifications = new Notifications([
                    'notification_from' => auth()->user()->id,
                    'complaint_id' => $complaint->id,
                    'user_id' => $complaint->user->id,
                    'reply_id' => $reply->id,
                ]);
                $complaint->Notifications()->save($notifications);
            }
            if (Auth::user()->foto != null) {
                $foto = 'storage/' . Auth::user()->foto;
            } else {
                $foto = 'images/default.jpg';
            }
            return response()->json([
                'success' => true,
                'message' => 'Sukses memberi komentar!',
                'name' => Auth::user()->name,
                'foto' => $foto,
                'reply' => $request->reply,
                'id' => $reply->id,
            ]);
        } else {
            return response()->json([
                'success'=> false,
                "message" => "Silahkan login terlebih dahulu."
            ]);
        }
    }
    public function replyComment(Request $request, $id)
    {
        $validasi = Validator::make($request->all(), [
            'reply_comment' => 'required|string',
        ], [
            'reply_comment.required' => 'Komentar harus diisi!',
            'reply_comment.string' => 'Komentar harus berupa string!'
        ]);
        if ($validasi->fails()) {
            return response()->json($validasi->errors()->first(), 422);
        }


        $user = Auth::check();
        if ($user) {
            $comment = Reply::findOrFail($id);
            $reply = new ReplyComplaint();
            $reply->reply_id = $comment->id;
            $reply->complaint_id = $comment->complaint_id;
            $reply->user_id = $comment->user_id;
            $reply->user_id_sender = auth()->user()->id;
            $reply->reply = $request->reply_comment;
            $reply->save();
            if ($comment->user_id != auth()->user()->id) {
                $notifications = new Notifications();
                $notifications->notification_from = auth()->user()->id;
                $notifications->user_id = $comment->user_id;
                $notifications->reply_id_comment = $comment->id;
                $notifications->complaint_id = $comment->complaint_id;
                $notifications->save();
            }
            if(Auth::user()->foto) {
                $foto = 'storage/'.Auth::user()->foto;
            } else {
                $foto = 'images/default.jpg';
            }
            if($reply->parent_id != null) {
                $at = $reply->user->name;
            } else {
                $at = '';
            }
            return response()->json([
                'success'=>true,
                'message'=>'Berhasil membalas komentar.',
                'name' => Auth::user()->name,
                'foto' => $foto,
                'reply' => $request->reply_comment,
                'id' => $reply->id,
                'at' => $at,
                'id2' => $id
            ]);
        } else {
            return response()->json([
                'success'=> false,
                "message" => "Silahkan login terlebih dahulu."
            ]);
        }

    }
    public function replyReplyComment(Request $request, $id)
    {
        $validasi = Validator::make($request->all(), [
            'reply_comment' => 'required|string',
        ], [
            'reply_comment.required' => 'Komentar harus diisi!',
            'reply_comment.string' => 'Komentar harus berupa string!'
        ]);
        if ($validasi->fails()) {
            return response()->json($validasi->errors()->first(), 422);
        }

        $user = Auth::check();
        if ($user) {
            $comment = Reply::findOrFail($id);
            $reply = new ReplyComplaint();
            $reply->reply_id = $comment->id;
            $reply->complaint_id = $comment->complaint_id;
            $reply->user_id = $comment->user_id;
            $reply->user_id_sender = auth()->user()->id;
            $reply->reply = $request->reply_comment;
            $reply->parent_id = $request->parent_id;
            $reply->save();
            if ($comment->user_id != auth()->user()->id) {
                $notifications = new Notifications();
                $notifications->notification_from = auth()->user()->id;
                $notifications->user_id = $comment->user_id;
                $notifications->reply_id_comment = $comment->id;
                $notifications->complaint_id = $comment->complaint_id;
                $notifications->save();
            }
            if(Auth::user()->foto) {
                $foto = 'storage/'.Auth::user()->foto;
            } else {
                $foto = 'images/default.jpg';
            }
            if($reply->parent_id != null) {
                $at = $reply->user->name;
            } else {
                $at = '';
            }
            return response()->json([
                'success'=>true,
                'message'=>'Berhasil membalas komentar.',
                'name' => Auth::user()->name,
                'foto' => $foto,
                'reply' => $request->reply_comment,
                'id' => $reply->id,
                'at' => $at,
                'id2' => $id
            ]);
        } else {
            return response()->json([
                'success'=> false,
                "message" => "Silahkan login terlebih dahulu."
            ]);
        }

    }

    public function destroy(Request $request, $id)
    {
        $data = Reply::findOrFail($id);
        $data->delete();

        if (auth()->user()->role == "admin") {
            $notification = new Notifications();
            $notification->user_id = $data->user_id;
            $notification->notification_from = auth()->user()->id;
            $notification->reply_id_report = 1;
            $notification->alasan = $request->alasan;
            $notification->save();
            return response()->json([
                'success' => true,
                'message' => 'Komentar berhasil diblokir'
            ]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Komentar berhasil dihapus'
        ]);
    }
    public function destroyComment(Request $request, $id)
    {
        $data = ReplyComplaint::findOrFail($id);
        $data->delete();

        if (auth()->user()->role == "admin") {
            $notification = new Notifications();
            $notification->user_id = $data->user_id_sender;
            $notification->notification_from = auth()->user()->id;
            $notification->reply_id_report = 1;
            $notification->alasan = $request->alasan;
            $notification->save();
            return response()->json([
                "success" => true,
                "message" => "Komentar berhasil diblokir."
            ]);
        }
        return response()->json([
            "success" => true,
            "message" => "Komentar telah dihapus.",
        ]);
    }
}
