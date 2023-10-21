<?php

namespace App\Http\Controllers;

use App\Models\history_premiums;
use App\Models\premiums;
use App\Models\transactionTopUp;
use App\Models\User;
use DateInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use DateTime;
use DateTimeZone;

class TripayCallbackController extends Controller
{
    // Isi dengan private key anda
    protected $privateKey = 'LRR6K-CgOdX-tLsns-BVPVY-2kHvM';

    public function handle(Request $request)
    {
        $callbackSignature = $request->server('HTTP_X_CALLBACK_SIGNATURE');
        $json = $request->getContent();
        $signature = hash_hmac('sha256', $json, $this->privateKey);

        if ($signature !== (string) $callbackSignature) {
            return Response::json([
                'success' => false,
                'message' => 'Invalid signature',
            ]);
        }

        if ('payment_status' !== (string) $request->server('HTTP_X_CALLBACK_EVENT')) {
            return Response::json([
                'success' => false,
                'message' => 'Unrecognized callback event, no action was taken',
            ]);
        }

        $data = json_decode($json);

        if (JSON_ERROR_NONE !== json_last_error()) {
            return Response::json([
                'success' => false,
                'message' => 'Invalid data sent by tripay',
            ]);
        }

        $transactionId = $data->merchant_ref;
        $tripayReference = $data->reference;
        $status = strtoupper((string) $data->status);

        if ($data->is_closed_payment === 1) {
            $transaction = history_premiums::where('reference', $tripayReference)
                ->where('status', '=', 'unpaid')
                ->first();

            if (!$transaction) {
                return Response::json([
                    'success' => false,
                    'message' => 'No transaction found or already paid: ' . $transactionId,
                ]);
            }

            switch ($status) {
                case 'PAID':
                    $transaction->update(['status' => 'PAID']);
                    break;

                case 'EXPIRED':
                    $transaction->update(['status' => 'EXPIRED']);
                    break;

                case 'FAILED':
                    $transaction->update(['status' => 'FAILED']);
                    break;

                default:
                    return Response::json([
                        'success' => false,
                        'message' => 'Unrecognized payment status',
                    ]);
            }
            $history_transaksi = history_premiums::where("reference", $tripayReference)->first();
            $id_user = $history_transaksi->users_id;
            $premiums = $history_transaksi->premiums_id;
            $premium = premiums::find($premiums);
            $saldo = $premium->harga_paket * 0.8;
            $saldo_pemasukan = $premium->harga_paket * 0.2;
            $admin = User::where('role', 'admin')->first();
            $total_saldo = $admin->saldo + $saldo;
            $total_saldo_pemasukan = $admin->saldo_pemasukan + $saldo_pemasukan;
            $admin->saldo = $total_saldo;
            $admin->saldo_pemasukan = $total_saldo_pemasukan;
            $admin->save();
            $hari = $premium->durasi_paket;
            $user = User::find($id_user);

            $user->status_langganan = "sedang berlangganan";
            $awal_langganan = null;
            if ($user->awal_langganan != null) {
                $awal_langganan = $user->awal_langganan;
                $user->awal_langganan = $awal_langganan;
                $akhir_langganan = new DateTime($user->akhir_langganan);
                $user->akhir_langganan = $akhir_langganan->add(new DateInterval('P' . $hari . 'D'));

            } else {
                $currentTime = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
                $awal_langganan = $currentTime->format('Y-m-d H:i:s');
                $user->awal_langganan = $awal_langganan;
                $akhir_langganan = new DateTime($awal_langganan);
                $user->akhir_langganan = $akhir_langganan->add(new DateInterval('P' . $hari . 'D'));

            }

            $user->save();

            return Response::json(['success' => true]);
        }
    }
    public function TopUpHandle(Request $request){
        $callbackSignature = $request->server('HTTP_X_CALLBACK_SIGNATURE');
        $json = $request->getContent();
        $signature = hash_hmac('sha256', $json, $this->privateKey);

        if ($signature !== (string) $callbackSignature) {
            return Response::json([
                'success' => false,
                'message' => 'Invalid signature',
            ]);
        }

        if ('payment_status' !== (string) $request->server('HTTP_X_CALLBACK_EVENT')) {
            return Response::json([
                'success' => false,
                'message' => 'Unrecognized callback event, no action was taken',
            ]);
        }

        $data = json_decode($json);
        
        if (JSON_ERROR_NONE !== json_last_error()) {
            return Response::json([
                'success' => false,
                'message' => 'Invalid data sent by tripay',
            ]);
        }

        $transactionId = $data->merchant_ref;
        $tripayReference = $data->reference;
        $status = strtoupper((string) $data->status);
        if ($data->is_closed_payment === 1) {
            $transaction = transactionTopUp::where('reference', $tripayReference)
                ->where('status', '=', 'UNPAID')
                ->first();
            if (!$transaction) {
                return Response::json([
                    'success' => false,
                    'message' => 'No transaction found or already paid: ' . $transactionId,
                ]);
            }

            switch ($status) {
                case 'PAID':
                    $transaction->update(['status' => 'PAID']);
                    break;

                case 'EXPIRED':
                    $transaction->update(['status' => 'EXPIRED']);
                    break;

                case 'FAILED':
                    $transaction->update(['status' => 'FAILED']);
                    break;

                default:
                    return Response::json([
                        'success' => false,
                        'message' => 'Unrecognized payment status',
                    ]);
            }

            $history_transaksi = transactionTopUp::where("reference", $tripayReference)->first();
            $user = User::findOrFail($transaction->user_id);
            $saldo_lama = $user->saldo;
            $saldo_baru = $transaction->price;
            $user->saldo = $saldo_lama + $saldo_baru;
            $user->save();
            return Response::json(['success' => true]);
        }
    }
}
