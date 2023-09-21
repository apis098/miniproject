<?php

namespace App\Http\Controllers;

use App\Models\ChMessage;
use App\Models\favorite;
use App\Models\footer;
use App\Models\kursus;
use App\Models\notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KursusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userLogin = Auth::user();
        $notification = [];
        $favorite = [];
        $footer = footer::first();
        $unreadNotificationCount = [];
        $messageCount = [];
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
        if ($userLogin) {
            $notification = notifications::where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'desc') // Urutkan notifikasi berdasarkan created_at terbaru
                ->paginate(10); // Paginasi notifikasi dengan 10 item per halaman
            $unreadNotificationCount = notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
        }
        if ($userLogin) {
            $favorite = favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        return view('koki.kursus', compact('messageCount','notification', 'footer', 'unreadNotificationCount', 'userLogin', 'favorite'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nama_kursus' => "required",
            'foto_kursus' => "required|image|mimes:png,jpg,jpeg|max:50000",
            'deskripsi_kursus' => "required",
            'lokasi_kursus' => "required",
            'tarif_per_jam' => "required",
            'jumlah_pelajaran' => "required",
            'tipe_kursus' => "required", 
            'lama_kursus' => "required",
        ];
        $message = [
            'nama_kursus.required' => "nama kursus wajib diisi!",
            'foto_kursus.required' => "foto kursus wajib diisi!",
            'deskripsi_kursus.required'=> "deskripsi kursus wajib diisi!",
            'lokasi_kursus.required' => "lokasi kursus wajib diisi!",
            'tarif_per_jam.required' => "tarif per jam wajib diisi!",
            'jumlah_pelajaran.required' => "jumlah pelajaran wajib diisi!",
            'tipe_kursus.required' => "tipe kursus wajib diisi!",
            'lama_kursus.required' => "lama kursus wajib diisi!",
        ];
        $validasi = Validator::make($request->all(), $rules, $message);
        if ($validasi->fails()) {
            return response()->json($validasi->errors()->first(), 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(kursus $kursus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kursus $kursus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kursus $kursus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kursus $kursus)
    {
        //
    }
}
