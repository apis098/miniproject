<?php

namespace App\Http\Controllers;

use App\Models\ResepPremiums;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // mendapatkan daftar channel pembayaran yang sudah diaktifkan
    public function channel_pembayaran() {
        $channels = new TripayPaymentController();
        $channel = $channels->getPaymentMerchant();
        return view('testing.paymentTesting', compact('channel'));
    }
    // memberi request pembayaran ke tripay
    public function dapatkan_transaksi(Request $request) {
        $getRequest = new TripayPaymentController();
        $get = $getRequest->requestTransaksi($request->method,$request->amount, $request->name_product, $request->name, $request->email);
        // create data in resep_premiums table
        ResepPremiums::create([
            'users_id' => auth()->user()->id,
            'reseps_id' => 1,
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
        $detail_pembayaran = new TripayPaymentController();
        $detail = $detail_pembayaran->detailPembayaran($reference);
        return view('testing.detailPaymentTesting', compact("detail"));
    }
    // halaman daftar transaksi
    public function daftar_transaksi() {
        $daftar_transaksi = ResepPremiums::latest()->where('users_id', auth()->user()->id)->get();
        return view('testing.daftarPaymentTesting', compact("daftar_transaksi"));
    }
}
