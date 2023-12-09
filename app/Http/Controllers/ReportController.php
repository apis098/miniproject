<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Favorite;
use App\Models\Notifications;
use App\Models\Reply;
use App\Models\ReplyComplaint;
use App\Models\CommentResipes;
use App\Models\ReplyCommentRecipe;
use App\Models\Report;
use App\Models\Reseps;
use App\Models\TopUpCategories;
use App\Models\UploadVideo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Kursus;
use App\Models\CommentFeed;
use App\Models\ReplyCommentFeed;
use App\Models\BalasReplyCommentfeeds;
use Str;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{

    public function index(Request $request)
    {
        $reportResep = Report::whereNotNull("resep_id")->paginate(6, ['*'], "report-resep-page");
        if ($request->has('resep')) {
            $searchQuery = $request->resep;
            $reportResep = Report::where('description', 'like', '%' . $searchQuery . '%')
                ->whereNotNull("resep_id")
                ->paginate(6, ['*'], "report-resep-page");
        }
        $data = Report::all();
        $reportVeed = Report::whereNotNull("feed_id")->paginate(6, ["*"], "report-feeds-page");
        $reportComplaint = Report::whereNotNull("complaint_id")->paginate(6, ['*'], "report-complaint-page");
        $reportReply = Report::whereNotNull("reply_id")
            ->orWhereNotNull('reply_comment_id')
            ->orWhereNotNull('reply_id_complaint')
            ->orWhereNotNull('comment_id')
            ->get();
        $reportCommentFeed = Report::whereNotNull('comment_feed_id')
            ->orWhereNotNull('reply_comment_feed_id')
            ->orWhereNotNull('replies_reply_comment_feed_id')
            ->get();
        $reportProfile = Report::whereNotNull("profile_id")->paginate(6, ['*'], "report-profile-page");
        $reportCourse = Report::whereNotNull("course_id")->paginate(6, ['*'], "report-kursus-page");
        $allComments = $reportReply->concat($reportCommentFeed);
        // membuat pagination pada concat
        $perPage = 2;
        $pageName = "report-comments-page";
        // currentPage untuk mengambil nilai dari page-nya.
        $currentPage = Paginator::resolveCurrentPage($pageName);
        // currentItems ini untuk menampilkan data sesuai dengan perPage nya dan juga mengambil index awal tiap page-nya.
        $currentItems  = $allComments->slice(($currentPage - 1) * $perPage, $perPage);
        $pagination =  new LengthAwarePaginator(
            $currentItems,
            $allComments->count(),
            $perPage,
            Paginator::resolveCurrentPage($pageName),
            ['path' => Paginator::resolveCurrentPath(), 'pageName' => $pageName]
        );
        $pagination->appends(request()->query());
        $dataComment = Report::whereNotNull("reply_id")
            ->orWhereNotNull("reply_comment_id")
            ->orWhereNotNull("feed_id")
            ->paginate(6, ['*'], "report-profile-page");
        $userLogin = Auth::user();
        // untuk user belum login
        $userLog = 1;
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
        $categorytopup  =  TopUpCategories::all();
        if ($userLogin) {
            $notification = Notifications::where('user_id', auth()->user()->id)
                ->where('status', 'belum')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $unreadNotificationCount = Notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
            $statusProfile = $data->whereNotNull('profile_id')->count();
            $statusResep = $data->whereNotNull('resep_id')->count();
            $statusVeed = $data->whereNotNull('feed_id')->count();
            $statusCourse = $data->whereNotNull('course_id')->count();
            $statusComplaint = $data->whereNotNull('complaint_id')->count();

            $reply_status_count = $data->whereNotNull('reply_id')->count();
            $reply_comment_status_count = $data->whereNotNull('reply_comment_id')->count();
            $reply_complaint_status = $data->whereNotNull('reply_id_complaint')->count();
            $comment_recipes_status = $data->whereNotNull('comment_id')->count();
            $comment_feeds_status = $data->whereNotNull('comment_feed_id')->count();
            $reply_comment_feed_status = $data->whereNotNull('reply_comment_feed_id')->count();
            $replies_reply_comment_feed_status = $data->whereNotNull('replies_reply_comment_feed_id')->count();
            $statusKomentar = $reply_status_count + $reply_comment_status_count + $reply_complaint_status + $comment_recipes_status + $comment_feeds_status + $reply_comment_feed_status + $replies_reply_comment_feed_status;
            $userLog = 2;
        }
        if ($userLogin) {
            $favorite = Favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        $show_resep = Reseps::find(2);
        $title = "Data laporan pelanggaran panduan komunitas";
        $verifed_count = User::where('isSuperUser', 'no')->where('followers', '>', 10000)->where('role', 'koki')->count();
        return view('report.index', compact('statusCourse', 'reportCourse', 'pagination', 'verifed_count', 'categorytopup', 'allComments', 'reportVeed', 'reportResep', 'reportComplaint', 'data', 'reportReply', 'reportProfile', 'title', 'show_resep', 'userLog', 'notification', 'unreadNotificationCount', 'userLogin', 'favorite', 'statusProfile', 'statusKomentar', 'statusComplaint', 'statusResep', 'statusVeed'));
    }

    public function keluhan(Request $request)
    {

        $reportComplaint = Report::whereNotNull("complaint_id")->paginate(6, ['*'], "report-complaint-page");

        if ($request->has('keluhan')) {
            $searchQuery = $request->keluhan;
            $reportComplaint = Report::where('description', 'like', '%' . $searchQuery . '%')
                ->whereNotNull("complaint_id")
                ->paginate(6, ['*'], "report-complaint-page");
        }

        $data = Report::all();
        $reportResep = Report::whereNotNull("resep_id")->paginate(6, ['*'], "report-resep-page");
        $reportReply = Report::whereNotNull("reply_id")->paginate(6, ['*'], "report-reply-page");
        $reportReplyComment = Report::whereNotNull("reply_id_complaint")->paginate(6, ['*'], "report-reply-page");
        $reportProfile = Report::whereNotNull("profile_id")->paginate(6, ['*'], "report-profile-page");
        $allComments = $reportReply->concat($reportReplyComment);
        $userLogin = Auth::user();
        // untuk user belum login
        $userLog = 1;
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
        $categorytopup  =  TopUpCategories::all();
        if ($userLogin) {
            $notification = Notifications::where('user_id', auth()->user()->id)
                ->where('status', 'belum')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $unreadNotificationCount = Notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
            $statusProfile = $data->whereNotNull('profile_id')->count();
            $statusResep = $data->whereNotNull('resep_id')->count();
            $statusComplaint = $data->whereNotNull('complaint_id')->count();
            $statusKomentar = $data->whereNotNull('reply_id')->count();
            $userLog = 2;
        }
        if ($userLogin) {
            $favorite = Favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        $show_resep = Reseps::find(2);
        $title = "Data laporan pelanggaran panduan komunitas";
        return view('report.keluhan', compact('categorytopup', 'allComments', 'reportResep', 'reportComplaint', 'data', 'reportReply', 'reportProfile', 'title', 'show_resep', 'userLog', 'notification', 'unreadNotificationCount', 'userLogin', 'favorite', 'statusProfile', 'statusKomentar', 'statusComplaint', 'statusResep'));
    }
    public function komentar(Request $request)
    {

        $reportReply = Report::whereNotNull("reply_id")->paginate(6, ['*'], "report-reply-page");
        if ($request->has('komentar')) {
            $searchQuery = $request->komentar;
            $reportReply = Report::where('description', 'like', '%' . $searchQuery . '%')
                ->whereNotNull("reply_id")
                ->paginate(6, ['*'], "report-reply-page");
        }

        $data = Report::all();
        $reportResep = Report::whereNotNull("resep_id")->paginate(6, ['*'], "report-resep-page");
        $reportComplaint = Report::whereNotNull("complaint_id")->paginate(6, ['*'], "report-complaint-page");
        $allComments = Report::whereNotNull("comment_id")
            ->orWhereNotNull("reply_id")
            ->orWhereNotNull("reply_id_complaint")
            ->orWhereNotNull("reply_comment_id")
            ->paginate(6, ['*'], "report-reply-page");
        $reportProfile = Report::whereNotNull("profile_id")->paginate(6, ['*'], "report-profile-page");
        $reportReplyComment = Report::whereNotNull("reply_id_complaint")->paginate(6, ['*'], "report-reply-page");
        $allComments = $reportReply->concat($reportReplyComment);
        $userLogin = Auth::user();
        // untuk user belum login
        $userLog = 1;
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
        $categorytopup  =  TopUpCategories::all();
        if ($userLogin) {
            $notification = Notifications::where('user_id', auth()->user()->id)
                ->where('status', 'belum')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $unreadNotificationCount = Notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
            $statusProfile = $data->whereNotNull('profile_id')->count();
            $statusResep = $data->whereNotNull('resep_id')->count();
            $statusComplaint = $data->whereNotNull('complaint_id')->count();
            $statusKomentar = $data->whereNotNull('reply_id')->count();
            $userLog = 2;
        }
        if ($userLogin) {
            $favorite = Favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        $show_resep = Reseps::find(2);
        $title = "Data laporan pelanggaran panduan komunitas";
        return view('report.komentar', compact('categorytoptup', 'allComments', 'reportResep', 'reportComplaint', 'data', 'reportReply', 'reportProfile', 'title', 'show_resep', 'userLog', 'notification', 'unreadNotificationCount', 'userLogin', 'favorite', 'statusProfile', 'statusKomentar', 'statusComplaint', 'statusResep'));
    }

    public function profil(Request $request)
    {


        $reportProfile = Report::whereNotNull("profile_id")->paginate(6, ['*'], "report-profile-page");
        if ($request->has('profil')) {
            $searchQuery = $request->profil;
            $reportProfile = Report::where('description', 'like', '%' . $searchQuery . '%')
                ->whereNotNull("profile_id")
                ->paginate(6, ['*'], "report-profile-page");
        }

        $data = Report::all();
        $reportResep = Report::whereNotNull("resep_id")->paginate(6, ['*'], "report-resep-page");
        $reportComplaint = Report::whereNotNull("complaint_id")->paginate(6, ['*'], "report-complaint-page");
        $reportReply = Report::whereNotNull("reply_id")->paginate(6, ['*'], "report-reply-page");
        $reportReplyComment = Report::whereNotNull("reply_id_complaint")->paginate(6, ['*'], "report-reply-page");
        $reportComment = Report::whereNotNull("comment_id")->paginate(6, ['*'], "report-reply-page");
        $reportReplies = Report::whereNotNull("reply_comment_id")->paginate(6, ['*'], "report-reply-page");
        $allComments = $reportReply->concat($reportReplyComment);
        $report =  $reportComment->concat($reportReplies);
        $allReport = $allComments->concat($report);
        $userLogin = Auth::user();
        // untuk user belum login
        $userLog = 1;
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
        $categorytopup  =  TopUpCategories::all();
        if ($userLogin) {
            $notification = Notifications::where('user_id', auth()->user()->id)
                ->where('status', 'belum')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $unreadNotificationCount = Notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
            $statusProfile = $data->whereNotNull('profile_id')->count();
            $statusResep = $data->whereNotNull('resep_id')->count();
            $statusComplaint = $data->whereNotNull('complaint_id')->count();
            $statusKomentar = $data->whereNotNull('reply_id')->count();
            $userLog = 2;
        }
        if ($userLogin) {
            $favorite = Favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        $show_resep = Reseps::find(2);
        $title = "Data laporan pelanggaran panduan komunitas";
        return view('report.profil', compact('categorytopup', 'allReport', 'reportResep', 'reportComplaint', 'data', 'reportReply', 'reportProfile', 'title', 'show_resep', 'userLog', 'notification', 'unreadNotificationCount', 'userLogin', 'favorite', 'statusProfile', 'statusKomentar', 'statusComplaint', 'statusResep'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Report::where('description', 'LIKE', "%$query%")->get();

        return view('report.index', ['results' => $results]);
    }

    public function store_comment_feed(Request $request, $comment_id, $reply_comment_feed_id, $reply_replies_comment_feed_id)
    {
        if ($comment_id != 0) {
            $comment = CommentFeed::findOrFail($comment_id);
            if (Auth::check()) {
                $report = new Report();
                $report->comment_feed_id = $comment_id;
                $report->user_id = $comment->pengirim_id;
                $report->user_id_sender = auth()->user()->id;
                $report->description = $request->description;
                $report->save();
            } else {
                return redirect()->route('login')->with('error', 'Silahkan login terlebih dahulu');
            }
            return redirect()->back()->with('success', 'Laporan anda telah terkirim');
        } elseif ($reply_comment_feed_id != 0) {
            $reply = ReplyCommentFeed::findOrFail($reply_comment_feed_id);
            if (Auth::check()) {
                $report = new Report();
                $report->reply_comment_feed_id = $reply->id;
                $report->user_id = $reply->users_id;
                $report->user_id_sender = auth()->user()->id;
                $report->description = $request->description;
                $report->save();
            } else {
                return redirect()->route('login')->with('error', 'Silahkan login terlebih dahulu');
            }
            return redirect()->back()->with('success', 'Laporan anda telah terkirim');
        } elseif ($reply_replies_comment_feed_id != 0) {
            $replies_reply = BalasReplyCommentfeeds::findOrFail($reply_replies_comment_feed_id);
            if (Auth::check()) {
                $report = new Report();
                $report->replies_reply_comment_feed_id = $replies_reply->id;
                $report->user_id = $replies_reply->pengirim_reply_comment_id;
                $report->user_id_sender = auth()->user()->id;
                $report->description = $request->description;
                $report->save();
            } else {
                return redirect()->route('login')->with('error', 'Silahkan login terlebih dahulu');
            }
            return redirect()->back()->with('success', 'Laporan anda telah terkirim');
        }
    }

    public function storeResep(Request $request, $id)
    {
        $validasi = Validator::make($request->all(), [
            'description' => 'required|max:225',
        ], [
            'description.required' => 'Alasan melaporkan wajib diisi!',
            'description.max' => 'Alasan melaporkan maksimal berisi 225 karakter',
        ]);
        if ($validasi->fails()) {
            return response()->json($validasi->errors()->first(), 422);
        }
        $resep = Reseps::findOrFail($id);
        $report = new Report();
        if (Auth::check()) {
            $report->resep_id = $resep->id;
            $report->user_id = $resep->user_id;
            $report->user_id_sender = auth()->user()->id;
            $report->description = $request->description;
            $report->save();
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Silakan login terlebih dahulu.'
            ]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Laporan anda telah terkirim'
        ]);
    }
    public function storeVeed(Request $request, $id)
    {
        $feed = UploadVideo::findOrFail($id);
        if (Auth::check()) {
            $report = new Report();
            $report->user_Id = $feed->users_id;
            $report->user_id_sender = auth()->user()->id;
            $report->description = $request->description;
            $report->feed_id = $id;
            $report->save();
            return redirect()->back()->with('success', 'Berhasil melaporkan postingan');
        } else {
            return redirect()->route('login')->with('error', 'Silahkan login terlebih dahulu');
        }
    }
    public function storeReplyComment(Request $request, $id)
    {
        if (Auth::check()) {
            $reply = ReplyComplaint::findOrFail($id);
            $report = new Report();
            $report->user_id = $reply->user_id;
            $report->user_id_sender = auth()->user()->id;
            $report->reply_id_complaint = $reply->id;
            $report->description = $request->description;
            $report->save();
            return response()->json([
                'success' => true,
                'message' => 'Laporan anda telah terkirim'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Silakan login terlebih dahulu'
            ]);
        }
    }
    public function storeReply(Request $request, $id)
    {
        if (Auth::check()) { // Memeriksa apakah pengguna telah login
            $reply = Reply::findOrFail($id);
            $report = new Report();
            $report->reply_id = $reply->id;
            $report->user_id = $reply->user_id;
            $report->user_id_sender = auth()->user()->id;
            $report->description = $request->description;
            $report->save();
            return response()->json([
                'success' => true,
                'message' => 'Laporan anda telah terkirim.'
            ]);
        } else {
            // Pengguna belum login, tampilkan pesan
            return response()->json([
                'success' => false,
                'message' => 'Harus login terlebih dahulu untuk melaporkan pelanggaran.'
            ]);
        }
    }
    public function storeComplaint(Request $request, $id)
    {
        if (Auth::check()) { // Memeriksa apakah pengguna telah login
            $complaint = Complaint::findOrFail($id);
            $report = new Report();
            $report->complaint_id = $complaint->id;
            $report->user_id = $complaint->user_id;
            $report->user_id_sender = auth()->user()->id;
            $report->description = $request->description;
            $report->save();
            return redirect()->back()->with('success', 'Laporan anda telah terkirim');
        } else {
            // Pengguna belum login, tampilkan pesan
            return redirect()->route('login')->with('info', 'Silahkan login terlebih dahulu sebelum melaporkan pelanggaran');
        }
    }
    public function store_comment_recipes(Request $request, $id)
    {
        if (Auth::check()) {
            $comment = CommentResipes::findOrFail($id);
            $report = new Report();
            $report->user_id = $comment->pengirim_id;
            $report->user_id_sender = auth()->user()->id;
            $report->comment_id = $comment->id;
            $report->description = $request->description;
            $report->save();
            return redirect()->back()->with('success', 'Laporan anda telah terkirim');
        } else {
            return redirect()->route('login')->with('info', 'Silahkan login terlebih dahulu sebelum melaporkan pelanggaran');
        }
    }
    public function reply_comment_recipes(Request $request, $id)
    {
        if (Auth::check()) {
            $comment = ReplyCommentRecipe::findOrFail($id);
            $report = new Report();
            $report->user_id = $comment->users_id;
            $report->user_id_sender = auth()->user()->id;
            $report->reply_comment_id = $comment->id;
            $report->description = $request->description;
            $report->save();
            return redirect()->back()->with('success', 'Laporan anda telah terkirim');
        } else {
            return redirect()->route('login')->with('info', 'Silahkan login terlebih dahulu sebelum melaporkan pelanggaran');
        }
    }
    public function store(Request $request)
    {
        if (Auth::check()) { // Memeriksa apakah pengguna telah login
            $userId = Auth::user()->id;
            $report = new Report();
            $report->user_id = $request->user_id;
            if ($request->reply_id != null) {
                $report->reply_id =  $request->reply_id;
            }
            if ($request->profile_id != null) {
                $report->profile_id = $request->profile_id;
            }
            if ($request->feed_id != null) {
                $report->feed_id = $request->feed_id;
            }
            $report->description = $request->description;
            $report->user_id_sender = $userId;
            $report->save();
            return redirect()->back()->with('success', 'Laporan pelanggaran berhasil dikirim.');
        } else {
            // Pengguna belum login, tampilkan pesan
            return redirect()->back()->with('error', 'Harus login terlebih dahulu untuk melaporkan pelanggaran.');
        }
    }


    public function randomName($id)
    {
        $report = Report::findOrFail($id);
        $report->user->delete();
        $nama_random = Str::random(10);
        $report->user->increment('jumlah_pelanggaran');
        $user = $report->user;
        $user->name = $nama_random;
        $user->save();

        $notification = new Notifications();
        $notification->user_id = $report->user_id;
        $notification->notification_from = auth()->user()->id;
        $notification->random_name = $nama_random;
        $notification->save();

        if ($report->user->jumlah_pelanggaran > 10) {
            $report->user->status = "nonaktif";
            $report->user->save();
            return redirect()->back()->with('success', 'User telah diblokir');
        }
        return redirect()->back()->with('success', 'Nama berhasil disesuaikan');
    }
    public function block(Request $request, $id)
    {
        $report = Report::findOrFail($id);
        $report->user->increment('jumlah_pelanggaran');
        if ($report->reply_id != null) {
            $report->replies->delete();
            $notification = new Notifications();
            $notification->user_id = $report->user_id;
            $notification->notification_from = auth()->user()->id;
            $notification->reply_id_report = 1;
            $notification->alasan = $request->alasan;
            $notification->save();
            return redirect()->back()->with('success', 'Komentar berhasil diblokir');
        }
        if ($report->complaint_id != null) {
            $report->complaint->delete();
            $notification = new Notifications();
            $notification->user_id = $report->user_id;
            $notification->notification_from = auth()->user()->id;
            $notification->complaint_id_report = 1;
            $notification->alasan = $request->alasan;
            $notification->save();
            return redirect()->back()->with('success', 'Keluhan telah diblokir');
        }
        if ($report->resep_id != null) {
            $report->resep->delete();
            $notification = new Notifications();
            $notification->user_id = $report->user_id;
            $notification->notification_from = auth()->user()->id;
            $notification->resep_id_report = 1;
            $notification->alasan = $request->alasan;
            $notification->save();
            return redirect()->back()->with('success', 'Resep telah diblokir');
        }
        if ($report->feed_id != null) {
            $report->feed->delete();
            $notification = new Notifications();
            $notification->user_id = $report->user_id;
            $notification->notification_from = auth()->user()->id;
            $notification->veed_id_report = 1;
            $notification->alasan = $request->alasan;
            $notification->save();
            return redirect()->back()->with('success', 'Postingan telah diblokir');
        }
        if ($report->profile_id != null) {
            if ($report->user->foto) {
                Storage::disk('public')->delete($report->user->foto);
                $profile = $report->user;
                $profile->foto = null;
                $profile->save();
                $report->delete();

                $notification = new Notifications();
                $notification->user_id = $report->profile_id;
                $notification->notification_from = auth()->user()->id;
                $notification->profile_id = $report->profile_id;
                $notification->alasan = $request->alasan;
                $notification->save();
                return redirect()->back()->with('success', 'Foto profile telah diblokir');
            } else {
                $report->delete();
                return redirect()->back()->with('error', 'Tidak ada foto profile yang perlu dihapus ');
            }
        }
        if ($report->comment_feed_id != null) {
            $report->comment_feed->delete();
            $notification = new Notifications();
            $notification->user_id = $report->user_id;
            $notification->notification_from = auth()->user()->id;
            $notification->categories = "block_comment";
            $notification->message = "Komentar kamu telah di blokir";
            $notification->alasan = $request->alasan;
            $notification->save();
            return redirect()->back()->with('success', 'Komentar berhasil diblokir');
        }
        if ($report->reply_comment_feed_id != null) {
            $report->reply_comment_feed->delete();
            $notification = new Notifications();
            $notification->user_id = $report->user_id;
            $notification->notification_from = auth()->user()->id;
            $notification->categories = "block_comment";
            $notification->message = "Komentar kamu telah di blokir";
            $notification->alasan = $request->alasan;
            $notification->save();
            return redirect()->back()->with('success', 'Komentar berhasil diblokir');
        }
        if ($report->replies_reply_comment_feed_id != null) {
            $report->replies_reply_comment_feed->delete();
            $notification = new Notifications();
            $notification->user_id = $report->user_id;
            $notification->notification_from = auth()->user()->id;
            $notification->categories = "block_comment";
            $notification->message = "Komentar kamu telah di blokir";
            $notification->alasan = $request->alasan;
            $notification->save();
            return redirect()->back()->with('success', 'Komentar berhasil diblokir');
        }
        if ($report->user->jumlah_pelanggaran > 3) {
            $report->user->status = "nonaktif";
            $report->user->save();
            return redirect()->back()->with('success', 'User telah diblokir');
        }
    }
    public function blockUser($id)
    {
        $report = Report::findOrFail($id);
        if ($report->user->status == "aktif") {
            $report->user->status = "nonaktif";
            $report->user->save();
            if ($report->reply_id != null) {
                $report->replies->delete();
            }
            if ($report->complaint_id != null) {
                $report->complaint->delete();
            }
            if ($report->resep_id != null) {
                $report->resep->delete();
            }
            if ($report->profile_id != null) {
                Storage::disk('public')->delete($report->user->foto);
                $profile = $report->user;
                $profile->foto = null;
                $profile->save();
                $report->delete();
            }
            if ($report->feed_id != null) {
                $report->feed->delete();
            }
            return redirect()->back()->with('success', 'Pengguna berhasil diblokir');
        } else {
            return redirect()->back()->with('error', 'User sudah diblokir');
        }
    }
    public function blocked_index()
    {
        $user = User::where('status', 'nonaktif')->paginate(5);
        $verifed_count = User::where('isSuperUser', 'no')->where('followers', '>', 10000)->where('role', 'koki')->count();
        return view('admin.unblock', compact('user', 'verifed_count'));
    }
    public function unblock_store($id)
    {
        $user = User::findOrFail($id);
        $user->status =  "aktif";
        $user->save();
        return redirect()->back()->with('success', 'Pengguna berhasil di unblock');
    }
    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();
        return redirect()->back()->with('success', 'Laporan telah dihapus');
    }
    public function storeCourse(Request $request, $id)
    {
        $kursus = Kursus::find($id);
        $user_id = $kursus->user->id;
        Report::create([
            "course_id" => $id,
            'user_id' => $user_id,
            'user_id_sender' => Auth::user()->id,
            'description' => $request->laporkan
        ]);
        return redirect()->back()->with('success', 'Sukses melaporkan kursus!');
    }
}
