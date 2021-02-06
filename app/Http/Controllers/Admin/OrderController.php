<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(){
        $orders = auth()->user()->orders;
        $carts = $orders->transform( function( $cart, $key) {
            return unserialize($cart->cart);
        });
        //dd($carts);
        return view('front.Order')->with('carts',$carts);
    }
}
