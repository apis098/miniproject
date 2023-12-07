<?php

namespace App\Http\Controllers;

use App\Models\IncomeChefs;
use App\Models\Reseps;
use App\Models\UploadVideo;
use App\Models\User;
use App\Models\Penarikans;
use App\Models\DataPribadiKoki;
use App\Models\Share;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IncomeChefsController extends Controller
{
    // pemasukan per klik koki untuk feed
    public function pemasukan_koki($chef, $user, $content, $status)
    {
        $kokis = User::find($chef);
        if ($kokis->level_koki === 0 || $kokis->level_koki === null) {
            $pemasukan = 5;
        } else {
            $level_koki = $kokis->level_koki / 10;
            $pemasukan = 100 * $level_koki;
        }
        $income = IncomeChefs::where('chef_id', $chef)
            ->where('user_id', $user)
            ->where('feed_id', $content)
            ->where('status', $status)
            ->exists();
        $pengguna = User::find($user);
        if ($chef != $user && $pengguna->role != "admin") {
            if ($income != true) {
                IncomeChefs::create([
                    "chef_id" => $chef,
                    "user_id" => $user,
                    "feed_id" => $content,
                    "status" => $status,
                    "pemasukan" => $pemasukan
                ]);
                // mengurangi saldo di admin
                $admin = User::where('role', 'admin')->where('isSuperUser', 'admin_keuangan')->first();
                $admin->saldo = $admin->saldo - $pemasukan;
                $admin->save();
                // menambahkan saldo pemasukan di koki
                $koki = User::find($chef);
                $koki->saldo_pemasukan = $koki->saldo_pemasukan + $pemasukan;
                // memperbarui level koki
                // menghitung total like, share, view, favorite, dan followers
                // menghitung total popularitas seluruhnya
                $total_like_feed_semua = UploadVideo::whereHas("like_veed")->count();
                $total_like_resep_semua = Reseps::whereHas("likes")->count();
                $total_share_semua = Share::count();
                $total_view_semua = IncomeChefs::count();
                $total_favorite_feed_semua = UploadVideo::whereHas("favorite")->count();
                $total_favorite_resep_semua = Reseps::whereHas("favorite")->count();
                $total_followers_semua = User::sum('followers');
                $total_popularitas = $total_like_feed_semua + $total_like_resep_semua + $total_share_semua + $total_view_semua + $total_favorite_feed_semua + $total_favorite_resep_semua + $total_followers_semua;
                // menghitung total popularitas chef
                $total_like_feed = UploadVideo::where("users_id", $chef)->whereHas("like_veed")->count();
                $total_like_resep = Reseps::where("user_id", $chef)->whereHas("likes")->count();
                $total_share = Share::where('user_id', $chef)->count();
                $total_view = IncomeChefs::where("chef_id", $chef)->count();
                $total_favorite_feed = UploadVideo::where("users_id", $chef)->whereHas("favorite")->count();
                $total_favorite_resep = Reseps::where("user_id")->whereHas("favorite")->count();
                $total_followers = $koki->followers;
                $total_popularitas_chef = $total_like_feed + $total_like_resep + $total_share + $total_view + $total_favorite_feed + $total_favorite_resep + $total_followers;
                $level = $total_popularitas_chef / $total_popularitas;
                if($level == 0) {
                    $hasil = $level;
                } elseif($level == 1) {
                    $hasil = 10;
                } else {
                    $hasil = intval($level * 10) % 10;
                }

                $koki->level_koki = $hasil;
                $koki->save();
            }
        }
        return response()->json([
            "success" => "true"
        ]);
    }
    // ajukan penarikan
    public function ajukan_penarikan(Request $request)
    {
        // validasi saldo koki
        $saldo_koki = Auth::user()->saldo_pemasukan + 2000;
        $nilai = 0;
        if($request->nilai == null) {
            $nilai = $request->select_input;
        } elseif($request->select_input == "null") {
            $nilai = $request->nilai;
        }
        if ($request->select_input == "null") {
            if ($saldo_koki < $request->nilai) {
                return response()->json([
                    'success' => false,
                    'message' => 'Saldo anda tidak cukup untuk tarik tunai!'
                ]);
            }
        } elseif ($request->nilai == null) {
            if ($saldo_koki < $request->select_input) {
                return response()->json([
                    'success' => false,
                    'message' => 'Saldo anda tidak cukup untuk tarik tunai!'
                ]);
            }
        }
        $penarikan = Penarikans::where('chef_id', Auth::user()->id)->where('status', 'diproses')->exists();

        if ($penarikan) {
            return response()->json([
                'success' => false,
                'message' => 'Pengajuan anda sebelumnya belum selesai di proses oleh admin!'
            ]);
        }

        if ($request->select_input == "null") {
            if ($request->nilai < 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tidak boleh menginputkan nilai minus!'
                ]);
            }
        } elseif ($request->nilai == null) {
            if ($request->select_input < 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tidak boleh menginputkan nilai minus!'
                ]);
            }
        }

        if ($request->select_input == "null") {
            if ($request->nilai % 50000 != 0) {
                return response()->json([
                    "success" => false,
                    "message" => "Harus berkelipatan RP50.000,00!"
                ]);
            }
        } elseif ($request->nilai == null) {
            if ($request->select_input % 50000 != 0) {
                return response()->json([
                    "success" => false,
                    "message" => "Harus berkelipatan RP50.000,00!"
                ]);
            }
        }
        $data = DataPribadiKoki::where("chef_id", Auth::user()->id)->first();
        Penarikans::create([
            "chef_id" => Auth::user()->id,
            "data_id" => $data->id,
            "nilai" => $nilai
        ]);
        return response()->json([
            "success" => "true",
            "message" => "Berhasil mengajukan penarikan, harap tunggu konfirmasi admin!"
        ]);
    }
}
