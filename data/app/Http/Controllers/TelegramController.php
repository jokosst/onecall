<?php
/**
 * Created by PhpStorm.
 * User: gentra
 * Date: 15/01/18
 * Time: 20:29
 */

namespace App\Http\Controllers;


use App\STO;
use App\teknisi;
use Carbon\Carbon;
use danog\MadelineProto\API;

class TelegramController extends Controller
{

    public function sendTelegramMessage($order, $sto = null)
    {
        if ($sto) {
            $stoRecord = STO::where('name', $sto)->first();
            if ($stoRecord) {
                $technician = $stoRecord->technicians()->orderBy('last_sent_at', 'asc')->first();
            } else {
                $technician = teknisi::orderBy('last_sent_at', 'asc')->first();
            }
        } else {
            $technician = teknisi::orderBy('last_sent_at', 'asc')->first();
        }

        if ($technician) {
            $destinationNumber = $this->getFullPhoneNumber($technician->phone);
            // Send message
            $madelineProto = new API(storage_path('session.onecall'));

            $phone = $destinationNumber;
            $message =
                "No. SC: $order->nomor_sc\n$order->nama_ktp\n$order->address\n$order->note\n$order->nd $order->nd_internet\n$order->kcontact\n$order->appointment\nGoogle Maps Link: https://www.google.com/maps/?q=$order->latitude,$order->longitude";

            $orderArray = $order->toArray();
            if (!empty($orderArray['images'])) {
                $message .= "\n\nPictures:";
                foreach ($orderArray['images'] as $image) {
                    $message .= "\n$image";
                }
            }

            $contacts = $madelineProto->contacts->importContacts([
                'contacts' => [
                    [
                        '_' => 'inputPhoneContact',
                        'client_id' => 120192,
                        'phone' => $phone,
                        'first_name' => '',
                        'last_name' => ''
                    ]

                ],
            ]);
            $madelineProto->messages->sendMessage([
                'peer' => 'user#' . $contacts['imported'][0]['user_id'],
                'message' => $message,
            ]);
            $madelineProto->serialize();

            // Update last_sent_at
            $technician->last_sent_at = Carbon::now();
            $technician->save();
        }
    }

    private function getFullPhoneNumber($phone)
    {
        if ($this->startsWith($phone, "0")) {
            return "+62" . substr($phone, 1);
        } else {
            return "+" . $phone;
        }
    }

    private function startsWith($haystack, $needle)
    {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }

}