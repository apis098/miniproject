<?php

namespace App\Http\Controllers;

use App\Models\ChMessage;
use App\Models\favorite;
use App\Models\footer;
use App\Models\kursus;
use App\Models\notifications;
use App\Models\TopUpCategories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TransaksiKursus;

class reservasiKursusController extends Controller
{
    public function reservasiKursus(Request $request, int $id)
    {
        $idAdmin = User::where('role', 'admin')->first();
        $userLogin = Auth::user();
        // untuk user belum login
        $userLog = 1;
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
        $categorytopup = TopUpCategories::all();
        $admin = false;
        $messageCount = [];
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
        if ($userLogin) {
            $id_user = Auth::user()->id;
            $id_admin = User::where("role", "admin")->first();
            if ($id_user == $id_admin->id) {
                $admin = true;
            }
            $notification = notifications::where('user_id', auth()->user()->id)
                ->where('status', 'belum')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $unreadNotificationCount = notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
            // jika user sudah login
            $userLog = 2;
        }
        if ($userLogin) {
            $favorite = favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        $footer = footer::first();
        $course = kursus::find($id);
        return view('kursus.reservasi-kursus', compact('course', 'categorytopup', 'idAdmin', 'messageCount', 'admin', 'footer', 'userLog', 'notification', 'unreadNotificationCount', 'userLogin', 'favorite'));
    }

    public function invoiceKursus(Request $request)
    {


        return view('kursus.invoice-kursus');
    }
    public function transaksiKursus(int $id, int $user, int $chef, Request $request)
    {
        $amount = $request->amount;
        $pembeli = User::find($user);
        $saldo_pembeli = $pembeli->saldo;
        if ($amount < 1) {
            return redirect()->back()->with('error', 'Anda tidak memilih sesi konten apapun!');
        }
        if ($saldo_pembeli < $amount) {
            return redirect()->back()->with('error', 'Saldo anda tidak mencukupi!');
        } else {
            TransaksiKursus::create([
                "course_id" => $id,
                "chef_id" => $chef,
                "user_id" => $user,
                "harga" => $amount,
                "status_transaksi" => "diterima",
                "harga" => $amount,
                "tanggal_status_transaksi" => now(),
            ]);
            $pembeli->saldo = $saldo_pembeli - $amount;
            $pembeli->save();
            return redirect()->route("detail.kursus", $id)->with('success', 'Sukses membeli kursus!');
        }
    }
}
