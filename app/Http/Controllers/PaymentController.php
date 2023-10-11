<?php

namespace App\Http\Controllers;

use App\Models\ResepPremiums;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\ChMessage;
use App\Models\notifications;
use App\Models\favorite;
use App\Models\footer;
use App\Models\history_premiums;
use App\Models\user_premiums;

class PaymentController extends Controller
{
    // mendapatkan daftar channel pembayaran yang sudah diaktifkan
    public function channel_pembayaran() {
        $idAdmin = User::where('role', 'admin')->first();
        $userLogin = Auth::user();
        // untuk user belum login
        $userLog = 1;
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
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
                ->orderBy('created_at', 'desc') // Urutkan notifikasi berdasarkan created_at terbaru
                ->paginate(10); // Paginasi notifikasi dengan 10 item per halaman
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
        $channels = new TripayPaymentController();
        $channel = $channels->getPaymentMerchant();
        return view('testing.paymentTesting', compact('channel', 'messageCount', 'notification', 'unreadNotificationCount', 'userLogin', 'footer', 'favorite'));
    }
    // memberi request pembayaran ke tripay
    public function dapatkan_transaksi(Request $request) {
        $getRequest = new TripayPaymentController();
        $get = $getRequest->requestTransaksi($request->method,$request->amount, $request->name_product, $request->name, $request->email);
        // create data in resep_premiums table
        history_premiums::create([
            'users_id' => auth()->user()->id,
            'premiums_id' => $request->id,
            'reference' => $get->reference,
            'merchant_ref' => $get->merchant_ref,
            'total_amount' => $get->amount,
            'status' => $get->status
        ]);
        // redirect ke halaman detail pembayaran
        return redirect()->route('detail.pembayaran', ['reference' => $get->reference]);
    }
    // halaman detail pembayaran
    public function detail_pembayaran($reference) {
        $idAdmin = User::where('role', 'admin')->first();
        $userLogin = Auth::user();
        // untuk user belum login
        $userLog = 1;
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
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
                ->orderBy('created_at', 'desc') // Urutkan notifikasi berdasarkan created_at terbaru
                ->paginate(10); // Paginasi notifikasi dengan 10 item per halaman
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
        $detail_pembayaran = new TripayPaymentController();
        $detail = $detail_pembayaran->detailPembayaran($reference);
        return view('testing.detailPaymentTesting', compact("detail", 'messageCount', 'notification', 'unreadNotificationCount', 'userLogin', 'footer', 'favorite'));
    }
    // halaman daftar transaksi
    public function daftar_transaksi() {
        $idAdmin = User::where('role', 'admin')->first();
        $userLogin = Auth::user();
        // untuk user belum login
        $userLog = 1;
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
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
                ->orderBy('created_at', 'desc') // Urutkan notifikasi berdasarkan created_at terbaru
                ->paginate(10); // Paginasi notifikasi dengan 10 item per halaman
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
        $daftar_transaksi = history_premiums::latest()->where('users_id', auth()->user()->id)->get();
        return view('testing.daftarPaymentTesting', compact("daftar_transaksi", "messageCount", "notification", "unreadNotificationCount", "userLogin", "footer", "favorite"));
    }
}
