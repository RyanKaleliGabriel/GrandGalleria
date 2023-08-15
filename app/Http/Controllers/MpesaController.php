<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Mpesa;

class MpesaController extends Controller
{
    /**
     * Lipa na M-PESA password
     * */
    public function lipaNaMpesaCallBack(Request $request)
    {
        // decode the data here from the mpesa payload response
        $response = json_decode($request->getContent());
        //get the reference number if exists
        $Mpesa = Mpesa::where('reference_number', $response->ReferenceNumber)->first();
        if ($Mpesa) {
            // update if request becomes true
            if ($response->Success) {
                // sync mpesa here
                Mpesa::query()->where('reference_number', $response->ReferenceNumber)->update([
                    'transaction_number' => $response->MpesaReceiptNumber,
                    'is_paid' => true,
                    'is_successful' => true,
                    'payload' => $response,
                    'callback_received_at' => now()
                ]);
                // write statements
            } else {
                // sync mpesa here
                $Mpesa->update([
                    'transaction_number' => $response->MpesaReceiptNumber,
                    'is_paid' => false,
                    'is_successful' => true,
                    'payload' => $response,
                    'callback_received_at' => now()
                ]);
            }
        }
    }
}
