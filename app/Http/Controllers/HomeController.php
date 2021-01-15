<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\MainCategory;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();



        $maincato = MainCategory::where('translation_of',0)->active()->get();
        $fastionproduct = Product::where('main_category_id',16)->get();
        $elcetonic = Product::where('main_category_id',10)->get();
        $mobile = Product::where('main_category_id',7)->get();

        $cuts = Product::where('price','<',50)->take(3)->get();
        $cuts2 = Product::where('price','<',100)->take(3)->get();
        $buy = Product::where('price','>',50)->take(3)->get();
        $buy2 = Product::where('price','>',50)->take(3)->get();

        return view('front.home',compact('maincato','products','fastionproduct','elcetonic','mobile','cuts','cuts2'
        ,'buy','buy2'
        ))
        ->with('topcato' , MainCategory::take(20)->get())
        ->with('lastproduct' , Product::orderBy('created_at','desc')->take(3)->get())
        ->with('lastproduct2' , Product::orderBy('created_at','desc')->skip(3)->take(3)->get())
        ;
    }

    public function Productdetails($id){

        $product = Product::find($id);
        // $productref = Product::where('main_category_id',7)->get(4);
        return view('front.details_product', ['product' => $product])
        ->with('productref',Product::where('main_category_id',7)->take(4)->get())
        ->with('maincato',MainCategory::where('translation_of',0)->active()->get())
        // ->with('fastionproduct',Product::where('main_category_id',16)->get())

        ;

    }


    public function authroute(){
        return "page not found ";
    }


 public function logout()
 {
    Auth::logout();

    return redirect()->route('home')->with(['success'=>' تمت عملية تسجيل الخروج ']);
 }



}
