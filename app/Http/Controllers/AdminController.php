<?php

namespace App\Http\Controllers;

use App\Models\ChMessage;
use App\Models\detail_premiums;
use App\Models\favorite;
use App\Models\footer;
use App\Models\notifications;
use App\Models\premiums;
use App\Models\Report;
use App\Models\reseps;
use App\Models\TopUpCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\file;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiKursus;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $admin = User::find(Auth::user()->id);
        $jumlah_user = User::all()->count();
        $jumlah_resep = reseps::all()->count();
        $jumlah_report = Report::all()->count();
        $reports = Report::orderBy("created_at", "desc")->get();
        $reseps = reseps::orderBy("created_at", "desc")->get();
        $datetime = User::pluck("created_at");
        $year = 2018;
        $yearsu = date('Y') - $year;
        $years = [];
        for ($i = 0; $i <= $yearsu; $i++) {
            $years[] = $year++;
        }
        $month = [];
        if ($request->has("tahun")) {
            $tahun = $request->tahun;
            for ($i = 1; $i <= 12; $i++) {
                $month[] = DB::table("users")
                    ->whereMonth('created_at', $i)
                    ->whereYear("created_at", $tahun)
                    ->count();
                $monthPrem[] = DB::table("users")
                    ->whereMonth('created_at', $i)
                    ->whereYear('created_at', $tahun)
                    ->where('status_langganan', 'sedang berlangganan')
                    ->count();
                $monthSuper[] = DB::table("users")
                    ->whereMonth('created_at', $i)
                    ->whereYear('created_at', $tahun)
                    ->where('isSuperUser', 'yes')
                    ->count();
            }
        } else {
            for ($i = 1; $i <= 12; $i++) {
                $month[] = DB::table("users")->whereMonth('created_at', $i)->count();
                $monthPrem[] = DB::table("users")->whereMonth('created_at', $i)->where('status_langganan', 'sedang berlangganan')->count();
                $monthSuper[] = DB::table("users")->whereMonth('created_at', $i)->where('isSuperUser', 'yes')->count();
            }
        }
        $data_chartjs = [];
        return view('admin.index', [
            'admin' => $admin,
        ], compact("jumlah_user", "jumlah_resep", "jumlah_report", "monthPrem", "monthSuper","month", "years", "reports", "reseps"));
    }


    public function verifed(Request $request)
    {
        // Ambil semua pengguna yang memiliki isSuperUser 'no'
        $users = User::where('isSuperUser', 'no');

        // Ambil pengguna yang memiliki jumlah followers lebih dari 10,000
        $verified = $users->where('followers', '>', 10000)->paginate(6);

        return view('admin.verifed', compact('verified'));
    }


    public function action_verifed(string $id, string $status)
    {
        if ($status === "diterima") {
            $status = "menerima";
            $user = User::find($id);
            $user->isSuperUser = "yes";
            $user->save();
        } else if ($status === "ditolak") {
            $status = "menolak";
            $user = User::find($id);
            $user->isSuperUser = "no";
            $user->save();
        }
        return redirect()->back();
    }


    public function userContent(int $id)
    {
        $koki = User::find(Auth::user()->id);
        $students = User::with('user_transaksi_kursus')->whereHas('user_transaksi_kursus',function ($query) use ($id) {
            $query->where('course_id', $id);
        })->get();
        $userLogin = Auth::user();
        return view('koki.user', compact("koki","userLogin","students"));
    }


    public function tawaran()
    {
        $userLogin = Auth::user();
        $notification = [];
        $favorite = [];
        $footer = footer::first();
        $categorytopup  =  TopUpCategories::all();
        $unreadNotificationCount = [];
        $messageCount = [];
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
        if ($userLogin) {
            $notification = notifications::where('user_id', auth()->user()->id)
            ->where('status','belum')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            $unreadNotificationCount = notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
        }
        if ($userLogin) {
            $favorite = favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        $penawaran_premium = premiums::all();
        $categoryTopUp = TopUpCategories::all();
        return view('admin.tawaran', compact('categoryTopUp', 'penawaran_premium', 'categorytopup', 'messageCount', 'notification', 'footer', 'unreadNotificationCount', 'userLogin', 'favorite'));
    }

    public function updateProfile(Request $request)
    {
        $admin = User::find(Auth::user()->id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $admin->id,
            'fileInputA' => 'image|mimes:jpeg,jpg,png|max:2048',
        ], [
            'name.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Email harus berupa alamat email yang valid.',
            'email.unique' => 'Email sudah digunakan oleh pengguna lain.',
            'fileInputA.image' => 'Profil harus berupa gambar (JPG, JPEG, PNG).',
            'fileInputA.mimes' => '',
            'fileInputA.max' => 'Ukuran gambar profil tidak boleh melebihi 2 MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $upProfile = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ];

        if ($request->hasFile('fileInputA')) {
            $oldProfile = $admin->profil;

            if ($oldProfile !== 'user.jpg') {
                File::delete(public_path('gambar/user-profile/' . $oldProfile));
            }

            $file = $request->file('fileInputA');
            $newFile = $file->hashName();
            $file->move(public_path('gambar/user-profile/'), $newFile);
            $upProfile['profil'] = $newFile;
        }

        $admin->update($upProfile);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui');
    }

    public function upload_tawaran(Request $request)
    {
        $rules = [
            "nama_paket" => "required",
            "harga_paket" => "required",
            "durasi_paket" => "required",
            "detail_paket.*" => "required"
        ];
        $message = [
            "nama_paket.required" => "nama paket harus terisi!",
            "harga_paket.required" => "harga paket harus terisi!",
            "durasi_paket.required" => "durasi paket harus terisi!",
            "detail_paket.*.required" => "detail paket harus diisi!"
        ];
        $validasi = Validator::make($request->all(), $rules, $message);
        if ($validasi->fails()) {
            return response()->json($validasi->errors()->first(), 422);
        }
        $premium_create = premiums::create([
            "nama_paket" => $request->nama_paket,
            "harga_paket" => $request->harga_paket,
            "durasi_paket" => $request->durasi_paket
        ]);

        if ($premium_create) {
            foreach ($request->detail_paket as $d) {
                detail_premiums::create([
                    "premium_id" => $premium_create->id,
                    "detail" => $d
                ]);
            }


            return response()->json([
                "success" => true,
                "message" => "sukses menambahkan penawaran produk!"
            ]);
        }
    }
}
