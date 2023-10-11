<?php

namespace App\Http\Controllers;

use Illumlate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TripayPaymentController extends Controller
{
    public function getPaymentMerchant()
    {

        $curl = curl_init();

        curl_setopt_array(
            $curl,
            array(
                CURLOPT_FRESH_CONNECT => true,
                CURLOPT_URL => 'https://tripay.co.id/api-sandbox/merchant/payment-channel',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER => false,
                CURLOPT_HTTPHEADER => ['Authorization: Bearer ' . "DEV-DTWmdtujReq9kqZC5dxRzKeMf8gwJRBZQuMsuzzp"],
                CURLOPT_FAILONERROR => false,
                CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4
            )
        );

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        $channel = json_decode($response)->data;
        return $channel;
        //echo empty($error) ? $response : $error;
    }
    public function requestTransaksi($method, $amount, $name_product, $name, $email)
    {
        $apiKey = config('tripay.api_key');
        $privateKey = 'LRR6K-CgOdX-tLsns-BVPVY-2kHvM';
        $merchantCode = 'T25614';
        $merchantRef = 'HC-' . time();
        $data = [
            'method' => $method,
            'merchant_ref' => $merchantRef,
            'amount' => $amount,
            'customer_name' => $name,
            'customer_email' => $email,
            'order_items' => [
                [
                    'name' => $name_product,
                    'price' => $amount,
                    'quantity' => 1,
                ],
            ],
            'return_url' => 'https://domainanda.com/redirect',
            'expired_time' => (time() + (24 * 60 * 60)),
            // 24 jam
            'signature' => hash_hmac('sha256', $merchantCode . $merchantRef . $amount, $privateKey)
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_FRESH_CONNECT => true,
            CURLOPT_URL => 'https://tripay.co.id/api-sandbox/transaction/create',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_HTTPHEADER => ['Authorization: Bearer ' . $apiKey],
            CURLOPT_FAILONERROR => false,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($data),
            CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);
        $response = json_decode($response)->data;
        return $response ? $response : $error;
    }
    public function detailPembayaran($reference)
    {
        $apiKey = config('tripay.api_key');

        $payload = ['reference' => $reference];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_FRESH_CONNECT => true,
            CURLOPT_URL => 'https://tripay.co.id/api-sandbox/transaction/detail?' . http_build_query($payload),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_HTTPHEADER => ['Authorization: Bearer ' . $apiKey],
            CURLOPT_FAILONERROR => false,
            CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);
        $response = json_decode($response)->data;
        return $response ? $response : $error;
    }
    public function getPaymentChannels()
    {
        $apiKey = config('tripay.api_key');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_FRESH_CONNECT => true,
            CURLOPT_URL => 'https://tripay.co.id/api-sandbox/merchant/payment-channel',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_HTTPHEADER => ['Authorization: Bearer ' . $apiKey],
            CURLOPT_FAILONERROR => false,
            CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4
        )
        );

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);
        $response = json_decode($response)->data;
        return $response;

    }
}
