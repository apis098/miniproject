<?php

namespace App\Http\Controllers;

use App\Models\complaint;
use App\Models\favorite;
use App\Models\notifications;
use App\Models\Reply;
use App\Models\replyComplaint;
use App\Models\comment_recipes;
use App\Models\replyCommentRecipe;
use App\Models\Report;
use App\Models\reseps;
use App\Models\TopUpCategories;
use App\Models\upload_video;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\kursus;
use App\Models\comment_veed;
use Str;
class ReportController extends Controller
{

    public function index(Request $request){
        $reportResep = Report::whereNotNull("resep_id")->paginate(6, ['*'], "report-resep-page");
        if ($request->has('resep')) {
            $searchQuery = $request->resep;
            $reportResep = Report::where('description', 'like', '%' . $searchQuery . '%')
                ->whereNotNull("resep_id")
                ->paginate(6, ['*'], "report-resep-page");
        }
        $data = Report::all();
        $reportVeed = Report::whereNotNull("feed_id")->paginate(6, ["*"], "report-veed-page");
        $reportComplaint = Report::whereNotNull("complaint_id")->paginate(6, ['*'], "report-complaint-page");
        $reportReply = Report::whereNotNull("reply_id")
                        ->orWhereNotNull('reply_comment_id')
                        ->orWhereNotNull('reply_id_complaint')
                        ->orWhereNotNull('comment_id')
                        ->paginate(6, ['*'], "report-reply-page");
        $reportCommentFeed = Report::whereNotNull('comment_feed_id')
                        ->orWhereNotNull('reply_comment_feed_id')
                        ->orWhereNotNull('replies_reply_comment_feed_id')
                        ->paginate(6, ['*'], 'report-reply-page');
        $reportProfile = Report::whereNotNull("profile_id")->paginate(6, ['*'], "report-profile-page");
        $reportCourse = Report::whereNotNull("course_id")->paginate(6, ['*'], "report-course-page");
        $allComments = $reportReply->concat($reportCommentFeed);
        $dataComment = Report::whereNotNull("reply_id")
            ->orWhereNotNull("reply_comment_id")
            ->orWhereNotNull("feed_id")
            ->paginate(6, ['*'], "report-profile-page");
        $userLogin = Auth::user();
        // untuk user belum login
        $userLog = 1;
        $notification = [];
        $favorite = [];
        $unreadNotificationCount=[];
        $categorytopup  =  TopUpCategories::all();
        if ($userLogin) {
            $notification = notifications::where('user_id', auth()->user()->id)
            ->where('status','belum')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
                $unreadNotificationCount = notifications::where('user_id',auth()->user()->id)->where('status', 'belum')->count();
                $statusProfile = $data->whereNotNull('profile_id')->count();
                $statusResep = $data->whereNotNull('resep_id')->count();
                $statusVeed = $data->whereNotNull('feed_id')->count();
                $statusComplaint = $data->whereNotNull('complaint_id')->count();
                $statusKomentar = $data->whereNotNull('reply_id')->count();
                $userLog = 2;
        }
        if ($userLogin) {
            $favorite = favorite::where('user_id_from', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        }
        $show_resep = reseps::find(2);
        $title = "Data laporan pelanggaran panduan komunitas";
        return view('report.index',compact('reportCourse','categorytopup','allComments','reportVeed','reportResep','reportComplaint','data', 'reportReply', 'reportProfile','title','show_resep', 'userLog','notification','unreadNotificationCount','userLogin','favorite','statusProfile','statusKomentar','statusComplaint','statusResep','statusVeed'));
    }
    
    public function keluhan(Request $request){

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
        $unreadNotificationCount=[];
        $categorytopup  =  TopUpCategories::all();
        if ($userLogin) {
            $notification = notifications::where('user_id', auth()->user()->id)
            ->where('status','belum')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
                $unreadNotificationCount = notifications::where('user_id',auth()->user()->id)->where('status', 'belum')->count();
                $statusProfile = $data->whereNotNull('profile_id')->count();
                $statusResep = $data->whereNotNull('resep_id')->count();
                $statusComplaint = $data->whereNotNull('complaint_id')->count();
                $statusKomentar = $data->whereNotNull('reply_id')->count();
                $userLog = 2;
        }
        if ($userLogin) {
            $favorite = favorite::where('user_id_from', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        }
        $show_resep = reseps::find(2);
        $title = "Data laporan pelanggaran panduan komunitas";
        return view('report.keluhan',compact('categorytopup','allComments','reportResep','reportComplaint','data', 'reportReply', 'reportProfile','title','show_resep', 'userLog','notification','unreadNotificationCount','userLogin','favorite','statusProfile','statusKomentar','statusComplaint','statusResep'));

    }
    public function komentar(Request $request){

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
        // $allComments = $reportReply->concat($reportReplyComment);
        $userLogin = Auth::user();
        // untuk user belum login
        $userLog = 1;
        $notification = [];
        $favorite = [];
        $unreadNotificationCount=[];
        $categorytopup  =  TopUpCategories::all();
        if ($userLogin) {
            $notification = notifications::where('user_id', auth()->user()->id)
            ->where('status','belum')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
                $unreadNotificationCount = notifications::where('user_id',auth()->user()->id)->where('status', 'belum')->count();
                $statusProfile = $data->whereNotNull('profile_id')->count();
                $statusResep = $data->whereNotNull('resep_id')->count();
                $statusComplaint = $data->whereNotNull('complaint_id')->count();
                $statusKomentar = $data->whereNotNull('reply_id')->count();
                $userLog = 2;
        }
        if ($userLogin) {
            $favorite = favorite::where('user_id_from', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        }
        $show_resep = reseps::find(2);
        $title = "Data laporan pelanggaran panduan komunitas";
        return view('report.komentar',compact('categorytoptup','allComments','reportResep','reportComplaint','data', 'reportReply', 'reportProfile','title','show_resep', 'userLog','notification','unreadNotificationCount','userLogin','favorite','statusProfile','statusKomentar','statusComplaint','statusResep'));

    }

    public function profil(Request $request){


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
        $unreadNotificationCount=[];
        $categorytopup  =  TopUpCategories::all();
        if ($userLogin) {
            $notification = notifications::where('user_id', auth()->user()->id)
                ->where('status','belum')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
                $unreadNotificationCount = notifications::where('user_id',auth()->user()->id)->where('status', 'belum')->count();
                $statusProfile = $data->whereNotNull('profile_id')->count();
                $statusResep = $data->whereNotNull('resep_id')->count();
                $statusComplaint = $data->whereNotNull('complaint_id')->count();
                $statusKomentar = $data->whereNotNull('reply_id')->count();
                $userLog = 2;
        }
        if ($userLogin) {
            $favorite = favorite::where('user_id_from', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        }
        $show_resep = reseps::find(2);
        $title = "Data laporan pelanggaran panduan komunitas";
        return view('report.profil',compact('categorytopup','allReport','reportResep','reportComplaint','data', 'reportReply', 'reportProfile','title','show_resep', 'userLog','notification','unreadNotificationCount','userLogin','favorite','statusProfile','statusKomentar','statusComplaint','statusResep'));

    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Report::where('description', 'LIKE', "%$query%")->get();

        return view('report.index', ['results' => $results]);
    }

    public function store_comment_feed(Request $request,$comment_id = null,$reply_comment_feed_id = null ,$reply_replies_comment_feed_id = null){
        if($comment_id != null){
            $comment = comment_veed::findOrFail($comment_id);
            if(Auth::check()){
                $comment->comment_feed_id = $comment->id;
                $comment->user_id = $comment->pengirim_id;
                $comment->user_id_sender = auth()->user()->id;
                $comment->description = $request->description;
                $comment->save();
            }else{
                return redirect()->route('login')->with('error','Silahkan login terlebih dahulu');
            }
            return redirect()->back()->with('success','Laporan anda telah terkirim');
        }
    }

    public function storecomment(Request $request,$id){
        $resep = reseps::findOrFail($id);
        $report = new Report();
        if(Auth::check()){
            $report->resep_id = $resep->id;
            $report->user_id = $resep->user_id;
            $report->user_id_sender = auth()->user()->id;
            $report->description = $request->description;
            $report->save();
        }else{
            return redirect()->route('login')->with('error','Silahkan login terlebih dahulu');
        }
        return redirect()->back()->with('success','Laporan anda telah terkirim');
    }
    public function storeVeed(Request $request,$id){
        $feed = upload_video::findOrFail($id);
        if(Auth::check()){
            $report = new Report();
            $report->user_Id = $feed->users_id;
            $report->user_id_sender = auth()->user()->id;
            $report->description = $request->description;
            $report->feed_id = $id;
            $report->save();
            return redirect()->back()->with('success','Berhasil melaporkan postingan');
        }else{
            return redirect()->route('login')->with('error','Silahkan login terlebih dahulu');
        }
    }
    public function storeReplyComment(Request $request,$id){
        if(Auth::check()){
            $reply = replyComplaint::findOrFail($id);
            $report = new Report();
            $report->user_id = $reply->user_id;
            $report->user_id_sender = auth()->user()->id;
            $report->reply_id_complaint = $reply->id;
            $report->description = $request->description;
            $report->save();
            return redirect()->back()->with('success','Laporan anda telah terkirim');
        }else{
            return redirect()->route('login')->with('error','Silahkan login terlebih dahulu');
        }
    }
    public function storeReply(Request $request ,$id){
        if(Auth::check()) { // Memeriksa apakah pengguna telah login
        $reply = Reply::findOrFail($id);
        $report = new Report();
        $report->reply_id = $reply->id;
        $report->user_id = $reply->user_id;
        $report->user_id_sender = auth()->user()->id;
        $report->description = $request->description;
        $report->save();
        return redirect()->back()->with('success','Laporan anda telah terkirim');
    } else {
        // Pengguna belum login, tampilkan pesan
        return redirect()->back()->with('error', 'Harus login terlebih dahulu untuk melaporkan pelanggaran.');
    }
    }
    public function storeComplaint(Request $request, $id){
        if(Auth::check()) { // Memeriksa apakah pengguna telah login
        $complaint = complaint::findOrFail($id);
        $report = new Report();
        $report->complaint_id = $complaint->id;
        $report->user_id = $complaint->user_id;
        $report->user_id_sender = auth()->user()->id;
        $report->description = $request->description;
        $report->save();
        return redirect()->back()->with('success','Laporan anda telah terkirim');
    } else {
        // Pengguna belum login, tampilkan pesan
        return redirect()->route('login')->with('info','Silahkan login terlebih dahulu sebelum melaporkan pelanggaran');
    }
    }
    public function store_comment_recipes(Request $request,$id){
        if(Auth::check()){
            $comment = comment_recipes::findOrFail($id);
            $report = new Report();
            $report->user_id = $comment->users_id;
            $report->user_id_sender = auth()->user()->id;
            $report->comment_id = $comment->id;
            $report->description = $request->description;
            $report->save();
            return redirect()->back()->with('success','Laporan anda telah terkirim');
        }else{
            return redirect()->route('login')->with('info','Silahkan login terlebih dahulu sebelum melaporkan pelanggaran');
        }
    }
    public function reply_comment_recipes(Request $request,$id){
        if(Auth::check()){
            $comment = replyCommentRecipe::findOrFail($id);
            $report = new Report();
            $report->user_id = $comment->users_id;
            $report->user_id_sender = auth()->user()->id;
            $report->reply_comment_id = $comment->id;
            $report->description = $request->description;
            $report->save();
            return redirect()->back()->with('success','Laporan anda telah terkirim');
        }else{
            return redirect()->route('login')->with('info','Silahkan login terlebih dahulu sebelum melaporkan pelanggaran');
        }
    }
    public function store(Request $request){
        if(Auth::check()) { // Memeriksa apakah pengguna telah login
            $userId = Auth::user()->id;
            $report = new Report();
            $report->user_id = $request->user_id;
            if($request->reply_id != null){
                $report->reply_id =  $request->reply_id;
            }
            if($request->profile_id != null){
                $report->profile_id = $request->profile_id;
            }
            if($request->feed_id != null){
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


    public function randomName($id){
        $report = Report::findOrFail($id);
        $report->user->delete();
        $nama_random = Str::random(10);
        $report->user->increment('jumlah_pelanggaran');
        $user = $report->user;
        $user->name = $nama_random;
        $user->save();

        $notification = new notifications();
        $notification->user_id = $report->user_id;
        $notification->notification_from = auth()->user()->id;
        $notification->random_name = $nama_random;
        $notification->save();

        if($report->user->jumlah_pelanggaran > 10){
            $report->user->status = "nonaktif";
            $report->user->save();
            return redirect()->back()->with('success', 'User telah diblokir');
        }
        return redirect()->back()->with('success','Nama berhasil disesuaikan');
    }
    public function block(Request $request, $id){
        $report = Report::findOrFail($id);
        $report->user->increment('jumlah_pelanggaran');
        if($report->reply_id != null){
            $report->replies->delete();
            $notification = new notifications();
            $notification->user_id = $report->user_id;
            $notification->notification_from = auth()->user()->id;
            $notification->reply_id_report = 1;
            $notification->alasan = $request->alasan;
            $notification->save();
            return redirect()->back()->with('success', 'Komentar berhasil diblokir');
        }
        if($report->complaint_id != null){
            $report->complaint->delete();
            $notification = new notifications();
            $notification->user_id = $report->user_id;
            $notification->notification_from = auth()->user()->id;
            $notification->complaint_id_report = 1;
            $notification->alasan = $request->alasan;
            $notification->save();
            return redirect()->back()->with('success', 'Keluhan telah diblokir');
        }
        if($report->resep_id != null){
            $report->resep->delete();
            $notification = new notifications();
            $notification->user_id = $report->user_id;
            $notification->notification_from = auth()->user()->id;
            $notification->resep_id_report = 1;
            $notification->alasan = $request->alasan;
            $notification->save();
            return redirect()->back()->with('success', 'Resep telah diblokir');
        }
        if($report->feed_id != null){
            $report->feed->delete();
            $notification = new notifications();
            $notification->user_id = $report->user_id;
            $notification->notification_from = auth()->user()->id;
            $notification->veed_id_report = 1;
            $notification->alasan = $request->alasan;
            $notification->save();
            return redirect()->back()->with('success', 'Postingan telah diblokir');
        }
        if($report->profile_id != null){
            if ($report->user->foto) {
                Storage::disk('public')->delete($report->user->foto);
                $profile = $report->user;
                $profile->foto = null;
                $profile->save();
                $report->delete();

                $notification = new notifications();
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
        if($report->user->jumlah_pelanggaran > 3){
            $report->user->status = "nonaktif";
            $report->user->save();
            return redirect()->back()->with('success', 'User telah diblokir');
        }

    }
    public function blockUser($id){
        $report= Report::findOrFail($id);
        if($report->user->status == "aktif"){
            $report->user->status = "nonaktif";
            $report->user->save();
            if($report->reply_id !=null){
                $report->replies->delete();
            }
            if($report->complaint_id != null){
                $report->complaint->delete();
            }
            if($report->resep_id !=null){
                $report->resep->delete();
            }
            if($report->profile_id != null){
                Storage::disk('public')->delete($report->user->foto);
                $profile = $report->user;
                $profile->foto = null;
                $profile->save();
                $report->delete();
            }
            if($report->feed_id != null){
                $report->feed->delete();
            }
            return redirect()->back()->with('success','Pengguna berhasil diblokir');
        }else{
            return redirect()->back()->with('error','User sudah diblokir');
        }
    }
    public function blocked_index(){
        $user = User::where('status','nonaktif')->get();
        return view('admin.unblock',compact('user'));
    }
    public function unblock_store($id){
        $user = User::findOrFail($id);
        $user->status =  "aktif";
        $user->save();
        return redirect()->back()->with('success','Pengguna berhasil di unblock');
    }
    public function destroy($id){
        $report = Report::findOrFail($id);
        $report->delete();
        return redirect()->back()->with('success', 'Laporan telah dihapus');
    }
    public function storeCourse(Request $request,$id) {
        $kursus = kursus::find($id);
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
