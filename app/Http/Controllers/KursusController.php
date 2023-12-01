<?php

namespace App\Http\Controllers;

use App\Models\ChMessage;
use App\Models\favorite;
use App\Models\footer;
use App\Models\jenis_kursuses;
use App\Models\kursus;
use App\Models\notifications;
use App\Models\paket_kursuses;
use App\Models\pivot_jenis_kursuses;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\sessionCourses;
use App\Models\TopUpCategories;
use App\Models\Village;
use Carbon\Carbon;
use App\Models\detailSessionCourses;
use App\Models\User;

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
                ->where('status', 'belum')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $unreadNotificationCount = notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
        }
        if ($userLogin) {
            $favorite = favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        return view('kursus.index', compact('messageCount', 'notification', 'footer', 'unreadNotificationCount', 'userLogin', 'favorite'));
    }

    public function kursus_template(Request $request)
    {
        // validasi filter
        if ($request->min_time != NULL && $request->max_time != NULL) {
            if ($request->min_timer === 'jam') {
                $request->merge(["min_time" => $request->min_time * 60]);
            }
            if ($request->max_timer === 'jam') {
                $request->merge(["max_time" => $request->max_time * 60]);
            }
        }
        $validator  = Validator::make($request->all(), [
            'min_price' => 'lte:max_price|required_with:max_price',
            'max_price' => 'required_with:min_price',
            'min_time' => 'lte:max_time|required_with:max_time',
            'max_time' => 'required_with:min_time'
        ], [
            'min_price.lte' => 'Minimal harga tidak boleh melebihi maksimal harga!',
            'min_time.lte' => 'Minimal waktu tidak boleh melebihi maksimal waktu!',
            'min_price.required_with' => "Maksimal harga harus terisi!",
            "max_price.required_with" => "Minimal harga harus terisi!",
            "min_time.required_with" => "Maksimal waktu harus terisi!",
            "max_time.required_with" => "Minimal waktu harus terisi!"
        ]);
        if ($validator->fails()) {
            //return redirect()->back()->withErrors($validator);
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        $userLogin = Auth::user();
        $notification = [];
        $favorite = [];
        $footer = footer::first();
        $unreadNotificationCount = [];
        $categorytopup  =  TopUpCategories::all();
        $messageCount = [];
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
        if ($userLogin) {
            $notification = notifications::where('user_id', auth()->user()->id)
                ->where('status', 'belum')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $unreadNotificationCount = notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
        }
        if ($userLogin) {
            $favorite = favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        $semua_kursuss = kursus::query();
        $kursus_terbaruu = kursus::query();
        $kursus_favorite = kursus::query();
        $kursus_rating = kursus::query();
        $semua_kursuss->where('status', 'diterima');
        $kursus_terbaruu->where('status', 'diterima')->whereDate('waktu_diterima', today());
        $kursus_favorite = kursus::orderBy('jumlah_favorite', 'desc');
        $kursus_rating = kursus::orderBy('rating_asli', 'desc');
        if ($request->cari_nama_kursus) {
            $semua_kursuss->where('nama_kursus', 'like', '%' . $request->cari_nama_kursus . '%');
            $kursus_terbaruu->where('nama_kursus', 'like', '%' . $request->cari_nama_kursus . '%');
            $kursus_favorite->where('nama_kursus', 'like', '%' . $request->cari_nama_kursus . '%');
            $kursus_rating->where('nama_kursus', 'like', '%' . $request->cari_nama_kursus . '%');
        }
        if ($request->has('jenis_kursus')) {
            $jenis_kursus = $request->jenis_kursus;
            $semua_kursuss->whereHas('jenis_kursus', function ($query) use ($jenis_kursus) {
                $query->whereIn('jenis_kursus', $jenis_kursus);
            });
            $kursus_terbaruu->whereHas('jenis_kursus', function ($q) use ($jenis_kursus) {
                $q->whereIn('jenis_kursus', $jenis_kursus);
            });
            $kursus_favorite->whereHas('jenis_kursus', function ($query) use ($jenis_kursus) {
                $query->whereIn('jenis_kursus', $jenis_kursus);
            });
            $kursus_rating->whereHas('jenis_kursus', function ($query) use  ($jenis_kursus) {
                $query->whereIn('jenis_kursus', $jenis_kursus);
            });
        }
        if ($request->min_price != NULL && $request->max_price != NULL) {
            $minprice = str_replace(['.', ','], '', $request->min_price);
            $maxprice = str_replace(['.', ','], '', $request->max_price);
            $min_price = (int)$minprice;
            $max_price = (int)$maxprice;
            $semua_kursuss->whereHas('sesi', function ($query) use ($min_price, $max_price) {
                $query->whereBetween('harga_sesi', [$min_price, $max_price]);
            });
            $kursus_terbaruu->whereHas('sesi', function ($query) use ($min_price, $max_price) {
                $query->whereBetween('harga_sesi', [$min_price, $max_price]);
            });
            $kursus_favorite->whereHas('sesi', function ($query) use ($min_price, $max_price) {
                $query->whereBetween('harga_sesi', [$min_price, $max_price]);
            });
            $kursus_rating->whereHas('sesi', function ($query) use ($min_price, $max_price) {
                $query->whereBetween('harga_sesi', [$min_price, $max_price]);
            });
        }
        if ($request->min_time != NULL && $request->max_time != NULL) {
            $lama_min = $request->min_time;
            $lama_max = $request->max_time;

            //dd($lama_min . " - " . $lama_max);
            $semua_kursuss->whereHas('sesi', function ($queery) use ($lama_min, $lama_max) {
                $queery->whereBetween('lama_sesi', [$lama_min, $lama_max]);
            });
            $kursus_terbaruu->whereHas('sesi', function ($quuery) use ($lama_min, $lama_max) {
                $quuery->whereBetween('lama_sesi', [$lama_min, $lama_max]);
            });
            $kursus_favorite->whereHas('sesi', function ($query) use ($lama_min, $lama_max) {
                $query->whereBetween('lama_sesi', [$lama_min, $lama_max]);
            });
            $kursus_rating->whereHas('sesi', function ($query) use ($lama_min, $lama_max) {
                $query->whereBetween('lama_sesi', [$lama_min, $lama_max]);
            });
        }
        if ($request->rating) {
            $rate = $request->rating;
            $semua_kursuss->where('rating', $rate);
            $kursus_terbaruu->where('rating', $rate);
            $kursus_favorite->where('rating', $rate);
            $kursus_rating->where('rating', $rate);
        }
        $jenis_kursus = jenis_kursuses::pluck('jenis_kursus')->unique();
        $provinsi = Province::pluck('name');
        $regency = Regency::pluck('name');
        $district = District::pluck('name');
        $village = Village::pluck('name');
        $lokasi_kursus = $semua_kursuss->get()->map(function ($posisi) {
            return [
                'latitude' => $posisi->latitude,
                'longitude' => $posisi->longitude,
                'id_kursus' => $posisi->id,
                'nama_kursus' => $posisi->nama_kursus
            ];
        });
        $semua_kursus = $semua_kursuss->paginate(6);
        $kursus_terbaru = $kursus_terbaruu->paginate(6);
        $kursus_terfavorite = $kursus_favorite->paginate(6);
        $kursus_terbaik = $kursus_rating->paginate(6);
        return view('template.kursus', compact('kursus_terfavorite', 'kursus_terbaik','categorytopup', 'district', 'village', 'regency', 'provinsi', 'jenis_kursus', 'lokasi_kursus', 'kursus_terbaru', 'semua_kursus', 'messageCount', 'notification', 'footer', 'unreadNotificationCount', 'userLogin', 'favorite'));
    }

    public function kursus()
    {
        $all_course = kursus::where("status", "ditunggu")->get();
        $verifed_count = User::where('isSuperUser', 'no')->where('followers','>',10000)->where('role','koki')->count();
        return view('admin.kursus', compact("all_course",'verifed_count'));
    }

    public function eksekusi_kursus(Request $request,string $status, string $id)
    {
        $update_status = kursus::find($id);
        if ($status === 'diterima') {
            $update_status->status = $status;
            $currentTime = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
            $update_status->waktu_diterima = $currentTime->format('Y-m-d H:i:s');
            // create notification
            $notifikasi = notifications::create([
                'user_id' => $update_status->user->id,
                'notification_from' => Auth::user()->id,
                'message' => 'Selamat kursus anda diterima!',
                'categories' => 'kursus',
                'kursus_id' => $id
            ]);
            $update = notifications::findOrFail($notifikasi->id);
            $update->route = '/status-baca/kursus/'.$notifikasi->id;
            $update->save();
        } else if ($status === "ditolak") {
            kursus::find($id)->delete();
             // create notification
             $notifikasi = notifications::create([
                'user_id' => $update_status->user->id,
                'notification_from' => Auth::user()->id,
                'message' => 'Kursus anda tidak diterima!',
                'alasan' => $request->alasan,
                'categories' => 'kursus',
                'kursus_id' => $id
            ]);
            $update = notifications::findOrFail($notifikasi->id);
            $update->route = '/status-baca/kursus/'.$notifikasi->id;
            $update->save();
        }
        $update_status->save();
        return redirect()->back()->with('success', 'sukses mengeksekusi kursus!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userLogin = Auth::user();
        $notification = [];
        $favorite = [];
        $footer = footer::first();
        $unreadNotificationCount = [];
        $categorytopup  =  TopUpCategories::all();
        $messageCount = [];
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
        if ($userLogin) {
            $notification = notifications::where('user_id', auth()->user()->id)
                ->where('status', 'belum')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $unreadNotificationCount = notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
        }
        if ($userLogin) {
            $favorite = favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        return view('kursus.index', compact('categorytopup', 'messageCount', 'notification', 'unreadNotificationCount', 'userLogin', 'footer', 'favorite'));
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
            'nama_lokasi' => "required",
            'latitude' => "required",
            'longitude' => "required",
            'tipe_kursus' => "required",
            'jumlah_siswa' => "required",
            "paket_kursus_waktu.*" => "required",
            "jenis_kursus" => "required",
            "tanggal_dimulai_kursus" => "required",
            "tanggal_berakhir_kursus" => "required"
        ];
        $message = [
            'nama_kursus.required' => "nama kursus wajib diisi!",
            'foto_kursus.required' => "foto kursus wajib diisi!",
            'deskripsi_kursus.required' => "deskripsi kursus wajib diisi!",
            'nama_lokasi.required' => "lokasi kursus wajib diisi!",
            'latitude.required' => 'latitude harus terisi!',
            'longitude.required' => 'longitude harus terisi',
            'tipe_kursus.required' => "tipe kursus wajib diisi!",
            'jumlah_siswa.required' => "jumlah siswa harus diisi!",
            'jenis_kursus.required' => "jenis kursus harus diisi!",
            'tanggal_dimulai_kursus.required' => 'tanggal dimulai kursus harus diisi!',
            'tanggal_berakhir_kursus.required' => 'tanggal berakhir kursus harus diisi!',
        ];
        $validasi = Validator::make($request->all(), $rules, $message);
        if ($validasi->fails()) {
            return response()->json($validasi->errors()->first(), 422);
        }
        $tanggal_dimulai_kursus = Carbon::parse($request->tanggal_dimulai_kursus);
        $tanggal_berakhir_kursus = Carbon::parse($request->tanggal_berakhir_kursus);
        $tanggal_saat_ini = Carbon::now();
        // gt untuk menilai apakah tanggal dimulai kursus lebih besar dari tanggal saat ini jika tidak maka nilai yang kurang akan minus
        if($tanggal_dimulai_kursus->gt($tanggal_saat_ini)) {
        $selisih_tanggal = $tanggal_dimulai_kursus->diffInDays($tanggal_saat_ini);
        } else {
            $selisih_tanggal =  -$tanggal_dimulai_kursus->diffInDays($tanggal_saat_ini);
        }
        if($tanggal_berakhir_kursus->gt($tanggal_dimulai_kursus)) {
        $selisih_tanggal2 = $tanggal_berakhir_kursus->diffInDays($tanggal_dimulai_kursus);
        } else {
            $selisih_tanggal2 = -$tanggal_berakhir_kursus->diffInDays($tanggal_dimulai_kursus);

        }
        if ($selisih_tanggal <= 7) {
            return response()->json([
                'success' => false,
                'message' => 'Tanggal yang diinputkan minimal 9 hari dari tanggal sekarang!',
            ]);
        }
        if ($selisih_tanggal2 < 1) {
            return response()->json([
                'success' => false,
                'message' => 'Tanggal berakhir kursus tidak boleh kurang dari tanggal dimulai kursus!',
            ]);
        }
        $tanggal_berakhir_kursus = Carbon::parse($request->tanggal_berakhir_kursus);
        $selisih_tanggal2 = $tanggal_berakhir_kursus->diffInDays($tanggal_dimulai_kursus);
        if ($selisih_tanggal2 < 0) {
            return response()->json([
                'success' => false,
                'message' => 'Tanggal berakhir kurus tidak boleh kurang dari tanggal dimulai kursus!'
            ]);
        }
        $tambah_kursus = kursus::create([
            "users_id" => Auth::user()->id,
            "nama_kursus" => $request->nama_kursus,
            "foto_kursus" => $request->file("foto_kursus")->store("photo-courses", "public"),
            "deskripsi_kursus" => $request->deskripsi_kursus,
            "nama_lokasi" => $request->nama_lokasi,
            "latitude" => $request->latitude,
            "longitude" => $request->longitude,
            "tipe_kursus" => $request->tipe_kursus,
            "jumlah_siswa" => $request->jumlah_siswa,
            "tanggal_dimulai_kursus" => $request->tanggal_dimulai_kursus,
            "tanggal_berakhir_kursus" => $request->tanggal_berakhir_kursus,
        ]);
        if ($tambah_kursus) {
            jenis_kursuses::create([
                'id_kursus' => $tambah_kursus->id,
                'jenis_kursus' => $request->jenis_kursus
            ]);

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
    public function edit(string $id)
    {
        $userLogin = Auth::user();
        $notification = [];
        $favorite = [];
        $footer = footer::first();
        $unreadNotificationCount = [];
        $categorytopup  =  TopUpCategories::all();
        $messageCount = [];
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
        if ($userLogin) {
            $notification = notifications::where('user_id', auth()->user()->id)
                ->where('status', 'belum')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $unreadNotificationCount = notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
        }
        if ($userLogin) {
            $favorite = favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        $kursus = kursus::find($id);
        return view('kursus.kursus-edit', compact('kursus', 'categorytopup', 'messageCount', 'notification', 'footer', 'unreadNotificationCount', 'userLogin', 'favorite'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'nama_kursus' => "required",
            'foto_kursus' => "image|mimes:png,jpg,jpeg|max:50000",
            'deskripsi_kursus' => "required",
            'nama_lokasi' => "required",
            'latitude' => "required",
            'longitude' => "required",
            'tipe_kursus' => "required",
            'jumlah_siswa' => "required",
            "jenis_kursus" => "required",
            "tanggal_dimulai_kursus" => "required",
            "tanggal_berakhir_kursus" => "required"
        ];
        $message = [
            'nama_kursus.required' => "nama kursus wajib diisi!",
            'deskripsi_kursus.required' => "deskripsi kursus wajib diisi!",
            'nama_lokasi.required' => "lokasi kursus wajib diisi!",
            'latitude.required' => 'latitude harus terisi!',
            'longitude.required' => 'longitude harus terisi',
            'tipe_kursus.required' => "tipe kursus wajib diisi!",
            'jumlah_siswa.required' => "jumlah siswa harus diisi!",
            "jenis_kursus.required" => "jenis_kursus harus diisi!",
            "tanggal_dimulai_kursus.required" => "tanggal dimulai kursus wajib diisi!",
            "tanggal_berakhir_kursus.required" => "tanggal berakhir kursus wajib diisi!"
        ];
        $validasi = Validator::make($request->all(), $rules, $message);
        if ($validasi->fails()) {
            return response()->json($validasi->errors()->first(), 422);
        }
        $tanggal_dimulai_kursus = Carbon::parse($request->tanggal_dimulai_kursus);
        $tanggal_saat_ini = Carbon::now();
        if($tanggal_dimulai_kursus->gt($tanggal_saat_ini)) {
        $selisih_tanggal = $tanggal_dimulai_kursus->diffInDays($tanggal_saat_ini);
        } else {
            $selisih_tanggal = -$tanggal_dimulai_kursus->diffInDays($tanggal_saat_ini);
        }
        if ($selisih_tanggal <= 7) {
            return response()->json([
                'success' => false,
                'message' => 'Tanggal yang diinputkan minimal 9 hari dari tanggal sekarang!',
            ]);
        }
        $tanggal_berakhir_kursus = Carbon::parse($request->tanggal_berakhir_kursus);
        if($tanggal_berakhir_kursus->gt($tanggal_dimulai_kursus)) {
        $selisih_tanggal2 = $tanggal_berakhir_kursus->diffInDays($tanggal_dimulai_kursus);
        } else {
            $selisih_tanggal2 = -$tanggal_berakhir_kursus->diffInDays($tanggal_dimulai_kursus);
        }
        if ($selisih_tanggal2 < 0) {
            return response()->json([
                'success' => false,
                'message' => 'Tanggal berakhir kurus tidak boleh kurang dari tanggal dimulai kursus!'
            ]);
        }
        $edit_kursus = kursus::find($id);
        $edit_kursus->nama_kursus = $request->nama_kursus;
        if ($request->hasFile('foto_kursus')) {
            Storage::delete("public/" . $edit_kursus->foto_kursus);
            $edit_kursus->foto_kursus = $request->file('foto_kursus')->store('photo-course', 'public');
        }
        $edit_kursus->deskripsi_kursus = $request->deskripsi_kursus;
        $edit_kursus->nama_lokasi = $request->nama_lokasi;
        $edit_kursus->latitude = $request->latitude;
        $edit_kursus->longitude = $request->longitude;
        $edit_kursus->tipe_kursus = $request->tipe_kursus;
        $edit_kursus->jumlah_siswa = $request->jumlah_siswa;
        $edit_kursus->tanggal_dimulai_kursus = $request->tanggal_dimulai_kursus;
        $edit_kursus->tanggal_berakhir_kursus = $request->tanggal_berakhir_kursus;
        $edit_kursus->save();
        $jenisKursus = jenis_kursuses::where('id_kursus', $edit_kursus->id)->first();
        $jenisKursus->jenis_kursus = $request->jenis_kursus;
        $jenisKursus->save();
        return response()->json([
            "success" => true,
            "message" => "sukses mengedit kursus!"
        ]);
    }

    public function tambahSesi(Request $request)
    {
        $rules = [
            "judul_sesi" => "required",
            "lama_sesi" => "required|min:0",
            "informasi_lama_sesi" => "required",
            "harga_sesi" => "required|min:0|numeric",
            "tanggal" => "required",
            "waktu" => "required"
        ];
        $messages = [
            "judul_sesi.required" => "Judul sesi harus diisi!",
            "lama_sesi.required" => "Lama sesi wajib diisi!",
            "lama_sesi.min" => "Lama sesi tidak boleh minus!",
            "informasi_lama_sesi.required" => "Informasi lama sesi wajib diisi!",
            "harga_sesi.required" => "Harga sesi wajib diisi!",
            "harga_sesi.min" => "Harga sesi tidak boleh minus!",
            "tanggal.required" => "Tanggal sesi dimulai harus diisi!",
            "waktu.required" => "Waktu sesi harus diisi!"
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json($validator->errors()->first(), 422);
            //return redirect()->back()->with('error', $validator->errors()->first());
        }
        if ($request->informasi_lama_sesi === "menit") {
            $lama_sesi = $request->lama_sesi;
        } else if ($request->informasi_lama_sesi === "jam") {
            $lama_sesi = $request->lama_sesi * 60;
        }
        sessionCourses::create([
            "course_id" => $request->course_id,
            "judul_sesi" => $request->judul_sesi,
            "lama_sesi" => $lama_sesi,
            "informasi_lama_sesi" => $request->informasi_lama_sesi,
            "harga_sesi" => $request->harga_sesi,
            "tanggal" => $request->tanggal,
            "waktu" => $request->waktu
        ]);
        return response()->json([
            "success" => true,
            "message" => "Sukses menambahkan sesi!"
        ]);
        //return redirect()->back()->with('success', 'Sukses menambahkan sesi konten!');
    }
    public function updateSesi(Request $request, string $id)
    {
        $rules = [
            "judul_sesi" => "required",
            "lama_sesi" => "required|min:0",
            "informasi_lama_sesi" => "required",
            "harga_sesi" => "required",
            "tanggal" => "required",
            "waktu" => "required"
        ];
        $messages = [
            "judul_sesi.required" => "Judul sesi harus diisi!",
            "lama_sesi.required" => "Lama sesi harus diisi!",
            "lama_sesi.min" => "Lama sesi tidak boleh minus!",
            "informasi_lama_sesi.required" => "Informasi lama sesi tidak boleh kosong!",
            "harga_sesi.required" => "Harga sesi harus diisi!",
            "tanggal.required" => "Tanggal sesi harus diisi!",
            "waktu.required" => "Waktu sesi harus diisi!",
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json($validator->errors()->first(), 422);
        }
        $sesi_kursus = sessionCourses::findOrFail($id);
        $sesi_kursus->judul_sesi = $request->judul_sesi;
        $sesi_kursus->lama_sesi = $request->lama_sesi;
        $sesi_kursus->informasi_lama_sesi = $request->informasi_lama_sesi;
        $sesi_kursus->harga_sesi = $request->harga_sesi;
        $sesi_kursus->tanggal = $request->tanggal;
        $sesi_kursus->waktu = $request->waktu;
        $sesi_kursus->save();

        return response()->json([
            "success" => true,
            "message" => "Sukses mengupdate sesi kursus!",
            "judul_sesi_baru" => $sesi_kursus->judul_sesi,
            "lama_sesi_baru" => $sesi_kursus->lama_sesi,
            "informasi_lama_sesi_baru" => $sesi_kursus->informasi_lama_sesi,
            "harga_sesi_baru" => $sesi_kursus->harga_sesi,
            "harga_sesi_baru_format" => number_format($sesi_kursus->harga_sesi, 2, ',', '.'),
            "tanggal" => $request->tanggal,
            "waktu" => $request->waktu
        ]);
    }
    public function hapusSesi(string $id)
    {
        $sesi_kursus = sessionCourses::findOrFail($id);
        $sesi_kursus->delete();
        return response()->json([
            "success" => true,
            "message" => "Sukses menghapus sesi kursus!"
        ]);
    }
    public function tambahDetailSesi(Request $request, string $id)
    {
        $rules = [
            "detail_sesi" => "required",
            "lama_sesi" => "required|min:0",
            "informasi_lama_sesi" => "required",
        ];
        $messages = [
            "detail_sesi.required" => "Detail sesi kursus wajib diisi!",
            "lama_sesi.required" => "Lama sesi kursus wajib diisi!",
            "lama_sesi.min" => "Lama sesi tidak boleh minus!",
            "informasi_lama_sesi.required" => "Informasi lama sesi wajib diisi!",
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json($validator->errors()->first(), 422);
        }
        $detail = detailSessionCourses::create([
            "session_course_id" => $id,
            "detail_sesi" => $request->detail_sesi,
            "lama_sesi" => $request->lama_sesi,
            "informasi_lama_sesi" => $request->informasi_lama_sesi,
        ]);
        $nomer = detailSessionCourses::where("session_course_id", $id)->count();
        if ($request->lama_sesi >= 60) {
            $lama_sesi = $request->lama_sesi / 60;
        } else {
            $lama_sesi = $request->lama_sesi;
        }

        return response()->json([
            "success" => true,
            "message" => "Sukses menambahkan detail kursus anda!",
            "nomer" => $nomer,
            "id" => $detail->id,
            "detail_sesi" => $request->detail_sesi,
            "lama_sesi" => $lama_sesi,
            "informasi_lama_sesi" => $request->informasi_lama_sesi,
        ]);
    }
    public function updateDetailSesi(Request $request, string $id)
    {
        $rules = [
            "detail_sesi" => "required",
            "lama_sesi" => "required|min:0",
            "informasi_lama_sesi" => "required",
        ];
        $messages = [
            "detail_sesi.required" => "Detail sesi kursus wajib diisi!",
            "lama_sesi.required" => "Lama sesi kursus wajib diisi!",
            "lama_sesi.min" => "Lama sesi tidak boleh minus!",
            "informasi_lama_sesi.required" => "Informasi lama sesi wajib diisi!",
        ];
        $validator = Validator::make(request()->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json($validator->errors()->first(), 422);
        }
        $detail_sesi = detailSessionCourses::findOrFail($id);
        $detail_sesi->detail_sesi = $request->detail_sesi;
        $detail_sesi->lama_sesi = $request->lama_sesi;
        $detail_sesi->informasi_lama_sesi = $request->informasi_lama_sesi;
        $detail_sesi->save();
        $count = detailSessionCourses::where("session_course_id", $detail_sesi->id)->count();
        if ($request->lama_sesi >= 60) {
            $lama_sesi = $request->lama_sesi / 60;
        } else {
            $lama_sesi = $request->lama_sesi;
        }
        return response()->json([
            "success" => true,
            "message" => "Sukses mengupdate detail sesi kursus!",
            "nomer" => $count,
            "detail_sesi" => $request->detail_sesi,
            "lama_sesi" => $lama_sesi,
            "informasi_lama_sesi" => $request->informasi_lama_sesi,
            "id" => $detail_sesi->id,
        ]);
    }
    public function hapusDetailSesi(string $id)
    {
        $data = detailSessionCourses::find($id);
        $data->delete();
        return response()->json([
            "success" => true,
            "message" => "Sukses menghapus data!"
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kursus $kursus)
    {
        //
    }
    public function favoriteKursus($chef, $course)
    {
        $check = favorite::where('user_id_from', Auth::user()->id)->where('kursus_id', $course)->where('user_id', $chef)->exists();
        $kursus = kursus::find($course);
        if ($check) {
            $data = favorite::where('user_id_from', Auth::user()->id)->where('kursus_id', $course)->where('user_id', $chef)->first();
            $data->delete();
            $kursus->jumlah_favorite = $kursus->jumlah_favorite - 1;
            $kursus->save();
            return response()->json([
                'favorite' => false,
                'unfavorite' => true,
            ]);
        } else {
            favorite::create([
                'kursus_id' => $course,
                'user_id' => $chef,
                'user_id_from' => Auth::user()->id
            ]);
            $kursus->jumlah_favorite = $kursus->jumlah_favorite + 1;
            $kursus->save();
            return response()->json([
                'favorite' => true,
                'unfavorite' => false,
            ]);
        }
    }
}
