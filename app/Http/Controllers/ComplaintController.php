<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Followers;
use App\Models\notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class ComplaintController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data yang dikirim dari formulir
        $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Ambil data pengguna yang telah login
        $user = Auth::user();

        if ($user) {
            // Buat keluhan baru dalam database
            $Complaint = new Complaint();
            $Complaint->user_id = $user->id;
            $Complaint->subject = $request->subject;
            $Complaint->description = $request->description;
            $Complaint->status = 'belum';
            $Complaint->balasan = 'Belum ada balasan';
            $Complaint->save();

            // Ambil follower_id dari pengguna yang diikuti (Followers)
            $followerIds = Followers::where('user_id', $user->id)->pluck('follower_id')->toArray();
            if ($followerIds != null) {
                foreach ($followerIds as $followerId) {
                    $notification = new Notifications([
                        'notification_from' => $user->id,
                        'Complaint_id' => $Complaint->id,
                        'follower_id' => $followerId,
                        'user_id' => $followerId,
                    ]);
                    $Complaint->notifications()->save($notification);
                }
            }
        } else {
            return redirect('keluhan')->with('error', 'Silahkan login terlebih dahulu.');
        }

        return redirect('keluhan')->with('success', 'Keluhan kamu telah terkirim.');
    }

    public function index_all()
    {
        $userId = Auth::id();
        $user = Auth::user();
        $userRole = $user->role;
        // $data=Complaint::where('user_id',$userId)->get();
        $data = Complaint::all();
        $title = "Data keluhan";
        if ($userRole == 'koki') {
            return view('Complaint.index_koki', compact('data', 'title', 'userRole'));
        } else {
            return view('Complaint.index', compact('data', 'title', 'userRole'));
        }
    }
    public function index()
    {
        $userId = Auth::id();
        $user = Auth::user();
        $userRole = $user->role;
        $data = Complaint::where('user_id', $userId)->get();
        $title = "Data keluhan";
        if ($userRole == 'koki') {
            return view('Complaint.index_koki', compact('data', 'title', 'userRole'));
        } else {
            return view('Complaint.index', compact('data', 'title', 'userRole'));
        }
    }
    public function update(Request $request, $id)
    {
        $data = Complaint::findOrFail($id);
        $data->subject = $request->subject;
        $data->status = $request->status;
        $data->balasan = $request->balasan;
        $data->description = $request->description;
        $data->save();

        return redirect()->route('ComplaintUser.index')->with('success', 'Balasan telah terkirim.');
    }
    public function destroy($id) {
        $complaint = Complaint::find($id);
        $complaint->delete();
        return redirect('/keluhan')->with('success', 'Berhasil menghapus keluhan anda');
    }
}
