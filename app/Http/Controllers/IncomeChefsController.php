<?php

namespace App\Http\Controllers;

use App\Models\income_chefs;
use App\Models\reseps;
use App\Models\upload_video;
use App\Models\User;
use Illuminate\Http\Request;

class IncomeChefsController extends Controller
{
    // pemasukan per klik koki untuk feed
    public function pemasukan_koki($chef, $user, $content, $status)
    {
        $kokis = User::find($chef);
        if ($kokis->level_koki === 0) {
            $pemasukan = 5;
        } else {
            $level_koki = $kokis->level_koki / 10;
            $pemasukan = 100 * $level_koki;
        }
        $income = income_chefs::where('chef_id', $chef)
            ->where('user_id', $user)
            ->where('feed_id', $content)
            ->where('status', $status)
            ->exists();
        $pengguna = User::find($user);
        if ($chef != $user && $pengguna->role != "admin") {
            if ($income != true) {
                income_chefs::create([
                    "chef_id" => $chef,
                    "user_id" => $user,
                    "feed_id" => $content,
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
                // memperbarui level koki
                // menghitung total like, share, view, favorite, dan followers
                $total_like_feed = upload_video::where("users_id", $chef)->whereHas("like_veed")->count();
                $total_like_resep = reseps::where("user_id", $chef)->whereHas("likes")->count();
                $total_share_feed = upload_video::where("users_id", $chef)->whereHas("share_veed")->count();
                $total_share_resep = reseps::where("user_id", $chef)->whereHas("share_resep")->count();
                $total_view = income_chefs::where("chef_id", $chef)->count();
                $total_favorite_feed = upload_video::where("users_id", $chef)->whereHas("favorite")->count();
                $total_favorite_resep = reseps::where("user_id")->whereHas("favorite")->count();
                $total_followers = $koki->followers;
                $total_user = User::count();
                $total = $total_like_feed + $total_like_resep + $total_share_feed + $total_share_resep + $total_view + $total_favorite_feed + $total_favorite_resep + $total_followers;
                $level = strval($total / $total_user);
                $koki->level_koki = $level[2];
                $koki->save();
            }
        }
        return response()->json([
            "success" => "true"
        ]);
    }
    // pemasukan per klik koki untuk resep

}
