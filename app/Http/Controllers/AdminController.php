<?php

namespace App\Http\Controllers;

use App\Models\ChMessage;
use App\Models\DataPribadiKoki;
use App\Models\DetailPremiums;
use App\Models\Favorite;
use App\Models\Footer;
use App\Models\Notifications;
use App\Models\Premiums;
use App\Models\Report;
use App\Models\Reseps;
use App\Models\TopUpCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\file;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiKursus;
use App\Models\Penarikans;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $admin = User::find(Auth::user()->id);
        $jumlah_user = User::where('role', 'koki')->count();
        $jumlah_resep = Reseps::all()->count();
        $jumlah_report = Report::all()->count();
        $reports = Report::orderBy("created_at", "desc")->get();
        $reseps = Reseps::orderBy("created_at", "desc")->get();
        $datetime = User::pluck("created_at");
        $verifed_count = User::where('isSuperUser', 'no')->where('followers', '>', 10000)->where('role', 'koki')->count();
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
                    ->where('role', 'koki')
                    ->whereMonth('created_at', $i)
                    ->whereYear("created_at", $tahun)
                    ->count();
                $monthPrem[] = DB::table("users")
                    ->where('role', 'koki')
                    ->whereMonth('created_at', $i)
                    ->whereYear('created_at', $tahun)
                    ->where('status_langganan', 'sedang berlangganan')
                    ->count();
                $monthSuper[] = DB::table("users")
                    ->where('role', 'koki')
                    ->whereMonth('created_at', $i)
                    ->whereYear('created_at', $tahun)
                    ->where('isSuperUser', 'yes')
                    ->count();
            }
        } else {
            for ($i = 1; $i <= 12; $i++) {
                $month[] = DB::table("users")->where('role', 'koki')->whereMonth('created_at', $i)->count();
                $monthPrem[] = DB::table("users")->where('role', 'koki')->whereMonth('created_at', $i)->where('status_langganan', 'sedang berlangganan')->count();
                $monthSuper[] = DB::table("users")->where('role', 'koki')->whereMonth('created_at', $i)->where('isSuperUser', 'yes')->count();
            }
        }
        $data_chartjs = [];
        return view('admin.index', [
            'admin' => $admin,
        ], compact("jumlah_user", "verifed_count", "jumlah_resep", "jumlah_report", "monthPrem", "monthSuper", "month", "years", "reports", "reseps"));
    }


    public function verifed(Request $request)
    {
        // Ambil pengguna yang memiliki jumlah followers lebih dari 10,000
        $verified = User::where('followers', '>', 10000)->where('isSuperUser', 'no')->paginate(5);
        $verifed_count = User::where('isSuperUser', 'no')->where('followers', '>', 10000)->where('role', 'koki')->count();
        return view('admin.verifed', compact('verified', 'verifed_count'));
    }

    public function data_koki()
    {
        $data = DataPribadiKoki::where("status", "diproses")->paginate(5);
        $verifed_count = User::where('isSuperUser', 'no')->where('followers', '>', 10000)->where('role', 'koki')->count();

        return view('admin.datakoki', compact('data', 'verifed_count'));
    }

    public function proses_data_koki(Request $request, $id)
    {
        $data = DataPribadiKoki::find($id);
        if ($request->status === "diterima") {
            $data->status = "diterima";
            $data->save();
            // create notification
            $notify = Notifications::create([
                'user_id' => $data->chef_id,
                'notification_from' => Auth::user()->id,
                'message' => "Data anda diterima oleh Admin.",
                'categories' => 'data-koki',
            ]);
            $up = Notifications::find($notify->id);
            $up->route = '/status-baca/data-koki/' . $notify->id;
            $up->save();
        } elseif ($request->status === "ditolak") {
            $data->delete();
            // create notification
            $notif = Notifications::create([
                'user_id' => $data->chef_id,
                'notification_from' => Auth::user()->id,
                'message' => 'Data anda tidak diterima oleh Admin.',
                'alasan' => $request->alasan,
                'categories' => 'data-koki',
            ]);
            $update = notifications::find($notif->id);
            $update->route = '/status-baca/data-koki/' . $notif->id;
            $update->save();
        }

        return redirect()->back();
    }

    public function ajuan_penarikan()
    {
        $data = Penarikans::where("status", "diproses")->paginate(5);
        $verifed_count = User::where('isSuperUser', 'no')->where('followers', '>', 10000)->where('role', 'koki')->count();

        return view('admin.ajuanpenarikan', compact('data', 'verifed_count'));
    }

    public function proses_ajuan_penarikan(Request $request, int $id)
    {
        $data = Penarikans::find($id);
        if ($request->status === "diterima") {
            $data->status = "diterima";
            $data->save();
            $chef = User::find($data->chef_id);
            $chef->saldo_pemasukan = $chef->saldo_pemasukan - ($data->nilai + 2000);
            $chef->save();

            $admin = User::where('role', 'admin')->where('isSuperUser', 'admin_keuangan')->first();
            $admin->saldo = $admin->saldo + 2000;
            $admin->save();
            $n = Notifications::create([
                'user_id' => $data->chef_id,
                'notification_from' => Auth::user()->id,
                'message' => $data->nilai . ' sudah berhasil ditarik tunai.',
                'categories' => 'penarikan',
            ]);
            $update = Notifications::find($n->id);
            $update->route = '/status-baca/penarikan/' . $n->id;
            $update->save();
        } elseif ($request->status === "ditolak") {
            $data->delete();
            $notif = Notifications::create([
                'user_id' => $data->chef_id,
                'notification_from' => Auth::user()->id,
                'message' => 'Penarikan gagal.',
                'alasan' => $request->alasan,
                'categories' => 'ajuan_penarikan',
            ]);
            $up = Notifications::find($notif->id);
            $up->route = '/status-baca/penarikan/' . $notif->id;
            $up->save();
        }
        return redirect()->back()->with('success', 'Sukses menyetujui penarikan!');
    }

    public function action_verifed(Request $request, string $id, string $status)
    {
        if ($status === "diterima") {
            $status = "menerima";
            $user = User::find($id);
            $user->isSuperUser = "yes";
            $user->level_koki = 0;
            $user->save();
            // create notification
            $notif = Notifications::create([
                'user_id' => $id,
                'notification_from' => Auth::user()->id,
                'message' => 'Selamat anda telah menjadi koki terverifikasi.',
                'categories' => 'verifed',
            ]);
            $up = Notifications::find($notif->id);
            $up->route = '/status-baca/verifed/' . $notif->id;
            $up->save();
        } else if ($status === "ditolak") {
            $status = "menolak";
            $user = User::find($id);
            $user->isSuperUser = "ditolak";
            $user->save();
            // create notification
            $notify = Notifications::create([
                'user_id' => $id,
                'notification_from' => Auth::user()->id,
                'message' => 'Mohon maaf anda belum terverifikasi menjadi koki terverifikasi.',
                'alasan' => $request->alasan,
                'categories' => 'verifed',
            ]);
            $update = Notifications::find($notify->id);
            $update->route = "/status-baca/verifed/" . $notify->id;
            $update->save();
        }
        return redirect()->back();
    }


    public function userContent(int $id)
    {
        $koki = User::find(Auth::user()->id);
        $students = User::with('user_transaksi_kursus')->whereHas('user_transaksi_kursus', function ($query) use ($id) {
            $query->where('course_id', $id);
        })->get();
        $userLogin = Auth::user();
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
        return view('koki.user', compact("koki", "userLogin", "students", "messageCount", "notification", "unreadNotificationCount", "categorytopup"));
    }


    public function tawaran()
    {
        $userLogin = Auth::user();
        $notification = [];
        $favorite = [];
        $footer = Footer::first();
        $categorytopup = TopUpCategories::all();
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
        $categoryTopUp = TopUpCategories::all();
        $verifed_count = User::where('isSuperUser', 'no')->where('followers', '>', 10000)->where('role', 'koki')->count();
        return view('admin.tawaran', compact('verifed_count', 'categoryTopUp', 'penawaran_premium', 'categorytopup', 'messageCount', 'notification', 'footer', 'unreadNotificationCount', 'userLogin', 'favorite'));
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
        $premium_create = Premiums::create([
            "nama_paket" => $request->nama_paket,
            "harga_paket" => $request->harga_paket,
            "durasi_paket" => $request->durasi_paket
        ]);

        if ($premium_create) {
            foreach ($request->detail_paket as $d) {
                DetailPremiums::create([
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
    public function update_tawaran(Request $request, $id)
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

        $premium = Premiums::find($id);
        $premium->nama_paket = $request->nama_paket;
        $premium->harga_paket = $request->harga_paket;
        $premium->durasi_paket = $request->durasi_paket;
        $premium->save();


        foreach ($request->detail_paket as $num => $d) {
            $detail_premium = DetailPremiums::find($request->id_detail_paket[$num]);
            $detail_premium->detail = $d;
            $detail_premium->save();
        }


        return response()->json([
            "success" => true,
            "message" => "sukses mengupdate penawaran produk!"
        ]);
    }
    public function hapus_tawaran($id) {
        $premium = Premiums::find($id);
        $premium->delete();
        return response()->json([
            'success'=>true,
            'message'=>'Berhasil menghapus data penawaran premium.',
        ]);
    }
}
