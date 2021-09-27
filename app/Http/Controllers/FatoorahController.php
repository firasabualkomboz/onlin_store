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

            "CustomerName" => 'test',
            "NotificationOption" => "LNK",
            "InvoiceValue" => 100,
            "CustomerEmail" => 'feras.out@gmail.com',
            "CallBackUrl" => 'http://zajil.gaza/api/call_back',
            "ErrorUrl" => 'https://youtube.com',
            "Language" => 'en',
            "DisplayCurrencyIso" => 'SAR'

        ];

        return $this->fatoorahServices->sendPayment($data);
    }

    public function paymentCallBack(Request $request)

    {
        return "this is successfuly thanks feras thanks ! belal " ;
//        $data = [];
//        $data['Key'] = $request->payementId;
//        $data['KeyType'] = 'paymentId';
//
////        return $this->fatoorahServices->getPaymentStatus($data);
//        return  $paymentData = $this->fatoorahServices->getPaymentStatus($data);
//        // search where invoice id = $paymentData['Data]['InvoiceId];
    }
}
