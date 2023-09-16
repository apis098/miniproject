<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TripayPaymentController extends Controller
{
    public function getPaymentMerchant()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_FRESH_CONNECT  => true,
            CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/merchant/payment-channel',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . "DEV-DTWmdtujReq9kqZC5dxRzKeMf8gwJRBZQuMsuzzp"],
            CURLOPT_FAILONERROR    => false,
            CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
        ));

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);
        return $channel = json_decode($response)->data;
        //echo empty($error) ? $response : $error;
    }
}
