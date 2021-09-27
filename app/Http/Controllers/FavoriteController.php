<?php

namespace App\Http\Controllers;

use App\Models\MainCategory;
use App\Models\UserProductFavorite;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{


   public function show_favorite_product(){

       $categories = MainCategory::where('translation_of',0)->active()->get();

       $products = DB::table('favorite')->leftJoin('product','favorite.product_id','=','product.id')->get();
       return view('front.favorite',compact('products','categories'));

   } // end show favorite product ...


    public function store_favorite_product(Request $request){

        $add_favorite = new UserProductFavorite();
        $add_favorite->user_id = Auth::user()->id;
        $add_favorite->product_id=$request->product_id;

        $add_favorite->save();

        $products = DB::table('product')->where('id',$request->product_id)->get();
        return view('front.favorite',compact('products'));

    }


}
