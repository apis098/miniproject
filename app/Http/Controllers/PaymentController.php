<?php

namespace App\Http\Controllers;

use App\Models\ResepPremiums;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\ChMessage;
use App\Models\Notifications;
use App\Models\Favorite;
use App\Models\Footer;
use App\Models\HistoryPremium;
use App\Models\TopUpCategories;
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
        $categorytopup  =  TopUpCategories::all();
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
            $notification = Notifications::where('user_id', auth()->user()->id)
            ->where('status','belum')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            $unreadNotificationCount = Notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
            // jika user sudah login
            $userLog = 2;
        }
        if ($userLogin) {
            $favorite = Favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        $footer = Footer::first();
        $channels = new TripayPaymentController();
        $channel = $channels->getPaymentMerchant();
        return view('testing.paymentTesting', compact('categorytopup','channel', 'messageCount', 'notification', 'unreadNotificationCount', 'userLogin', 'footer', 'favorite'));
    }
    // memberi request pembayaran ke tripay
    public function dapatkan_transaksi(Request $request) {
        $getRequest = new TripayPaymentController();
        $get = $getRequest->requestTransaksi($request->method,$request->amount, $request->name_product, $request->name, $request->email);
        // create data in resep_premiums table
        HistoryPremium::create([
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
        $categorytopup  =  TopUpCategories::all();
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
            $notification = Notifications::where('user_id', auth()->user()->id)
            ->where('status','belum')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            $unreadNotificationCount = Notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
            // jika user sudah login
            $userLog = 2;
        }
        if ($userLogin) {
            $favorite = Favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        $footer = Footer::first();
        $detail_pembayaran = new TripayPaymentController();
        $premium = HistoryPremium::where('reference', $reference)->first();
        $hari = $premium->premium->durasi_paket;
        $detail = $detail_pembayaran->detailPembayaran($reference);
        $detail_transaksi = HistoryPremium::where("reference", $reference)->first();
        return view('testing.detailPaymentTesting', compact('categorytopup',"hari","detail_transaksi","detail", 'messageCount', 'notification', 'unreadNotificationCount', 'userLogin', 'footer', 'favorite'));
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
        $categorytopup  =  TopUpCategories::all();
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
            $notification = Notifications::where('user_id', auth()->user()->id)
            ->where('status','belum')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            $unreadNotificationCount = Notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
            // jika user sudah login
            $userLog = 2;
        }
        if ($userLogin) {
            $favorite = Favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        $footer = Footer::first();
        $daftar_transaksi = HistoryPremium::latest()->where('users_id', auth()->user()->id)->get();
        return view('testing.daftarPaymentTesting', compact('categorytopup',"daftar_transaksi", "messageCount", "notification", "unreadNotificationCount", "userLogin", "footer", "favorite"));
    }
}
