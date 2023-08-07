<?php

namespace App\Http\Controllers;

use App\Models\complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class complaintController extends Controller
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
            $complaint = new complaint();
            $complaint->user_id = $user->id;
            $complaint->subject = $request->subject;
            $complaint->description = $request->description;
            $complaint->status = 'belum';
            $complaint->balasan = 'Belum ada balasan';
            $complaint->save();
        }else{
            return redirect('/')->with('error','Silahkan login terlebih dahulu.');
        }
        return redirect('/')->with('success','Keluhan kamu telah terkirim.');
    }
    public function index(){
        $data=complaint::all();
        $title="Data keluhan";
        return view('complaint.index',compact('data','title'));
    }
    public function update(Request $request,$id){
        $data=complaint::findOrFail($id);
        $data->subject = $request->subject;
        $data->status = $request->status;
        $data->balasan = $request->balasan;
        $data->description = $request->description;
        $data->save();

        return redirect()->route('ComplaintUser.index')->with('success','Balasan telah terkirim.');
    }
}