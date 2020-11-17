<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use\App\Models\Product;

class OrderController extends Controller
{
    public function order($id){

        $order = Product::find($id);
        // $productref = Product::where('main_category_id',7)->get(4);
        return view('front.Order', ['order' => $order]);


    }
}
