<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function channel_pembayaran() {
        $channels = new TripayPaymentController();
        $channel = $channels->getPaymentMerchant();
        return view('testing.paymentTesting', compact('channel', 'channel'));
    }
}
