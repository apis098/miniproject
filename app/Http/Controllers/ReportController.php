<?php

namespace App\Http\Controllers;

use App\Models\complaint;
use App\Models\favorite;
use App\Models\notifications;
use App\Models\Reply;
use App\Models\Report;
use App\Models\reseps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function index(){
        $data = Report::all();
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
        $show_resep = reseps::find(2);
        $title = "Data laporan pelanggaran panduan komunitas";
        return view('report.index',compact('data','title','show_resep', 'userLog','notification','unreadNotificationCount','userLogin','favorite'   ));
    }
    public function storeResep(Request $request,$id){
        $resep = reseps::findOrFail($id);
        $report = new Report();
        $report->resep_id = $resep->id;
        $report->user_id = $resep->user_id;
        $report->user_id_sender = auth()->user()->id;
        $report->description = $request->description;
        $report->save();
        return redirect()->back()->with('success','Laporan anda telah terkirim');
    }
    public function storeReply(Request $request ,$id){
        $reply = Reply::findOrFail($id);
        $report = new Report();
        $report->reply_id = $reply->id;
        $report->user_id = $reply->user_id;
        $report->user_id_sender = auth()->user()->id;
        $report->description = $request->description;
        $report->save();
        return redirect()->back()->with('success','Laporan anda telah terkirim');
    }
    public function storeComplaint(Request $request, $id){
        $complaint = complaint::findOrFail($id);
        $report = new Report();
        $report->complaint_id = $complaint->id;
        $report->user_id = $complaint->user_id;
        $report->user_id_sender = auth()->user()->id;
        $report->description = $request->description;
        $report->save();
        return redirect()->back()->with('success','Laporan anda telah terkirim');
    }
    public function store(Request $request){
        $userId = Auth::user()->id;
        $report = new Report();
        $report->user_id = $request->user_id;
        if($request->reply_id != null){
            $report->reply_id =  $request->reply_id;
        }
        if($request->profile_id != null){
            $report->profile_id = $request->profile_id;
        }
        $report->description = $request->description;
        $report->user_id_sender = $userId;
        $report->save();
        return redirect()->back()->with('success', 'Laporan pelanggaran berhasil dikirim.');
    }
    public function block($id){
        $report = Report::findOrFail($id);
        $report->user->increment('jumlah_pelanggaran');
        if($report->reply_id != null){
            $report->replies->delete();
            $notification = new notifications();
            $notification->user_id = $report->reply_id;
            $notification->notification_from = auth()->user()->id;
            $notification->reply_id_report = 1;
            $notification->save(); 
            return redirect()->back()->with('success', 'Komentar telah diblokir');
        }
        if($report->complaint_id != null){
            $report->complaint->delete();
            $notification = new notifications();
            $notification->user_id = $report->user_id;
            $notification->notification_from = auth()->user()->id;
            $notification->complaint_id_report = 1;
            $notification->save();
            return redirect()->back()->with('success', 'Keluhan telah diblokir');
        }
        if($report->resep_id != null){
            $report->resep->delete();
            $notification = new notifications();
            $notification->user_id = $report->user_id;
            $notification->notification_from = auth()->user()->id;
            $notification->resep_id_report = 1;
            $notification->save();
            return redirect()->back()->with('success', 'Resep telah diblokir');
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
                $notification->save();  
                return redirect()->back()->with('success', 'Foto profile telah diblokir');
            } else {
                return redirect()->back()->with('error', 'Tidak ada foto profile yang perlu dihapus ');
            }
        }
        if($report->user->jumlah_pelanggaran > 10){
            $report->user->status = "nonaktif";
            $report->user->save();
            return redirect()->back()->with('success', 'User telah diblokir');
        }
    
    }
    public function destroy($id){
        $report = Report::findOrFail($id);
        $report->delete();
        return redirect()->back()->with('success', 'Laporan telah dihapus');
    }
}
