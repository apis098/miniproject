<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\Models\ChMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Complaint;
use App\Models\District;
use App\Models\Reseps;
use App\Models\Notifications;
use App\Models\Favorite;
use App\Models\Footer;
use App\Models\HistoryPremium;
use App\Models\income_chefs;
use App\Models\jenis_kursuses;
use App\Models\KategoriMakanan;
use App\Models\kursus;
use App\Models\Premiums;
use App\Models\Province;
use App\Models\Regency;
use App\Models\TopUpCategories;
use App\Models\TransactionTopUp;
use App\Models\UploadVideo;
use App\Models\User;
use App\Models\Village;
use Carbon\Carbon;
use App\Models\Penarikans;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('admin.index');
        } else {
            return view('login');
        }
    }

    public function actionLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong'
        ]);

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($data)) {
            $user = Auth::user();

            if ($user->status == 'nonaktif') {
                Auth::logout();
                return redirect()->back()->with('error', 'Akun anda telah diblokir!');
            }

            if ($user->status == 'aktif') {
                if ($user->role == 'koki') {
                    return redirect()->route('koki.index');
                } else if ($user->role == 'admin') {
                    return redirect()->route('admin.index');
                }
            }
        } else {
            return redirect()->back()->with('error', 'Email atau Password Salah')->withInput();
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function home()
    {
        $complaints = Complaint::paginate(3, ['*'], 'complaint-page');
        $reseps = Reseps::query();
        $real_reseps = $reseps->withCount("likes")->orderBy("likes_count", "desc")->take(3)->get();
        $real_reseps = $reseps->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->take(3)->get();
        $resep = Reseps::query();
        $favorite_resep = $resep->withCount('favorite')->orderBy('favorite_count', 'desc')->take(3)->get();
        $favorite_resep = $resep->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $top_users = User::has("followers")->orderBy("followers", "desc")->take(4)->get();
        $categories_foods = KategoriMakanan::all();
        $recipes = Reseps::whereDate('created_at', today())->take(3)->get();
        $userLogin = Auth::user();
        $categorytopup  =  TopUpCategories::all();
        $jumlah_resep = Reseps::all()->count();
        $foto_resep = Reseps::take(5)->get();
        $footer = Footer::first();
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
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
        $feed_premium_favorite = UploadVideo::query()->where('isPremium', 'yes')->orderBy('favorite_count', 'desc')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->take(3)->get();
        $resep_premium_favorite = Reseps::query()->withCount('favorite')->orderBy('favorite_count', 'desc')->where('isPremium', 'yes')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->take(3)->get();
        $feed_populer = UploadVideo::query()->withCount('like_veed')->orderBy('like_veed_count', 'desc')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->take(3)->get();
        // mengecek apakah koki berlangganan sudah habis atau belum masa berlangganannya,
        if (Auth::user()) {
            if (auth()->user()->status_langganan == "sedang berlangganan") {
                $tanggal_berakhir_langganan = Carbon::parse(auth()->user()->akhir_langganan);
                $tanggal_saat_ini = Carbon::now();
                if ($tanggal_saat_ini->gt($tanggal_berakhir_langganan)) {
                    $update_status = User::find(auth()->user()->id);
                    $update_status->status_langganan = "belum berlangganan";
                    $update_status->awal_langganan = null;
                    $update_status->akhir_langganan = null;
                    $update_status->save();
                }
            }
        }
        return view('template.home', compact('feed_premium_favorite', 'feed_populer', 'resep_premium_favorite', 'categorytopup', 'messageCount', 'favorite_resep', 'recipes', 'categories_foods', 'top_users', 'real_reseps', 'userLogin', 'complaints', 'footer', 'notification', 'unreadNotificationCount', 'favorite', 'jumlah_resep', 'foto_resep'));
    }

    public function keluhan()
    {
        $complaints = Complaint::paginate(3);
        $real_reseps = Reseps::has("likes")->orderBy("likes", "desc")->take(10)->paginate(6);
        $userLogin = Auth::user();
        $jumlah_resep = Reseps::all()->count();
        $foto_resep = Reseps::take(5)->get();
        $footer = Footer::first();
        $notification = [];
        $categorytopup  =  TopUpCategories::all();
        $favorite = [];
        $unreadNotificationCount = [];
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
        return view('template.keluhan', compact('messageCount', 'categorytopup', 'real_reseps', 'userLogin', 'complaints', 'footer', 'notification', 'unreadNotificationCount', 'favorite', 'jumlah_resep', 'foto_resep'));
    }

    public function penawaranPremium()
    {
        $userLogin = Auth::user();
        $notification = [];
        $favorite = [];
        $footer = Footer::first();
        $categorytopup  =  TopUpCategories::all();
        $unreadNotificationCount = [];
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
        $penawaran_premium = Premiums::all();
        return view('template.penawaran-premium', compact('penawaran_premium', 'categorytopup', 'messageCount', 'notification', 'footer', 'unreadNotificationCount', 'userLogin', 'favorite'));
    }

    public function riwayat()
    {
        $userLogin = Auth::user();
        $notification = [];
        $favorite = [];
        $footer = Footer::first();
        $unreadNotificationCount = [];
        $categorytopup  =  TopUpCategories::all();
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
        $history_top_up = TransactionTopUp::where('user_id', auth()->user()->id)->latest()->get();
        $history_transaksi = HistoryPremium::where('users_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $history_penarikan = Penarikans::where('chef_id', Auth::user()->id)->where("status", "diterima")->latest()->get();
        return view('template.riwayat', compact('history_penarikan', 'history_transaksi', 'history_top_up', 'messageCount', 'categorytopup', 'notification', 'footer', 'unreadNotificationCount', 'userLogin', 'favorite'));
    }
}
