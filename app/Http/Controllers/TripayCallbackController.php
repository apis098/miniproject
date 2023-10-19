<?php

namespace App\Http\Controllers;

use App\Models\history_premiums;
use App\Models\premiums;
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

        $invoiceId = $data->merchant_ref;
        $tripayReference = $data->reference;
        $status = strtoupper((string) $data->status);

        if ($data->is_closed_payment === 1) {
            $invoice = history_premiums::where('reference', $tripayReference)
                ->where('status', '=', 'unpaid')
                ->first();

            if (!$invoice) {
                return Response::json([
                    'success' => false,
                    'message' => 'No invoice found or already paid: ' . $invoiceId,
                ]);
            }

            switch ($status) {
                case 'PAID':
                    $invoice->update(['status' => 'PAID']);
                    break;

                case 'EXPIRED':
                    $invoice->update(['status' => 'EXPIRED']);
                    break;

                case 'FAILED':
                    $invoice->update(['status' => 'FAILED']);
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
            $hari = $premium->durasi_paket;
            $user = User::find($id_user);
            $user->status_langganan = "sedang berlangganan";
            $currentTime = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
            $awal_langganan = $currentTime->format('Y-m-d H:i:s');
            $user->awal_langganan = $awal_langganan;
            $akhir_langganan = new DateTime($awal_langganan);
            $user->akhir_langganan = $akhir_langganan->add(new DateInterval('P'.$hari.'D'));
            $user->save();

            return Response::json(['success' => true]);
        }
    }
}

