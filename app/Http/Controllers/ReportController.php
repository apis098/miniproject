<?php

namespace App\Http\Controllers;

use App\Models\notifications;
use App\Models\Reply;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function index(){
        $data = Report::all();
        $title = "Data laporan pelanggaran panduan komunitas";
        return view('report.index',compact('data','title'));
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
            $notification->reply_id_report = $report->reply_id;
            $notification->save(); 
            return redirect()->back()->with('success', 'Komentar telah diblokir');
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
