<?php

namespace App\Http\Controllers;

use App\Models\detail_premiums;
use App\Models\premiums;
use App\Models\Report;
use App\Models\reseps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\file;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

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
        for ($i=0; $i <= $yearsu; $i++) {
            $years[] = $year++;
        }
        $month = [];
        if ($request->has("tahun")) {
            $tahun = $request->tahun;
            for ($i=1; $i <= 12; $i++) {
                $month[] = DB::table("users")
                ->whereMonth('created_at', $i)
                ->whereYear("created_at", $tahun)
                ->count();
            }
        } else {
            for ($i=1; $i <= 12 ; $i++) {
                $month[] = DB::table("users")->whereMonth('created_at', $i)->count();
            }
        }
        $data_chartjs = [];
        return view('admin.index',[
            'admin'=> $admin,
            ], compact("jumlah_user", "jumlah_resep", "jumlah_report","month", "years", "reports", "reseps"));


    }


    public function verifed(Request $request){



        return view('admin.verifed');
    }

    public function tawaran() {
        
        return view('admin.tawaran');
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

    public function upload_tawaran(Request $request) {
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
