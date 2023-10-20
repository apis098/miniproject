<?php

namespace App\Listeners;

use App\Events\ShowRecipePremium;
use App\Models\User;
use App\Models\income_chefs;
use App\Models\reseps;
use App\Models\upload_video;
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
           $saldoAdmin = User::where('role', 'admin')->first();
           $saldo_admin = $saldoAdmin->saldo;
           $total_resep_premium = reseps::where('isPremium', 'yes')->count();
           $total_feed_premium = upload_video::where('isPremium', 'yes')->count();
           $total_konten_premium  = $total_resep_premium + $total_feed_premium;
           $pemasukan = $saldo_admin / $total_konten_premium;
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
                   $admin = User::where('role', 'admin')->first();
                   $admin->saldo = $admin->saldo - $pemasukan;
                   $admin->save();
                   // menambahkan saldo pemasukan di koki
                   $koki = User::find($event->chef);
                   $koki->saldo_pemasukan = $koki->saldo_pemasukan + $pemasukan;
                   $koki->save();
               }
           }
    }
}
