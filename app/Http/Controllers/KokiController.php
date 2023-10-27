<?php

namespace App\Http\Controllers;

use App\Models\ChMessage;
use App\Models\comment_recipes;
use App\Models\comment_veed;
use App\Models\complaint;
use App\Models\favorite;
use App\Models\footer;
use App\Models\income_chefs;
use App\Models\kursus;
use App\Models\likes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\notifications;
use App\Models\reseps;
use App\Models\upload_video;
use App\Models\Report;
use App\Models\sessionCourses;
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

class KokiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resep_sendiri = reseps::where("user_id", Auth::user()->id)->get();
        $recipes = reseps::where("user_id", Auth::user()->id)->take(6)->get();
        $videos = upload_video::where("users_id", Auth::user()->id)->take(6)->get();
        $userLogin = Auth::user();
        $footer = footer::first();
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
        $categorytopup  =  TopUpCategories::all();
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
        return view('koki.profile', compact('categorytopup', 'messageCount', 'recipes', 'videos', 'notification', 'footer', 'resep_sendiri', 'unreadNotificationCount', 'userLogin', 'favorite'));
    }
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

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

        return redirect()->back()->with('success', 'Sukses mengupdate foto profil');
    }

    public function profilage(Request $request)
    {
        $userLogin = Auth::user();
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
        $categorytopup  =  TopUpCategories::all();
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


        return view('koki.profilage', compact('categorytopup', 'messageCount', 'notification', 'unreadNotificationCount', 'userLogin', 'favorite'));
    }

    public function feed(Request $request)
    {
        $userLogin = Auth::user();
        $notification = [];
        $favorite = [];
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
        $id_user = Auth::user()->id;
        $feed_dibuat = upload_video::where("users_id", $id_user)->get();
        $feed_disukai = upload_video::whereHas("like_veed", function ($query) use ($id_user) {
            $query->where("users_id", $id_user);
        });
        $feed_disukai = $feed_disukai->get();
        $feed_favorite = upload_video::whereHas("favorite", function ($query) use ($id_user) {
            $query->where("user_id_from", $id_user);
        });
        $feed_favorite = $feed_favorite->get();
        $data = [
            "feed_dibuat" => $feed_dibuat,
            "feed_disukai" => $feed_disukai,
            "feed_favorite" => $feed_favorite
        ];
        return view('koki.feed', compact('data','userLogin','notification','favorite','unreadNotificationCount','messageCount'));
    }

    public function beranda(Request $request)
    {
        $koki = User::find(Auth::user()->id);
        $jumlah_resep = reseps::where("user_id", Auth::user()->id)->count();
        $komentar_feed = comment_veed::where("pengirim_id", Auth::user()->id)->get();
        $komentar_resep = comment_recipes::where('pengirim_id', Auth::user()->id)->get();
        $userLogin = Auth::user();
        $footer = footer::first();
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
        $categorytopup  =  TopUpCategories::all();
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
        $waktuSekarang = Carbon::now();
        $waktuAkhirLangganan = Carbon::parse($koki->akhir_langganan);
        $waktu = $waktuSekarang->diffInDays($waktuAkhirLangganan);
        $saldo_sudahDiambil = [];
        $saldo_belumDiambil = [];
        $total_saldo = [];
        $year = 2023;
        for ($i = 1; $i <= 12; $i++) {
            $saldo_sudahDiambil[] = DB::table('income_chefs')
                ->where('chef_id', Auth::user()->id)
                ->where('status_penarikan', 'sudah ditarik')
                ->whereMonth('created_at', $i)
                ->whereYear('created_at', $year)
                ->sum('pemasukan');
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
        $koki = User::find(Auth::user()->id);
        $income_koki = income_chefs::where('chef_id', Auth::user()->id)->get();
        $saldo1 = income_chefs::where('chef_id', Auth::user()->id)->where('status_penarikan', 'bisa ditarik');
        $saldo_belumDiambil = $saldo1->sum('pemasukan');
        $saldo2 = income_chefs::where('chef_id', Auth::user()->id)->where('status_penarikan', 'sudah ditarik');
        $saldo_sudahDiambil = $saldo2->sum('pemasukan');
        $saldo = income_chefs::where('chef_id', Auth::user()->id);
        $saldo_total = $saldo->sum('pemasukan');
        return view('koki.income-koki', compact("koki", "income_koki", "saldo_belumDiambil", "saldo_sudahDiambil", "saldo_total","userLogin","notification","favorite","unreadNotificationCount","messageCount"));
    }

    public function viewsRecipe(Request $request)
    {
        $userLogin = Auth::user();
        $notification = [];
        $favorite = [];
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
        $koki = User::find(Auth::user()->id);
        $resep_dibuat = reseps::where("user_id", Auth::user()->id)->get();
        $id_user = Auth::user()->id;
        $resep_disukai = reseps::whereHas('likes', function ($query) use ($id_user) {
            $query->where("user_id", $id_user);
        });
        $resep_disukai = $resep_disukai->get();
        $resep_favorite = reseps::whereHas('favorite', function ($query) use ($id_user) {
            $query->where("user_id_from", $id_user);
        });
        $resep_favorite = $resep_favorite->get();
        return view('koki.views-recipe', compact("koki", "resep_dibuat", "resep_disukai", "resep_favorite","userLogin","notification","favorite","unreadNotificationCount","messageCount"));
    }

    public function jawaban_diskusi(Request $request)
    {
        $userLogin = Auth::user();
        $notification = [];
        $favorite = [];
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
        $koki = User::find(Auth::user()->id);
        $complaints = complaint::where('user_id', Auth::user()->id)->get();
        return view('koki.diskusi', compact("koki", "complaints","userLogin","notification","favorite","unreadNotificationCount","messageCount"));
    }

    public function kursus(Request $request)
    {   $userLogin = Auth::user();
        $notification = [];
        $favorite = [];
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
        $koki = User::find(Auth::user()->id);
        $kursus_sendiri = kursus::where('users_id', Auth::user()->id)->get();
        return view('koki.kursus', compact("koki", "kursus_sendiri","userLogin","notification","favorite","unreadNotificationCount","messageCount"));
    }

    public function kursusContent(string $id)
    {
        $koki = User::find(Auth::user()->id);
        $kursus_sendiri = kursus::findOrFail($id);
        $sesi_kursus = sessionCourses::where("course_id", $id)->get();
        return view('koki.kursus-content', compact("koki", "kursus_sendiri", "sesi_kursus"));
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
        $footer = footer::first();
        $unreadNotificationCount = [];
        $categorytopup  =  TopUpCategories::all();
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
        return view("koki.upload-video", compact('categorytopup', 'userLogin', 'notification', 'favorite', 'footer', 'unreadNotificationCount'));
    }
    public function upload(Request $request)
    {
        $rules = [
            "deskripsi_video" => "required|max:400",
            "upload_video" => "required|mimes:mp4|max:50000"
        ];
        $messages = [
            "deskripsi_video.required" => "Deskripsi video harus diisi!",
            "deskripsi_video.max" => "Deskripsi video tidak boleh lebih dari 225 karakter!",
            "upload_video.required" => "Video harus diupload!",
            "upload_video.mimes" => "Video harus berekstensikan mp4!",
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
        $up = upload_video::create([
            "users_id" => Auth::user()->id,
            "deskripsi_video" => $request->deskripsi_video,
            "upload_video" => $request->file("upload_video")->store("video-user", "public"),
            "isPremium" => $isPremium,
            "uuid" => Str::random(10),
        ]);
        $video_pembelajaran = upload_video::latest()->get();
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
        $feed = upload_video::findOrFail($id);
        Storage::delete("public/" . $feed->upload_video);
        $feed->delete();
        $countFeed = upload_video::where("users_id", $id)->exists();
        return response()->json([
            "success" => true,
            "message" => "Sukses menghapus data!",
            "countFeed" => $countFeed
        ]);
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
        $update = upload_video::find($id);
        $update->deskripsi_video = $request->deskripsi_video;
        $update->save();

        return response()->json([
            "success" => true,
            "message" => "Sukses mengupdate feed!",
            "deskripsi_video_baru" => $update->deskripsi_video
        ]);
    }
}

