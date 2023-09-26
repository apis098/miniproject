<?php

namespace App\Http\Controllers;

use App\Models\ChMessage;
use App\Models\favorite;
use App\Models\footer;
use App\Models\kursus;
use App\Models\notifications;
use App\Models\paket_kursuses;
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
        return view('koki.kursus', compact('messageCount', 'notification', 'footer', 'unreadNotificationCount', 'userLogin', 'favorite'));
    }



    public function kursus()
    {
        $all_course = kursus::where("status", "ditunggu")->get();
        return view('admin.kursus', compact("all_course"));
    }

    public function eksekusi_kursus(string $status, string $id)
    {
        $update_status = kursus::find($id);
        $update_status->status = $status;
        $update_status->save();
        return redirect()->back()->with('success', 'sukses mengeksekusi kursus!');
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
            'tipe_kursus' => "required",
            "paket_kursus_waktu.*" => "required",
            "informasi_paket_kursus_waktu.*" => "required",
            "paket_kursus_harga.*" => "required"
        ];
        $message = [
            'nama_kursus.required' => "nama kursus wajib diisi!",
            'foto_kursus.required' => "foto kursus wajib diisi!",
            'deskripsi_kursus.required' => "deskripsi kursus wajib diisi!",
            'lokasi_kursus.required' => "lokasi kursus wajib diisi!",
            'tarif_per_jam.required' => "tarif per jam wajib diisi!",
            'tipe_kursus.required' => "tipe kursus wajib diisi!",
            "paket_kursus_waktu.*.required" => "paket kursus bagian waktu belum terisi semua!",
            "informasi_paket_kursus_waktu.*.required" => "informasi paket kursus waktu belum terisi semua!",
            "paket_kursus_harga.*.required" => "paket kursus bagian harga belum terisi semua!"
        ];
        $validasi = Validator::make($request->all(), $rules, $message);
        if ($validasi->fails()) {
            return response()->json($validasi->errors()->first(), 422);
        }
        $store = kursus::create([
            "users_id" => Auth::user()->id,
            "nama_kursus" => $request->nama_kursus,
            "foto_kursus" => $request->file("foto_kursus")->store("photo-courses", "public"),
            "deskripsi_kursus" => $request->deskripsi_kursus,
            "lokasi_kursus" => $request->lokasi_kursus,
            "tarif_per_jam" => $request->tarif_per_jam,
            "tipe_kursus" => $request->tipe_kursus,
            "jenis_kursus" => $request->jenis_kursus
        ]);
        if ($store) {
            foreach ($request->paket_kursus_waktu as $num => $waktu) {
                if ($request->informasi_paket_kursus_waktu[$num] === "jam") {
                    $waktu *= 60;
                }

                paket_kursuses::create([
                    "kursus_id" => $store->id,
                    "waktu" => $waktu,
                    "harga" => $request->paket_kursus_harga[$num]
                ]);
            }
            paket_kursuses::create([]);
            return response()->json([
                "success" => true,
                "message" => "sukses menambahkan kursus, harap menunggu konfirmasi admin.",
            ]);
        } else {
            return response()->json([
                "success" => false,
            ]);
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
