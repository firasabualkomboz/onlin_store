<?php

namespace App\Http\Controllers;

use App\Http\Services\FatoorahServices;
use Illuminate\Http\Request;

class FatoorahController extends Controller
{
    private $fatoorahServices;

    public function __construct(FatoorahServices $fatoorahServices)
    {
        $this->fatoorahServices = $fatoorahServices;
    }

    public function payOrder()
    {
        $data = [

            "CustomerName"          => 'test',
            "NotificationOption"    => "LNK",
            "InvoiceValue"          => 100,
            "CustomerEmail"         => 'feras.out@gmail.com',
            "CallBackUrl"          => 'https://google.com',
            "ErrorUrl"              => 'https://youtube.com',
            "Language"              => 'en',
            "DisplayCurrencyIso"    => 'SAR'

        ];

        return $this->fatoorahServices->sendPayment($data);
    }
}
