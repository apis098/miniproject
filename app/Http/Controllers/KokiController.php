<?php

namespace App\Http\Controllers;

use App\Models\ChMessage;
use App\Models\CommentResipes;
use App\Models\CommentFeed;
use App\Models\Complaint;
use App\Models\Favorite;
use App\Models\Followers;
use App\Models\Footer;
use App\Models\IncomeChefs;
use App\Models\Kursus;
use App\Models\Likes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Notifications;
use App\Models\Reseps;
use App\Models\UploadVideo;
use App\Models\Report;
use App\Models\SessionsCourses;
use App\Models\TopUpCategories;
use App\Models\User;
use Carbon\Carbon;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\Filters\Video\VideoFilters;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use PhpParser\Node\Stmt\TryCatch;
use App\Models\TransaksiKursus;
use App\Models\UlasanKursus;
use App\Models\balasKomentar;
use App\Models\DataPribadiKoki;
use App\Models\Penarikans;

class KokiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resep_sendiri = Reseps::where("user_id", Auth::user()->id)->get();
        $recipes = Reseps::where("user_id", Auth::user()->id)->take(6)->get();
        $videos = UploadVideo::where("users_id", Auth::user()->id)->take(6)->get();
        $userLogin = Auth::user();
        $footer = Footer::first();
        $notification = [];
        $Favorite = [];
        $unreadNotificationCount = [];
        $categorytopup = TopUpCategories::all();
        $messageCount = [];
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
        if ($userLogin) {
            $notification = Notifications::where('user_id', auth()->user()->id)
                ->where('status', 'belum')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $unreadNotificationCount = Notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
        }
        if ($userLogin) {
            $favorite = Favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        $kursus = Kursus::where('users_id', Auth::user()->id)->where('status', 'diterima')->take(6)->get();
        return view('koki.profile', compact('categorytopup', 'kursus', 'messageCount', 'recipes', 'videos', 'notification', 'footer', 'resep_sendiri', 'unreadNotificationCount', 'userLogin', 'favorite'));
    }
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validasi = Validator::make($request->all(), ["profile_picture" => "image|mimes:png,jpg,jpeg,gif|max:10000"], [
            "profile_picture.image" => "Foto profile tidak berupa gambar!",
            "profile_picture.mimes" => "Foto profile tidak berekstensi png atau jpg atau jpge atau gif!",
            "profile_picture.max" => "Foto profile maksimal 10MB!",
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->with('error', $validasi->errors()->first());
        }

        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture if exists
            if ($user->foto) {
                Storage::disk('public')->delete($user->foto);
            }

            // Upload new profile picture
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            // Lakukan penyesuaian gambar (misalnya, memotong)
            $croppedImage = Image::make(public_path("storage/{$profilePicturePath}"))
                ->fit(576, 576); // Ubah ukuran sesuai kebutuhan

            // Simpan gambar yang telah diubah
            $croppedImage->save();

            $user->foto = $profilePicturePath;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->has('biodata')) {
            $user->biodata = $request->biodata;
        }
        $user->save();

        return redirect()->back()->with('success', 'Sukses mengupdate profil anda.');
    }

    public function profilage(Request $request)
    {
        $userLogin = Auth::user();
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
        $categorytopup = TopUpCategories::all();
        $messageCount = [];
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
        if ($userLogin) {
            $notification = Notifications::where('user_id', auth()->user()->id)
                ->where('status', 'belum')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $unreadNotificationCount = Notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
        }
        if ($userLogin) {
            $favorite = Favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }


        return view('koki.profilage', compact('categorytopup', 'messageCount', 'notification', 'unreadNotificationCount', 'userLogin', 'favorite'));
    }

    public function feed(Request $request)
    {
        $userLogin = Auth::user();
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
        $messageCount = [];
        $categorytopup = TopUpCategories::all();
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
        if ($userLogin) {
            $notification = Notifications::where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'desc') // Urutkan notifikasi berdasarkan created_at terbaru
                ->paginate(10); // Paginasi notifikasi dengan 10 item per halaman
            $unreadNotificationCount = Notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
        }
        if ($userLogin) {
            $favorite = Favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        $id_user = Auth::user()->id;
        // $uuid_feed = UploadVideo::find("uuid");
        $feed_dibuat = UploadVideo::where("users_id", $id_user)->get();
        $feed_disukai = UploadVideo::whereHas("like_veed", function ($query) use ($id_user) {
            $query->where("users_id", $id_user);
        });
        $feed_disukai = $feed_disukai->get();
        $feed_favorite = UploadVideo::whereHas("favorite", function ($query) use ($id_user) {
            $query->where("user_id_from", $id_user);
        });
        $feed_favorite = $feed_favorite->get();
        $data = [
            "feed_dibuat" => $feed_dibuat,
            "feed_disukai" => $feed_disukai,
            "feed_favorite" => $feed_favorite
        ];
        return view('koki.feed', compact('categorytopup', 'data', 'userLogin', 'notification', 'favorite', 'unreadNotificationCount', 'messageCount'));
    }

    public function showFeed($uuid)
    {
        $uuid = UploadVideo::findOrFail($uuid);

        return view('template.veed', compact('uuid'));
    }

    public function beranda(Request $request)
    {
        $koki = User::find(Auth::user()->id);
        $jumlah_resep = Reseps::where("user_id", Auth::user()->id)->count();
        $komentar_feed = CommentFeed::where("pengirim_id", Auth::user()->id)->get();
        $komentar_resep = CommentResipes::where('pengirim_id', Auth::user()->id)->get();
        $userLogin = Auth::user();
        $footer = Footer::first();
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
        $categorytopup = TopUpCategories::all();
        $messageCount = [];
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
        if ($userLogin) {
            $notification = Notifications::where('user_id', auth()->user()->id)
                ->where('status', 'belum')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $unreadNotificationCount = Notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
        }
        if ($userLogin) {
            $favorite = Favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        $waktuSekarang = Carbon::now();
        $waktuAkhirLangganan = Carbon::parse($koki->akhir_langganan);
        $waktu = $waktuSekarang->diffInDays($waktuAkhirLangganan);
        $saldo_sudahDiambil = [];
        $saldo_belumDiambil = [];
        $total_saldo = [];

        $year = 2023;
        for ($i = 1; $i <= 12; $i++) {
            $saldo_sudahDiambil[] = DB::table('penarikans')
                ->where('chef_id', Auth::user()->id)
                ->where('status', 'diterima')
                ->whereMonth('created_at', $i)
                ->whereYear('created_at', $year)
                ->sum('nilai');
            $saldo_belumDiambil[] = DB::table('income_chefs')
                ->where('chef_id', Auth::user()->id)
                ->where('status_penarikan', 'bisa ditarik')
                ->whereMonth('created_at', $i)
                ->whereYear('created_at', $year)
                ->sum('pemasukan');
            $total_saldo[] = DB::table('income_chefs')
                ->where('chef_id', Auth::user()->id)
                ->whereMonth('created_at', $i)
                ->whereYear('created_at', $year)
                ->sum('pemasukan');
        }
        return view('koki.beranda', compact('total_saldo', 'saldo_sudahDiambil', 'saldo_belumDiambil', 'categorytopup', "waktu", "komentar_feed", "komentar_resep", "koki", "jumlah_resep", 'messageCount', 'notification', 'footer', 'unreadNotificationCount', 'userLogin', 'favorite'));
    }

    public function incomeKoki(Request $request)
    {
        $userLogin = Auth::user();
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
        $messageCount = [];
        $categorytopup = TopUpCategories::all();
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
        if ($userLogin) {
            $notification = Notifications::where('user_id', auth()->user()->id)
                ->where('status', 'belum')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $unreadNotificationCount = Notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
        }
        if ($userLogin) {
            $favorite = Favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        $koki = User::find(Auth::user()->id);
        if ($request->isMethod('POST')) {
            $validate = Validator::make($request->all(), [
                'jenis_penghasilan' => 'nullable',
                'tanggal_awal' => 'nullable',
                'tanggal_batas' => 'nullable|after_or_equal:tanggal_awal',
            ], [

                'tanggal_batas.after_or_equal' => 'Tanggal batas tidak boleh lebih kurang dari tanggal awal!'
            ]);
            if ($validate->fails()) {
                return redirect()->back()->with('error', $validate->errors()->first());
            }
            $income_koki = IncomeChefs::query()->where("chef_id", Auth::user()->id);
            $status = null;
            if ($request->jenis_penghasilan != null) {
                if ($request->jenis_penghasilan === "sawer") {
                    $status = 'sawer';
                } else if ($request->jenis_penghasilan === "feed") {
                    $status = 'feed';
                } else if ($request->jenis_penghasilan === "resep") {
                    $status = 'resep';
                } else if ($request->jenis_penghasilan === "kursus") {
                    $status = 'kursus';
                }
                $income_koki->where('status', $status);
            }
            if ($request->tanggal_awal != null && $request->tanggal_batas != null) {
                $income_koki->whereBetween('created_at', [$request->tanggal_awal, $request->tanggal_batas]);
            }
            $income_koki = $income_koki->paginate(8);
        } elseif ($request->isMethod('GET')) {
            $income_koki = IncomeChefs::where('chef_id', Auth::user()->id)->paginate(8);
        }

        $saldo2 = Penarikans::where('chef_id', Auth::user()->id)->where('status', 'diterima');
        $saldo_sudahDiambil = $saldo2->sum('nilai');
        $saldo = IncomeChefs::where('chef_id', Auth::user()->id);
        $saldo_total = $saldo->sum('pemasukan');

        // cek apakah koki sudah daftar data pribadi
        $check = DataPribadiKoki::where('chef_id', Auth::user()->id)->where('status', 'diterima')->exists();
        $check2 = DataPribadiKoki::where('chef_id', Auth::user()->id)->where('status', 'diproses')->exists();
        // dd($notification);
        return view('koki.income-koki', compact("koki", 'categorytopup', "check2", "income_koki", "check", "saldo_sudahDiambil", "saldo_total", "userLogin", "notification", "favorite", "unreadNotificationCount", "messageCount"));
    }

    public function viewsRecipe(Request $request)
    {
        $userLogin = Auth::user();
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
        $messageCount = [];
        $categorytopup = TopUpCategories::all();
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
        if ($userLogin) {
            $notification = Notifications::where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'desc') // Urutkan notifikasi berdasarkan created_at terbaru
                ->paginate(10); // Paginasi notifikasi dengan 10 item per halaman
            $unreadNotificationCount = Notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
        }
        if ($userLogin) {
            $favorite = Favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        $koki = User::find(Auth::user()->id);
        $resep_dibuat = Reseps::where("user_id", Auth::user()->id)->get();
        $id_user = Auth::user()->id;
        $resep_disukai = Reseps::whereHas('likes', function ($query) use ($id_user) {
            $query->where("user_id", $id_user);
        });
        $resep_disukai = $resep_disukai->get();
        $resep_favorite = Reseps::whereHas('favorite', function ($query) use ($id_user) {
            $query->where("user_id_from", $id_user);
        });
        $resep_favorite = $resep_favorite->get();
        return view('koki.views-recipe', compact('categorytopup', "koki", "resep_dibuat", "resep_disukai", "resep_favorite", "userLogin", "notification", "favorite", "unreadNotificationCount", "messageCount"));
    }

    public function jawaban_diskusi(Request $request)
    {
        $userLogin = Auth::user();
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
        $messageCount = [];
        $categorytopup = TopUpCategories::all();
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
        if ($userLogin) {
            $notification = Notifications::where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'desc') // Urutkan notifikasi berdasarkan created_at terbaru
                ->paginate(10); // Paginasi notifikasi dengan 10 item per halaman
            $unreadNotificationCount = Notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
        }
        if ($userLogin) {
            $favorite = Favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        $koki = User::find(Auth::user()->id);
        $complaints = Complaint::where('user_id', Auth::user()->id)->get();
        return view('koki.diskusi', compact('categorytopup', "koki", "complaints", "userLogin", "notification", "favorite", "unreadNotificationCount", "messageCount"));
    }

    public function kursus(Request $request)
    {
        $userLogin = Auth::user();
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
        $messageCount = [];
        $categorytopup = TopUpCategories::all();
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
        if ($userLogin) {
            $notification = Notifications::where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'desc') // Urutkan notifikasi berdasarkan created_at terbaru
                ->paginate(10); // Paginasi notifikasi dengan 10 item per halaman
            $unreadNotificationCount = Notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
        }
        if ($userLogin) {
            $favorite = Favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        $koki = User::find(Auth::user()->id);
        $kursus_sendiri = Kursus::where('users_id', Auth::user()->id)->get();
        $id_user = Auth::user()->id;
        $kursus_dipesan = Kursus::whereHas('transaksi', function ($query) use ($id_user) {
            $query->where('user_id', $id_user);
        })->get();
        $kursus_disimpan = Kursus::whereHas('favorite', function ($query) use ($id_user) {
            $query->where('user_id_from', $id_user);
        })->get();
        return view('koki.kursus', compact('categorytopup', "kursus_disimpan", "kursus_dipesan", "koki", "kursus_sendiri", "userLogin", "notification", "favorite", "unreadNotificationCount", "messageCount"));
    }

    public function kursusContent(string $id)
    {
        $koki = User::find(Auth::user()->id);
        $kursus_sendiri = Kursus::findOrFail($id);
        $sesi_kursus = SessionsCourses::where("course_id", $id)->get();
        $userLogin = Auth::user();
        $start_date = Carbon::parse($kursus_sendiri->tanggal_dimulai_kursus);
        $end_date = Carbon::parse($kursus_sendiri->tanggal_berakhir_kursus);
        $startdate = Carbon::parse($kursus_sendiri->tanggal_dimulai_kursus);
        $enddate = Carbon::parse($kursus_sendiri->tanggal_berakhir_kursus);
        // message count
        $messageCount = [];
        $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        // unreadNotification count and notification
        $notification = Notifications::where('user_id', auth()->user()->id)
            ->where('status', 'belum')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $unreadNotificationCount = Notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
        // category top-up
        $categorytopup = TopUpCategories::all();
        return view('koki.kursus-content', compact("messageCount", "categorytopup","notification", "unreadNotificationCount","start_date", "end_date", "startdate", "enddate", "koki", "kursus_sendiri", "sesi_kursus", "userLogin"));
    }

    public function favorite(Request $request)
    {
        $koki = User::find(Auth::user()->id);

        return view('koki.favorite', compact("koki"));
    }



    public function deleteProfilePicture()
    {
        $user = Auth::user();

        if ($user->foto) {
            Storage::disk('public')->delete($user->foto);
            $user->foto = null;
            $user->save();
            return redirect()->back()->with('success', 'Foto profile telah dihapus');
        } else {
            return redirect()->back()->with('error', 'Tidak ada foto profile yang perlu dihapus ');
        }
    }
    /**
     * Memperlihatkan form untuk upload video pembelajaran oleh koki
     */
    public function upload_video()
    {
        $userLogin = Auth::user();
        $notification = [];
        $favorite = [];
        $footer = Footer::first();
        $unreadNotificationCount = [];
        $categorytopup = TopUpCategories::all();
        if ($userLogin) {
            $notification = Notifications::where('user_id', auth()->user()->id)
                ->where('status', 'belum')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $unreadNotificationCount = Notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
        }
        if ($userLogin) {
            $favorite = Favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        return view("koki.upload-video", compact('categorytopup', 'userLogin', 'notification', 'favorite', 'footer', 'unreadNotificationCount'));
    }
    public function upload(Request $request)
    {
        $rules = [
            "deskripsi_video" => "required|max:225",
            "upload_video" => "required|mimes:mp4,webm,avi,mkv|max:50000"
        ];
        $messages = [
            "deskripsi_video.required" => "Deskripsi video harus diisi!",
            "deskripsi_video.max" => "Deskripsi video tidak boleh lebih dari 225 karakter!",
            "upload_video.required" => "Video harus diupload!",
            "upload_video.mimes" => "Video harus berekstensikan mp4/webm/avi/mkv!",
            "upload_video.max" => "Video tidak boleh melebihi 50MB!"
        ];
        $validasi = Validator::make($request->all(), $rules, $messages);
        if ($validasi->fails()) {
            return response()->json($validasi->errors()->first(), 422);
            //return redirect()->back()->with("error", $validasi->errors()->first());
        }
        if ($request->has('isPremium')) {
            $isPremium = $request->isPremium;
        } else {
            $isPremium = "no";
        }
        $up = UploadVideo::create([
            "users_id" => Auth::user()->id,
            "deskripsi_video" => $request->deskripsi_video,
            "upload_video" => $request->file("upload_video")->store("video-user", "public"),
            "isPremium" => $isPremium,
            "uuid" => Str::random(10),
        ]);
        $followerIds = Followers::where('user_id', auth()->user()->id)->pluck('follower_id')->toArray();
        if ($followerIds != null) {
            foreach ($followerIds as $followerId) {
                $notification = new Notifications([
                    'notification_from' => auth()->user()->id,
                    'veed_id' => $up->id,
                    'follower_id' => $followerId,
                    'user_id' => $followerId,
                    'categories' => 'followers_shared',
                    'message' => 'Menambahkan postingan baru',
                ]);
                $notification->save();

                $let_route = Notifications::findOrFail($notification->id);
                $let_route->route = "/status-baca/shared-feed/" . $notification->id;
                $let_route->save();
            }
        }
        $video_pembelajaran = UploadVideo::latest()->get();
        if ($up) {
            return response()->json([
                "message" => "Sukses upload video!",
                "success" => true,
                "update" => $video_pembelajaran
            ]);
            //return redirect()->back()->with("success", "Sukses upload video");
        }
    }
    public function hapus_feed(string $id)
    {
        $feed = UploadVideo::findOrFail($id);
        Storage::delete("public/" . $feed->upload_video);
        $feed->delete();
        $countFeed = UploadVideo::where("users_id", $id)->exists();
        return redirect()->back()->with('success', 'Berhasil menghapus postingan');
        // return response()->json([
        //     "success" => true,
        //     "message" => "Sukses menghapus data!",
        //     "countFeed" => $countFeed
        // ]);
    }
    public function updatePassword(Request $request)
    {
        if ($request->password != $request->password_confirmation) {
            return redirect()->back()->with('error', 'Password baru dengan konfirmasi password tidak cocok!');
        }
        $userLogin = User::find(Auth::user()->id);
        if (Hash::check($request->oldPass, $userLogin->password)) {
            $userLogin->password = bcrypt($request->password);
            $userLogin->save();
            return redirect()->back()->with('success', 'Anda sukses mengupdate password!');
        }
    }
    public function updateFeed(Request $request, string $id)
    {
        $update = UploadVideo::find($id);
        $update->deskripsi_video = $request->deskripsi_video;
        $update->save();

        return response()->json([
            "success" => true,
            "message" => "Sukses mengupdate feed!",
            "deskripsi_video_baru" => $update->deskripsi_video
        ]);
    }
    public function data_pribadi_chef(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'number_handphone' => 'required|numeric|min_digits:10|max_digits:14',
            'alamat' => 'required',
            'foto_ktp' => 'required|image|mimes:png,jpg,jpeg,gif',
            'foto_diri_ktp' => 'required|image|mimes:png,jpg,jpeg,gif',
            'pilihan_bank' => 'required',
            'nomer_rekening' => 'required|numeric|min_digits:10|max_digits:16',
        ];
        $message = [
            'name.required' => 'Nama harus diisi!',
            'email.required' => 'Email harus diisi!',
            'email.email' => 'Format e-mail salah!',
            'number_handphone.required' => 'Nomer handphone harus diisi!',
            'number_handphone.numeric' => 'Nomer handphone harus berupa nomer!',
            'number_handphone.min_digits' => 'Nomer handphone minimal berisi 10 karakter angka!',
            'number_handphone.max_digits' => 'Nomer handphone maksimal berisi 14 karakter angka!',
            'alamat.required' => "Alamat harus diisi!",
            'foto_ktp.required' => 'Foto ktp harus diisi!',
            'foto_ktp.image' => 'Foto ktp tidak berupa gambar!',
            'foto_ktp.mimes' => 'Foto ktp harus berekstensi png/jpg/jpeg/gif!',
            'foto_diri_ktp.mimes' => 'Foto diri bersama ktp harus berekstensi png/jpg/jpeg/gif!',
            'foto_diri_ktp.image' => 'Foto diri bersama ktp tidak berupa gambar!',
            'foto_diri_ktp.required' => 'Foto diri bersama ktp harus diisi!',
            'pilihan_bank.required' => 'Pilihan bank harus diisi!',
            'nomer_rekening.required' => 'Nomer rekening harus diisi!',
            'nomer_rekening.numeric' => 'Nomer rekening harus berupa nomer!',
            'nomer_rekening.min_digits' => 'Nomer rekening minimal berisi 10 karakter angka!',
            'nomer_rekening.max_digits' => 'Nomer rekening maksimal berisi 14 karakter angka!',
        ];
        $validasi = Validator::make($request->all(), $rules, $message);
        if ($validasi->fails()) {
            return response()->json($validasi->errors()->first(), 422);
        }
        // cek apakah user sudah daftar atau belum
        $chef = DataPribadiKoki::where('chef_id', Auth::user()->id)->exists();
        if ($chef) {
            return response()->json([
                'success' => false,
                'message' => 'Anda tidak bisa mendaftar lagi!'
            ]);
        } else {
            DataPribadiKoki::create([
                "chef_id" => Auth::user()->id,
                "name" => $request->name,
                "email" => $request->email,
                "number_handphone" => $request->number_handphone,
                "alamat" => $request->alamat,
                "foto_ktp" => $request->file('foto_ktp')->store('foto_ktp', 'public'),
                "foto_diri_ktp" => $request->file('foto_diri_ktp')->store('foto_diri_ktp', 'public'),
                "pilihan_bank" => $request->pilihan_bank,
                "nomer_rekening" => $request->nomer_rekening,
                'status' => "diproses"
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Mohon menunggu konfirmasi dari admin!'
            ]);
        }
    }
}
