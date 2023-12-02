<?php

namespace App\Listeners;

use App\Events\ShowRecipePremium;
use App\Models\User;
use App\Models\income_chefs;
use App\Models\reseps;
use App\Models\upload_video;
use App\Models\Share;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class IncomeRecipePremium
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ShowRecipePremium $event): void
    {
           // pemasukan per klik dihitung dari  total saldo admin dibagi jumlah konten premium
           $kokis = User::find($event->chef);
           if ($kokis->level_koki === 0 || $kokis->level_koki === null) {
               $pemasukan = 5;
           } else {
               $level_koki = $kokis->level_koki / 10;
               $pemasukan = 100 * $level_koki;
           }
           $income = income_chefs::where('chef_id', $event->chef)
           ->where('user_id', $event->user)
           ->where('resep_id', $event->content)
           ->where('status', $event->status)
           ->exists();
           $pengguna = User::find($event->user);
           if ($event->chef != $event->user && $pengguna->role != "admin") {
               if ($income != true) {
                   income_chefs::create([
                       "chef_id" => $event->chef,
                       "user_id" => $event->user,
                       "resep_id" => $event->content,
                       "status" => $event->status,
                       "pemasukan" => $pemasukan
                   ]);
                   // mengurangi saldo di admin
                   $admin = User::where('role', 'admin')->where('isSuperUser', 'admin_keuangan')->first();
                   $admin->saldo = $admin->saldo - $pemasukan;
                   $admin->save();
                   // menambahkan saldo pemasukan di koki
                   $koki = User::find($event->chef);
                   $koki->saldo_pemasukan = $koki->saldo_pemasukan + $pemasukan;
                 // memperbarui level koki
                // menghitung total like, share, view, favorite, dan followers
                // menghitung total popularitas seluruhnya
                $total_like_feed_semua = upload_video::whereHas("like_veed")->count();
                $total_like_resep_semua = reseps::whereHas("likes")->count();
                $total_share_semua = Share::count();
                $total_view_semua = income_chefs::count();
                $total_favorite_feed_semua = upload_video::whereHas("favorite")->count();
                $total_favorite_resep_semua = reseps::whereHas("favorite")->count();
                $total_followers_semua = User::sum('followers');
                $total_popularitas = $total_like_feed_semua + $total_like_resep_semua + $total_share_semua + $total_view_semua + $total_favorite_feed_semua + $total_favorite_resep_semua + $total_followers_semua;
                // menghitung total popularitas chef
                $total_like_feed = upload_video::where("users_id", $event->chef)->whereHas("like_veed")->count();
                $total_like_resep = reseps::where("user_id", $event->chef)->whereHas("likes")->count();
                $total_share = Share::where('user_id', $event->chef)->count();
                $total_view = income_chefs::where("chef_id", $event->chef)->count();
                $total_favorite_feed = upload_video::where("users_id", $event->chef)->whereHas("favorite")->count();
                $total_favorite_resep = reseps::where("user_id")->whereHas("favorite")->count();
                $total_followers = $koki->followers;
                $total_popularitas_chef = $total_like_feed + $total_like_resep + $total_share + $total_view + $total_favorite_feed + $total_favorite_resep + $total_followers;
                $level = $total_popularitas_chef / $total_popularitas;
                if($level == 0) {
                    $hasil = 0;
                } elseif($level == 1) {
                    $hasil = 10;
                } else {
                    $hasil = intval($level * 10) % 10;
                }

                $koki->level_koki = $hasil;
                $koki->save();
               }
           }
    }
}
