<?php

namespace App\Http\Controllers;

use App\Models\income_chefs;
use App\Models\reseps;
use App\Models\upload_video;
use App\Models\User;
use Illuminate\Http\Request;

class IncomeChefsController extends Controller
{
    public function pemasukan_koki($chef, $user, $status)
    {
        // pemasukan per klik dihitung dari  total saldo admin dibagi jumlah konten premium
        $saldoAdmin = User::where('role', 'admin')->first();
        $saldo_admin = $saldoAdmin->saldo;
        $total_resep_premium = reseps::where('isPremium', 'yes')->count();
        $total_feed_premium = upload_video::where('isPremium', 'yes')->count();
        $total_konten_premium  = $total_resep_premium + $total_feed_premium;
        $pemasukan = $saldo_admin / $total_konten_premium;
        $income = income_chefs::where('chef_id', $chef)
        ->where('user_id', $user)->where('status', $status)
        ->where('pemasukan', $pemasukan)
        ->exists();
        $pengguna = User::find($user);
        if ($chef != $user && $pengguna->role != "admin") {
            if (!$income) {
                income_chefs::create([
                    "chef_id" => $chef,
                    "user_id" => $user,
                    "status" => $status,
                    "pemasukan" => $pemasukan
                ]);
                // mengurangi saldo di admin
                $admin = User::where('role', 'admin')->first();
                $admin->saldo = $admin->saldo - $pemasukan;
                $admin->save();
                // menambahkan saldo pemasukan di koki
                $koki = User::find($chef);
                $koki->saldo_pemasukan = $koki->saldo_pemasukan + $pemasukan;
                $koki->save();
            }
        }
        return response()->json([
            "success" => "true"
        ]);
    }
}
