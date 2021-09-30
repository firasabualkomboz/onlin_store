<?php

namespace App\Http\Controllers;

use App\Http\Services\FatoorahServices;
use App\Models\Cart;
use App\Models\MainCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    private $fatoorahServices;

    public function __construct(FatoorahServices $fatoorahServices)
    {
        $this->fatoorahServices = $fatoorahServices;
    }
    public function index()
    {

        return view('index',[
            'categories' => MainCategory::all(),
            'products' => Product::all(),
            'hot_products'  => Product::where('price' , '>=' ,'100')->get(),
            'cart'          =>  new Cart(session()->get('cart' )),
        ]);
    }

    public function addToCart(Product $product)
    {
        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = new Cart();
        }
        $cart->add($product);
        session()->put('cart', $cart);
        return redirect()->route('zajil.index')->with('success', 'The Product has been added to the cart'); //true

    }

    public function showCart () {

        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = null;
        }
        return view('cart', compact('cart'));
    }

    public function checkout($amount)
    {
        return view('checkout',compact('amount'));
    }

    public function payCheckOut(Request $request)
    {
        $amount = $request->amount;
        $data = [

            "CustomerName"          => 'test',
            "NotificationOption"    => "LNK",
            "InvoiceValue"          => $amount,
            "CustomerEmail"         => 'feras.out@gmail.com',
            "CallBackUrl"           => 'http://zajil.gaza/api/call_back',
            "ErrorUrl"              => 'https://facebook.com',
            "Language"              => 'en',
            "DisplayCurrencyIso"    => 'KWD'//  SAR

        ];

        $paymentData= $this->fatoorahServices->sendPayment($data);
        $payment_Url =   $paymentData['Data']['InvoiceURL'];
        return redirect($payment_Url) ;
    }


}
