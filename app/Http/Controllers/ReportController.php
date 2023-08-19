<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index(){
        $data = Report::all();
        $title = "Data laporan pelanggaran panduan komunitas";
        return view('report.index',compact('data','title'));
    }
    public function store(Request $request){
        $userId = Auth::user()->id;
        // $repliesId= Reply::findOrFail($id);
        $report = new Report();
        $report->user_id = $request->user_id;
        $report->reply_id =  $request->reply_id;
        $report->description = $request->description;
        $report->user_id_sender = $userId;
        $report->save();
        return redirect()->back()->with('success', 'Laporan pelanggaran berhasil dikirim.');
    }
    public function block($id){
        $reply = Reply::findOrFail($id);
        $reply->user->increment('jumlah_pelanggaran');
        $reply->delete();
        if($reply->user->jumlah_pelanggaran > 10){
            $reply->user->delete();
            return redirect()->back()->with('success', 'User telah diblokir');
        }
        return redirect()->back()->with('success', 'Komentar telah diblokir');
    }
    public function destroy($id){
        $report = Report::findOrFail($id);
        $report->delete();
        return redirect()->back()->with('success', 'Laporan telah dihapus');
    }
}
